<?php
$this->breadcrumbs=array(
	'Categorias',
);

$this->menu=array(
	array('label'=>'Crear nueva categoría', 'url'=>array('create')),
	
);
?>

<h1>Categorías</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
