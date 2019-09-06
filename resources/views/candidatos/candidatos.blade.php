@extends('layouts.app')

@section('content')

<div class='panel panel-default shadow'>
	<div class='panel-body'>
		<div id="no-more-tables" class="table-responsive">
			<table class="table table-hover">
			  <thead class="etiquetaBody">
			    <tr>
			      <th rowspan="2" class="font-weight-light text-cabecera"></th>
			      <th rowspan="2" class="font-weight-light text-cabecera">Nombres y Apellidos</th>
			      <th rowspan="2" class="font-weight-light text-cabecera">Edad</th>
			      <th rowspan="2" class="font-weight-light text-cabecera">Telefono</th>
			      <th rowspan="2" class="font-weight-light text-cabecera">Correo</th>
			      <th rowspan="2" class="font-weight-light text-cabecera">Ciudad</th>
			      <th rowspan="2" class="font-weight-light text-cabecera">Estudios</th>
			      <th rowspan="2" class="font-weight-light text-cabecera">Fecha Registro</th>
			      <th rowspan="2" class="font-weight-light text-cabecera">Estatus</th>
			      <th rowspan="2" class="font-weight-light text-cabecera">HV</th>
			    </tr>
			  </thead>
			  <tbody>
			  	
			  	@foreach($lista as $array)
			    <tr>
                    <td align="right" class="text-cabecera" data-title="Foto: ">
                       @if( $array->foto > 0 )
                         <a href='https://www.micamello.com.ec/imagenes/usuarios/profile/{{ $array->username }}.jpg' target="_blank">
                           <img class="imagen-perfil-2" src="https://www.micamello.com.ec/imagenes/usuarios/profile/{{ $array->username }}.jpg" alt="perfil" width="50" height="50"/>
                         </a>

                       @else
                         <img class="imagen-perfil-2" src="https://www.micamello.com.ec/imagenes/user.png" alt="perfil" width="50" height="50"/>
                       @endif
                    </td>
			      <td data-title="Aspirante: " class="text-cabecera">{{ $array->nombres }}&nbspc;&nbspc;{{ $array->apellidos }}
			      </td>
			      <td class="text-center text-cabecera">{{ \Carbon\Carbon::parse($array->fecha_nacimiento)->diff(\Carbon\Carbon::now())->format('%y') }}
			      </td>
			      <td class="text-center text-cabecera">{{ $array->telefono }}
			      </td>
			      <td class="text-center text-cabecera">{{ $array->correo }}
			      </td>
			      <td class="text-center text-cabecera">{{ $array->nombre }}
			      </td>
			      <td class="text-center text-cabecera">{{ $array->descripcion }}
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
			      {{-- <td title="Descargar Informe de competencias laborales">
			      	<a href="#"><img src="https://www.micamello.com.ec/imagenes//icono-aspirante-07.png" class="redes-mic" width="100%"></a>
			      </td> --}}
			      <td title="Descargar Hoja de vida" data-title="Hoja de vida: " style="vertical-align: middle; text-align: center;">
			      	@if(!empty($array->formato))
			      	  <a target="_blank" href="https://www.micamello.com.ec/imagenes/usuarios/hv/{{ $array->username }}.{{ $array->formato }}">
			      	  <img src="https://www.micamello.com.ec/imagenes//cv-07.png" class="redes-mic" width="100%">
			        </a>
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

			      	<!-- <td align="right" style="text-align: center; vertical-align: middle;" data-title="Foto: ">
                      <img class="imagen-perfil-2" src="PUERTO.'://'.HOST.'/imagenes/imgthumb/'.$a['username'].'/';" alt="perfil" width="50" height="50">
                    </td> -->

                    <!--abrirModal(\'Debe contratar un plan que permita descargar informes de competencias laborales\',\'alert_descarga\',\''.PUERTO."://".HOST."/planes/".'\',\'Ok\',\'\')-->

                    <!--'.PUERTO."://".HOST."/hojasDeVida/".$a['username'].'/'.$compl_url.'-->

                    <!--onclick="hacerInforme(\''.PUERTO."://".HOST."/fileGEN/informeusuario/".Utils::encriptar($id_plan).'/'.$id_oferta.'/'.$a['username'].'\',\''.Utils::encriptar($a['id_usuario']).'\')-->