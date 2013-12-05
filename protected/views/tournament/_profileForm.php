<div class="form">

<?php $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id'=>'verticalForm',
    'htmlOptions'=>array('class'=>'well'),
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<br />
	<br />
	
	<fieldset>
	
	<div class="span-20"> 
	
   		<?php echo $form->labelEx($model,'NAME'); ?>
		<?php echo $form->textField($model,'NAME',array('size'=>100,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'NAME'); ?>	
	

			
		<?php echo $form->labelEx($model,'ACTIVE'); ?>
		<?php //echo $form->textField($model,'ACTIVE'); ?>
		<?php echo $form->dropDownList($model,'ACTIVE',$model->getEnabledOptions()); ?>
		<?php echo $form->error($model,'ACTIVE'); ?>
		</div>	
	
		
		<div class="span-20">
		<?php echo $form->textAreaRow($model, 'DESCRIPTION', array('class'=>'span5', 'rows'=>5)); ?>
	
		</div>
		</fieldset>
	
		
	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'submit',  'type'=>'primary','label'=> $model->isNewRecord ?'Create' : 'Update')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->