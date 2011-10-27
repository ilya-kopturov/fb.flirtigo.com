{include file="site/dirtyflirting/login/menu.tpl"}



<table class="center" id="upgrade">

	<tr>

		<td valign="top" align="center">

		{* MEMBER PAGE - RIGHT - *}

			<div id="upgrade">

				<ul>

					<table width="768" height="486" border="0" cellpadding="0" cellspacing="0">

					 <tr>

						 <td height="10" width="568"></td>

					 </tr>

					 <tr valign="top">

						 <td width="568"	align="center">

							 <table width="560" border="0" cellpadding="0" cellspacing="0">

								 <tr style="padding: 10px 10px 10px 10px;">

									 <td colspan="2" width="280" class="myprofile_text">

										 <table width="735" height="316" border="0">

											 <form method="post" action="index.php">

											 <input type="hidden" name="id" value="{$smarty.session.sess_id}">

												 {if $user.id>0}

												 <tr>

												 <td width="735" height="216" align="center" valign="top">

												 <table class="memberstable normaltext" cellpadding="0" cellspacing="0" style="width: 370px;">

													<tr>

														<td style="text-align: center; color: #900202; font-weight: bold;" class="normaltext">Ready to contact {$user.screenname} now?

														</td>

													</tr>

													<td>

											 			<table width="576" height="120" border="0" cellpadding="0" cellspacing="0">

														<tr>

															 <td width="85">

																 <table cellpadding="0" cellspacing="0" border="0">

																	 <tr>

																		 <td style="padding-top: 5px; padding-left: 10px;">

																			 {if $videogallery}

																				 <a href="{$cfg.path.url_site_ssl}profile/{screenname user_id=$user.id}#Videos"><img class="preview" src="https://www.flirtigo.com/videothumb.php?{rnd_md5}&id={$user.videoid}&user_id={$user.id}" /></a>

																			 {else}

																				 <a href="{$cfg.path.url_site_ssl}profile/{screenname user_id=$user.id}"><img class="preview" src="https://www.flirtigo.com/showphoto.php?id={$user.id}&m=Y&t=r&p=1" /></a>

																			 {/if}

											 </td>

										 </tr>

										 <tr>

											 <td style="padding-top: 5px; padding-left: 10px; padding-bottom: 5px; text-align: left;">Rating: <br /> {rateme id=$user.id screenname=$user.screenname rating=$user.rating}</td>

										 </tr>

									 </table>

								 </td>

								 <td width="285">

									 <table cellpadding="0" cellspacing="0" border="0" style="width: 285px;">

										 

										 <tr style="padding-top: 5px; padding-left: 10px;">

											 <td class="normaltext screenname">

											 	{if $user.withpicture eq 'Y'}

											 	<img src="{$cfg.template.url_template_ssl}login/images/dirtyflirting_mailpicture.gif" alt="FlirtiGo.com" />

											 	{/if}

											 	{if $user.withvideo eq 'Y'}

											 	<img src="{$cfg.template.url_template_ssl}login/images/dirtyflirting_mailvideo.gif" alt="FlirtiGo.com" />

											 	{/if}

											 	{$user.screenname}

											 </td>

										 </tr>

										 <tr>

											 <td class="normaltext info">

												 {age birthday=$user.birthdate} yr old {assign var="sex" value=$user.sex}{$cfg.profile.sex[$sex]}

											 </td>

										 </tr>

										 <tr>

											 <td class="normaltext info">

												 {location type="short" typeloc=$user.typeloc city=$user.city country=$user.country joined=$user.joined}

											 </td>

										 </tr>

										 <tr>

											 <td class="normaltext info">

												 Looking For: {looking looking=$user.looking}

											 </td>

										 </tr>

										 <tr>

											 <td class="normaltext info">

												 Summary: {if $user.introtitle}{$user.introtitle|truncate:60:"..."}{else}Ask Me.{/if}

											 </td>

										 </tr>

										 {if $videogallery}

										 <tr>

											 <td class="normaltext info">

												 Private: {if $user.gallery}No{else}Yes <div style="display: inline;"><a href="javascript:;" onclick="requestpassword({$user.id})">Request password</a></div>{/if}

											 </td>

										 </tr>											 

										 {/if}

										 <tr>

											 <td style="padding-top: 2px; padding-left: 10px;">

												 <table style="width: 100%" cellpadding="0" cellspacing="0">

													 <tr>

													 {*<td style="text-align: left;" class="normaltext">

															 Last Login: {lastlogin lastlogin=$user.lastlogin}

														 </td>*}

													 </tr>

												 </table>

											 </td>

										 </tr>

									 </table>

								 </td>

						</tr>

					 </table>

													</td>

													</table>

									 			</td> 

					 </td>

			</tr>

			{/if}

														 <tr>

															 <td width="735" align="center" valign="top">

																 <img border="0" src="images/upgradeoptions.jpg" style="border-color: #FFFFFF;"/>

															 </td>

			</tr>

			<tr>

															 <td width="735" height="36" align="center" valign="top">

					<input name="acctype" type="radio" value="2" checked>3 Months Special Offer Upgrade to FlirtiGo just {$pricetwo} (thats 1 Month FREE)!

															 </td>

			</tr>

			<tr>

															 <td width="735" height="36" align="center" valign="top">

					<input name="acctype" type="radio" value="1">1 Month Upgrade to FlirtiGo just {$priceone}

															 </td>

			</tr>

			{$errori}

			<tr>

															 <td width="735" height="56" align="center" valign="top">

															 Choose payment <select name="ptype" id="select">

															 <option value="no" selected>Choose payment method</option>
																		 <option value="ccbillcc">Pay with my Credit/Debit Card</option>

																		 {if $countryName=='United States'}

																		 <option value="ccbillck">Using my US Checking Account</option>

						 {/if}

						 {if $countryName=='Canada'}

																		 <option value="charge">Using my CA Checking Account</option>

						 {/if}

						 <option value="mailin">Mail in Cash or a Money Orders</option>

						 

						 {if $countryName!='Great Britain (UK)'}

																		 <option value="charge">See other way to pay ...</option>

						 {/if}

						 	

			</select>	

															 </td>

			</tr>

													 <tr>

														 <td colspan="2" align="center" height="10">

																 <!--<INPUT type="image" name="submit" src="{$cfg.template.url_template_ssl}login/images/dirtyflirting_upgradenow.gif">-->

																 <input type="submit" name="submit" value="Upgrade Now!">

														 </td>

													 </tr>

												</form>

						 					</table>

										 </td>

									</tr>

								</table>

							</td>

						</tr>

					</table>	 

				</ul>

			</div>

		</td>

	</tr>

</table>