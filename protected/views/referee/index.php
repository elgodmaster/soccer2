<?php
$this->breadcrumbs=array(
	'Referees',
);

$this->menu=array(
	array('label'=>'Crear nuevo árbitro','url'=>array('create')),

);
?>

<h2>Árbitros</h2>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
