{* $Id: new_mail_popup.tpl 538 2008-06-13 15:53:10Z andi $ *}
<form id="mail_form_{$email.id}" name="mail_form_{$email.id}" method="POST">
<input type="hidden" name="message_id" value="{$email.id}">
<input type="hidden" name="to" value="{$email.user_from}">
<div>
	<div class="redtitle"></div>
	<div style="float:right;">
		<a href="javascript:;" onclick="$('#compose_popup').jqmHide().remove()" title="Close">
			<img src="{$cfg.path.url_site}js/jqm_close.gif" border="0">
		</a>
	</div>
	<div class="clear" style="clear:both"><img src="{$cfg.image.pixel}" height="5"></div>
	<div class="generic_container clearfix">
		<div id="gallery_thumb_container_{$email.id}" style="display:none; float:left;">
			<div class="media" id="gallery_thumb_{$email.id}" style="margin-right: 10px;">
				<img src="{$cfg.image.pixel}" name="gallery_thumb_{$email.id}" width="75" height="75">
			</div>
		</div>
		<div style="float:left">
			<div>
				<b>Message to</b>:
				<a href="{$cfg.path.url_site}profile/{screenname user_id=$email.user_from}">{screenname user_id=$email.user_from}</a>
			</div>
			<div>
				<b>Subject</b>:
				<input class="textfield" type="text" name="subject" style="width:450px" value="{$email.subject}">
			</div>
			<div class="clear"><img src="{$cfg.image.pixel}" height="5"></div>
			<div>
				<button class="upload upload_photo">Add picture</button>&nbsp;<button class="upload upload_video">Add video</button>
			</div>
			<div class="clear"><img src="{$cfg.image.pixel}" height="5"></div>
			<div id="message_attachments"></div>
		</div>
		<div class="clear"><img src="{$cfg.image.pixel}" height="10"></div>
		<div>
			<textarea class="textfield" name="body" style="width:100%" rows="10">{$email.message}</textarea>
			<div class="clear"><img src="{$cfg.image.pixel}" height="10"></div>
			<div style="text-align:right;">
				<a href="javascript:;" onclick="if (confirm('Are you sure?')) $('#compose_popup').jqmHide().remove()">[cancel]</a>
				<a href="javascript:;" onclick="$('#mail_form_{$email.id}').submit()">[send]</a>
			</div>
			<div class="clear"><img src="{$cfg.image.pixel}" height="10"></div>
		</div>
	</div>
</div>
</form>

{literal}
<script>
$('#message_attachments').load('{/literal}{$cfg.path.url_site}ajax_message_attachments.php?e={$email.id}{literal}');
$("#mail_form_{/literal}{$email.id}{literal}").validate({
	rules: {
		captcha: {
			required: true,
			remote: "check_captcha.php"
		}
	},
	messages: {
		captcha: "Correct captcha is required."
	},
	submitHandler: function() {
		$("#mail_form_{/literal}{$email.id}{literal}").ajaxSubmit({
			url: {/literal}'{$cfg.path.url_site}ajax_message_new.php?u=t&f={$smarty.get.f}'{literal},
			success: function() {},
			dataType: "script"
		});
	},
	onkeyup: false
});
refreshimg();
$('button.upload').click(function() {
	var t = ($(this).html() == 'Add video') ? 'video' : 'picture';
	$(document.body).append('<div id="upload_popup" class="jqmWindow"></div>');
	$('#upload_popup').html('Loading... <img src="/js/busy.gif">');
	$('#upload_popup').jqm({
		ajax: '{/literal}{$cfg.path.url_site}ajax_upload_popup.php?e={$email.id}&t={literal}' + t,
		modal: true,
		overlay: 25
	}).jqmShow();
	return false;
});
</script>
{/literal}