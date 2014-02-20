<?php
$this->breadcrumbs=array(
	'Tournaments'=>array('index'),
	$model->NAME,
);

$this->menu=array(
	array('label'=>'Lista torneo', 'url'=>array('index')),
	array('label'=>'Crear nuevo torneo', 'url'=>array('create')),
	array('label'=>'Actualizar torneo', 'url'=>array('update', 'id'=>$model->ID)),
	array('label'=>'Borrar torneo', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->ID),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Documentos', 'url'=>array('manageDocuments','id'=>$model->ID)),
	array('label'=>'Equipos', 'url'=>array('manageTeams', 'tournamentId'=>$model->ID)),
);
?>

<h2>Ver torneos #<?php echo $model->ID; ?></h2>



<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'ID',
		'ID_CATEGORY',
		'NAME',
		'DESCRIPTION',
		'START_DATE',
		'END_DATE',
		'ACTIVE',
	),
)); ?>
