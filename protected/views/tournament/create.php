<?php
$this->breadcrumbs=array(
	'Tournaments'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'Lista  torneo', 'url'=>array('index')),
);

?>

//<h3><?php echo $model->NAME;?></h3>
<h2>Crear nuevo torneo</h2>


<?php echo $this->renderPartial('_createForm', array('model'=>$model,'catCategory'=>$catCategory)); ?>