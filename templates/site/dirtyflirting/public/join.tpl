<div class="center">

<table>

	<tr>

		<td class="flirtmeet_top" align="left">

			<form method="post" action="/join.php" id="join_form">

			<div class="join" style="margin-left:20px">Join FlirtiGo Free!</div>

			<table class="join generic_container" cellpadding="5">

				<colgroup span="1" style="width: 150px;"></colgroup>

				<tr>

					<td colspan="2" style="padding-bottom: 20px;">

						Complete the simple form below for free access to milions of hot profiles...

					</td>

				</tr>

				<tr>

					<td>Choose a Username:</td>

					<td>

						<input type="text" name="screen_name" value="{$data.screen_name}"	maxlength="12" />

					</td>

				</tr>

				<tr><td colspan="2" style="height: 10px;"></td></tr>

				<tr>

					<td>Your Email Address:</td>

					<td>

						<input type="text" name="email" value="{$data.email}"	maxlength="50" />

					</td>

				</tr>

				<tr>

					<td>Confirm Email Address:</td>

					<td>

						<input autocomplete="off" type="text" name="email2" value="{$data.email2}"	maxlength="50" />

					</td>

				</tr>

				<tr><td colspan="2" style="height: 10px;"></td></tr>

				<tr>

					<td>I am / We are a:</td>

					<td>

						<input type="radio" name="sex" value="0" {if !$data.sex OR $data.sex == "0"} checked {/if} /><label>{$cfg.profile.sex[0]}</label>

						<input type="radio" name="sex" value="1" {if $data.sex == "1"} checked {/if} /><label>{$cfg.profile.sex[1]}</label>

						<input type="radio" name="sex" value="2" {if $data.sex == "2"} checked {/if} /><label>{$cfg.profile.sex[2]}</label>

						<input type="radio" name="sex" value="3" {if $data.sex == "3"} checked {/if} /><label>{$cfg.profile.sex[3]} (select one)</label>

					</td>

				</tr>

				<tr>

				</tr>

				<tr>

					<td>To meet with a:</td>

					<td>

						<input type="checkbox" name="looking[0]" value="0" {if $data.looking[0]=="0" AND $data.looking[0] != ''} checked {/if} /><label>{$cfg.profile.sex[0]}</label>

						<input type="checkbox" name="looking[1]" value="1" {if $data.looking[1] == "1"} checked {/if} /><label>{$cfg.profile.sex[1]}</label>

						<input type="checkbox" name="looking[2]" value="2" {if $data.looking[2] == "2"} checked {/if} /><label>{$cfg.profile.sex[2]}</label>

						<input type="checkbox" name="looking[3]" value="3" {if $data.looking[3] == "3"} checked {/if} /><label>{$cfg.profile.sex[3]}</label> (select one or more)

					</td>

				</tr>

				<tr><td colspan="2" style="height: 10px;"></td></tr>

				<tr>

					<td>City/Town:</td>

					<td>

						<input type="text" name="city" value="{$data.city}"	maxlength="25" />

						<span style="padding-left: 20px;">

							State/County:

							<select name="state">

								<option value="0">Select...</option>

									{foreach from=$states key=id item=name}

										<option value="{$id}" {if $data.state == $id && $date.state}selected{/if}>{$name}</option>

									{/foreach}

							</select>

						</span>

					</td>

				</tr>

				<tr>

					<td>Country:</td>

					<td>

						<select name="country" class="join_input">

							{foreach from=$countries key=id item=name}

								<option value="{$id}" {if $data.country == $id || $userArea.id == $id}selected{/if}>{$name}</option>

							{/foreach}

						</select>

					</td>

				</tr>

				<tr><td colspan="2" style="height: 10px;"></td></tr>

				<tr>

					<td>For:</td>

					<td>

						<div>

							<input type="checkbox" name="for[0]" value="0" {if $data.for[0] == 0 && $data.for[0] != ''}checked{/if}><label>{$cfg.profile.for[0]}</label>

							<input type="checkbox" name="for[1]" value="1" {if $data.for[1]}checked{/if}><label>{$cfg.profile.for[1]}</label>

							<input type="checkbox" name="for[2]" value="2" {if $data.for[2]}checked{/if}><label>{$cfg.profile.for[2]}</label>

						</div>

						<div>

							<input type="checkbox" name="for[4]" value="4" {if $data.for[4]}checked{/if}><label>{$cfg.profile.for[4]}</label>

							<input type="checkbox" name="for[3]" value="3" {if $data.for[3]}checked{/if}><label>{$cfg.profile.for[3]}</label>

						 <input type="checkbox" name="for[5]" value="5" {if $data.for[5]}checked{/if}><label>{$cfg.profile.for[5]}</label>

						</div>

						<div>

							<input type="checkbox" name="for[6]" value="6" {if $data.for[6]}checked{/if}><label>{$cfg.profile.for[6]}</label>

						</div>

					</td>

				</tr>

				<tr><td colspan="2" style="height: 10px;"></td></tr>

				<tr>

					<td>Birthdate:</td>

					<td>

						<select name="month">

							<option value="">Month</option>

								<optgroup>

									{html_options values=$months options=$months selected=$data.month}

								</optgroup>

						</select>

							&nbsp;

						<select name="day">

							<option value="">Day</option>

								<optgroup>

									{html_options values=$days output=$days selected=$data.day}

								</optgroup>

						</select>

							&nbsp;

						<select name="year">

							<option value="">Year</option>

								<optgroup>

									{html_options values=$years output=$years selected=$data.year}

								</optgroup>

						</select>

					</td>

				</tr>

				<tr><td colspan="2" style="height: 10px;"></td></tr>

				<tr>

					<td>Promotional Code:</td>

					<td>

						<input type="text" name="promcode" maxlength="15" value="{$data.promcode}" /> (optional)

					</td>

				</tr>

				<tr><td colspan="2" style="height: 20px;"></td></tr>

				<tr>

					<td>&nbsp;</td>

					<td>

				<div>

				<div class="captchaimage">

				<a href="javascript:;" onclick="refreshimg(); return false;" title="Click to refresh the image">

				<img src="{$base_url}images/pixel.gif" width="132" height="46" alt="Loading..." title="Click me to refresh">

				</a>

				</div>

 				<label style=display:block;" for="captcha">Enter the characters as seen on the left image (click the image to refresh):<br /><br /></label><input type="text" maxlength="6" name="captcha" id="captcha_join">

				</div>

					</td>

				</tr>

				<tr><td colspan="2" style="height: 20px;"></td></tr>

				<tr>

					<td></td>

					<td>

					Upon joining you'll receive account updates, account notifications and special   offers targeted to your interests, sent to you by FlirtiGo. You can adjust   these preferences at anytime from within the members area. You can read more about this   subject in our <a href="javascript: window.open('http://www.hookuphotel.com/privacy.php', 'help', 'toolbar=no,location=no,directories=no,status=yes,menubar=no,resizable=yes,copyhistory=no,scrollbars=yes'); void(0);">Privacy   Statement</a>. <br />
					<br />
					<input type="checkbox" name="terms" value="1" />
                    <label>I agree to the <a href="/terms.php" onclick="window.open(this.href, 'terms', 'toolbar=no,location=no,directories=no,status=yes,menubar=no,resizable=yes,copyhistory=no,scrollbars=yes,width=510,height=450'); return false;">terms &amp; conditions.</a></label></td>

				</tr>

				<tr><td colspan="2" style="height: 15px;"></td></tr>

				<tr>

					<td></td>

					<td>

						<input type="image" src="{$base_url}templates/site/dirtyflirting/public/images/dirtyflirting_joinnow.gif" name="submit" />

					</td>

				</tr>

			</table>

			</form>

		</td>

	</tr>

</table>

</div>



{literal}

<script>

	$("#join_form").validate({

		rules: {

			captcha: {

				required: true,

				remote: "check_captcha.php"

			}

		},

		messages: {

			captcha: "Please re-type or refresh if its unclear."

		},

		onkeyup: false

	});

	refreshimg();

</script>

{/literal}