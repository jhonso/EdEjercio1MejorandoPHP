<?php

class View extends Response {
	function __construct($template, $vars = array())
	{
		$this->template = $template;
		$this->vars = $vars;
	}

	pubic function execute()


	

	public function execute()
	{
		extract($vars);

		call_user_func(function(){
			extract($vars);
			require "views/$template.tpl.php";
		});
	}
}