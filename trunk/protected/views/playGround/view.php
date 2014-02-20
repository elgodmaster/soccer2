<?php
/* @var $this PlayGroundController */
/* @var $model PlayGround */

$this->breadcrumbs=array(
	'Play Grounds'=>array('index'),
	$model->NAME,
);

$this->menu=array(
	array('label'=>'Lista descansso', 'url'=>array('index')),
	array('label'=>'Obtener descanso', 'url'=>array('create')),
	array('label'=>'Modificar descanso', 'url'=>array('update', 'id'=>$model->ID)),
	array('label'=>'Borrar descanso', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->ID),'confirm'=>'Are you sure you want to delete this item?')),
	
);
?>

<h3>Ver descansos #<?php echo $model->ID; ?></h3>

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
