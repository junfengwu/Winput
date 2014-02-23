<?php namespace Weboap\Winput\Services;


use Illuminate\Config\Repository as Config;


class TrimService extends Abstracts\ServicesAbstract implements Interfaces\ServicesInterface{
    
    protected $config;

    
    public function __construct(Config $config)
    {
        $this->config = $config;
    }
    
    public function clean( $value, array $param = array() )
    {
        $trim = $this->getOption('trim', $param, $this->config->get('winput::trim'));
        
        if(is_bool($trim))
        {
            return $trim ? trim( $value ) : $value ;
        }
        return $value;
        
    }
}
