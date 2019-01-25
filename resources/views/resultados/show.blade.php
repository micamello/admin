@extends('layouts.app')

@section('content')
<div class="page-content-wrapper ">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12">
				<div class="card">
					<div class="card-header text-center">
						Resultados evaluación de {{ ucfirst($datoUsuario->nombres) }} {{ ucfirst($datoUsuario->apellidos) }} <br>
						<small class="text-center">{{ $datoUsuario->correo }}</small>
					</div>
					<div class="card-body">
						<div class="col-md-10 offset-md-1">
							<?php $i = 0; $j = 1; $total = 0; $suma = 0; $num = 0;?>
							@foreach($preguntas as $preg)
							<?php                
							$num++; if($j != $preg->cuestionario){
										$num = 1;
									?>
											<tr class="table-primary">
												<td colspan="2">Total cuestionario <?php echo $j; ?></td>
												<td><?php echo $suma ?></td>
											</tr>
										</tbody>
									</table>
									<?php
										$j++;
										$suma = 0;
									}
									if ($preg->cuestionario != $i) {
										?>	
											<table class="table">
												<thead>
													<th colspan="3" class="text-center">Cuestionario # {{ $preg->cuestionario }}</th>
												</thead>
												<tr class="text-center table-primary">
													<td>Pregunta</td>
													<td>Respuesta</td>
													<td>Valor</td>
												</tr>
												<tbody>	
										<?php
										$i++;
									} ?>
									
											<tr>
												<td colspan="1"><span class="badge badge-success"><?php echo $num; ?></span> {{ $preg->descripcion }}</td>
												<td colspan="1" class="table-success">
													<?php foreach (MyConstante::RESPUESTA as $key => $value) {
														if($preg->valor == $key)
															echo "<span class='align-middle'>".$value."</span>"; 
													} ?>
												</td>
												<td colspan="1" class="table-primary"><span class="badge badge-pill badge-success">{{ $preg->valor }}</span></td>
											</tr>
										
									@if($loop->last)
											<tr class="table-primary">
												<td colspan="2" >Total cuestionario <?php echo $j; ?></td>
												<td><?php $total = $total + $preg->valor; echo $suma + $preg->valor;?></td>
											</tr>
											<tr r class="table-warning">
												<td colspan="2">Total cuestionarios</td>
												<td><?php echo $total;?></td>
											</tr>
										</tbody>
									</table>
							     @endif
								<?php $suma = $suma + $preg->valor; $total = $total + $preg->valor; ?>
							@endforeach
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

@endsection