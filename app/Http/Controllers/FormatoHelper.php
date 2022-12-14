<?php
namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;

use App\Models\Rubricas;
use App\Models\Plantilla;
use App\Models\Movimiento;
use App\Models\Centro;
use App\Models\Codigo;

use setasign\Fpdi\Fpdi;
//
$pathf = Storage::disk('public')->path('fonts/');
define('FPDF_FONTPATH',$pathf);
define('LRTB','');

class FormatoHelper{
	
	protected $fmp;
	protected $pdf;
	protected $data;
	//
	protected $rfc;
	protected $nombre;
	protected $curp;
	protected $codigo;
	protected $descr_cr;
	protected $descr_codigo;
	// datos del domicilio
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
	protected $estado_nac;
	// Datos laborales actuales
	protected $clave_presupuestal;
	protected $cr;
	protected $estructura;
	protected $tipo_trabajador;
	protected $titra;
	// Datos del sustituto
	protected $rfc_sustituto;
	protected $nombre_sustituto;
	protected $clave_sustituto;
	protected $codigo_sustituto;
	protected $descr_codigo_sustituto;
	protected $cr_sustituto;
	protected $descr_cr_sustituto;
	protected $estructura_sustituto;
	protected $efectos_del;
	protected $efectos_al;
	protected $motivo;
	protected $inggob;
	protected $ingssa;
	// Datos del fomope
	protected $quincena;
	protected $anio;
	protected $elaboracion;
	protected $lote;
	protected $documento;
	protected $horas;
	protected $movimiento;
	protected $tipo_movimiento;
	protected $grupo_movimiento;
	protected $hijos;
	//protected $grupo;
	
	//
	//protected $programa;
	//protected $uresp;

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

	//quinquenio 
	protected $quinquenio;

	public function __construct($datos) {
		$this->pdf = new Fpdi();
		// Datos de un solo trabajador
		$this->_data = $datos;
		$this->rfc="";
		$this->nombre= " ";
		$this->curp=" ";
		$this->codigo="";
		$this->descr_cr ="";
		$this->descr_codigo ="";
		//
		$this->calle = "";
		$this->numero_ext = "";
		$this->numero_int = "";
		$this->colonia = "";
		$this->municipio = "";
		$this->codigo_postal = "";
		$this->estado = "";
		$this->hijos=99;
		// Datos laborales actuales
		$this->clave_presupuestal= " ";
		$this->codigo="";
		$this->cr= 0;
		$this->estructura= " ";
		$this->tipo_trabajador= " ";
		$this->relacion ="";
		$this->inggob = null;
		$this->ingssa = null;
		// Datos del sustituto
		$this->rfc_sustituto= " ";
		$this->nombre_sustituto= " ";
		$this->clave_sustituto= " ";
		$this->codigo_sustituto="";
		$this->descr_codigo_sustituto="";
		$this->cr_sustituto= 0;
		$this->descr_cr_sustituto="";
		$this->estructura_sustituto;
		$this->efectos_del= null;
		$this->efectos_al= null;
		$this->motivo= 0;
		// Datos del fomope
		$this->elaboracion= " ";
		$this->lote= " ";
		$this->documento= 0;
		$this->horas= 0;
		$this->movimiento= 0;
		$this->tipo_movimiento=0;
		$this->grupo_movimiento=0;
		//$this->tipo_trabajador= "";
		$this->vigencia_del= null;
		$this->vigencia_al= null;
		$this->justificacion= " ";
		// datos del pie de fomope
		$this->elabora_nombre= " ";
		$this->elabora_cargo= " ";
		$this->vobo_nombre= " ";
		$this->vobo_cargo= " ";
		$this->autoriza_nombre= " ";
		$this->autoriza_cargo= " ";
		$this->rubricas= "JDSM*YHR";
		$this->quinquenio="";

	}
	//
	protected function reporte() {
		// add a page
		//dd($this->cr);

		$this->pdf->AddPage($orientation='P', $size='letter');
		$ruta = Storage::disk('public')->path('tpl__fomopeform.pdf');
		// set the source file
		$this->pdf->setSourceFile($ruta);
		// import page 1
		$tplIdx = $this->pdf->importPage(1);
		$this->pdf->useTemplate($tplIdx, 0,0);
		//
		$this->pdf->SetFont('Arial','',8);
/******************************/
		
		$this->pdf->SetXY(100, 30);
		$t = utf8_decode( $this->get_elaboracion($this->elaboracion));
		$this->pdf->Write(0,$t );
		$a =[20,27,33,40,46,52,57,63,68,74,79,85,90]; //RFC
		for($r=0; $r < 13; $r++) {
			$this->pdf->SetXY($a[$r], 45);
			$t = substr($this->rfc,$r,1);
			$this->pdf->Write(0,$t );
		}
		$a =[
			100,107,113,
			118,123,128,
			132,138,143,
			148,154,159,
			164,169,175,
			180,185,190];
		for($r=0; $r < 18; $r++) { // curps
			$this->pdf->SetXY($a[$r], 45);
			$t = substr($this->curp, $r,1);
			$this->pdf->Write(0,$t );
		}
		///// nombre del trabajador
		$this->pdf->SetXY(22, 49);
		$nomini = $this->apm($this->nombre); //nhombre , apellios
		
		$t = utf8_decode($nomini->ap);
		$this->pdf->Cell(47,4,$t,$border=LRTB, $ln=0, $align='C', $fill=false);
		$this->pdf->SetXY(80, 49);
		$t = utf8_decode($nomini->am);
		$this->pdf->Cell(47,4,$t,$border=LRTB, $ln=0, $align='C', $fill=false);
		$this->pdf->SetXY(140, 49);
		$t = utf8_decode($nomini->nombre);
		$this->pdf->Cell(47,4,$t,$border=LRTB, $ln=0, $align='C', $fill=false);
		//////////////////////////////////////////////////////////////////////////////
		// domicilio de l trabakjador
		$this->pdf->SetXY(22, 59);
		$t = $this->calle;
		if (strlen($t) > 20) {
			$this->pdf->SetFont('Arial','',7);
		} else {
			$this->pdf->SetFont('Arial','',8);
		}
		$this->pdf->Cell(100,4,$t,$border=LRTB, $ln=0, $align='C', $fill=false);
		//
		$this->pdf->SetFont('Arial','',8);
		$this->pdf->SetXY(130, 59);
		$t = utf8_decode($this->numero_ext);
		$this->pdf->Cell(25,4,$t,$border=LRTB, $ln=0, $align='C', $fill=false);
		$this->pdf->SetXY(165, 59);
		$t = $this->numero_int; //num_int (not available)
		$this->pdf->Cell(27,4,$t,$border=LRTB, $ln=0, $align='C', $fill=false);
		//
		$this->pdf->SetXY(22,65);
		$t = utf8_decode($this->colonia); //colonia
		//$t = $this->calle;
		if (strlen($t) > 20) {
			$this->pdf->SetFont('Arial','',7);
		} else {
			$this->pdf->SetFont('Arial','',8);
		}
		$this->pdf->Cell(40,4,$t,$border=LRTB, $ln=0, $align='C', $fill=false);
		//
		$this->pdf->SetFont('Arial','',8);
		$this->pdf->SetXY(72,65); //CODIGO POSTAL
		$t = $this->postal;
		$this->pdf->Cell(20,4,$t,$border=LRTB, $ln=0, $align='C', $fill=false);
		//
		$this->pdf->SetFont('Arial','',7);
		$this->pdf->SetXY(105,65); //DELGACION O MUNICIPIO
		$t = utf8_decode($this->municipio);
		$this->pdf->Cell(30,4,$t,$border=LRTB, $ln=0, $align='C', $fill=false);
		//
		$this->pdf->SetFont('Arial','',8);
		$this->pdf->SetXY(140,65); //ESTADO
		$t = utf8_decode($this->estado);
		$this->pdf->Cell(22,4,$t,$border=LRTB, $ln=0, $align='C', $fill=false);
		//
		$this->pdf->SetXY(165,65); //TELEFONO
		$t = utf8_decode($this->telefono);
		$this->pdf->Cell(30,4,$t,$border=LRTB, $ln=0, $align='C', $fill=false);
		//
		$this->pdf->SetXY(22,72); //BANCO
		$t =  "";
		$this->pdf->Cell(40,4,$t,$border=LRTB, $ln=0, $align='C', $fill=false);
		//
		$this->pdf->SetXY(20,86); //GENERO
		$t =$this->genero;
		$this->pdf->Cell(20,8,$t,$border=LRTB, $ln=0, $align='C', $fill=false);
		//
		$this->pdf->SetXY(41,86);//estado civil
		$t = $this->pos_civil($this->civil);
		$this->pdf->Cell(15,8,$t,$border=LRTB, $ln=0, $align='C', $fill=false);
		//
		//jjjjjjjjjjjjjjjjjjjjjjjjjjjj
		$y =intval($this->hijos);
		if ( $y < 99) {
			$a = [88, 82];
			
			$this->pdf->SetXY(57,$a[$y]);//hijos?
			$t = "X";
			$this->pdf->Cell(15,8,$t,$border=LRTB, $ln=0, $align='C', $fill=false);
		}
		//jjjjjjjjjjjjjjjjjjjjjjjjjjjj
		$this->pdf->SetXY(67,86);//FEHA DO NACIMENTO
		$t = $this->estado_nac;
		$this->pdf->Cell(30,8,$t,$border=LRTB, $ln=0, $align='C', $fill=false);
		//
		//******************DATOS ACTUALES
		//******************************************************
		$fecha = $this->inggob;
		$fi = $this->get_YMD($this->inggob);
		//
		$this->pdf->SetXY(127,82); //DIA
		$t =$fi->dia;
		$this->pdf->Cell(5,8,$t,$border=LRTB, $ln=0, $align='C', $fill=false);
		//
		$this->pdf->SetXY(132,82); //MES
		$t =$fi->mes;
		$this->pdf->Cell(5,8,$t,$border=LRTB, $ln=0, $align='C', $fill=false);
		//
		$this->pdf->SetXY(139,82); //ANIO
		$t =$fi->anio;
		$this->pdf->Cell(5,8,$t,$border=LRTB, $ln=0, $align='C', $fill=false);
		// ingreso ssa
		$fecha = $this->ingssa;
		$fi = $this->get_YMD($this->ingssa);
		$this->pdf->SetXY(127,88); //DIA
		$t =$fi->dia;
		$this->pdf->Cell(5,8,$t,$border=LRTB, $ln=0, $align='C', $fill=false);
		//
		$this->pdf->SetXY(132,88); //MES
		$t =$fi->mes;
		$this->pdf->Cell(5,8,$t,$border=LRTB, $ln=0, $align='C', $fill=false);
		//
		$this->pdf->SetXY(139,88); //ANIO
		$t =$fi->anio;
		$this->pdf->Cell(5,8,$t,$border=LRTB, $ln=0, $align='C', $fill=false);
		//xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
		$this->pdf->SetXY(45,205); // CENTRO DE RESP
		$t = $this->descr_cr;
		$this->pdf->Cell(80,4,$t,$border=LRTB, $ln=0, $align='L', $fill=false);
		$this->pdf->SetXY(45,208);
		$t = $this->descr_codigo;
		$this->pdf->Cell(80,4,$t,$border=LRTB, $ln=0, $align='L', $fill=false);
		//
		//xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
		
		//----------------------------
		$vd = $this->get_YMD($this->vigencia_del);
		//$vd =$this->vigencia_del;
		$this->pdf->SetXY(32,156);//VIGENCIA DIA
		$t = str_pad($vd->dia,"0",2,STR_PAD_LEFT);
		$this->pdf->Cell(12,3,$t,$border=LRTB, $ln=0, $align='C', $fill=false);
		$this->pdf->SetXY(45,156);//MES
		$t = str_pad($vd->mes,"0",2,STR_PAD_LEFT);
		$this->pdf->Cell(10,3,$t,$border=LRTB, $ln=0, $align='C', $fill=false);
		$this->pdf->SetXY(57,156);//ANIO
		$t = str_pad($vd->anio,"0",4,STR_PAD_LEFT);
		$this->pdf->Cell(10,3,$t,$border=LRTB, $ln=0, $align='C', $fill=false);
		//
		$val = $this->get_YMD($this->vigencia_al);
		$this->pdf->SetXY(32,159); //VIGENCIA DIA
		//$val =$this->vigencia_al;
		$t = $val->dia;
		$this->pdf->Cell(12,3,$t,$border=LRTB, $ln=0, $align='C', $fill=false);
		$this->pdf->SetXY(45,159);//MES
		$t = $val->mes;
		$this->pdf->Cell(10,3,$t,$border=LRTB, $ln=0, $align='C', $fill=false);
		$this->pdf->SetXY(57,159);//ANIO
		$t =$val->anio;
		$this->pdf->Cell(10,3,$t,$border=LRTB, $ln=0, $align='C', $fill=false);
		//
		$this->pdf->SetXY(67,156); //DOCTO
		$t =$this->documento;
		$this->pdf->Cell(20,6,$t,$border=LRTB, $ln=0, $align='C', $fill=false);
		//
		$this->pdf->SetXY(90,156); //NUMEMP
		$t ="";//$this->numemp;
		$this->pdf->Cell(30,6,$t,$border=LRTB, $ln=0, $align='C', $fill=false);
		//
		$this->pdf->SetXY(122,156); //TTRAB
		$t =$this->relacion;
		$this->pdf->Cell(25,6,$t,$border=LRTB, $ln=0,$align='C', $fill=false);
		//
		$this->pdf->SetXY(150,156); //LOTE
		$t =$this->lote;
		$this->pdf->Cell(18,6,$t,$border=LRTB, $ln=0, $align='C', $fill=false);
		//
		$this->pdf->SetXY(170,156); //QNA QQ/AAAA
		$t =$this->quincena."/".$this->anio;
		$this->pdf->Cell(25,6,$t,$border=LRTB, $ln=0, $align='C', $fill=false);
		//
		$a=[57,62,67,72]; //CODIGO MOVIMIENTO
		$l=4;
		for($r = 0; $r < $l; $r++) {
			$this->pdf->SetXY($a[$r],163); 
			$t = substr($this->movimiento, $r,1);
			$this->pdf->Cell(5,4,$t,$border='', $ln=0, $align='C', $fill=false);
		}
		//
		$this->pdf->SetXY(95,162); //DESCRIPCION MOVIMEINTO
		$a = $this->get_tipo_movimiento($this->movimiento);
		$t = $a->descripcion;
		if ( strlen($t) > 35){
			$this->pdf->SetFont('Arial','', 6);
		}
		$this->pdf->Cell(60,4,$t,$border='', $ln=0, $align='L', $fill=false);
		//
		$this->pdf->SetFont('Arial','',8);
		$a=[167,170,173,176, 179]; // TIPO MOVIEMITO
		$b =[47, 97, 149];
		switch( intval($this->grupo_movimiento)){
			case 1: $x=1; $y=2;break; //bajas
			case 2: $x=2; $y=0;break; //licencias
			case 3: $x=1; $y=3;break;
			case 4: $x=0; $y=0;break; //altas
			case 8: $x=2; $y=3;break; // 
			case 5: $x=0; $y=2;break; //promociones
			case 7: $x=0; $y=3;break; //descensos
			case 9: $x=0; $y=4;break; //titularizaciones
			default: $x=0;$y=4;break;
		}
		//for($r = 0; $r <4; $r++) {
			$this->pdf->SetXY($b[$x],$a[$y]); //96
			$t = "X";
			$this->pdf->Cell(4,4,$t,$border='', $ln=0, $align='C', $fill=false);
		//}
		//
		$a=[16,171,174,177,179]; // RELACION LABORAL
		
		//for($r = 0; $r <5; $r++) {
		$this->pdf->SetFont('Arial','',8);
		$this->pdf->SetXY(186,$a[4]);
		$t = "X";
		$this->pdf->Cell(4,4,$t,$border=0, $ln=0, $align='C', $fill=false);
		//}
		//
		$p = $this->get_claves($this->clave_presupuestal, $this->estructura);
		$this->pdf->SetXY(20,192); //CLAVE PRESUPUESTAL
		$t =$p->programa;
		$this->pdf->Cell(20,6,$t,$border=LRTB, $ln=0, $align='C', $fill=false);
		$this->pdf->SetXY(40,192);
		$t =$p->uresp;
		$this->pdf->Cell(15,6,$t,$border=LRTB, $ln=0, $align='C', $fill=false);
		$this->pdf->SetXY(57,192);
		$t =$p->partida;
		$this->pdf->Cell(15,6,$t,$border=LRTB, $ln=0, $align='C', $fill=false);
		$this->pdf->SetXY(72,192);
		$t =$p->codigo;
		$this->pdf->Cell(24,6,$t,$border=LRTB, $ln=0, $align='C', $fill=false);
		$this->pdf->SetXY(95,192);
		$t =$p->pg;
		$this->pdf->Cell(10,6,$t,$border=LRTB, $ln=0, $align='C', $fill=false);
		$this->pdf->SetXY(106,192);
		$t =$p->ai;
		$this->pdf->Cell(10,6,$t,$border=LRTB, $ln=0, $align='C', $fill=false);
		$this->pdf->SetXY(116,192);
		$t =$p->g;
		$this->pdf->Cell(15,6,$t,$border=LRTB, $ln=0, $align='C', $fill=false);
		$this->pdf->SetXY(132,192);
		$t =$p->f;
		$this->pdf->Cell(15,6,$t,$border=LRTB, $ln=0, $align='C', $fill=false);
		$this->pdf->SetXY(148,192);
		$t =$p->sf;
		$this->pdf->Cell(16,6,$t,$border=LRTB, $ln=0, $align='C', $fill=false);
		$this->pdf->SetXY(164,192);
		$t =$p->puesto;
		$this->pdf->Cell(31,6,$t,$border=LRTB, $ln=0, $align='C', $fill=false);
		//
		$a=[50,56,62,67,73,79,84,90,95,101]; //CR NUM
		for($r = 0; $r < 10; $r++) {
			$this->pdf->SetXY($a[$r],201);
			$t = substr($this->cr,$r, 1);
			$this->pdf->Cell(6,4,$t,$border=0, $ln=0, $align='C', $fill=false);
		}
		// horas 8, 7 , 6
		$a = [ 201, 205, 208];//horario asignado
		if (intval($this->horas) > 0) {
			//$p0 = $this->horas % 8;
			$this->pdf->SetXY(154,$a[8-$this->horas]);
			$t = "X";
			$this->pdf->Cell(4,4,$t,$border=LRTB, $ln=0, $align='C', $fill=false);
		//
		} else {
			$this->pdf->SetXY(154,$a[0]);
			$t = " ";
			$this->pdf->Cell(4,4,$t,$border=LRTB, $ln=0, $align='C', $fill=false);
		}
		//
		$this->pdf->SetFont('Arial','',6);
		$this->pdf->SetXY(20,239); //JUSTIFICACION
		$t = utf8_decode(strtoupper($this->justificacion));
		$this->pdf->MultiCell(175,3,$t,$border=LRTB, $align='J', $fill=false);
		//
		/*********************************** BLOQUE ANTECEDNETES ****************/
		//
		$this->pdf->SetFont('Arial','',8);
		$p = $this->get_claves($this->clave_sustituto, $this->estructura_sustituto);
		$px = 101;
		$this->pdf->SetXY(47,$px); //CLAVE PRESUPUESTAL
		$t =$p->programa;
		$this->pdf->Cell(10,4,$t,$border=LRTB, $ln=0, $align='C', $fill=false);
		//
		$this->pdf->SetXY(57,$px);
		$t =$p->uresp;
		$this->pdf->Cell(10,4,$t,$border=LRTB, $ln=0, $align='C', $fill=false);
		$this->pdf->SetXY(67,$px);
		$t =$p->partida;
		$this->pdf->Cell(10,4,$t,$border=LRTB, $ln=0, $align='C', $fill=false);

		$this->pdf->SetXY(80,$px);
		$t =$p->codigo;
		$this->pdf->Cell(20,4,$t,$border=LRTB, $ln=0, $align='C', $fill=false);

		$this->pdf->SetXY(100,$px);
		$t =$p->pg;
		$this->pdf->Cell(10,4,$t,$border=LRTB, $ln=0, $align='C', $fill=false);

		$this->pdf->SetXY(110,$px);
		$t =$p->ai;
		$this->pdf->Cell(15,4,$t,$border=LRTB, $ln=0, $align='C', $fill=false);
		// grupo, funcion y subfuncion
		$this->pdf->SetXY(120,$px);
		$t =$p->g;
		$this->pdf->Cell(15,4,$t,$border=LRTB, $ln=0, $align='C', $fill=false);
		$this->pdf->SetXY(135,$px);
		$t =$p->f;
		$this->pdf->Cell(15,4,$t,$border=LRTB, $ln=0, $align='C', $fill=false);
		/////////////////////
		$this->pdf->SetXY(150,$px);
		$t =$p->sf;
		$this->pdf->Cell(15,4,$t,$border=LRTB, $ln=0, $align='C', $fill=false);
		////////////////////////
		$this->pdf->SetXY(170,$px);
		$t =$p->puesto;
		$this->pdf->Cell(21,4,$t,$border=LRTB, $ln=0, $align='C', $fill=false);
		///// quinquenio
		$this->pdf->SetXY(170,205);
		$t =$this->quinquenio;
		$this->pdf->Cell(21,4,$t,$border=LRTB, $ln=0, $align='C', $fill=false);
		//xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
		///// nombre del trabajador
		$this->pdf->SetFont('Arial','',8);
		$nomini = $this->apm($this->nombre_sustituto); //nhombre , apellios
		$this->pdf->SetXY(20, 124);
		$t = $nomini->ap;
		$this->pdf->Cell(50,4,$t,$border=LRTB, $ln=0, $align='C', $fill=false);
		//
		$this->pdf->SetXY(80, 124);
		$t = $nomini->am;
		$this->pdf->Cell(50,4,$t,$border=LRTB, $ln=0, $align='C', $fill=false);
		//
		$this->pdf->SetXY(145, 124);
		$t = $nomini->nombre;
		$this->pdf->Cell(50,4,$t,$border=LRTB, $ln=0, $align='C', $fill=false);
		//xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
		$this->pdf->SetFont('Arial','',8);
		$this->pdf->SetXY(20,239); //rfc sustituiffo
		$a=[34,40,46,52,56,62,68,73,79,84, 90, 95, 100]; // rfc sust
		for($r = 0; $r < 13; $r++) {
			$this->pdf->SetXY($a[$r],133);
			$t = substr($this->rfc_sustituto,$r, 1);
			$this->pdf->Cell(6,4,$t,$border=0, $ln=0, $align='C', $fill=false);
		}
		//xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
		$this->pdf->SetFont('Arial','',8);
		//$this->pdf->SetXY(20,239); //efectos sustituiffo
		$a=[40,46,51,56,62,68,73,79]; // efectos del
		for($r = 0; $r < 8; $r++) {
			$this->pdf->SetXY($a[$r],140);
			$t = substr($this->efectos_del,$r, 1);
			$this->pdf->Cell(6,4,$t,$border=0, $ln=0, $align='C', $fill=false);
		}
		//***xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
		$this->pdf->SetFont('Arial','',8);
		//$this->pdf->SetXY(20,239); //efectos sustituiffo
		$a=[95, 100,105,111,116,121,127,132]; // efectos al
		for($r = 0; $r < 8; $r++) {
			$this->pdf->SetXY($a[$r],140);
			$t = substr($this->efectos_al,$r, 1);
			$this->pdf->Cell(6,4,$t,$border=0, $ln=0, $align='C', $fill=false);
		}
		//xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
		$this->pdf->SetFont('Arial','',8);
		//$this->pdf->SetXY(20,239); //movtivo ssutituto
		$a=[170,175,180,185]; // motivo baja
		for($r = 0; $r < 4; $r++) {
			$this->pdf->SetXY($a[$r],136);
			$t = substr($this->motivo,$r, 1);
			$this->pdf->Cell(6,4,$t,$border=0, $ln=0, $align='C', $fill=false);
		}
		//xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
		$a=[67,73,79,84,90,95,101,107,112,117]; //CR NUM
		for($r = 0; $r < 10; $r++) {
			$this->pdf->SetXY($a[$r],116);
			$t = substr($this->cr_sustituto,$r, 1);
			$this->pdf->Cell(6,4,$t,$border=LRTB, $ln=0, $align='C', $fill=false);
		}
		//
		$this->pdf->SetXY(40,106);
		$t =$this->descr_cr_sustituto;
		$this->pdf->Cell(80,4,$t,$border=LRTB, $ln=0, $align='L', $fill=false);
		//get_descr_codigo_sustituto
		$this->pdf->SetXY(40,111);
		$t =$this->descr_codigo_sustituto;
		$this->pdf->Cell(80,4,$t,$border=LRTB, $ln=0, $align='L', $fill=false);
		//xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
		
		//
	/******************************/
		// save or download pdf gen
		
		//$finame=date_format(date_create("now"),"Ymd__His").".pdf";
		$finame= "{$this->rfc}__{$this->movimiento}__Q{$this->quincena}-{$this->anio}.pdf";
		$this->pdf->Output('I',$finame);
		/*
		return response()->make($this->pdf, 200, [
		    'Content-Type' => 'application/pdf',
		    'Content-Disposition' => 'attachment; filename="'.$finame.'"'
		]);
		*/
	}
	//
	protected function minimal() {

		//dd($this->_data);

		$this->rfc=$this->_data->rfc;
		$this->nombre = $this->_data->nombre;
		$this->clave_presupuestal = $this->_data->clave_presupuestal;
		$this->curp = $this->_data->curp;
		//Datos del fomope

		$this->elaboracion =$this->_data->elaboracion; //date_format($this->_data->elaboracion, "YYYY-mm-dd");
		$this->vigencia_del = $this->_data->vigencia_del;
		$this->vigencia_al = $this->_data->vigencia_al;
		$this->quincena = $this->_data->quincena;
		$this->anio = $this->_data->anio;
		$this->relacion = "FORMALIZADO";
		$this->lote = $this->_data->lote;
		$this->documento = $this->_data->documento;
		$this->horas =$this->_data->horas;
		$this->hijos = 99;
		//$this->movimiento = $this->_data->movto;

		$grpx = $this->get_tipo_movimiento(intval($this->_data->movimiento));
		//dd($grpx);
		$this->tipo_movimiento = $grpx->tipo;
		$this->grupo_movimiento = $grpx->grupo;
		$this->cr = $this->_data->cr;
		$t= $this->get_descr_cr($this->cr);
		$this->descr_cr = $t->descr;
		//dd($this->cr, $this->cr_descr);
		$this->codigo = trim(substr($this->_data->clave_presupuestal,12,7));
		
		$this->descr_codigo = $this->get_descr_codigo();
		//
		$this->justificacion = strlen($this->_data->justificacion) > 2?$this->_data->justificacion:" ";
		//
		$r = $this->rubricacion();
		$this->elabora_nombre = $r->elabora_nombre;
		$this->elabora_cargo = $r->elabora_cargo;
		$this->vobo_nombre = $r->vobo_nombre;
		$this->vobo_cargo = $r->vobo_cargo;
		$this->autoriza_nombre = $r->autoriza_nombre;
		$this->autoriza_cargo = $r->autoriza_cargo;
		$this->rubricas = $r->rubricas;
	}


	public function rubricacion(){
		$r = Rubricas::where('habilitado','=',1)->first();
		return $r;
	}

	public function get_elaboracion($d) {

		$anio = str_pad(substr($d,0,4),"0",4,STR_PAD_LEFT);
		$mes = str_pad(substr($d,5,2),"0",2,STR_PAD_LEFT);
		$dia = str_pad(substr($d,8,2),"0",2,STR_PAD_LEFT);
		$m = array(
			'01'=>'ENERO','02'=>'FEBRERO','03'=>'MARZO',
			'04'=>'ABRIL','05'=>'MAYO','06'=>'JUNIO',
			'07'=>'JULIO','08'=>'AGOSTO','09'=>'SEPTIEMBRE',
			'10'=>'OCTUBRE','11'=>'NOVIEMBRE','12'=>'DICIEMBRE'
			);
		$s = 'OAXACA DE JUÁREZ, OAX; '.$dia.' DE '.$m[$mes]." DE ".$anio;
		return $s;
		
	}
	public function apm($nom) {
		$x = new \StdClass();
		if (strlen($nom) > 5) {
			$ap = preg_split('/,/', $nom);
			$am = preg_split('/\//', $ap[1]);
			$nombre = $am[1];
			
			$x->ap = $ap[0];
			$x->am = $am[0];
			$x->nombre = $nombre;
			return $x;
		} else{
			$x->ap = "           ";
			$x->am = "";
			$x->nombre = "";
			return $x;
		}
	}

	public function pos_civil($civile){

		$i = intval($civile);
		$c = "UNION/LIBRE";
		$a = substr($this->genero, 0,1) =="M"?"O":"A";

		switch ($i){
			case 0:$c="";break;
			case 1: $c="SOLTER".$a;break;
			case 2: $c ="CASAD".$a;break;
			case 3: $c="DIVORCIAD".$a;break;
			default: $c =""; break;
		}

		return $c;
	}

	public function get_genero() {
		//return (substr($this->genero, 0,1) =="M"?"MASCULINO":"FEMENINO");
		return $this->genero;
	}

	public function get_YMD($text){


		$obj = new \stdClass();
		$obj->dia ='';
		$obj->mes='';
		$obj->anio='';

		if ($text != null){
			$d = date_create($text);
			$obj->dia = date_format($d, "d");
			$obj->mes = date_format($d, "m");
			$obj->anio = date_format($d, "Y");
		}

		return $obj;

	}

	public function get_ingresos(){

		$d = Plantilla::where('rfc',$this->rfc)->first();
		//dd($d);
		return $d; 

	}

	public function get_claves($c, $s) {
		$obj = new \stdClass();

		$obj->programa = substr($c, 0,4);
		$obj->uresp = substr($c,4,3);
		$obj->partida = substr($c,7,5);
		$obj->codigo = substr($c, 12,7);
		$obj->puesto = substr($c, -5);
		$obj->pg = substr($c, 19,2);
		$obj->ai = substr($c, 21,3);
		$obj->g = substr($s,0,1);
		$obj->f = substr($s,1,1);
		$obj->sf = substr($s,2,2);

		return $obj;
	}

	public function get_tipo_movimiento($tipo){
		$p = Movimiento::where('movto',$tipo)->first();
		return $p;
	}

	public function get_descr_cr($cr){

		$p = Centro::where('cr', $cr)->first();
		//dd($p);
		return $p;//->descr;
	}

	public function get_descr_codigo(){

		$p = Codigo::where('codigo', trim($this->codigo))->first();
		return $p->descr;
	}
	public function get_descr_cr_sustituto(){
		if (strlen($this->cr_sustituto < 7)) {
			return "";
		}
		$p = Centro::where('cr', intval($this->cr_sustituto))->first();
		return $p->descr;
	}

	public function get_descr_codigo_sustituto(){
		if (strlen(trim($this->codigo_sustituto) < 7)) {
			return "";
		}
		$p = Codigo::where('codigo', trim($this->codigo_sustituto))->first();
		return $p->descr;
	}

	public function get_inggob_sust(){
		$p = Plantilla::where('rfc',$this->rfc)->first();
		return $p->inggob;
	}
	public function get_ingssa_sust(){
		$p = Plantilla::where('rfc',$this->rfc)->first();
		return $p->ingssa;
	}
}
