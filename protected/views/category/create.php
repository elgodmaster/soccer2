<?php
$this->breadcrumbs=array(
	'Categories'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'Lista categorías', 'url'=>array('index')),

);
?>

<h1>Crear nueva categoría</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>