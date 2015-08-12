window.onload=function()
{
	$('#form-between-dates').hide();
	$('a.create').click(
		function(){
			$('#forms-row').slideDown();
			$('#reports-row').slideUp();
			$('#'+this.getAttribute("form")).show();			
			document.getElementById('comparefield').setAttribute("value", this.getAttribute("compareField"));
			document.getElementById('reporttype').setAttribute("value", this.getAttribute("reporttype"));
		}
	);

}