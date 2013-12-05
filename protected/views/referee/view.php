<?php
$this->breadcrumbs=array(
	'Referees'=>array('index'),
	$model->NAME,
);

$this->menu=array(
	array('label'=>'List Referee','url'=>array('index')),
	array('label'=>'Create Referee','url'=>array('create')),
	array('label'=>'Update Referee','url'=>array('update','id'=>$model->ID)),
	array('label'=>'Delete Referee','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->ID),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Referee','url'=>array('admin')),
);
?>

<h1>View Referee #<?php echo $model->ID; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'ID',
		'NAME',
		'ADDRESS',
		'EMAIL',
		'PHONE',
		'DATE_UP',
		'ACTIVE',
	),
)); ?>
