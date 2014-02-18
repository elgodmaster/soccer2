<?php
/* @var $this CatResultController */
/* @var $model CatResult */

$this->breadcrumbs=array(
	'Cat Results'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'Lista resultados', 'url'=>array('index')),
	array('label'=>'Gestionar resultados', 'url'=>array('admin')),
);
?>

<h1>Crear resultados</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>