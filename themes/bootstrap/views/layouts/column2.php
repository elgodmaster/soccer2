<?php /* @var $this Controller */ ?>
<?php $this->beginContent('//layouts/main'); ?>
<div class="row-fluid">
    <div class="span9">
       
            <?php echo $content; ?>
       
    </div>
    <div class="span3">
        <div id="sidebar">
        <?php
            $this->beginWidget('zii.widgets.CPortlet', array(
                'title'=>'Operations',
            ));
            $this->widget('bootstrap.widgets.TbMenu', array(
                'items'=>$this->menu,
                'htmlOptions'=>array('class'=>'operations'),
            ));
            $this->endWidget();
        ?>
        </div>
        
        <div id="sidebar">
        <?php $this->widget('bootstrap.widgets.TbAlert', array(
		'block'=>false, // display a larger alert block?
		'fade'=>true, // use transitions?
		'closeText'=>'&times;', // close link text - if set to false, no close link is displayed
			)); ?>
			
		</div>	
        
        <!-- sidebar -->
    </div>
</div>
<?php $this->endContent(); ?>