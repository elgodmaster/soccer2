<?php
$this->breadcrumbs=array(
	'Tournaments'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'Lista  torneo', 'url'=>array('index')),
);

?>

<div class="row">
			 
		<div class="col-md-12">
				
			<div class="panel">
					
				<div class="panel-body">
					<h1>Crear torneo</h1>	
					<p class="help-block">
						Creación de un nuevo torneo.
					</p>
				</div>	
			</div>
		</div>	
</div>


<?php echo $this->renderPartial('_createForm', array('model'=>$model,'catCategory'=>$catCategory)); ?>