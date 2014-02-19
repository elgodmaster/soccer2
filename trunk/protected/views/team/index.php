<?php
$this->breadcrumbs=array(
	'Equipo',
);

$this->menu=array(
	array('label'=>'Crear nuevo  equipo', 'url'=>array('create')),
	);
?>

<h3>Equipos</h3>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
