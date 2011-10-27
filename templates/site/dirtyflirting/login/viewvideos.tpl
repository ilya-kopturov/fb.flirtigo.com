 <tr>
	 <td align="center" valign="top">
	 <table width="780" border="0" cellpadding="0" cellspacing="0">
			 <tr>
				 <td valign="top" align="center" width="205">
					 {include file="site/dirtyflirting/login/menu.tpl"}
					 <table><tr><td height="2"></td></tr></table>
				 </td>
				 <td width="2"></td>
				 <td valign="top" align="center" width="573">
					 {include file="site/dirtyflirting/login/details.tpl"}
					 <table><tr><td height="2"></td></tr></table>
					 <table width="568" border="0" cellpadding="0" cellspacing="0">
						 <tr>
							 <td height="3" width="568" background="{$cfg.template.url_template}login/images/circle_top.gif"></td>
						 </tr>
						 <tr valign="top">
							 <td width="568" height="704"	align="center" >
								 <table width="560" border="0" cellpadding="0" cellspacing="0">
									 <tr>
										 <td width="35" height="45" align="center">
										 </td>
										 <td width="10" align="center">
										 </td>
										 <td width="540" align="left" class="details_text">
											 <b>View Videos of {$user.screenname}</b>
										 </td>
									 </tr>
									 <tr style="padding: 50px 10px 90px 10px;">
										 <td align="center" colspan="3">
											 {assign var=vid value=$video_id-1}
											 <object type="application/x-shockwave-flash" id="flashplayer" classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" width="320" height="260">
												 <param name="movie" value="{$cfg.path.url_site}media/videoplayer/flvplayer.swf" />
												 <param name="allowfullscreen" value="true" />
												 <param name="flashvars" value="&file={$cfg.path.url_videos}flv/{$videos[$vid].user_id}_{$videos[$vid].id}.flv&image={$cfg.path.url_videos}thumb/{$videos[$vid].user_id}_{$videos[$vid].id}_m.jpg&height=260&width=320">
												 <embed type="application/x-shockwave-flash" name="flashplayer" allowfullscreen="true" width="320" height="260" src="{$cfg.path.url_site}media/videoplayer/flvplayer.swf" flashvars="file={$cfg.path.url_videos}flv/{$videos[$vid].user_id}_{$videos[$vid].id}.flv&amp;image={$cfg.path.url_videos}thumb/{$videos[$vid].user_id}_{$videos[$vid].id}_m.jpg&amp;height=260&amp;width=320"></embed>
											 </object>
										 </td>
									 </tr>
									 <tr style="padding: 10px 10px 10px 10px;">
										 <td align="center" colspan="3" valign="top">
											 <table width="400" border="0" cellpadding="0" cellspacing="0">
												 <tr>
													 <td>
													 <table border="0" cellpadding="0" cellspacing="0">
														 <tr align="left" valign="top">
															 <td width="150" class="myprofile_text">
																 <a href="{$cfg.path.url_site}mem_profile.php?id={$user.id}" class="myprofile_text">{$user.screenname}</a> <br>
																	Video No: {$video_id} <br>
																	Added: {$videos[$vid].upload_date} <br>
																	Views: {$videos[$vid].video_viewed}
															 </td>
															 <td width="250" class="myprofile_text">
																 <input type="text" name="link" value="{$cfg.path.url_site}profileid.php?profile={$user.id}" class="search_input" style="width: 200px;"> <br><br>
																 {rateme rating=$user.rating id=$user.id} &nbsp; <B>{$votes}</B> Votes (<B>{$user.rating|string_format:"%.2f"}</B>)
															 </td>
														 </tr>
													 </table>
													 </td>
												 </tr>
												 <tr style="padding-top: 13px;">
													 <td align="left">
													 <table width="400" border="0" cellpadding="0" cellspacing="0">
														 <tr align="left" valign="top">
															 <td class="myprofile_text">
															 </td>
														 </tr>
														 <tr style="padding-top: 10px">
															 <td align="center" class="myprofile_text">
																 {section name=more loop=$videos}
																	 {if $smarty.section.more.iteration != $video_id}
																		 <label>
																			 <a href="{$cfg.path.url_site}mem_viewvideos.php?id={$user.id}&video_id={$smarty.section.more.iteration}"><img border="1" src="{$cfg.path.url_site}showvideo.php?id={$user.id}&p={$smarty.section.more.iteration}" style="border-color: #FFFFFF;"></a>&nbsp;&nbsp;
																		 <label>
																	 {/if}
																 {/section}
																 
																 {if $nr_videos <= 1}
																	 <label>
																		 No more videos from {$user.screenname}.
																	 </label>
																 {/if}
															 </td>
														 </tr>
													 </table>
													 </td>
												 </tr>
												 {*<tr style="padding-top: 20px;">
													 <td align="center">
														 <a href="{$cfg.path.url_site}mem_profile.php?id={$user.id}" class="myprofile_text">View {$user.screenname} full profile</a>
													 </td>
												 </tr>*}
											 </table>
										 </td>
									 </tr>
								 </table>
							 </td>
						 </tr>
						 <tr>
							 <td height="3" width="568" background="{$cfg.template.url_template}login/images/circle_bottom.gif"></td>
						 </tr>
					 </table>
				 </td>
			 </tr>
		 </table>
	 </td>
 </tr>