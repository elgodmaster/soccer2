
<div class="row">



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

<div class="page-header text-center">
<h1>Jugadores. <small><?php echo $model->NAME; ?></small> </h1>
</div>


<div class="span-3 offset1">
 <?php 
 
 if(isset($documentModel))
	echo CHtml::image($documentModel->PATH, '', array(
    		'data-original' => 'original',
			'height'=>'150',
			'width'=>'150',
			'class'=>'img-polaroid'
));

?>
</div>
 <div class="span-8">
<?php $this->widget('bootstrap.widgets.TbDetailView', array(
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

<div class="row">
	<div class="span-12">
	<?php $this->widget('bootstrap.widgets.TbMenu', array(
				'type'=>'list',
				'items'=>array(
      /*  array('label'=>'Publicaciones'),
		array('label'=>'Facebook', 'icon'=>'calendar', 'url'=>array('updateBySchedule','id'=>$model->ID)),
		array('label'=>'Correo eléctronico', 'icon'=>'list', 'url'=>array('updateByFm','id'=>$model->ID, 'fm'=>'_categoryForm')),
		array('label'=>'Twitter', 'icon'=>'list-alt', 'url'=>array('updateByFm','id'=>$model->ID, 'fm'=>'_confForm')),
        array('label'=>'Ayuda', 'icon'=>'flag', 'url'=>'#'),*/

array('label'=>'Estadísticas'),
array('label'=>'Goles', 'icon'=>'th-list', 'url'=>array('pointBoard','id'=>$model->ID)),
array('label'=>'Estadistícas por Equipos', 'icon'=>'list', 'url'=>array('#','id'=>$model->ID, 'fm'=>'_categoryForm')),
array('label'=>'Estadistícas por Jugadores', 'icon'=>'list-alt', 'url'=>array('#','id'=>$model->ID, 'fm'=>'_confForm')),
array('label'=>'Ayuda', 'icon'=>'flag', 'url'=>'#'),


            ),
)); ?>
	</div>

</div>
