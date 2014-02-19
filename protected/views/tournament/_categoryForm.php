<div class="form">

<?php $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id'=>'verticalForm',
    'htmlOptions'=>array('class'=>'well'),
)); ?>

	<p class="note">Los campos que lleven <span class="required">*</span> son requeridos.</p>

	<?php echo $form->errorSummary($model); ?>

	<br />
	<br />
	
	<fieldset>
	<legend><b>Categoria del torneo</b></legend>
	
	
	<div class="span-20"> 
		
		<?php echo $form->radioButtonListRow($model, 'ID_CATEGORY', CHtml::listData($catCategory::model()->findAll(array("condition"=>"ID_CATEGORY !=  0")),'ID_CATEGORY','NAME'), array('disabled'=>!($model->STATUS < 4)) ); ?> 
   		
	</div>	
		
		
	</fieldset>
	
	<fieldset>
	<legend><b>Tipo Torneo</b></legend>
	
	
	<div class="span-20"> 
	
	 <?php echo $form->radioButtonListRow($model, 'TYPE',$model->typeTournament, array('disabled'=>!($model->STATUS < 4))); ?>
	   
   		
		</div>	
		
		
	</fieldset>
	
	
		
	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'submit',  'type'=>!($model->STATUS < 4) ? 'info': 'primary','label'=>!($model->STATUS < 4) ?'Listo' : 'Guardar')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->