
<?php $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id'=>'verticalForm',
    'htmlOptions'=>array(),
)); ?>

	

	<?php echo $form->errorSummary($model); ?>

	
	<legend>Configuración de horarios</legend>
	<p class="muted">Los campos con: <span class="required">*</span> son requeridos.</p>
	<fieldset>
	
	
	
	<div class="span4"> 
	
	 	<?php echo $form->labelEx($model,'START_DATE'); ?>
		<?php //echo $form->textField($model,'START_DATE'); ?>
		<?php 
		Yii::import('application.extensions.CJuiDateTimePicker.CJuiDateTimePicker');
		
		$this->widget('CJuiDateTimePicker',array(
				'model'=>$model, //Model object
				'attribute'=>"START_DATE", //attribute name
				'language'=>'es',
				'mode'=>'date', //use "time","date" or "datetime" (default)
				'options'=>array( "dateFormat"=>'yy-mm-dd'),
		
				'htmlOptions'=>array('class'=>'input-medium','disabled'=>!($model->STATUS < 4)),
		));
		
		?>
		 
		<?php echo $form->textFieldRow($model,'MATCH_LONG_TIME', array('maxlength'=>2, 'class'=>'input-mini', 'disabled'=>!($model->STATUS < 4))); ?>
		
		<?php echo $form->textFieldRow($model,'MATCH_TIMES', array('maxlength'=>2, 'class'=>'input-mini', 'disabled'=>!($model->STATUS < 4))); ?>
	
		<?php echo $form->error($model,'START_DATE'); ?>
		
		
		</div>	
		
		

	
	<div class="span4"> 
	
	    <?php echo $form->checkBoxListRow($model, "SCHEDULE_D", array(
        '2'=>'LUNES',
        '3'=>'MARTES',
       '4'=>'MIÉRCOLES',
	    '5'=>'JUEVES',
	  '6'=> 'VIERNES',
	   '7'=> 'SÁBADO',
	   '1'=>	'DOMINGO',
    ), array('hint'=>'<strong>Nota:</strong> Seleccionar solo los deseados.', 'disabled'=>!($model->STATUS < 4))); ?>
   		
		</div>	
		


	<div class="span4"> 
	
	    <?php echo $form->checkBoxListRow($model, "SCHEDULE_CONFIG", array(
        'Matutino',
        'Vespertino',
        'Nocturno',
	    'Todos',
	    		
    ), array('hint'=>'<strong>Nota:</strong> Seleccionar solo los deseados .', 'disabled'=>!($model->STATUS < 4))); ?>
   		
		</div>	
		
	
		
	</fieldset>

	
	
	
		
	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'submit',  'type'=>!($model->STATUS < 4)?'info':'primary','label'=>!($model->STATUS < 4) ?'Listo' : 'Guardar')); ?>
	</div>

<?php $this->endWidget(); ?>

