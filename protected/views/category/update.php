<?php
$this->breadcrumbs=array(
	'Categories'=>array('index'),
	$model->NAME=>array('view','id'=>$model->ID_CATEGORY),
	'Update',
);

$this->menu=array(
	array('label'=>'Lista categoria', 'url'=>array('index')),
	array('label'=>'Crear categoria', 'url'=>array('create')),
	array('label'=>'Ver categoria', 'url'=>array('view', 'id'=>$model->ID_CATEGORY)),
	array('label'=>'Gestionar categoria', 'url'=>array('admin')),
);
?>

<h1>Actualizar categoria <?php echo $model->ID_CATEGORY; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>