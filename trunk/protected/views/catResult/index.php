<?php
/* @var $this CatResultController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Cat Results',
);

$this->menu=array(
	array('label'=>'Create CatResult', 'url'=>array('create')),
	array('label'=>'Manage CatResult', 'url'=>array('admin')),
);
?>

<h1>Cat Results</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
