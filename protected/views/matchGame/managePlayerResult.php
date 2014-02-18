<?php

?>

<h1>gestionar resultados </h1>

<?php echo $this->renderPartial('_playerResultForm', array('model'=>$model,
				'playerModel'=>$playerModel,
				'playerResults'=>$playerResults)); ?>