<?php
$this->breadcrumbs=array(
	'Jugadores',
);

$this->menu=array(
	array('label'=>'Crear nuevo jugador', 'url'=>array('create')),
	
);
?>

<h3>Jugadores</h3>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
