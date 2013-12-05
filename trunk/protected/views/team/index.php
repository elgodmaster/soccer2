<?php
$this->breadcrumbs=array(
	'Equipo',
);

$this->menu=array(
	array('label'=>'Crear equipo', 'url'=>array('create')),
	array('label'=>'Administrar equipo', 'url'=>array('admin')),
);
?>

<h1>Equipos</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
