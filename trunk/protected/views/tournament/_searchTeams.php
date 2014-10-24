<?php $this->widget('bootstrap.widgets.TbGridView', array(
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
				'title'=>'"$data->ID"',
				'label'=>'agregar',
				'options'=>array('title'=>'"$data->ID"', 'id'=>'"$row"', 'class'=>'btn btn-primary', 'data-toggle'=>'button', 'data-loading-text'=>"Loading..."),
				//'imageUrl'=>Yii::app()->request->baseUrl.'/images/ok.png',
				'url'=>'Yii::app()->createUrl("tournament/addTeamTournament",array("tournamentId"=>'.$tournament->ID.',"teamId"=>$data->ID))',
				'click'=>'function(e) {var $this=$(this); $this.button("loading");}',
		),
		
),
		),
	),
)); ?>
