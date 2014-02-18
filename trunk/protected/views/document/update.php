<?php
$this->breadcrumbs=array(
	'Documents'=>array('index'),
	$model->NAME=>array('view','id'=>$model->ID),
	'Update',
);

$this->menu=array(
	array('label'=>'Lista documento', 'url'=>array('index')),
	array('label'=>'Crear documento', 'url'=>array('create')),
	array('label'=>'Ver documento', 'url'=>array('view', 'id'=>$model->ID)),
	array('label'=>'Gestionar documento', 'url'=>array('admin')),
);
?>

<h1> Documentos <?php echo $model->ID; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>