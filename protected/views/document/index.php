<?php
$this->breadcrumbs=array(
	'Documentos',
);

$this->menu=array(
	array('label'=>'Crear nuevo documento', 'url'=>array('create')),

);
?>

<h1>Documentos</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
