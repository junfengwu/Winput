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
      
       
       $clean_config        = $this->config->get('winput::clean');
       $clean_runtime       = array_get($param, 'clean', null);
       
       $clean = $this->which($clean_runtime, $clean_config);
  
       $is_image    = array_get($param, 'image', false);
       $is_image = is_bool( $is_image ) ? $is_image : false;
       
       return $clean ? $this->security->xss_clean( $value, (bool)$is_image ) : $value ;
        
    }
}
