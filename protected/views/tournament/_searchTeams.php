<?php $this->widget('zii.widgets.grid.CGridView', array(
		'id'=>'player-grid',
		'dataProvider'=>$model,
		'filter'=>$team,
		'columns'=>array(
		'ID',
		'NAME',
	
				array(
			'class'=>'CButtonColumn',
		'template'=>'{agregar}',
						'buttons'=>array
(
		'agregar' => array
		(
				'label'=>'agregar',
				'imageUrl'=>Yii::app()->request->baseUrl.'/images/ok.png',
				'url'=>'Yii::app()->createUrl("tournament/addTeamTournament",array("tournamentId"=>'.$tournament->ID.',"teamId"=>$data->ID))',
		),
		
),
		),
	),
)); ?>
