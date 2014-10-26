<?php
$this->breadcrumbs=array(
	'Equipo',
);

$this->menu=array(
	array('label'=>'Crear nuevo  equipo', 'url'=>array('create')),
	);
?>

<h1>Equipos</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
