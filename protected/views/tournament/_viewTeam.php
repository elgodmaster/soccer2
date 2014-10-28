
<div class="span3">
<?php 
echo CHtml::image($model->iDTEAM->getLogo(),"",array("style"=>"width:90px;height:90px;", "class"=>"img-polaroid"));
?>
</div>

<div class="span9">
<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model->iDTEAM,
	'attributes'=>array(
		'ID',
		'NAME',
		'ID_CATEGORY',
		'ADDRESS',
		'DESCRIPTION',
		'CONTACT_PHONE',
		'EMAIL',
		'CREATION_DATE',
		//'ACTIVE',
	),
)); ?>
</div>