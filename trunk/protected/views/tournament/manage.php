<?php
$this->breadcrumbs=array(
	'Tournaments'=>array('admin'),
	$model->NAME
	
);

$this->menu=array(
	array('label'=>'Crear Torneo', 'url'=>array('create')),
	array('label'=>'Manage Torneo', 'url'=>array('admin')),
);
?>

<h1><?php echo $model->NAME;?></h1>

<?php $this->widget('bootstrap.widgets.TbAlert', array(
        'block'=>true, // display a larger alert block?
        'fade'=>true, // use transitions?
        'closeText'=>'&times;', // close link text - if set to false, no close link is displayed
        'alerts'=>array( // configurations per alert type
        'success'=>array('block'=>false, 'fade'=>true, 'closeText'=>'false'), // success, info, warning, error or danger
		'info'=>array('block'=>false, 'fade'=>true, 'closeText'=>'false'),
		'warning'=>array('block'=>false, 'fade'=>false, 'closeText'=>'&times;'),
        'error'=>array('block'=>false, 'fade'=>true, 'closeText'=>'false'),
        'danger'=>array('block'=>false, 'fade'=>true, 'closeText'=>'false'),
        ),)); 

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
    	array('name'=>'TYPE', 'label'=>'Equipos en el torneo'.' ('.count($model->teams).') ' , 'value'=>$allTeams),
		array('name'=>'STATUS', 'label'=>'Estatus', 'value'=>$model->aStatus[$model->STATUS]),
    		

    ),
)); ?>
	
	</div>


<fieldset>
	<legend>Menu</legend>
	

	

		<div class="span-10">

<?php $this->widget('bootstrap.widgets.TbMenu', array(
    'type'=>'list',
    'items'=>array(
        array('label'=>'Equipos'),
        array('label'=>'Inicio', 'icon'=>'home', 'url'=>array('manageTeams','tournamentId'=>$model->ID), ),
        array('label'=>'todos', 'icon'=>'book', 'url'=>'' ),
    	array('label' =>'test', 'icon'=>'ok','url' => 'http://www.someurl.com',),

        array('label'=>'Perfil'),
        array('label'=>'Datos generales', 'icon'=>'user', 'url'=>array('updateByFm','id'=>$model->ID, 'fm'=>'_profileForm')),
        array('label'=>'Documentos', 'icon'=>'file', 'url'=>array('manageDocuments','id'=>$model->ID)),
    	array('label'=>'Bases, Reglas y Convocatoria', 'icon'=>'pencil', 'url'=>array('updateByFm','id'=>$model->ID, 'fm'=>'_ruleForm')),
        array('label'=>'Help', 'icon'=>'flag', 'url'=>'#'),
    ),
)); ?>

</div>

<div class="span-10">

<?php $this->widget('bootstrap.widgets.TbMenu', array(
    'type'=>'list',
    'items'=>array(
        array('label'=>'Configuracion'),
		array('label'=>'Horarios', 'icon'=>'cog', 'url'=>array('updateBySchedule','id'=>$model->ID)),
		array('label'=>'Categoria y tipo de torneo', 'icon'=>'cog', 'url'=>array('updateByFm','id'=>$model->ID, 'fm'=>'_categoryForm')),
		array('label'=>'Eliminatoría', 'icon'=>'cog', 'url'=>array('updateByFm','id'=>$model->ID, 'fm'=>'_confForm')),
        array('label'=>'Help', 'icon'=>'flag', 'url'=>'#'),
        

        array('label'=>'Jornadas'),
		array('label'=>'Configuracion', 'icon'=>'cog', 'url'=>array('manageMatchs','id'=>$model->ID), ),
        ($model->isEnabledToGenerateMatch()) ? array('label'=>'Pre Visualizar jornadas', 'icon'=>'magic', 'url'=>array('manageMatchs','id'=>$model->ID), )
		:NULL,
		array('label'=>'Help', 'icon'=>'flag', 'url'=>'#'),
    ),
)); ?>


</div>
</fieldset>

<div class="form-actions">

<?php if($model->STATUS == 3) {?>
		
		<?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'submit',  'type'=>'primary','label'=> $model->isNewRecord ?'Create' : 'Generar Torneo')); ?>
		
<?php }?>		
</div>

