<?php
$this->breadcrumbs=array(
	'Referees'=>array('index'),
	$model->NAME=>array('view','id'=>$model->ID),
	'Update',
);

$this->menu=array(
	array('label'=>'List Referee','url'=>array('index')),
	array('label'=>'Create Referee','url'=>array('create')),
	array('label'=>'View Referee','url'=>array('view','id'=>$model->ID)),
	array('label'=>'Manage Referee','url'=>array('admin')),
);
?>

<h1>Update Referee <?php echo $model->ID; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>