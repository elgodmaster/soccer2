<?php
/* @var $this PlayGroundController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Play Grounds',
);

$this->menu=array(
	array('label'=>'Crear descanso', 'url'=>array('create')),
	array('label'=>'Gestionar descanso', 'url'=>array('admin')),
);
?>

<h1>Juego estrategico</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
