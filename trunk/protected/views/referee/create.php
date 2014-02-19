<?php
$this->breadcrumbs=array(
	'Referees'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'Lista arbitro','url'=>array('index')),
	array('label'=>'Gestionar arbitro','url'=>array('admin')),
);
?>

<h1>Crear arbitro</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>