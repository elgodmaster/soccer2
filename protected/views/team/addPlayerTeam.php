
<?php
$this->breadcrumbs=array(
		'Teams'=>array('index'),
		$team->NAME=>array('view&id='.$team->ID),
		'Agregar Jugador',
);

$this->menu=array(
		array('label'=>'Lista equipo', 'url'=>array('index')),
		array('label'=>'Gestionar equipo', 'url'=>array('admin')),
		array('label'=>'Jugadores', 'url'=>array('manageTeamPlayer','id'=>$team->ID)),
);
?> 

<h2>Jugador en el equipo<?php //echo $model->NAME; ?></h2>

<?php echo $this->renderPartial('_formPlayerTeam', array('model'=>$model,'team'=>$team, 'playerTeam'=>$playerTeam)); ?>