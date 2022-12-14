<?php

namespace App\Http\Controllers;

use App\Http\Controllers\FomopeHelper;

class FomopeTitularizacion extends FomopeHelper {
	//public $_d;

	public function __construct($obj) {
		parent::__construct($obj);
	}
	/**/
	public function fomope() {
		parent::minimal();
		$this->movimiento = $this->_data->movto;
		$this->cr = intval($this->_data->cr);
		$this->justificacion="";
		$this->horas = $this->_data->horas;		
		
	}
}

/*********************************************************************/