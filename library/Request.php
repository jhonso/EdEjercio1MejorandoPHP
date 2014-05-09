<?php

class Request {

	protected $url;  //no se puede leer fuera de la clase, son las propiedades.

	protected $controller;

	protected $defaultController = 'home';

	protected $defaultAction = 'index';

	protected $params = array();

	public function __construct($url) //se puede leer desde fuera de la clase, son los metodos generalmente.
	{
			$this->url = $url;


			//team/about/cvander
			//team/about//freddier
			//teal


$segments = explode('/', $this->getUrl());

$this->resolveController($segments);

$this->resolveAction($segments);

$this->resolveParams($segments);

	}


	public function resolveController(&$segments)
	{
		$this->controller = array_shift($segments);

		if (empty($this->controller))
		{
			$this->controller = $this->defaultController;
		}
	}

	public function resolveAction(&$segments)
	{
		$this->action = array_shift($segments);

		if (empty($this->action))
		{
			$this->action = $this->defaultAction;
		}
	}


	public function resolveParams(&$segments)
	{
		$this->params = $segments;
	}




	public function getUrl()
	{
		return $this->url;
	}

	public function getController()
	{
		return $this->controller;
	}

	public function getControllerClassName()
	{
		return Inflector::camel($this->getController()) . 'Controller';	 
	}

	public function getControllerFileName()
	{
		return 'controllers/' . $this->getController() . '.php';
	}

	public function getAction()
	{
		return $this->action;
	}

	public function getActionMethodName()
	{
		return Inflector::camel($this->getAction()) . 'Action';	 


	}

	public function getParams()
	{
		return $this-params;
	}

	public function execute()
	{
		$controllerClassName = $this->getControllerClassName();
		$controllerFileName = $this->getControllerFileName();
		$actionMethodName = $this->getActionMethodName();
		$params = $this->getParams();

		if( ! file_exists($controllerFileName))
		{
			exit('controlador no existe');
		}

		require $controllerFileName;

		$controller = new $controlerClassName();

		$response = call_user_func_array([$controller, $actionMethodName], $params);

		if($response instanceof Response)
		{
			$response->execute();
		}
		else
		{
			exit('invalid response')
		}
	}

}