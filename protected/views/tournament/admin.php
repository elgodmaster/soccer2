<?php
$this->breadcrumbs=array(
	'Tournaments'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'Lista torneos', 'url'=>array('index')),
	array('label'=>'Crear nuevo torneo', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('tournament-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h3>
	<?php echo $model->NAME;?>
</h3>

<h1>Administrar torneo</h1>

<p>
Puede introducir un operador de comparación (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
o <b>=</b>) al comienzo de cada uno de los valores de búsqueda para especificar cómo se debe hacer la comparación.
</p>

<?php echo CHtml::link('Búsqueda avanzada','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'tournament-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'ID',
		'ID_CATEGORY',
		'NAME',
		'DESCRIPTION',
		'START_DATE',
		'END_DATE',
		/*
		'ACTIVE',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
