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
	<legend><b>Categoria del torneo</b></legend>
	
	
	<div class="span-20"> 
		
		<?php echo $form->radioButtonListRow($model, 'ID_CATEGORY', CHtml::listData($catCategory::model()->findAll(array("condition"=>"ID_CATEGORY !=  0")),'ID_CATEGORY','NAME')); ?> 
   		
	</div>	
		
		
	</fieldset>
	
	<fieldset>
	<legend><b>Tipo Torneo</b></legend>
	
	
	<div class="span-20"> 
	
	 <?php echo $form->radioButtonListRow($model, 'TYPE',$model->typeTournament); ?>
	   
   		
		</div>	
		
		
	</fieldset>
	
	
		
	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'submit',  'type'=>'primary','label'=> $model->isNewRecord ?'Create' : 'Guardar')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->