<form id="frm_options" method="POST">
<div class="generic_container clearfix" id="profile_options">
	<div class="redtitle">Profile Options</div>
	<div class="clear"><img src="{$cfg.image.pixel}" height="10"></div>
	<div>
		<div class="subtitle">General</div>
		<div class="clear" style="clear:both"><img src="{$cfg.image.pixel}" height="5"></div>
		<div class="field_label">Change password:</div><div class="field"><input class="required textfield" name="options[pass]" type="text" value="{$user.pass}" size="30"></div>
		<div class="clear" style="clear:both"><img src="{$cfg.image.pixel}"></div>
		<div class="field_label">Show me in Rate Profiles:</div><div class="field">{html_radios name="options[mostwanted]" values=$show_in_rate output=$show_in_rate_labels selected=$user.mostwanted}</div>
	</div>
	<div class="clear" style="clear:both"><img src="{$cfg.image.pixel}" height="10"></div>
	<div>
		<div class="subtitle">Private Gallery</div>
		<div class="clear" style="clear:both"><img src="{$cfg.image.pixel}" height="5"></div>
		<div class="field_label">Private gallery password:</div><div class="field"><input class="textfield" name="options[gallery_pass]" type="text" value="{$user.gallery_pass}" size="30"></div>
	</div>
	<div class="clear" style="clear:both"><img src="{$cfg.image.pixel}" height="10"></div>
	<div>
		<div class="subtitle">Contact Details</div>
		<div class="clear" style="clear:both"><img src="{$cfg.image.pixel}" height="5"></div>
		<div class="field_label">My email address:</div><div class="field"><input class="required email textfield" name="options[email]" type="text" value="{$user.email}" size="30"></div>
		<div class="clear" style="clear:both"><img src="{$cfg.image.pixel}"></div>
		<div class="field_label">My cell/mobile number:</div><div class="field"><input class="textfield" name="options[cell]" type="text" value="{$user.cell}" size="30"></div>
		<div class="clear" style="clear:both"><img src="{$cfg.image.pixel}"></div>
	</div>
	<div class="clear" style="clear:both"><img src="{$cfg.image.pixel}" height="10"></div>
	<div>
		<div class="subtitle">Account</div>
		<div class="clear" style="clear:both"><img src="{$cfg.image.pixel}" height="5"></div>
		<div class="field_label">Hide my profile in Search:</div><div class="field">{html_radios name="options[hide]" values=$show_in_search output=$show_in_search_labels selected=$user.hide} (Hidden profiles will still remain on other users Hot List)</div>
		<div class="clear" style="clear:both"><img src="{$cfg.image.pixel}"></div>
		<br>
		<div class="field_label">Cancel my subscription </div><div class="field"><a href="javascript:;" 
		onclick="if (confirm('Are you sure? Remember you can always upgrade again your profile')) window.location='{$clink}';"> Click here</a></div>
		<br>
		<br>
		<div class="field_label">Delete my account</div><div class="field"><a href="javascript:;" 
		onclick="if (confirm('Are you sure? Remember you can hide your profiles from search results')) deleteProfile();">Click here</a></div>
	</div>
	<div class="clear" style="clear:both"><img src="{$cfg.image.pixel}" height="10"></div>
	<div align="center"><input name="submit" type="image" src="{$cfg.template.url_template}/public/images/submit.gif" alt="Edit"></div>
</div>
</form>

{literal}
<script>
$("#frm_options").bind("invalid-form.validate", function(e, validator) {
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
		$("#frm_options").ajaxSubmit({
			url: {/literal}'{$cfg.path.url_site}ajax_profile_options.php?u=t'{literal},
			dataType: 'script'
		});
	}
});

function deleteProfile() {
	$.ajax({
		url:'{/literal}{$cfg.path.url_site}ajax_delete_profile.php{literal}',
		success: function() {
			alert('Hate to see you leaving');
			window.location.href = '{/literal}{$cfg.path.url_site}{literal}'
		}
	});
}
</script>
{/literal}