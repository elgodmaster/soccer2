<div class="form">

<?php $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id'=>'verticalForm',
		
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>
	
	
	
	<legend>Estadisticas por partido</legend>
	<br />
	<table class="table table-striped table-bordered">
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
	
	<legend>Estadisticas por jugador</legend>
	<br />

	<table class="table table-hover">
		<thead>
		
		<tr>
			<th colspan="3"  align="center"><?php echo $model->lOCAL->NAME; ?></th>
			<th>&nbsp;</th>
			<th colspan="3"  align="center"><?php echo $model->vISITOR->NAME; ?></th>
		</tr>	
		<tr>
			<th>#</th>
			<th>Nombre</th>		
			<th>Accion</th>
			<th>&nbsp;</th>
			<th>#</th>
			<th>Nombre</th>			
			<th>Accion</th>
		</tr>	
		</thead>
		<tbody>
		<?php 
			
			$a_local = 	$model->lOCAL->players;
			$a_visitor = 	$model->vISITOR->players;
			$a_mandatory = (count($a_local) >= count($a_visitor) )? $a_local : $a_visitor; 
		
			for($i = 0; $i<count($a_mandatory); $i++){ ?>
				
			<tr>
			<td><?php echo (isset($a_local[$i])) ? $a_local[$i]->NUMBER : "&nbsp;"; ?></td>
			
				<td><?php echo (isset($a_local[$i])) ? $a_local[$i]->pLAYER->NAME : "&nbsp;"; ?></td>
				
				
				<td>
					<?php if (isset($a_local[$i])) $this->widget('bootstrap.widgets.TbButton', array(
					    'label'=>'editar',
					    'type'=>'link',
						'size'=>'small',
						'url'=>array('matchGame/manageMatchGameByPlayer','id'=>$model->ID,'playerId'=>$a_local[$i]->pLAYER->ID),
					    'htmlOptions'=>array(
					        'data-toggle'=>'modal',
					        'data-target'=>'#myModal',
					    ),
					)); else echo "&nbsp;" ?>
				</td>
				<td>&nbsp;</td>
				
				<td><?php echo (isset($a_visitor[$i])) ? $a_visitor[$i]->NUMBER : "&nbsp;"; ?></td>
				<td><?php echo (isset($a_visitor[$i])) ? $a_visitor[$i]->pLAYER->NAME : "&nbsp;"; ?></td>
				
				
				<td>
					<?php if (isset($a_visitor[$i])) $this->widget('bootstrap.widgets.TbButton', array(
					    'label'=>'editar',
					    'type'=>'link',
						'size'=>'small',
						'url'=>array('matchGame/manageMatchGameByPlayer','id'=>$model->ID,'playerId'=>$a_visitor[$i]->pLAYER->ID),
					    'htmlOptions'=>array(
					        'data-toggle'=>'modal',
					        'data-target'=>'#myModal',
					    ),
					)); else echo "&nbsp;" ?>
				</td>
				
			</tr>
					
		<?php }//End for?>
		</tbody>
		
	</table>		

	
	

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
