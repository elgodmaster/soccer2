<?php
/* @var $this PlayGroundController */
/* @var $model PlayGround */

$this->breadcrumbs=array(
	'Play Grounds'=>array('index'),
	$model->NAME,
);

$this->menu=array(
	array('label'=>'List PlayGround', 'url'=>array('index')),
	array('label'=>'Create PlayGround', 'url'=>array('create')),
	array('label'=>'Update PlayGround', 'url'=>array('update', 'id'=>$model->ID)),
	array('label'=>'Delete PlayGround', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->ID),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage PlayGround', 'url'=>array('admin')),
);
?>

<h1>View PlayGround #<?php echo $model->ID; ?></h1>

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
