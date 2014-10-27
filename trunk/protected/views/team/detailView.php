
<?php
$this->breadcrumbs=array(
	'Teams'=>array('index'),
	$model->tEAM->NAME,
);

$this->menu=array(
	array('label'=>'Lista equipo', 'url'=>array('index')),
	array('label'=>'Crear nuevo equipo', 'url'=>array('create')),
	array('label'=>'Modificar equipo', 'url'=>array('addPlayerTeam', 'idTeam'=>$model->TEAM_ID,'idPlayer'=>$model->PLAYER_ID) ),
	array('label'=>'Eliminar equipo', 'url'=>'#', 'linkOptions'=>array('submit'=>array('unsubscribe','teamId'=>$model->TEAM_ID,'playerId'=>$model->PLAYER_ID),'confirm'=>'Are you sure you want to delete this item?')),
	
	array('label'=>'Documentos', 'url'=>array('manageDocuments','id'=>$model->TEAM_ID)),
	array('label'=>'Jugadores', 'url'=>array('manageTeamPlayer','id'=>$model->TEAM_ID)),
);
?>

<h1>#<?php echo $model->pLAYER->ID; ?>&nbsp;&nbsp; <?php echo $model->pLAYER->NAME; ?>  

</h1>



<?php $this->widget('bootstrap.widgets.TbDetailView', array(
		'data'=>array('id'=>1, 'firstName'=>'Mark', 'lastName'=>'Otto', 'language'=>'CSS'),
		'attributes'=>array(
				array('name'=>'NAME', 'value'=>$model->pLAYER->NAME, 'label'=>'Nombre'),
				array('name'=>'BIRTH', 'value'=>$model->pLAYER->getAge(), 'label'=>'Edad'),
				array('name'=>'GENDER', 'value'=>($model->pLAYER->GENDER === 1) ?'Hombre' : 'MUJER' , 'label'=>'Sexo'),
				array('name'=>'PHONE', 'value'=>$model->pLAYER->PHONE, 'label'=>'Teléfono'),
				array('name'=>'ADDRESS', 'value'=>$model->pLAYER->ADDRESS, 'label'=>'Dirección'),
				array('name'=>'EMAIL', 'value'=>$model->pLAYER->EMAIL, 'label'=>'Correo Eléctronico'),
					
				array('name'=>'NUMBER','value'=>$model->NUMBER, 'label'=>'Numero en el equipo'),
				array('name'=>'ALIAS','value'=>$model->ALIAS, 'label'=>'Alias en el equipo'),
				array('name'=>'ADD_DATE','value'=>$model->ADD_DATE, 'label'=>'Fecha de Ingreso'),
				
				array('name'=>'ACTIVE', 'value'=>($model->pLAYER->ACTIVE) ?'DISPONIBLE' : 'NO DISPONIBLE' , 'label'=>'ESTATUS'),
		),
)); ?>