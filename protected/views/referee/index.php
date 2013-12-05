<?php
$this->breadcrumbs=array(
	'Referees',
);

$this->menu=array(
	array('label'=>'Create Referee','url'=>array('create')),
	array('label'=>'Manage Referee','url'=>array('admin')),
);
?>

<h1>Referees</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
