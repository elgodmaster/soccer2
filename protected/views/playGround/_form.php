<?php
/* @var $this PlayGroundController */
/* @var $model PlayGround */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	'id'=>'verticalForm',
	'htmlOptions'=>array(),
)); ?>

	<p class="note">Los campos con: <span class="required">*</span> son requeridos.</p>

	<?php echo $form->errorSummary($model); ?>

	<fieldset>
	
	<div class="span6">
		<?php echo $form->textFieldRow($model,'NAME',array('size'=>60,'maxlength'=>100,'class'=>'input-xlarge')); ?>
		
		<a href="#" rel="tooltip title="A short name for playground">?</a>
		<?php echo $form->textFieldRow($model,'PHONE_NUMBER',array('size'=>60,'maxlength'=>100, 'class'=>'input-xlarge')); ?>
	
	<?php echo $form->textFieldRow($model,'ADDRESS',array('size'=>60,'maxlength'=>100, 'class'=>'input-xlarge')); ?>
	</div>
	<div class="span6">
	
	<?php echo $form->dropDownListRow($model, 'ACTIVE', $model->getActiveOptions()); ?>
	<?php echo $form->dropDownListRow($model, 'MAP_STRING', array('size'=>60,'maxlength'=>100,'class'=>'input-xlarge')); ?>
	<?php echo $form->textAreaRow($model, 'DESCRIPTION', array('class'=>'span6', 'rows'=>5)); ?>
	</div>
	</fieldset>


	<div class="form-actions">
	<?php $this->widget('bootstrap.widgets.TbButton',array('buttonType'=>'submit','type'=>'primary','label'=>$model->isNewRecord?'Crear':'Actualizar'));?>
	
	
		<?php //echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->