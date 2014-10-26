<?php
$this->breadcrumbs=array(
	'Teams'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'Lista equipo', 'url'=>array('index')),
	

		

);



?>


<div class="row">
			 
		<div class="col-md-12">
				
			<div class="panel">
					
				<div class="panel-body">
					<h1>Crear equipo</h1>	
					<p class="help-block">
						Creación de un nuevo equipo.
					</p>
				</div>	
			</div>
		</div>	
</div>
<?php echo $this->renderPartial('_form', array('model'=>$model,'catCategory'=>$catCategory)); ?>