<?php
namespace App\Http\Controllers;

class FormatoTitularizacion extends FormatoHelper{
	
	public function __construct($obj) {
		parent::__construct($obj);
	}
	/****************/
	public function reporte() {
		parent::minimal();
		
		$this->movimiento = $this->_data->movimiento;
		$this->inggob ="";
		$this->ingssa ="";
		$this->numero_int="";
		//$this->genero = $this->_data->genero;
		$this->civil = $this->_data->estado_civil;
		$this->estructura = $this->_data->estructura;
		$this->justificacion = "";
		$this->postal=" ";
		//$this->numero_int=0;
		$this->motivo="    ";
		$this->genero = "";
		$this->cr_sustituto = "          ";
		$this->hijos = 99;//no marcar 
		parent::reporte();
	}


}
