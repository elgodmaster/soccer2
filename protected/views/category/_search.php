<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'ID_CATEGORY'); ?>
		<?php echo $form->textField($model,'ID_CATEGORY'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'NAME'); ?>
		<?php echo $form->textField($model,'NAME',array('size'=>60,'maxlength'=>200)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'DESCRIPTION'); ?>
		<?php echo $form->textField($model,'DESCRIPTION',array('size'=>60,'maxlength'=>300)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'MAX_YEAR'); ?>
		<?php echo $form->textField($model,'MAX_YEAR'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'MIN_YEAR'); ?>
		<?php echo $form->textField($model,'MIN_YEAR'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'ACTIVE'); ?>
		<?php echo $form->textField($model,'ACTIVE'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->