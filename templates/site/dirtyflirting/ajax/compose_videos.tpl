{* $Id: compose_videos.tpl 350 2008-05-23 19:06:51Z andi $ *}

<div class="generic_container clearfix" id="profile_videos">
	{assign var='video_idx' value=0}
	{foreach item=video from=$videos}
		{assign var='video_idx' value=$video_idx+1}
		<div id="video_container_{$video.id}" class="video_container">
			<div class="video" style="height:121px">
				<a href="javascript:;" onclick="showGalleryThumb('{$video.id}')">
					<img border="0" width="121" height="121" src="{$cfg.path.url_site}videothumb.php?{rnd_md5}&id={$video.id}">
				</a>
			</div>
			<div style="font-size:11px;"><span style="font-weight:bold">Title:</span> <span>{if $video.video_name}{$video.video_name}{else}[not set]{/if}</span></div>
		</div>
		{if ($video_idx mod 3) eq 0}
		<div class="clear"><img src="{$cfg.image.pixel}" height="20"></div>
		{/if}
	{foreachelse}
		<div>No video found</div>
	{/foreach}
	<div class="clear"><img src="{$cfg.image.pixel}" height="20"></div>
	<div style="text-align:right">{$pager->links}</div>
</div>

{literal}
<script type="text/javascript">
function compose_gallery_videos(page) {
	$('#Message_Gallery_Videos').load('{/literal}{$cfg.path.url_site}{literal}ajax_compose_videos.php?v=' + page);
}
function showGalleryThumb(id) {
	var email_id = window.email_id;
	document.images['gallery_thumb_' + email_id].src = '{/literal}{$cfg.image.pixel}{literal}';
	document.forms['mail_form_' + email_id].message_type.value = 'V';
	document.forms['mail_form_' + email_id].attachment_id.value = id;
	$('#message_type_label_' + email_id).html('Video email');
	setTimeout(function() { //fuck IE
		var rnd = Math.round(Math.random() * 99999999999);
		document.images['gallery_thumb_' + email_id].src = '{/literal}{$cfg.path.url_site}{literal}videothumb.php?' + rnd + '&id=' + id;
	}, 0);
	$('#compose_message_type').jqmHide();
	$('#compose_message_type').remove();
	$('#gallery_thumb_container_' + email_id).show();
}
</script>
{/literal}