{* $Id: video_player.tpl 528 2008-06-12 15:27:14Z bogdan $ *}

<div style="width:330px">
	<div class="clear" style="clear:both"><img src="{$cfg.image.pixel}" height="10"></div>
	<div style="width:320px;">
		<div class="videoplayer">
			<embed
			src="{$cfg.path.url_site}mediaplayer.swf"
			width="320"
			height="260"
			allowscriptaccess="always"
			allowfullscreen="true"
			flashvars="height=260&width=320&file={$cfg.path.url_site}media/media/videos/{$video.user_id}_{$video.id}.flv&autostart=true&searchbar=false"
			/>
		</div>
	</div>
</div>