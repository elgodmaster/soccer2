<?php
$this->breadcrumbs=array(
	'Roles',
);

$this->menu=array(
	array('label'=>'Crear  rol', 'url'=>array('create')),
	
);
?>

<h3>Roles</h3>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
