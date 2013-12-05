<?php
$this->breadcrumbs=array(
	'Match'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Player', 'url'=>array('index')),
	array('label'=>'Manage Player', 'url'=>array('admin')),
);
?>

<h1>Manage Match</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model,'matchResults'=>$matchResults)); ?>