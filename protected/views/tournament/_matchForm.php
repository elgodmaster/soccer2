<div class="form">

<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	'id'=>'verticalForm',
	'htmlOptions'=>array('class'=>'well'),
)); ?>


<?php 
		
		echo "<legend><h4>JORNADA ".$matchGames[0]->GROUP ."</h4></legend>";
		echo '<p class="note">Campos  con <span class="required">*</span> son Requeridos</p>';
		echo "<br /><br />";
		
?>

	<?php echo $form->errorSummary($model); ?>
	
	
	
	<fieldset>
		<table border="1">

		<thead>
 	<tr >
 		<td><strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</strong></td>
 		<th><ins>LOCAL</ins></th>
 		<th><strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</strong></th>
 		<th><ins>VISITANTE</ins></th>
		<th></th>
		<th>FECHA</th>
		<th>CANCHA</th>
		 		
 	</tr>
 	<tr><td colspan="7">&nbsp;</td></tr>
 	</thead>
	<tbody>	
	<?php 
	
	$switchVar = 0;
	$numeroPartidos = sizeof($matchGames);
	for($i=0; $i<$numeroPartidos; $i++) //START FOR
	{
		?>
		<tr>
		
		
		<?php 	
		
				echo '<td><strong>P'. ($i+1). '</strong></td>';
				echo '<td width="150px" align="center" valign="top">';
				echo CHtml::image($matchGames[$i]->lOCAL->getLogo(), '', array("style"=>"width:50px;height:50px;"));
				echo "<br />";				
				echo $matchGames[$i]->lOCAL->NAME;
				echo "</td>";
				
				echo "<td>";
				echo 'Vs';
				echo "</td>";
				
				echo '<td width="150px" align="center" valign="top">';
				echo CHtml::image($matchGames[$i]->vISITOR->getLogo(), '', array("style"=>"width:50px;height:50px;"));
				echo "<br />";
				echo $matchGames[$i]->vISITOR->NAME;
				echo "</td>";
				
				echo "<td>";
				echo $form->hiddenField($matchGames[$i],"[$i]ID",array('value'=>$matchGames[$i]->ID));
				echo $form->hiddenField($matchGames[$i],"[$i]LOCAL",array('value'=>$matchGames[$i]->lOCAL->ID));
				echo $form->hiddenField($matchGames[$i],"[$i]VISITOR",array('value'=>$matchGames[$i]->vISITOR->ID));
				echo $form->hiddenField($matchGames[$i],"[$i]TOURNAMENT_ID",array('value'=>$matchGames[$i]->TOURNAMENT_ID));
				echo $form->hiddenField($matchGames[$i],"[$i]GROUP");
				echo $form->hiddenField($matchGames[$i],"[$i]NAME", array('value'=>$i+1));
				echo "</td>";
				
				echo "<td>";
					Yii::import('application.extensions.CJuiDateTimePicker.CJuiDateTimePicker');
					
					$this->widget('CJuiDateTimePicker',array(
							'model'=>$matchGames[$i], //Model object
							'attribute'=>"[$i]TIME", //attribute name
							'mode'=>'datetime', //use "time","date" or "datetime" (default)
							'options'=>array('size'=>'20'),
							'htmlOptions'=>array('size'=>'20')
							));
				echo "</td>";
				
				echo "<td>";
					echo $form->dropDownList($matchGames[$i],"[$i]PLAY_GROUND_ID",CHtml::listData($playGround::model()->findAll(),'ID','NAME'),array('size'=>'3'));
				echo "</td>";
		?>
		
		
	
		
		</tr>

		<tr><td colspan="7">&nbsp;</td></tr>
	
	<?php }?>
	
			</tbody>
			</table>
		</fieldset>
	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton',array('buttonType'=>'submit','type'=>'primary','label'=>$model->isNewRecord?'Create':'Guardar'));?>
		
	</div>
	

<?php $this->endWidget(); ?>

</div><!-- form -->