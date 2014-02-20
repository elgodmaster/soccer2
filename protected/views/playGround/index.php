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

<h3>lista descansos</h3>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
