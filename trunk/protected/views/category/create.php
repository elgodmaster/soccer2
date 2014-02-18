<?php
$this->breadcrumbs=array(
	'Categories'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'Lista categoria', 'url'=>array('index')),
	array('label'=>'Gestionar categoria', 'url'=>array('admin')),
);
?>

<h1>Crear categoria</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>