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
	<legend>Inicio Eliminatoria</legend>
	
	<div class="span-20">
	  <?php echo $form->radioButtonListRow($model, 'START_E', $model->getEliconf()) ?>
	</div>	
		
	
		
	</fieldset>
	
	<fieldset>
	<legend>Encuentros de eliminatoria</legend>
	
	<div class="span-20">
	 <?php echo $form->radioButtonListRow($model, 'ELI_CONF', array(
        'Solo un encuentro',
        'Ida y vuelta',
    )); ?>
	</div>	
		
	</fieldset>
	
	<fieldset>
	<legend>Lugares finales</legend>
		
	<div class="span-20"> 
	
	  <?php echo $form->radioButtonListRow($model, 'WIN_PLACE', array(
        'Primer Lugar',
        'Primer y Segundo lugar',
	 	'Primer, Segundo y Tercer lugar ',
    )); ?>
   		
		</div>	
		
		
	</fieldset>
	
	
	
		
	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'submit',  'type'=>'primary','label'=> $model->isNewRecord ?'Create' : 'Guardar')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->