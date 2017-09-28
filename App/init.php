<?php


spl_autoload_register(function($className){
	$className = ltrim($className,'\\');
	$position = strrpos($className, '\\');
	$namespace = substr($className, 0, $position);
	$className = substr($className, $position+1);
	$fileName = str_replace('\\', '/', $namespace).'/'.$className.'.php';
	require_once '../'.$fileName;
});


const PATH_GLOBALS = '/hompimpav4/';

$route = new \App\Core\Route();