<?php
$this->breadcrumbs=array(
		'Torneos'=>array('admin'),
		strtoupper($model->NAME)

);

$this->menu=array(
		array('label'=>'Crear nuevo torneo', 'url'=>array('create')),
		array('label'=>'Borrar este torneo', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->ID),'confirm'=>'Esta seguro de eliminar este torneo')),
		
);

$this->notifications=array(
		array('label' => '<i class="icon-star icon-white"></i> Publicar el torneo', 'url'=>array('create'), 'linkOptions'=>array('class'=>'btn btn-large btn-info'),),
		
		array('label'=>'<i class="icon-envelope icon-white"></i> Enviar notificación', 'url'=>'#', 'linkOptions'=>array('class'=>'btn btn-large btn-primary')),

);
?>

<h1>
	Torneo <small><?php echo strtoupper($model->NAME);?></small>	

</h1>



<div class="row-fluid">

<div class="span12">
	<?php 
	$allTeams = '';
	foreach ($model->teams as $team){
		$allTeams ='<div class="span1 muted">'. CHtml::image ( $team->iDTEAM->getLogo (), '', array (
					"style" => "width:50px;height:50px;",
					"class" => "img-polaroid" 
			) ).strtoupper($team->iDTEAM->NAME).'</div>'.$allTeams;
	}?>

	<?php $this->widget('bootstrap.widgets.TbDetailView', array(
			'type'=>'condensed striped bordered',
			'data'=>$model,
			'attributes'=>array(
        
		array('name'=>'ID', 'label'=>'ID'),
		array('name'=>'TYPE', 'label'=>'Equipos'.' ('.count($model->teams).') ' , 'value'=>$allTeams,'type'=>'raw'),
     //	   array('name'=>'NAME', 'label'=>'Nombre del torneo'),
        array('name'=>'ID_CATEGORY', 'label'=>'Categoría', 'value'=>$model->iDCATEGORY->NAME),
		array('name'=>'START_DATE', 'label'=>'Fecha Inicio'),
		array('name'=>'TYPE', 'label'=>'Tipo de torneo' , 'value'=>$model->getStringTournamentType()),
    	
		array('name'=>'STATUS', 'label'=>'Estatus', 'value'=>$model->aStatus[$model->STATUS]),


    ),
)); ?>

		<?php if($model->STATUS == 3) {?>

	<?php $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
			'id'=>'verticalForm',
)); ?>

	<?php echo $form->hiddenField($model,"ID",array('value'=>$model->ID));?>
<div class="form-actions">
	<?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'submit',  'type'=>'primary','label'=> $model->isNewRecord ?'Create' : 'Generar Torneo')); ?>
</div>
	<?php $this->endWidget(); ?>

	<?php }?>
	

</div>

</div>

<div class="row-fluid">

<div class="span4">

		<?php $this->widget('bootstrap.widgets.TbMenu', array(
				'type'=>'list',
				'items'=>array(
        array('label'=>'Equipos'),
        array('label'=>'Esquipos participantes', 'icon'=>'bullhorn', 'url'=>array('manageTeams','tournamentId'=>$model->ID), ),
        array('label'=>'todos', 'icon'=>'book', 'url'=>'' ),
    	

        array('label'=>'Perfil del torneo'),
        array('label'=>'Datos generales', 'icon'=>'user', 'url'=>array('updateByFm','id'=>$model->ID, 'fm'=>'_profileForm')),
        array('label'=>'Documentos', 'icon'=>'folder-open', 'url'=>array('manageDocuments','id'=>$model->ID)),
    	array('label'=>'Bases, Reglas y Convocatoria', 'icon'=>'pencil', 'url'=>array('updateByFm','id'=>$model->ID, 'fm'=>'_ruleForm')),
        
    ),
)); ?>

	</div>

	<div class="span4">

		<?php $this->widget('bootstrap.widgets.TbMenu', array(
		    	'type'=>'list',
				'items'=>array(
        array('label'=>'Configuración'),
		array('label'=>'Horarios', 'icon'=>'calendar', 'url'=>array('updateBySchedule','id'=>$model->ID)),
		array('label'=>'Categoría y tipo de torneo', 'icon'=>'list', 'url'=>array('updateByFm','id'=>$model->ID, 'fm'=>'_categoryForm')),
		array('label'=>'Eliminatoria', 'icon'=>'list-alt', 'url'=>array('updateByFm','id'=>$model->ID, 'fm'=>'_confForm')),



        array('label'=>'Jornadas'),
        ($model->isEnabledToGenerateMatch() && $model->STATUS < 4) ? array('label'=>'Pre Visualizar jornadas', 'icon'=>'eye-open', 'url'=>array('manageMatchs','id'=>$model->ID), ): (($model->STATUS > 3)? array('label'=>'Horarios', 'icon'=>'time', 'url'=>array('manageMatchs','id'=>$model->ID), ) : null),
		($model->STATUS > 3 )? array('label'=>'Resultados', 'icon'=>'retweet', 'url'=>array('manageResults','id'=>$model->ID), ) : null,
		//($model->STATUS > 3 )? array('label'=>'Clasificación', 'icon'=>'random', 'url'=>array('clasification','id'=>$model->ID), ) : null,
	
    ),
)); ?>


	</div>


	<div class="span4">

		<?php $this->widget('bootstrap.widgets.TbMenu', array(
				'type'=>'list',
				'items'=>array(
      /*  array('label'=>'Publicaciones'),
		array('label'=>'Facebook', 'icon'=>'calendar', 'url'=>array('updateBySchedule','id'=>$model->ID)),
		array('label'=>'Correo eléctronico', 'icon'=>'list', 'url'=>array('updateByFm','id'=>$model->ID, 'fm'=>'_categoryForm')),
		array('label'=>'Twitter', 'icon'=>'list-alt', 'url'=>array('updateByFm','id'=>$model->ID, 'fm'=>'_confForm')),
        array('label'=>'Ayuda', 'icon'=>'flag', 'url'=>'#'),*/

array('label'=>'Ayuda'),
array('label'=>'Contenido general', 'icon'=>'th-list', 'url'=>array('pointBoard','id'=>$model->ID)),
array('label'=>'Soporte en linea', 'icon'=>'list', 'url'=>array('#','id'=>$model->ID, 'fm'=>'_categoryForm')),
array('label'=>'Reportar un error', 'icon'=>'list-alt', 'url'=>array('#','id'=>$model->ID, 'fm'=>'_confForm')),



            ),
	)); ?>
	
	
	
	<?php if($model->STATUS > 3){ ?> 
		<?php $this->widget('bootstrap.widgets.TbMenu', array(
				'type'=>'list',
				'items'=>array(
      /*  array('label'=>'Publicaciones'),
		array('label'=>'Facebook', 'icon'=>'calendar', 'url'=>array('updateBySchedule','id'=>$model->ID)),
		array('label'=>'Correo eléctronico', 'icon'=>'list', 'url'=>array('updateByFm','id'=>$model->ID, 'fm'=>'_categoryForm')),
		array('label'=>'Twitter', 'icon'=>'list-alt', 'url'=>array('updateByFm','id'=>$model->ID, 'fm'=>'_confForm')),
        array('label'=>'Ayuda', 'icon'=>'flag', 'url'=>'#'),*/

array('label'=>'Estadísticas'),
array('label'=>'Tabla de posiciones', 'icon'=>'th-list', 'url'=>array('pointBoard','id'=>$model->ID)),
array('label'=>'Estadistícas por Equipos', 'icon'=>'list', 'url'=>array('#','id'=>$model->ID, 'fm'=>'_categoryForm')),
array('label'=>'Estadistícas por Jugadores', 'icon'=>'list-alt', 'url'=>array('#','id'=>$model->ID, 'fm'=>'_confForm')),



            ),
	)); ?>
<?php }?>

	</div>

</div>


<div class="row-fluid">


</div>

