<div class="container showgrid">
<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'match-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="span-9">
	
	<table>
		<thead>
			<tr>
				<th colspan="2"><?php echo "". $model->tOURNAMENT->NAME; ?></th>
			</tr>					
		</thead>
		
		<tbody>
			<tr>
				<td>Jornada</td>
				<td><?php echo $model->GROUP; ?></td>
			</tr>
			<tr>
				<td>Partido</td>
				<td><?php echo $model->NAME; ?></td>
			</tr>
			<tr>
				<td>Equipo</td>
				<td><?php echo $playerModel->teamPlayer->tEAM->NAME; ?></td>
			</tr>
			
			<tr>
				<td>Jugador</td>
				<td><?php echo $playerModel->NAME; ?></td>
			</tr>
		</tbody>		
	</table>
	
	</div>

	<div class="span-15">
	
	<table>
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
			<td><?php echo $form->textField($playerResult,"[$i]TOTAL",array('size'=>2,'maxlength'=>2)); ?></td>					
			
			<td><?php echo $form->textField($playerResult,"[$i]COMMENT",array('size'=>15,'maxlength'=>50)); ?>
			
			<?php 	echo $form->hiddenField($playerResult,"[$i]RESULT_ID",array('value'=>$playerResult->RESULT_ID));
					echo $form->hiddenField($playerResult,"[$i]MATCH_ID",array('value'=>$playerResult->MATCH_ID));
					echo $form->hiddenField($playerResult,"[$i]PLAYER_ID",array('value'=>$playerResult->PLAYER_ID));
					
			?>
			</td>
						
		</tr>
		
		<?$i++; }//End for?>
		
	</table>		

	</div>
	
	<div class="span-15">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>
	



<?php $this->endWidget(); ?>

</div><!-- form -->
</div>