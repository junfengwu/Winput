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

    public function get($key, $default = null, array $options = array() ) {
	
	   $value = Input::get($key, $default);
	   
	   return $this->CleanValue( $value );
	  
   
    }
 
    /**
    * Get all of the input and files for the request.
    *
    * @param bool $trim
    * @param bool $sanitize
    * @param bool $clean
    * 
    * @return array
    */
    
    public function all( array $options = array() )
    {
	   $all = Input::all();
     
	    foreach ($all as &$value)
	    {
		$value = $this->CleanValue( $value );    
	    }
	    
	return $all;
    }
    
 
    private function CleanValue( $value )
    {
	    foreach ($this->cleaners as $cleaner)
	    {
		    $value = $cleaner->clean( $value );
	    }
	    
	    return $value;
    }

}