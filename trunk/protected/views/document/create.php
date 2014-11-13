<?php
$this->breadcrumbs=array(
	'Documents'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'Lista documentos', 'url'=>array('index')),
	
);
?>

<h1>Crear nuevo documento</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>