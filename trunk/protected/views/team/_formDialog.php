<?php $this->widget('zii.widgets.grid.CGridView', array(
		'id'=>'player-grid',
		'dataProvider'=>$model,
		'filter'=>$player,
		'columns'=>array(
		'ID',
		'NAME',
		'BIRTH',
		//'PHONE',
		//'EMAIL',
		//'ADDRESS',
		/*
		 'FACE_BOOK',
'TWITER',
'GENDER',
'ACTIVE',
*/
				array(
			'class'=>'CButtonColumn',
		'template'=>'{agregar}',
						'buttons'=>array
(
		'agregar' => array
		(
				'label'=>'agregar',
				'imageUrl'=>Yii::app()->request->baseUrl.'/images/ok.png',
				'url'=>'Yii::app()->createUrl("team/addPlayerTeam",array("idTeam"=>'.$modelTeam->ID.',"idPlayer"=>$data->ID))',
		),
		
),
		),
	),
)); ?>
