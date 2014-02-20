<?php
$this->breadcrumbs=array(
	'Teams'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'Lista equipo', 'url'=>array('index')),
	

		

);



?>

<h2>Crear nuevo equipo</h2>

<?php echo $this->renderPartial('_form', array('model'=>$model,'catCategory'=>$catCategory)); ?>