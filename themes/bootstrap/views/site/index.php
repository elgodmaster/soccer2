<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name;
?>

<?php $this->beginWidget('bootstrap.widgets.TbHeroUnit',array(
    'heading'=>'Liga de futbol '.CHtml::encode(Yii::app()->name),
)); ?>

<p>Administrador de torneos</p>
<br />

 
     
        <ul class="row">
            <li class="span3">
                <h2>Mi liga
                <p class="text text-info"><small>Nombre completo, dirección, Imagen, Documentos, etc... </small></p>
                </h2>
                <?php $this->widget('bootstrap.widgets.TbButton', array(
  					      'type'=>'primary',
     					   'size'=>'large',
     				   'label'=>'Configurar',
   				 )); ?>
            </li>

            <li class="span3">
                <h2>Sedes
                <p><small>Definir donde se jugaran los encuentros</small></p>
                </h2>
                <?php $this->widget('bootstrap.widgets.TbButton', array(
  					      'type'=>'primary',
     					   'size'=>'large',
     				   'label'=>'Adminitrar',
   				 )); ?>
            </li>

            <li class="span3">
                <h2>Torneos
                <p><small>Configurar mis torneos  de futbol, publicar horiarios, crear nuevo torneo, etc...</small></p>
                </h2>
                <?php $this->widget('bootstrap.widgets.TbButton', array(
  					      'type'=>'primary',
     					   'size'=>'large',
     				   'label'=>'Ver torneos',
   				 )); ?>
            </li>

            
        </ul>
    
    
   
<?php $this->endWidget(); ?>

<table class="table table-striped">

<thead>
<tr >
<th colspan="3">Empiece aquí</th>
</tr>
</thead>

<tr>
<td>TORNEOS</td>
<td>EQUIPOS</td>
<td>JUGADORES</td>
</tr>
</table>



<!--



<p>You may change the content of this page by modifying the following two files:</p>
 
<ul>
    <li>View file: <code><?php echo __FILE__; ?></code></li>
    <li>Layout file: <code><?php echo $this->getLayoutFile('main'); ?></code></li>
</ul>

 -->
<p>En el siguiente  <a href="http://www.yiiframework.com/doc/">enlace</a>.
    podras encontrar los manuales de usuario, y <a href="http://www.yiiframework.com/forum/">aqui</a>
    podras dejarnos tus dudas y/o sugerencias.</p>
