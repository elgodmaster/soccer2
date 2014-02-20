<?php
/* @var $this PlayGroundController */
/* @var $model PlayGround */

$this->breadcrumbs=array(
	'Play Grounds'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'Lista descansos', 'url'=>array('index')),
	
);
?>

<h2>Obtener tiempo descanso</h2>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>