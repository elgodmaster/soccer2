

<div class="view">

<?php 
//get player complement Data

$player = Player::model()->findByPk($data->PLAYER_ID);

$imgDel=CHtml::image(Yii::app()->request->baseUrl.'/images/del.png', '');
$imgEdit=CHtml::image(Yii::app()->request->baseUrl.'/images/update.png', '');


?>

<table>
<tr>
<td width="70%">
	<b><?php echo CHtml::encode($data->getAttributeLabel('ID')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->PLAYER_ID), array('view', 'id'=>$data->PLAYER_ID)); ?>

	&nbsp;
	<b><?php echo CHtml::encode($player->getAttributeLabel('NAME')); ?>:</b>
	<?php echo CHtml::encode($player->NAME); ?>
	<br />
	
	<b><?php echo CHtml::encode($data->getAttributeLabel('NUMERO')); ?>:</b>
	<?php echo CHtml::encode($data->NUMBER); ?>
	&nbsp;
	
	<b><?php echo CHtml::encode($data->getAttributeLabel('ALIAS')); ?>:</b>
	<?php echo CHtml::encode($data->ALIAS); ?>
	&nbsp;

	<b><?php echo CHtml::encode($player->getAttributeLabel('BIRTH')); ?>:</b>
	<?php echo CHtml::encode($player->BIRTH); ?>
	<br />
	</td>
	<td valign="top" align="center">
		<?php echo CHtml::link($imgEdit, array('addPlayerTeam', 'idTeam'=>$data->TEAM_ID,'idPlayer'=>$player->ID)); ?>
		<br />
		<?php echo CHtml::link('Editar', array('addPlayerTeam', 'idTeam'=>$data->TEAM_ID,'idPlayer'=>$player->ID)); ?>
	</td>
	<td valign="top" align="center">
		<?php echo CHtml::link($imgDel, array('unsubscribe', 'idTeam'=>$data->TEAM_ID,'idPlayer'=>$player->ID)); ?>
		<br />
		<?php echo CHtml::link('Eliminar', array('unsubscribe', 'idTeam'=>$data->TEAM_ID,'idPlayer'=>$player->ID)); ?>
	</td>
</tr>	
</table>		
</div>