<div class="span10 offset1">
<?php $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id'=>'verticalForm',
    'htmlOptions'=>array(),
)); ?>

	<p class="muted">Los campos con:  <span class="required">*</span> son requeridos.</p>

	<?php echo $form->errorSummary($model); ?>

	
	<fieldset>
	
	 
	
   		<?php echo $form->labelEx($model,'NAME'); ?>
		<?php echo $form->textField($model,'NAME',array('size'=>100,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'NAME'); ?>	
	
		<?php echo $form->labelEx($model,'ID_CATEGORY'); ?>
		<?php echo $form->dropDownList($model,'ID_CATEGORY',CHtml::listData($catCategory::model()->findAll(),'ID_CATEGORY','NAME')); ?>
		<?php echo $form->error($model,'ID_CATEGORY'); ?>


	
	
	</fieldset>
<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'submit',  'type'=>'success','label'=> $model->isNewRecord ?'Crear' : 'Update')); ?>
	</div>
<?php $this->endWidget(); ?>

</div>

	
