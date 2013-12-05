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
	<legend><b>Fechas del torneo</b></legend>
	
	
	<div class="span-20"> 
	
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
		</div>	
		
		
	</fieldset>
	
	<fieldset>
	<legend><b>Dias juego</b></legend>
	
	
	<div class="span-20"> 
	
	    <?php echo $form->checkBoxListRow($model, "SCHEDULE_D", array(
        '111'=>'LUNES',
        '222'=>'MARTES',
       '333'=>'MIERCOLES',
	    '444'=>'JUEVES',
	  '555'=> 'VIERNES',
	   '666'=> 'SABADO',
	   '777'=>	'DOMINGO',
	    '888'=>'Todos',
    ), array('hint'=>'<strong>Nota:</strong> Seleccionar solo los deseados.')); ?>
   		
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
	    		
    ), array('hint'=>'<strong>Nota:</strong> Seleccionar solo los deseados .')); ?>
   		
		</div>	
		
		
	</fieldset>
	
		
	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'submit',  'type'=>'primary','label'=> $model->isNewRecord ?'Create' : 'Guardar')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->