<div>
	<div style="vertical-align:middle">
		<span class="redtitle" style="float:left;">{$photo.photo_name}</span>
		{*<span style="float:right;" >
			<a href="javascript:;" onclick="$('#picture_popup').jqmHide();$('#picture_popup').remove()" title="Close">
				<img src="{$cfg.path.url_site}js/jqm_close.gif" border="0">
			</a>
		</span>*}
	</div>
	<div class="clear" style="clear:both"><img src="{$cfg.image.pixel}" height="10"></div>
	<div class="photo_popup">
		<img src="{$cfg.path.url_site}showphoto.php?photo_id={$photo.id}&t=b">
	</div>
</div>