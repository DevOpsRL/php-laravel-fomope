<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Plantilla;

class BuscarController extends Controller
{
    public function search(Request $request){

        $termino = $request->get('term');
        $term = '%'.strtoupper($termino).'%';

        //dump($term);

        $res = Plantilla::where('nombre','LIKE',$term)
            ->get();

        //dd($res);
        if ($res) {
            $y = array();
            foreach ($res as $r) {
                $y[] = json_encode($r);
            }
            //dd($y);
            return ($y);
        }
        
    }
    /*************************************/
    public function search_to_capturas(Request $request){

        $termino = $request->get('term');
        $term = '%'.strtoupper($termino).'%';

        //dump($term);

        $res = Captura::where('nombre','LIKE',$term)
            ->get();

        //dd($res);
        if ($res) {
            $y = array();
            foreach ($res as $r) {
                $y[] = json_encode($r);
            }
            //dd($y);
            return ($y);
        }
        
    }
}
