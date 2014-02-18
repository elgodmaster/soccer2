<?php
$this->breadcrumbs=array(
	'Tournaments'=>array('index'),
	$model->NAME=>array('manage','id'=>$model->ID),
	'Update',
);

$this->menu=array(
	array('label'=>'List Tournament', 'url'=>array('index')),
	array('label'=>'Create Tournament', 'url'=>array('create')),
	array('label'=>'View Tournament', 'url'=>array('view', 'id'=>$model->ID)),
	array('label'=>'Documentos', 'url'=>array('manageDocuments','id'=>$model->ID)),
	array('label'=>'Manage Tournament', 'url'=>array('admin')),
);
?>

<h1>Actualizar Torneo <?php echo $model->ID; ?></h1>

<?php echo $this->renderPartial($form, array('model'=>$model,	'catCategory'=>$catCategory)); ?>