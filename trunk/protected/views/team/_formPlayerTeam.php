<div class="container showgrid">
<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'player-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Los campos con: <span class="required">*</span> son requeridos.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="span-9">
	<div class="row">
		<label for="text" class="required">Name:</label>
		<?php echo $form->textField($model,'NAME',array('size'=>40,'maxlength'=>50,'readonly'=>'readonly')); ?>
		<?php echo $form->error($model,'NAME'); ?>
	</div>
<!-- 
	<div class="row">
		<?php echo $form->labelEx($model,'BIRTH'); ?>
		<?php //echo $form->textField($model,'BIRTH'); ?>
	
		<?php  	$this->widget('ext.gcalendar.GCalendar',array(
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
	</div>
 
	<div class="row">
		<?php echo $form->labelEx($model,'GENDER'); ?>
		<?php echo $form->dropDownList($model,'GENDER',$model->getGenderOptions(),array('readonly'=>'readonly')); ?>
		<?php echo $form->error($model,'GENDER'); ?>
	</div>
	
 -->

			<div class="row">
		<?php echo $form->labelEx($playerTeam,'ALIAS'); ?>
		<?php echo $form->textField($playerTeam,'ALIAS',array('size'=>40,'maxlength'=>300)); ?>
		<?php echo $form->error($playerTeam,'ALIAS'); ?>
	</div>
		

	
	
	</div>
	
	<div class="span-9">
	
	
	<div class="row">
		<?php echo $form->labelEx($playerTeam,'NUMBER'); ?>
		<?php echo $form->textField($playerTeam,'NUMBER',array('size'=>5,'maxlength'=>50)); ?>
		<?php echo $form->error($playerTeam,'NUMBER'); ?>
	</div>


	<div class="row">
		<?php echo $form->labelEx($playerTeam,'ACTIVE'); ?>
		<?php //echo $form->textField($model,'ACTIVE'); ?>
		<?php echo $form->dropDownList($playerTeam,'ACTIVE',$model->getEnabledOptions()); ?>
		<?php echo $form->error($playerTeam,'ACTIVE'); ?>
	</div>


	
	<div class="row">
		<?php echo $form->labelEx($playerTeam,'ROLE_ID'); ?>
		<?php echo $form->dropDownList($playerTeam,'ROLE_ID',CHtml::listData($playerTeam->getRoles(),'ID','NAME'),array('id'=>'rolType')); ?>
		<?php echo $form->error($playerTeam,'ROLE_ID'); ?>
	</div>	

</div>

<div class="span-9">
<div class="row buttons">

		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>
</div>
<?php $this->endWidget(); ?>

</div><!-- form -->
</div>