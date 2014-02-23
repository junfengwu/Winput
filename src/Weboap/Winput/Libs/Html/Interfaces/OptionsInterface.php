<?php namespace Weboap\Winput\Libs\Html\Interfaces;

interface OptionsInterface
{

public function setOptions(array $options);

public function getOptions();

public function setOption($key, $value);

public function getOption($key);
}