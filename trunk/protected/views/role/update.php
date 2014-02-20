<?php
$this->breadcrumbs=array(
	'Roles'=>array('index'),
	$model->NAME=>array('view','id'=>$model->ID),
	'Update',
);

$this->menu=array(
	array('label'=>'Lista roles', 'url'=>array('index')),
	array('label'=>'Crear rol', 'url'=>array('create')),
	array('label'=>'Ver role', 'url'=>array('view', 'id'=>$model->ID)),
	
);
?>

<h3>Modificar  rol <?php echo $model->ID; ?></h3>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>