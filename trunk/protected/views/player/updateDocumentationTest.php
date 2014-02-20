<script id="myjs_nx" type="text/javascript">
$(document).ready(function() {


//alert("hola");
//$('#getConsult').trigger("click");

	
	window.onload = function () {

		$('#uploadFrame').ready(function()
				{
		
				
					$('#uploadFrame').contents().find('#documentTypeDiv').append($('#documentType').clone());
					$('#uploadFrame').contents().find('#documentTypeDiv').append($('#ownerId').clone());
					
				});
		
		
	}
	
	
});
</script>


<?php
$this->breadcrumbs=array(
		'Jugadores'=>array('index'),
		$model->NAME=>array('view','id'=>$model->ID),
		'Documentos',
);

$this->menu=array(
		array('label'=>'Inicio', 'url'=>array('index')),
		array('label'=>'Crear nuevo jugador', 'url'=>array('create')),
		array('label'=>'Ver jugador ', 'url'=>array('view', 'id'=>$model->ID)),
		
);
?>
 								   
<h2>
	ANEXAR DOCUMENTOS	
</h2>
	<?php $form=$this->beginWidget('CActiveForm', array(
			'id'=>'player-form',
			'enableAjaxValidation'=>false,
			'htmlOptions' => array('enctype' => 'multipart/form-data'),
			
)); ?>

	<p class="note">
		Los campos con: <span class="required">*</span> son requeridos.
	</p>

	




		
		<?php //echo $form->textField($model,'ACTIVE'); ?>
		<?php echo $form->dropDownList($documentModel,'ID_DOCUMENT',CHtml::listData($catDocumentModel::model()->findAllByAttributes(array('TYPE_DOCUMENT'=>2)),'ID','NAME'),array('id'=>'documentType','style'=>"visibility: hidden")); ?>		

		<?php //echo $form->textField($model,'ACTIVE'); ?>
		<?php echo $form->hiddenField($model,'ID',array('id'=>'ownerId','name'=>'ownerId')); ?>		
	
	
	
				<?php 
								$this->widget('xupload.XUpload', array(
			                    'url' => Yii::app()->createUrl("player/uploadTest",array("id"=>$model->ID)),
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
					<th>Descripcion</th>
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
					            <button class="btn btn-danger" data-type="<?php echo $document->DELTYPE;?>" data-url="<?php echo $document->DELURL.'&idDocumentPlayer='.$document->ID_DOCUMENT_PLAYER;?>">
					                <i class="icon-trash icon-white"></i>
					                <span>Delete</span>
					            </button>
					            <input type="checkbox" name="delete" value="1" />
					            
				        </td>
				 
				 </tr>
				
				<?php }?>
				
	<!-- 		 <tr class="template-download fade">
        {% if (file.error) { %}
            <td></td>
            <td class="name"><span>{%=file.name%}</span></td>
            <td class="size"><span>{%=o.formatFileSize(file.size)%}</span></td>
            <td class="error" colspan="2"><span class="label label-important">{%=locale.fileupload.error%}</span> {%=locale.fileupload.errors[file.error] || file.error%}</td>
        {% } else { %}
            <td class="preview">{% if (file.thumbnail_url) { %}
                <a href="{%=file.url%}" title="{%=file.name%}" rel="gallery" download="{%=file.name%}"><img src="{%=file.thumbnail_url%}"></a>
            {% } %}</td>
            <td class="name">
                <a href="{%=file.url%}" title="{%=file.name%}" rel="{%=file.thumbnail_url&&'gallery'%}" download="{%=file.name%}">{%=file.name%}</a>
            </td>
            <td class="size"><span>{%=o.formatFileSize(file.size)%}</span></td>
            <td colspan="2"></td>
        {% } %}
        <td class="delete">
            <button class="btn btn-danger" data-type="{%=file.delete_type%}" data-url="{%=file.delete_url%}">
                <i class="icon-trash icon-white"></i>
                <span>{%=locale.fileupload.destroy%}</span>
            </button>
            <?php // if ($this->multiple) : ?><input type="checkbox" name="delete" value="1">
            <?php //else: ?><input type="hidden" name="delete" value="1">
            <?php //endif; ?>  
            	
        </td>
    </tr>-->
				
				
				</tbody>
			</table>
			
			
			
			
	<?php $this->endWidget(); ?>


<!-- 

<iframe
	id="uploadFrame" src="/soccer2/jqueryupload/playerFrame.html" width="100%" height="600">

	

	<a href="http://www.manual-html.com">Click aqu� para cargar Manual de
		HTML</a>

</iframe>
 -->

<!-- form -->
