<?php
$this->breadcrumbs=array(
	'Documents'=>array('index'),
	$model->NAME,
);

$this->menu=array(
	array('label'=>'Lista documento', 'url'=>array('index')),
	array('label'=>'Crer documento', 'url'=>array('create')),
	array('label'=>'Actulizar documento', 'url'=>array('update', 'id'=>$model->ID)),
	array('label'=>'Borrar documento', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->ID),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Gestionar documento', 'url'=>array('admin')),
);
?>

<h1>Ver Documento #<?php echo $model->ID; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'ID',
		'NAME',
		'TYPE_DOCUMENT',
		'DESCRIPTION',
	),
)); ?>
