 <div class="center">
 <h1 class="search_heading" style="text-align: left;">{$smarty.get.heading} in {if $smarty.get.state && $smarty.get.country == '1'}{$states[$smarty.get.state]},{/if} {$countries[$smarty.get.country]}</h1>
 <table width="746" border="0" cellspacing="0" cellpadding="0">
	 <tr style="padding-bottom: 10px;">
		{section name="user" loop=$users}
		<td class="list_item" {if $smarty.section.user.iteration%2 == 0 } style="padding-left: 10px;" {else} style="padding-right: 10px;" {/if}>
			<table class="memberstable normaltext" height="120" border="0" cellpadding="0" cellspacing="0">
				<tr>
					<td class="leftc">
						<div class="photo">
							<a href="{$cfg.path.url_site}profile/{screenname user_id=$users[user].id}"><img src="{$cfg.path.url_site}showphoto.php?id={$users[user].id}&m=Y&t=r&p=1" /></a>
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
							<a href="{$cfg.path.url_site}profile/{screenname user_id=$users[user].id}" class="featuredBoxLink" style="font-size: 14px;">{$users[user].screenname}</a>
						</div>
						<div class="info normaltext">
							{age birthday=$users[user].birthdate} yr old {assign var="sex" value=$users[user].sex}{$cfg.profile.sex[$sex]}
						</div>
						<div class="info normaltext">
							Looking For: {looking looking=$users[user].looking}
						</div>
						<div class="info normaltext">
							Summary: {if $users[user].introtitle}{$users[user].introtitle|truncate:30:"..."}{else}Ask Me.{/if}
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
</div>

{if $pager.links}
<table class="normaltext" cellpadding="0" cellspacing="0" style="width: 760px;">
	<tr>
		{foreach from=$pager.links item=link}
		<td style="text-align: right;" class="featuredBoxLink">{$link}</td>
		{/foreach}
	</tr>
</table>
{/if}

{if $result_nav}
<table class="normaltext" cellpadding="0" cellspacing="0" style="width: 760px;">
	<tr>
		<td style="text-align: right;" class="featuredBoxLink">[ &nbsp;{$result_nav}&nbsp; ]</td>
	</tr>
</table>
{/if}

{*{else}

<table class="memberstable normaltext" cellpadding="0" cellspacing="0" style="width: 760px; height: 650px;">
	<tr>
		<td style="font-weight: bold; vertical-align: top;">No results found.</td>
	</tr>
</table>*}
