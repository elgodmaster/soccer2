<?php
$this->breadcrumbs=array(
	'Roles'=>array('index'),
	$model->NAME=>array('view','id'=>$model->ID),
	'Update',
);

$this->menu=array(
	array('label'=>'Lista rol', 'url'=>array('index')),
	array('label'=>'Crear role', 'url'=>array('create')),
	array('label'=>'Ver role', 'url'=>array('view', 'id'=>$model->ID)),
	array('label'=>'Gestionar Rol', 'url'=>array('admin')),
);
?>

<h1>Actualizar rol <?php echo $model->ID; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>