<div class="generic_container clearfix" id="profile_pictures">
	<div class="redtitle">My Pictures</div>
	<div class="clear"><img src="{$cfg.image.pixel}" height="10"></div>
{*
	<div class="photo_container">
		<div class="photo" style="height:121px">
			<img src="{$cfg.path.url_photos}nophoto.jpg" width="121" height="121">
		</div>
		<div class="links" style="text-align:right">
			<a href="javascript:;" onclick="$('#profile_pictures').load('{$cfg.path.url_site}ajax_profile_picture.php?{rnd_md5}');">[Upload]</a>
		</div>
	</div>
*}
	{assign var='photo_idx' value=0}
	{foreach item=photo from=$photos}
		{assign var='photo_idx' value=$photo_idx+1}
		{if $photo}
		<div id="photo_container_{$photo.id}" class="photo_container">
			<div class="photo">
				<a onclick="showPicturePopup({$photo.id})" href="javascript:;"><img src="showphoto.php?{rnd_md5}&photo_id={$photo.id}&t=m"></a>
			</div>
			<div style="font-size:11px;"><span style="font-weight:bold">Public:</span> <span>{if $photo.gallery}Yes{else}No{/if}</span></div>
			<div style="font-size:11px;"><span style="font-weight:bold">Description:</span> <span>{$photo.photo_description|truncate:30:"..."}</span></div>
			<div class="links">
				<a href="javascript:;" onclick="$('#profile_pictures').load('{$cfg.path.url_site}ajax_profile_picture.php?{rnd_md5}&id={$photo.id}');">[Edit]</a>
				<a href="javascript:;" onclick="doDeletePicture('{$photo.id}')">[Delete]</a>
			</div>
		</div>
		{else}
		<div class="photo_container">
			<div class="photo">
				<img src="{$cfg.path.url_photos}nophoto.jpg" />
			</div>
			<div class="links">
				<a href="javascript:;" onclick="$('#profile_pictures').load('{$cfg.path.url_site}ajax_profile_picture.php?{rnd_md5}');">[Upload]</a>
			</div>
		</div>
		{/if}
		{if ($photo_idx mod $cfg.image.per_row) eq 0}
		<div class="spacer" style="clear:both"><img src="{$cfg.image.pixel}" height="20"></div>
		{/if}
	{/foreach}
	<div style="clear:both"><img src="{$cfg.image.pixel}" height="20"></div>
	<div style="text-align:right">{$pager->links}</div>
</div>

<div id="photo_container_template" class="photo_container" style="display: none;">
	<div class="photo"><img src="{$cfg.path.url_photos}nophoto.jpg" width="121" height="121"></div>
	<div class="links"><a href="javascript:;" onclick="$('#profile_pictures').load('{$cfg.path.url_site}ajax_profile_picture.php?{rnd_md5}');">[Upload]</a></div>
</div>

{literal}
<script type="text/javascript">
function doDeletePicture(id) {
	$.ajax({
		type: "POST",
		url: {/literal}'{$cfg.path.url_site}ajax_profile_picture.php?{rnd_md5}&u=d'{literal},
		data: "photo_id=" + id,
		success: function(result) {
			if (parseInt(result) > 0) {
				$('#photo_container_' + id).replaceWith($('#photo_container_template').clone().show());
				$('#photo_container_' + id).show();
			}
		}
	});
}
</script>
{/literal}
