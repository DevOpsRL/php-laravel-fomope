<?php
namespace App\Http\Controllers;

class FormatoLicencias extends FormatoHelper{
	
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
		$this->justificacion = strlen($this->_data->justificacion)>2?$this->_data->justificacion:" ";
		$this->vigencia_al = $this->_data->vigencia_al;
		// y poner a los sustitutos en modo fake
		//$this->rfc_sustituto ="";
		$this->cr_sustituto = "        ";
		$this->postal ="";
		$this->numero_int = "";
		$this->motivo ="    ";
		$this->civil = "    ";
		$this->genero= "";
		$this->hijos = 99; //nomarcar
		parent::reporte();
	}


}
