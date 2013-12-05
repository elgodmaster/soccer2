<?php
$this->breadcrumbs=array(
	'Tournaments'=>array('index'),
	$model->NAME,
);

$this->menu=array(
	array('label'=>'List Tournament', 'url'=>array('index')),
	array('label'=>'Create Tournament', 'url'=>array('create')),
	array('label'=>'Update Tournament', 'url'=>array('update', 'id'=>$model->ID)),
	array('label'=>'Delete Tournament', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->ID),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Tournament', 'url'=>array('admin')),
	array('label'=>'Documentos', 'url'=>array('manageDocuments','id'=>$model->ID)),
	array('label'=>'Equipos', 'url'=>array('manageTeams', 'tournamentId'=>$model->ID)),
);
?>

<h1>View Tournament #<?php echo $model->ID; ?></h1>



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
