<?php
/* @var $this PlayGroundController */
/* @var $model PlayGround */

$this->breadcrumbs=array(
	'Play Grounds'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List PlayGround', 'url'=>array('index')),
	array('label'=>'Manage PlayGround', 'url'=>array('admin')),
);
?>

<h1>Create PlayGround</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>