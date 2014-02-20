<?php
/* @var $this PlayGroundController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Play Grounds',
);

$this->menu=array(
	array('label'=>'Obtener descanso', 'url'=>array('create')),
	
);
?>

<h2>lista descansos</h2>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
