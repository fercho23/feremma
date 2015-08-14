<div class="row">
    <div class="col-lg-12">
        <a href="javascript:void(0)" id="btn-print" class="btn btn-block btn-info btn-lg" href=""><i class="fa fa-print"></i> Imprimir</a>
        <a href="{!! URL('reports') !!}" class="btn btn-block btn-danger btn-lg" href="">Volver a selección de Informes</a>
    </div>
</div>
<script type="text/javascript">

  document.getElementById("btn-print").onclick = function() {
	$("#div-print").printThis({
		debug: false,               //* show the iframe for debugging
		importCSS: true,            //* import page CSS
		importStyle: true,         //* import style tags
		printContainer: true,       //* grab outer container as well as the contents of the selector
		loadCSS: "path/to/my.css",  //* path to additional css file - us an array [] for multiple
		pageTitle: "",              //* add title to print page
		removeInline: false,        //* remove all inline styles from print elements
		printDelay: 333,            //* variable print delay
		header: null,               //* prefix to html
		formValues: true            //* preserve input/form values
	});
  };
</script>