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
				 
					 <table width="568" height="710" border="0" cellpadding="0" cellspacing="0">
						 <tr>
							 <td height="3" width="568"></td>
						 </tr>
						 <tr valign="top">
							 <td width="568"	align="center">
								 <table width="560" border="0" cellpadding="0" cellspacing="0">
									 <tr style="padding: 5px;">
										 <td colspan="2" width="280" align="left" valign="bottom">
										 </td>
										 <td colspan="2" width="280" align="right" valign="top" class="details_text"><a href="{$cfg.path.url_site}mem_myprofile.php" class="details_text"><u>Profile Summary</u></a> | Record Video | <a href="{$cfg.path.url_site}mem_uploadvideos.php" class="details_text"><u>Edit/Upload Video</u></a></td>
									 </tr>
									 <tr style="padding: 10px;" height="310">
										 <td colspan="4" align="center" valign="middle" class="myprofile_text">
											 {if $videos_nr < 4}
											 <object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,19,0" width="384" height="300">
												 <param name="movie" value="http://74.200.198.66/videorecorder/Recorder.swf?userid={$smarty.session.sess_id}" />
												 <param name="quality" value="high" />
												 <embed src="http://74.200.198.66/videorecorder/Recorder.swf?userid={$smarty.session.sess_id}" quality="high" pluginspage="http://www.macromedia.com/go/getflashplayer" type="application/x-shockwave-flash" width="384" height="300"></embed>
											 </object>
											 {else}
											 You reached maximum limit for videos on your account.
											 {/if}
										 </td>
									 </tr>
									 <tr style="padding: 10px 10px 10px 10px;">
										 <td colspan="2" width="280" align="left" valign="top" class="myprofile_text">
											 <b>Terms:</b> <br/><br/>
											 The following are the basic rules when uploading content to FlirtiGo. By Uploading video you agree to these rules and the terms of the site.Any video uploaded not in accordance with the terms will be deleted and/or may be reported to a federal agency.The full terms can be found inour published terms and conditions at the bottom of the page. <br><br>
											 <b>1.</b> Only Video of yourself and your partner	(if applicable) are allowed to be uploaded. <br>
											 <b>2.</b> No video of animals, anyone appearing under 18 or other items other than the person(s) featured in the profile. <br>
											 <b>3.</b> No video of acts such as torture or pain. <br>
											 <b>4.</b> No Video solely of objects such as cars, bikes or any copyrighted images. <br>
											 <b>5.</b> No contact details to be included in any video. <br>
											 <b>6.</b> Dont upload video files bigger than 10MB.
										 </td>
										 <td colspan="2" width="280" align="left" valign="top" class="myprofile_text">
											 <b>Intrustions:</b> <br/><br/>
											 Use our simple recording system to Record, Previewand Upload Videos to be approved and added to your profile for others to watch. <br><br>
											 <b>1.</b> Ensure you have read the rules on the left. <br>
											 <b>2.</b> Ensure the preview screen is showing a clear,bright image before you begin. <br>
											 <b>3.</b> When ready, press <b>record</b> and begin to talk, perfrom or present yourself to the web cam. <br>
											 <b>4.</b> When you are finished press <b>stop</b> and your video is saved temporarily. Do not leave the web page at this stage or you will lose your video. <br>
											 <b>5.</b> If you are unhappy, just press <b>record again</b> to start over. Your previous video will be lost. <br>
											 <b>6.</b> When you are happy with your video, press <b>save</b> and it will be submitted to revirew and will appear in your profile within 48 hours of <b>approval</b>. <br>
											 <b>7.</b> You will see a preview of your submission on your profile Summary or Edit Video Page Shortly.
										 </td>
									 </tr>
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