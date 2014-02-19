<?php
$this->breadcrumbs=array(
	'Referees',
);

$this->menu=array(
	array('label'=>'Crear nuevo árbitro','url'=>array('create')),

);
?>

<h3>Árbitros</h3>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
