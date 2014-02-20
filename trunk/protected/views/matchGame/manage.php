<?php
$this->breadcrumbs=array(
	'Tournaments'=>array('tournament/index'),
	$model->tOURNAMENT->NAME=>array('tournament/manage','id'=>$model->TOURNAMENT_ID),
	'Resultados'=>array('tournament/manageResults','id'=>$model->TOURNAMENT_ID),
	'JORNADA '.$model->GROUP=>array('tournament/manageResults','id'=>$model->TOURNAMENT_ID, 'roundId'=>$model->GROUP),
	'Partido '.$model->lOCAL->NAME.' vs '.$model->vISITOR->NAME	
		
);

$this->menu=array(
	array('label'=>'Lista jugadores', 'url'=>array('index')),
	
);
?>

<h3>Asignar resultados</h3>

<div class="view">
	
		<?php $this->widget('bootstrap.widgets.TbDetailView', array(
			'type'=>'striped bordered condensed',
		    'data'=>$model,
		    'attributes'=>array(
		        array('name'=>'ID', 'label'=>'Torneo', 'value'=>$model->tOURNAMENT->NAME),
		     //	   array('name'=>'NAME', 'label'=>'Nombre del torneo'),
		        array('name'=>'GROUP', 'label'=>'# Jornada', ),
		    	array('name'=>'NAME', 'label'=>'# Partido', ),
				array('name'=>'NAME', 'label'=>'Equipos', 'value'=>$model->lOCAL->NAME.' vs '.$model->vISITOR->NAME ),
		    		
		
		    ),
		)); ?>
	
	</div>

<?php echo $this->renderPartial('_form', array('model'=>$model,'matchResults'=>$matchResults)); ?>