<?php $this->breadcrumbs=array(
	'Teams'=>array('index'),
	$model->NAME=>array('view','id'=>$model->ID),
	'Administrar Jugadores',
);

?>

<?php echo CHtml::ajaxLink(Yii::t('job','Agregar Jugador'),$this->createUrl('team/addPlayer'),array(
        'onclick'=>'$("#jobDialog").dialog("open"); return false;',
        'update'=>'#jobDialog'
        ),array('id'=>'showJobDialog'));?>
<div id="jobDialog"></div>
