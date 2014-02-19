<?php
$this->breadcrumbs=array(
	'Referees'=>array('index'),
	$model->NAME,
);

$this->menu=array(
	array('label'=>'Lista árbitros','url'=>array('index')),
	array('label'=>'Crear nuevo árbitro','url'=>array('create')),
	array('label'=>'Modificar árbitro','url'=>array('update','id'=>$model->ID)),
	array('label'=>'Borrar árbitro','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->ID),'confirm'=>'Are you sure you want to delete this item?')),

);
?>

<h3>Ver árbitro #<?php echo $model->ID; ?></h3>

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
