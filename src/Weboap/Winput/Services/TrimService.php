<?php namespace Weboap\Winput\Services;


use Illuminate\Config\Repository as Config;


class TrimService implements Interfaces\ServicesInterface{
    
    protected $config;

    
    public function __construct(Config $config)
    {
        $this->config = $config;
    }
    
    public function clean( $value )
    {
        return $this->config->get('winput::trim') ? trim( $value ) : $value ;
    }
}
