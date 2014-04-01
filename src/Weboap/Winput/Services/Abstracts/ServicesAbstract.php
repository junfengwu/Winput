<?php namespace Weboap\Winput\Services\Abstracts;



abstract class ServicesAbstract {
    
    
   
    public function which($runtime , $config)
    {
       
      if( ! is_bool($runtime)  && ! is_bool( $config) )       
      {
         return false;
      }
      else
      {
        return is_bool( $runtime ) ? $runtime : $config;
      }
    }
    
    
   
    
    

}
