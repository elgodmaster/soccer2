<?php
$this->breadcrumbs=array(
	'Torneos',
);

$this->menu=array(
	array('label'=>'Crear nuevo torneo', 'url'=>array('create')),
	
);



?>



<h2>Lista torneos</h2>



<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
