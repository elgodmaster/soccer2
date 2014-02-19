<?php $this->breadcrumbs=array(
	'Teams'=>array('index'),
	$model->NAME=>array('view','id'=>$model->ID),
	'Administrar Jugadores',
);

?>
<?php
$this->menu=array(
		array('label'=>'Inicio', 'url'=>array('index')),
		array('label'=>'Crear nuevo equipo', 'url'=>array('create')),
		array('label'=>'Ver equipo ', 'url'=>array('view', 'id'=>$model->ID)),
		
);
?>


<h3>Jugadores  <?php echo $model->NAME; ?></h3>

<?php echo CHtml::ajaxLink(Yii::t('job','Agregar Jugador'),$this->createUrl('team/addPlayer',array('id'=>$model->ID)),array(
        'onclick'=>'$("#jobDialog").dialog("open"); return false;',
        'update'=>'#jobDialog'
        ),array('id'=>'showJobDialog'));?>
<div id="jobDialog"></div>

<?php $this->widget('bootstrap.widgets.TbGridView', array(
    'type'=>'striped bordered condensed',
    'dataProvider'=>$dataProvider,
    'template'=>"{items}",
    'columns'=>array(
        array('name'=>'NUMBER', 'header'=>'#'),
		array('name'=>'PLAYER_ID','type'=>'raw','value'=>'$data->pLAYER->NAME', 'header'=>'Nombre'),
   		array('name'=>'ALIAS', 'header'=>'Alias'),
    	array('name'=>'EDAD','type'=>'raw','value'=>'$data->pLAYER->getAge()', 'header'=>'Edad'),
       // array('name'=>'lastName', 'header'=>'Last name'),
       // array('name'=>'language', 'header'=>'Language'),
        array(
			'header'=>'opciones',
            'class'=>'bootstrap.widgets.TbButtonColumn',
			'buttons'=>array('delete'=>array('url'=>'Yii::app()->createUrl("team/unsubscribe",array("teamId"=>$data->TEAM_ID,"playerId"=>$data->PLAYER_ID))'),
							 'update'=>array('url'=>'Yii::app()->createUrl("team/addPlayerTeam",array("idTeam"=>$data->TEAM_ID,"idPlayer"=>$data->PLAYER_ID))'),
							 'view'=>array('url'=>'Yii::app()->createUrl("team/detailView",array("teamId"=>$data->TEAM_ID,"playerId"=>$data->PLAYER_ID))'),		
			),
            'htmlOptions'=>array('style'=>'width: 50px',
				'url'=>'test'
			),
        ),
    ),
)); ?>



<?php // $this->widget('zii.widgets.CListView', array(
//	'dataProvider'=>$dataProvider,
//	'itemView'=>'_viewPlayers',
//)); ?>
