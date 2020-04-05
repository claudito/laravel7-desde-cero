@extends('layouts.app')

@section('content')


<div class="container">
	

	<div class="row">
		
	
	 	<div class="col-md-12">


		 <div class="form-group">
		 <button class="btn btn-primary btn-sm btn-agregar"><i class="fa fa-plus"></i> Agregar</button>
		 </div>

	 		
	
		 <div class="card">
		 	
			<div class="card-header">
				Almacen
			</div>

			<div class="card-body">
				
				
			<div class="table-responsive">
		 	
				<table id="consulta"  class="table">
						<thead>
								<tr>
									<th>Código</th>
									<th>Descripción</th>
									<th>Acciones</th>
								</tr>
						</thead>
				</table>

		  </div>





			</div>
	


		 </div>



	 	</div>


	</div>


</div>


	<!-- Formulario Agregar/Actualizar -->
	<form id="registro" autocomplete="off">
		
	
<div class="modal fade" id="modal-registro" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

      		@csrf
       
       <input type="hidden" name="id" class="id">
       <input type="hidden" name="ruta" class="ruta">
       <input type="hidden" name="type" class="type">
		
		<div class="form-group">
				
		 	<label>Código</label>
		 	<input type="text" name="codigo" 
		 	class="codigo form-control">

		</div>

		<div class="form-group">
				
		 	<label>Descripción</label>
		 	<input type="text" name="descripcion" 
		 	class="descripcion form-control" onchange="Mayusculas(this)">

		</div>
	



      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="submit" class="btn btn-primary btn-submit">Save changes</button>
      </div>
    </div>
  </div>
</div>






	</form>




<script>
	
	
 function loadData(){


 	$(document).ready(function(){

 		$('#consulta').DataTable({

 			destroy:true,
 			language:{

 				url:'{{ asset('js/spanish.json') }}'

 			},
 			ajax:{

 			 url:'{{ route('almacen.index') }}',
 			 type:'GET'

 			},
 			columns:[

 				{data:'codigo'},
 				{data:'descripcion'},
 				{data:null,render:function(data){


 				return `

					<button
					
					data-id="${data.id}"
					class="btn btn-primary btn-sm btn-actualizar"
					><i class="fa fa-pencil"></i></button>


 				 `;


 				}}

 			]



 		});


 	});


 }

 	loadData();


 	//Cargar Modal Agregar
 	$(document).on('click','.btn-agregar',function(){

 		$('#registro')[0].reset();

 		$('.codigo').removeAttr('readonly','');

 		$('.ruta').val('{{ route('almacen.agregar') }}');
 		$('.type').val('POST');

 		$('.btn-submit').html('Agregar');
 		$('.modal-title').html('Agregar');
 		$('#modal-registro').modal('show');


 	});

 	//Cargar Modal Actualizar
 	$(document).on('click','.btn-actualizar',function(){

 		$('#registro')[0].reset();
 		$('.codigo').attr('readonly','');
 		$('.ruta').val('{{ route('almacen.actualizar') }}');
 		$('.type').val('PUT');

 		id = $(this).data('id');


 		$.ajax({

 			url:'{{ route('almacen.consultar') }}',
 			type:'GET',
 			data:{'id':id},
 			dataType:'JSON',
 			success:function(data){

 				$('.id').val(data.id);
 				$('.codigo').val(data.codigo);
 				$('.descripcion').val(data.descripcion);

 			}


 		});


 		$('.btn-submit').html('Actualizar');
 		$('.modal-title').html('Actualizar');
 		$('#modal-registro').modal('show');

 	});


 	//Registro
 	$(document).on('submit','#registro',function(e){

 		parametros = $(this).serialize();

 		ruta = $('.ruta').val();
 		type = $('.type').val();

 		$.ajax({

 			url:ruta,
 			type:type,
 			data:parametros,
 			dataType:'JSON',
 			beforeSend:function(){

 			Swal.fire({

 				title:'Cargando',
 				text :'Espere un momento...',
 				imageUrl:'{{ asset('img/loader.gif') }}',
 				showConfirmButton:false

 			});


 			},
 			success:function(data){

 			$('#modal-registro').modal('hide');

 			loadData();

 			Swal.fire({

 				title:data.title,
 				text :data.text,
 				icon :data.icon,
 				timer:3000,
 				showConfirmButton:false

 			});


 			}

 		});


 		e.preventDefault();
 	});


</script>

@endsection