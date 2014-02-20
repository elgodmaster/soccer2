<?php
/* @var $this CatResultController */
/* @var $model CatResult */

$this->breadcrumbs=array(
	'Cat Results'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'Lista resultados', 'url'=>array('index')),
	
);
?>

<h3>Obtener resultados</h3>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>