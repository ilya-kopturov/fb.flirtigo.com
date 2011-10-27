/-* $Id: public_profile.tpl 531 2008-06-12 21:02:43Z andi $ *-/

<table border="0" cellpadding="0" cellspacing="0" id="profile_overview" width="570" height="100%">
	<tr>
		<td class="generic_container" valign="top">
			<table border="0" cellpadding="5" cellspacing="0" width="350" height="100%">
			<tr>
				<td valign="top">
					<div style="vertical-align: top;">
						<div style="float:left;margin-right:10px;vertical-align: top;">
							<div>
								<a href="javascript:;" onclick="showPicturePopup(/-$user.photo_id-/)">
									<img border="0" src="/-$cfg.path.url_site-/showphoto.php?id=/-$user.id-/">
								</a>
							</div>
							/-if $user.sex eq 2-/
							<div>/-online user_id=$user.id-/</div>
							/-else-/
							<div class="blacktitle" style="font-size:15px;font-weight:bold;color:black">/-$user.screenname-/</div>
							<div>/-online user_id=$user.id-/</div>
							<div id="rating_stars">
								<div style="float:left">Rating:&nbsp;</div>
								<div style="float:left">
									/-rateme id=$user.id screenname=$user.screenname rating=$user.rating-/
								</div>
							</div>
							/-/if-/
						</div>
						/-if $user.sex eq 2-/
						<div style="float:left">
							<div>
								<div class="redtitle" style="font-size:15px;font-weight:bold;color:red">/-$user.screenname-/</div>
								<div id="rating_stars">
									<div style="float:left">Rating:&nbsp;</div>
									<div style="float:left">
										/-rateme id=$user.id screenname=$user.screenname rating=$user.rating-/
									</div>
								</div>
							</div>
							<div class="clear"><img src="/-$cfg.image.pixel-/" height="5"></div>
							<div>
								<div>
									<span style="font-weight:bold">Sex:&nbsp;</span>
							        <span style="font-weight:normal">/-$cfg.profile.sex[$user.sex]-/</span>
								</div>
								<div>
									<span><b>Looking for:</b>&nbsp;</span>
							        <span>/-looking looking=$user.looking-/</span>
								</div>
							</div>
							/-if $smarty.session.sess_id-/
							<div class="clear"><img src="/-$cfg.image.pixel-/" height="5"></div>
							<div>
								<div>
									<span><b>Country:</b>&nbsp;</span>
									<span>/-location type="country" typeloc=$user.typeloc city=$user.city country=$user.country joined=$user.joined-/</span>
								</div>
								<div>
									<span><b>City:</b>&nbsp;</span>
									<span>/-location type="city" typeloc=$user.typeloc city=$user.city joined=$user.joined-/</span>
								</div>
							</div>
							/-/if-/
						</div>
						<div class="clear"><img src="/-$cfg.image.pixel-/" height="5"></div>
						<div>
							<div style="float:left">
								<div style="font-weight:bold;color:red">Partner #1:</div>
								<div>
									<span style="font-weight:bold">Sex:&nbsp;</span>
							        <span style="font-weight:normal">/-$cfg.profile.sex[$user.couple_gender_1]-/</span>
								</div>
								<div>
									<span><b>Age:</b>&nbsp;</span>
							        <span>/-age birthday=$user.birthdate-/</span>
								</div>
								<div>
									<span><b>Ethnicity:</b>&nbsp;</span>
							        <span>/-$cfg.profile.ethnicity[$user.ethnicity]-/</span>
								</div>
								<div>
									<span><b>Height:</b>&nbsp;</span>
							        <span>/-$cfg.profile.height[$user.height]-/</span>
								</div>
								<div>
									<span><b>Weight:</b>&nbsp;</span>
							        <span>/-$cfg.profile.weight[$user.weight]-/</span>
								</div>
								<div>
									<span><b>Body Shape:</b>&nbsp;</span>
							        <span>/-$cfg.profile.bodytype[$user.bodytype]-/</span>
								</div>
								<div>
									<span><b>Hair Color:</b>&nbsp;</span>
							        <span>/-$cfg.profile.haircolor[$user.haircolor]-/</span>
								</div>
							</div>
							<div style="float:right">
								<div style="font-weight:bold;color:red">Partner #2:</div>
								<div>
									<span style="font-weight:bold">Sex:&nbsp;</span>
							        <span style="font-weight:normal">/-$cfg.profile.sex[$user.couple_gender_2]-/</span>
								</div>
								<div>
									<span><b>Age:</b>&nbsp;</span>
							        <span>/-age birthday=$user.p_birthdate-/</span>
								</div>
								<div>
									<span><b>Ethnicity:</b>&nbsp;</span>
							        <span>/-$cfg.profile.ethnicity[$user.p_ethnicity]-/</span>
								</div>
								<div>
									<span><b>Height:</b>&nbsp;</span>
							        <span>/-$cfg.profile.height[$user.p_height]-/</span>
								</div>
								<div>
									<span><b>Weight:</b>&nbsp;</span>
							        <span>/-$cfg.profile.weight[$user.p_weight]-/</span>
								</div>
								<div>
									<span><b>Body Shape:</b>&nbsp;</span>
							        <span>/-$cfg.profile.bodytype[$user.p_bodytype]-/</span>
								</div>
								<div>
									<span><b>Hair Color:</b>&nbsp;</span>
							        <span>/-$cfg.profile.haircolor[$user.p_haircolor]-/</span>
								</div>
							</div>
						</div>
						/-else-/
						<div style="float:left">
							<div>
								<span style="font-weight:bold">Sex:&nbsp;</span>
						        <span style="font-weight:normal">/-$cfg.profile.sex[$user.sex]-/</span>
							</div>
							<div>
								<span><b>Looking for:</b>&nbsp;</span>
						        <span>/-looking looking=$user.looking-/</span>
							</div>
							<div>
								<span><b>Age:</b>&nbsp;</span>
						        <span>/-age birthday=$user.birthdate-/</span>
							</div>
							/-if $smarty.session.sess_id-/
							<div>
								<span><b>Country:</b>&nbsp;</span>
								<span>/-location type="country" typeloc=$user.typeloc city=$user.city country=$user.country joined=$user.joined-/</span>
							</div>
							<div>
								<span><b>City:</b>&nbsp;</span>
								<span>/-location type="city" typeloc=$user.typeloc city=$user.city joined=$user.joined-/</span>
							</div>
							/-/if-/
							<div>
								<span><b>Ethnicity:</b>&nbsp;</span>
						        <span>/-$cfg.profile.ethnicity[$user.ethnicity]-/</span>
							</div>
							<div>
								<span><b>Height:</b>&nbsp;</span>
						        <span>/-$cfg.profile.height[$user.height]-/</span>
							</div>
							<div>
								<span><b>Weight:</b>&nbsp;</span>
						        <span>/-$cfg.profile.weight[$user.weight]-/</span>
							</div>
							<div>
								<span><b>Body Shape:</b>&nbsp;</span>
						        <span>/-$cfg.profile.bodytype[$user.bodytype]-/</span>
							</div>
							<div>
								<span><b>Hair Color:</b>&nbsp;</span>
						        <span>/-$cfg.profile.haircolor[$user.haircolor]-/</span>
							</div>
						</div>
						/-/if-/
						<div class="clear" style="clear:both"><img src="/-$cfg.image.pixel-/" height="10"></div>
						<div>
							<span><b>About /-if $user.sex eq 2-/us/-else-/me/-/if-/:</b>&nbsp;</span>
					        <span>/-if $user.introtext-//-$user.introtext|nl2br-//-else-/Ask me/-/if-/</span>
						</div>
						<div style="clear:both"><img src="/-$cfg.image.pixel-/" height="10"></div>
						<div>
							<span><b>Looking for:</b>&nbsp;</span>
					        <span>/-if $user.describe-//-$user.describe|nl2br-//-else-/Ask me/-/if-/</span>
						</div>
						<div><img src="/-$cfg.image.pixel-/" height="10"></div>
					</div>
					<div class="clear"><img src="/-$cfg.image.pixel-/" height="10"></div>
				</td>
			</tr>
			</table>
		</td>
		<td><img src="/-$cfg.image.pixel-/" width="10"></td>
		<td width="170" valign="top">
			<div>
				<div class="profile_right">
					<div style="font-size:14px;font-weight:bold;text-align:left;">My Videos</div>
					<div><img src="/-$cfg.image.pixel-/" height="10"></div>
					<div class="content" style="width:100%;text-align:center"><img src="/-$cfg.path.url_site-/videothumb.php?user_id=/-$user.id-/"></div>
					<div><img src="/-$cfg.image.pixel-/" height="10"></div>
					<div class="edit"><a href="javascript:;" onclick="$('#profile > ul').tabs('select', 2);">[View all videos]</a></div>
				</div>
				<div style="clear:right;"><img src="/-$cfg.image.pixel-/" height="10"></div>
				<div>
					<div style="font-size:14px;font-weight:bold">Contact Options</div>
					<div style="padding:5px">
						<div style="border-bottom:1px dashed #8a8a8a"><a href="javascript:;" onclick="/-if $smarty.session.sess_id-/showComposePopup(/-$user.id-/);/-else-/showLoginAlert();/-/if-/"><b>Send /-$user.screenname-/ an email</b></a></div>
						<div style="border-bottom:1px dashed #8a8a8a"><a href="javascript:;" onclick="/-if $smarty.session.sess_id-/showFlirtPopup(/-$user.id-/);/-else-/showLoginAlert();/-/if-/">Send a Free Flirt</a></div>
						<div><a href="javascript:;" id="profile_request_password" >Request /-$user.screenname-/'s private gallery password</a></div>
					</div>
				</div>

                                <div style="clear:right;"><img src="/-$cfg.image.pixel-/" height="10"></div>
                                <div class="profile_right" style="text-align:left;">
                                        <div style="font-size:14px;font-weight:bold">Tools</div>
                                        <div><a href="javascript:;" onclick="/-if $smarty.session.sess_id-/addHotBlock('H', /-$user.id-/);/-else-/showLoginAlert();/-/if-/">Add to your Hot List</a></div>
                                        <div><a href="javascript:;" onclick="/-if $smarty.session.sess_id-/addHotBlock('B', /-$user.id-/);/-else-/showLoginAlert();/-/if-/">Add to your Block List</a></div>
                                        <div><a href="http://support.flirtigo.com" target="_blank" /-if not $smarty.session.sess_id-/onclick="showLoginAlert();return false;"/-/if-/>Report this User</a></div>
                                        <div><a href="javascript:;" onclick="/-if $smarty.session.sess_id-/doSearch()/-else-/showLoginAlert()/-/if-/;">More Profiles like this</a></div>
                                </div>


				<div style="clear:right;"><img src="/-$cfg.image.pixel-/" height="10"></div>
				<div>
					<div>Link to this Profile</div>
					<div><input type="text" readonly value="/-$cfg.path.url_site-/profile//-$user.id-/" style="border:1px solid black; width:170px;" onfocus="this.select()"></div>
				</div>
			</div>
		</td>
	</tr>
</table>

<script>
$('#profile_request_password').click(function() {
	$.get('/-$cfg.path.url_site-/ajax_gallery_password.php?id=/-$user.id-/', function(data) {
		alert(data);
		/-if not $smarty.session.sess_id -/
			setTimeout(function() { //fuck IE
				window.location = '/-$cfg.path.url_site-/join.php#Featured';
			}, 0);
		/-/if-/
	});
});
function showLoginAlert() {
	alert('You need to login to use this function or join now.');
	setTimeout(function() { //fuck IE
		window.location = '/-$cfg.path.url_site-/join.php#Featured';
	}, 0);
}
function doSearch() {
	setTimeout(function() { //fuck IE
		window.location = '/-$cfg.path.url_site-/mem_searchresults.php?country=/-location type="country" typeloc=$user.typeloc city=$user.city country=$user.country joined=$user.joined ret="id"-/&sex=/-$user.sex-/';
	}, 0);
}
</script>
