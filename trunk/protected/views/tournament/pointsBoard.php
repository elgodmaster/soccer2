	<?php
$this->breadcrumbs=array(
	'Tournaments'=>array('index'),
	$model->NAME=>array('manage','id'=>$model->ID),
	'Estadisticas'
);
$this->menu=array(
	//array('label'=>'Lista torneo', 'url'=>array('index')),
    array('label'=>'Inicio', 'url'=>array('manage','id'=>$model->ID)),
	//array('label'=>'gestinar torneo', 'url'=>array('admin')),
);
?>
<h1>Torneo <small><?php echo $model->NAME;?></small></h1>
<legend>Tabla de posiciones</legend>
 
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
		<th>EQUIPO</th>
		<th>PUNTOS</th>
		<th>JJ</th> 	
		<th>JG</th>
		<th>JE</th>
		<th>JP</th>		
 	</tr>
 </thead>
 
 <tbody>
 	<?php $i=0; foreach ($board as $reg){//foreach ($model->teams as $team){ ?>
 		
		<tr>
			<td><?php echo $i+1;?></td>
			<td><?php echo $reg['NAME'];?></td>
			<td><strong><?php echo $reg['POINTS'];?></strong></td>
			<td><?php echo $reg['JJ'];?></td>
			<td><?php echo $reg['JG'];?></td>
			<td><?php echo $reg['JE'];?></td>
			<td><?php echo $reg['JP'];?></td>
		
		</tr> 	
 	
 	<?php $i++; }?>
 </tbody>
 
 </table>
 
 
 
 
 <?php
 				

 ?>
 
 
 
 <div class="form-actions">
    <?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'submit', 'type'=>'info', 'label'=>'Listo')); ?>
</div>
 