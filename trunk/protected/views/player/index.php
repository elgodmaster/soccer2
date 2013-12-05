<?php
$this->breadcrumbs=array(
	'Jugadores',
);

$this->menu=array(
	array('label'=>'Crear jugador', 'url'=>array('create')),
	array('label'=>'Gestionar jugador', 'url'=>array('admin')),
);
?>

<h1>Jugadores</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
