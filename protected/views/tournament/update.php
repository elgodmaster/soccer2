<?php
$this->breadcrumbs=array(
	'Tournaments'=>array('index'),
	$model->NAME=>array('manage','id'=>$model->ID),
	'Update',
);

$this->menu=array(
array('label'=>'Inicio', 'url'=>array('manage','id'=>$model->ID)),
	//array('label'=>'Ver torneo', 'url'=>array('view', 'id'=>$model->ID)),
	//array('label'=>'Documentos', 'url'=>array('manageDocuments','id'=>$model->ID)),
	//array('label'=>'Gestionar torneo', 'url'=>array('admin')),
);
?>

<h1> <?php echo $model->NAME; ?></h1>

<h3>Modificar eliminatoria </h3>

<?php echo $this->renderPartial($form, array('model'=>$model,	'catCategory'=>$catCategory)); ?>