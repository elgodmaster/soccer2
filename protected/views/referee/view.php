<?php
$this->breadcrumbs=array(
	'Referees'=>array('index'),
	$model->NAME,
);

$this->menu=array(
	array('label'=>'Lista arbitro','url'=>array('index')),
	array('label'=>'Crear arbitro','url'=>array('create')),
	array('label'=>'actualizar arbitro','url'=>array('update','id'=>$model->ID)),
	array('label'=>'Borrar arbitro','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->ID),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Gestionar arbitro','url'=>array('admin')),
);
?>

<h1>Ver arbitro #<?php echo $model->ID; ?></h1>

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
