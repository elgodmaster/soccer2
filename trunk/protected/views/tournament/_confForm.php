
<?php $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id'=>'verticalForm',
    'htmlOptions'=>array(),
)); ?>

	

<legend>Configuración Eminiatoria</legend>
<p class="muted">Los campos con: <span class="required">*</span> son requeridos.</p>

<div class="span12">
	<fieldset>
	<?php echo $form->errorSummary($model); ?>
	
	<div class="span4">
	  <?php echo $form->radioButtonListRow($model, 'START_E', $model->getEliconf(), array('disabled'=>!($model->STATUS < 4))) ?>
	</div>		
	

	
	<div class="span4">
	 <?php echo $form->radioButtonListRow($model, 'ELI_CONF', array(
        'Solo un encuentro',
        'Ida y vuelta',
    ), array('disabled'=>!($model->STATUS < 4))); ?>
	</div>	
		

		
	<div class="span4"> 
	
	  <?php echo $form->radioButtonListRow($model, 'WIN_PLACE', array(
       1=> 'Primer Lugar',
       2=> 'Primer y Segundo lugar',
	   4 => 'Primer, Segundo y Tercer lugar ',
    ), array('disabled'=>!($model->STATUS < 4))); ?>
   		
	</div>
	
	<div class="span4"> 
	
	  <?php echo $form->radioButtonListRow($model, 'BENEFIT_RULE_TYPE',$model->aBenefitRuleTypes
    , array('disabled'=>!($model->STATUS < 4))); ?>
   		
	</div>	
		
	<div class="span4"> 
	
	  <?php echo $form->radioButtonListRow($model, 'DRAW_RULE_TYPE',$model->aRuleTypes
    , array('disabled'=>!($model->STATUS < 4))); ?>
   		
	</div>	
		
			
		
	</fieldset>
	
	
	
		
	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'submit',  'type'=>!($model->STATUS < 4) ?'info' : 'primary','label'=>!($model->STATUS < 4) ?'Listo' : 'Guardar')); ?>
	</div>

<?php $this->endWidget(); ?>

</div>