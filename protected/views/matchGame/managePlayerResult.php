<?php

?>

<h2>Administrar resultados </h2>

<?php echo $this->renderPartial('_playerResultForm', array('model'=>$model,
				'playerModel'=>$playerModel,
				'playerResults'=>$playerResults)); ?>