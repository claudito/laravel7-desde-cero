<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Almacen;

class AlmacenController extends Controller
{
    //

	public function index(Request $request){

		if($request->ajax()){

		$result = Almacen::all();

			return array('data'=>$result);

		}


		return view('inventarios.almacen.index');

	}


	public function  agregar(Request $request){

		try {


		$agregar  = Almacen::where('codigo',$request->codigo)
		->count();

		if($agregar>0){

		return array(

			'title' => 'Código Duplicado',
			'text'  => 'Intente con otro Código',
			'icon'  => 'warning'

		);


		}else{


		Almacen::create([

			'codigo'		=>$request->codigo,
			'descripcion'	=>$request->descripcion

		]);
			

		return array(

			'title' => 'Buen Trabajo',
			'text'  => 'Registro Agregado',
			'icon'  => 'success'

		);





		}


		} catch (\Illuminate\Database\QueryException $e) {

			return array(

			  'title' => 'Error',
			  'text'  => $e->getMessage(),
			  'icon'  => 'error'

			);
			
		}


	}



	function actualizar(Request $request){

		try {


		Almacen::where('id',$request->id)
		->update([

			'descripcion'=>$request->descripcion

		]);

			return array(

			'title' => 'Buen Trabajo',
			'text'  => 'Registro Actualizado',
			'icon'  => 'success'

		);

			
		} catch (\Illuminate\Database\QueryException  $e) {
			
			return array(

			  'title' => 'Error',
			  'text'  => $e->getMessage(),
			  'icon'  => 'error'

			);


		}

	}


		function consultar(Request $request){

		try {


		$result = Almacen::where('id',$request->id)
		->first();


		return $result;


			
		} catch (\Illuminate\Database\QueryException  $e) {
			
			return array(

			  'title' => 'Error',
			  'text'  => $e->getMessage(),
			  'icon'  => 'error'

			);


		}

	}





}
