<div class="generic_container clearfix" id="profile_gallery">
	<div class="redtitle" style="float:left">My private gallery</div>
	<div style="float:right">Show {html_options name="media_filter" options=$media_filter selected=$smarty.get.filter}</div>
	<div class="clear"><img src="{$cfg.image.pixel}" height="20"></div>
	{foreach name=gallery item=media from=$gallery}
		{if $media.photo_main}
		<div id="photo_container_{$media.id}" class="photo_container" style="text-align:left;margin-left:20px;margin-right:20px;float:left;width:121px;">
			<div class="photo" style="height:121px">
				<a href="javascript:;" onclick="showPicturePopup({$media.id})"><img border="0" width="121" src="{$cfg.path.url_site}showphoto.php?{rnd_md5}&photo_id={$media.id}&id={$media.user_id}&t=m"></a>
			</div>
			<div style="font-size:11px;">
				<span style="font-weight:bold">Type:</span>
				<span>Photo</span>
			</div>
			<div style="font-size:11px;"><span style="font-weight:bold">Description:</span> <span>{if $media.photo_description}{$media.photo_description|truncate:30:"..."}{else}none{/if}</span></div>
		</div>
		{else}
		<div id="video_container_{$media.id}" class="video_container" style="text-align:left;margin-left:20px;margin-right:20px;float:left;width:121px;">
			<div class="video" style="height:121px">
				<a href="javascript:;" onclick="showVideoPlayer({$media.id})">
				<img border="0" width="121" height="121" src="{$cfg.path.url_site}videothumb.php?{rnd_md5}&id={$media.id}&user_id={$media.user_id}"></a>
			</div>
			<div style="font-size:11px;">
				<span style="font-weight:bold">Type:</span>
				<span>Video</span>
			</div>
			<div style="font-size:11px;">
				<span style="font-weight:bold">Description:</span>
				<span>{if $media.video_description}{$media.video_description|truncate:30:"..."}{else}none{/if}</span>
			</div>
		</div>
		{/if}
		{if ($smarty.foreach.gallery.iteration mod 4) eq 0}
		<div class="clear"><img src="{$cfg.image.pixel}" height="20"></div>
		{/if}
	{foreachelse}
		<div>No media found</div>
	{/foreach}
	<div class="clear"><img src="{$cfg.image.pixel}" height="20"></div>
	<div style="clear:both;text-align:right">{$pager->links}</div>
</div>

{literal}
<script>
$('select[name="media_filter"]').change(function() {
	var id = '{/literal}{$smarty.get.id}{literal}';
	var url = '{/literal}{$cfg.path.url_site}{literal}ajax_profile_gallery.php?';
	$('#Private_Gallery').load(url + 'id=' + id + '&filter=' + this.value);
});
</script>
{/literal}