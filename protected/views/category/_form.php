<div class="row-fluid">

<p class="muted">Los campos con: <span class="required">*</span> son requeridos.</p>

<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	'id'=>'verticalForm',
	'htmlOptions'=>array(),
)); ?>

	

    	<?php echo $form->errorSummary($model); ?>

<fieldset>
	<div class="span6">	
		<?php echo $form->textFieldRow($model,'NAME',array('size'=>60,'maxlength'=>100, 'class'=>'input-xlarge')); ?>
		<a href="#" rel="tooltip" title="A short name for category">?</a>
		<?php echo $form->radioButtonListRow($model, 'GENDER', $model->getGenderOptions()); ?>
		<?php echo $form->textAreaRow($model, 'DESCRIPTION', array('class'=>'span7', 'rows'=>5)); ?>
		
	</div>	
	
	<div class="span6">	    
		<?php echo $form->dropDownListRow($model,'MIN_YEAR',$model->getYearOptions());?>	
		<?php echo $form->dropDownListRow($model,'MAX_YEAR',$model->getYearOptions());?>
		 
		<?php echo $form->dropDownListRow($model,'ACTIVE',$model->getTypeActiveOptions());?>
	</div>	
</fieldset>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton',array('buttonType'=>'submit','type'=>'primary','label'=>$model->isNewRecord?'Crear':'Update'));?>
	</div>
<?php $this->endWidget(); ?>
	

</div><!-- form -->

