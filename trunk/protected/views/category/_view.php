<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('ID_CATEGORY')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->ID_CATEGORY), array('view', 'id'=>$data->ID_CATEGORY)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('NAME')); ?>:</b>
	<?php echo CHtml::encode($data->NAME); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('DESCRIPTION')); ?>:</b>
	<?php echo CHtml::encode($data->DESCRIPTION); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('MAX_YEAR')); ?>:</b>
	<?php echo CHtml::encode($data->MAX_YEAR); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('MIN_YEAR')); ?>:</b>
	<?php echo CHtml::encode($data->MIN_YEAR); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ACTIVE')); ?>:</b>
	<?php echo CHtml::encode($data->ACTIVE); ?>
	<br />


</div>