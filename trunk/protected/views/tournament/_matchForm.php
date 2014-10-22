
<?php 

//echo "<legend><h4>JORNADA ".$matchGames[0]->GROUP ."</h4></legend>";

?>

<?php $this->widget('bootstrap.widgets.TbAlert', array(
		'block'=>false, // display a larger alert block?
		'fade'=>true, // use transitions?
		'closeText'=>'&times;', // close link text - if set to false, no close link is displayed
));

?>
<p class="muted">
	Los campos con: <span class="required">*</span> son requeridos.
</p>
<div class="view">

	<?php $this->widget('bootstrap.widgets.TbDetailView', array(
			'type'=>'striped bordered condensed',
			'data'=>$matchGames[0],
			'attributes'=>array(      
     	array('name'=>'STATUS', 'label'=>'ESTATUS', 'value'=>MatchGame::model()->aStatus[$matchGames[0]->STATUS]),
		array('name'=>'START', 'label'=>'Inicio torneo', 'value'=>$model->START_DATE),


    ),
)); 

	
	
	?>

</div>




	<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
			'id'=>'verticalForm',
			'htmlOptions'=>array(),
)); ?>



	<fieldset>
		<table class="table table-hover">

			<thead>
				<tr>
					<th>PARTIDO</th>
					<th>LOCAL</th>
					<th>VISITANTE</th>
					<th>FECHA</th>
					<th>CANCHA</th>
					<th>ÁRBITRO</th>

				</tr>
				</thead>
			<tbody>
				<?php 
				$readyToPublish = true;
				$switchVar = 0;
				$numeroPartidos = sizeof($matchGames);
				$aDays = explode(",", $model->SCHEDULE_D);
				$stringADays = '';
				$i = 0;
				$model->START_DATE = date("d/m/Y",strtotime($model->START_DATE ));
				
				if(strlen($model->SCHEDULE_D) && ($numItems = count($aDays)) > 0) // incluir expresion regular para validar formato
									
				foreach ($aDays as $day){
					
					if(++$i === $numItems) {
							$stringADays = $stringADays. 'day=='.$day;
					}else 	$stringADays = $stringADays. 'day=='.$day.' ||';
				}
				
				else $stringADays = 'true';
				
				
				for($i=0; $i<$numeroPartidos; $i++) //START FOR
				{
					
					if(count($matchGames[$i]->getErrors()))
						$matchGames[$i]->STATUS = 1; 

						
					
					?>
					
				<tr>


					<?php 	

					echo '<td >'. ($i+1). '</td>';
					echo '<td>';
					
					echo CHtml::image($matchGames[$i]->lOCAL->getLogo(), '', array("style"=>"width:50px;height:50px;", "class"=>"img-polaroid"));
					echo "<br />";
					echo $matchGames[$i]->lOCAL->NAME;
					
					echo "</td>";



					echo '<td>';
					echo '<p class="text-center">';
					echo CHtml::image($matchGames[$i]->vISITOR->getLogo(), '', array("style"=>"width:50px;height:50px;","class"=>"img-polaroid"));
					echo "<br />";
					echo $matchGames[$i]->vISITOR->NAME;
					echo $form->hiddenField($matchGames[$i],"[$i]ID",array('value'=>$matchGames[$i]->ID));
					echo $form->hiddenField($matchGames[$i],"[$i]LOCAL",array('value'=>$matchGames[$i]->lOCAL->ID));
					echo $form->hiddenField($matchGames[$i],"[$i]VISITOR",array('value'=>$matchGames[$i]->vISITOR->ID));
					echo $form->hiddenField($matchGames[$i],"[$i]TOURNAMENT_ID",array('value'=>$matchGames[$i]->TOURNAMENT_ID));
					echo $form->hiddenField($matchGames[$i],"[$i]GROUP");
					echo $form->hiddenField($matchGames[$i],"[$i]NAME", array('value'=>$i+1));
					echo "</p>";
					echo "</td>";



					if ($matchGames[$i]->STATUS < 3) {
							
						echo "<td>";
						Yii::import('application.extensions.CJuiDateTimePicker.CJuiDateTimePicker');
						$matchGames[$i]->TIME = ($matchGames[$i]->TIME == NULL)? NULL : date("d/m/Y H:i:s",strtotime($matchGames[$i]->TIME ));
						
						
						$this->widget('CJuiDateTimePicker',array(
								'model'=>$matchGames[$i], //Model object
								'attribute'=>"[$i]TIME", //attribute name
								'language'=>'es',
								'mode'=>'datetime', //use "time","date" or "datetime" (default)
								'options'=>array( "dateFormat"=>'dd/mm/yy', 
										'timeFormat'=>'hh:mm',
										'minDate'=>$model->START_DATE,
										'beforeShowDay'=> 'js:function(date){
                                          var day = date.getDay();
                                          return ['.$stringADays.', ""];
                                        }',
											),

								'htmlOptions'=>array('class'=>'input-medium','placeholder'=>"Fecha del encuentro"),
						));

			
						echo "</td>";



						echo "<td>";
						echo $form->dropDownList($matchGames[$i],"[$i]PLAY_GROUND_ID",CHtml::listData(PlayGround::model()->findAll(),'ID','NAME'),array('prompt'=>'SELECCIONE',));
						echo "</td>";

						echo "<td>";
						echo $form->dropDownList($matchGames[$i],"[$i]ID_REFEREE",CHtml::listData(Referee::model()->findAll(),'ID','NAME'),array('class'=>'input-medium', 'prompt'=>'SELECCIONE'));
						echo "</td>";

					}else {

						echo '<td valign="bottom"><input  type="text" value="'.$matchGames[$i]->TIME.'" readonly="readonly" class="input-medium" /></td>';
						echo '<td valign="baseline"><input  type="text" value="'.$matchGames[$i]->pLAYGROUND->NAME.'" readonly="readonly" class="input-medium" /></td>';
						echo '<td valign="middle"><input  type="text" value="'.$matchGames[$i]->rEFEREE->NAME.'" readonly="readonly" class="input-medium" /></td>';

					}

					if($matchGames[$i]->STATUS < 2)$readyToPublish = false;
					?>




				</tr>

				<?php }//end for?>

			</tbody>
		</table>
	</fieldset>
	




<!-- form -->	
	
	<div class="form-actions">
		<?php if (!$readyToPublish)
			$this->widget('bootstrap.widgets.TbButton',array('buttonType'=>'submit','type'=>'primary','label'=>'Guardar', 'htmlOptions'=>array('name'=>'saveRound')));
		else if($matchGames[0]->STATUS < 3){
			$this->widget('bootstrap.widgets.TbButton',array('buttonType'=>'submit','type'=>'primary','label'=>'Guardar', 'htmlOptions'=>array('name'=>'saveRound')));
			echo "&nbsp; &nbsp; &nbsp;";
			$this->widget('bootstrap.widgets.TbButton',array('buttonType'=>'submit','type'=>'success','label'=>'Programar','htmlOptions'=>array('name'=>'publishRound'),)	);
			}
		else if($matchGames[0]->STATUS == 3){
			$this->widget('bootstrap.widgets.TbButton', array(
					'label'=>'Publicar',
					'type'=>'info', // null, 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
					'size'=>'small', // null, 'large', 'small' or 'mini'
					'url'=>array('publish', 'id'=>$model->ID),
			));
	
	?>
	<br />
	
<?php 
	
	$this->widget('ext.yii-facebook-opengraph.plugins.comments', array(
			'href' => array('manageMatchs','id'=>$model->ID),//'https://www.facebook.com/pages/Soccer2/591424987617604', // if omitted Facebook will use the OG meta tag
			//'show_faces'=>true,
		//	'send' => true,
	));

}
?>
	
	</div>

	<?php $this->endWidget(); ?>


