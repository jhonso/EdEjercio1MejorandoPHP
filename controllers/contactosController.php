<?php
	// // include_once 'config.php';
	// // include_once 'helpers.php';
	// view('contactos');

class ContactosController {
	public funciton indexAction()
	{

	}

	public funciton ciudadAction($ciudad)
	{
		exit('contactos' . $ciudad);
	}
}