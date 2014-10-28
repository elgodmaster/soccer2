<?php /* @var $this Controller */ ?>
<?php $this->beginContent('//layouts/main'); ?>
<div class="row-fluid">
    <div class="span10">
       
            <?php echo $content; ?>
       
    </div>
    <div class="span2">
        <div id="sidebar">
        <?php
            $this->beginWidget('zii.widgets.CPortlet', array(
                'title'=>'Operaciones',
            ));
            $this->widget('bootstrap.widgets.TbMenu', array(
                'items'=>$this->menu,
                'htmlOptions'=>array('class'=>'nav nav-pills nav-stacked'),
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
        
        <div id="sidebar">
        <?php
            $this->beginWidget('zii.widgets.CPortlet', array(
                'title'=>'Notificaciones',
            ));
         $this->widget('bootstrap.widgets.TbMenu', array(
                'items' =>$this->notifications, /* array(
                    array(
                        'label' => '<i class="icon-user"></i><span class="username">Admin</span> <i class="icon-angle-down"></i>',
                        'url' => '#',
                        'linkOptions'=> array(
                            'class' => 'btn',
                            'data-toggle' => 'dropdown',
                            ),
                        'itemOptions' => array('class'=>'dropdown user'),
                        
                    ),
                ),*/
                'encodeLabel' => false,
                'htmlOptions' => array(
                    'class'=>'nav nav-pills nav-stacked',
                        ),
                
            ));
            $this->endWidget();
        ?>
        </div>
        
        <!-- sidebar -->
    </div>
</div>
<?php $this->endContent(); ?>