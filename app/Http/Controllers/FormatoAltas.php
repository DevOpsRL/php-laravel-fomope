<?php
namespace App\Http\Controllers;

class FormatoAltas extends FormatoHelper{
	
	public function __construct($obj) {
		parent::__construct($obj);
	}
	/****************/
	public function reporte() {
		parent::minimal();
		//$this->movimiento = $this->_data->movimiento;
		$this->movimiento = $this->_data->movimiento;
		$this->rfc_sustituto = $this->_data->rfc_sustituto;
		$this->nombre_sustituto = $this->_data->nombre_sustituto;
		$this->curp_sustituto = $this->_data->curp_sustituto;
		// dOMICILIO
		$this->calle = $this->_data->calle;
		$this->numero_ext = $this->_data->numero_ext;

		$this->numero_int = $this->_data->numero_int;
		//$this->numero_int = $this->_data->numero_int> 0?$this->_data->numero_int:"";
		$this->colonia = $this->_data->colonia;
		$this->municipio = $this->_data->municipio;
		$this->postal = $this->_data->codigo_postal;
		$this->codigo_postal = $this->_data->codigo_postal;
		$this->estado = $this->_data->estado;
		$this->telefono = $this->_data->telefono;
		//
		$this->horas = intval($this->_data->horas);
		$this->motivo = $this->_data->motivo;
		$this->efectos_del= substr($this->_data->efectos_del,8,2).
			substr($this->_data->efectos_del,5,2).			
			substr($this->_data->efectos_del,0,4);
		//$this->efectos_del = is_object($this->_data->efectos_del)?date_format($this->_data->efectos_del,"Ymd"):"";
		//$this->efectos_al = $this->_data->efectos_al!=null?date_format($this->_data->efectos_al,"Ymd"):"";
		//
		$this->inggob =$this->_data->vigencia_del;
		$this->ingssa = $this->_data->vigencia_del;
		$this->genero = $this->_data->genero;
		$this->civil = $this->_data->civil;
		$this->hijos =  $this->_data->hijos;
		$this->estructura = $this->_data->estructura;
		$this->justificacion = strlen($this->_data->justificacion) > 5?:"";
		$this->cr_sustituto ="";

		parent::reporte();
	}
}
