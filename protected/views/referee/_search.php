<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<?php echo $form->textFieldRow($model,'ID',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'NAME',array('class'=>'span5','maxlength'=>300)); ?>

	<?php echo $form->textFieldRow($model,'ADDRESS',array('class'=>'span5','maxlength'=>500)); ?>

	<?php echo $form->textFieldRow($model,'EMAIL',array('class'=>'span5','maxlength'=>300)); ?>

	<?php echo $form->textFieldRow($model,'PHONE',array('class'=>'span5','maxlength'=>50)); ?>

	<?php echo $form->textFieldRow($model,'DATE_UP',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'ACTIVE',array('class'=>'span5')); ?>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>'Search',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
