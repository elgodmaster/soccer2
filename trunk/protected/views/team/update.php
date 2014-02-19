<?php
$this->breadcrumbs=array(
	'Teams'=>array('index'),
	$model->NAME=>array('view','id'=>$model->ID),
	'Update',
);

$this->menu=array(
	array('label'=>'Lista equipo', 'url'=>array('index')),
	array('label'=>'Crear equipo', 'url'=>array('create')),
	array('label'=>'Ver equipo', 'url'=>array('view', 'id'=>$model->ID)),
	array('label'=>'gestionar equipo', 'url'=>array('admin')),
	array('label'=>'Jugadores', 'url'=>array('manageTeamPlayer','id'=>$model->ID)),
	array('label'=>'Documentos', 'url'=>array('manageDocuments','id'=>$model->ID)),
);
?>
 
<h1>Actualizar equipo <?php echo $model->ID; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model,'catCategory'=>$catCategory)); ?>