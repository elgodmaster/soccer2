


<?php
$this->breadcrumbs=array(
		'Torneos'=>array('index'),
		$model->NAME=>array('manage','id'=>$model->ID),
		'Documentos',
);

$this->menu=array(
		array('label'=>'Inicio', 'url'=>array('index')),
		array('label'=>'Crear', 'url'=>array('create')),
		array('label'=>'Ver', 'url'=>array('manage', 'id'=>$model->ID)),
		//array('label'=>'Administrar', 'url'=>array('admin')),
);
?>
 								   
<h1>
	DOCUMENTOS	
</h1>
	<?php $form=$this->beginWidget('CActiveForm', array(
			'id'=>'player-form',
			'enableAjaxValidation'=>false,
			'htmlOptions' => array('enctype' => 'multipart/form-data'),
			
)); ?>

	<p class="note">
	Los campos con: <span class="required">*</span> son requeridos.
	</p>

	




		
		<?php //echo $form->textField($model,'ACTIVE'); ?>
		<?php echo $form->dropDownList($documentModel,'ID_DOCUMENT',CHtml::listData($catDocumentModel::model()->findAllByAttributes(array('TYPE_DOCUMENT'=>3)),'ID','NAME'),array('id'=>'documentType','style'=>"visibility: hidden")); ?>		

		<?php //echo $form->textField($model,'ACTIVE'); ?>
		<?php echo $form->hiddenField($model,'ID',array('id'=>'ownerId','name'=>'ownerId')); ?>		
	
	
	
				<?php 
								$this->widget('xupload.XUpload', array(
			                    'url' => Yii::app()->createUrl("tournament/uploadDocument",array("id"=>$model->ID)),
			                    'model' => $fileModel,
								'attribute' => 'file',
								'htmlOptions' => array('id'=>'player-form'),		                    
			                    'multiple' => true,
			));
			?>
			
			<table class="table table-striped">
				<thead>
				<tr>
					<th colspan="2">Archivo</th>
					<th>Descripción</th>
					<th>Tipo de Archivo</th>
					<th />					
				</tr>	
				</thead>
				<tbody class="files" data-toggle="modal-gallery" data-target="#modal-gallery">
				
				<?php foreach ($documents as $document) {?>
				
				 <tr class="template-download fade in" style="height: 146px;">				  
					  <td colspan="2" class="preview">
                		<a href="<?php echo $document->PATH;?>" title="<?php echo $document->NAME;?>" rel="gallery" download="<?php echo $document->NAME;?>">
                		<img src="<?php echo $document->THUMBNAIL;?>">
                		<br />
                		<span><?php echo $document->NAME;?></span>
                		<br />
                		<span><?php echo $document->SIZE;?></span>
                		                		
                		</a>
            		  </td>
            			<td class="name">
                			<!-- <a href="<?php // echo $document->PATH;?>" title="<?php  // echo $document->NAME;?>" rel="{%=file.thumbnail_url&&'gallery'%}" download="<?php //echo $document->NAME;?>"><?php echo $document->NAME;?></a> -->
                			
                			<span><?php echo $document->DESCRIPTION;?></span>
                			
            			</td>
	           			 <td class="size">
	           			 	<span><?php echo $document->iDDOCUMENT->NAME;?></span>
	           			 </td>
	           			
            			 <td class="delete">
					            <button class="btn btn-danger" data-type="<?php echo $document->DELTYPE;?>" data-url="<?php echo $document->DELURL.'&idDocumentModel='.$document->ID;?>">
					                <i class="icon-trash icon-white"></i>
					                <span>Delete</span>
					            </button>
					            <input type="checkbox" name="delete" value="1" />
					            
				        </td>
				 
				 </tr>
				
				<?php }?>

				
				
				</tbody>
			</table>
			
			
			
			
	<?php $this->endWidget(); ?>

