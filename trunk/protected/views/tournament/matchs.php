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
 
<?php $this->widget('bootstrap.widgets.TbTabs', array(
    'tabs'=>$this->getTabularFormTabs($form, $model, $matchGames),
	'placement'=>'top',
)); ?>
 
<div class="form-actions">
    <?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'submit', 'type'=>'primary', 'label'=>'Submit')); ?>
    <?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'reset', 'label'=>'Reset')); ?>
</div>
 
<?php $this->endWidget(); ?>



<?php //echo $this->renderPartial('_matchForm', array('model'=>$model,'matchGames'=>$matchGames,'playGround'=>$playGround)); ?>
