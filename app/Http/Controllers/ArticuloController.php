<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use  App\Articulo;

class ArticuloController extends Controller
{
    //
	function index(Request $request){

		if($request->ajax()){


		  return array('data'=>Articulo::all());


		}


		return view('inventarios.articulos.index');


	}


	function  agregar(Request $request){


		try {


			$articulo = Articulo::where('codigo',$request->codigo)
			->count();


			if($articulo>0){


			return  array(

				'title' => 'Código Duplicado',
				'text'  => 'Intente de Nuevo',
				'icon'  => 'warning',
				'timer' =>  3000

			);	


			}else{


			Articulo::create([

				'codigo' 		=> $request->codigo,
				'descripcion'	=> $request->descripcion,
				'unidad'		=> $request->unidad

			]);


			return  array(

			'title' => 'Buen Trabajo',
			'text'  => 'Registro Agregado',
			'icon'  => 'success',
			'timer' =>  3000

		);	




			}



		

			
		} catch (\Illuminate\Database\QueryException $e) {


		return  array(

			'title' => 'Error',
			'text'  =>   (env('APP_DEBUG')==true) ? $e->getCode() : $e->getMessage() ,
			'icon'  => 'error',
			'timer' => 10000

		);	


		}


	}


	function  actualizar(Request $request){


		try {
			

			Articulo::where('id',$request->id)
			->update([

				'descripcion' => $request->descripcion,
				'unidad'	  => $request->unidad

			]);

			return  array(

				'title' => 'Buen Trabajo',
				'text'  => 'Registro Actualizado',
				'icon'  => 'success',
				'timer' =>  3000

			);	



		} catch (Exception $e) {


			return  array(

			'title' => 'Error',
			'text'  =>   (env('APP_DEBUG')==true) ? $e->getCode() : $e->getMessage() ,
			'icon'  => 'error',
			'timer' => 10000

		);	



			
		}



	}

	function  eliminar(Request $request){


		try {
			

		Articulo::where('id',$request->id)
		->delete();

	
		return  array(

			'title' => 'Buen Trabajo',
			'text'  => 'Registro Eliminado',
			'icon'  => 'success',
			'timer' =>  3000

		);	


		} catch (\Illuminate\Database\QueryException $e) {


			return  array(

			'title' => 'Error',
			'text'  =>   (env('APP_DEBUG')==true) ? $e->getCode() : $e->getMessage() ,
			'icon'  => 'error',
			'timer' => 10000

		);	



			
		}
		





	}

	function  consultar(Request $request){


	$articulo = Articulo::where('id',$request->id)->first();


	return $articulo;

	


	}




}
