	<?php
$this->breadcrumbs=array(
	'Tournaments'=>array('index'),
	$model->NAME=>array('manage','id'=>$model->ID),
	'Estadisticas'
);
$this->menu=array(
	array('label'=>'List Tournament', 'url'=>array('index')),
	array('label'=>'Manage Tournament', 'url'=>array('admin')),
);
?>

<h3>Tabla de pocisiones</h3>

<br />
 
 <?php $this->widget('bootstrap.widgets.TbAlert', array(
        'block'=>false, // display a larger alert block?
        'fade'=>true, // use transitions?
        'closeText'=>'&times;', // close link text - if set to false, no close link is displayed
        )); 

?>

 <table class="table table-bordered">
 <thead>
 	<tr>
		<th>#</th>
		<th>Equipo</th>
		<th>Puntos</th>
		<th>JJ</th> 	
		<th>JG</th>
		<th>JE</th>
		<th>JP</th>		
 	</tr>
 </thead>
 
 <tbody>
 	<?php $i=0; foreach ($model->teams as $team){ ?>
 		
		<tr>
			<td><?php echo $i+1;?></td>
			<td><?php echo $team->iDTEAM->NAME;?></td>
			<td><?php echo $board[$team->ID_TEAM]['POINTS'];?></td>
			<td><?php echo $board[$team->ID_TEAM]['JJ'];?></td>
			<td><?php echo $board[$team->ID_TEAM]['JG'];?></td>
			<td><?php echo $board[$team->ID_TEAM]['JE'];?></td>
			<td><?php echo $board[$team->ID_TEAM]['JP'];?></td>
		
		</tr> 	
 	
 	<?php $i++; }?>
 </tbody>
 
 </table>
 
 
 <?php
 				

 ?>
 
 
 
 <div class="form-actions">
    <?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'submit', 'type'=>'info', 'label'=>'Listo')); ?>
</div>
 