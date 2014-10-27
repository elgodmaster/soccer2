<div class="form">

<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	'id'=>'verticalForm',
	'htmlOptions'=>array(),
)); ?>

	
	<p class="muted">Los campos con: <span class="required">*</span> son requeridos.</p>
	<fieldset>
	
	<?php echo $form->errorSummary($model); ?>

	
	<div class="span6"> 
	
	<?php echo $form->textFieldRow($model,'NAME',array('size'=>60,'maxlength'=>100,'class'=>'input-xlarge')); ?>
	<?php echo $form->textFieldRow($model,'ADDRESS',array('size'=>60,'maxlength'=>100,'class'=>'input-xlarge')); ?>
	<?php echo $form->textFieldRow($model,'EMAIL',array('size'=>60,'maxlength'=>100,'class'=>'input-xlarge')); ?>
	
	
	</div>
	<div class="span6"> 

	
	
	<?php echo $form->dropDownListRow($model,'ID_CATEGORY',CHtml::listData($catCategory::model()->findAll(),'ID_CATEGORY','NAME')); ?>
	<?php echo $form->dropDownListRow($model,'ACTIVE',$model->getEnabledOptions());?>
	<?php echo $form->textAreaRow($model, 'DESCRIPTION', array('class'=>'span6', 'rows'=>5)); ?>
	
	</div>
	</fieldset>
	

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton',array('buttonType'=>'submit','type'=>'primary','label'=>$model->isNewRecord?'Crear	':'Actualizar'));?>
		
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->