<div class="generic_container clearfix" id="profile_videos">
	<div class="redtitle">My Videos</div>
	<div class="clear"><img src="{$cfg.image.pixel}" height="10"></div>
{*
	<div class="video_container">
		<div class="video" style="height:121px">
			<img src="{$cfg.path.url_photos}novideo.jpg" width="121" height="121">
		</div>
		<div class="links" style="text-align:right">
			<a href="javascript:;" onclick="$('#profile_videos').load('{$cfg.path.url_site}ajax_profile_video.php?{rnd_md5}');">[Upload]</a>
		</div>
	</div>
*}
	{assign var='video_idx' value=0}
	{foreach item=video from=$videos}
		{assign var='video_idx' value=$video_idx+1}
		{if $video}
		<div id="video_container_{$video.id}" class="video_container">
			<div class="video" style="height:121px">
				<a href="javascript:;" onclick="showVideoPlayer({$video.id})"><img border="0" width="121" height="121" src="videothumb.php?{rnd_md5}&id={$video.id}"></a>
			</div>
			<div style="font-size:11px;"><span style="font-weight:bold">Public:</span> <span>{if $video.gallery}Yes{else}No{/if}</span></div>
			<div style="font-size:11px;"><span style="font-weight:bold">Description:</span> <span>{$video.video_description|truncate:30:"..."}</span></div>
			<div class="links" style="text-align:right">
				<a href="javascript:;" onclick="$('#profile_videos').load('{$cfg.path.url_site}ajax_profile_video.php?{rnd_md5}&id={$video.id}');">[Edit]</a>
				<a href="javascript:;" onclick="doDeleteVideo('{$video.id}')">[Delete]</a>
			</div>
		</div>
		{else}
		<div class="video_container">
			<div class="video" style="height:121px">
				<img src="{$cfg.path.url_photos}novideo.jpg" width="121" height="121">
			</div>
			<div class="links" style="text-align:right">
				<a href="javascript:;" onclick="$('#profile_videos').load('{$cfg.path.url_site}ajax_profile_video.php?{rnd_md5}');">[Upload]</a>
			</div>
		</div>
		{/if}
		{if ($video_idx mod $cfg.video.per_row) eq 0}
		<div class="spacer" style="clear:both"><img src="{$cfg.image.pixel}" height="20"></div>
		{/if}
	{/foreach}
	<div style="clear:both;text-align:right">{$pager->links}</div>
</div>

{*<div id="video_container_template" class="video_container">
	<div class="video" style="height:121px">
		<img src="{$cfg.path.url_photos}novideo.jpg" width="121" height="121">
	</div>
	<div class="links" style="text-align:right">
		<a href="javascript:;" onclick="$('#profile_videos').load('{$cfg.path.url_site}ajax_profile_video.php?{rnd_md5}');">[Upload]</a>
	</div>
</div>*}

{literal}
<script type="text/javascript">
function doDeleteVideo(id) {
	$.ajax({
		type: "POST",
		url: {/literal}'{$cfg.path.url_site}ajax_profile_video.php?{rnd_md5}&u=d'{literal},
		data: "video_id=" + id,
		success: function(result) {
			if (parseInt(result) > 0) {
				$('#video_container_' + id).replaceWith($('#video_container_template').clone().show());
				$('#video_container_' + id).show();
			}
		}
	});
}
</script>
{/literal}