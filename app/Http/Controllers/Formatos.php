<?php

namespace App\Http\Controllers;

//use App\Models\Captura;
//use App\Models\Plantilla;
//use App\Models\Genero;
//use App\Models\Civil;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

use setasign\Fpdi\Fpdi;
//
$pathr = Storage::disk('public')->path('fonts/');
define('FPDF_FONTPATH',$pathr);

class Formatos {

	protected $fmp;
	protected $pdf;
	protected $datos;

	public function __construct($datos) {
		$this->fmp = new \stdClass();
		$this->pdf = new Fpdi();
		$this->datos = $datos;

	}

	public function pdfgen(){
		// add a page
		$this->pdf->AddPage($orientation='P', $size='letter');

		$ruta = Storage::disk('public')->path('tpl__fomopeform.pdf');
		// set the source file
		$this->pdf->setSourceFile($ruta);
		// import page 1
		$tplIdx = $this->pdf->importPage(1);
		$this->pdf->useTemplate($tplIdx, 0,0);
		//
		$this->pdf->SetFont('helvetica');
		$this->pdf->SetXY(100, 30);
		$this->pdf->Write(0,"test. tetetetet " );

		// save or download pdf gen
		$finame="test.pdf";
		$this->pdf->Output('D',$finame);
		//return response()->make($this->pdf, 200, [
		//    'Content-Type' => 'application/pdf',
		//    'Content-Disposition' => 'attachment; filename="'.$finame.'"'
		//]);

	}
}