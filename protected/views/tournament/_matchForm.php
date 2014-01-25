



	
	<?php 

	echo "<legend><h4>JORNADA ".$matchGames[0]->GROUP ."</h4></legend>";
	echo '<p class="note">Campos  con <span class="required">*</span> son Requeridos</p>';
	echo "<br />";

	?>
	
	
	<div class="view">
	
	<?php $this->widget('bootstrap.widgets.TbDetailView', array(
	'type'=>'striped bordered condensed',
    'data'=>$matchGames[0],
    'attributes'=>array(
        array('name'=>'ID', 'label'=>'ID'),
     	array('name'=>'STATUS', 'label'=>'ESTATUS', 'value'=>MatchGame::model()->aStatus[$matchGames[0]->STATUS]),
       

    ),
)); ?>
	

	
	</div>

<div class="form">

	<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
			'id'=>'verticalForm',
			'htmlOptions'=>array('class'=>'well'),
)); ?>


	
	
	
	
	
	
	<?php echo $form->errorSummary($model); ?>
	<?php echo $form->errorSummary($matchGames[0]); ?>



	<fieldset>
		<table border="0" class="table table-hover">

			<thead>
				<tr>
					<td>#</td>
					<th>LOCAL</th>
					<th>VISITANTE</th>
					<th>FECHA</th>
					<th>CANCHA</th>
					<th>ARBITRO</th>

				</tr>
				<tr>
					<td colspan="6">&nbsp;</td>
				</tr>
			</thead>
			<tbody>
				<?php 
				$readyToPublish = true;
				$switchVar = 0;
				$numeroPartidos = sizeof($matchGames);
				for($i=0; $i<$numeroPartidos; $i++) //START FOR
				{
					?>
				<tr>
					

					<?php 	

					echo '<td ><strong>P'. ($i+1). '</strong></td>';
					echo '<td  align="center" valign="top">';
					echo CHtml::image($matchGames[$i]->lOCAL->getLogo(), '', array("style"=>"width:50px;height:50px;"));
					echo "<br />";
					echo $matchGames[$i]->lOCAL->NAME;
					echo "</td>";

					

					echo '<td  align="center" valign="top">';
					echo CHtml::image($matchGames[$i]->vISITOR->getLogo(), '', array("style"=>"width:50px;height:50px;"));
					echo "<br />";
					echo $matchGames[$i]->vISITOR->NAME;
					echo $form->hiddenField($matchGames[$i],"[$i]ID",array('value'=>$matchGames[$i]->ID));
					echo $form->hiddenField($matchGames[$i],"[$i]LOCAL",array('value'=>$matchGames[$i]->lOCAL->ID));
					echo $form->hiddenField($matchGames[$i],"[$i]VISITOR",array('value'=>$matchGames[$i]->vISITOR->ID));
					echo $form->hiddenField($matchGames[$i],"[$i]TOURNAMENT_ID",array('value'=>$matchGames[$i]->TOURNAMENT_ID));
					echo $form->hiddenField($matchGames[$i],"[$i]GROUP");
					echo $form->hiddenField($matchGames[$i],"[$i]NAME", array('value'=>$i+1));
					echo "</td>";

					

					if ($matchGames[$i]->STATUS < 3) {
					
					echo "<td>";
					Yii::import('application.extensions.CJuiDateTimePicker.CJuiDateTimePicker');
						
					$this->widget('CJuiDateTimePicker',array(
							'model'=>$matchGames[$i], //Model object
							'attribute'=>"[$i]TIME", //attribute name
							'language'=>'es',
							'mode'=>'datetime', //use "time","date" or "datetime" (default)
							'options'=>array( "dateFormat"=>'yy-mm-dd', 'timeFormat'=>'hh:mm'),
						
							'htmlOptions'=>array('class'=>'input-medium',),
							));

		
				
			
					
			
/*
$this->widget('application.extensions.timepicker.BJuiDateTimePicker',array(
		'model'=>$matchGames[$i],
		'attribute'=>"[$i]TIME",
		'type'=>'datetime', // available parameter is datetime or time
		//'language'=>'de', // default to english
		//'themeName'=>'sunny', // jquery ui theme, file is under assets folder
		'options'=>array(
				// put your js options here check http://trentrichardson.com/examples/timepicker/#slider_examples for more info
				'timeFormat'=>'HH:mm:ss',
				'showSecond'=>true,
				'hourGrid'=>4,
				'minuteGrid'=>10,
		),
		'htmlOptions'=>array(
				'class'=>'input-medium'
		)
));
*/
				echo "</td>";
				
				

				echo "<td>";
				echo $form->dropDownList($matchGames[$i],"[$i]PLAY_GROUND_ID",CHtml::listData($playGround::model()->findAll(),'ID','NAME'),array('class'=>'input-medium'));
				echo "</td>";

				echo "<td>";
				echo $form->dropDownList($matchGames[$i],"[$i]ID_REFEREE",CHtml::listData(Referee::model()->findAll(),'ID','NAME'),array('class'=>'input-medium'));
				echo "</td>";
				
					}else {
						
						echo '<td valign="bottom"><input  type="text" value="'.$matchGames[$i]->TIME.'" readonly="readonly" class="input-medium" /></td>';
						echo '<td valign="baseline"><input  type="text" value="'.$matchGames[$i]->pLAYGROUND->NAME.'" readonly="readonly" class="input-medium" /></td>';
						echo '<td valign="middle"><input  type="text" value="'.$matchGames[$i]->rEFEREE->NAME.'" readonly="readonly" class="input-medium" /></td>';

					}

				if($matchGames[$i]->STATUS < 2)$readyToPublish = false;
				?>




				</tr>

				<tr>
					<td colspan="6">&nbsp;</td>
				</tr>

				<?php }//end for?> 

			</tbody>
		</table>
	</fieldset>
	<div class="form-actions">
	<?php if (!$readyToPublish)
				$this->widget('bootstrap.widgets.TbButton',array('buttonType'=>'submit','type'=>'primary','label'=>'Guardar', 'htmlOptions'=>array('name'=>'saveRound')));
			else if($matchGames[0]->STATUS < 3) 	
	 			$this->widget('bootstrap.widgets.TbButton',array('buttonType'=>'submit','type'=>'success','label'=>'Programar','htmlOptions'=>array('name'=>'publishRound'),)	);
			else if($matchGames[0]->STATUS == 3)
				$this->widget('bootstrap.widgets.TbButton', array(
								    'label'=>'Pubilcar',
								    'type'=>'primary', // null, 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
								    'size'=>'small', // null, 'large', 'small' or 'mini'
								   	'url'=>array('publish', 'id'=>$model->ID),
									));
			?>
	</div>


	<?php $this->endWidget(); ?>

</div>
<!-- form -->
