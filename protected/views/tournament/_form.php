<div class="form">

<?php $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id'=>'verticalForm',
    'htmlOptions'=>array('class'=>'well'),
)); ?>

	<p class="note">Los campos con <span class="required">*</span> son requeridos.</p>

	<?php echo $form->errorSummary($model); ?>

	<br />
	<br />
	
	<fieldset>
	
	<div class="span-20"> 
	
   		<?php echo $form->labelEx($model,'NAME'); ?>
		<?php echo $form->textField($model,'NAME',array('size'=>100,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'NAME'); ?>	
	
		<?php echo $form->labelEx($model,'ID_CATEGORY'); ?>
		<?php echo $form->dropDownList($model,'ID_CATEGORY',CHtml::listData($catCategory::model()->findAll(),'ID_CATEGORY','NAME')); ?>
		<?php echo $form->error($model,'ID_CATEGORY'); ?>


		<?php echo $form->labelEx($model,'START_DATE'); ?>
		<?php //echo $form->textField($model,'START_DATE'); ?>
		<?php    	$this->widget('ext.gcalendar.GCalendar',array(
                          'model' =>$model,
                          'attribute' => 'START_DATE',
                          'inputField'=>'START_DATE',
                          'daFormat'=>'yyyy/mm/dd',
     					  
                          'languageCode' => 'es',
     						
                           )
                      );
		?>	
		
		<?php echo $form->error($model,'START_DATE'); ?>

		<?php echo $form->labelEx($model,'END_DATE'); ?>
		<?php //echo $form->textField($model,'END_DATE'); ?>
		<?php    	$this->widget('ext.gcalendar.GCalendar',array(
                          'model' =>$model,
                          'attribute' => 'END_DATE',
                          'inputField'=>'END_DATE',
                          'daFormat'=>'yyyy/mm/dd',
     					  
                          'languageCode' => 'es',
     						
                           )
                      );
		?>	
		
		<?php echo $form->error($model,'END_DATE'); ?>

		
		<?php echo $form->labelEx($model,'ACTIVE'); ?>
		<?php //echo $form->textField($model,'ACTIVE'); ?>
		<?php echo $form->dropDownList($model,'ACTIVE',$model->getEnabledOptions()); ?>
		<?php echo $form->error($model,'ACTIVE'); ?>
		</div>	
		
		<div class="span-20">
		<?php echo $form->textAreaRow($model, 'DESCRIPTION', array('class'=>'span5', 'rows'=>5)); ?>
		
		<?php echo $form->textAreaRow($model, 'RULES', array('class'=>'span5', 'rows'=>10)); ?>
		
		<?php echo $form->textAreaRow($model, 'BASES', array('class'=>'span5', 'rows'=>5)); ?>
		
		<?php echo $form->textAreaRow($model, 'PROMO', array('class'=>'span5', 'rows'=>5)); ?>
		</div>
		</fieldset>
	
		
	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'submit',  'type'=>'primary','label'=> $model->isNewRecord ?'Create' : 'Update')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->