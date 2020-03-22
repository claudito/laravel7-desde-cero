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



		// $codigo       =  "001";
		// $descripcion  =  "Arroz";
		// $unidad       =  "Kg";

		// Articulo::create([

		// 	'codigo'	  =>$codigo,
		// 	'descripcion' =>$descripcion,
		// 	'unidad' 	  =>$unidad

		// ]);	

		// Articulo::where('codigo',$codigo)
		// ->update([

		// 	'descripcion' => $descripcion,
		// 	'unidad'	  => $unidad	

		// ]);

		// return Articulo::all();

		// return Articulo::find(1);//id

		// return Articulo::where('codigo','001')
		// ->get();

			// Articulo::find(1)
			// 	->delete();

		// Articulo::where('codigo','002')
		// ->delete();




	}


}
