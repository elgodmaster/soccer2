<?php 
$this->beginWidget('zii.widgets.jui.CJuiDialog',array(
                'id'=>'jobDialog',
                'options'=>array(
                    'title'=>Yii::t('job','Agregar un jugador al Equipo'),
                    'autoOpen'=>true,
                    'modal'=>'true',
                    'width'=>'auto',
                    'height'=>'auto',
                ),
                ));
echo $this->renderPartial('_formDialog', array('player'=>$player,'model'=>$model,'modelTeam'=>$modelTeam)); ?>
<?php $this->endWidget('zii.widgets.jui.CJuiDialog');?>