<?php
$this->breadcrumbs=array(
	'Referees'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Referee','url'=>array('index')),
	array('label'=>'Manage Referee','url'=>array('admin')),
);
?>

<h1>Create Referee</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>