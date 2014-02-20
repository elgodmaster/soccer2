<?php
$this->breadcrumbs=array(
	'Documents'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'Lista documentos', 'url'=>array('index')),
	
);
?>

<h2>Crear nuevo documento</h2>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>