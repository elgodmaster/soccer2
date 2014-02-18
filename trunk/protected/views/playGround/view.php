<?php
/* @var $this PlayGroundController */
/* @var $model PlayGround */

$this->breadcrumbs=array(
	'Play Grounds'=>array('index'),
	$model->NAME,
);

$this->menu=array(
	array('label'=>'Lista descanso', 'url'=>array('index')),
	array('label'=>'Crear descanso', 'url'=>array('create')),
	array('label'=>'Actualizar descanso', 'url'=>array('update', 'id'=>$model->ID)),
	array('label'=>'Borrar descanso', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->ID),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Gestionar descanso', 'url'=>array('admin')),
);
?>

<h1>Ver descansos #<?php echo $model->ID; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'ID',
		'NAME',
		'DESCRIPTION',
		'ADDRESS',
		'PHONE_NUMBER',
		'ACTIVE',
		'MAP_STRING',
	),
)); ?>
