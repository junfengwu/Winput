<?php namespace Weboap\Winput;


interface WinputManager {

  public function   get($key, array $param = array(), $default = null  );
  
  public function   all( array $param = array() );
  
  public function   only( array $keys, array $param = array() );

  public function   except( array $keys, array $param = array() );
  
}