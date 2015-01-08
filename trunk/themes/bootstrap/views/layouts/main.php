<?php /* @var $this Controller */ ?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="es" lang="es">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="en" />

    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/styles.css" />

	<title><?php echo CHtml::encode($this->pageTitle); ?></title>

	<?php Yii::app()->bootstrap->register(); ?>
</head>

<body>

<?php 

$torneos = Tournament::model()->findAllByAttributes(array('ACTIVE'=>1));
$items = array();

foreach ($torneos as $torneo){

$items[] = array('label'=>$torneo->NAME, 'url'=>array('tournament/manage','id'=>$torneo->ID));

}



?>

<?php $this->widget('bootstrap.widgets.TbNavbar',array(
    'items'=>array(

array(
		'class'=>'bootstrap.widgets.TbMenu',
		
		'items'=>array(

				array('label'=>'Menu', 'url'=>'#', 'items'=>array(
						array('label'=>'Catalogos'),
						array('label'=>'Torneos', 'url'=>array('tournament/admin'),
								//'items'=>array(	array('label'=>'Administrar', 'url'=>array('tournament/admin')),
								//		array('label'=>'Nuevo', 'url'=>array('tournament/create'))),

						),
						array('label'=>'Equipos', 'url'=>array('team/admin')),
						array('label'=>'Jugadores', 'url'=>array('player/admin')),
						array('label'=>'Canchas', 'url'=>array('playGround/admin')),
						array('label'=>'Arbitros', 'url'=>array('referee/admin')),
						array('label'=>'Documentos', 'url'=>array('document/admin')),
						array('label'=>'Categorias', 'url'=>array('category/admin')),
						array('label'=>'Indicador resultado', 'url'=>array('catResult/admin')),
						//'---',
						//array('label'=>'Separated link', 'url'=>'#'),
				)),
				array('label'=>'Torneos', 'url'=>'#', 'items'=>$items),
		),
),



        array(
            'class'=>'bootstrap.widgets.TbMenu',
			'htmlOptions'=>array('class'=>'pull-right'),
            'items'=>array(
                array('label'=>'Home', 'url'=>array('/site/index')),
                array('label'=>'About', 'url'=>array('/site/page', 'view'=>'about')),
                array('label'=>'Contact', 'url'=>array('/site/contact')),
                array('label'=>'Login', 'url'=>array('/site/login'), 'visible'=>Yii::app()->user->isGuest),
                array('label'=>'Logout ('.Yii::app()->user->name.')', 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest)
            ),
        ),

    		
    		
    ),
		
	
		
)); ?>





<div class="container-fluid" id="page">
<div class="row-fluid">

	<?php if(isset($this->breadcrumbs)):?>
		<?php $this->widget('bootstrap.widgets.TbBreadcrumbs', array(
			'links'=>$this->breadcrumbs,
		)); ?><!-- breadcrumbs -->
	<?php endif?>

	
	
	<?php echo $content; ?>

	<div class="clear"></div>

	<div id="footer" align="center" >
			
		<br />
		<br />
		Copyright &copy; <?php echo date('Y'); ?> PINFO.<br/>
		All Rights Reserved.<br/>
		
	</div><!-- footer -->

</div><!-- page -->
</div>

</body>
</html>
