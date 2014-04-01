<?php namespace Weboap\Winput;


use Illuminate\Http\Request;

class Winput {

  
    /**
    * The Cleaners array
    * @array cleaners
    */   
    protected $cleaners;
    
    /**
    * Instance of Illuminate\Http\Request
    * @object $request
    */   
    protected $request;
    
    /**
    * Class constructor
    *
    * @return        void
    */
    public function __construct( array $cleaners = array(), Request $request )
    {
	$this->cleaners = $cleaners;
	$this->request = $request;
    }

    
    /**
    * Get key of the request.
    * @param str $key key to pull from the request
    * @param array  [bool $trim, bool $sanitize, bool $clean ] 
    * @param str default value
    * @return str
    */

    public function get($key, array $param = array(), $default = null  ) {
	
	   $value = $this->request->get($key, $default);
	   
	   return $this->cleanValue( $value, $param );
	  
   
    }
 
 
    /**
    * Get all of the input and files for the request.
    * @param array  [bool $trim, bool $sanitize, bool $clean ] 
    * @return array
    */
    public function all( array $param = array() )
    {
	   $all = $this->request->all();
     
	return $this->cleanArray($all, $param);
    }
    
    
    /**
    * Get only designated inputs.
    * @param array $keys 
    * @param array  [bool $trim, bool $sanitize, bool $clean ] 
    * @return array
    */
    
    public function only( array $keys, array $param = array() )
    {
	   $only = $this->request->only( $keys );
       
	return $this->cleanArray($only, $param);
    }
    
    /**
    * Get only designated inputs.
    * @param array $keys 
    * @param array  [bool $trim, bool $sanitize, bool $clean ] 
    * @return array
    */
    public function  except( array $keys, array $param = array() )
    {
	   $except = $this->request->except( $keys );
       
	return $this->cleanArray($except, $param);
    }    
    
    /**
    * Run thru the input array and send the values to be cleaned.
    * @param array $input 
    * @param array  [bool $trim, bool $sanitize, bool $clean ] 
    * @return array
    */
    private function cleanArray(array $input, array $param = array())
    {
	 foreach ($input as &$value)
	    {
		$value = $this->cleanValue( $value, $param );    
	    }
	 return $input;   
    }
    
    
    /**
    * Clean individual values.
    * by running them thru the cleaners. if we encounter an array send
    * it back to cleanArray
    * @param str $value
    * @param array  [bool $trim, bool $sanitize, bool $clean ] 
    * @return array
    */
    private function cleanValue( $value, array $param = array() )
    {
	    //value coming from the request class can be null
	    if( is_null( $value ) ) return null;
	    
	    if( is_array( $value ) )
	    {
		$value = $this->cleanArray( $value, $param );
		
	    }
	    else
	    {
		 foreach ($this->cleaners as $cleaner)
		{
		    $value = $cleaner->clean( $value, $param );
		}
	    }
	    
	    
	    return $value;
    }

}