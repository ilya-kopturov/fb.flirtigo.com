<form id="frm_profile" method="POST">
<div class="generic_container" id="edit_container" style="width:100%">
{if $user.sex eq '2'}
	<div>
		<div style="font-weight:bold">First partner</div>
		<div class="clear"><img src="{$cfg.image.pixel}" height="10"></div>
		<div style="float:left;width:310px;">
			<div class="field_title_small">Age:</div>
			<div style="float:left">
		       <select name="month" class="search_input">{html_options values=$cfg.profile.months options=$cfg.profile.months selected=$age_array[1]}</select>
			   <select name="day" class="search_input">{html_options values=$cfg.profile.days output=$cfg.profile.days selected=$age_array[2]}</select>
			   <select name="year" class="search_input">{html_options values=$cfg.profile.years output=$cfg.profile.years selected=$age_array[0]}</select>
			</div>
			<div class="clear"></div>
			<div class="field_title_small" style="float:left;">Weight:</div>
			<div style="float:left">
				<select name="weight" class="search_input" style="width: 190px;">{html_options options=$cfg.profile.weight|replace:'Ask Me':'- any -' selected=$user.weight}</select>
			</div>
			<div class="clear"></div>
			<div class="field_title_small">Hair Color:</div>
			<div style="float:left">
				<select name="haircolor" class="search_input" style="width: 190px;">{html_options options=$cfg.profile.haircolor|replace:'Ask Me':'- any -' selected=$user.haircolor}</select>
			</div>
			<div class="clear"></div>
			<div class="field_title_small">Smoker:</div>
			<div style="float:left">
				<select name="smoking" class="search_input" style="width: 190px;">{html_options options=$cfg.profile.smoking|replace:'Ask Me':'- any -' selected=$user.smoking}</select>
			</div>
			<div class="clear"></div>
			<div class="field_title_small">Ethnicity:</div>
			<div style="float:left">
				<select name="ethnicity" class="search_input" style="width: 190px;">{html_options options=$cfg.profile.ethnicity|replace:'Ask Me':'- any -' selected=$user.ethnicity}</select>
			</div>
		</div>
		<div style="float:left;">
			<div class="field_title_small">Height:</div>
			<div style="float:left">
				<select name="height" class="search_input" style="width: 190px;">{html_options options=$cfg.profile.height|replace:'Ask Me':'- any -' selected=$user.height}</select>
			</div>
			<div class="field_title_small" style="clear:both;float:left">Body Shape:</div>
			<div style="float:left">
				<select name="bodytype" class="search_input" style="width: 190px;">{html_options options=$cfg.profile.bodytype|replace:'Ask Me':'- any -' selected=$user.bodytype}</select>
			</div>
			<div class="field_title_small" style="clear:both;float:left">Eye Color:</div>
			<div style="float:left">
				<select name="eyecolor" class="search_input" style="width: 190px;">{html_options options=$cfg.profile.eyecolor|replace:'Ask Me':'- any -' selected=$user.eyecolor}</select>
			</div>
			<div class="field_title_small" style="clear:both;float:left">Drinker:</div>
			<div style="float:left">
				<select name="drinking" class="search_input" style="width: 190px;">{html_options options=$cfg.profile.drinking|replace:'Ask Me':'- any -' selected=$user.drinking}</select>
			</div>
		</div>
	</div>
	<div class="clear"><img src="{$cfg.image.pixel}" height="20"></div>
	<div>
		<div style="font-weight:bold">Second partner</div>
		<div class="clear"><img src="{$cfg.image.pixel}" height="10"></div>
		<div style="float:left;width:310px;">
			<div class="field_title_small">Age:</div>
			<div style="float:left">
		       <select name="p_month" class="search_input">{html_options values=$cfg.profile.months options=$cfg.profile.months selected=$p_age_array[1]}</select>
			   <select name="p_day" class="search_input">{html_options values=$cfg.profile.days output=$cfg.profile.days selected=$p_age_array[2]}</select>
			   <select name="p_year" class="search_input">{html_options values=$cfg.profile.years output=$cfg.profile.years selected=$p_age_array[0]}</select>
			</div>
			<div class="clear"></div>
			<div class="field_title_small" style="float:left;">Weight:</div>
			<div style="float:left">
				<select name="p_weight" class="search_input" style="width: 190px;">{html_options options=$cfg.profile.weight|replace:'Ask Me':'- any -' selected=$user.p_weight}</select>
			</div>
			<div class="clear"></div>
			<div class="field_title_small">Hair Color:</div>
			<div style="float:left">
				<select name="p_haircolor" class="search_input" style="width: 190px;">{html_options options=$cfg.profile.haircolor|replace:'Ask Me':'- any -' selected=$user.p_haircolor}</select>
			</div>
			<div class="clear"></div>
			<div class="field_title_small">Smoker:</div>
			<div style="float:left">
				<select name="p_smoking" class="search_input" style="width: 190px;">{html_options options=$cfg.profile.smoking|replace:'Ask Me':'- any -' selected=$user.p_smoking}</select>
			</div>
			<div class="clear"></div>
			<div class="field_title_small">Ethnicity:</div>
			<div style="float:left">
				<select name="p_ethnicity" class="search_input" style="width: 190px;">{html_options options=$cfg.profile.ethnicity|replace:'Ask Me':'- any -' selected=$user.p_ethnicity}</select>
			</div>
		</div>
		<div style="float:left;">
			<div class="field_title_small">Height:</div>
			<div style="float:left">
				<select name="p_height" class="search_input" style="width: 190px;">{html_options options=$cfg.profile.height|replace:'Ask Me':'- any -' selected=$user.p_height}</select>
			</div>
			<div class="field_title_small" style="clear:both;float:left">Body Shape:</div>
			<div style="float:left">
				<select name="p_bodytype" class="search_input" style="width: 190px;">{html_options options=$cfg.profile.bodytype|replace:'Ask Me':'- any -' selected=$user.p_bodytype}</select>
			</div>
			<div class="field_title_small" style="clear:both;float:left">Eye Color:</div>
			<div style="float:left">
				<select name="p_eyecolor" class="search_input" style="width: 190px;">{html_options options=$cfg.profile.eyecolor|replace:'Ask Me':'- any -' selected=$user.p_eyecolor}</select>
			</div>
			<div class="field_title_small" style="clear:both;float:left">Drinker:</div>
			<div style="float:left">
				<select name="p_drinking" class="search_input" style="width: 190px;">{html_options options=$cfg.profile.drinking|replace:'Ask Me':'- any -' selected=$user.p_drinking}</select>
			</div>
		</div>
	</div>
{else}
	<div>
		<div style="font-weight:bold">About you</div>
		<div class="clear"><img src="{$cfg.image.pixel}" height="10"></div>
		<div style="float:left;width:310px;">
			<div class="field_title_small">Age:</div>
			<div style="float:left">
		       <select name="month" class="search_input">{html_options values=$cfg.profile.months options=$cfg.profile.months selected=$age_array[1]}</select>
			   <select name="day" class="search_input">{html_options values=$cfg.profile.days output=$cfg.profile.days selected=$age_array[2]}</select>
			   <select name="year" class="search_input">{html_options values=$cfg.profile.years output=$cfg.profile.years selected=$age_array[0]}</select>
			</div>
			<div class="clear"></div>
			<div class="field_title_small" style="float:left;">Weight:</div>
			<div style="float:left">
				<select name="weight" class="search_input" style="width: 190px;">{html_options options=$cfg.profile.weight|replace:'Ask Me':'- any -' selected=$user.weight}</select>
			</div>
			<div class="clear"></div>
			<div class="field_title_small">Hair Color:</div>
			<div style="float:left">
				<select name="haircolor" class="search_input" style="width: 190px;">{html_options options=$cfg.profile.haircolor|replace:'Ask Me':'- any -' selected=$user.haircolor}</select>
			</div>
			<div class="clear"></div>
			<div class="field_title_small">Smoker:</div>
			<div style="float:left">
				<select name="smoking" class="search_input" style="width: 190px;">{html_options options=$cfg.profile.smoking|replace:'Ask Me':'- any -' selected=$user.smoking}</select>
			</div>
			<div class="clear"></div>
			<div class="field_title_small">Ethnicity:</div>
			<div style="float:left">
				<select name="ethnicity" class="search_input" style="width: 190px;">{html_options options=$cfg.profile.ethnicity|replace:'Ask Me':'- any -' selected=$user.ethnicity}</select>
			</div>
		</div>
		<div style="float:left;">
			<div class="field_title_small">Height:</div>
			<div style="float:left">
				<select name="height" class="search_input" style="width: 190px;">{html_options options=$cfg.profile.height|replace:'Ask Me':'- any -' selected=$user.height}</select>
			</div>
			<div class="field_title_small" style="clear:both;float:left">Body Shape:</div>
			<div style="float:left">
				<select name="bodytype" class="search_input" style="width: 190px;">{html_options options=$cfg.profile.bodytype|replace:'Ask Me':'- any -' selected=$user.bodytype}</select>
			</div>
			<div class="field_title_small" style="clear:both;float:left">Eye Color:</div>
			<div style="float:left">
				<select name="eyecolor" class="search_input" style="width: 190px;">{html_options options=$cfg.profile.eyecolor|replace:'Ask Me':'- any -' selected=$user.eyecolor}</select>
			</div>
			<div class="field_title_small" style="clear:both;float:left">Drinker:</div>
			<div style="float:left">
				<select name="drinking" class="search_input" style="width: 190px;">{html_options options=$cfg.profile.drinking|replace:'Ask Me':'- any -' selected=$user.drinking}</select>
			</div>
		</div>
	</div>
{/if}
	<div style="clear:both"><img src="{$cfg.image.pixel}" height="20"></div>
	<div style="font-weight:bold">Location</div>
	<div class="clear"><img src="{$cfg.image.pixel}" height="10"></div>
	<div>
		<div style="float:left;width:310px;">
			<div class="field_title_small">City:</div>
			<div style="float:left">
				<input type="text" name="city" class="search_input required textfield" style="width: 190px;" value="{$user.city}">
			</div>
			<div style="clear:both"><img src="{$cfg.image.pixel}" height="2"></div>
			<div style="float:left;">
				<div class="field_title_small">Country:</div>
				<div style="float:left">
					<select name="country" class="search_input" style="width: 190px;">{html_options options=$cfg.countries selected=$user.country}</select>
				</div>
			</div>
		</div>
		<div style="float:left">
			<div class="field_title_small">State:</div>
			<div style="float:left">
				<select name="state" class="search_input" style="width: 190px;">{html_options options=$cfg.states selected=$user.state}</select>
			</div>
		</div>
	</div>
	<div style="clear:both"><img src="{$cfg.image.pixel}" height="20"></div>
	<div style="font-weight:bold">Your profile</div>
	<div class="clear"><img src="{$cfg.image.pixel}" height="10"></div>
	<div>
		<div class="field_title" style="float:left;">Seeking:</div>
		<table width="600" cellpadding="0" cellspacing="0" style="float:left;">
		<tr><td>
			{section name=looking loop=$cfg.profile.sex}
			<input type="checkbox" name="looking[{$smarty.section.looking.index}]" value="{$smarty.section.looking.index}" class="search_input" {if $looking_array[$smarty.section.looking.index]}checked{/if}><label>{$cfg.profile.sex[looking]}</label>
			{/section}
		</td></tr>
		</table>
	</div>
	<div style="clear:both"><img src="{$cfg.image.pixel}" height="1"></div>
	<div>
		<div class="field_title" style="float:left;">For:</div>
		<table width="600" cellpadding="0" cellspacing="0" style="float:left;">
		{section name=for loop=$cfg.profile.for}
		{if (($smarty.section.for.index % 4) == 0)}
		<tr>
		{/if}
		<td><input type="checkbox" name="for[{$smarty.section.for.index}]" value="{$smarty.section.for.index}" class="search_input" {if $forr_array[$smarty.section.for.index]}checked{/if}><label>{$cfg.profile.for[for]}</label>
		{/section}
		</table>
	</div>
	<div style="clear:both"><img src="{$cfg.image.pixel}" height="1"></div>
	<div>
		<div class="field_title" style="float:left;">Likes:</div>
		<table width="600" cellpadding="0" cellspacing="0" style="float:left;">
		{section name=sexualactivities loop=$cfg.profile.sexualactivities}
		{if (($smarty.section.sexualactivities.index % 5) == 0)}
		<tr>
		{/if}
		<td><input type="checkbox" name="sexualactivities[{$smarty.section.sexualactivities.index}]" value="{$smarty.section.sexualactivities.index}" class="search_input" {if $sexualactivities_array[$smarty.section.sexualactivities.index]}checked{/if}><label>{$cfg.profile.sexualactivities[sexualactivities]}</label></td>
		{/section}
		</table>
	</div>
	<div style="clear:both"><img src="{$cfg.image.pixel}" height="10"></div>
	<div class="field_title" style="float:left">Profile title:</div>
	<div style="float:left"><input class="search_input required textfield" type="text" name="introtitle" value="{if $editprofile_values.introtitle}{$editprofile_values.introtitle}{else}{$user.introtitle}{/if}" maxlenght="150" style="width:480px;"></div>
	<div style="clear:both"><img src="{$cfg.image.pixel}" height="1"></div>
	<div class="field_title" style="float:left">About you:</div>
	<div style="float:left"><textarea class="required search_input textfield" name="introtext" style="width:480px; height: 85px;">{if $editprofile_values.introtext}{$editprofile_values.introtext}{else}{$user.introtext}{/if}</textarea></div>
	<div style="clear:both"><img src="{$cfg.image.pixel}" height="1"></div>
	<div class="field_title" style="float:left">Looking for:</div>
	<div style="float:left"><textarea class="search_input required textfield" name="describe" style="width:480px; height: 85px;">{if $editprofile_values.describe}{$editprofile_values.describe}{else}{$user.describe}{/if}</textarea></div>
	<div style="clear:both"><img src="{$cfg.image.pixel}" height="10"></div>
	<div align="center"><input name="submit" type="image" src="{$cfg.template.url_template}/public/images/submit.gif" alt="Edit"></div>
</div>
</form>

{literal}
<script>
	$("#frm_profile").bind("invalid-form.validate", function(e, validator) {
		var errors = validator.numberOfInvalids();
		if (errors) {
			var message = (errors == 1) ? 'You missed 1 field. It has been highlighted below' : 'You missed ' + errors + ' fields.  They have been highlighted below';
			//$('#jqmErrorAlert').jqm(jsOptions.jqAlert);
			//$('div.jqmAlertTitle span:first-child').css('color', 'red').html(message);
			//$('#jqmErrorAlert').jqmShow();
			$('#error_alert table').removeClass('error');
			$('#error_alert table').addClass('success');
			$('#error_alert div.errorTextBig').html(message);
			$('#error_alert').fadeIn('slow');
			window.scrollTo(0, 0);
		} else {
			try {
				$("#error_alert").fadeOut('fast');
			} catch (e) {}
		}
	}).validate({
		errorElement: "div",
		submitHandler: function() {
			$("#frm_profile").ajaxSubmit({
				url: {/literal}'{$cfg.path.url_site}ajax_profile_edit.php?u=t'{literal},
				dataType: 'script'
			});
		}
	});
</script>
{/literal}
