<?php
$this->breadcrumbs=array(
	'Roles',
);

$this->menu=array(
	array('label'=>'Crear Role', 'url'=>array('create')),
	array('label'=>'Gestionar Role', 'url'=>array('admin')),
);
?>

<h1>Roles</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>