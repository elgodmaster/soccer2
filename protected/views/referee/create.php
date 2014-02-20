<?php
$this->breadcrumbs=array(
	'Referees'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'Lista árbitros','url'=>array('index')),
	
);
?>

<h2>Crear nuevo árbitro</h2>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>