<?php 

namespace App;

use App\Controllers;

class Router {

	private static $routes = [];
	private $controller, $action, $notFound;

	public function initializate()
	{

		$url = explode('/', $_GET['url']);
		$url[0] = '/'.$url[0];

		if(empty($url[0])) {

			$this->controller = DEFAULT_CONTROLLER;
			$this->action = DEFAULT_ACTION;

		} else {

			$method = $_SERVER['REQUEST_METHOD'];

			foreach(self::$routes as $route) {

				list($request, $path, $controller, $action) = $route;

				if($request == $method && $path == $url[0]) {

					$this->controller = $controller;
					$this->action = $action;

				}

			}

			if(empty($this->controller)) {

				$this->get404();

			} else {

				if(!$this->hasAction($this->controller, $this->action)) {

					$this->get404();

				}

			}

			unset($url[0]);
			$action = $this->action;

			$output = call_user_func_array([$this->controller, $this->action], $url);

			exit($output);

		}

	}

	public function set404(Object $controller, String $action)
	{
		$this->notFound = $controller->$action();
	}

	private function get404()
	{
		exit($this->notFound);
	}

	public function get(String $route, Object $controller, String $action) 
	{
		self::$routes[] = ['GET', $route, $controller, $action];
	}

	public function post(String $route, Object $controller, String $action) 
	{
		self::$routes[] = ['POST', $route, $controller, $action];
	}

	private function hasAction(Object $controller, String $action)
	{
		return (method_exists($controller, $action));
	}


}