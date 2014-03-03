<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name;
?>

<?php $this->beginWidget('bootstrap.widgets.TbHeroUnit',array(
    'heading'=>'Bienvenido a '.CHtml::encode(Yii::app()->name),
)); ?>

<p>Gestione sus torneos de futbol de manera facil y rapida.</p>
<br />

 <div class="container">
     
        <ul class="row">
            <li class="span3">
                <p><strong>Planee</strong></p>
                <p>Jornadas &amp; Horarios</p>
                <p>Notifique el rol de juegos</p>
            </li>

            <li class="span3">
                <p><strong>Estructure</strong></p>
                <p>Equipos y Jugadores.</p>
            </li>

            <li class="span3">
                <p><strong>Colabore</strong></p>
                <p>Colabore en equipo para evaluar jornadas, planear torneos  &amp; registrar resultados.</p>
            </li>

            
        </ul>
    </div>
    
    <p><?php $this->widget('bootstrap.widgets.TbButton', array(
        'type'=>'primary',
        'size'=>'large',
        'label'=>'Registrar torneo!',
    )); ?></p>
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
