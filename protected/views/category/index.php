<?php
$this->breadcrumbs=array(
	'Categorias',
);

$this->menu=array(
	array('label'=>'Crear nueva categoría', 'url'=>array('create')),
	
);
?>

<h2>Categorías</h2>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
