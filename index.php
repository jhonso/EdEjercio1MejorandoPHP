<?php

/*
El frontend controller se 
encarga de configurar nuestra aplicacion
*/

	require 'config.php';
	require 'helpers.php';

	//Library

	require 'library/Request.php';
	require 'library/Inflector.php';
	require 'library/View.php'
	require 'library/Response.php';


	// Llamar al controlador indicado

	//controller($_GET['url']);

	//var_dump($_GET);

	if (empty($_GET['url']))
		{
			$url = "";
		}
	else
	{
		$url = $_GET['url'];
	}

	$request = new Request($url);
	$request->execute();