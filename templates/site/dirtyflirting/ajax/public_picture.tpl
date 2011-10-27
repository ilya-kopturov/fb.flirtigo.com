<div style="text-align:center">
	<div style="width:{$cfg.image.b_x}px;margin:0 auto;text-align:left;">
		<div><img src="{$cfg.image.pixel}" height="20"></div>
		<div><img src="{$cfg.path.url_site}showphoto.php?{rnd_md5}&photo_id={$photo.id}&id={$photo.user_id}&t=b"></div>
		<div><b>Description:</b>&nbsp; {if $photo.description}{$photo.description|nl2br}{else}none{/if}</div>
		<div><img src="{$cfg.image.pixel}" height="20"></div>
	</div>
	<div style="float:right"><a href="javascript:;" onclick="$('#Pictures').load('{$cfg.path.url_site}ajax_public_pictures.php?id={$photo.user_id}&p={$smarty.get.p}')">[Back to pictures]</a></div>
</div>