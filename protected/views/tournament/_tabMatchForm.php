

<fieldset>

<legend>JORNADA <?php echo $nLap; ?></legend>
 
 	<table border="1">
 	<thead>
 	<tr>
 		<td>N.partido</td>
 		<th>Local</th>
 		<th></th>
 		<th>Visitante</th>
 	</tr>
 	</thead>
 	
 	<tbody>
 	<?php $p = 0; $i=$index; foreach ($matchs as $match){ ?>
 	
		<tr height="100px">
		
		
		<?php 	
		
				
				echo '<td><strong>P'.++$p.'</strong></td>';
				echo '<td width="150px" align="center" valign="top">';
				echo CHtml::image($match->lOCAL->getLogo(), '', array("style"=>"width:50px;height:50px;"));
				echo "<br />";				
				echo $match->lOCAL->NAME;
				echo "</td>";
				
				echo "<td>";
				echo 'Vs';
				echo "</td>";
				
				echo '<td width="150px" align="center" valign="top">';
				echo CHtml::image($match->vISITOR->getLogo(), '', array("style"=>"width:50px;height:50px;"));
				echo "<br />";
				echo $match->vISITOR->NAME;
				echo "</td>";
				
				echo "<td>";
				echo $form->hiddenField($match,"[$i]ID",array('value'=>$match->ID));
				echo $form->hiddenField($match,"[$i]LOCAL",array('value'=>$match->lOCAL->ID));
				echo $form->hiddenField($match,"[$i]VISITOR",array('value'=>$match->vISITOR->ID));
				echo $form->hiddenField($match,"[$i]TOURNAMENT_ID",array('value'=>$match->TOURNAMENT_ID));
				echo $form->hiddenField($match,"[$i]GROUP");
				echo $form->hiddenField($match,"[$i]NAME", array('value'=>$i+1));
				echo "</td>";
				
			/*	echo "<td> Fecha <br />";
					Yii::import('application.extensions.CJuiDateTimePicker.CJuiDateTimePicker');
					
					$this->widget('CJuiDateTimePicker',array(
							'model'=>$match, //Model object
							'attribute'=>"[$i]TIME", //attribute name
							'mode'=>'datetime', //use "time","date" or "datetime" (default)
							'options'=>array()));
// 				echo "</td>";*/
				
				//echo "<td> Cancha <br />";
					//echo $form->dropDownList($match,"[$i]PLAY_GROUND_ID",CHtml::listData(PlayGround::model()->findAll(),'ID','NAME'));
			//	echo "</td>";
				$i++;
			
		?>
		
		
	
		
		</tr>
		
		<?php }?>
		</tbody>
		
		<tfoot>
			<tr>
				<td colspan="4">Generar reporte</td>
			
			</tr>
			
		</tfoot>
		</table>
 
 
</fieldset>
