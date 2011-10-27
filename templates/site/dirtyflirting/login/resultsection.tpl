<table width="744" border="0" cellspacing="0" cellpadding="0">
	<tr style="padding-bottom: 10px;">
		{section name="user" loop=$users}
		<td class="list_item" {if $smarty.section.user.iteration%2 == 0 } style="padding-left: 10px;" {else} style="padding-right: 10px;" {/if}>
			<table class="memberstable normaltext" height="120" border="0" cellpadding="0" cellspacing="0" width="744">
				<tr>
					<td class="leftc">
						<div class="photo">
							{if $videogallery}
								<a href="{$cfg.path.url_site}profile/{screenname user_id=$users[user].id}#{if $users[user].gallery}Videos{else}Private_Gallery{/if}"><img src="{$cfg.path.url_site}videothumb.php?{rnd_md5}&id={$users[user].videoid}&user_id={$users[user].id}" /></a>
							{else}
								<a href="{$cfg.path.url_site}profile/{screenname user_id=$users[user].id}"><img src="{$cfg.path.url_site}showphoto.php?id={$users[user].id}&m=Y&t=r&p=1" /></a>
							{/if}
						</div>
						<div class="rating">
							Rating: <br /> {rateme id=$users[user].id screenname=$users[user].screenname rating=$users[user].rating}
						</div>
					</td>
					<td class="rightc">
						<div class="screenname normaltext">
							{if $users[user].withpicture eq 'Y'}
								<img src="{$cfg.template.url_template}login/images/dirtyflirting_mailpicture.gif" alt="FlirtiGo.com" style="border: 0px; vertical-align: middle;" />
							{/if}
							{if $users[user].withvideo eq 'Y'}
								<img src="{$cfg.template.url_template}login/images/dirtyflirting_mailvideo.gif" alt="FlirtiGo.com" style="border: 0px; vertical-align: middle;" />
							{/if}
							<a href="{$cfg.path.url_site}profile/{screenname user_id=$users[user].id}">{$users[user].screenname}</a>
						</div>
						<div class="info normaltext">
							{age birthday=$users[user].birthdate} yr old {assign var="sex" value=$users[user].sex}{$cfg.profile.sex[$sex]}
						</div>
						<div class="info normaltext">
							{location type="short" typeloc=$users[user].typeloc city=$users[user].city country=$users[user].country joined=$users[user].joined}
						</div>
						<div class="info normaltext">
							Looking For: {looking looking=$users[user].looking}
						</div>
						<div class="info normaltext">
							Summary: {if $users[user].introtitle}{$users[user].introtitle|truncate:30:"..."}{else}Ask Me.{/if}
						</div>
						{if $videogallery}
							<div class="info normaltext">
								Private: {if $users[user].gallery}No{else}Yes <div style="display:inline;"><a href="{$cfg.path.url_site}profile/{screenname user_id=$users[user].id}#Private_Gallery">Request password</a></div>{/if}
							</div>
						{/if}
						<div class="more featuredBoxLink">
							[<a href="{$cfg.path.url_site}profile/{screenname user_id=$users[user].id}" class="featuredBoxLink">more</a>]
						</div>
					</td>
				</tr>
			</table>
		</td>
		{if $smarty.section.user.iteration%2 == 0 and !$smarty.section.user.last}
			</tr>
			<tr>
		{/if}
		{sectionelse}
			No user meets your criteria.
		{/section}
	</tr>
</table>

{if $pager.links}
<table class="normaltext" cellpadding="0" cellspacing="0" style="width: 744px;">
	<tr>
		{foreach from=$pager.links item=link}
			<td style="text-align: right;" class="featuredBoxLink">{$link}</td>
		{/foreach}
	</tr>
</table>
{/if}

{literal}
<script>
function requestpassword(id) {
	$.get('{/literal}{$cfg.path.url_site}{literal}ajax_gallery_password.php?id=' + id, function(data) {
		alert(data);
	});
}
</script>
{/literal}

{*
{if $result_nav}
<table class="normaltext" cellpadding="0" cellspacing="0" style="width: 744px;">
	<tr>
		<td style="text-align: right;" class="featuredBoxLink">[ &nbsp;{$result_nav}&nbsp; ]</td>
	</tr>
</table>
{/if}
{else}

<table class="memberstable normaltext" cellpadding="0" cellspacing="0" style="width: 744px; height: 650px;">
	<tr>
		<td style="font-weight: bold; vertical-align: top;">No results found.</td>
	</tr>
</table>
*}