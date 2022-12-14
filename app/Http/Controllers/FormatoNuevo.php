<?php
namespace App\Http\Controllers;

class FormatoNuevo extends FormatoHelper{
	
	public function __construct($obj) {
		parent::__construct($obj);
	}
	/****************/
	public function reporte() {
		parent::minimal();
		//$this->movimiento = $this->_data->movimiento;
	}
}
