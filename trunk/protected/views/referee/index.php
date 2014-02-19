<?php
$this->breadcrumbs=array(
	'Referees',
);

$this->menu=array(
	array('label'=>'Crear arbitro','url'=>array('create')),
	array('label'=>'Gestionar arbitro','url'=>array('admin')),
);
?>

<h1>Arbitros</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
