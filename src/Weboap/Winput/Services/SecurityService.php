<?php namespace Weboap\Winput\Services;

use Weboap\Winput\Libs\Security\Security;
use Illuminate\Config\Repository as Config;


class SecurityService implements Interfaces\ServicesInterface{
    
    protected $config;
    
    protected $security;
    
    public function __construct(Config $config, Security $security)
    {
        $this->config   = $config;
        $this->security = $security;
    }
    
    public function clean( $value )
    {
        return $this->config->get('winput::clean') ? $this->security->xss_clean( $value ) : $value ;
    }
}
