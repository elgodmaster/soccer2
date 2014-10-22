
<?php $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id'=>'verticalForm',
    'htmlOptions'=>array(),
)); ?>

	<legend>Bases, reglas y convocatoria</legend>

	<p class="muted">Los campos con: <span class="required">*</span> son requeridos.</p>
	
	<fieldset>
	
	<?php echo $form->errorSummary($model); ?>
	<div class="span-30"> 
	
	<?php echo $form->textAreaRow($model, 'RULES', array('class'=>'span8', 'rows'=>10)); ?>
	
	</div>
	
		<div class="span-30">
			<?php echo $form->textAreaRow($model, 'BASES', array('class'=>'span8', 'rows'=>5)); ?>
   		
		</div>	
	 
		
		<div class="span-30">
			<?php echo $form->textAreaRow($model, 'PROMO', array('class'=>'span8', 'rows'=>5)); ?>
		</div>
		</fieldset>
	
		
	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'submit',  'type'=>'primary','label'=> $model->isNewRecord ?'Create' : 'Guardar')); ?>
	</div>

<?php $this->endWidget(); ?>

