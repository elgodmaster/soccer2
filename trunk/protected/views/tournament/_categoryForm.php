
<?php $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id'=>'verticalForm',
    'htmlOptions'=>array(),
)); ?>

	
	<legend>Categoría del torneo</legend>
	<p class="muted">Los campos con: <span class="required">*</span> son requeridos.</p>



	
	<fieldset>
	<?php echo $form->errorSummary($model); ?>
	
	
	
	<div class="span3"> 
		
		<?php echo $form->radioButtonListRow($model, 'ID_CATEGORY', CHtml::listData($catCategory::model()->findAll(array("condition"=>"ID_CATEGORY !=  0")),'ID_CATEGORY','NAME'), array('disabled'=>!($model->STATUS < 4)) ); ?> 
   		
	</div>	
		
	
	<div class="span3"> 
	
	 <?php echo $form->radioButtonListRow($model, 'TYPE',$model->typeTournament, array('disabled'=>!($model->STATUS < 4))); ?>
	   
   		
		</div>	
		
		
	</fieldset>
	
	
		
	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'submit',  'type'=>!($model->STATUS < 4) ? 'info': 'primary','label'=>!($model->STATUS < 4) ?'Listo' : 'Guardar')); ?>
	</div>

<?php $this->endWidget(); ?>

