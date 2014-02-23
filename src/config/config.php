<?php  

return array(
    
   'trim'      => true,
    
   'clean' 	=> true,
    
    'sanitize'  => true,
    
    'cache'     => storage_path().'/cache',
    
    'html_options' => array(
                   'Core.Encoding'             =>  'UTF-8',
                   'HTML.Doctype'            =>  'XHTML 1.0 Transitional',
                   'HTML.AllowedElements'       =>  'pre,strike,abbr,acronym,code,em,del,cite,blockquote,b,i,p,q,br,ul,ol,li,a,strong',
                   'Attr.AllowedClasses'        => '',
                   'HTML.AllowedAttributes'     =>  'cite,lang',
                   'AutoFormat.RemoveEmpty'     => true
                    
                    )
      
  
  );