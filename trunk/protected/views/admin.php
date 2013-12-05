<?php
/* @var $this MatchResultController */
/* @var $model MatchResult */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'match-result-admin-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'RESULT_ID'); ?>
		<?php echo $form->textField($model,'RESULT_ID'); ?>
		<?php echo $form->error($model,'RESULT_ID'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'MATCH_ID'); ?>
		<?php echo $form->textField($model,'MATCH_ID'); ?>
		<?php echo $form->error($model,'MATCH_ID'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'TOTAL_LOCAL'); ?>
		<?php echo $form->textField($model,'TOTAL_LOCAL'); ?>
		<?php echo $form->error($model,'TOTAL_LOCAL'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'TOTAL_VISITOR'); ?>
		<?php echo $form->textField($model,'TOTAL_VISITOR'); ?>
		<?php echo $form->error($model,'TOTAL_VISITOR'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'COMMENT'); ?>
		<?php echo $form->textField($model,'COMMENT'); ?>
		<?php echo $form->error($model,'COMMENT'); ?>
	</div>


	<div class="row buttons">
		<?php echo CHtml::submitButton('Submit'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->