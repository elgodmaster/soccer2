<?php
/* @var $this PlayGroundController */
/* @var $model PlayGround */

$this->breadcrumbs=array(
	'Play Grounds'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'Lista descanso', 'url'=>array('index')),
	array('label'=>'gestionar descanso', 'url'=>array('admin')),
);
?>

<h1>Crear descanso</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>