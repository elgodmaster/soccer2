<?php
$this->breadcrumbs=array(
	'Teams'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'Lista equipo', 'url'=>array('index')),
	);

?>


<div class="row-fluid">
			 
		<div class="span12">
				
					<h1>Crear equipo</h1>	
					
		</div>	
</div>

<?php echo $this->renderPartial('_form', array('model'=>$model,'catCategory'=>$catCategory)); ?>