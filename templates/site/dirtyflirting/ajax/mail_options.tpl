<form id="frm_mail_options" method="POST">
<div class="generic_container">
	<div class="mail_options clear">
		<div class="field_title mail_op_title">Receive Message Notifications:</div>
		<div style="float:left"><input type="radio" name="email" value="Y" id="emailyes" {if $emailoptions.emailnotif == "Y"} checked {/if}> <label for="emailyes">Yes</label>&nbsp;&nbsp;&nbsp;<input type="radio" name="email" value="N" id="emailno" {if $emailoptions.emailnotif == "N"} checked {/if}> <label for="emailno">No</label></div>
	</div>
	<div class="clear"><img src="{$cfg.image.pixel}" height="1"></div>
	<div class="mail_options clear">
		<div class="field_title mail_op_title">Receive Flirt Notification:</div>
		<div style="float:left"><input type="radio" name="whisper" value="Y" id="whisperyes" {if $emailoptions.whispernotif == "Y"} checked {/if}> <label for="whisperyes">Yes</label>&nbsp;&nbsp;&nbsp;<input type="radio" name="whisper" value="N" id="whisperno" {if $emailoptions.whispernotif == "N"} checked {/if}> <label for="whisperno">No</label></div>
	</div>
	<div class="clear"><img src="{$cfg.image.pixel}" height="1"></div>
	<div class="mail_options clear">
		<div class="field_title mail_op_title">Receive Site Announcement Notifications?:</div>
		<div style="float:left"><input type="radio" name="newsletter" value="Y" id="newsletteryes" {if $emailoptions.newsletternotif == "Y"} checked {/if}> <label for="newsletteryes">Yes</label>&nbsp;&nbsp;&nbsp;<input type="radio" name="newsletter" value="N" id="newsletterno" {if $emailoptions.newsletternotif == "N"} checked {/if}> <label for="newsletterno">No</label></div>
	</div>
	<div class="clear" style="clear:both;"><img src="{$cfg.image.pixel}" height="10"></div>
	<div><input type="submit" value="Update"></div>
</div>
</form>
{literal}
<script>
	$("#frm_mail_options").ajaxForm({
		url: {/literal}'{$cfg.path.url_site}ajax_mail_options.php?u=t'{literal},
		success: function() {},
		target: "#alert_container"
	});
</script>
{/literal}
