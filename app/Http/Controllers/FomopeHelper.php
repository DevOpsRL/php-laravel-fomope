<?php

namespace App\Http\Controllers;

use App\Models\Rubricas;
use App\Models\Movimiento;
class FomopeHelper {
	//
	protected $rfc;
	protected $nombre;
	protected $curp;
	// DAtos del domicilio
	protected $calle;
	protected $numero_ext;
	protected $numero_int;
	protected $colonia;
	protected $postal;
	protected $municipio;
	protected $estado;
	protected $telefono;
	protected $genero;
	protected $civil;
	protected $hijos;
	// Datos laborales actuales
	protected $clave_presupuestal;
	protected $cr;
	protected $estructura;
	protected $tipo_trabajador;
	// Datos del sustituto
	protected $rfc_sustituto;
	protected $nombre_sustituto;
	protected $clave_sustituto;
	protected $curp_sustituto;
	protected $cr_sustituto;
	protected $estructura_sustituto;
	protected $efectos_del;
	protected $efectos_al;
	protected $motivo;
	// Datos del fomope
	protected $elaboracion;
	protected $lote;
	protected $documento;
	protected $horas;
	protected $movimiento;
	protected $tipo_movimiento;
	protected $get_grupo_movimiento;
	protected $anio;
	protected $quincena;
	//protected $tipo_trabajador;
	protected $vigencia_del;
	protected $vigencia_al;
	protected $justificacion;
	// datos del pie de fomope
	protected $elabora_nombre;
	protected $elabora_cargo;
	protected $vobo_nombre;
	protected $vobo_cargo;
	protected $autoriza_nombre;
	protected $autoriza_cargo;
	protected $rubricas;
	// A-x, quinquenio
	protected $quinquenio;
	
	//
	protected $_data;

	public function __construct($obj){

		//$_fmp = new \stdClass();
		// Datos de un solo trabajador
		$this->_data = $obj;
		//dd($this->_data->movimiento);
		$this->rfc=" ";
		$this->nombre= " ";
		$this->curp=" ";
		// Datos domiciliarios
		$this->calle="";
		$this->numero_ext = "";
		$this->numero_int ="";
		$this->colonia = "";
		$this->postal =0;
		$this->telefono ="";
		$this->estado ="";
		$this->municipio ="";
		$this->genero="";
		$this->civil ="";
		$this->hijos =0;
		// Datos laborales actuales
		$this->clave_presupuestal= " ";
		$this->cr= 0;
		$this->estructura= " ";
		$this->tipo_trabajador= 0;
		// Datos del sustituto
		$this->rfc_sustituto= " ";
		$this->nombre_sustituto= " ";
		$this->clave_sustituto= " ";
		$this->cr_sustituto= 0;
		$this->estructura_sustituto="";
		$this->efectos_del= null;
		$this->efectos_al= null;
		$this->motivo= 0;
		// Datos del fomope
		$this->anio = $obj->anio;
		$this->quincena = $obj->quincena;
		$this->elaboracion= " ";
		$this->lote= " ";
		$this->documento= 0;
		$this->horas= 0;
		$this->movimiento= intval($this->_data->movimiento);
		$this->grupo_movimiento = 0;
		//dd($this->movimiento);
		$this->tipo_movimiento=0;
		//$this->tipo_trabajador= "";
		$this->vigencia_del= null;
		$this->vigencia_al= null;
		$this->justificacion= "(no vale: error";
		// datos del pie de fomope
		$this->elabora_nombre= " ";
		$this->elabora_cargo= " ";
		$this->vobo_nombre= " ";
		$this->vobo_cargo= " ";
		$this->autoriza_nombre= " ";
		$this->autoriza_cargo= " ";
		$this->rubricas= "xxxx";
		//
		$this->quinquenio="";
		
	}
	/**************************************/
	
	/* Fomato: datos basico del fomope*/
	protected function fomope()
	{

		//
		return;
	}
	/************************************/
	protected function minimal() {
		$this->rfc=$this->_data->rfc;
		$this->nombre = $this->_data->nombre;
		$this->clave_presupuestal = $this->_data->clave_presupuestal;
		$this->curp = $this->_data->curp;
		$this->estructura = $this->_data->estructura;

		// Datos del domicilio
		$this->civil = $this->_data->estado_civil;
		$this->genero = $this->_data->genero;

		//Datos del fomope

		$this->elaboracion =$this->_data->elaboracion; //date_format($this->_data->elaboracion, "YYYY-mm-dd");
		$this->vigencia_del = $this->_data->vigencia_del;
		$this->lote = $this->_data->lote;
		$this->documento = $this->_data->documento;
		$this->horas = $this->_data->horas;
		$this->movimiento = intval($this->_data->movimiento);
		$t = Movimiento::where('movto', $this->movimiento)->first();
		//dd($t);
		$this->grupo_movimiento = $t->grupo;
		//$this->pos_tipo_movimiento($this->movimiento);
		//$this->grupo = $t->grupo;
		//
		$this->justificacion = strlen($this->_data->justificacion) > 2?$this->_data->justificacion:"0";
		//
		$r = $this->rubricacion();
		$this->elabora_nombre = $r->elabora_nombre;
		$this->elabora_cargo = $r->elabora_cargo;
		$this->vobo_nombre = $r->vobo_nombre;
		$this->vobo_cargo = $r->vobo_cargo;
		$this->autoriza_nombre = $r->autoriza_nombre;
		$this->autoriza_cargo = $r->autoriza_cargo;
		$this->rubricas = $r->rubricas;
		$this->quinquenio ="";

	}

	public function pos_horas($h){ ///eliminar , no functional
		switch($h){
			case '8': return 1; //caudrito 1
					break;
			case '7': return 2; //cuadrito 2
					break;
			case '6': return 3; // cuadrito 3
					break;
			default: return 0;
		}
	}

	public function pos_tipo_movimiento($t) {

		//$p = substr($t,1,1);
		// determinar que posision corresponde al movimiento
		//return intval($p);
		//$s = Movimiento::where('movto', $t)->first();
		//return intval($s->grupo);
		$this->tipo_movimiento;
	}
	//public function pos_civil(){
	//	$p = intval($this->civil);
	//	return $p;
	//}
	//
	public function rubricacion(){

		$r = Rubricas::where('habilitado','=',1)->first();
		return $r;
	}
	/***************************** getters *************/
	public function get_rfc() {
		return $this->rfc;
	}
	public function get_nombre() {
		return $this->nombre;
	}
	public function get_curp(){
		return $this->curp;
	}
	///////////// domicilio:begin
	public function get_calle(){
		return $this->calle;

	}
	public function get_numero_ext(){
		return $this->numero_ext;
		
	}
	public function get_numero_int(){
		return $this->numero_int;
		
	}
	public function get_colonia(){
		return $this->colonia;
		
	}
	public function get_postal(){
		return $this->postal;
		
	}
	public function get_municipio(){
		return $this->municipio;
		
	}
	public function get_estado(){
		return $this->estado;
		
	}
	public function get_telefono(){
		return $this->telefono;
		
	}
	
	public function get_genero(){
		return $this->genero;
		
	}
	public function get_civil(){
		return $this->civil;
		
	}
	///////////////// domicilio: end
	public function get_clave_presupuestal(){
		return $this->clave_presupuestal;
	}
	public function get_cr() {
		return $this->cr;
	}
	public function get_estructura() {
		return $this->estructura;
	}
	public function get_trabajador(){	
		return $this->tipo_trabajador;
	}
		// Datos del sustituto
	public function get_rfc_sustituto() {
		return $this->rfc_sustituto;
	}
	public function get_nombre_sustituto(){
		return $this->nombre_sustituto;
	}
	public function get_curp_sustituto(){
		return $this->curp_sustituto;
	}
	public function get_clave_sustituto() {
		return $this->clave_sustituto;
	}
	public function get_cr_sustituto() {
		return $this->cr_sustituto;
	}
	public function get_estructura_sustituto(){
		return $this->estructura_sustituto;
	}

	public function get_efectos_del(){
		return $this->efectos_del;
	}
	public function get_efectos_al(){
		return $this->efectos_al;
	}
	public function get_motivo() {
		return $this->motivo;
	}
	/*******/ 
	public function get_anio() {
		return $this->anio;

	}
	public function get_quincena(){
		return $this->quincena;
	}
	public function get_elaboracion() {
		// Datos del fomope
		return $this->elaboracion;
	}
	public function get_lote() {
		return $this->lote;
	}
	public function get_documento() {
		return $this->documento;
	}

	public function get_horas() {
		return $this->horas;
	}
	public function get_movimiento() {
		return $this->movimiento;
	}
	//public function get_tipo_movimiento() {
	//	return $this->movimiento;
	//}
	public function get_grupo_movimiento($tipo) {
		$p = Movimiento::where('movto',$tipo)->first();
		return $p->grupo;
		//dd($tipo);
		//return $this->grupo;
	}
		//$this->tipo_trabajador= "";
	public function get_vigencia_del(){
		return $this->vigencia_del;
	}
	public function get_vigencia_al() {
		return $this->vigencia_al;
	}
	public function get_justificacion(){
		return $this->justificacion;
	}
		// datos del pie de fomope
	public function get_elabora_nombre() {
		return $this->elabora_nombre;
	}
	public function get_elabora_cargo() {
		return $this->elabora_cargo;
	}

	public function get_vobo_nombre(){
		return $this->vobo_nombre;
	}
	public function get_vobo_cargo(){	
		return $this->vobo_cargo;
	}
	public function get_autoriza_nombre(){
		return $this->autoriza_nombre;
	}
	public function get_autoriza_cargo(){
		return $this->autoriza_cargo;
	}	
	public function get_rubricas(){
		return $this->rubricas;
	}
	public function get_hijos(){
		return $this->hijos;
	}
	public function get_quinquenio() {
		return $this->quinquenio;
	}
}

/*********************************************************************/