
<?php $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id'=>'updateTeamForm',
    'htmlOptions'=>array(),
)); ?>

	
	
	<p class="muted">Los campos con: <span class="required">*</span> son requeridos.</p>



	
	<fieldset>
	<?php echo $form->errorSummary($model); ?>
	
		<?php echo $form->radioButtonListRow($model, 'STATUS', $model::model()->getAStatus()); ?> 
   		
	</fieldset>
	
	
		
	
<?php $this->endWidget(); ?>

