<?php namespace Weboap\Winput\Services;

use Weboap\Winput\Libs\Html\Sanitizer;
use Illuminate\Config\Repository as Config;


class HtmlPurifierService extends Abstracts\ServicesAbstract implements Interfaces\ServicesInterface{
    
    protected $config;
    
    protected $sanitizer;
    
    public function __construct(Config $config, Sanitizer $sanitizer = null)
    {
        $this->config   = $config;
        
        $cache = $this->config->get('winput::cache');
        $options = $this->config->get('winput::html_options');
        
        $this->sanitizer = isset( $sanitizer ) ? $sanitizer : new Sanitizer( $cache, $options );
    }
    
    public function clean( $value, array $param = array() )
    {
       $this->setOptions($param);
       
       $sanitize       = $this->getOption('sanitize');
       $sanitize       = is_bool( $sanitize ) ? $sanitize : $this->config->get('winput::sanitize');
       
        if( is_bool($sanitize) && $sanitize )
        {
                $dirtyValue = preg_replace('/<\?xml[^>]+\/>/im', '', $value); 
                
                return $this->sanitizer->sanitize( $dirtyValue );
            
        }
        return $value;
       
    }
}
