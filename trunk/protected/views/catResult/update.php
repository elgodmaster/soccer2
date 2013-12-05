<?php
/* @var $this CatResultController */
/* @var $model CatResult */

$this->breadcrumbs=array(
	'Cat Results'=>array('index'),
	$model->NAME=>array('view','id'=>$model->ID),
	'Update',
);

$this->menu=array(
	array('label'=>'List CatResult', 'url'=>array('index')),
	array('label'=>'Create CatResult', 'url'=>array('create')),
	array('label'=>'View CatResult', 'url'=>array('view', 'id'=>$model->ID)),
	array('label'=>'Manage CatResult', 'url'=>array('admin')),
);
?>

<h1>Update CatResult <?php echo $model->ID; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>