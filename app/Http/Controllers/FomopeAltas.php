<?php

namespace App\Http\Controllers;

use App\Http\Controllers\FomopeHelper;

class FomopeAltas extends FomopeHelper{
	
	public function __construct($obj) {
		parent::__construct($obj);
	}
	/****************/
	public function fomope() {
		parent::minimal();
		$this->movimiento = $this->_data->movto;
		$this->cr = intval($this->_data->cr);
		//datos de la persona a ser sustituida
		$this->nombre_sustituto = $this->_data->nombre_sustituto;
		$this->rfc_sustituto = $this->_data->rfc_sustituto;
		$this->curp_sustituto = $this->_data->curp_sustituto;
		//
		$this->calle = $this->_data->calle;
		$this->numero_ext = $this->_data->numero_ext;
		$this->numero_int = $this->_data->numero_int != null? $this->_data->numero_int:"";
		$this->colonia = $this->_data->colonia;
		$this->municipio = $this->_data->municipio;
		$this->codigo_postal = $this->_data->codigo_postal;
		$this->postal = $this->_data->codigo_postal;
		$this->estado = $this->_data->estado;
		$this->horas = $this->_data->horas;
		$this->telefono = $this->_data->telefono;
		$this->hijos = $this->_data->hijos;
		/// Datos del sustituido
		//$this->rfc_sustituto = $this->_data->rfc;
		//$this->nombre_sustituto = $this->_data->nombre;
		$this->efectos_del = $this->_data->efectos_del;
		$this->efectos_al = $this->_data->efectos_al;
		$this->motivo = $this->_data->motivo;
		//$this->cr = intval($this->_data->cr);
	}
}
/*********************************************************************/