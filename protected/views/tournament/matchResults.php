	<?php 
	 
	/**
	 * Default Values
	 */
	
	$PROGRAMADO = 3;
	$EVALUANDO = 4;
	$LISTO_PARA_PROGRAMAR = 2;
	
	?>
	
	<?php
	$this->breadcrumbs = array (
			'Tournaments' => array (
					'index' 
			),
			$model->NAME => array (
					'manage',
					'id' => $model->ID 
			),
			'Resultados' 
	);
	$this->menu = array (
			array (
					'label' => 'List Tournament',
					'url' => array (
							'index' 
					) 
			),
			array (
					'label' => 'Manage Tournament',
					'url' => array (
							'admin' 
					) 
			) 
	);
	?>

<h1>Resultados</h1>

<br />

<?php

/**
 * @var TbActiveForm $form
 */
$form = $this->beginWidget ( 'bootstrap.widgets.TbActiveForm', array (
		'id' => 'horizontalForm',
		'type' => 'horizontal' 
) );
?>
 
 <?php if ($model->STATUS<4) {?>
 
<?php
		
$this->widget ( 'bootstrap.widgets.TbTabs', array (
				'tabs' => $this->getTabularFormTabs ( $form, $model, $matchGames ),
				'placement' => 'left' 
		) );
		?>

<div class="form-actions">
    <?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'submit', 'type'=>'info', 'label'=>'Listo')); ?>
</div>



<?php
	
} elseif ($model->STATUS > 3) {
		
		$menuOptions = array ();
		
		$matchGames = array ();
		
		$switchVar = 0;
		
		foreach ( $model->matchGames as $matchGame ) {
			
			if ($switchVar != $matchGame->GROUP) {
				
				$switchVar = $matchGame->GROUP;
				$menuOptions [] = array (
						'label' => 'J' . $switchVar,
						'url' => array (
								'manageResults',
								'id' => $model->ID,
								'roundId' => $switchVar 
						),
						'active' => ($roundId == $switchVar) 
				);
			}
			
			if ($roundId == $matchGame->GROUP) {
				
				$matchGames [] = $matchGame;
			}
		}
		
		?>
 
 
   
 <?php
		
$this->widget ( 'bootstrap.widgets.TbMenu', array (
				'type' => 'pills', // '', 'tabs', 'pills' (or 'list')
				'stacked' => false, // whether this is a stacked menu
				'items' => $menuOptions 
		)
		 );
		
		// echo $this->renderPartial('../matchGame/_form', array('model'=>$matchGames[0],'matchResults'=>$matchResults));
		
		?>

<table class="table table-hover">

	<tbody>
 <?php foreach ($matchGames as $match){ ?>
 
 

 	<tr class="info">
			<td colspan="1"><strong>P<?php echo $match->NAME; ?></strong></td>
			<td colspan="2">
			<?php if ($match->STATUS > $LISTO_PARA_PROGRAMAR) {
			echo "	<p class='text-info text-right'>";
 					// echo 'Fecha [' . $match->TIME . ']   &nbsp; Arbitro [' . (isset ( $match->rEFEREE )) ? $match->rEFEREE->NAME : 'No asignado' . ']   &nbsp; Cancha [' . (isset ( $match->pLAYGROUND->NAME )) ? $match->pLAYGROUND->NAME : 'No asignado' . ']';
 					echo "<small><strong>Fecha</strong>&nbsp;$match->TIME&nbsp;&nbsp;&nbsp;</small>";
 					echo "<small><strong>Arbitro</strong>&nbsp;".$match->rEFEREE->NAME."&nbsp;&nbsp;&nbsp;</small>";
 					echo "<small><strong>Cancha</strong>&nbsp;".$match->pLAYGROUND->NAME."</small>";
 					
 			echo "</p>";
 			} else{
 				
			echo "<p class='text-error text-right'>";
			echo "AUN NO SE HA PROGRAMADO ESTE PARTIDO";	
			echo "</p>";

 			}?>	
			</td>
			<td><?php if ($match->STATUS > $LISTO_PARA_PROGRAMAR) {
				$this->widget ( 'bootstrap.widgets.TbButton', array (
						'label' => 'Editar',
						'type' => 'primary', // null, 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
						'size' => 'mini', // null, 'large', 'small' or 'mini'
						'url' => array (
								'matchGame/manage',
								'id' => $match->ID 
						) 
				) );
			}
			?>	
				&nbsp;	
				<?php	if (($match->STATUS > 4)) {
				
				$this->widget ( 'bootstrap.widgets.TbButton', array (
						'url' => array (
								'matchGame/validate',
								'id' => $match->ID 
						),
						'label' => ($match->STATUS != 6) ? 'Listo' : 'Evaluado',
						'buttonType' => 'ajaxButton',
						'type' => ($match->STATUS != 6) ? 'warning' : 'success',
						'disabled' => ($match->STATUS == 6),
						'htmlOptions' => array (
								'id' => '_listo' . $match->ID 
						),
						'size' => 'mini',
						'ajaxOptions' => array (
								'type' => 'get',
								'success' => "js:function(vals){
                            	 								
																	$('#_listo$match->ID').html('Evaluado');
																	$('#_listo$match->ID').attr('disabled','true');
																	$('#_listo$match->ID').attr('class','btn btn-success btn-mini');
																																    
                											}",
								
								'error' => "js:function(vals){
															 alert('No puedes autorizar este partido aun, razon: '.concat(String(vals)));
 															}" 
						) 
				)
				 );
			}
			?>
				
			
 			</td>
		</tr>
		<tr>
			<th></th>
			<th style="text-align: center;">
 			<?php
			
echo CHtml::image ( $match->lOCAL->getLogo (), '', array (
					"style" => "width:25px;height:25px;",
					"class" => "img-circle" 
			) );
			echo '&nbsp;' . $match->lOCAL->NAME;
			?>
			</th>
			<th style="text-align: center;">
 			<?php
			
echo CHtml::image ( $match->vISITOR->getLogo (), '', array (
					"style" => "width:25px;height:25px;",
					"class" => "img-circle" 
			) );
			echo '&nbsp;' . $match->vISITOR->NAME;
			?>
			</th>
			<td>Comentarios</td>
		</tr> 	
 	
 	<?php
			
if (count ( $match->matchResults ) > 0) {
				foreach ( $match->matchResults as $result ) {
					?>
 	
 	
 		<tr>
			<td><p class="text-center"><?php echo $result->cAT_RESULT->NAME?></p></td>
			<td style="text-align: center;">
 			<?php
					
					// echo ($result->TOTAL_LOCAL > $result->TOTAL_VISITOR)? '<p class="text-success">'.$result->TOTAL_LOCAL.'</p>' : $result->TOTAL_LOCAL
					
					if ($result->TOTAL_LOCAL > $result->TOTAL_VISITOR) {
						
						echo "<strong>$result->TOTAL_LOCAL<strong>";
						
						/*
						 * $this->widget('bootstrap.widgets.TbBadge', array( 'type'=>'success', // 'success', 'warning', 'important', 'info' or 'inverse' 'label'=>$result->TOTAL_LOCAL, ));
						 */
					} else if ($result->TOTAL_LOCAL == $result->TOTAL_VISITOR) {
						
						echo $result->TOTAL_LOCAL;
						/*
						 * $this->widget('bootstrap.widgets.TbBadge', array( 'type'=>'info', // 'success', 'warning', 'important', 'info' or 'inverse' 'label'=>$result->TOTAL_LOCAL, ));
						 */
					} else {
						
						echo $result->TOTAL_LOCAL;
						/*
						 * $this->widget('bootstrap.widgets.TbBadge', array( 'type'=>'important', // 'success', 'warning', 'important', 'info' or 'inverse' 'label'=>$result->TOTAL_LOCAL, ));
						 */
					}
					
					?>
 			
 			</td>
			<td style="text-align: center;">
 			<?php
					
					// echo ($result->TOTAL_VISITOR > $result->TOTAL_LOCAL)? '<p class="text-success">'.$result->TOTAL_VISITOR.'</p>' : $result->TOTAL_VISITOR
					
					if ($result->TOTAL_VISITOR > $result->TOTAL_LOCAL) {
						
						echo '<p class="text-center"><strong>' . $result->TOTAL_VISITOR . '<strong></p>';
						
						/*
						 * $this->widget('bootstrap.widgets.TbBadge', array( 'type'=>'success', // 'success', 'warning', 'important', 'info' or 'inverse' 'label'=>$result->TOTAL_VISITOR, ));
						 */
					} else if ($result->TOTAL_VISITOR == $result->TOTAL_LOCAL) {
						
						/*
						 * $this->widget('bootstrap.widgets.TbBadge', array( 'type'=>'info', // 'success', 'warning', 'important', 'info' or 'inverse' 'label'=>$result->TOTAL_VISITOR, ));
						 */
						echo $result->TOTAL_VISITOR;
					} else {
						
						/*
						 * $this->widget('bootstrap.widgets.TbBadge', array( 'type'=>'important', // 'success', 'warning', 'important', 'info' or 'inverse' 'label'=>$result->TOTAL_VISITOR, ));
						 */
						echo $result->TOTAL_VISITOR;
					}
					
					?></td>
			<td><p class="muted"><?php echo $result->COMMENT?></p></td>
		</tr>
 		
 		
 	<?php }}elseif($match->STATUS > 2){ ?>
 		
 		<tr class="warning">
			<td colspan="4">No se han asignado resultados para este partido</td>
		</tr>

 		<?php }else{?>	

 		
 		<tr class="active">
			<td colspan="4">&nbsp;</td>
		</tr>
 		
 	
 
 				<?php } 
				}//for?>
 	
 	</tbody>

</table>

<?php }?>

<?php $this->endWidget(); ?>



<?php //echo $this->renderPartial('_matchForm', array('model'=>$model,'matchGames'=>$matchGames,'playGround'=>$playGround)); ?>



