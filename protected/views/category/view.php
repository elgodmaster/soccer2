<?php
$this->breadcrumbs=array(
	'Categories'=>array('index'),
	$model->NAME,
);

$this->menu=array(
	array('label'=>'Lista categoria', 'url'=>array('index')),
	array('label'=>'Crear nueva categoría', 'url'=>array('create')),
	array('label'=>'Actualizar categoría', 'url'=>array('update', 'id'=>$model->ID_CATEGORY)),
	array('label'=>'Borrar categoría', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->ID_CATEGORY),'confirm'=>'Are you sure you want to delete this item?')),
	
);
?>

<h2>Ver categoría #<?php echo $model->ID_CATEGORY; ?></h2>

<p class="note">
	Los campos con: <span class="required">*</span> son requeridos.
	</p>

	


<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'ID_CATEGORY',
		'NAME',
		'DESCRIPTION',
		'MAX_YEAR',
		'MIN_YEAR',
		'ACTIVE',
	),
)); ?>
