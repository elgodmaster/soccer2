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

	<div class="form-actions">
		<a class="btn btn-small" href="#"><i class="icon-comment"></i> Enviar invitación</a>
		<a class="btn btn-small" href="#"><i class="icon-list-alt"></i> Enviar estatus</a>
	</div>

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
    'type'=>'table condensed striped bordered',
    'dataProvider'=>$dataProvider,
    'template'=>"{items}",
    'columns'=>array(
		array('name'=>'ID_TEAM','type'=>'html','value'=>'CHtml::image($data->iDTEAM->getLogo(),"",array("style"=>"width:30px;height:30px;", "class"=>"img-polaroid"))."<br />".strtoupper($data->iDTEAM->NAME) ' , 'header'=>'Equipo' ,
				'htmlOptions'=>array('style'=>'text-align: center;', 'url'=>'test'),
				'headerHtmlOptions'=>array('style'=>'text-align: center;'),
				 ),        
		//array('name'=>'ID_TEAM','type'=>'raw','value'=>'strtoupper($data->iDTEAM->NAME)', 'header'=>'Equipo'),
    	//array('name'=>'ID_CATEGORY','type'=>'raw','value'=>'$data->iDTEAM->iDCATEGORY->NAME', 'header'=>'Categoría'),
    		
		array('name'=>'STATUS','type'=>'html','value'=>'$data->getStatus()', 'header'=>'Estatus'),
    	array('name'=>'COMENTARIO','type'=>'raw','value'=>'"<p class=\'text-info\'>".$data->COMMENT."</p>"', 'header'=>'Detalle'),

array(
		'header'=>'opciones',
		'class'=>'bootstrap.widgets.TbButtonColumn',
		'buttons'=>array('delete'=>array('url'=>'Yii::app()->createUrl("tournament/unsubscribeTeam",array("tournamentId"=>$data->ID_TOURNAMENT,"teamId"=>$data->ID_TEAM))'),
						
						'update'=>array('url'=>'Yii::app()->createUrl("tournament/updateTeam",array("tournamentId"=>$data->ID_TOURNAMENT,"teamId"=>$data->ID_TEAM))',
										'options'=>array('title'=>'Actualizar', 'id'=>'"$row"',  'data-toggle'=>'modal', 'data-target'=>'#updateTeamModal'),
										'click'=>'function(e) { 
																	//e.preventDefault();
																	var target = $(this).attr("data-target");
	    															var url = $(this).attr("href");
																    if(url){
																        $(target).find(".modal-body").load(url);
																    }
																}', 
										),

						'view'=>array('url'=>'Yii::app()->createUrl("tournament/viewTeam",array("tournamentId"=>$data->ID_TOURNAMENT,"teamId"=>$data->ID_TEAM))',
									'options'=>array('title'=>'Ver detalle',  'data-toggle'=>'modal', 'data-target'=>'#viewTeamModal'),
									'click'=>'function(e) {
																	//e.preventDefault();
																	var target = $(this).attr("data-target");
	    															var url = $(this).attr("href");
																    if(url){
																        $(target).find(".modal-body").load(url);
																    }
																}',
)
										

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

<?php $this->beginWidget('bootstrap.widgets.TbModal', array('id'=>'updateTeamModal')); ?>
 
<div class="modal-header">
    <a class="close" data-dismiss="modal">&times;</a>
    <h4>Modificar el estatus del equipo en el Torneo</h4>
</div>
 
<div class="modal-body">
    Cargando ...
</div>
 
<div class="modal-footer">
    <?php $this->widget('bootstrap.widgets.TbButton', array(
        'type'=>'primary',
        'label'=>'Guardar cambios',
        'url'=>'#',
        'htmlOptions'=>array('data-dismiss'=>'modal', 'onclick' => '$("#updateTeamForm").submit()'),
    )); ?>
    <?php $this->widget('bootstrap.widgets.TbButton', array(
        'label'=>'Cerrar',
        'url'=>'#',
        'htmlOptions'=>array('data-dismiss'=>'modal'),
    )); ?>
</div>
 
<?php $this->endWidget(); ?>



<?php $this->beginWidget('bootstrap.widgets.TbModal', array('id'=>'viewTeamModal')); ?>
 
<div class="modal-header">
    <a class="close" data-dismiss="modal">&times;</a>
    <h4>Detalle del equipo</h4>
</div>
 
<div class="modal-body">
    Cargando ...
</div>
 
<div class="modal-footer">
     <?php $this->widget('bootstrap.widgets.TbButton', array(
        'label'=>'Cerrar',
        'url'=>'#',
        'htmlOptions'=>array('data-dismiss'=>'modal'),
    )); ?>
</div>
 
<?php $this->endWidget(); ?>


  
