<?php

	// //$confidencial = "wow so private, yet confidential?";
	// $language = "PHP";
	// $titulo = 'MejorandoPHP';

	// //Llamando una funcion
	// view('home', compact('language','titulo'));

class HomeController {

	public function indexAction()
	{
//return new ArrayObject();
		return new View('home', ['titulo' => 'Mejorando PHP']);

		$view->execute();
		
	}

}