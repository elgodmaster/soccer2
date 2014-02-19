<div class="form">

<?php $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id'=>'verticalForm',
    'htmlOptions'=>array('class'=>'well'),
)); ?>

	<p class="note">Los campos con <span class="required">*</span> son requeridos.</p>

	<?php echo $form->errorSummary($model); ?>

	<br />
	<br />
	
	<fieldset>
	
	<div class="span-20"> 
	
	<?php echo $form->textAreaRow($model, 'RULES', array('class'=>'span5', 'rows'=>10)); ?>
	
	<?php echo $form->textAreaRow($model, 'BASES', array('class'=>'span5', 'rows'=>5)); ?>
   		
		</div>	
		
		<div class="span-20">
		
		
		<?php echo $form->textAreaRow($model, 'PROMO', array('class'=>'span5', 'rows'=>5)); ?>
		</div>
		</fieldset>
	
		
	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'submit',  'type'=>'primary','label'=> $model->isNewRecord ?'Create' : 'Update')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->