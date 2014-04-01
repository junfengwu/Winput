<?php namespace Weboap\Winput\Services;


use Illuminate\Config\Repository as Config;


class TrimService extends Abstracts\ServicesAbstract implements Interfaces\ServicesInterface{
    
    protected $config;

    protected $trim;
    
    public function __construct(Config $config)
    {
        $this->config = $config;
    }
    
    public function clean( $value, array $param = array() )
    {
      
        $trim_config        = $this->config->get('winput::trim');
        $trim_runtime       = array_get($param, 'trim', null);
       
        $trim = $this->which($trim_runtime, $trim_config);
       
        return $trim ? trim( $value ) : $value ;
      
        
    }
}
