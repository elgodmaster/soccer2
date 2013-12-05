<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('ID')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->ID), array('view', 'id'=>$data->ID)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('NAME')); ?>:</b>
	<?php echo CHtml::encode($data->NAME); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('BIRTH')); ?>:</b>
	<?php echo CHtml::encode($data->BIRTH); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('PHONE')); ?>:</b>
	<?php echo CHtml::encode($data->PHONE); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('EMAIL')); ?>:</b>
	<?php echo CHtml::encode($data->EMAIL); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ADDRESS')); ?>:</b>
	<?php echo CHtml::encode($data->ADDRESS); ?>
	<br />

		<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('TWITER')); ?>:</b>
	<?php echo CHtml::encode($data->TWITER); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('GENDER')); ?>:</b>
	<?php echo CHtml::encode($data->GENDER); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ACTIVE')); ?>:</b>
	<?php echo CHtml::encode($data->ACTIVE); ?>
	<br />

	*/ ?>

</div>