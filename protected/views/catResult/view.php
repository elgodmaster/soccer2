<?php
/* @var $this CatResultController */
/* @var $model CatResult */

$this->breadcrumbs=array(
	'Cat Results'=>array('index'),
	$model->NAME,
);

$this->menu=array(
	array('label'=>'List CatResult', 'url'=>array('index')),
	array('label'=>'Create CatResult', 'url'=>array('create')),
	array('label'=>'Update CatResult', 'url'=>array('update', 'id'=>$model->ID)),
	array('label'=>'Delete CatResult', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->ID),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage CatResult', 'url'=>array('admin')),
);
?>

<h1>View CatResult #<?php echo $model->ID; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'ID',
		'NAME',
		'DESCRIPTION',
		'TYPE_RESULT',
		'ACTIVE',
	),
)); ?>
