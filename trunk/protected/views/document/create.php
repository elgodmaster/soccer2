<?php
$this->breadcrumbs=array(
	'Documents'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'Lista documento', 'url'=>array('index')),
	array('label'=>'Gestionar documento', 'url'=>array('admin')),
);
?>

<h1>Crear documento</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>