<?php
/* @var $this PlayGroundController */
/* @var $data PlayGround */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('ID')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->ID), array('view', 'id'=>$data->ID)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('NAME')); ?>:</b>
	<?php echo CHtml::encode($data->NAME); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('DESCRIPTION')); ?>:</b>
	<?php echo CHtml::encode($data->DESCRIPTION); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ADDRESS')); ?>:</b>
	<?php echo CHtml::encode($data->ADDRESS); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('PHONE_NUMBER')); ?>:</b>
	<?php echo CHtml::encode($data->PHONE_NUMBER); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ACTIVE')); ?>:</b>
	<?php echo CHtml::encode($data->ACTIVE); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('MAP_STRING')); ?>:</b>
	<?php echo CHtml::encode($data->MAP_STRING); ?>
	<br />


</div>