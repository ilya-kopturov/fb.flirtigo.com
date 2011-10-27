{* $Id: compose_pictures.tpl 350 2008-05-23 19:06:51Z andi $ *}

<div class="generic_container clearfix">
	<div class="clear"><img src="{$cfg.image.pixel}" height="10"></div>
	{assign var='photo_idx' value=0}
	{foreach item=photo from=$photos}
		{assign var='photo_idx' value=$photo_idx+1}
		<div id="photo_container_{$photo.id}" class="photo_container">
			<div class="photo" style="height:121px">
				<a href="javascript:;" onclick="showGalleryThumb('{$photo.id}')">
					<img width="121" height="121" border="0" src="{$cfg.path.url_site}showphoto.php?{rnd_md5}&photo_id={$photo.id}&t=m">
				</a>
			</div>
			<div style="font-size:11px;"><span style="font-weight:bold">Title:</span> <span>{if $photo.photo_name}{$photo.photo_name}{else}[not set]{/if}</span></div>
		</div>
		{if ($photo_idx mod 3) eq 0}
		<div class="clear"><img src="{$cfg.image.pixel}" height="20"></div>
		{/if}
	{foreachelse}
		<div>No photo found</div>
	{/foreach}
	<div class="clear"><img src="{$cfg.image.pixel}" height="20"></div>
	<div style="text-align:right">{$pager->links}</div>
</div>

{literal}
<script>
function compose_gallery_pictures(page) {
	$('#Message_Gallery_Images').load('{/literal}{$cfg.path.url_site}{literal}ajax_compose_pictures.php?p=' + page);
}
function showGalleryThumb(id) {
	var email_id = window.email_id;
	document.images['gallery_thumb_' + email_id].src = '{/literal}{$cfg.image.pixel}{literal}';
	document.forms['mail_form_' + email_id].message_type.value = 'I';
	document.forms['mail_form_' + email_id].attachment_id.value = id;
	$('#message_type_label_' + email_id).html('Image email');
	setTimeout(function() { //fuck IE
		var rnd = Math.round(Math.random() * 99999999999);
		document.images['gallery_thumb_' + email_id].src = '{/literal}{$cfg.path.url_site}{literal}showphoto.php?' + rnd + '&photo_id=' + id;
	}, 0);
	$('#compose_message_type').jqmHide();
	$('#compose_message_type').remove();
	$('#gallery_thumb_container_' + email_id).show();
}
</script>
{/literal}