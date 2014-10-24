<?php 
/**
 * Global status
 */

$CERRADO_CONFIGURANDO_JORNADAS = 4;
?>

<?php $this->breadcrumbs=array(
	'Torneos'=>array('index'),
	$model->NAME=>array('manage','id'=>$model->ID),
	'Administrar equipos del Torneo',
);

$this->menu=array(
		array('label'=>'Inicio', 'url'=>array('manage','id'=>$model->ID)),
		
);

?>


<h1>Torneo <small><?php echo strtoupper($model->NAME); ?></small></h1>



<legend>Equipos participantes</legend>


<div class="span12">
<?php $this->widget('bootstrap.widgets.TbAlert', array(
		'block'=>false, // display a larger alert block?
		'fade'=>true, // use transitions?
		'closeText'=>'&times;', // close link text - if set to false, no close link is displayed
));

?>


<?php $this->widget('bootstrap.widgets.TbAlert', array(
		'block'=>false, // display a larger alert block?
		'fade'=>true, // use transitions?
		'closeText'=>'&times;', // close link text - if set to false, no close link is displayed
));

?>


<?php if($model->STATUS < $CERRADO_CONFIGURANDO_JORNADAS ){ ?> 


<?php $this->widget('bootstrap.widgets.TbButton', array(
    'label'=>'Agregar equipo',
    'type'=>'primary',
    'htmlOptions'=>array(
        'data-toggle'=>'modal',
        'data-target'=>'#myModal',
    ),
)); ?>

<?php }?>

<?php $this->widget('bootstrap.widgets.TbGridView', array(
    'type'=>'striped bordered condensed',
    'dataProvider'=>$dataProvider,
    'template'=>"{items}",
    'columns'=>array(
		array('name'=>'TEST','type'=>'html','value'=>'CHtml::image($data->iDTEAM->getLogo(),"",array("style"=>"width:50px;height:50px;", "class"=>"img-polaroid"))' , 'header'=>'' ,'htmlOptions'=>array('align'=>'center',
				'url'=>'test'
		),),        
		array('name'=>'ID_TEAM','type'=>'raw','value'=>'strtoupper($data->iDTEAM->NAME)', 'header'=>'Equipo'),
    	array('name'=>'ID_CATEGORY','type'=>'raw','value'=>'$data->iDTEAM->iDCATEGORY->NAME', 'header'=>'Categoría'),
		array('name'=>'STATUS','type'=>'raw','value'=>'$data->getStatus()', 'header'=>'Estatus'),

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
        
   
</div>


<?php $this->beginWidget('bootstrap.widgets.TbModal', array('id'=>'myModal')); ?>
 
<div class="modal-header">
    <a class="close" data-dismiss="modal">&times;</a>
    <h4>Equipos en la categoría seleccionada</h4>
</div>
 
<div class="modal-body">
    <?php echo $this->renderPartial('_searchTeams', array('team'=>$team,'model'=>$model2,'tournament'=>$tournament)); ?>
</div>
 
<div class="modal-footer">
    <?php $this->widget('bootstrap.widgets.TbButton', array(
        'type'=>'primary',
        'label'=>'Save changes',
        'url'=>'#',
        'htmlOptions'=>array('data-dismiss'=>'modal'),
    )); ?>
    <?php $this->widget('bootstrap.widgets.TbButton', array(
        'label'=>'Close',
        'url'=>'#',
        'htmlOptions'=>array('data-dismiss'=>'modal'),
    )); ?>
</div>
 
<?php $this->endWidget(); ?>



  
