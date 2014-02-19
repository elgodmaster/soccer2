<?php
$this->breadcrumbs=array(
	'Referees'=>array('index'),
	$model->NAME=>array('view','id'=>$model->ID),
	'Update',
);

$this->menu=array(
	array('label'=>'Lista arbitro','url'=>array('index')),
	array('label'=>'Crear arbitro','url'=>array('create')),
	array('label'=>'Ver arbitro','url'=>array('view','id'=>$model->ID)),
	array('label'=>'Gestionar arbitro','url'=>array('admin')),
);
?>

<h1>Actualizar arbitro<?php echo $model->ID; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>