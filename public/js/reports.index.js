window.onload=function()
{
	$('#form').hide();
	$('div.again').hide();	
	$('a.create').click(
		function(){
			$('div#form').show();
			$('#forms-row').slideDown();//muestro los formularios
			$('#reports-row').slideUp();//oculto el selector de reportes
										//le paso datos al form
			$('div#selectroom').hide();
			$('div.again').show();			
			if (this.getAttribute('reporttype')=="disabledRooms" || this.getAttribute('reporttype')=="historicRoom" || this.getAttribute('reporttype')=="nextReservations" || this.getAttribute('reporttype')=="nextReservationsDue") 
			{	console.log("sin fecha");
				$('div.selectdate').hide();
			};
			if (this.getAttribute('reporttype')=="historicRoom") 
			{	console.log("sin habitacion");
				$('div#selectroom').show();
			};
			if (this.getAttribute('reporttype')=="nextReservationsDue" || this.getAttribute('reporttype')=="nextReservations" || this.getAttribute('reporttype')=="disabledRooms") 
			{	console.log("sin nada");
				$('div.selectall').hide();
			};

			$('input#reporttype').attr('value',this.getAttribute('reporttype'));
			rt=$('span#'+this.getAttribute('reporttype')).children('#reporttitle').attr('value');
			cf=$('span#'+this.getAttribute('reporttype')).children('#comparefield').attr('value');
			$('h3#form-title').text('Generar Reporte: '+rt);
			$('input#reporttitle').attr('value', rt);
			$('input#comparefield').attr('value', cf);		
			

		}
	);


 

}