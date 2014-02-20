<?php
/* @var $this CatResultController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Cat Results',
);

$this->menu=array(
	array('label'=>'Obtener resultados ', 'url'=>array('create')),
	
);
?>

<h3>Resultado categorias</h3>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
