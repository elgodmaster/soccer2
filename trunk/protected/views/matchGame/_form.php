<div class="form">

<?php $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id'=>'verticalForm',
		
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>
	
	
	
	
	<table class="table table-striped">
		<thead>
		<tr>
			<th></th>
			<th><?php echo $model->lOCAL->NAME; ?></th>
			<th><?php echo $model->vISITOR->NAME; ?></th>
			<th>Comentario</th>
		</tr>	
		</thead>
		<?php 
		$i = 0;
		foreach ($matchResults as $matchResult) { ?>
			
		<tr>
			<td><?php echo $matchResult->cAT_RESULT->NAME; ?></td>
			<td><?php echo $form->textField($matchResult,"[$i]TOTAL_LOCAL",array('size'=>2,'maxlength'=>2, 'class'=>'input-mini')); ?></td>
			<td><?php echo $form->textField($matchResult,"[$i]TOTAL_VISITOR",array('size'=>2,'maxlength'=>2, 'class'=>'input-mini')); ?></td>
			<td><?php echo $form->textField($matchResult,"[$i]COMMENT",array('size'=>15,'maxlength'=>50)); ?>
						<?php 	echo $form->hiddenField($matchResult,"[$i]RESULT_ID",array('value'=>$matchResult->RESULT_ID));
					echo $form->hiddenField($matchResult,"[$i]MATCH_ID",array('value'=>$matchResult->MATCH_ID));
					
			?>		
			
			</td>
						
		</tr>
		
		<?php $i++; }//End for?>
		
		
	</table>
	
	<div class="span-10">	
	<table class="table table-hover">
		<thead>
		
		<tr>
			<th  align="center">JUGADORES (<?php echo $model->lOCAL->NAME; ?>)</th>
		</tr>	
		<tr>
			<th>Nombre</th>
			<th>Numero</th>
			<th>Acción</th>
		</tr>	
		</thead>
		<tbody>
		<?php 
			
			foreach ($model->lOCAL->players as $localPlayer) { ?>
				
			<tr>
				<td><?php echo $localPlayer->pLAYER->NAME; ?></td>
				<td><?php echo $localPlayer->NUMBER; ?></td>
				<td>
					<?php $this->widget('bootstrap.widgets.TbButton', array(
					    'label'=>'editar',
					    'type'=>'link',
						'size'=>'small',
						'url'=>array('matchGame/manageMatchGameByPlayer','id'=>$model->ID,'playerId'=>$localPlayer->pLAYER->ID),
					    'htmlOptions'=>array(
					        'data-toggle'=>'modal',
					        'data-target'=>'#myModal',
					    ),
					)); ?>
				</td>
			</tr>
					
		<?php }//End for?>
		</tbody>
		
	</table>		
	</div>
	
	<div class="span-10">
	<table class="table table-hover">
		<thead>
		
		<tr>
			<th  align="center">JUGADORES (<?php echo $model->vISITOR->NAME; ?>)</th>
		</tr>	
		<tr>
			<th>Nombre</th>
			<th>Numero</th>
			<th>Acción</th>
		</tr>	
						
		</thead>
		<tbody>
		<?php 
			
			foreach ($model->vISITOR->players as $visitorPlayer) { ?>
				
			<tr>
				<td><?php echo $localPlayer->pLAYER->NAME; ?></td>
				<td><?php echo $localPlayer->NUMBER; ?></td>
				<td>
				<?php $this->widget('bootstrap.widgets.TbButton', array(
					    'label'=>'editar',
					    'type'=>'link',
						'size'=>'small',
						'url'=>array('matchGame/manageMatchGameByPlayer','id'=>$model->ID,'playerId'=>$visitorPlayer->pLAYER->ID),
					    'htmlOptions'=>array(
					        'data-toggle'=>'modal',
					        'data-target'=>'#myModal',
					    ),
					)); ?>
				</td>
			</tr>
					
		<?php }//End for?>
		</tbody>
	</table>		
	

	</div>

	<div class="span-40">
	
		<?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'submit',  'type'=>'primary','label'=> $model->isNewRecord ?'Create' : 'Guardar')); ?>
	
	
</div>




<?php $this->endWidget(); ?>
<!-- form -->
</div>

<?php $this->beginWidget('bootstrap.widgets.TbModal', array('id'=>'myModal')); ?>
 
<div class="modal-header">
    <a class="close" data-dismiss="modal">&times;</a>
    <h4>Agregar estadisticas Jugador</h4>
</div>
 
<div class="modal-body">   
</div>
 
<div class="modal-footer">
    <?php $this->widget('bootstrap.widgets.TbButton', array(
        'type'=>'primary',
        'label'=>'Guardar cambios',
        'url'=>'#',
        //'htmlOptions'=>array('data-dismiss'=>'modal'),
    	'htmlOptions'=>array('onclick' => '$("#playerResultform").submit()'),
    )); ?>
    <?php $this->widget('bootstrap.widgets.TbButton', array(
        'label'=>'Close',
        'url'=>'#',
        'htmlOptions'=>array('data-dismiss'=>'modal'),
    )); ?>
</div>
 
<?php $this->endWidget(); ?>



<script type="text/javascript">
    
$("a[data-toggle=modal]").click(function(){
	 var target = $(this).attr('data-target');
	    var url = $(this).attr('href');
	    if(url){
	        $(target).find(".modal-body").load(url);
	    }
});
    
</script>
