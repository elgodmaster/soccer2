<?php
/* @var $this PlayGroundController */
/* @var $model PlayGround */

$this->breadcrumbs=array(
	'Play Grounds'=>array('index'),
	$model->NAME=>array('view','id'=>$model->ID),
	'Update',
);

$this->menu=array(
	array('label'=>'Lista descansos', 'url'=>array('index')),
	array('label'=>'Obtener descanso', 'url'=>array('create')),
	array('label'=>'Ver descanso', 'url'=>array('view', 'id'=>$model->ID)),
	
);
?>

<h2>Administrar descansos <?php echo $model->ID; ?></h2>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>