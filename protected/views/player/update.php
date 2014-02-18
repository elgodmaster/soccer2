<?php
$this->breadcrumbs=array(
	'Players'=>array('index'),
	$model->NAME=>array('view','id'=>$model->ID),
	'Update',
);

$this->menu=array(
	array('label'=>'Lista jugador', 'url'=>array('index')),
	array('label'=>'Crear jugador', 'url'=>array('create')),
	array('label'=>'Ver jugador', 'url'=>array('view', 'id'=>$model->ID)),
	array('label'=>'Gestionar jugador', 'url'=>array('admin')),
	array('label'=>'Administrar Documentacion','url'=>array('updateDocumentation', 'id'=>$model->ID)),
);
?>

<h1>Actualizar jugador <?php echo $model->ID; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>