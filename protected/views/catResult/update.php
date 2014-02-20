<?php
/* @var $this CatResultController */
/* @var $model CatResult */

$this->breadcrumbs=array(
	'Cat Results'=>array('index'),
	$model->NAME=>array('view','id'=>$model->ID),
	'Update',
);

$this->menu=array(
	array('label'=>'Lista resultados', 'url'=>array('index')),
	array('label'=>'Obtener resultados', 'url'=>array('create')),
	array('label'=>'Ver resultados', 'url'=>array('view', 'id'=>$model->ID)),
	
);
?>

<h3>Actualizar resultados <?php echo $model->ID; ?></h3>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>