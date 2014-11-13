<?php
$this->breadcrumbs=array(
	'Referees'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'Lista árbitros','url'=>array('index')),
	
);
?>

<h1>Crear nuevo árbitro</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>