<?php
$this->breadcrumbs=array(
	'Categories'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'Lista categorías', 'url'=>array('index')),

);
?>

<h2>Crear nueva categoría</h2>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>