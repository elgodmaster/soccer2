<?php
$this->breadcrumbs=array(
	'Roles'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'Lista rol', 'url'=>array('index')),
	array('label'=>'Gestionar rol', 'url'=>array('admin')),
);
?>

<h1>Crear rol</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>