<?php

class Router
{
	private $routers;

	public function __construct() 
	{
		$routersPath = ROOT . '/config/routers.php';
		$this->routers = include($routersPath);
	}

	private function getURI() {
		if( !empty($_SERVER['REQUEST_URI']) ) {
			return trim($_SERVER['REQUEST_URI'], '/');
		}
	}

	public function run() {
		$uri = $this->getURI();

		foreach( $this->routers as $uriPattern => $path ) {
			if (preg_match("~$uriPattern~", $uri)) {
				$internalRoute = preg_replace("~$uriPattern~", $path, $uri);

				$segments = explode('/', $internalRoute);

				$controllerName = ucfirst(array_shift($segments)) . 'Controller';

				$actionName = 'action' . ucfirst(array_shift($segments));

				$parameters = $segments;

				$controllerFile = ROOT . '/controllers/' . $controllerName . '.php';

				if( file_exists($controllerFile) ) {
					include_once($controllerFile);
				}

				$controllerObject = new $controllerName;

				$result = call_user_func_array(array($controllerObject, $actionName), $parameters);

				if ($result != null) {
					break;
				}
			}
		}
	}
}



?>