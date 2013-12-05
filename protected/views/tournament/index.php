<?php
$this->breadcrumbs=array(
	'Torneos',
);

$this->menu=array(
	array('label'=>'Crear Torneo', 'url'=>array('create')),
	array('label'=>'Manage Torneo', 'url'=>array('admin')),
);
?>

<h1>Toneos</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
