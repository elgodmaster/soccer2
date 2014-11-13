<?php
/* @var $this PlayGroundController */
/* @var $model PlayGround */

$this->breadcrumbs=array(
	'Play Grounds'=>array('index'),
	$model->NAME,
);

$this->menu=array(
	array('label'=>'Lista canchas', 'url'=>array('index')),
	array('label'=>'Obtener cancha', 'url'=>array('create')),
	array('label'=>'Modificar cancha', 'url'=>array('update', 'id'=>$model->ID)),
	array('label'=>'Borrar cancha', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->ID),'confirm'=>'Are you sure you want to delete this item?')),
	
);
?>

<h2>Ver canchas #<?php echo $model->ID; ?></h2>

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
