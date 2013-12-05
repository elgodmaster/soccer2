<?php
/* @var $this PlayGroundController */
/* @var $model PlayGround */

$this->breadcrumbs=array(
	'Play Grounds'=>array('index'),
	$model->NAME=>array('view','id'=>$model->ID),
	'Update',
);

$this->menu=array(
	array('label'=>'List PlayGround', 'url'=>array('index')),
	array('label'=>'Create PlayGround', 'url'=>array('create')),
	array('label'=>'View PlayGround', 'url'=>array('view', 'id'=>$model->ID)),
	array('label'=>'Manage PlayGround', 'url'=>array('admin')),
);
?>

<h1>Update PlayGround <?php echo $model->ID; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>