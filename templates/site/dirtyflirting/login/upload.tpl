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
							 <td width="568" align="center">
								 <table width="560" border="0" cellpadding="0" cellspacing="0">
									 <tr style="padding: 5px 5px 5px 5px;">
										 <td colspan="2" width="280" align="left" valign="bottom">
										 </td>
										 <td colspan="2" width="280" align="right" valign="top" class="details_text"><a href="{$cfg.path.url_site}mem_myprofile.php" class="details_text"><u>Profile Summary</u></a> | <a href="{$cfg.path.url_site}mem_uploadvideos.php" class="details_text"><u>Edit or Upload Your Video</u></a></td>
									 </tr>
									 <tr style="padding: 10px 10px 10px 10px;">
										 <td colspan="2" width="280" class="myprofile_text">
											 <table width="260" height="120" border="0">
												 <form method="post" action="{$cfg.path.url_content}uploadphoto.php">
												 <input type="hidden" name="id" value="{$smarty.session.sess_id}">
												 <input type="hidden" name="pic_id" value="1">
													 <tr>
														 <td width="100" height="100" align="left" valign="top">
															 <img border="1" src="{$cfg.path.url_site}showphoto.php?id={$smarty.session.sess_id}&t=s&p=1" style="border-color: #FFFFFF;"/>
														 </td>
														 <td align="left" width="160" height="100" valign="top">
															 {if $photos[0].id}
																 {if $photos[0].photo_main == 'Y'}<b>Main Profile Photo</b>{else}Additional Photo{/if}<br>{if $photos[0].approved == 'Y' and $photos[0].photo_main != 'Y'}<a href="{$cfg.path.url_site}mem_mainphoto.php?id={$smarty.session.sess_id}&p=1" class="myprofile_text"><b>set as main</b></a>{/if}<br><br><b>Title:</b> {$photos[0].photo_name}<br/><br/><b>Description:</b><br/>{$photos[0].photo_description}
															 {else}
																 (upload photo now)
															 {/if}
														 </td>
													 </tr>
													 <tr>
														 <td colspan="2" align="left" height="20">
															 {if $photos[0].id}
																 <input type="submit" name="delete" value="Delete" /> or <a href="{$cfg.path.url_site}mem_viewphotos.php?id={$smarty.session.sess_id}&pic_id=1" class="myprofile_text"><b>view</b></a> &nbsp;{if $photos[0].approved == 'Y'}" approved "{else}" pending approval "{/if}
															 {/if}
														 </td>
													 </tr>
												 </form>
											 </table>
										 </td>
										 <td colspan="2" width="280" class="myprofile_text">
											 <table width="260" height="120" border="0">
												 <form method="post" action="{$cfg.path.url_content}uploadphoto.php">
												 <input type="hidden" name="id" value="{$smarty.session.sess_id}">
												 <input type="hidden" name="pic_id" value="2">
													 <tr>
														 <td width="100" height="100" align="left" valign="top">
															 <img border="1" src="{$cfg.path.url_site}showphoto.php?id={$smarty.session.sess_id}&t=s&p=2" style="border-color: #FFFFFF;"/>
														 </td>
														 <td align="left" width="160" height="100" valign="top">
															 {if $photos[1].id}
																 {if $photos[1].photo_main == 'Y'}<b>Main Profile Photo</b>{else}Additional Photo{/if}<br>{if $photos[1].approved == 'Y' and $photos[1].photo_main != 'Y'}<a href="{$cfg.path.url_site}mem_mainphoto.php?id={$smarty.session.sess_id}&p=2" class="myprofile_text"><b>set as main</b></a>{/if}<br><br><b>Title:</b> {$photos[1].photo_name}<br/><br/><b>Description:</b><br/>{$photos[1].photo_description}
															 {else}
																 (upload photo now)
															 {/if}
														 </td>
													 </tr>
													 <tr>
														 <td colspan="2" align="left" height="20">
															 {if $photos[1].id}
																 <input type="submit" name="delete" value="Delete" /> or <a href="{$cfg.path.url_site}mem_viewphotos.php?id={$smarty.session.sess_id}&pic_id=2" class="myprofile_text"><b>view</b></a> &nbsp;{if $photos[1].approved == 'Y'}" approved "{else}" pending approval "{/if}
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
												 <form method="post" action="{$cfg.path.url_content}uploadphoto.php">
												 <input type="hidden" name="id" value="{$smarty.session.sess_id}">
												 <input type="hidden" name="pic_id" value="3">
													 <tr>
														 <td width="100" height="100" align="left" valign="top">
															 <img border="1" src="{$cfg.path.url_site}showphoto.php?id={$smarty.session.sess_id}&t=s&p=3" style="border-color: #FFFFFF;"/>
														 </td>
														 <td align="left" width="160" height="100" valign="top">
															 {if $photos[2].id}
																 {if $photos[2].photo_main == 'Y'}<b>Main Profile Photo</b>{else}Additional Photo{/if}<br>{if $photos[2].approved == 'Y' and $photos[2].photo_main != 'Y'}<a href="{$cfg.path.url_site}mem_mainphoto.php?id={$smarty.session.sess_id}&p=3" class="myprofile_text"><b>set as main</b></a>{/if}<br><br><b>Title:</b> {$photos[2].photo_name}<br/><br/><b>Description:</b><br/>{$photos[2].photo_description}
															 {else}
																 (upload photo now)
															 {/if}
														 </td>
													 </tr>
													 <tr>
														 <td colspan="2" align="left" height="20">
															 {if $photos[2].id}
																 <input type="submit" name="delete" value="Delete" /> or <a href="{$cfg.path.url_site}mem_viewphotos.php?id={$smarty.session.sess_id}&pic_id=3" class="myprofile_text"><b>view</b></a> &nbsp;{if $photos[2].approved == 'Y'}" approved "{else}" pending approval "{/if}
															 {/if}
														 </td>
													 </tr>
												 </form>
											 </table>
										 </td>
										 <td colspan="2" width="280" class="myprofile_text">
											 <table width="260" height="120" border="0">
												 <form method="post" action="{$cfg.path.url_content}uploadphoto.php">
												 <input type="hidden" name="id" value="{$smarty.session.sess_id}">
												 <input type="hidden" name="pic_id" value="4">
													 <tr>
														 <td width="100" height="100" align="left" valign="top">
															 <img border="1" src="{$cfg.path.url_site}showphoto.php?id={$smarty.session.sess_id}&t=s&p=4" style="border-color: #FFFFFF;"/>
														 </td>
														 <td align="left" width="160" height="100" valign="top">
															 {if $photos[3].id}
																 {if $photos[3].photo_main == 'Y'}<b>Main Profile Photo</b>{else}Additional Photo{/if}<br>{if $photos[3].approved == 'Y' and $photos[3].photo_main != 'Y'}<a href="{$cfg.path.url_site}mem_mainphoto.php?id={$smarty.session.sess_id}&p=4" class="myprofile_text"><b>set as main</b></a>{/if}<br><br><b>Title:</b> {$photos[3].photo_name}<br/><br/><b>Description:</b><br/>{$photos[3].photo_description}
															 {else}
																 (upload photo now)
															 {/if}
														 </td>
													 </tr>
													 <tr>
														 <td colspan="2" align="left" height="20">
															 {if $photos[3].id}
																 <input type="submit" name="delete" value="Delete" /> or <a href="{$cfg.path.url_site}mem_viewphotos.php?id={$smarty.session.sess_id}&pic_id=4" class="myprofile_text"><b>view</b></a> &nbsp;{if $photos[3].approved == 'Y'}" approved "{else}" pending approval "{/if}
															 {/if}
														 </td>
													 </tr>
												 </form>
											 </table>
										 </td>
									 </tr>
									 <form enctype="multipart/form-data" method="post" action="{$cfg.path.url_content}uploadphoto.php">
									 <input type="hidden" name="id"			value="{$smarty.session.sess_id}">
									 <input type="hidden" name="typeusr" value="{$smarty.session.sess_typeusr}">
									 <tr style="padding: 10px 10px 10px 10px;">
										 <td colspan="2" width="280" align="left" valign="top" class="myprofile_text">
											 <b>Terms:</b> <br/><br/>
											 The following are the basic rules when uploading content to HornyBook. By Uploading images you agree to these rules and the terms of the site.Any images uploaded not inaccordance with the terms will be deleted and/or may be reported to a federal agency.The full terms can be found inour published terms and conditions at the bottom of the page. <br><br>
											 <b>1.</b> Only Images of yourself and your partner (if applicable) are allowed to be uploaded. <br>
											 <b>2.</b> No images of animals, anyone appearing under 18 or other items other than the person(s) featuredin the profile. <br>
											 <b>3.</b> No images of acts such as torture or pain. <br>
											 <b>4.</b> No Images of objects such as cars, bikes or any copyrighted images. <br>
											 <b>5.</b> No contact details to be included in any images. <br>
											 <b>6. <font color="red">Dont upload images bigger than 1MB.</font></b>
										 </td>
										 <td colspan="2" width="280" align="left" valign="top" class="myprofile_text">
											 <b>Upload Your Photo:</b> <br/><br/>
											 {if $photos_nr < 4}
											 Photo Title <br/>
											 <input type="text" name="photo_name" class="search_input" style="width: 250px;" {if $photo_name}value="{$photo_name}"{/if}> <br/>
											 Photo Description <br/>
											 <textarea name="photo_description" class="search_input" style="width: 250px; height: 100px;">{if $photo_description}{$photo_description}{/if}</textarea> <br/>
											 Photo File <br/>
											 <input type="file" name="photo_file" class="search_input" style="width: 250px;"> <br/><br/>
											 <input type="submit" value="Upload Photo" name="upload_photo">
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