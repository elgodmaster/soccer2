<?php
$this->breadcrumbs=array(
	'Players'=>array('index'),
	$model->NAME=>array('view','id'=>$model->ID),
	'Update',
);

$this->menu=array(
	array('label'=>'Lista jugadores', 'url'=>array('index')),
	array('label'=>'Crear nuevo jugador', 'url'=>array('create')),
	array('label'=>'Ver jugador', 'url'=>array('view', 'id'=>$model->ID)),
	
	array('label'=>'Administrar Documentacion','url'=>array('updateDocumentation', 'id'=>$model->ID)),
);
?>

<h2>Modificar jugador <?php echo $model->ID; ?></h2>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>