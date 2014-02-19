<?php
$this->breadcrumbs=array(
	'Teams'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'Lista equipo', 'url'=>array('index')),
	array('label'=>'Gestionar equipo', 'url'=>array('admin')),
);
?>

<h1>Crear un Equipo</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model,'catCategory'=>$catCategory)); ?>