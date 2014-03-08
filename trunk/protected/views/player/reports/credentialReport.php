<html>
<head>
<style>
body {
	font-family: sans-serif;
	font-size: 8pt;
}

p {
	margin: 0pt;
}

td {
	vertical-align: top;
	font-family: sans-serif;
	font-size: 6pt;
}

.items td {
	border-left: 0.1mm solid #000000;
	border-right: 0.1mm solid #000000;
}

table thead td {
	background-color: #EEEEEE;
	text-align: left;
	border: 0.1mm solid #000000;
}

table tfoot td {
	background-color: #EEEEEE;
	text-align: center;
	border: 0.1mm solid #000000;
}

.items td.blanktotal {
	background-color: #FFFFFF;
	border: 0mm none #000000;
	border-top: 0.1mm solid #000000;
	border-right: 0.1mm solid #000000;
}

.items td.totals {
	text-align: right;
	border: 0.1mm solid #000000;
}
</style>
</head>
<body>

	<!--mpdf
				<htmlpageheader name="myheader">
				<table width="100%"><tr>
				<td width="50%" style="color:#0000BB;"><span style="font-weight: bold; font-size: pt;">ORGANIZACION MEXICANA DE FUTBOL </span><br /><br />SOCCER2PINFO<br />Temporada Oficial 2014-2015<br /><span style="font-size: 15pt;">&#9742;</span> 01777 123 567</td>
				<td width="50%" style="text-align: right;">Invoice No.<br /><span style="font-weight: bold; font-size: 12pt;">0012345</span></td>
				</tr></table>
				</htmlpageheader>

				<htmlpagefooter name="myfooter">
				<div style="border-top: 1px solid #000000; font-size: 9pt; text-align: center; padding-top: 3mm; ">
				Page {PAGENO} of {nb}
				</div>
				</htmlpagefooter>

				<sethtmlpageheader name="myheader" value="on" show-this-page="1" />
				<sethtmlpagefooter name="myfooter" value="on" />
				mpdf-->

<!-- 	<div style="text-align: right">Date: '.date('jS F Y').'</div>  -->

	<!-- 
	<table width="100%" style="font-family: serif;" cellpadding="10">
		<tr>
			<td width="45%" style="border: 0.1mm solid #888888;"><span
				style="font-size: 7pt; color: #555555; font-family: sans;">SOLD TO:</span><br />
			<br />345 Anotherstreet<br />Little Village<br />Their City<br />CB22
				6SO</td>
			<td width="10%">&nbsp;</td>
			<td width="45%" style="border: 0.1mm solid #888888;"><span
				style="font-size: 7pt; color: #555555; font-family: sans;">SHIP TO:</span><br />
			<br />345 Anotherstreet<br />Little Village<br />Their City<br />CB22
				6SO</td>
		</tr>
	</table>
	
	
	
 -->


	<table class="table" >
		<thead>
			<tr>
				<th colspan="5">ORGANIZACION MEXICANA DE FUTBOL, <br />
				SOCCER2PINFO, Col Los Reyes. <br />
				La paz Edo. de Mexico, CP 56507
				</th>
				<!--  <td width="10%">QUANTITY</td>
				<td width="45%">DESCRIPTION</td>
				<td width="15%">UNIT PRICE</td>
				<td width="15%">AMOUNT</td>  -->
				
			</tr>
			
		</thead>
		<tbody>
			<!-- ITEMS HERE -->
			<tr>
				<td rowspan="6" align="center" valign="middle">				
				 	<?php 
 
						 if(isset($documentModel))
							echo CHtml::image($documentModel->PATH, '', array(
						    'data-original' => 'original',
						    'another-attribute' => 'bla-bla-bla',
							'height'=>'120',
							'width'=>'100'
						));
					
					?>
				</td>
				
				<!-- <td align="center">10</td>  -->
				<td colspan="4"><?php echo $model->NAME; ?></td>
				<!--<td align="right">&pound;2.56</td> -->
				<!--<td align="right">&pound;25.60</td> -->
			</tr>
			<tr>
				<!-- <td align="center">10</td>  -->
				<td colspan="4">Fecha Nacimiento <br /><?php echo $model->BIRTH; ?></td>
				<!--<td align="right">&pound;2.56</td> -->
				<!--<td align="right">&pound;25.60</td> -->
			</tr>
			<tr>
			
			
			<!-- <td align="center">10</td>  -->
				<td colspan="4">Telefono <br /><?php echo $model->PHONE; ?></td>
				<!--<td align="right">&pound;2.56</td> -->
				<!--<td align="right">&pound;25.60</td> -->
			</tr>
			<tr>
			
				<!-- <td align="center">10</td>  -->
				<td colspan="4">Sexo: <?php echo ($model->GENDER == 1)? 'HOMBRE' : 'MUJER'; ?></td>
				<!--<td align="right">&pound;2.56</td> -->
				<!--<td align="right">&pound;25.60</td> -->
			</tr>			
			<tr>
				<!-- <td align="center">10</td>  -->
				<td colspan="4">Registro no.: <?php echo $model->ID; ?></td>
				<!--<td align="right">&pound;2.56</td> -->
				<!--<td align="right">&pound;25.60</td> -->
			</tr>
			
			<tr>
				<!-- <td align="center">10</td>  -->
				<td colspan="4">Registrado desde:<br /> 09/09/2013</td>
				<!--<td align="right">&pound;2.56</td> -->
				<!--<td align="right">&pound;25.60</td> -->
			</tr>
			<tr>
				<!-- <td align="center">10</td>  -->
				<td colspan="4">Vigencia:<br /> 09/09/2013   -   09/09/2015</td>
				<!--<td align="right">&pound;2.56</td> -->
				<!--<td align="right">&pound;25.60</td> -->
			</tr>
			
			
			
			
			<!--  
			<tr>
				<td align="center">MX37801982</td>
				<td align="center">1</td>
				<td>Womans waterproof jacket<br />Options - Red and charcoal.
				</td>
				<td align="right">&pound;112.56</td>
				<td align="right">&pound;112.56</td>
			</tr>
			<tr>
				<td align="center">MR7009298</td>
				<td align="center">25</td>
				<td>Steel nails; oval head; 30mm x 3mm. Packs of 1000.</td>
				<td align="right">&pound;12.26</td>
				<td align="right">&pound;325.60</td>
			</tr>
			<tr>
				<td align="center">MF1234567</td>
				<td align="center">10</td>
				<td>Large pack Hoover bags</td>
				<td align="right">&pound;2.56</td>
				<td align="right">&pound;25.60</td>
			</tr>
			<tr>
				<td align="center">MX37801982</td>
				<td align="center">1</td>
				<td>Womans waterproof jacket<br />Options - Red and charcoal.
				</td>
				<td align="right">&pound;112.56</td>
				<td align="right">&pound;112.56</td>
			</tr>
			<tr>font-family: sans-serif;
	font-size: 8pt;
				<td align="center">MR7009298</td>
				<td align="center">25</td>
				<td>Steel nails; oval head; 30mm x 3mm. Packs of 1000.</td>
				<td align="right">&pound;12.26</td>
				<td align="right">&pound;325.60</td>
			</tr>
			<tr>
				<td align="center">MF1234567</td>
				<td align="center">10</td>
				<td>Large pack Hoover bags</td>
				<td align="right">&pound;2.56</td>
				<td align="right">&pound;25.60</td>
			</tr>
			<tr>
				<td align="center">MX37801982</td>
				<td align="center">1</td>
				<td>Womans waterproof jacket<br />Options - Red and charcoal.
				</td>
				<td align="right">&pound;112.56</td>
				<td align="right">&pound;112.56</td>
			</tr>
			<tr>
				<td align="center">MR7009298</td>
				<td align="center">25</td>
				<td>Steel nails; oval head; 30mm x 3mm. Packs of 1000.</td>
				<td align="right">&pound;12.26</td>
				<td align="right">&pound;325.60</td>
			</tr>
			<tr>
				<td align="center">MF1234567</td>
				<td align="center">10</td>
				<td>Large pack Hoover bags</td>
				<td align="right">&pound;2.56</td>
				<td align="right">&pound;25.60</td>
			</tr>
			<tr>
				<td align="center">MX37801982</td>
				<td align="center">1</td>
				<td>Womans waterproof jacket<br />Options - Red and charcoal.
				</td>
				<td align="right">&pound;112.56</td>
				<td align="right">&pound;112.56</td>
			</tr>
			<tr>
				<td align="center">MR7009298</td>
				<td align="center">25</td>
				<td>Steel nails; oval head; 30mm x 3mm. Packs of 1000.</td>
				<td align="right">&pound;12.26</td>
				<td align="right">&pound;325.60</td>
			</tr>
			<tr>
				<td align="center">MF1234567</td>
				<td align="center">10</td>
				<td>Large pack Hoover bags</td>
				<td align="right">&pound;2.56</td>
				<td align="right">&pound;25.60</td>
			</tr>
			<tr>
				<td align="center">MX37801982</td>
				<td align="center">1</td>
				<td>Womans waterproof jacket<br />Options - Red and charcoal.
				</td>
				<td align="right">&pound;112.56</td>
				<td align="right">&pound;112.56</td>
			</tr>
			<tr>
				<td align="center">MF1234567</td>
				<td align="center">10</td>
				<td>Large pack Hoover bags</td>
				<td align="right">&pound;2.56</td>
				<td align="right">&pound;25.60</td>
			</tr>
			<tr>
				<td align="center">MX37801982</td>
				<td align="center">1</td>
				<td>Womans waterproof jacket<br />Options - Red and charcoal.
				</td>
				<td align="right">&pound;112.56</td>
				<td align="right">&pound;112.56</td>
			</tr>
			<tr>
				<td align="center">MR7009298</td>
				<td align="center">25</td>
				<td>Steel nails; oval head; 30mm x 3mm. Packs of 1000.</td>
				<td align="right">&pound;12.26</td>
				<td align="right">&pound;325.60</td>
			</tr>
			<tr>
				<td align="center">MR7009298</td>
				<td align="center">25</td>
				<td>Steel nails; oval head; 30mm x 3mm. Packs of 1000.</td>
				<td align="right">&pound;12.26</td>
				<td align="right">&pound;325.60</td>
			</tr>
			<tr>
				<td align="center">MF1234567</td>
				<td align="center">10</td>
				<td>Large pack Hoover bags</td>
				<td align="right">&pound;2.56</td>
				<td align="right">&pound;25.60</td>
			</tr>
			<tr>
				<td align="center">MX37801982</td>
				<td align="center">1</td>
				<td>Womans waterproof jacket<br />Options - Red and charcoal.
				</td>
				<td align="right">&pound;112.56</td>
				<td align="right">&pound;112.56</td>
			</tr>
			<tr>
				<td align="center">MR7009298</td>
				<td align="center">25</td>
				<td>Steel nails; oval head; 30mm x 3mm. Packs of 1000.</td>
				<td align="right">&pound;12.26</td>
				<td align="right">&pound;325.60</td>
			</tr>
			
			-->
			<!-- END ITEMS HERE -->
			<!-- <tr>
				<td class="blanktotal" colspan="3" rowspan="6"></td>
				<td class="totals">Subtotal:</td>
				<td class="totals">&pound;1825.60</td>
			</tr>
			<tr>
				<td class="totals">Tax:</td>
				<td class="totals">&pound;18.25</td>
			</tr>
			<tr>
				<td class="totals">Shipping:</td>
				<td class="totals">&pound;42.56</td>
			</tr>
			<tr>
				<td class="totals"><b>TOTAL:</b>
				</td>
				<td class="totals"><b>&pound;1882.56</b>
				</td>
			</tr>
			<tr>
				<td class="totals">Deposit:</td>
				<td class="totals">&pound;100.00</td>
			</tr>
			<tr>
				<td class="totals"><b>Balance due:</b>
				</td>
				<td class="totals"><b>&pound;1782.56</b>
				</td>
			</tr>
			 -->
			
		</tbody>
		<tfoot>
		 <tr>
		 	<td colspan="5">http://www.soccer2.com</td>
		 </tr>		
		</tfoot>
	</table>
	<!-- <div style="text-align: center; font-style: italic;">Reporte de credencial valida</div> -->
</body>
</html>







