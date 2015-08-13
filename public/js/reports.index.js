window.onload=function()
{
	$('#form').hide();

	$('a.create').click(
		function(){
			$('div#form').show();
			$('#forms-row').slideDown();//muestro los formularios
			$('#reports-row').slideUp();//oculto el selector de reportes
										//le paso datos al form


			$('input#reporttype').attr('value',this.getAttribute('reporttype'));
			rt=$('span#'+this.getAttribute('reporttype')).children('#reporttitle').attr('value');
			cf=$('span#'+this.getAttribute('reporttype')).children('#comparefield').attr('value');
			$('h3#form-title').text('Ingrese fechas para generar el reporte: '+rt);
			$('input#reporttitle').attr('value', rt);
			$('input#comparefield').attr('value', cf);		
			

		}
	);


 

}