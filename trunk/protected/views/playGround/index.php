<?php
/* @var $this PlayGroundController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Play Grounds',
);

$this->menu=array(
	array('label'=>'Create PlayGround', 'url'=>array('create')),
	array('label'=>'Manage PlayGround', 'url'=>array('admin')),
);
?>

<h1>Play Grounds</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
