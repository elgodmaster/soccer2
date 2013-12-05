<?php
/* @var $this PlayGroundController */
/* @var $model PlayGround */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	'id'=>'verticalForm',
	'htmlOptions'=>array('class'=>'well'),
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<fieldset>
	
		<?php echo $form->textFieldRow($model,'NAME',array('size'=>60,'maxlength'=>100, 'class'=>'spen3')); ?>
		
		<a href="#" rel="tooltip title="A short name for playground">?</a>
	
	<?php echo $form->textAreaRow($model, 'DESCRIPTION', array('class'=>'span3', 'rows'=>5)); ?>
	<?php echo $form->textFieldRow($model,'ADDRESS',array('size'=>60,'maxlength'=>100, 'class'=>'spen3')); ?>
	<?php echo $form->textFieldRow($model,'PHONE_NUMBER',array('size'=>60,'maxlength'=>100, 'class'=>'spen3')); ?>
	<?php echo $form->dropDownListRow($model, 'ACTIVE', $model->getActiveOptions()); ?>
	<?php echo $form->dropDownListRow($model, 'MAP_STRING', array('size'=>60,'maxlength'=>100, 'class'=>'spen3')); ?>
	
	</fieldset>


	<div class="form-actions">
	<?php $this->widget('bootstrap.widgets.TbButton',array('buttonType'=>'submit','type'=>'primary','label'=>$model->isNewRecord?'Create':'Update'));?>
	
	
		<?php //echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->