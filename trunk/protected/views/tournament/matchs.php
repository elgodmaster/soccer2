	<?php
$this->breadcrumbs=array(
	'Tournaments'=>array('index'),
	$model->NAME=>array('manage','id'=>$model->ID),
	'JORNADAS'
);
$this->menu=array(
	array('label'=>'Lista torneo', 'url'=>array('index')),
	//array('label'=>'Gestionar torneo', 'url'=>array('admin')),
);
?>
<h1> <?php echo $model->NAME; ?></h1>
<h2>Jornadas</h2>

<br />

<?php /** @var TbActiveForm $form */
$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id'=>'horizontalForm',
    'type'=>'horizontal',
)); ?>
 
<?php $this->widget('bootstrap.widgets.TbAlert', array(
		'block'=>false, // display a larger alert block?
		'fade'=>true, // use transitions?
		'closeText'=>'&times;', // close link text - if set to false, no close link is displayed
));

?>

 
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
    'type'=>'pills', // '', 'tabs', 'pills' (or 'list')
    'stacked'=>false, // whether this is a stacked menu
    'items'=> $menuOptions,

));

echo $this->renderPartial('_matchForm', array('model'=>$model,'matchGames'=>$matchGamesArray,'playGround'=>$playGround));
 
 
 ?>
 
 
 <?php }?>

<?php $this->endWidget(); ?>



<?php //echo $this->renderPartial('_matchForm', array('model'=>$model,'matchGames'=>$matchGames,'playGround'=>$playGround)); ?>
