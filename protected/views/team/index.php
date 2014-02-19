<?php
$this->breadcrumbs=array(
	'Equipo',
);

$this->menu=array(
	array('label'=>'Crear equipo', 'url'=>array('create')),
	array('label'=>'Gestionar equipo', 'url'=>array('admin')),
);
?>

<h1>Equipo</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
