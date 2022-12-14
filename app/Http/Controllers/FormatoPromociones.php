<?php
namespace App\Http\Controllers;

class FormatoPromociones extends FormatoHelper{
	
	public function __construct($obj) {
		parent::__construct($obj);
	}
	/****************/
	public function reporte() {
		parent::minimal();
		//$this->movimiento = $this->_data->movimiento;
		$this->movimiento = $this->_data->movimiento;
		//Datos del sustituto
		$this->rfc_sustituto = $this->_data->rfc_sustituto;
		$this->nombre_sustituto = $this->_data->nombre_sustituto;
		$this->curp_sustituto = $this->_data->curp_sustituto;
		$this->clave_sustituto =$this->_data->clave_sustituto; 
		$this->estructura_sustituto = $this->_data->estructura_sustituto;
		$this->cr_sustituto = $this->_data->cr;
		$this->codigo_sustituto = trim(substr($this->_data->clave_sustituto,12,7));
		$this->descr_cr_sustituto = $this->get_descr_cr_sustituto();
		$this->descr_codigo_sustituto = $this->get_descr_codigo_sustituto();
		//
		$this->clave_presupuestal = $this->_data->clave_presupuestal;
		$this->estructura = $this->_data->estructura;
		$this->cr = $this->_data->cr_sustituto;
		$x = $this->get_descr_cr($this->cr);
		$this->descr_cr = $x->descr;
		$this->codigo = trim(substr($this->_data->clave_presupuestal,12,7));
		$this->descr_codigo = $this->get_descr_codigo();
		//
		$this->clave_sustituto =$this->_data->clave_sustituto; 
		$this->estructura_sustituto = $this->_data->estructura_sustituto;
		$this->cr_sustituto = $this->_data->cr;
		$this->codigo_sustituto = trim(substr($this->_data->clave_sustituto,12,7));
		$this->descr_cr_sustituto = $this->get_descr_cr_sustituto();
		$this->descr_codigo_sustituto = $this->get_descr_codigo_sustituto();
		//
		$this->inggob = $this->get_inggob_sust();
		$this->ingssa = $this->get_ingssa_sust();
		// dOMICILIO
		$this->numero_int =" ";
		//
		$this->horas = intval($this->_data->horas);
		$this->motivo = $this->_data->motivo;
		$this->efectos_del= substr($this->_data->efectos_del,8,2).
			substr($this->_data->efectos_del,5,2).			
			substr($this->_data->efectos_del,0,4);
		//$this->efectos_del = is_object($this->_data->efectos_del)?date_format($this->_data->efectos_del,"Ymd"):"";
		//$this->efectos_al = $this->_data->efectos_al!=null?date_format($this->_data->efectos_al,"Ymd"):"";
		//
		//$this->inggob =$this->_data->vigencia_del;
		//$this->ingssa = $this->_data->vigencia_del;
		$this->genero = $this->_data->genero;
		$this->civil = $this->_data->civil;
		$this->hijos = 99; //99 no marcar
		//$this->estructura = $this->_data->estructura;
		$this->justificacion = strlen($this->_data->justificacion) > 5?:"";
		$this->quinquenio = $this->_data->quinquenio;

		parent::reporte();
	}
}
