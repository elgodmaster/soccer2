<div class="container showgrid">
<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'match-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
	
	<label><?php echo "". $model->tOURNAMENT->NAME; ?></label>
	<label><?php echo "JORNADA: ". $model->GROUP; ?></label>
	<label><?php echo "PARTIDO:". $model->NAME; ?></label>	

	</div>
	
	
	

	
	
	
	<div class="span-15">
	
	<table>
		<thead>
		
		<tr>
			<th   align="center">PARTIDO</th>
		</tr>	
		<tr>
			<th><label>DESCRIPCION</label></th>
			<th><label><?php echo $model->lOCAL->NAME; ?></label></th>
			<th><label>VS</label></th>
			<th><label><?php echo $model->vISITOR->NAME; ?></label></th>
			<th><label>Comentario</label></th>
		</tr>	
		</thead>
		<?php 
		$i = 0;
		foreach ($matchResults as $matchResult) { ?>
			
		<tr>
			<td><?php echo $matchResult->cAT_RESULT->NAME; ?></td>
			<td><?php echo $form->textField($matchResult,"[$i]TOTAL_LOCAL",array('size'=>2,'maxlength'=>2)); ?></td>
			<td>-
			<?php 	echo $form->hiddenField($matchResult,"[$i]RESULT_ID",array('value'=>$matchResult->RESULT_ID));
					echo $form->hiddenField($matchResult,"[$i]MATCH_ID",array('value'=>$matchResult->MATCH_ID));
					
			?>		
			</td>
			<td><?php echo $form->textField($matchResult,"[$i]TOTAL_VISITOR",array('size'=>2,'maxlength'=>2)); ?></td>
			<td><?php echo $form->textField($matchResult,"[$i]COMMENT",array('size'=>15,'maxlength'=>50)); ?></td>
						
		</tr>
		
		<?$i++; }//End for?>
		
		
	</table>		
			
	
	</div>
	
	<div class="span-10">
	
	<table>
		<thead>
		
		<tr>
			<th  align="center">JUGADORES (<?php echo $model->lOCAL->NAME; ?>)</th>
		</tr>	
		<tr>
			<th><label>Nombre</label></th>
			<th><label>Numero</label></th>
			<th><label>Acción</label></th>
			
		</tr>	
		</thead>
	
		<?php 
			$i = 0;
			$localPlayers = $model->lOCAL->tblPlayers;
			
			foreach ($localPlayers as $localPlayer) { ?>
				
			<tr>
				<td><?php echo $localPlayer->NAME; ?></td>
				<td><?php echo $localPlayer->teamPlayer->NUMBER; ?></td>
				<td><?php echo CHtml::link('Insert',array('matchGame/manageMatchGameByPlayer','id'=>$model->ID,'playerId'=>$localPlayer->ID));?></td>
			</tr>
					
		<?$i++; }//End for?>
		
		
	</table>		
	
	</div>
	
		<div class="span-10">
	
	<table>
		<thead>
		
		<tr>
			<th  align="center">JUGADORES (<?php echo $model->vISITOR->NAME; ?>)</th>
		</tr>	
		<tr>
			<th><label>Nombre</label></th>
			<th><label>Numero</label></th>
			<th><label>Acción</label></th>
			
		</tr>	
						
		</thead>
	
		<?php 
			$i = 0;
			$localPlayers = $model->vISITOR->tblPlayers;
			
			foreach ($localPlayers as $localPlayer) { ?>
				
			<tr>
				<td><?php echo $localPlayer->NAME; ?></td>
				<td><?php echo $localPlayer->teamPlayer->NUMBER; ?></td>
				<td><?php echo CHtml::link('Insert',array('matchGame/manageMatchGameByPlayer','id'=>$model->ID,'playerId'=>$localPlayer->ID));?></td>
			</tr>
					
		<?$i++; }//End for?>
		
	</table>		
	
	</div>
	
	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>
	



<?php $this->endWidget(); ?>

</div><!-- form -->
</div>