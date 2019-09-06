@extends('layouts.app')

@section('content')
<div class='panel panel-default shadow'>
	<div class='panel-body'>
		<div id="no-more-tables" class="table-responsive">

			<table class="table table-hover">
			  <thead class="etiquetaBody">
			    <tr>
			      <th rowspan="2" class="font-weight-light text-cabecera"></th>
			      <th rowspan="2" class="font-weight-light text-cabecera">Nombre de la empresa</th>
			      <th rowspan="2" class="font-weight-light text-cabecera">Sector Industrial</th>
			      <th rowspan="2" class="font-weight-light text-cabecera">Correo</th>
			      <th rowspan="2" class="font-weight-light text-cabecera">Telefono</th>
			      {{-- <th rowspan="2" class="font-weight-light text-cabecera">Web</th> --}}
			      <th rowspan="2" class="font-weight-light text-cabecera">Ciudad</th>
			      <th rowspan="2" class="font-weight-light text-cabecera">Fecha Registro</th>
			      <th rowspan="2" class="font-weight-light text-cabecera">Estatus</th>
			    </tr>
			  </thead>
			  <tbody>

			  	@foreach($lista as $array)
			    <tr>
                  <td align="right" class="text-cabecera" data-title="logo">
                     @if( $array->foto > 0 )
                         <a href='https://www.micamello.com.ec/imagenes/usuarios/profile/{{ $array->username }}.jpg' target="_blank">
                           <img class="imagen-perfil-2" src="https://www.micamello.com.ec/imagenes/usuarios/profile/{{ $array->username }}.jpg" alt="perfil" width="50" height="50"/>
                         </a>
                     @else
                       <img class="imagen-perfil-2" src="https://www.micamello.com.ec/imagenes/user.png" alt="perfil" width="50" height="50"/>
                     @endif
                  </td>
			      <td class="text-cabecera">{{ $array->nombres }}
			      </td>
			      <td class="text-center text-cabecera">{{ $array->descripcion }}
			      </td>
			      <td class="text-center text-cabecera">{{ $array->correo }}
			      </td>
			      <td class="text-center text-cabecera">{{ $array->telefono }}
			      </td>
			      {{-- <td class="text-center text-cabecera">{{ $array->pagina_web }}
			      </td> --}}
			      <td class="text-center text-cabecera">{{ $array->nombre }}
			      </td>
			      <td class="text-center text-cabecera">{{ \Carbon\Carbon::parse($array->fecha_creacion)->format('d-m-Y') }}
			      </td>
			      <td class="text-center text-cabecera">
					@if( $array->estado > 0 )
			      		<span class="user-activo">{{ 'Activo' }}</span>
			      	@else
			      	    <span class="user-inactivo">{{ 'Inactivo' }}</span>
			      	@endif
			      </td>
			    </tr>
			    @endforeach
			  </tbody>
			</table>
			{{ $lista->links() }}
		</div>    
	</div>
</div>
@endsection()