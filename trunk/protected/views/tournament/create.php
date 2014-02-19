<?php
$this->breadcrumbs=array(
	'Tournaments'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'Lista torneo', 'url'=>array('index')),
	array('label'=>'Gestionar torneo', 'url'=>array('admin')),
);
?>

<h1>Crear torneo</h1>

<?php echo $this->renderPartial('_createForm', array('model'=>$model,'catCategory'=>$catCategory)); ?>