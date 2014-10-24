<?php 
$this->beginWidget('zii.widgets.jui.CJuiDialog',array(
                'id'=>'jobDialog',
                'options'=>array(
                    'title'=>Yii::t('job','Equipos Disponibles'),
                    'autoOpen'=>true,
                    'modal'=>'true',
                    'width'=>'auto',
                    'height'=>'auto',
                ),
                ));
echo $this->renderPartial('_searchTeams', array('team'=>$team,'model'=>$model,'tournament'=>$tournament)); ?>

<?php $this->endWidget('zii.widgets.jui.CJuiDialog');?>