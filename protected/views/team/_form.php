<div class="form">

<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	'id'=>'verticalForm',
	'htmlOptions'=>array('class'=>'well'),
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<fieldset>
	
	<?php echo $form->textFieldRow($model,'NAME',array('size'=>60,'maxlength'=>100,'class'=>'span3')); ?>
	<?php echo $form->dropDownListRow($model,'ID_CATEGORY',CHtml::listData($catCategory::model()->findAll(),'ID_CATEGORY','NAME')); ?>
	<?php echo $form->textFieldRow($model,'ADDRESS',array('size'=>60,'maxlength'=>100,'class'=>'span3')); ?>
	<?php echo $form->textAreaRow($model, 'DESCRIPTION', array('class'=>'span3', 'rows'=>5)); ?>
	<?php echo $form->textFieldRow($model,'EMAIL',array('size'=>60,'maxlength'=>100,'class'=>'span3')); ?>
	<?php echo $form->dropDownListRow($model,'ACTIVE',$model->getEnabledOptions());?>
	</fieldset>
	

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton',array('buttonType'=>'submit','type'=>'primary','label'=>$model->isNewRecord?'Create':'Update'));?>
		
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->