<?php
/* @var $this PlayGroundController */
/* @var $model PlayGround */

$this->breadcrumbs=array(
	'Play Grounds'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'Lista cancha', 'url'=>array('index')),
	
);
?>

<h2>Obtener cancha</h2>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>