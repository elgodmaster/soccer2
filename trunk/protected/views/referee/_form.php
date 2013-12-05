<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'referee-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="help-block">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<?php echo $form->textFieldRow($model,'NAME',array('class'=>'span5','maxlength'=>300)); ?>

	<?php echo $form->textFieldRow($model,'ADDRESS',array('class'=>'span5','maxlength'=>500)); ?>

	<?php echo $form->textFieldRow($model,'EMAIL',array('class'=>'span5','maxlength'=>300)); ?>

	<?php echo $form->textFieldRow($model,'PHONE',array('class'=>'span5','maxlength'=>50)); ?>

	<?php echo $form->textFieldRow($model,'DATE_UP',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'ACTIVE',array('class'=>'span5')); ?>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? 'Create' : 'Save',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
