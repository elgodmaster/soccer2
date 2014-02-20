<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'playerResultform',
	'enableAjaxValidation'=>false,
)); ?>

	<legend><?php echo $playerModel->NAME;?> </legend>

<div class="view">
	
		<?php $this->widget('bootstrap.widgets.TbDetailView', array(
			'type'=>'striped bordered condensed',
		    'data'=>$model,
		    'attributes'=>array(
		        array('name'=>'ID', 'label'=>'Torneo', 'value'=>$model->tOURNAMENT->NAME),
		        array('name'=>'GROUP', 'label'=>'# Jornada '.$model->GROUP, 'value'=>'Partido '.$model->NAME.' ['.$model->lOCAL->NAME.' vs '.$model->vISITOR->NAME.']' ),
		    		
		    ),
		)); ?>
	
	</div>


	
	<p class="note">Los campos con:  <span class="required">*</span> son requeridos.</p>

	<?php echo $form->errorSummary($model); ?>

	

	<div class="span-15">
	
	<table class="table table-striped">
		<thead>
		
		<tr>
			<th   align="center">ESTADISTICA</th>
		</tr>	
		<tr>
			<th><label>DESCRIPCION</label></th>
			<th><label>CANTIDAD</label></th>
			<th><label>COMENTARIO</label></th>
		</tr>	
		</thead>
		<?php 
		$i = 0;
		foreach ($playerResults as $playerResult) { ?>
			
		<tr>
			<td><?php echo $playerResult->rESULT->NAME; ?></td>
			<td><?php echo $form->textField($playerResult,"[$i]TOTAL",array('size'=>2,'maxlength'=>2,'class'=>'input-mini')); ?></td>					
			
			<td><?php echo $form->textField($playerResult,"[$i]COMMENT",array('size'=>15,'maxlength'=>50)); ?>
			
			<?php 	echo $form->hiddenField($playerResult,"[$i]RESULT_ID",array('value'=>$playerResult->RESULT_ID));
					echo $form->hiddenField($playerResult,"[$i]MATCH_ID",array('value'=>$playerResult->MATCH_ID));
					echo $form->hiddenField($playerResult,"[$i]PLAYER_ID",array('value'=>$playerResult->PLAYER_ID));
					
			?>
			</td>
						
		</tr>
		
		<?php $i++; }//End for?>
		
	</table>		

	</div>
	



<?php $this->endWidget(); ?>

</div><!-- form -->
