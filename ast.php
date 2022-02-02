<?php

require 'vendor/autoload.php';

$classReflection = new ReflectionClass('App\Http\Resources\ObjectItemResource');
//
//$object = new \App\Http\Resources\ObjectItemResource([]);
//$objectReflection = new ReflectionObject($object);

var_dump($classReflection->getMethod('toArray')->getDocComment());
