<form method="get" action="mem_searchresults.php">
<input type="hidden" name="searchtype" value="guest">
<tr>
	<td align="center" valign="top">
	<table width="780" border="0" cellpadding="0" cellspacing="0">
			<tr>
				<td valign="top" align="center" width="205">
				
					 <table width="205" border="0" cellspacing="0" cellpadding="0">
						<tr>
							<td><a href="{$cfg.path.url_site}">Home</a></td>
						</tr>
						<tr>
							<td><a href="{$cfg.path.url_site}join.php">Search Guests</a></td>
						</tr>
						<tr>
							<td><a href="{$cfg.path.url_site}join.php">Inbox</a></td>
						</tr>
						<tr>
							<td><a href="{$cfg.path.url_site}join.php">Join</a></td>
						</tr>
						<tr>
							<td><a href="{$cfg.path.url_site}join.php">Most Rated</a></td>
						</tr>
						<tr>
							<td><a href="{$cfg.path.url_site}join.php">My Profile</a></td>
						</tr>
						<tr>
							<td><a href="{$cfg.path.url_site}join.php">Cams</a></td>
						</tr>
						<tr>
							<td><a href="{$cfg.path.url_site}join.php">Extras</a></td>
						</tr>
						<tr>
							<td><a href="{$cfg.path.url_site}join.php">Logout</a></td>
						</tr>
					</table>
				</td>
				<td width="2"></td>
				<td valign="top" align="center" width="573">
					{if $user}
					<table width="568" border="0" cellpadding="0" cellspacing="0">
						<tr>
							<td height="3" width="568"></td>
						</tr>
						<tr>
							<td width="568" align="center">
								<table width="560" border="0" cellpadding="0" cellspacing="0">
									<tr>
										<td colspan="3" width="400" align="left" class="details_text">
											<b>Profile Information for {$user.screenname}</b>
										</td>
										<td width="133">
											<img src="{$cfg.template.url_template}public/images/{online user_id=$user.id}.gif" width="63" height="22">
										</td>
									</tr>
								</table>
							</td>
						</tr>
						<tr>
							<td height="3" width="568"></td>
						</tr>
					</table>
					<table border="0" cellpadding="0" cellspacing="0"><tr><td height="4"></td></tr></table>
					<table width="568" border="0" cellpadding="0" cellspacing="0">
						<tr>
							<td valign="top" width="380">
								<table width="380" border="0" cellpadding="0" cellspacing="0">
									<tr>
										<td height="5" width="380" ></td>
									</tr>
									<tr>
										<td align="center" valign="top" height="683" width="380">
											<table width="360" border="0" cellpadding="0" cellspacing="0">
												<tr style="padding: 5px 2px 5px 5px;">
													<td width="100" align="left">
														<table border="0" cellpadding="0" cellspacing="0">
															<tr><td><a href="{$cfg.path.url_site}join.php"><img src="{$cfg.path.url_site}showphoto.php?id={$user.id}&m=Y&t=s&p=1" border="1" style="border-color: #FFFFFF;"></a></td></tr>
														</table>
													</td>
													<td width="100" align="left">
														<table border="0" cellpadding="0" cellspacing="0">
															<tr><td><a href="{$cfg.path.url_site}join.php"><img src="{$cfg.path.url_site}showvideo.php?id={$user.id}&m=Y&t=s&p=1" border="1" style="border-color: #FFFFFF;"></a></td></tr>
														</table>
													</td>
													<td width="160" align="left" valign="top">
														<table border="0" cellpadding="2" cellspacing="0" class="myprofile_text">
															<tr><td><b>Guest ID:</b></td><td><b>{$user.screenname}</b></td></tr>
															<tr><td><b>Gender:</b></td><td>{$cfg.profile.sex[$user.sex]}</td></tr>
															<tr><td><b>Rating:</b></td><td>{rating rating=$user.rating}</td></tr>
														</table>
													</td>
												</tr>
												<tr style="padding: 20px 5px 5px 5px;">
													<td align="left" colspan="3" class="myprofile_text">
														<table border="0" cellpadding="0" cellspacing="0">
															<tr style="padding: 0px 0px 10px 0px;">
																<td colspan="2" class="profile_introtext">{$user.introtitle}</td>
															</tr>
															{*<tr style="padding: 10px 0px 10px 0px;">
																<td valign="top" width="100"><b>Location:</b></td>
																<td width="260"> {if $user.city} {$user.city},{/if}{if $user.country}{$countries[$user.country]}{/if}Ask Me</td>
															</tr>*}
															<tr style="padding: 10px 0px 10px 0px;">
																<td colspan="2" valign="top">
																	<table width="100%" border="0" cellpadding="0" cellspacing="0" style="padding: 2px 2px 2px 2px;">
																		<tr>
																			<td width="50%">
																				<table border="0" cellpadding="0" cellspacing="0">
																					<tr>
																						<td width="100"><b>Age:</b></td>
																						<td>{age birthday=$user.birthdate}</td>
																					</tr>
																				</table>
																			</td>
																			<td width="50%">
																				<table border="0" cellpadding="0" cellspacing="0">
																					<tr>
																						<td width="100"><b>Height:</b></td>
																						<td>{$cfg.profile.height[$user.height]}</td>
																					</tr>
																				</table>
																			</td>
																		</tr>
																		<tr>
																			<td width="50%">
																				<table border="0" cellpadding="0" cellspacing="0">
																					<tr>
																						<td width="100"><b>Weight:</b></td>
																						<td>{$cfg.profile.weight[$user.weight]}</td>
																					</tr>
																				</table>
																			</td>
																			<td width="50%">
																				<table border="0" cellpadding="0" cellspacing="0">
																					<tr>
																						<td width="100"><b>Body Shape:</b></td>
																						<td>{$cfg.profile.bodytype[$user.bodytype]}</td>
																					</tr>
																				</table>
																			</td>
																		</tr>
																		<tr>
																			<td width="50%">
																				<table border="0" cellpadding="0" cellspacing="0">
																					<tr>
																						<td width="100"><b>Hair Color:</b></td>
																						<td>{$cfg.profile.haircolor[$user.haircolor]}</td>
																					</tr>
																				</table>
																			</td>
																			<td width="50%">
																				<table border="0" cellpadding="0" cellspacing="0">
																					<tr>
																						<td width="100"><b>Eye Color:</b></td>
																						<td>{$cfg.profile.eyecolor[$user.eyecolor]}</td>
																					</tr>
																				</table>
																			</td>
																		</tr>
																		<tr>
																			<td width="50%">
																				<table border="0" cellpadding="0" cellspacing="0">
																					<tr>
																						<td width="100"><b>Ethnicity:</b></td>
																						<td>{$cfg.profile.ethnicity[$user.ethnicity]}</td>
																					</tr>
																				</table>
																			</td>
																			<td width="50%">
																				<table border="0" cellpadding="0" cellspacing="0">
																					<tr>
																						<td width="100"><b>Smoker:</b></td>
																						<td>{$cfg.profile.smoking[$user.smoking]}</td>
																					</tr>
																				</table>
																			</td>
																		</tr>
																		<tr>
																			<td width="50%">
																				<table border="0" cellpadding="0" cellspacing="0">
																					<tr>
																						<td width="100"><b>Drink:</b></td>
																						<td>{$cfg.profile.drinking[$user.drinking]}</td>
																					</tr>
																				</table>
																			</td>
																			<td width="50%"></td>
																		</tr>
																	</table>
																</td>
															</tr>
															<tr style="padding: 10px 0px 10px 0px;">
																<td valign="top"><b>Looking for:</b></td>
																<td>{looking looking=$user.looking}</td>
															</tr>
															<tr style="padding: 10px 0px 10px 0px;">
																<td valign="top"><b>Fetishes:</b></td>
																<td>{sexualactivities sexualactivities=$user.sexualactivities}</td>
															</tr>
															<tr style="padding: 10px 0px 10px 0px;">
																<td colspan="2" valign="top"><b>About Me/Us:</b><br>{if $user.introtext}{$user.introtext}{else}Ask Me{/if}</td>
															</tr>
															<tr style="padding: 10px 0px 10px 0px;">
																<td colspan="2" valign="top"><b>What I/We are looking for:</b><br>{if $user.describe}{$user.describe}{else}Ask Me{/if}</td>
															</tr>
														</table>
													</td>
												</tr>
											</table>
										</td>
									</tr>
									<tr>
										<td height="5" width="380"></td>
									</tr>
								</table>
							</td>
							<td width="3"></td>
							<td valign="top" align="right" width="185">
								<table border="0" cellpadding="0" cellspacing="0">
									<tr>
										<td width="185" valign="top" height="120">
											<table width="185" border="0" cellpadding="0" cellspacing="0">
												<tr style="padding: 0px 5px 10px 8px;">
													<td align="left" class="myprofile_white">Choose from Below</td>
												</tr>
												<tr style="padding: 0px 5px 5px 8px;">
													<td align="left"><a href="{$cfg.path.url_site}join.php" class="myprofile_white">Send an Email Message</a></td>
												</tr>
												<tr style="padding: 0px 5px 5px 8px;">
													<td align="left"><a href="{$cfg.path.url_site}join.php" class="myprofile_white">Send a Free Quick Flirt</a></td>
												</tr>
												<tr style="padding: 0px 5px 5px 8px;">
													<td align="left"><a href="{$cfg.path.url_site}join.php" class="myprofile_white">Invite to View Your Profile</a></td>
												</tr>
											</table>
										</td>
									</tr>
									<tr><td height="7"></td></tr>
									<tr>
										<td width="185" valign="top" height="143">
											<table width="185" border="0" cellpadding="0" cellspacing="0">
												<tr style="padding: 0px 5px 10px 8px;">
													<td align="left" class="myprofile_white">Choose from Below</td>
												</tr>
												<tr style="padding: 0px 5px 4px 8px;">
													<td align="left"><a href="{$cfg.path.url_site}join.php" class="myprofile_white">Rate This Profile</a></td>
												</tr>
												<tr style="padding: 0px 5px 4px 8px;">
													<td align="left"><a href="{$cfg.path.url_site}join.php" class="myprofile_white">Email This Profile to a Friend</a></td>
												</tr>
												<tr style="padding: 0px 5px 4px 8px;">
													<td align="left"><a href="{$cfg.path.url_site}join.php" class="myprofile_white">Add to Your Hot List</a></td>
												</tr>
												<tr style="padding: 0px 5px 4px 8px;">
													<td align="left"><a href="{$cfg.path.url_site}join.php" class="myprofile_white">Add to Your Block List</a></td>
												</tr>
												<tr style="padding: 0px 5px 4px 8px;">
													<td align="left"><a href="{$cfg.path.url_site}join.php" class="myprofile_white">Report This Profile</a></td>
												</tr>
											</table>
										</td>
									</tr>
									<tr><td height="7"></td></tr>
									<tr>
										<td align="center">
											<table width="182" border="0" cellpadding="0" cellspacing="0">
												<tr>
													<td height="5" width="182"></td>
												</tr>
												<tr style="padding: 5px 5px 5px 10px;" align="left">
													<td>
														<a href="{$cfg.path.url_site}join.php"><img src="{$cfg.path.url_site}showphoto.php?id={$user.id}&m=N&t=s&p=1&a=Y" border="1" style="border-color: #FFFFFF;"></a>
													</td>
												</tr>
												<tr style="padding: 5px 10px 10px 5px;" align="right">
													<td><a href="{$cfg.path.url_site}join.php" class="details_text">More Videos</a></td>
												</tr>
												<tr style="padding: 5px 5px 5px 10px;" align="left">
													<td>
														<a href="{$cfg.path.url_site}join.php"><img src="{$cfg.path.url_site}showvideo.php?id={$user.id}&m=N&t=s&p=1&a=Y" border="1" style="border-color: #FFFFFF;"></a>
													</td>
												</tr>
												<tr style="padding: 5px 10px 8px 5px;" align="right">
													<td><a href="{$cfg.path.url_site}join.php" class="details_text">More Photos</a></td>
												</tr>
												<tr>
													<td height="5" width="182"></td>
												</tr>
											</table>
										</td>
									</tr>
									<tr><td height="7"></td></tr>
									<tr>
										<td align="center">
											<table width="181" height="62" border="0" cellpadding="0" cellspacing="0">
												<tr height="62" style="padding-bottom: 10px;">
													<td height="42" width="182" align="center" valign="bottom">
														<input type="text" value="{$cfg.path.url_site}profileid.php?profile={$user.id}" class="search_input" style="font-size: 9px; width: 150px;">
													</td>
												 </tr>
											</table>
										</td>
									</tr>
								</table>
							</td>
						</tr>
					</table>
					{else}
					<table width="568" border="0" cellpadding="0" cellspacing="0">
						<tr>
							<td height="3" width="568"></td>
						</tr>
						<tr>
							<td height="100" width="568" align="center" class="details_text">
								<b>Requested profile was not found!</b> 
							</td>
						</tr>
						<tr>
							<td height="3" width="568"></td>
						</tr>
					</table>
					{/if}
				</td>
			</tr>
		</table>
	</td>
</tr>
</form>