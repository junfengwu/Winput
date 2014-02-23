<?php namespace Weboap\Winput\Services\Abstracts;





abstract class ServicesAbstract {
    
    
    public function getOption( $key, array $params = array(), $default = null )
    {
               
        if ( isset( $params[$key] ) || array_key_exists($key, $params) )
        {
            return $params[$key];
        }
        return isset($default) ? $default : null;
    }
}
