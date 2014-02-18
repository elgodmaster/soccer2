<?php
/* @var $this CatResultController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Cat Results',
);

$this->menu=array(
	array('label'=>'Crear resultados ', 'url'=>array('create')),
	array('label'=>'Gestionar resultados', 'url'=>array('admin')),
);
?>

<h1>Resultado categorias</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
