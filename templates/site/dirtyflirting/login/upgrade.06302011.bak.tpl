{include file="site/dirtyflirting/login/menussl.tpl"} {literal}

<script type="text/javascript">

  		//$("#tablepaymentform").hide();

  		$(document).ready(function(){

  			//$("#tablepaymentform").hide();

  			document.getElementById('tablepaymentform').style["display"] = "none";

  			document.getElementById('tdtablepaymentform').style["height"] = "0";

 		});

  	</script>

{/literal}

<div class="center">{* MEMBER PAGE - RIGHT - *}

<div id="upgrade">
<div class="main">
<form method="post" action="index.php?id={$smarty.session.sess_id}">

<input type="hidden" name="id" value="{$smarty.session.sess_id}">
<div class="lft_prt">
{if $user.id>0}

	
	<div class="img_pls">{if $videogallery} <a
		href="{$cfg.path.url_site}profile/{screenname user_id=$user.id}#Videos"><img
		class="preview"
		src="{$cfg.path.url_site_ssl}videothumb.php?{rnd_md5}&id={$user.videoid}&user_id={$user.id}" /></a>

	{else} <a
		href="{$cfg.path.url_site}profile/{screenname user_id=$user.id}"><img
		class="preview"
		src="{$cfg.path.url_site_ssl}showphoto.php?id={$user.id}&m=Y&t=r&p=1" /></a>

	{/if}</div>
	<div class="hd"><img
		src="{$cfg.template.url_template_ssl}login/images/hd_1.png" alt="" /></div>
	<ul class="inf">
		<li class="ttl"><img
			src="{$cfg.template.url_template_ssl}login/images/ttl_1.png" alt="" /></li>

		<li>

		<div class="normaltext screenname">{if $user.withpicture eq 'Y'}
		<img
			src="{$cfg.template.url_template_ssl}login/images/dirtyflirting_mailpicture.gif"
			alt="FlirtiGo.com" /> {/if} {if $user.withvideo eq 'Y'} <img
			src="{$cfg.template.url_template_ssl}login/images/dirtyflirting_mailvideo.gif"
			alt="FlirtiGo.com" /> {/if} {$user.screenname}</div>
		</li>

		<li>{age birthday=$user.birthdate} yr old {assign var="sex"
		value=$user.sex}{$cfg.profile.sex[$sex]}</li>


		<li>{location type="short" typeloc=$user.typeloc city=$user.city
		country=$user.country joined=$user.joined}</li>
		<li>Looking For: {looking looking=$user.looking}</li>
		<li>Summary: {if
		$user.introtitle}{$user.introtitle|truncate:30:"..."}{else}Ask
		Me.{/if}</li>

		{if $videogallery}

		<li>Private: {if $user.gallery}No{else}Yes
		<div style="display: inline;"><a href="javascript:;"
			onclick="requestpassword({$user.id})">Request password</a></div>
		{/if}</li>

		{/if}

		<li>{*
		<li>Last Login: {lastlogin lastlogin=$user.lastlogin}</li>
		*}</li>
	</ul>
		<img src="{$cfg.template.url_template_ssl}login/images/up_td_fr.png"
		alt="" class="up_td" /> 
	
	{else}
<img
		src="{$cfg.template.url_template_ssl}login/images/up_mn_img.png" alt=""
		class="up_mn_img" />
	{/if}
<img
		src="{$cfg.template.url_template_ssl}login/images/upl_lst.png" alt=""
		class="up_lst" /></div>

	<div class="rght_prt">
	<div class="arr_bg"><img src="{$cfg.template.url_template_ssl}login/images/arrow.png" alt=""/></div>
	<div class="p_ttl"><img src="{$cfg.template.url_template_ssl}login/images/sel_up_dis.png" alt=""/></div>
	<div class="block bl_1">
	<div class="bl_head">Discount</div>
	<div class="cont"><input name="acctype" type="radio" value="1">
	<div>
	<h1>1 Month Unlimited<br/>
	&#36;5.76/week</h1>
	<p>(billed as &#36;24.94 each<br />
	month until cancelled)</p>
	</div>
	</div>
	</div>
	<div class="block bl_2">
	<div class="bl_head">Super Saver</div>
	<div class="cont"><input name="acctype" type="radio" value="2">
	<div>
	<h1>3 Months Unlimited<br/>
	<strike>&#36;7.68</strike> &#36;3.84/week</h1>
	<p>(billed as &#36;49.95 for<br />
	6 months upgrade)</p>
	</div>
	</div>
	</div>
	<div class="block bl_3">
	<div class="bl_head">Great Value</div>
	<div class="cont"><input name="acctype" type="radio" value="3">
	<div>
	<h1>6 Months Unlimited<br/>
	<strike>&#36;5.38</strike> &#36;2.69/week </h1>
	<p>(billed as single payment of<br />
	&#36;69.95 for 6 months upgrade)</p>
	</div>
	</div>
	</div>
	<div class="block bl_4">
	<div class="bl_head">Giveaway</div>
	<div class="cont"><input name="acctype" type="radio" value="4" checked>
	<div>
	<h1>12 Months Unlimited<br/>
	<strike>&#36;3.84</strike> &#36;1.92/week</h1>
	<p>(billed as single payment of<br />
	$99.95 for 12 months upgrade)</p>
	</div>
	</div>
	</div>
	{$errori}



		<div class="up_frm"><select name="ptype" id="select"
			onchange="showpaymentform(this.value,'{$client_currency}');">

			<option value="no" selected>Choose payment method</option>

			<option value="ccbillcc">Pay with my Credit/Debit Card</option>

			{if $countryName=='United States'}

			<option value="ccbillck">Using my US Checking Account</option>

			{/if} {if $countryName=='Canada'}

			<option value="charge">Using my CA Checking Account</option>

			{/if}

			<option value="mailin">Mail in Cash or a Money Orders</option>



			{if $countryName!='Great Britain (UK)'}

			<option value="charge">See other way to pay ...</option>

			{/if}



		</select>



	<!--			

			<tr>

				<td  align="center" valign="top" id="tdtablepaymentform" style="padding-bottom:15px">

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

				</td>

			</tr>

			

-->
		<input type="submit" name="submit" value="Upgrade Now!">
		</div>

</form>

</div>
</div>
</div>
</div>

{literal}

<script type="text/javascript">

		function showpaymentform(choosenvalue,currency){

			

			var tabletoinsert='';

			

			if(choosenvalue=="ccbillcc" && currency=="USD"){

				

				document.getElementById('tablepaymentform').style["display"] = "";

				document.getElementById('tdtablepaymentform').style["height"] = "176px";

				//$("#tablepaymentform").show();

			}else{

				document.getElementById('tablepaymentform').style["display"] = "none";

				document.getElementById('tdtablepaymentform').style["height"] = "0";

				//$("#tablepaymentform").hide();

			}

			

		}

  	</script>

{/literal}
