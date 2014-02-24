<?php namespace Weboap\Winput\Services\Abstracts;



abstract class ServicesAbstract {
    
    
    protected $options = array();

    
    public function setOptions(array $options = null)
    {
        if (!is_null($options)) {
            
            foreach ($options as $key => $value) {
                $this->setOption($key, $value);
            }
        }
    }
    
    public function setOption($key, $value)
    {
        $this->options[$key] = $value;
    }
    
    public function getOptions()
    {
        return $this->options;
    }
    
    public function getOption( $key )
    {
        if (isset($this->options[$key])) {
            return $this->options[$key];
        }
    }
    
    
    
    
    
    
    ///**
    // * Get the cleaner class specific params.
    // *
    // * @return string
    // */    
    //public function getOption( $key, array $params = array(), $default = null )
    //{
    //           
    //    if ( isset( $params[$key] ) || array_key_exists($key, $params) )
    //    {
    //        return $params[$key];
    //    }
    //    return isset($default) ? $default : null;
    //}
}
