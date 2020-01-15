<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Estado;
use Illuminate\Support\Facades\Response;


class MunicipioController extends Controller {

		private $estadoModel;

		public function __construct(Estado $estado){
				$this->estadoModel = $estado;
		}

		// public function index(){
		//     $estados = $this->estadoModel->lists('estado', 'id');
		//     return view('cidade', compact('estados'));
		// }

		public function getMunicipios($idEstado){
				$estado = $this->estadoModel->find($idEstado);
				$cidades = $estado->municipios()->getQuery()->get(['ibge', 'nome']);
				return Response::json($cidades);
		}
}
