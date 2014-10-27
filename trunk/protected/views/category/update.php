<?php
$this->breadcrumbs=array(
	'Categories'=>array('index'),
	$model->NAME=>array('view','id'=>$model->ID_CATEGORY),
	'Update',
);

$this->menu=array(
	array('label'=>'Lista categoría', 'url'=>array('index')),
	array('label'=>'Crear nueva categoría', 'url'=>array('create')),
	array('label'=>'Ver categoría', 'url'=>array('view', 'id'=>$model->ID_CATEGORY)),
	
);
?>

<h1>Modificar categoría <?php echo $model->ID_CATEGORY; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>