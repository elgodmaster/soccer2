<?php
$this->breadcrumbs=array(
	'Documents'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'Lista documentos', 'url'=>array('index')),
	
);
?>

<h3>Crear nuevo documento</h3>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>