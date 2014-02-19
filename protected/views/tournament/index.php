<?php
$this->breadcrumbs=array(
	'Torneos',
);

$this->menu=array(
	array('label'=>'Crear torneo', 'url'=>array('create')),
	array('label'=>'Gestionar torneo', 'url'=>array('admin')),
);
?>

<h1>Torneos</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
