<?php

?>

<h1>Manage Player Result</h1>

<?php echo $this->renderPartial('_playerResultForm', array('model'=>$model,
				'playerModel'=>$playerModel,
				'playerResults'=>$playerResults)); ?>