<?php 

class Router 
{
	public $routes;

	function __construct()
	{
		$this->routes = require ROOT.'/application/config/Routes.php';
	}

	private function gerUri()
	{
		$uri = $_SERVER['REQUEST_URI'];
		if (!empty($uri)) {
			return trim($uri, '/');
		}
	}

	public function run()
	{

		$uri = $this->gerUri();

		foreach ($this->routes as $path => $value) {

			if (preg_match("~$path~", $uri, $matches)) {

				$internal_path = preg_replace("~$path~", $value, $uri);
				$segment = explode('/', $internal_path);
				$controller_name = ucfirst(array_shift($segment)).'Controller';
				$action_name = 'action'.ucfirst(array_shift($segment));
				$controller_file = ROOT.'/application/controllers/'.$controller_name.'.php';
				$params = $segment;

				if (file_exists($controller_file)) {
					require ($controller_file);
				}

				$controller_obj = new $controller_name();
				$result = call_user_func_array(array($controller_obj, $action_name), $params);

				if ($result) {
					break;
				}
			}
		}
	}
}
