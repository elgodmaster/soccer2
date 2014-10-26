<?php
$this->breadcrumbs=array(
	'Torneos',
);

$this->menu=array(
	array('label'=>'Crear nuevo torneo', 'url'=>array('create')),
		array('label'=>'Administrar torneos', 'url'=>array('admin')),

);




?>



<h1>Lista torneos</h1>



<?php $this->widget('bootstrap.widgets.TbListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
