<?php

	//$confidencial = "wow so private, yet confidential?";
	$language = "PHP";
	$titulo = 'MejorandoPHP';

	//Llamando una funcion
	view('home', compact('language','titulo'));