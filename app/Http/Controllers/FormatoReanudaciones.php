<?php
namespace App\Http\Controllers;

class FormatoReanudaciones extends FormatoHelper{
	
	public function __construct($obj) {
		parent::__construct($obj);
	}
	/****************/
	public function reporte() {
		parent::minimal();
		
		$this->movimiento = $this->_data->movimiento;
		$this->inggob ="";
		$this->ingssa ="";
		$this->genero = $this->_data->genero;
		$this->civil = $this->_data->estado_civil;
		$this->estructura = $this->_data->estructura;
		$this->justificacion = $this->_data->justificacion;
		// y poner a los sustitutos en modo fake
		//$this->rfc_sustituto ="";
		$this->cr_sustituto = "        ";
		$this->postal ="";
		$this->numero_int = 0;
		$this->motivo ="    ";
		$this->civil = "    ";
		$this->genero= "";
		$this->hijos = 99; //nomarcar
		parent::reporte();
	}


}
