<?php
$this->breadcrumbs=array(
	'Torneos',
);

$this->menu=array(
	array('label'=>'Crear nuevo torneo', 'url'=>array('create')),
		array('label'=>'Administrar torneos', 'url'=>array('admin')),

);




?>



<h3>Lista torneos</h3>



<?php $this->widget('bootstrap.widgets.TbListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
