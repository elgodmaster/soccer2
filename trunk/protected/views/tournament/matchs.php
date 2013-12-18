	<?php
$this->breadcrumbs=array(
	'Tournaments'=>array('index'),
	$model->NAME=>array('manage','id'=>$model->ID),
	'JORNADAS'
);
$this->menu=array(
	array('label'=>'List Tournament', 'url'=>array('index')),
	array('label'=>'Manage Tournament', 'url'=>array('admin')),
);
?>

<h1>Jornadas</h1>

<br />
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
 
 <?php } elseif ($model->STATUS>3){
 
 	$menuOptions = array();
 	
 	$matchGames = array();
 	
 	
 	$currentRound = 1;
 	
 	$switchVar = 0;
 	
 	foreach ($model->matchGames as $matchGame){
 		
		if($switchVar != $matchGame->GROUP){
			
				$switchVar = $matchGame->GROUP;
				$menuOptions[] =  array('label'=>'J'.$switchVar, 'url'=>array('manageMatchs', 'id'=>$model->ID,'roundId'=>$switchVar), 'active'=> ($roundId==$switchVar));
		}

		
		if($roundId == $matchGame->GROUP){
			
			$matchGames[] = $matchGame; 

		}

 	}
 	
 	
 	?>
 
 
   
 <?php $this->widget('bootstrap.widgets.TbMenu', array(
    'type'=>'pills', // '', 'tabs', 'pills' (or 'list')
    'stacked'=>false, // whether this is a stacked menu
    'items'=> $menuOptions
    ,
));

echo $this->renderPartial('_matchForm', array('model'=>$model,'matchGames'=>$matchGames,'playGround'=>$playGround));
 
 
 ?>
 
 
 <?php }?>
<div class="form-actions">
    <?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'submit', 'type'=>'info', 'label'=>'Listo')); ?>
</div>
 
<?php $this->endWidget(); ?>



<?php //echo $this->renderPartial('_matchForm', array('model'=>$model,'matchGames'=>$matchGames,'playGround'=>$playGround)); ?>
