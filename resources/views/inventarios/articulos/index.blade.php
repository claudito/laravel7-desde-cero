@extends('layouts.app')

@section('content')


<div class="container">
	
	<div class="row">
				
		<div class="col-md-12">
		




		<div class="card">
			
			<div class="card-header">
				
				Artículos

				<div class="float-right">
				
				<button class="btn btn-primary btn-sm">
					<i class="fa fa-plus"></i>
				</button>

				</div>

			</div>

			<div class="card-body">
				
				<div class="table-responsive">
			
				<table id="consulta" class="table">
						<thead>
							<tr>
								<th>Código</th>
								<th>Descripción</th>
								<th>Unidad</th>
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


<script>
	
	$(document).ready(function(){


	 $('#consulta').DataTable({

	 	language:{

	 		url:'{{  asset('js/spanish.json')  }}'

	 	},
	 	ajax:{

	 		url:'{{ route('articulos.index')  }}',
	 		type:'GET'

	 	},
	 	columns:[

	 	  {data:'codigo'},
	 	  {data:'descripcion'},
	 	  {data:'unidad'},
	 	  {data:null,render:function(data){

	 	  	return `
	
			  <button 
			  class="btn btn-primary btn-sm">
			  <i class="fa fa-pencil"></i>
			  </button>

			  <button class="btn btn-danger btn-sm">
			  <i class="fa fa-trash"></i>
			  </button>
	

	 	  	 `;


	 	  }}


	 	]



	 });


	});


</script>
@endsection

