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

<h1>Torneo  <small><?php echo $model->NAME; ?></small></h1>

<?php echo $this->renderPartial($form, array('model'=>$model,	'catCategory'=>$catCategory)); ?>