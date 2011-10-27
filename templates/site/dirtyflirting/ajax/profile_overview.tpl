{* $Id: profile_overview.tpl 537 2008-06-13 14:30:38Z andi $ *}



<table border="0" cellpadding="0" cellspacing="0" id="profile_overview" width="100%" height="100%">

	<tr>

		<td class="generic_container" width="540" valign="top">

			<table border="0" cellpadding="5" cellspacing="0" width="100%" height="100%">

			<tr>

				<td valign="top">

				<table border="0" cellpadding="0" cellspacing="0">

					<tr><td colspan="2"><span style="font-size:16px"><b>Profile Name</b>:</span>&nbsp;<span style="font-size:16px;color:#900202">{$user.screenname}</span></td></tr>

					<tr><td colspan="2"><img src="{$cfg.image.pixel}" height="10"></td></tr>

					<tr><td><b>Sex</b>:&nbsp;{$cfg.profile.sex[$user.sex]}</td>
					  <td><b>Age</b>:&nbsp;{age birthday=$user.birthdate}</td>
					</tr>

					<tr><td colspan="2"><b>Looking for</b>:&nbsp;{looking looking=$user.looking}</td></tr>

					<tr>

						<td width="200"><b>Profile viewed</b>:&nbsp;{$viewed}</td>

						<td><b>Rating</b>:&nbsp;{rateme id=$user.id screenname=$user.screenname rating=$user.rating}</td>

					</tr>

				</table>

				<div><img src="{$cfg.image.pixel}" height="10"></div>

				{if $user.sex eq '2'}

				<div style="font-size:16px"><b>You:</b>&nbsp;</div>

				<table border="0" cellpadding="0" cellspacing="0">

					<tr>

						<td width="200">

							<b>Sex</b>:&nbsp;{$cfg.profile.sex[$user.couple_gender_1]}

						</td>

						<td>

							<b>Age</b>:&nbsp;{age birthday=$user.birthdate}

						</td>

					</tr>

					<tr>

						<td width="200">

							<b>Ethnicity</b>:&nbsp;{$cfg.profile.ethnicity[$user.ethnicity]}

						</td>

						<td>

							<b>Height</b>:&nbsp;{$cfg.profile.height[$user.height]}

						</td>

					</tr>

					<tr>

						<td width="200">

							<b>Weight</b>:&nbsp;{$cfg.profile.weight[$user.weight]}

						</td>

						<td>

							<b>Body shape</b>:&nbsp;{$cfg.profile.bodytype[$user.bodytype]}

						</td>

					</tr>

					<tr>

						<td width="200">

							<b>Hair color</b>:&nbsp;{$cfg.profile.haircolor[$user.haircolor]}

						</td>

						<td>

							<b>Eye color</b>:&nbsp;{$cfg.profile.eyecolor[$user.eyecolor]}

						</td>

					</tr>

				</table>

				<div><img src="{$cfg.image.pixel}" height="10"></div>

				<div style="font-size:16px"><b>Your partner:</b>&nbsp;</div>

				<table border="0" cellpadding="0" cellspacing="0">

					<tr>

						<td width="200">

							<b>Sex</b>:&nbsp;{$cfg.profile.sex[$user.couple_gender_2]}

						</td>

						<td>

							<b>Age</b>:&nbsp;{age birthday=$user.p_birthdate}

						</td>

					</tr>

					<tr>

						<td width="200">

							<b>Ethnicity</b>:&nbsp;{$cfg.profile.ethnicity[$user.p_ethnicity]}

						</td>

						<td>

							<b>Height</b>:&nbsp;{$cfg.profile.height[$user.p_height]}

						</td>

					</tr>

					<tr>

						<td width="200">

							<b>Weight</b>:&nbsp;{$cfg.profile.weight[$user.p_weight]}

						</td>

						<td>

							<b>Body shape</b>:&nbsp;{$cfg.profile.bodytype[$user.p_bodytype]}

						</td>

					</tr>

					<tr>

						<td width="200">

							<b>Hair color</b>:&nbsp;{$cfg.profile.haircolor[$user.p_haircolor]}

						</td>

						<td>

							<b>Eye color</b>:&nbsp;{$cfg.profile.eyecolor[$user.p_eyecolor]}

						</td>

					</tr>

				</table>

				{else}

				<table border="0" cellpadding="0" cellspacing="0">

					<tr>

						<td width="200">

							<b>Ethnicity</b>:&nbsp;{$cfg.profile.ethnicity[$user.ethnicity]}

						</td>

						<td>

							<b>Height</b>:&nbsp;{$cfg.profile.height[$user.height]}

						</td>

					</tr>

					<tr>

						<td width="200">

							<b>Weight</b>:&nbsp;{$cfg.profile.weight[$user.weight]}

						</td>

						<td>

							<b>Body shape</b>:&nbsp;{$cfg.profile.bodytype[$user.bodytype]}

						</td>

					</tr>

					<tr>

						<td width="200">

							<b>Hair color</b>:&nbsp;{$cfg.profile.haircolor[$user.haircolor]}

						</td>

						<td>

							<b>Eye color</b>:&nbsp;{$cfg.profile.eyecolor[$user.eyecolor]}

						</td>

					</tr>

				</table>

				{/if}

				<div><img src="{$cfg.image.pixel}" height="10"></div>

				<table border="0" cellpadding="0" cellspacing="0">

					<tr>

						<td width="200">

							<span style="font-size:16px"><b>City</b>:</span>&nbsp;{$user.city}

						</td>

						<td>

							<span style="font-size:16px"><b>Country</b>:</span>&nbsp;{$cfg.countries[$user.country]}

						</td>

					</tr>

				</table>

				<div><img src="{$cfg.image.pixel}" height="10"></div>

				<div><span><b>Current email address</b>:</span>&nbsp;{$user.email}&nbsp;<a href="javascript:;" onclick="$('#profile > ul').tabs('select', 8)" style="font-size:11px">[edit]</a></div>

				<div><span><b>Private gallery password</b>:</span>&nbsp;{if $user.gallery_pass}{$user.gallery_pass}{else}[not set]{/if}&nbsp;<a href="javascript:;" onclick="$('#profile > ul').tabs('select', 8)" style="font-size:11px">[edit]</a></div>

				<div><img src="{$cfg.image.pixel}" height="10"></div>

				<div>
					<span><b>Profile Title:</b>&nbsp;</span>
			        <span>{$user.introtitle|nl2br}</span>
				</div>
				<div class="clear"><img src="{$cfg.image.pixel}" height="10"></div>
				<div>

					<span><b>About {if $user.sex eq '2'}us{else}me{/if}:</b>&nbsp;</span>

			        <span>{$user.introtext|nl2br}</span>

				</div>

				<div class="clear"><img src="{$cfg.image.pixel}" height="10"></div>

				<div>

					<div><b>Looking for:</b>&nbsp;</div>

			        <div>{$user.describe|nl2br}</div>

				</div>

			  </td>

			</tr>

			<tr><td align="right" style="vertical-align:bottom"><a href="javascript:;" onclick="$('#profile > ul').tabs('select', 1)">[Edit profile]</a></td></tr>

			</table>

		</td>

		<td><img src="{$cfg.image.pixel}" width="10"></td>

		<td valign="top">

			<div>

				<div class="right_container">

					<div class="profile_right">

						<div class="title">Picture Gallery</div>

						<div><img src="{$cfg.image.pixel}" height="10"></div>

						<div class="content"><img src="showphoto.php?{rnd_md5}"></div>

						<div><img src="{$cfg.image.pixel}" height="10"></div>

						<div class="edit"><a href="javascript:;" onclick="$('#profile > ul').tabs('select', 2);">[Edit pictures]</a></div>

					</div>

				</div>

				<div class="clear"><img src="{$cfg.image.pixel}" height="10"></div>

				<div class="right_container">

					<div class="profile_right">

						<div class="title">Video Gallery</div>

						<div><img src="{$cfg.image.pixel}" height="10"></div>

						<div class="content"><img src="videothumb.php?{rnd_md5}"></div>

						<div><img src="{$cfg.image.pixel}" height="10"></div>

						<div class="edit"><a href="javascript:;" onclick="$('#profile > ul').tabs('select', 3);">[Edit videos]</a></div>

					</div>

				</div>

				<div class="clear"><img src="{$cfg.image.pixel}" height="10"></div>

				<div class="right_container">

					<div class="profile_right" id="profile_tags">

						<div class="title">My Search Tags</div>

						<div><img src="{$cfg.image.pixel}" height="10"></div>

						<div class="search_tags">

						{foreach name=tags from=$tags item=tag}

						{$tag.value}{if $smarty.foreach.tags.index < $smarty.foreach.tags.total - 1},{/if}

						{/foreach}

						</div>

						<div><img src="{$cfg.image.pixel}" height="10"></div>

						<div class="edit"><a href="javascript:;" onclick="$('#profile > ul').tabs('select', 5);">[Edit tags]</a></div>

					</div>

				</div>

			</div>

		</td>

	</tr>

</table>