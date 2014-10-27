
<?php
$this->breadcrumbs=array(
		'Teams'=>array('index'),
		$team->NAME=>array('view&id='.$team->ID),
		'Agregar Jugador',
);

$this->menu=array(
		array('label'=>'Lista equipo', 'url'=>array('index')),
		array('label'=>'Administrar equipo', 'url'=>array('admin')),
		array('label'=>'Jugadores', 'url'=>array('manageTeamPlayer','id'=>$team->ID)),
);
?> 

<h1>Jugador del equipo<?php //echo $model->NAME; ?></h1>

<?php echo $this->renderPartial('_formPlayerTeam', array('model'=>$model,'team'=>$team, 'playerTeam'=>$playerTeam)); ?>