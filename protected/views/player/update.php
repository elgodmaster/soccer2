<?php
$this->breadcrumbs=array(
	'Players'=>array('index'),
	$model->NAME=>array('view','id'=>$model->ID),
	'Update',
);

$this->menu=array(
	array('label'=>'List Player', 'url'=>array('index')),
	array('label'=>'Create Player', 'url'=>array('create')),
	array('label'=>'View Player', 'url'=>array('view', 'id'=>$model->ID)),
	array('label'=>'Manage Player', 'url'=>array('admin')),
	array('label'=>'Administrar Documentacion','url'=>array('updateDocumentation', 'id'=>$model->ID)),
);
?>

<h1>Update Player <?php echo $model->ID; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>