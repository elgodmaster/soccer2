<?php
/* @var $this CatResultController */
/* @var $model CatResult */

$this->breadcrumbs=array(
	'Cat Results'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List CatResult', 'url'=>array('index')),
	array('label'=>'Manage CatResult', 'url'=>array('admin')),
);
?>

<h1>Create CatResult</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>