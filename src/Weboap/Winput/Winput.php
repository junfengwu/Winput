<?php namespace Weboap\Winput;


use Illuminate\Support\Facades\Input as Input;


class Winput {

  
    /**
    * The Cleaners array
    * @array cleaners
    */   
    protected $cleaners;
    
    
    
    /**
    * Class constructor
    *
    * @return        void
    */
    public function __construct( array $cleaners = array() )
    {
	$this->cleaners = $cleaners;
    }

    /**
    * Get key of the request.
    *
    * @param bool $trim
    * @param bool $sanitize
    * @param bool $clean 
    * 
    * @return str
    */

    public function get($key, array $param = array(), $default = null  ) {
	
	   $value = Input::get($key, $default);
	   
	   return $this->CleanValue( $value, $param );
	  
   
    }
 
    /**
    * Get all of the input and files for the request.
    *
    * @return array
    */
    
    public function all( array $param = array() )
    {
	   $all = Input::all();
     
	    foreach ($all as &$value)
	    {
		$value = $this->CleanValue( $value, $param );    
	    }
	    
	return $all;
    }
    
 
    private function CleanValue( $value, array $param = array() )
    {
	    
	    foreach ($this->cleaners as $cleaner)
	    {
		    $value = $cleaner->clean( $value, $param );
	    }
	    
	    return $value;
    }

}