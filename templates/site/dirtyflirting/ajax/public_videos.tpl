<div class="public_container clearfix" id="profile_videos">
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
		<div id="video_container_{$video.id}" class="video_container">
			<div class="video" style="height:121px">
				<a href="javascript:;" onclick="showVideoPlayer({$video.id})"><img border="0" width="121" height="121" src="{$cfg.path.url_site}videothumb.php?{rnd_md5}&id={$video.id}&user_id={$video.user_id}"></a>
			</div>
			<div style="font-size:11px;"><span style="font-weight:bold">Description:</span> <span>{if $video.video_description}{$video.video_description|truncate:30:"..."}{else}none{/if}</span></div>
		</div>
		{if ($video_idx mod 3) eq 0}
		<div class="spacer" style="clear:both"><img src="{$cfg.image.pixel}" height="20"></div>
		{/if}
	{foreachelse}
		<div>This user has no Public videos</div>
	{/foreach}
	<div class="clear"><img src="{$cfg.image.pixel}" height="20"></div>
	<div><span style="font-weight:bold;color:#900202">Note:</span> There may be more videos in a users Private Gallery!</div>
	<div style="clear:both;text-align:right">{$pager->links}</div>
</div>