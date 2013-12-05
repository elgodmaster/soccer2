<?php
$this->breadcrumbs=array(
	'Match'=>array('index'),
	'Manage match'=>array('manage'),
	'Manage Player'	
);

$this->menu=array(
	array('label'=>'List Player', 'url'=>array('index')),
	array('label'=>'Manage Player', 'url'=>array('admin')),
);
?>

<h1>Manage Player Result</h1>

<?php echo $this->renderPartial('_playerResultForm', array('model'=>$model,
				'playerModel'=>$playerModel,
				'playerResults'=>$playerResults)); ?>