<?php
$this->breadcrumbs=array(
	'Referees'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'Lista árbitros','url'=>array('index')),
	
);
?>

<h3>Crear nuevo árbitro</h3>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>