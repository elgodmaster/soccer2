	<?php
$this->breadcrumbs=array(
	'Tournaments'=>array('index'),
	$model->NAME=>array('manage','id'=>$model->ID),
	'JORNADAS'
);
$this->menu=array(
		
	array('label'=>'Inicio', 'url'=>array('manage','id'=>$model->ID)),
	//array('label'=>'Lista torneo', 'url'=>array('index')),
	//array('label'=>'Gestionar torneo', 'url'=>array('admin')),
);
?>
<h1>Horarios <small> <?php echo $model->NAME; ?> </small></h1>


<?php /** @var TbActiveForm $form */
$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id'=>'horizontalForm',
    'type'=>'horizontal',
)); ?>
 


 
 <?php if ($model->STATUS<4) {?>
 
<?php $this->widget('bootstrap.widgets.TbTabs', array(
    'tabs'=>$this->getTabularFormTabs($form, $model, $matchGames),
	'placement'=>'top',
)); ?>
 
 <div class="form-actions">
    <?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'link','url'=>array('manage','id'=>$model->ID) , 'type'=>'info', 'label'=>'Listo')); ?>
</div>
 
 
 
 <?php } elseif ($model->STATUS>3){
 
 	$menuOptions = array();
 	
 	$matchGamesArray = array();
 	
 	
 	$currentRound = 1;
 	
 	$switchVar = 0;
 	
 	
 	
 	foreach ($matchGames as $matchGame){
 		
		if($switchVar != $matchGame->GROUP){
			
				$switchVar = $matchGame->GROUP;
				
				$menuOptions[] =  array('label'=>($matchGame->TYPE == 1)?'J'.$switchVar : $matchGame->getTypeDescription(), 'url'=>array('manageMatchs', 'id'=>$model->ID,'roundId'=>$switchVar), 'active'=> ($roundId==$switchVar));
		}

		
		if($roundId == $matchGame->GROUP){
			
			$matchGamesArray[] = $matchGame; 

		}

 	}
 	
 	
 	?>
 
 
   
 <?php $this->widget('bootstrap.widgets.TbMenu', array(
    'type'=>'tabs', // '', 'tabs', 'pills' (or 'list')
    'stacked'=>false, // whether this is a stacked menu
    'items'=> $menuOptions,

));

echo $this->renderPartial('_matchForm', array('model'=>$model,'matchGames'=>$matchGamesArray));
 
 
 ?>
 
 
 <?php }?>

<?php $this->endWidget(); ?>



<?php //echo $this->renderPartial('_matchForm', array('model'=>$model,'matchGames'=>$matchGames,'playGround'=>$playGround)); ?>
