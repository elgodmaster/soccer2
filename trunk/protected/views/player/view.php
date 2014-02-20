<div class="container showgrid">
<?php
$this->breadcrumbs=array(
	'Jugadores'=>array('index'),
	$model->NAME,
);

$this->menu=array(
	array('label'=>'Inicio', 'url'=>array('index')),
	array('label'=>'Crear nuevo jugador', 'url'=>array('create')),
	array('label'=>'Modificar Jugador', 'url'=>array('update', 'id'=>$model->ID)),
	array('label'=>'Eliminar jugador', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->ID),'confirm'=>'Are you sure you want to delete this item?')),
	
	array('label'=>'Modificar Documentos','url'=>array('updateDocumentation', 'id'=>$model->ID)),
	array('label'=>'Generar Credencial','url'=>array('report', 'id'=>$model->ID), 'linkOptions'=>array('target'=>'_blank')),
);
?>

<h2><?php echo $model->NAME; ?></h2>

<br />

<div class="span-5">
 <?php 
 
 if(isset($documentModel))
	echo CHtml::image($documentModel->PATH, '', array(
    'data-original' => 'original',
			'height'=>'150',
			'width'=>'150'
));

?>
</div>
 <div class="span-15">
<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'ID',
		'NAME',
		'BIRTH',
		'PHONE',
		'EMAIL',
		'ADDRESS',
		'FACE_BOOK',
		'TWITER',
		array(  'name'=>'GENDER',
		'label'=>'SEXO',
		'value'=>($model->GENDER===0)? "Mujer":"Hombre"),

		array(  'name'=>'ACTIVE',
		'label'=>'Estatus',
		'value'=>($model->ACTIVE===0)? "No disponible":"Disponible"),

	),
)); ?>



</div>


</div>