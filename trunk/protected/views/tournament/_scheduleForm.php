<div class="form">

<?php $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id'=>'verticalForm',
    'htmlOptions'=>array('class'=>'well'),
)); ?>

	<p class="note">Los campos con: <span class="required">*</span> son requeridos.</p>

	<?php echo $form->errorSummary($model); ?>

	<br />
	<br />
	
	<fieldset>
	<legend><b>Fechas del torneo</b></legend>
	
	
	<div class="span-20"> 
	
	 	<?php echo $form->labelEx($model,'START_DATE'); ?>
		<?php //echo $form->textField($model,'START_DATE'); ?>
		<?php 
		Yii::import('application.extensions.CJuiDateTimePicker.CJuiDateTimePicker');
		
		$this->widget('CJuiDateTimePicker',array(
				'model'=>$model, //Model object
				'attribute'=>"START_DATE", //attribute name
				'language'=>'es',
				'mode'=>'datetime', //use "time","date" or "datetime" (default)
				'options'=>array( "dateFormat"=>'yy-mm-dd'),
		
				'htmlOptions'=>array('class'=>'input-medium','disabled'=>!($model->STATUS < 4)),
		));
		
		?>
		
		
		
		<?php echo $form->error($model,'START_DATE'); ?>
		</div>	
		
		
	</fieldset>
	
	<fieldset>
	<legend><b>Días de juego</b></legend>
	
	
	<div class="span-20"> 
	
	    <?php echo $form->checkBoxListRow($model, "SCHEDULE_D", array(
        '1'=>'LUNES',
        '2'=>'MARTES',
       '3'=>'MIÉRCOLES',
	    '4'=>'JUEVES',
	  '5'=> 'VIERNES',
	   '6'=> 'SÁBADO',
	   '0'=>	'DOMINGO',
    ), array('hint'=>'<strong>Nota:</strong> Seleccionar solo los deseados.', 'disabled'=>!($model->STATUS < 4))); ?>
   		
		</div>	
		
		
	</fieldset>
	
	<fieldset>
	<legend><b>Horarios</b></legend>
	
	
	<div class="span-20"> 
	
	    <?php echo $form->checkBoxListRow($model, "SCHEDULE_CONFIG", array(
        'Matutino',
        'Vespertino',
        'Nocturno',
	    'Todos',
	    		
    ), array('hint'=>'<strong>Nota:</strong> Seleccionar solo los deseados .', 'disabled'=>!($model->STATUS < 4))); ?>
   		
		</div>	
		
		
	</fieldset>

	
	<?php echo $form->textFieldRow($model,'MATCH_LONG_TIME', array('maxlength'=>2, 'class'=>'input-mini', 'disabled'=>!($model->STATUS < 4))); ?>
	
		
	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'submit',  'type'=>!($model->STATUS < 4)?'info':'primary','label'=>!($model->STATUS < 4) ?'Listo' : 'Guardar')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->