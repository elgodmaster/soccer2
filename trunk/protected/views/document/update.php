<?php
$this->breadcrumbs=array(
	'Documents'=>array('index'),
	$model->NAME=>array('view','id'=>$model->ID),
	'Update',
);

$this->menu=array(
	array('label'=>'Lista documentos', 'url'=>array('index')),
	array('label'=>'Crear nuevo documento', 'url'=>array('create')),
	array('label'=>'Ver documento', 'url'=>array('view', 'id'=>$model->ID)),
	
);
?>

<h1> Documentos <?php echo $model->ID; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>