

<fieldset >

<legend>JORNADA <?php echo $nLap; ?></legend>
 <div align="center">
 
 	<table>
 	<thead>
 	<tr >
 		<td><strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</strong></td>
 		<th><ins>LOCAL</ins></th>
 		<th><strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</strong></th>
 		<th><ins>VISITANTE</ins></th>
 	</tr>
 	<tr><td colspan="4">&nbsp;</td></tr>
 	</thead>
 	
 	<tbody>
 	<?php $p = 0; $i=$index; foreach ($matchs as $match){ ?>
 	
		<tr height="100px">
		
		
		<?php 	
		
				
				echo '<td>p'.$match->NAME.'</td>';
				echo '<td width="150px" align="center" valign="top">';
				echo CHtml::image($match->lOCAL->getLogo(), '', array("style"=>"width:50px;height:50px;"));
				echo "<br />";				
				echo $match->lOCAL->NAME;
				echo "</td>";
				
				echo "<td align=\"center\">";
				echo '<b>Vs</b>';
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
				<th colspan="4"></th>
			
			</tr>
			
		</tfoot>
		</table>
 
 </div>
</fieldset>
