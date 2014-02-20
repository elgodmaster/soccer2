<?php
$this->breadcrumbs=array(
	'Players'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'Lista jugadores', 'url'=>array('index')),
	
);
?>

<h2>Crear nuevo jugador</h2>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>