@extends('layouts.app')

@section('content')

<div class='panel panel-default shadow'>
	<div class='panel-body'>
		<div id="no-more-tables" class="table-responsive">
			<table class="table table-hover">
			  <thead class="etiquetaBody">
			    <tr>
			      <th rowspan="2" style="vertical-align: middle; text-align: center;">Foto</th>
			      <th rowspan="2" style="vertical-align: middle; text-align: center;">Nombre y Apellido</th>
			      <th rowspan="2" style="vertical-align: middle; text-align: center;width: 100px">Telefono</th>
			      <th rowspan="2" style="vertical-align: middle; text-align: center;width: 100px">Correo</th>
			      <th rowspan="2" colspan="2" style="vertical-align: middle; text-align: center;">HV</th>
			    </tr>
			  </thead>
			  <tbody>
			  	
			  	@foreach($lista as $array)
			    <tr>
                    <td align="right" style="text-align: center; vertical-align: middle;" data-title="Foto: ">
                       @if( $array->foto > 0 )
                         <a href='https://www.micamello.com.ec/imagenes/usuarios/profile/{{ $array->username }}.jpg' target="_blank">
                           <img class="imagen-perfil-2" src="https://www.micamello.com.ec/imagenes/usuarios/profile/{{ $array->username }}.jpg" alt="perfil" width="50" height="50"/>
                         </a>

                       @else
                         <img class="imagen-perfil-2" src="https://www.micamello.com.ec/imagenes/user.png" alt="perfil" width="50" height="50"/>
                       @endif
                    </td>
			      <td data-title="Aspirante: " style="vertical-align: middle; text-align: center;">{{ $array->nombres }}&nbspc;&nbspc;{{ $array->apellidos }}
			      </td>
			      <td style="vertical-align: middle; text-align: center;" class="text-center">{{ $array->telefono }}
			      </td>
			      <td  style="vertical-align: middle; text-align: center;" class="text-center">{{ $array->correo }}
			      </td>
			      {{-- <td title="Descargar Informe de competencias laborales">
			      	<a href="#"><img src="https://www.micamello.com.ec/imagenes//icono-aspirante-07.png" class="redes-mic" width="100%"></a>
			      </td> --}}
			      <td title="Descargar Hoja de vida" data-title="Hoja de vida: " style="vertical-align: middle; text-align: center;">
			      	@if(!empty($array->formato))
			      	<a target="_blank" href="https://www.micamello.com.ec/imagenes/usuarios/hv/{{ $array->username }}.{{ $array->formato }}">
			      	@endif
			      	<img src="https://www.micamello.com.ec/imagenes//cv-07.png" class="redes-mic" width="100%"></a>
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