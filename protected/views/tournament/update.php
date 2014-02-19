<?php
$this->breadcrumbs=array(
	'Tournaments'=>array('index'),
	$model->NAME=>array('manage','id'=>$model->ID),
	'Update',
);

$this->menu=array(
	array('label'=>'Lista torneo', 'url'=>array('index')),
	array('label'=>'Crear torneo', 'url'=>array('create')),
	array('label'=>'Ver torneo', 'url'=>array('view', 'id'=>$model->ID)),
	array('label'=>'Documentos', 'url'=>array('manageDocuments','id'=>$model->ID)),
	array('label'=>'Gestionar torrneo', 'url'=>array('admin')),
);
?>

<h1>Actualizar Torneo <?php echo $model->ID; ?></h1>

<?php echo $this->renderPartial($form, array('model'=>$model,	'catCategory'=>$catCategory)); ?>