<div class="form">

<?php $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id'=>'verticalForm',
    'htmlOptions'=>array('class'=>'well'),
)); ?>

	<p class="note">Los campos con: <span class="required">*</span> son requeridos.</p>

	<?php echo $form->errorSummary($model); ?>

	<br />
	<br />
	
	<fieldset>
	
	<div class="span-20"> 
   		<!--<?php echo $form->labelEx($model,'NAME'); ?>
		<?php echo $form->textField($model,'NAME',array('size'=>100,'maxlength'=>100, )); ?>
		<?php echo $form->error($model,'NAME'); ?> -->
		
		<?php echo $form->textFieldRow($model, 'NAME', array('class'=>'span3', 'disabled'=>!($model->STATUS < 4))); ?>
			
	</div>	
	
		
		<div class="span-20">
		<?php echo $form->textAreaRow($model, 'DESCRIPTION', array('class'=>'span5', 'rows'=>5, 'disabled'=>!($model->STATUS < 4))); ?>
	
		</div>
		</fieldset>
	
		
	
	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'submit',  'type'=>!($model->STATUS < 4) ?'info' : 'primary','label'=>!($model->STATUS < 4) ?'Listo' : 'Guardar')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->