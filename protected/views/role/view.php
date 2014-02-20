<?php
$this->breadcrumbs=array(
	'Roles'=>array('index'),
	$model->NAME,
);

$this->menu=array(
	array('label'=>'Lista rol', 'url'=>array('index')),
	array('label'=>'Crear rol', 'url'=>array('create')),
	array('label'=>'Modificar rol', 'url'=>array('update', 'id'=>$model->ID)),
	array('label'=>'Borrar rol', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->ID),'confirm'=>'Are you sure you want to delete this item?')),
	
);
?>

<h3>Ver rol #<?php echo $model->ID; ?></h3>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'ID',
		'NAME',
		'DESCRIPTION',
		'ACTIVE',
	),
)); ?>
