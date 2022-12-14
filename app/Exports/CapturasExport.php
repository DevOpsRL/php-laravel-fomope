<?php

namespace App\Exports;

use App\Models\Captura;
use Maatwebsite\Excel\Concerns\WithEvents;
//
use Maatwebsite\Excel\Events\BeforeWriting;
use Maatwebsite\Excel\Files\LocalTemporaryFile;
use Maatwebsite\Excel\Excel;
    

class CapturasExport implements WithEvents
{
    /**
    * @return \Illuminate\Support\Collection
    */
    
    private $tpl;
    public function __construct(int $a, int $q){
        $this->anio = $a;
        $this->quincena = $q;

    }

    public function registerEvents():array{

        $el = $this->elementos()->count();
        $this->tpl = 'tpl_constancia_form.xlsx';
        if ($el < 15){
            $this->tpl = 'tpl_constancia_form.xlsx';
        }else {
            $this->tpl='tpl_constancia_large.xlsx';
        }

        return [
            BeforeWriting::class => function(BeforeWriting $event) {

                $templateFile = new LocalTemporaryFile(storage_path($this->tpl));
                $event->writer->reopen($templateFile, Excel::XLSX);
                $sheet = $event->writer->getSheetByIndex(0);

                $this->populateSheet($sheet);
                
                $event->writer->getSheetByIndex(0)->export($event->getConcernable()); // call the export on the first sheet

                return $event->getWriter()->getSheetByIndex(0);
            },
        ];
    }

    private function populateSheet($sheet){

        $d = $this->elementos();
        //if (is_object($d)){
            $l = 8;
            $pattern = array();
            $repl = array(" ", " ");
            $pattern[0]= '/\,/';
            $pattern[1]='/\//';

            foreach ($d as $row) {
                // code...
                $r = $l-7;
                $s = $row->nombre;
                $n = preg_replace($pattern, $repl,$s );
                // Populate the static cells
                $sheet->setCellValue('A'.$l,$r);
                $sheet->setCellValue('B'.$l, $row->rfc);
                $sheet->setCellValue('C'.$l, $n);
                $sheet->setCellValue('D'.$l, $row->clave_presupuestal);
                $sheet->setCellValue('E'.$l, $row->cr);
                $sheet->setCellValue('F'.$l, $row->movimiento);
                $d = ''.date_format(date_create($row->vigencia_del), "d/m/Y");
                $sheet->setCellValue('G'.$l, $d);
                $l++;
            }
          /*  $sheet->setCellValue('C8', $this->va);
            $sheet->setCellValue('D8', $this->vb);
            $sheet->setCellValue('E8', $this->vc);
            $sheet->setCellValue('F8', $this->vc);
            $sheet->setCellValue('G8', $this->vc);*/
       // } 
            $sheet->setCellValue('G5', $this->quincena."/".$this->anio);

    }
    /**/
    private function elementos()
    {
        $q = Captura::query()->select('rfc','nombre','clave_presupuestal', 'cr', 'movimiento', 'vigencia_del')
            ->where('anio', $this->anio)
            ->where('quincena', $this->quincena)
            ->orderBy('movimiento')
            ->orderBy('cr')
            ->get();

        //dd($q);

        return $q;
    }
    /**/
}
