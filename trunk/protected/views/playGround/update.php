<?php
/* @var $this PlayGroundController */
/* @var $model PlayGround */

$this->breadcrumbs=array(
	'Play Grounds'=>array('index'),
	$model->NAME=>array('view','id'=>$model->ID),
	'Update',
);

$this->menu=array(
	array('label'=>'Lista descanso', 'url'=>array('index')),
	array('label'=>'Crear descanso', 'url'=>array('create')),
	array('label'=>'Ver descanso', 'url'=>array('view', 'id'=>$model->ID)),
	array('label'=>'Gestionar descanso', 'url'=>array('admin')),
);
?>

<h1>Actualizar descansos <?php echo $model->ID; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>