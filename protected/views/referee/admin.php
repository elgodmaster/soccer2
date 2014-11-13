<?php
$this->breadcrumbs=array(
	'Referees'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'Lista árbitros ','url'=>array('index')),
	array('label'=>'Crear nuevo árbitro','url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('referee-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Administrar árbitros</h1>

<p>
Puede introducir un operador de comparación (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
o <b>=</b>) al comienzo de cada uno de sus valores de búsqueda para especificar cómo se debe hacer la comparación.
</p>

<?php echo CHtml::link('Búsqueda avanzada','#',array('class'=>'search-button btn')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'referee-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'ID',
		'NAME',
		'ADDRESS',
		'EMAIL',
		'PHONE',
		'DATE_UP',
		/*
		'ACTIVE',
		*/
		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
		),
	),
)); ?>
