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
       $this->setOptions($param);
       
       $clean       = $this->getOption('clean');
       $clean       = is_bool( $clean ) ? $clean : $this->config->get('winput::clean');
        
       $is_image    = $this->getOption('image');
       $is_image = is_bool( $is_image ) ? $is_image : false;
       
       return $clean ? $this->security->xss_clean( $value, $is_image ) : $value ;
        
    }
}
