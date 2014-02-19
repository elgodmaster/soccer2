<?php
$this->breadcrumbs=array(
	'Teams'=>array('index'),
	$model->NAME,
);

$this->menu=array(
	array('label'=>'Lista equipo', 'url'=>array('index')),
	array('label'=>'Crear equipo', 'url'=>array('create')),
	array('label'=>'Actualizar', 'url'=>array('update', 'id'=>$model->ID)),
	array('label'=>'Eliminar', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->ID),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Administrar', 'url'=>array('admin')),
	array('label'=>'Documentos', 'url'=>array('manageDocuments','id'=>$model->ID)),
	array('label'=>'Jugadores', 'url'=>array('manageTeamPlayer','id'=>$model->ID)),
);
?>




<h1>Ver equipo #<?php echo $model->ID; ?></h1>


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
		'ID_CATEGORY',
		'ADDRESS',
		'DESCRIPTION',
		'EMAIL',
		'CREATION_DATE',
		'ACTIVE',
	),
)); ?>
</div>