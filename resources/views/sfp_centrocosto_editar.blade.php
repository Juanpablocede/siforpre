@extends('layouts.layout')
@section('titulo', 'Centro de Costo Editar')
@section('content')

<form class="" method="post">

			<div class="row w-100 justify-content-center">
				<div class="col-md-8 card card-content">
					<div class="row">
						<div class="col-12 pl-0 mb-1">
							<h4>
								Editar Centro de Costo<i class="fa text-primary fa-briefcase" aria-hidden="true"></i>
							</h4>
						</div>
 						<div class="p-1 col-md-12">
							<label class=" text-secondary" for="nombre_centrocosto">Nombre centro de costo</label>
 							<input class="form-control" value="{!! $centrocosto->nombre_centrocosto !!}" type="text" name="nombre_centrocosto" id="nombre_centrocosto" placeholder="nombre centro de costo">
 						</div>
 						<div class="col-md-6">
 								<button class="form-control btn btn-primary" type="submit" name="guardar" id="guardar" >Guardar
									<i class="fas fa-save"></i>
								</button>
 						</div>
 						<div class="col-md-6">
 								<a href="/sfp-centrocostos" class="form-control btn btn-primary" name="salir" id="salir">Salir
									<i class="fas fa-sign-out-alt"></i>
 								</a>
 						</div>
 						<input type="hidden" name="_token" value="{!! csrf_token() !!}">

						@include('error')

	 					@if(session('status'))
	 					<div class="col-md-12 alert alert-success" role="alert">
	 							{{ session('status') }}
	 					</div>
	 					@endif
					</div>
				</div>
			</div>
</form>
@endsection
