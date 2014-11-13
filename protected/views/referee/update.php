<?php
$this->breadcrumbs=array(
	'Referees'=>array('index'),
	$model->NAME=>array('view','id'=>$model->ID),
	'Update',
);

$this->menu=array(
	array('label'=>'Lista árbitros','url'=>array('index')),
	array('label'=>'Crear nuevo árbitro','url'=>array('create')),
	array('label'=>'Ver árbitro','url'=>array('view','id'=>$model->ID)),
	
);
?>

<h1>Modificar árbitro<?php echo $model->ID; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>