<?php

namespace App\Http\Controllers;

use App\Models\Movimiento;
use App\Http\Controllers\FomopeHelper;

class FomopePromociones extends FomopeHelper{
	
	public function __construct($obj) {
		parent::__construct($obj);
	}
	/****************/
	public function fomope() {
		parent::minimal();
		//$this->movimiento = $this->_data->movto;
		$this->cr = intval($this->_data->cr);
		//datos de la persona a ser sustituida
		$this->nombre_sustituto = $this->_data->nombre_sustituto;
		$this->rfc_sustituto = $this->_data->rfc_sustituto;
		$this->curp_sustituto = $this->_data->curp_sustituto;
		$this->clave_sustituto = $this->_data->clave_sustituto;
		$this->estructura_sustituto = $this->_data->estructura_sustituto;
		$this->cr_sustituto = $this->_data->cr_sustituto;
		$this->estado_nac = "X";
		
		$this->horas = $this->_data->horas;
		$this->justificacion ="0";
		$this->efectos_del = $this->_data->efectos_del;
		$this->efectos_al = $this->_data->efectos_al;
		$this->motivo = $this->_data->motivo;
		//$this->cr = intval($this->_data->cr);
		$this->quinquenio="";
		if ($this->movimiento == 5001) {
			$this->quinquenio = $this->_data->quinquenio;
		}
	}
}
/*********************************************************************/