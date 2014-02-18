<?php
/* @var $this CatResultController */
/* @var $model CatResult */

$this->breadcrumbs=array(
	'Cat Results'=>array('index'),
	$model->NAME,
);

$this->menu=array(
	array('label'=>'Lista resultados', 'url'=>array('index')),
	array('label'=>'Crer resultados', 'url'=>array('create')),
	array('label'=>'Actualizar resultados', 'url'=>array('update', 'id'=>$model->ID)),
	array('label'=>'Borrar resultados', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->ID),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Gestionar resultados', 'url'=>array('admin')),
);
?>

<h1>Ver resultados #<?php echo $model->ID; ?></h1>

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
