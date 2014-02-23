<?php namespace Weboap\Winput\Services;

use Weboap\Winput\Libs\Security\Security;
use Illuminate\Config\Repository as Config;


class SecurityService extends Abstracts\ServicesAbstract implements Interfaces\ServicesInterface{
    
    protected $config;
    
    protected $security;
    
    public function __construct(Config $config, Security $security)
    {
        $this->config   = $config;
        $this->security = $security;
    }
    
    public function clean( $value, array $param = array() )
    {
        $clean = $this->getOption('clean', $param, $this->config->get('winput::clean'));
       
        $is_image = $this->getOption('image', $param, false);
        
        if(! is_bool($is_image))
        {
            $is_image = false;
        }
        
        if(is_bool($clean))
        {
            return $clean ? $this->security->xss_clean( $value, $is_image ) : $value ;
        }
        return $value;
        
       
    }
}
