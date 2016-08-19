<?php

/* @var $this yii\web\View */
$this->title = yii::$app->params ['empresa'];
?>
<div class="site-index">

	<div class="jumbotron"></div>

	<div class="body-content">
		<div class="row">
			<div class="col-sm-6 col-md-4">
				<div class="thumbnail">
					<div class="caption text-onbox">
						<h4>Tonelaje Recolectado</h4>
						<p>
							<canvas id="tonelaje-chart" width="400" height="250"></canvas>
						</p>
					</div>
				</div>
			</div>


			<div class="col-sm-6 col-md-4">
				<div class="thumbnail">
					<div class="caption text-onbox">
						<h4>Gasto de Conbustible</h4>
						<p>
							<canvas id="combustible-chart" width="400" height="250"></canvas>
						</p>
					</div>
				</div>
			</div>

			<div class="col-sm-6 col-md-4">
				<div class="thumbnail">
					<div class="caption text-onbox">
						<h4>Solicitudes</h4>
						<div>
							<ul class="list-group">
								<li class="list-group-item"><a href="#">00001- Arbol ostaculizando calle Col. Luisa</a></li>
								<li class="list-group-item"><a href="#">00002- Tragante tapado, mal olor entrada del mercado</a></li>
								<li class="list-group-item"><a href="#">00003- Derrumbe impide paso de peatones</a></li>
								<li class="list-group-item"><a href="#">00004- Col Santa Maria, sin agua por 2 semanas</a></li>
								<li class="list-group-item"><a href="#">00005- Fumigación en Col. Apulca</a></li>
								<li class="list-group-item"><a href="#">00006- Limpieza de Cunetas calle principal</a></li>
							</ul>
							<a href="#">Más</a>
						</div>
					</div>
				</div>
			</div>

		</div>
		
		<div class="row">
			<div class="col-sm-6 col-md-4">
				<div class="thumbnail">
					<div class="caption text-onbox">
						<h4>Ordenes de Trabajo</h4>
						<p>
							
						</p>
					</div>
				</div>
			</div>


			<div class="col-sm-6 col-md-4">
				<div class="thumbnail">
					<div class="caption text-onbox">
						<h4>Planificación Semana</h4>
						<p>
							
						</p>
					</div>
				</div>
			</div>

			<div class="col-sm-6 col-md-4">
				<div class="thumbnail">
					<div class="caption text-onbox">
						<h4>Otras cosas</h4>
						<p>
							
						</p>
					</div>
				</div>
			</div>

		</div>
	</div>
</div>
