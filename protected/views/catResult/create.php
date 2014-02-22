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
<h1> <?php echo $model->NAME; ?></h1>

<h2>Obtener resultados</h2>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>