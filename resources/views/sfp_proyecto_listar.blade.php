@extends('layouts.layout')
@section('titulo', 'Proyectos Listar')
@section('content')

<div class="row justify-content-center w-100 mt-3">
	<div class="col-10">
		<div class="card card-table" style="width: 100%">
		  <ul class="list-group list-group-flush">
		    <li class="list-group-item card-head">
						<div class="row">
							<div class="col-4">
								<h4>Listado Proyectos</h4>
							</div>
							<div class="col-8 float-left">
								<div class="row">
									<input id="buscar-tabla" type="text" class="form-control" placeholder="Buscar" aria-label="Input group example" aria-describedby="btnGroupAddon">
								</div>
								<div class="row justify-content-end">
									<a class="btn btn-primary" href="/sfp-proyectos/crear" name="guardar" id="guardar">
										<i class="fas fa-plus-circle"></i>
									</a>
									  <a class="btn btn-primary" href="/siforpre" name="salir" id="salir">
										<i class="fas fa-sign-out-alt"></i>
									</a>
								</div>
							</div>
						</div>
				</li>
		    <li class="list-group-item p-0">
					<table id="DataTabla" class="table table-hover">
						<thead>
							<tr>
								<th class="" scope="col">Empresa</th>
								<th class="" scope="col">Año</th>
								<th class="" scope="col">Proyecto</th>
								<th class="" scope="col">Nombre</th>
								<th class="" scope="col">Tipo</th>
								<th class="tituloactualizar" scope="col">&nbsp;</th>
								<th class="tituloeliminar" scope="col">&nbsp;</th>
							</tr>
					   </thead>
						 <tbody>
					       @if($proyectos->count())
					       @foreach($proyectos as $proyecto)
						   <tr class="detalle link-tr">
								 <td><a class="a-table" href="/sfp-proyectos/{!! $proyecto->id_registro !!}/mostrar">{{$proyecto->id_empresa}}</a></td>
								 <td><a class="a-table" href="/sfp-proyectos/{!! $proyecto->id_registro !!}/mostrar">{{$proyecto->ano_presupuesto}}</a></td>
						     <td><a class="a-table" href="/sfp-proyectos/{!! $proyecto->id_registro !!}/mostrar">{{$proyecto->id_proyecto}}</a></td>
								 <td><a class="a-table" href="/sfp-proyectos/{!! $proyecto->id_registro !!}/mostrar">{{$proyecto->nombre_proyecto}}</a></td>
								 <td><a class="a-table" href="/sfp-proyectos/{!! $proyecto->id_registro !!}/mostrar">{{$proyecto->tipo}}</a></td>
								 <td>
										<a class="figura" href="{!! action('Sfp_proyectosController@edit', $proyecto->id_registro) !!}" >
											<i class="figura far fa-edit"></i>
										</a>
								 </td>

								 <td>
									 <button style="cursor:pointer" class="eliminar eliminar-proyecto" data-target="#eliminar-proyecto-{!! $proyecto->id_registro !!}" data-toggle="modal" type="button">
											 <i class="eliminar fa fa-trash-alt"></i>
									 </button>
								</td>
							</tr>
					        @endforeach
					        @else
					        <tr>
					         <td colspan="8">No hay registro disponible para mostar.</td>
					       </tr>
					       @endif
					    </tbody>

					</table>
				</li>
		  </ul>
		</div>
	</div>
</div>
@foreach($proyectos as $proyecto)
<!-- Modal -->
<div class="modal fade" id="eliminar-proyecto-{!! $proyecto->id_registro !!}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Confirmación</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				¿Estás seguro que deseas eliminar este proyecto?
				<div class="mensaje-eliminar">
					{!! $proyecto->id_proyecto !!} {!! $proyecto->nombre_proyecto !!}
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Salir</button>
				<form id="form-eliminar-proyecto" action="{!! action('Sfp_proyectosController@destroy', $proyecto->id_registro)  !!}" method="post">
					 <input type="hidden" name="_token" value="{!! csrf_token() !!}">
					 <a class="figura">
						 <button class="btn btn-primary" type="submit">
							 Si, eliminar
						 </button>
					 </a>
				</form>
			</div>
		</div>
	</div>
</div>
@endforeach
@endsection
