<?php
$this->breadcrumbs=array(
	'Jugadores',
);

$this->menu=array(
	array('label'=>'Crear nuevo jugador', 'url'=>array('create')),
	
);
?>

<h1>Jugadores</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
