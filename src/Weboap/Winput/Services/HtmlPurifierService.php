<?php namespace Weboap\Winput\Services;

use Weboap\Winput\Libs\Html\Sanitizer;
use Illuminate\Config\Repository as Config;


class HtmlPurifierService extends Abstracts\ServicesAbstract implements Interfaces\ServicesInterface{
    
    protected $config;
    
    protected $sanitizer;
    
    public function __construct(Config $config, Sanitizer $sanitizer = null)
    {
        $this->config   = $config;
        
        
        $options = $this->config->get('winput::htmlFilters');
        
        if( ! is_array($options) )
        {
            $options = array();
        }
        
        $cache = $this->config->get('winput::cache');
        
        $this->sanitizer = isset( $sanitizer ) ? $sanitizer : new Sanitizer( $cache, $options );
    }
    
    public function clean( $value, array $param = array() )
    {
        $sanitize_config        = $this->config->get('winput::sanitize');
        $sanitize_runtime       = array_get($param, 'sanitize', null);
       
        $sanitize = $this->which($sanitize_runtime, $sanitize_config);
        
        
       
        if( $sanitize )
        {
               
                $dirtyValue = preg_replace('/<\?xml[^>]+\/>/im', '', $value); 
                
                return $this->sanitizer->sanitize( $dirtyValue );
            
        }
        return $value;
       
    }
}
