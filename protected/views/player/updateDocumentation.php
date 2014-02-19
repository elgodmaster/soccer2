<script id="myjs_nx" type="text/javascript">
	
	//$("#button_add").click(function() {
	 // alert("Handler for .click() called.");
	  //$("#_archives").append('<h1>Document TEST</h1>');
//	});
	
	$(document).ready(function() {
            //var frame = $('#uploadFrame').get(0).contentDocument;
            //$('#button_add', frame).click(function() {
            	//alert("Handler for .click() called.");
          	  //$("#_archives").append('<h1>Document TEST</h1>');
            //});

                     
		$("#optionMenu").hide();

		

        });


	window.onload = function () {
		$('#uploadFrame').ready(function()
				{
		
				
					$('#uploadFrame').contents().find('#button_add').click(function () {
				  			//alert("iFrame button has been clicked");
				  
				  var isPreview = 0;

				  $('#uploadFrame').contents().find('a[download]').each(function() {		            

							var idDivFile = this.title.replace(/\s+/g, '');
							
							
							

							if($($(this).parent().get(0)).attr("class") == "preview"){

								$(this).append("<br />");
									$(this).append($(this).attr("title"));
									var dropdownOptions = $("#optionMenu").clone();
									var buttonDelete = $('#uploadFrame').contents().find('button[data-type]').clone();
									$(buttonDelete).attr("id", "Mybutton");

									

								$(dropdownOptions).attr("id","idDivFile"+"_c");

								 $("<div />", {id:""+idDivFile, "class":"dashIcon span-10" })
							   	 .append($(this).attr("target","_blank"))
							   	 .append("<p />")
							   	 .append("<label>Nombre y Tipo de Documento</label>")					   	 
							   	 //.append("<p />")		
 							   	 .append("<input />", {"type":"text"})
							     .append("&nbsp;")			     
							     .append($(dropdownOptions).show())
							     .append( $(buttonDelete) )
							     .appendTo("#_archives");

								 $(buttonDelete).live("click", function() {
									   alert("hola"+""+idDivFile+"" );
									   $("#vmw-web-VMworld-MegaBanner-359x76-101(9).jpg").remove();
									   return false;
								});
							 
										isPreview = 1;
								
								}else if($($(this).parent().get(0)).attr("class") == "name" && isPreview<1){
												
									 $("<div />", {id:""+idDivFile, "class":"dashIcon span-10" })
								   	 .append($(this).attr("target","_blank"))
								   	 .append("<p />")
								   	 .append("<label>Nombre y Tipo de Documento</label>")					   	 
								   	 //.append("<p />")		
								   	 .append("<input />", {"type":"text"})
								     .append("&nbsp;")			     
								     .append($("#optionMenu").clone())
								     .appendTo("#_archives");

									 $("<div />", {id:""+idDivFile, "class":"dashIcon span-3" })
									 .append("<a />",{"href":"#", })								   	 
								     .appendTo("#_archives");
								 
			
									
										
							}else isPreview = 0;
							
					  
			            
			        });

			        

				  $('#uploadFrame').contents().find("table[role] tr").remove();

					return false;			
				   
				});
			
				});
		
		};

	
</script>
<?php
$this->breadcrumbs=array(
		'Players'=>array('index'),
		$model->NAME=>array('view','id'=>$model->ID),
		'Update Documentation',
);

$this->menu=array(
		array('label'=>'Lista jugadores', 'url'=>array('index')),
		array('label'=>'Crear nuevo jugador', 'url'=>array('create')),
		array('label'=>'Ver jugador', 'url'=>array('view', 'id'=>$model->ID)),
		
		array('label'=>'Administrar Documentación','url'=>array('update', 'id'=>$model->ID)),
);
?>
 								   
<h3>
	Modificar documentación :
	<?php echo $model->NAME; ?>
</h3>
<div class="form">

	<?php $form=$this->beginWidget('CActiveForm', array(
			'id'=>'player-form',
			'enableAjaxValidation'=>false,
)); ?>

	<p class="note">
	
		los campos con: <span class="required">*</span> son requeridos.
	</p>

	<div id="_archives"></div>



	<div class="row">
		<?php echo $form->labelEx($documentModel,'NAME'); ?>
		<?php echo $form->textField($documentModel,'NAME',array('size'=>40,'maxlength'=>50)); ?>
		<?php echo $form->error($documentModel,'NAME'); ?>
	</div>

	<div class="row">
		
		<?php //echo $form->textField($model,'ACTIVE'); ?>
		<?php echo $form->dropDownList($documentModel,'ID_DOCUMENT',CHtml::listData($catDocumentModel::model()->findAll(),'ID','NAME'),array('id'=>'optionMenu', )); ?>
		
	</div>

	<?php $this->endWidget(); ?>

</div>
<iframe
	id="uploadFrame" src="jqueryupload/_views/playerFrame.html" width="100%" height="600">

	<!--Contenido visto por browsers que NO soportan el tag <iframe>-->

	<a href="http://www.manual-html.com">Click aqu� para cargar Manual de
		HTML</a>

</iframe>


<!-- form -->
