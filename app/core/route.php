<?php
class Route
{
	static function start()
	{
		if(isset($_REQUEST['controller'])) {
			$controllerRequest = $_REQUEST['controller'] ? $_REQUEST['controller']: 'Home';
		} else {
			$controllerRequest = 'Home';
		}
		if(isset($_REQUEST['action'])) {
			$actionRequest = $_REQUEST['action'] ? $_REQUEST['action']: 'index';
		} else {
			$actionRequest = 'index';
		}
		
		// Формирование контроллера 
		$controllerClass = $controllerRequest . "Controller";
		$controllerPath = "app/controllers/" . $controllerClass . ".php";

		if (file_exists($controllerPath)) {
			include $controllerPath;
		} else {
			echo 'error in '. $controllerPath;
		}
		// Создание экземлпяра контроллера
		$controller = new $controllerClass;

		// Формирование модели
		$modelClass = $controllerRequest . 'Model';
		$modelPath = "app/models/" . $modelClass . '.php';

		if (file_exists($modelPath)) {
			include $modelPath;

			// Создание экземляра модели
			$model = new $modelClass;
			// Инициализация модели
			$controller->model = $model;
		}

		// Формирование экшена контроллера
		if (str_contains($actionRequest, '?')) {
			$actionName = explode("?", substr_replace($action_name, 'Action', strpos($action_name, '?'), 0))[0];
		} else {
			$actionName = $actionRequest . 'Action';
		}

		if (method_exists($controller, $actionName)) {
			$controller->$actionName();
		} else {
			echo 'error in '. $actionName;
		}
	}

	function ErrorPage404()
	{
		$host = 'http://' . $_SERVER['HTTP_HOST'] . '/';
		header('HTTP/1.1 404 Not Found');
		header("Status: 404 Not Found");
		header('Location:' . $host . '404');
	}
}
