<?php
$this->breadcrumbs=array(
	'Players'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'Lista jugadores', 'url'=>array('index')),
	
);
?>

<h3>Crear nuevo jugador</h3>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>