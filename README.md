Laravel 4 Input Filtered
==============

Yet another Laravel 4 XSS (CI Based) & html input filter for laravel4


### Installation


The recommended way to install Winput is through composer.

## Step 1

Just add to  `composer.json` file:

``` json
{
    "require": {
        "weboap/winput": "dev-master"
    }
}
```

then run 
``` php
php composer.phar update
```

## Step 2

Add
``` php
'Weboap\Winput\WinputServiceProvider'
``` 

to the list of service providers in app/config/app.php

## Step 3 

Run

``` php
php artisan config:publish weboap/winput
``` 

to publish config 

``` php
app/config/packages/weboap/winput
``` 

By Default Winput Trim, Clean,and Sanitize Input, visit the config file that you just published to tune it.



###  Usage



``` php
$input = Winput::all();

or

$input = Winput::all(array('trim'=> false, 'clean'=> false, 'sanitize'=> false)); // result as laravel Input::all()


$key1 = Winput::get('key1')

$key2 = Winput::get('key2', array('trim'=> false, 'clean'=> false, 'sanitize'=> false, 'image'=> false)) // result as laravel Input::get('key2')

$key3 = Winput::get('key3', [], $default );

$input = Winput::only(['key1','key2',...]);

$input = Winput::only(['key1','key2',...], array('trim'=> false, 'clean'=> false, 'sanitize'=> false)) // result as laravel Input::only(['key1','key2',...])

$input = Winput::except(['key1','key2',...]);

$input = Winput::except(['key1','key2',...], array('trim'=> false, 'clean'=> false, 'sanitize'=> false)) // result as laravel Input::except(['key1','key2',...])


```


### Credits

This Package use CI Security class and "ezyang/htmlpurifier" package.

Enjoy!
 



