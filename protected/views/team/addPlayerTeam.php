
<?php
$this->breadcrumbs=array(
		'Teams'=>array('index'),
		$team->NAME=>array('view&id='.$team->ID),
		'Agregar Jugador',
);

$this->menu=array(
		array('label'=>'List Team', 'url'=>array('index')),
		array('label'=>'Manage Team', 'url'=>array('admin')),
		array('label'=>'Jugadores', 'url'=>array('manageTeamPlayer','id'=>$team->ID)),
);
?> 

<h1>Jugador en el equipo<?php //echo $model->NAME; ?></h1>

<?php echo $this->renderPartial('_formPlayerTeam', array('model'=>$model,'team'=>$team, 'playerTeam'=>$playerTeam)); ?>