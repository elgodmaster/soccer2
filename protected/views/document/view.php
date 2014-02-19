<?php
$this->breadcrumbs=array(
	'Documents'=>array('index'),
	$model->NAME,
);

$this->menu=array(
	array('label'=>'Lista documentos', 'url'=>array('index')),
	array('label'=>'Crear nuevo documento', 'url'=>array('create')),
	array('label'=>'Modificar documento', 'url'=>array('update', 'id'=>$model->ID)),
	array('label'=>'Borrar documento', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->ID),'confirm'=>'Are you sure you want to delete this item?')),
	
);
?>

<h3>Ver documento #<?php echo $model->ID; ?></h3>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'ID',
		'NAME',
		'TYPE_DOCUMENT',
		'DESCRIPTION',
	),
)); ?>
