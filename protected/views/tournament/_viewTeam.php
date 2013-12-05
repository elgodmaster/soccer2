

<div class="view">

<?php 
//get player complement Data

$team = Team::model()->findByPk($data->ID_TEAM);

$imgDel=CHtml::image(Yii::app()->request->baseUrl.'/images/del.png', '');
$imgEdit=CHtml::image(Yii::app()->request->baseUrl.'/images/update.png', '');

?>


<table>
<tr>
<td width="70%">
<!-- 
	<b><?php echo CHtml::encode($data->getAttributeLabel('ID_TEAM')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->ID_TEAM), array('view', 'id'=>$data->ID_TEAM)); ?>

	&nbsp;
 -->
	<b><?php echo CHtml::encode($team->getAttributeLabel('NAME')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($team->NAME), array('team/view', 'id'=>$data->ID_TEAM)); ?>
	<br />
	</td>
	<td valign="top" align="center">
		<?php echo CHtml::link($imgDel, array('unsubscribeTeam', 'tournamentId'=>$data->ID_TOURNAMENT,'teamId'=>$data->ID_TEAM)); ?>
		<br />
		<?php echo CHtml::link('Eliminar', array('unsubscribeTeam', 'tournamentId'=>$data->ID_TOURNAMENT,'teamId'=>$data->ID_TEAM)); ?>
	</td>
</tr>	
</table>		
</div>