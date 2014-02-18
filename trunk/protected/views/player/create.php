<?php
$this->breadcrumbs=array(
	'Players'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'Lista jugador', 'url'=>array('index')),
	array('label'=>'Gestionar jugador', 'url'=>array('admin')),
);
?>

<h1>Crear jugador</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>