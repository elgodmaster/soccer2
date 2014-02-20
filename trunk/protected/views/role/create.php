<?php
$this->breadcrumbs=array(
	'Roles'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'Lista roles', 'url'=>array('index')),
	
);
?>

<h3>Crear rol</h3>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>