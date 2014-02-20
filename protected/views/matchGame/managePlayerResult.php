<?php

?>

<h3>Administrar resultados </h3>

<?php echo $this->renderPartial('_playerResultForm', array('model'=>$model,
				'playerModel'=>$playerModel,
				'playerResults'=>$playerResults)); ?>