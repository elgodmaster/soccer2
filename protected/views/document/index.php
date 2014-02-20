<?php
$this->breadcrumbs=array(
	'Documentos',
);

$this->menu=array(
	array('label'=>'Crear nuevo documento', 'url'=>array('create')),

);
?>

<h2>Documentos</h2>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
