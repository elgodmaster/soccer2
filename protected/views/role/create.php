<?php
$this->breadcrumbs=array(
	'Roles'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'Lista roles', 'url'=>array('index')),
	
);
?>

<h2>Crear rol</h2>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>