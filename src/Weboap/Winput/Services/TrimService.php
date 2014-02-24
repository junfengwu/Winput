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
      
      $this->setOptions($param);
      
      $trim = $this->getOption('trim');
     
      $trim = is_bool( $trim ) ? $trim : $this->config->get('winput::trim');
        
      return $trim ? trim( $value ) : $value ;
      
        
    }
}
