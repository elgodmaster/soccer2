<?php
$this->breadcrumbs=array(
	'Categorias',
);

$this->menu=array(
	array('label'=>'Crear categoria', 'url'=>array('create')),
	array('label'=>'Gestionar Categoria', 'url'=>array('admin')),
);
?>

<h1>Categorias</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
