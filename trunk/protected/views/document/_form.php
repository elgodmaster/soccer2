<div class="form">

<?php $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id'=>'verticalForm',
    'htmlOptions'=>array('class'=>'well'),
)); ?>

	<p class="note">Los campos con:  <span class="required">*</span> son requeridos.</p>

	<?php echo $form->errorSummary($model); ?>

	<fieldset>
		
		<?php echo $form->textFieldRow($model,'NAME',array('size'=>60,'maxlength'=>100 , 'class'=>'span3')); ?>
		
		 <a href="#" rel="tooltip" title="A short name for document">?</a>
	
		
		<?php echo $form->dropDownListRow($model, 'TYPE_DOCUMENT', $model->getTypeDocumentOptions()); ?>
		
		<?php echo $form->textAreaRow($model, 'DESCRIPTION', array('class'=>'span3', 'rows'=>5)); ?>

	
	</fieldset>	
		
		<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'submit',  'type'=>'primary','label'=> $model->isNewRecord ?'Create' : 'Update')); ?>
		
		 <?php //echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>

		 </div>
<?php $this->endWidget(); ?>

</div><!-- form -->