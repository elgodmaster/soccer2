<?php
$this->breadcrumbs=array(
	'Players'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'Lista jugadores', 'url'=>array('index')),
	
);
?>



<div class="row">
			 
		<div class="col-md-12">
				
			<div class="panel">
					
				<div class="panel-body">
					<h1>Crear jugador</h1>	
					<p class="help-block">
						Creación de un nuevo jugador.
					</p>
				</div>	
			</div>
		</div>	
</div>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>