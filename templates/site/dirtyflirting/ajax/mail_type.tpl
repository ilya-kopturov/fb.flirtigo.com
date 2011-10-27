<div style="vertical-align:middle">
	<span class="redtitle" style="float:left;">Click on a thumb to attach</span>
	<span style="float:right;" >
		<a href="javascript:;" onclick="$('#compose_message_type').jqmHide();$('#compose_message_type').remove()" title="Close">
			<img src="{$cfg.path.url_site}js/jqm_close.gif" border="0">
		</a>
	</span>
</div>
<div class="clear" style="clear:both"><img src="{$cfg.image.pixel}" height="10"></div>
<div id="compose_multimedia_gallery">
	<ul>
		<li><a href="{$cfg.path.url_site}ajax_compose_pictures.php?{rnd_md5}" title="Message Gallery Images"><span>Images</span></a></li>
		<li><a href="{$cfg.path.url_site}ajax_compose_videos.php?{rnd_md5}" title="Message Gallery Videos"><span>Videos</span></a></li>
	</ul>
</div>
{literal}
<script type="text/javascript">
$('#compose_multimedia_gallery > ul').tabs({
	cache: false,
	remote: true,
	spinner: ''
});
</script>
{/literal}
