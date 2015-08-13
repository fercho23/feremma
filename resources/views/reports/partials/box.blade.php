<div class="{!!$class!!}">
<span class="info-box-icon"><i class="{!!$icon!!}"></i></span>
	<div class="info-box-content">
		<span class="info-box-text">{!!$reporttitle!!}<span>
		<span id="{!!$reporttype!!}" class="info-box-number">
			<input type="hidden" id="comparefield" value="{!!$comparefield!!}">
			<input type="hidden" id="reporttitle" value="{!!$reporttitle!!}">
			<a class="create" reporttype="{!!$reporttype!!}" href="javascript:void(0)">GENERAR</a>
		</span>
		<hr style="margin:0; color:grey;">
		<span class="progress-description">
		{!!$reportDescription!!}
		</span>
	</div><!-- /.info-box-content -->
</div><!-- /.info-box -->