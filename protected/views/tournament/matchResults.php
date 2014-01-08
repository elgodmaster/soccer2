	<?php
$this->breadcrumbs=array(
	'Tournaments'=>array('index'),
	$model->NAME=>array('manage','id'=>$model->ID),
	'Resultados'
);
$this->menu=array(
	array('label'=>'List Tournament', 'url'=>array('index')),
	array('label'=>'Manage Tournament', 'url'=>array('admin')),
);
?>

<h1>Resultados</h1>

<br />

<?php /** @var TbActiveForm $form */
$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id'=>'horizontalForm',
    'type'=>'horizontal',
)); ?>
 
 <?php if ($model->STATUS<4) {?>
 
<?php $this->widget('bootstrap.widgets.TbTabs', array(
    'tabs'=>$this->getTabularFormTabs($form, $model, $matchGames),
	'placement'=>'left',
)); ?>
 
 <div class="form-actions">
    <?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'submit', 'type'=>'info', 'label'=>'Listo')); ?>
</div>
 
 
 
 <?php } elseif ($model->STATUS>3){
 
 	$menuOptions = array();
 	
 	$matchGames = array();

 	$switchVar = 0;
 	
 	foreach ($model->matchGames as $matchGame){
 		
		if($switchVar != $matchGame->GROUP){
			
				$switchVar = $matchGame->GROUP;
				$menuOptions[] =  array('label'=>'J'.$switchVar, 'url'=>array('manageResults', 'id'=>$model->ID,'roundId'=>$switchVar), 'active'=> ($roundId==$switchVar));
		}

		
		if($roundId == $matchGame->GROUP){
			
			$matchGames[] = $matchGame; 

		}

 	}
 	
 	
 	?>
 
 
   
 <?php $this->widget('bootstrap.widgets.TbMenu', array(
    'type'=>'pills', // '', 'tabs', 'pills' (or 'list')
    'stacked'=>false, // whether this is a stacked menu
    'items'=> $menuOptions,

));
 
 

//echo $this->renderPartial('../matchGame/_form', array('model'=>$matchGames[0],'matchResults'=>$matchResults));
 
 
 ?>
 
 <table class="table table-hover" >
 	
  	<tbody>
 <?php foreach ($matchGames as $match){ ?>
 
 

 	<tr class="info">
 			<td colspan="1"><?php echo 	'<strong>P'.$match->NAME.'</strong>'; ?>
 			
 			</td>
 			<td colspan="2">
 			<p class="text-info text-right">
 			<?php echo 	'Fecha ['.$match->TIME.
 						']   &nbsp; Arbitro ['.$match->rEFEREE->NAME.
 						']   &nbsp; Cancha ['.$match->pLAYGROUND->NAME.']' ?>
 			</p>
 			</td>
 			<td ><?php $this->widget('bootstrap.widgets.TbButton', array(
								    'label'=>'Editar',
								    'type'=>'primary', // null, 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
								    'size'=>'mini', // null, 'large', 'small' or 'mini'
								   	'url'=>array('matchGame/manage', 'id'=>$match->ID),
									)); ?>
				<?php $this->widget('bootstrap.widgets.TbButton', array(
			    'label'=>'OK', 
			    'type'=>'success', 
			    'size'=>'mini', 
				)); ?>
 			</td>
 		</tr>
 		<tr>
 			<th></th>
 			<th>
 			<?php  	echo CHtml::image($match->lOCAL->getLogo(), '', array("style"=>"width:25px;height:25px;" ,"class"=>"img-circle"));
					echo '&nbsp;'.$match->lOCAL->NAME;
			?>
			</th>		
 			<th>
 			<?php  	echo CHtml::image($match->vISITOR->getLogo(), '', array("style"=>"width:25px;height:25px;", "class"=>"img-circle"));
					echo '&nbsp;'.$match->vISITOR->NAME;
			?>
			</th>
 			<th>Comentario</th>
 		</tr> 	
 	
 	<?php if(count($match->matchResults) > 0){
 			foreach ($match->matchResults as $result){ 		
 		?>
 	
 	
 		<tr>
 			<td><p class="text-center"><?php echo $result->cAT_RESULT->NAME?></p></td>
 			<td>
 			<?php 
 			
 			//echo ($result->TOTAL_LOCAL > $result->TOTAL_VISITOR)? '<p class="text-success">'.$result->TOTAL_LOCAL.'</p>' : $result->TOTAL_LOCAL
 			
 			if($result->TOTAL_LOCAL > $result->TOTAL_VISITOR){
 				
					 $this->widget('bootstrap.widgets.TbBadge', array(
							'type'=>'success', // 'success', 'warning', 'important', 'info' or 'inverse'
							'label'=>$result->TOTAL_LOCAL,
					)); 		
		
 			}else if($result->TOTAL_LOCAL == $result->TOTAL_VISITOR){
 				
					$this->widget('bootstrap.widgets.TbBadge', array(
							'type'=>'info', // 'success', 'warning', 'important', 'info' or 'inverse'
							'label'=>$result->TOTAL_LOCAL,
					));

 			}else{
 			
					$this->widget('bootstrap.widgets.TbBadge', array(
							'type'=>'important', // 'success', 'warning', 'important', 'info' or 'inverse'
							'label'=>$result->TOTAL_LOCAL,
					));
	

 			}
 			
 			?>
 			
 			</td>
 			<td>
 			<?php 
 			 
 			//echo ($result->TOTAL_VISITOR > $result->TOTAL_LOCAL)? '<p class="text-success">'.$result->TOTAL_VISITOR.'</p>' : $result->TOTAL_VISITOR
 			
 			if($result->TOTAL_VISITOR > $result->TOTAL_LOCAL){
 					
 				$this->widget('bootstrap.widgets.TbBadge', array(
 						'type'=>'success', // 'success', 'warning', 'important', 'info' or 'inverse'
 						'label'=>$result->TOTAL_VISITOR,
 				));
 			
 			}else if ($result->TOTAL_VISITOR == $result->TOTAL_LOCAL){
 					
 				$this->widget('bootstrap.widgets.TbBadge', array(
 						'type'=>'info', // 'success', 'warning', 'important', 'info' or 'inverse'
 						'label'=>$result->TOTAL_VISITOR,
 				));
 			
 			}else{
 				
				$this->widget('bootstrap.widgets.TbBadge', array(
						'type'=>'important', // 'success', 'warning', 'important', 'info' or 'inverse'
						'label'=>$result->TOTAL_VISITOR,
				));

 			}
 			
 			?></td>
 			<td><p class="muted"><?php echo $result->COMMENT?></p></td>
 		</tr>
 		
 		
 	<?php }}else{ ?>
 		
 		<tr class="warning">
 			<td colspan="4">No se han asignado resultados para este partido</td>
 		</tr>

 		<?php }?>	

 		
 		<tr>
 		<td colspan="4">&nbsp;</td>
 		</tr>
 		
 	
 
 	<?php }//for?>
 	
 	</tbody>
 		
 </table>
 
 <?php }?>

<?php $this->endWidget(); ?>



<?php //echo $this->renderPartial('_matchForm', array('model'=>$model,'matchGames'=>$matchGames,'playGround'=>$playGround)); ?>
