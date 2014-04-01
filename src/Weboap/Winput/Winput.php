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

    
    private function getAll()
    {
	return $this->request->all();
    }
    
    
    
    /**
    * Get key of the request.
    * @param str $key key to pull from the request
    * @param array  ['trim' => bool $trim, 'sanitize' => bool $sanitize, 'clean' => bool $clean, 'image'=> bool $image ] 
    * @param str default value
    * @return str
    */

    public function get($key, array $param = array(), $default = null  )
    {
	    $all = $this->getAll();
	    
	    return $this->clean( array_get($all, $key, $default) , $param );

    }
 
 
    /**
    * Get all of the input and files for the request.
    * @param array  ['trim' => bool $trim, 'sanitize' => bool $sanitize, 'clean' => bool $clean ]  
    * @return array
    */
    public function all( array $param = array() )
    {
	return $this->clean( $this->getAll() , $param);
    }
    
    
    /**
    * Get only designated inputs.
    * @param array $keys 
    * @param array  ['trim' => bool $trim, 'sanitize' => bool $sanitize, 'clean' => bool $clean ]  
    * @return array
    */
    
    public function only( array $keys, array $param = array() )
    {
	    $only = array_only($this->getAll(), $keys) + array_fill_keys($keys, null);
	  
	    return $this->clean($only, $param);
    }
    
    /**
    * Get only designated inputs.
    * @param array $keys 
    * @param array  ['trim' => bool $trim, 'sanitize' => bool $sanitize, 'clean' => bool $clean ] 
    * @return array
    */
    public function  except( array $keys, array $param = array() )
    {
        $input = $this->getAll();
	
	foreach ($keys as $key) array_forget( $input, $key);
       
	return $this->clean( $input, $param);
    }    
    

    
    
    /**
    * Clean individual values.
    * by running them thru the cleaners. if we encounter an array send
    * it back to cleanArray
    * @param str $value
    * @param array  ['trim' => bool $trim, 'sanitize' => bool $sanitize, 'clean' => bool $clean, 'image'=> bool $image ] 
    * @return array
    */
    private function clean( $str, array $param = array() )
    {
	    
	    if ( is_array($str) )
	    {
		    while ( list($key) = each($str) )
		    {
			    $str[$key] = $this->clean($str[$key], $param);
		    }

		    return $str;
	    }
	    
	    
	    foreach ($this->cleaners as $cleaner)
	    {
		$str = $cleaner->clean( $str, $param );
	    }
	  
	   return ($str != "" ? $str : NULL);
	    
    }

}