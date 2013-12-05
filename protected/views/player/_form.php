<div class="container showgrid">
<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'player-form',
	'enableAjaxValidation'=>false,
)); ?>

	<div class="row">
	
	<p class="note">Fields with<span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	
	</div>
	<div class="row">
	<div class="span-15">
	
	
		<?php echo $form->labelEx($model,'NAME'); ?>
		<?php echo $form->textField($model,'NAME',array('size'=>40,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'NAME'); ?>
	

	
		<?php echo $form->labelEx($model,'BIRTH'); ?>
		<?php //echo $form->textField($model,'BIRTH'); ?>
	<?php
			//	$this->widget('zii.widgets.jui.CJuiDatePicker', array(
    //'name'=>'Player[BIRTH]',
    // additional javascript options for the date picker plugin
    //'options'=>array(
      //  'showAnim'=>'fold',
    //),
    //'htmlOptions'=>array(
	//	'class'=>'shadowdatepicker'
    //),
//));
?>
<?php    	$this->widget('ext.gcalendar.GCalendar',array(
                          'model' =>$model,
                          'attribute' => 'BIRTH',
                          'inputField'=>'BIRTH',
                          'daFormat'=>'yyyy/mm/dd',
     					   'calButton'=>'true',
                          'languageCode' => 'es',
     						
                           )
                      );
		?>	
		<?php echo $form->error($model,'BIRTH'); ?>
	

	
		<?php echo $form->labelEx($model,'PHONE'); ?>
		<?php echo $form->textField($model,'PHONE',array('size'=>20,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'PHONE'); ?>
	

	
		<?php echo $form->labelEx($model,'EMAIL'); ?>
		<?php echo $form->textField($model,'EMAIL',array('size'=>40,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'EMAIL'); ?>
	

	
	</div>
	
	<div class="span-9">
	
	
		<?php echo $form->labelEx($model,'ADDRESS'); ?>
		<?php echo $form->textField($model,'ADDRESS',array('size'=>40,'maxlength'=>300)); ?>
		<?php echo $form->error($model,'ADDRESS'); ?>
	
	
	
		<?php echo $form->labelEx($model,'FACE_BOOK'); ?>
		<?php echo $form->textField($model,'FACE_BOOK',array('size'=>30,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'FACE_BOOK'); ?>
	

	
		<?php echo $form->labelEx($model,'TWITER'); ?>
		<?php echo $form->textField($model,'TWITER',array('size'=>30,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'TWITER'); ?>
	

	
		<?php echo $form->labelEx($model,'GENDER'); ?>
		<?php echo $form->dropDownList($model,'GENDER',$model->getGenderOptions()); ?>
		<?php echo $form->error($model,'GENDER'); ?>
	

	
		<?php echo $form->labelEx($model,'ACTIVE'); ?>
		<?php //echo $form->textField($model,'ACTIVE'); ?>
		<?php echo $form->dropDownList($model,'ACTIVE',$model->getEnabledOptions()); ?>
		<?php echo $form->error($model,'ACTIVE'); ?>
	
	
	
	 
	
	 
		<?php $this->widget('bootstrap.widgets.TbButton', array(
    'label'=>'?',
    'type'=>'danger',
    'htmlOptions'=>array('data-title'=>'A Title', 'data-content'=>'And here\'s some amazing content. It\'s very engaging. right?', 'rel'=>'popover'),
)); ?>
	
	


</div>

</div>
<div class="row">
<div class="span-15">
<div class="row buttons">

		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>
</div>
<?php $this->endWidget(); ?>

</div><!-- form -->
</div>
</div>