<?php $this->breadcrumbs=array(
	'Torneos'=>array('index'),
	$model->NAME=>array('manage','id'=>$model->ID),
	'Administrar equipos del Torneo',
);

$this->menu=array(
		array('label'=>'Crear Torneo', 'url'=>array('create')),
		array('label'=>'Administrar Torneos', 'url'=>array('admin')),
);

?>


<h1><?php echo $model->NAME; ?></h1>



<?php echo CHtml::ajaxLink(Yii::t('job','Agregar Equipo'),$this->createUrl('tournament/searchAvaliableTeams',array('tournamentId'=>$model->ID)),array(
        'onclick'=>'$("#jobDialog").dialog("open"); return false;',
        'update'=>'#jobDialog'
        ),array('id'=>'showJobDialog'));?>
<div id="jobDialog"></div>


<?php $this->widget('bootstrap.widgets.TbGridView', array(
    'type'=>'striped bordered condensed',
    'dataProvider'=>$dataProvider,
    'template'=>"{items}",
    'columns'=>array(
		array('name'=>'TEST','type'=>'html','value'=>'CHtml::image($data->iDTEAM->getLogo(),"",array("style"=>"width:50px;height:50px;"))' , 'header'=>'' ,'htmlOptions'=>array('align'=>'center',
				'url'=>'test'
		),),        
		array('name'=>'ID_TEAM','type'=>'raw','value'=>'$data->iDTEAM->NAME', 'header'=>'Equipo'),
		array('name'=>'STATUS','type'=>'raw','value'=>'$data->STATUS', 'header'=>'Estatus'),

array(
		'header'=>'opciones',
		'class'=>'bootstrap.widgets.TbButtonColumn',
		'buttons'=>array('delete'=>array('url'=>'Yii::app()->createUrl("tournament/unsubscribeTeam",array("tournamentId"=>$data->ID_TOURNAMENT,"teamId"=>$data->ID_TEAM))'),
					
		),
		'htmlOptions'=>array('style'=>'width: 50px',
				'url'=>'test'
		),
),
   		
    ),
)); ?>
        
   
  