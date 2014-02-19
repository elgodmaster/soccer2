<?php
$this->breadcrumbs=array(
		'Tournaments'=>array('admin'),
		$model->NAME

);

$this->menu=array(
		array('label'=>'Crear nuevo torneo', 'url'=>array('create')),
		array('label'=>'Borrar este torneo', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->ID),'confirm'=>'Esta seguro de eliminar este torneo')),
		
);
?>

<h1>
	<?php echo $model->NAME;?>
</h1>

<?php $this->widget('bootstrap.widgets.TbAlert', array(
		'block'=>false, // display a larger alert block?
		'fade'=>true, // use transitions?
		'closeText'=>'&times;', // close link text - if set to false, no close link is displayed
));

?>



<div class="view">

	<?php 


	$allTeams = '';

	foreach ($model->teams as $team){


		$allTeams = $allTeams.$team->iDTEAM->NAME.', ';


	}


	?>

	<?php $this->widget('bootstrap.widgets.TbDetailView', array(
			'type'=>'striped bordered condensed',
			'data'=>$model,
			'attributes'=>array(
        array('name'=>'ID', 'label'=>'ID'),
     //	   array('name'=>'NAME', 'label'=>'Nombre del torneo'),
        array('name'=>'ID_CATEGORY', 'label'=>'Categoria', 'value'=>$model->iDCATEGORY->NAME),
		array('name'=>'START_DATE', 'label'=>'Fecha Inicio'),
		array('name'=>'TYPE', 'label'=>'Tipo de torneo' , 'value'=>$model->getStringTournamentType()),
    	array('name'=>'TYPE', 'label'=>'Equipos del torneo'.' ('.count($model->teams).') ' , 'value'=>$allTeams),
		array('name'=>'STATUS', 'label'=>'Estatus', 'value'=>$model->aStatus[$model->STATUS]),


    ),
)); ?>

</div>


<fieldset>
	<legend>Men&uacute;</legend>




	<div class="span-10">

		<?php $this->widget('bootstrap.widgets.TbMenu', array(
				'type'=>'list',
				'items'=>array(
        array('label'=>'Equipos'),
        array('label'=>'Equipos del torneo', 'icon'=>'bullhorn', 'url'=>array('manageTeams','tournamentId'=>$model->ID), ),
        array('label'=>'todos', 'icon'=>'book', 'url'=>'' ),
    	array('label' =>'Ayuda', 'icon'=>'flag','url' => 'http://www.someurl.com',),

        array('label'=>'Perfil'),
        array('label'=>'Datos generales', 'icon'=>'user', 'url'=>array('updateByFm','id'=>$model->ID, 'fm'=>'_profileForm')),
        array('label'=>'Documentos', 'icon'=>'folder-open', 'url'=>array('manageDocuments','id'=>$model->ID)),
    	array('label'=>'Bases, Reglas y Convocatoria', 'icon'=>'pencil', 'url'=>array('updateByFm','id'=>$model->ID, 'fm'=>'_ruleForm')),
        array('label'=>'Ayuda', 'icon'=>'flag', 'url'=>'#'),
    ),
)); ?>

	</div>

	<div class="span-10">

		<?php $this->widget('bootstrap.widgets.TbMenu', array(
		    	'type'=>'list',
				'items'=>array(
        array('label'=>'Configuración'),
		array('label'=>'Horarios', 'icon'=>'calendar', 'url'=>array('updateBySchedule','id'=>$model->ID)),
		array('label'=>'Categoría y tipo de torneo', 'icon'=>'list', 'url'=>array('updateByFm','id'=>$model->ID, 'fm'=>'_categoryForm')),
		array('label'=>'Eliminatoria', 'icon'=>'list-alt', 'url'=>array('updateByFm','id'=>$model->ID, 'fm'=>'_confForm')),
        array('label'=>'Ayuda', 'icon'=>'flag', 'url'=>'#'),


        array('label'=>'Jornadas'),
        ($model->isEnabledToGenerateMatch() && $model->STATUS < 4) ? array('label'=>'Pre Visualizar jornadas', 'icon'=>'eye-open', 'url'=>array('manageMatchs','id'=>$model->ID), ): (($model->STATUS > 3)? array('label'=>'Horarios', 'icon'=>'time', 'url'=>array('manageMatchs','id'=>$model->ID), ) : null),
		($model->STATUS > 3 )? array('label'=>'Temporada regular', 'icon'=>'retweet', 'url'=>array('manageResults','id'=>$model->ID), ) : null,
		($model->STATUS > 3 )? array('label'=>'Clasificacion', 'icon'=>'random', 'url'=>array('clasification','id'=>$model->ID), ) : null,
		array('label'=>'Ayuda', 'icon'=>'flag', 'url'=>'#'),
    ),
)); ?>


	</div>


	<div class="span-10">

		<?php $this->widget('bootstrap.widgets.TbMenu', array(
				'type'=>'list',
				'items'=>array(
        array('label'=>'Publicaciónes'),
		array('label'=>'Facebook', 'icon'=>'calendar', 'url'=>array('updateBySchedule','id'=>$model->ID)),
		array('label'=>'Correo electronico', 'icon'=>'list', 'url'=>array('updateByFm','id'=>$model->ID, 'fm'=>'_categoryForm')),
		array('label'=>'Twitter', 'icon'=>'list-alt', 'url'=>array('updateByFm','id'=>$model->ID, 'fm'=>'_confForm')),
        array('label'=>'Ayuda', 'icon'=>'flag', 'url'=>'#'),

array('label'=>'Estadísticas'),
array('label'=>'Tabla de posiciónes', 'icon'=>'th-list', 'url'=>array('pointBoard','id'=>$model->ID)),
array('label'=>'Estadistícas por Equipos', 'icon'=>'list', 'url'=>array('#','id'=>$model->ID, 'fm'=>'_categoryForm')),
array('label'=>'Estadistícas por Jugadores', 'icon'=>'list-alt', 'url'=>array('#','id'=>$model->ID, 'fm'=>'_confForm')),
array('label'=>'Ayuda', 'icon'=>'flag', 'url'=>'#'),


            ),
)); ?>


	</div>



</fieldset>

<div class="form-actions">

	<?php if($model->STATUS == 3) {?>

	<?php $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
			'id'=>'verticalForm',
)); ?>

	<?php echo $form->hiddenField($model,"ID",array('value'=>$model->ID));?>

	<?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'submit',  'type'=>'primary','label'=> $model->isNewRecord ?'Create' : 'Generar Torneo')); ?>

	<?php $this->endWidget(); ?>

	<?php }?>
</div>

