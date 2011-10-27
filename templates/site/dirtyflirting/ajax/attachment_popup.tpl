{* $Id: attachment_popup.tpl 528 2008-06-12 15:27:14Z andi $ *}

<div style="width:{$width}px;">
	<div class="redtitle"></div>
	<div style="float:right;">
		<a href="javascript:;" onclick="$('#attachment_popup').jqmHide().remove()" title="Close">
			<img src="{$cfg.path.url_site}js/jqm_close.gif" border="0">
		</a>
	</div>
	<div class="clear" style="clear:both"><img src="{$cfg.image.pixel}" height="5"></div>
	<div style="width:{$width - 10}px;">
		{if $attachment.type eq 'video'}
		<div class="videoplayer">
			<embed
			src="{$cfg.path.url_site}mediaplayer.swf"
			width="320"
			height="260"
			allowscriptaccess="always"
			allowfullscreen="true"
			flashvars="height=260&width=320&file={$cfg.path.url_attachments}{$attachment.file}&autostart=true&searchbar=false"
			/>
		</div>
		{else}
		<img style="border:1px solid black" src="{$cfg.path.url_site}attachment.php?{rnd_md5}&id={$attachment.id}" width="640">
		{/if}
	</div>
</div>