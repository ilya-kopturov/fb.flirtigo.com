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
					 <table width="568" height="706" border="0" cellpadding="0" cellspacing="0">
						 <tr>
							 <td height="3" width="568"></td>
						 </tr>
						 <tr valign="top">
							 <td width="568"	align="center">
								 <table width="560" border="0" cellpadding="0" cellspacing="0">
									 <tr style="padding: 5px 5px 5px 5px;">
										 <td colspan="2" width="280" align="left" valign="bottom">
										 </td>
										 <td colspan="2" width="280" align="right" valign="top" class="details_text"><a href="{$cfg.path.url_site}mem_myprofile.php" class="details_text"><u>Profile Summary</u></a> | <a href="{$cfg.path.url_site}mem_recordvideos.php" class="details_text"><u>Record Video</u></a> | Edit/Upload Video</td>
									 </tr>
									 <tr style="padding: 10px 10px 10px 10px;">
										 <td colspan="2" width="280" class="myprofile_text">
											 <table width="260" height="120" border="0">
												 <form method="post" action="{$cfg.path.url_content}uploadvideo.php">
												 <input type="hidden" name="id" value="{$smarty.session.sess_id}">
												 <input type="hidden" name="video_id" value="1">
													 <tr>
														 <td width="100" height="100" align="left" valign="top">
															 <img border="1" src="{$cfg.path.url_site}showvideo.php?id={$smarty.session.sess_id}&p=1" style="border-color: #FFFFFF;"/>
														 </td>
														 <td align="left" width="160" height="100" valign="top">
															 {if $videos[0].id}
																 {if $videos[0].video_main == 'Y'}<b>Main Profile Video</b>{else}Additional Video{/if}<br>{if $videos[0].approved == 'Y' and $videos[0].video_main != 'Y'}<a href="{$cfg.path.url_site}mem_mainvideo.php?id={$smarty.session.sess_id}&p=1" class="myprofile_text"><b>set as main</b></a>{/if}<br><br><b>Title:</b> {$videos[0].video_name}<br/><br/><b>Description:</b><br/>{$videos[0].video_description}
															 {else}
																 (upload video now)
															 {/if}
														 </td>
													 </tr>
													 <tr>
														 <td colspan="2" align="left" height="20">
															 {if $videos[0].id}
																 <input type="submit" name="delete" value="Delete" /> or <a href="{$cfg.path.url_site}mem_viewvideos.php?id={$smarty.session.sess_id}&video_id=1" class="myprofile_text"><b>view</b></a> &nbsp;{if $videos[0].approved == 'Y'}" approved "{else}" pending approval "{/if}
															 {/if}
														 </td>
													 </tr>
												 </form>
											 </table>
										 </td>
										 <td colspan="2" width="280" class="myprofile_text">
											 <table width="260" height="120" border="0">
												 <form method="post" action="{$cfg.path.url_content}uploadvideo.php">
												 <input type="hidden" name="id" value="{$smarty.session.sess_id}">
												 <input type="hidden" name="video_id" value="2">
													 <tr>
														 <td width="100" height="100" align="left" valign="top">
															 <img border="1" src="{$cfg.path.url_site}showvideo.php?id={$smarty.session.sess_id}&p=2" style="border-color: #FFFFFF;"/>
														 </td>
														 <td align="left" width="160" height="100" valign="top">
															 {if $videos[1].id}
																 {if $videos[1].video_main == 'Y'}<b>Main Profile Video</b>{else}Additional Video{/if}<br>{if $videos[1].approved == 'Y' and $videos[1].video_main != 'Y'}<a href="{$cfg.path.url_site}mem_mainvideo.php?id={$smarty.session.sess_id}&p=2" class="myprofile_text"><b>set as main</b></a>{/if}<br><br><b>Title:</b> {$videos[1].video_name}<br/><br/><b>Description:</b><br/>{$videos[1].video_description}
															 {else}
																 (upload video now)
															 {/if}
														 </td>
													 </tr>
													 <tr>
														 <td colspan="2" align="left" height="20">
															 {if $videos[1].id}
																 <input type="submit" name="delete" value="Delete" /> or <a href="{$cfg.path.url_site}mem_viewvideos.php?id={$smarty.session.sess_id}&video_id=2" class="myprofile_text"><b>view</b></a> &nbsp;{if $videos[1].approved == 'Y'}" approved "{else}" pending approval "{/if}
															 {/if}
														 </td>
													 </tr>
												 </form>
											 </table>
										 </td>
									 </tr>
									 <tr style="padding: 10px 10px 10px 10px;">
										 <td colspan="2" width="280" class="myprofile_text">
											 <table width="260" height="120" border="0">
												 <form method="post" action="{$cfg.path.url_content}uploadvideo.php">
												 <input type="hidden" name="id" value="{$smarty.session.sess_id}">
												 <input type="hidden" name="video_id" value="3">
													 <tr>
														 <td width="100" height="100" align="left" valign="top">
															 <img border="1" src="{$cfg.path.url_site}showvideo.php?id={$smarty.session.sess_id}&p=3" style="border-color: #FFFFFF;"/>
														 </td>
														 <td align="left" width="160" height="100" valign="top">
															 {if $videos[2].id}
																 {if $videos[2].video_main == 'Y'}<b>Main Profile Video</b>{else}Additional Video{/if}<br>{if $videos[2].approved == 'Y' and $videos[2].video_main != 'Y'}<a href="{$cfg.path.url_site}mem_mainvideo.php?id={$smarty.session.sess_id}&p=3" class="myprofile_text"><b>set as main</b></a>{/if}<br><br><b>Title:</b> {$videos[2].video_name}<br/><br/><b>Description:</b><br/>{$videos[2].video_description}
															 {else}
																 (upload video now)
															 {/if}
														 </td>
													 </tr>
													 <tr>
														 <td colspan="2" align="left" height="20">
															 {if $videos[2].id}
																 <input type="submit" name="delete" value="Delete" /> or <a href="{$cfg.path.url_site}mem_viewvideos.php?id={$smarty.session.sess_id}&video_id=3" class="myprofile_text"><b>view</b></a> &nbsp;{if $videos[2].approved == 'Y'}" approved "{else}" pending approval "{/if}
															 {/if}
														 </td>
													 </tr>
												 </form>
											 </table>
										 </td>
										 <td colspan="2" width="280" class="myprofile_text">
											 <table width="260" height="120" border="0">
												 <form method="post" action="{$cfg.path.url_content}uploadvideo.php">
												 <input type="hidden" name="id" value="{$smarty.session.sess_id}">
												 <input type="hidden" name="video_id" value="4">
													 <tr>
														 <td width="100" height="100" align="left" valign="top">
															 <img border="1" src="{$cfg.path.url_site}showvideo.php?id={$smarty.session.sess_id}&p=4" style="border-color: #FFFFFF;"/>
														 </td>
														 <td align="left" width="160" height="100" valign="top">
															 {if $videos[3].id}
																 {if $videos[3].video_main == 'Y'}<b>Main Profile Video</b>{else}Additional Video{/if}<br>{if $videos[3].approved == 'Y' and $videos[3].video_main != 'Y'}<a href="{$cfg.path.url_site}mem_mainvideo.php?id={$smarty.session.sess_id}&p=4" class="myprofile_text"><b>set as main</b></a>{/if}<br><br><b>Title:</b> {$videos[3].video_name}<br/><br/><b>Description:</b><br/>{$videos[3].video_description}
															 {else}
																 (upload video now)
															 {/if}
														 </td>
													 </tr>
													 <tr>
														 <td colspan="2" align="left" height="20">
															 {if $videos[3].id}
																 <input type="submit" name="delete" value="Delete" /> or <a href="{$cfg.path.url_site}mem_viewvideos.php?id={$smarty.session.sess_id}&video_id=4" class="myprofile_text"><b>view</b></a> &nbsp;{if $videos[3].approved == 'Y'}" approved "{else}" pending approval "{/if}
															 {/if}
														 </td>
													 </tr>
												 </form>
											 </table>
										 </td>
									 </tr>
									 <form enctype="multipart/form-data" method="post" action="{$cfg.path.url_content}uploadvideo.php">
									 <input type="hidden" name="id"			value="{$smarty.session.sess_id}">
									 <input type="hidden" name="typeusr" value="{$smarty.session.sess_typeusr}">
									 <tr style="padding: 10px 10px 10px 10px;">
										 <td colspan="2" width="280" align="left" valign="top" class="myprofile_text">
											 <b>Terms:</b> <br/><br/>
											 The following are the basic rules when uploading content to HornyBook. By Uploading video you agree to these rules and the terms of the site. Any video uploaded not in accordance with the terms will be deleted and/or may be reported to a federal agency. The full terms can be found in our published terms and conditions at the bottom of the page. <br><br>
											 <b>1.</b> Only Video of yourself and your partner (if applicable) are allowed to be uploaded. <br>
											 <b>2.</b> No video of animals, anyone appearing under 18 or other items other than the person(s) featured in the profile. <br>
											 <b>3.</b> No video of acts such as torture or pain. <br>
											 <b>4.</b> No Video solely of objects such as cars, bikes or any copyrighted images. <br>
											 <b>5.</b> No contact details to be included in any video. <br>
											 <b>6. <font color="red">Dont upload video files bigger than {$cfg.option.video_size}MB.</font></b>
										 </td>
										 <td colspan="2" width="280" align="left" valign="top" class="myprofile_text">
											 <a href="{$cfg.path.url_site}mem_recordvideos.php" class="myprofile_text"><font color="red"><b>Record Your Video Now using a Webcam!:</b></font> </a><br/><br/>
											 <a href="{$cfg.path.url_site}mem_recordvideos.php" class="myprofile_text"><b>Click Here</b></a> to use our simple Flash recorder that helps you to record and upload images directly from your webcam. Alternatively, upload your own pre-recorded videos below. <br><br>
											 {if $videos_nr < 4}
											 Video Title <br/>
											 <input type="text" name="video_name" class="search_input" style="width: 250px;"	{if $video_name}value="{$video_name}"{/if}> <br/>
											 Video Description <br/>
											 <textarea name="video_description" class="search_input" style="width: 250px; height: 100px;"> {if $video_description}{$video_description}{/if}</textarea> <br/>
											 Video File <br/>
											 <input type="hidden" name="MAX_FILE_SIZE" value="5242880">
											 <input type="file" name="video_file" class="search_input" style="width: 250px;"> <br/><br/>
											 <input type="submit" value="Upload Video" name="upload_video">
											 {/if}
										 </td>
									 </tr>
									 </form>
								 </table>
							 </td>
						 </tr>
						 <tr>
							 <td height="3" width="568"></td>
						 </tr>
					 </table>
				 </td>
			 </tr>
		 </table>
	 </td>
 </tr>