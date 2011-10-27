{include file="site/dirtyflirting/login/menussl.tpl"}
{literal}
  	<script type="text/javascript">
  		//$("#tablepaymentform").hide();
  		$(document).ready(function(){
  			//$("#tablepaymentform").hide();
  			//document.getElementById('tablepaymentform').style["display"] = "none";
  			//document.getElementById('tdtablepaymentform').style["height"] = "0";
 		});
  	</script>
{/literal}
<table class="center" id="upgrade">
	<tr>
		<td valign="top" align="center">
		{* MEMBER PAGE - RIGHT - *}
			<div id="upgrade">
				<ul>
					<table width="768"  border="0" cellpadding="0" cellspacing="0">
					 <tr>
						 <td height="10" width="568"></td>
					 </tr>
					 <tr valign="top">
						 <td width="568"	align="center">
							 <table width="560" border="0" cellpadding="0" cellspacing="0">
								 <tr style="padding: 10px 10px 10px 10px;">
									 <td colspan="2" width="280" class="myprofile_text">
										 <table width="735" height="316" border="0">
											 <form method="post" action="newindex.php?id={$smarty.session.sess_id}">
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
																				 <a href="{$cfg.path.url_site_ssl}profile/{screenname user_id=$user.id}#Videos"><img class="preview" src="{$cfg.path.url_site_ssl}videothumb.php?{rnd_md5}&id={$user.videoid}&user_id={$user.id}" /></a>
																			 {else}
																				 <a href="{$cfg.path.url_site_ssl}profile/{screenname user_id=$user.id}"><img class="preview" src="{$cfg.path.url_site_ssl}showphoto.php?id={$user.id}&m=Y&t=r&p=1" /></a>
																			 {/if}
											 </td>
										 </tr>
										 <tr>
											 <td style="padding-top: 5px; padding-left: 10px; padding-bottom: 5px; text-align: left;">Rating: <br /> {ratemessl id=$user.id screenname=$user.screenname rating=$user.rating}</td>
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
												 Summary: {if $user.introtitle}{$user.introtitle|truncate:30:"..."}{else}Ask Me.{/if}
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
														 <td class="featuredBoxLink more">
															 [<a href="{$cfg.template.url_template_ssl}profile/{screenname user_id=$user.id}" class="featuredBoxLink">more</a>]
														 </td>
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
															 <td width="735" height="256" align="center" valign="top">
																 <img border="1" src="images/upoptions.gif" style="border-color: #FFFFFF;"/>
															 </td>
			</tr>
			
{if $client_currency=='USD'}
			
			<tr>			
															 <td width="735" height="36" align="center" valign="top">
					<input name="acctype" type="radio" value="3" checked>6 Months Special Offer Upgrade to FlirtiGo just {$pricethree} (thats 3 Month FREE)!
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
			
			
{else}

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

{/if}

			{$errori}
			<tr>
															 <td width="735" height="35" align="center" valign="top">
															 Choose payment <select name="ptype" id="select" onchange="showpaymentform(this.value,'{$client_currency}','{$cfg.path.url_site}');">
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
				<td  align="center" valign="top" id="tdtablepaymentform" style="padding-bottom:15px">
					{if $errorpayment}
					<table cellpadding="0" cellspacing="0" border="0" id="tablepaymentform" >
						{if $errorpayment}
						<tr>
                           <td colspan="2" align="left" style="padding: 10px 15px 5px 0px;">
                             <font color="red">{$errorpayment}</font>
                           </td>
                         </tr>
						{/if}
						<tr >
                           <td colspan="2" align="left" style="padding: 10px 15px 5px 0px;"><span class="style3"><font color="#000000" size="3">Just complete the form below for an instant Upgrade. </font></span></td>
                         </tr>
                         <tr >
                           <td><font color="#000000" size="3">First Name </font></span></td>
                           <td><font color="#000000" size="3">
                             <input name="client_fname"  class="upgrade_input" value="{if isset($lastpost) && $lastpost.client_fname!=""}{ $lastpost.client_fname}{/if}">                           
                             </font></span></td>
                         </tr>
                         <tr>
                           <td><font color="#000000" size="3">Last Name </font></span></td>
                           <td><font color="#000000" size="3">
                             <input name="client_lname"  class="upgrade_input" value="{if isset($lastpost) && $lastpost.client_lname!=""}{ $lastpost.client_lname}{/if}">                           
                             </font></span></td>
                         </tr>
                         <tr >
                           <td><font color="#000000" size="3">Street Address </font></span></td>
                           <td><font color="#000000" size="3">
                             <input name="client_address" class="upgrade_input"  value="{if isset($lastpost) && $lastpost.client_address!=""}{ $lastpost.client_address}{/if}">                           
                             </font></span></td>
                         </tr>
                         <tr >
                           <td><font color="#000000" size="3">City</font></span></td>
                           <td><font color="#000000" size="3">
                             <input name="client_city" class="upgrade_input"  value="{if isset($lastpost) && $lastpost.client_city!=""}{ $lastpost.client_city}{/if}">                           
                             </font></span></td>
                         </tr>
                          <tr >
                           <td><font color="#000000" size="3">State</font></span></td>
                           <td><font color="#000000" size="3">
                         		<select id="bill_state" name="client_state">
                         			<option value="">Choose State</option>
                         			{foreach from=$states key=k item=v}
                         			<option value="{$k}" {if isset($lastpost) && $lastpost.client_city==$k}selected="selected"{/if}>{$v}</option>
                         			{/foreach}
                         		</select>
                         		</font>
                         	</td>
                         </tr>
                         <tr >
                           <td><font color="#000000" size="2">Zip / Postal Code </font></span></td>
                           <td><font color="#000000" size="3">
                             <input name="client_zip" class="upgrade_input"  value="{if isset($lastpost) && $lastpost.client_zip!=""}{ $lastpost.client_zip}{/if}">                           
                             </font></span></td>
                         </tr>
                         <tr >
                           <td><font color="#000000" size="3">Country</font></span></td>
                           <td><font color="#000000" size="3">
									<select id="bill_country" name="client_country" style="width:150px;">
				        				<option value="">Choose Country</option>
				        				{foreach from=$countries key=k item=v}
                         				<option value="{$k}" {if isset($lastpost) && $lastpost.client_country==$k}selected="selected"{/if}>{$v}</option>
                         				{/foreach}
				        			</select>
				        	</td>
				        </tr>
					</table>
					{/if}
				</td>
			</tr>
			
		
													 <tr>
														 <td colspan="2" align="center" height="10">
																 <!--<INPUT type="image" name="submit" src="{$cfg.template.url_template}login/images/dirtyflirting_upgradenow.gif">-->
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
  {literal}
  	<script type="text/javascript">
		function showpaymentform(choosenvalue,currency,url){
			
			var tabletoinsert='';
			
			if(choosenvalue=="ccbillcc" && currency=="USD"){
				$.ajax({
  					type: "POST",
   					url: url+"zombaio_payment_table.php",
   					data: "val="+choosenvalue,
   					success: function(msg){
   						document.getElementById('tdtablepaymentform').innerHTML="<p>bun</p>";
    					//$('#'+file).html(msg);
   					}
 				});
				//$.post(url+"zombaio_payment_table.php", { name: "John", time: "2pm" },
   					//function(data){
     					//document.getElementById('tdtablepaymentform').innerHTML="<p>bun</p>";
     					//$('#tdtablepaymentform').append("<p>bun</p>");
     					  //document.getElementById("tdtablepaymentform").appendChild("<p>bun</p>");
   				//}, "xml");
				
				//tabletoinsert.='<table cellpadding="0" cellspacing="0" border="0" id="tablepaymentform" >{if $errorpayment}';

				//tabletoinsert.='<tr><td colspan="2" align="left" style="padding: 10px 15px 5px 0px;"><font color="red">{$errorpayment}</font></td></tr>{/if}';

				//tabletoinsert.='<tr ><td colspan="2" align="left" style="padding: 10px 15px 5px 0px;"><span class="style3"><font color="#000000" size="3">Just complete the form below for an instant Upgrade. </font></span></td></tr>';

				//tabletoinsert.='<tr><td><font color="#000000" size="3">First Name </font></span></td><td><font color="#000000" size="3"><input name="client_fname"  class="upgrade_input" value="{if isset($lastpost) && $lastpost.client_fname!=""}{ $lastpost.client_fname}{/if}"></font></span></td></tr>';

				//tabletoinsert.='<tr><td><font color="#000000" size="3">Last Name </font></span></td><td><font color="#000000" size="3"><input name="client_lname"  class="upgrade_input" value="{if isset($lastpost) && $lastpost.client_lname!=""}{ $lastpost.client_lname}{/if}"></font></span></td></tr>';

				//tabletoinsert.='<tr><td><font color="#000000" size="3">Street Address </font></span></td><td><font color="#000000" size="3"><input name="client_address" class="upgrade_input"  value="{if isset($lastpost) && $lastpost.client_address!=""}{ $lastpost.client_address}{/if}"></font></span></td></tr>';
				
				//tabletoinsert.='<tr><td><font color="#000000" size="3">City</font></span></td><td><font color="#000000" size="3"><input name="client_city" class="upgrade_input"  value="{if isset($lastpost) && $lastpost.client_city!=""}{ $lastpost.client_city}{/if}"></font></span></td></tr>';

				//tabletoinsert.='<tr><td><font color="#000000" size="3">State</font></span></td><td><font color="#000000" size="3"><select id="bill_state" name="client_state"><option value="">Choose State</option>{foreach from=$states key=k item=v}<option value="{$k}" {if isset($lastpost) && $lastpost.client_city==$k}selected="selected"{/if}>{$v}</option>{/foreach}</select></font></td></tr>';

				//tabletoinsert.='<tr><td><font color="#000000" size="2">Zip / Postal Code </font></span></td><td><font color="#000000" size="3"><input name="client_zip" class="upgrade_input"  value="{if isset($lastpost) && $lastpost.client_zip!=""}{ $lastpost.client_zip}{/if}"></font></span></td></tr>';

				//tabletoinsert.='<tr><td><font color="#000000" size="3">Country</font></span></td><td><font color="#000000" size="3"><select id="bill_country" name="client_country" style="width:150px;"><option value="">Choose Country</option>{foreach from=$countries key=k item=v}<option value="{$k}" {if isset($lastpost) && $lastpost.client_country==$k}selected="selected"{/if}>{$v}</option>{/foreach}</select></td></tr>';

				//tabletoinsert.='</table>';
				
				//document.getElementById('tdtablepaymentform').innerHTML=tabletoinsert;
				//$('.fields_area_table_'+field_Id).append(content);
				//document.getElementById('tablepaymentform').style["display"] = "";
				//document.getElementById('tdtablepaymentform').style["height"] = "176px";
				//$("#tablepaymentform").show();
			}else{
				document.getElementById('tablepaymentform').style["display"] = "none";
				document.getElementById('tdtablepaymentform').style["height"] = "0";
				//$("#tablepaymentform").hide();
			}
			
		}
  	</script>
{/literal}