<?php
$this->breadcrumbs=array(
	'Torneos',
);

$this->menu=array(
	array('label'=>'Crear nuevo torneo', 'url'=>array('create')),
	
);



?>



<h3>Lista torneos</h3>



<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
