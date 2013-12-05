<?php
$this->breadcrumbs=array(
	'Teams'=>array('index'),
	$model->NAME=>array('view','id'=>$model->ID),
	'Update',
);

$this->menu=array(
	array('label'=>'List Team', 'url'=>array('index')),
	array('label'=>'Create Team', 'url'=>array('create')),
	array('label'=>'View Team', 'url'=>array('view', 'id'=>$model->ID)),
	array('label'=>'Manage Team', 'url'=>array('admin')),
	array('label'=>'Jugadores', 'url'=>array('manageTeamPlayer','id'=>$model->ID)),
	array('label'=>'Documentos', 'url'=>array('manageDocuments','id'=>$model->ID)),
);
?>
 
<h1>Update Team <?php echo $model->ID; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model,'catCategory'=>$catCategory)); ?>