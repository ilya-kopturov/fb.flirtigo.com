<div class="public_container clearfix" id="profile_pictures">
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
		<div id="photo_container_{$photo.id}" class="photo_container">
			<div class="photo" style="height:121px">
				{* <a href="javascript:;" onclick="$('#profile_pictures').load('{$cfg.path.url_site}ajax_public_picture.php?id={$photo.id}&p={$smarty.get.p}')"><img border="0" width="121" src="{$cfg.path.url_site}showphoto.php?{rnd_md5}&photo_id={$photo.id}&id={$photo.user_id}&t=m"></a> *}
				<a href="javascript:;" onclick="showPicturePopup({$photo.id})"><img width="121" src="{$cfg.path.url_site}showphoto.php?{rnd_md5}&photo_id={$photo.id}&id={$photo.user_id}&t=m"></a>
			</div>
			<div style="font-size:11px;"><span style="font-weight:bold">Description:</span> <span>{if $photo.photo_description}{$photo.photo_description|truncate:30:"..."}{else}none{/if}</span></div>
		</div>
		{if ($photo_idx mod 3) eq 0}
		<div class="spacer" style="clear:both"><img src="{$cfg.image.pixel}" height="20"></div>
		{/if}
	{foreachelse}
		<div>No picture found</div>
	{/foreach}
	<div style="clear:both"><img src="{$cfg.image.pixel}" height="20"></div>
	<div><span style="font-weight:bold;color:#900202">Note:</span> There may be more pictures in a users Private Gallery!</div>
	<div style="clear:both"><img src="{$cfg.image.pixel}" height="20"></div>
	<div style="text-align:right">{$pager->links}</div>
</div>