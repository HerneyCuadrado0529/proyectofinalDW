<?php

function cargarControlador($controlador)
{

	$nombreControlador = ucwords($controlador) . "Controller";
	$archivoControlador = 'Controller/' . ucwords($nombreControlador) . '.php';

	if (!is_file($archivoControlador)) {

		$archivoControlador = 'Controller/' . CONTROLADOR_PRINCIPAL . 'Controller.php';
	}
	require_once $archivoControlador;
	$control = new $nombreControlador();
	return $control;
}

function cargarAccion($controller, $accion, $id = null)
{

	if (isset($accion) && method_exists($controller, $accion)) {
		if ($id == null) {
			$controller->$accion();
		} else {
			$controller->$accion($id);
		}
	} else {
		$controller->ACCION_PRINCIPAL();
	}
}
