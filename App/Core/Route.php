<?php
/**
 * @author 		Rifqi Khoeruman Azam <rifqinewbi@gmail.com>
 * @copyright 	(c) 2017-2018 Rifqi Khoeruman Azam. All Rights Reserved.
 */


namespace App\Core;

class Route
{
	private $controller = '\App\Controllers\HomeController';
	private $method 	= 'Index';
	private $params 	= [''];
	private $url;

	public function __construct()
	{
		if(isset($_GET['url'])){
			$this->url = explode('/',trim(ucwords($_GET['url'])));
			$this->controller = '\App\Controllers\\'.$this->url[0].'Controller';
		}
		$controllerName = substr(ltrim($this->controller,'\\'), strrpos($this->controller, '\\'));

		if(file_exists('../'.Config::PATH_CONTROLLERS.$controllerName.'.php')){
			$this->controller = new $this->controller;

			if(isset($this->url[1]) && $this->url[1] != NULL){
				$this->method = $this->url[1];
			}
			if(count($this->url) > 2){
				unset($this->url[0]);unset($this->url[1]);
				$this->params = $this->url;
			}
			if(method_exists($this->controller, $this->method)){
				call_user_func_array([$this->controller, $this->method], $this->params);
			}
		}else{
			require_once '../'.Config::PATH_VIEWS.'errors/404.php';
		}
	}
}