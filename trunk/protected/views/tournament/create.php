<?php
$this->breadcrumbs=array(
	'Tournaments'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'Lista  torneo', 'url'=>array('index')),
);

?>

<div class="row-fluid">
			 
		<div class="span12">
				
					<h1>Crear torneo</h1>	
					<span class="help-block">
						Creación de un nuevo torneo.
					</span>
		</div>	
</div>


<?php echo $this->renderPartial('_createForm', array('model'=>$model,'catCategory'=>$catCategory)); ?>