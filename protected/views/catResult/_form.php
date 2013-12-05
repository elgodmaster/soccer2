<?php
/* @var $this CatResultController */
/* @var $model CatResult */
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
		
		<?php echo $form->textFieldRow($model,'NAME',array('size'=>60,'maxlength'=>100,'class'=>'span3')); ?>
		<a href="#" rel=tooltip" title="A short name for catalogoResultado">?</a>
		<?php echo $form->textAreaRow($model, 'DESCRIPTION', array('class'=>'span3', 'rows'=>5)); ?>
		<?php echo $form->dropDownListRow($model,'TYPE_RESULT',$model->getTypeResultOptions());?>
		<?php echo $form->dropDownListRow($model,'ACTIVE',$model->getEnabledOptions());?>
		
	</fieldset>


		<div class="form-actions">
			<?php $this->widget('bootstrap.widgets.TbButton',array('buttonType'=>'submit','type'=>'primary','label'=>$model->isNewRecord?'Create':'Update'));?>
	
	
		<?php //echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
		</div>

<?php $this->endWidget(); ?>

</div><!-- form -->