{* $Id: mail_message_detail.tpl 543 2008-06-13 18:50:22Z bogdan $ *}

<div id="message_{$email.id}">
<div class="message generic_container">
	<div style="margin-left:20px">
		<div>
			<div style="float:left">
				{if $smarty.get.f eq 2}
				<b>To</b>:
				{screenname user_id=$email.user_to}
				{else}
				<b>From</b>:
				{screenname user_id=$email.user_from}
				{/if}
			</div>
			{if $email.multimedia neq 'S'}
			<div style="float:right;margin-right:-5px;">
				{if $email.multimedia eq 'V' or $email.multimedia eq 'M'}
				<img style="float:left;margin-right:5px;" src="{$cfg.path.url_site}templates/site/dirtyflirting/login/images/dirtyflirting_mailvideo.gif">
				{/if}
				{if $email.multimedia eq 'I' or $email.multimedia eq 'M'}
				<img style="float:left;margin-right:5px;" src="{$cfg.path.url_site}templates/site/dirtyflirting/login/images/dirtyflirting_mailpicture.gif">
				{/if}
			</div>
			{/if}
			<br>
		</div>
		<div>
			<div style="float:left"><b>Date</b>: {$email.date_sent|date_format:"%d %B %Y %H:%M"}</div>
			<br>
		</div>
		<div>
			<div style="float:left"><b>Subject</b>: {if $email.subject}{$email.subject}{else}no subject{/if}</div>
			<br>
		</div>
		<div><img src="{$cfg.image.pixel}" height="10"></div>
		<div>
			<b>Message</b>:
			{if $email.type eq 'F'}
			  <div style="margin: 5px;">
			    <img src="{$cfg.path.url_attachments}{$attachments[0].file}" style="border:1px solid white" width="100">
			  </div>
			{/if}
			<div>{$email.message|nl2br}</div>
			{if $attachments}
			<div><img src="{$cfg.image.pixel}" height="20"></div>
			<div>
			{foreach from=$attachments item=attachment}
				<div style="float:left;margin-right:5px;">
					{if $email.type neq 'F'}
					<a href="javascript:;" onclick="openAttachment({$attachment.id});">
						<img src="{$cfg.path.url_site}attachment_preview.php?{rnd_md5}&id={$attachment.id}" title="Click to view" border="0" style="border:1px solid white">
					</a>
					{/if}
				</div>
			{/foreach}
			</div>
			{/if}
		</div>
	</div>
	<div class="clear" style="clear:both;"><img src="{$cfg.image.pixel}" height="0"></div>
	<div style="text-align:right">
		[<a href="javascript:;" class="featuredBoxLink" onclick="mail_tabs.tabs('remove', mail_tabs.data('selected.tabs')).tabs('select', {$cfg.mail.folder_order[$folder]})">close</a>]
	</div>
	<div class="clear" style="clear:both;"><img src="{$cfg.image.pixel}" height="0"></div>
</div>
</div>

{literal}
<script>
$('#mail_messages_count').load('{/literal}{$cfg.path.url_site}ajax_check_mail.php{literal}');
function openAttachment(id) {
	$(document.body).append('<div id="attachment_popup" class="jqmWindow"></div>');
	$('#attachment_popup').html('Loading... <img src="/js/busy.gif">');
	$('#attachment_popup').jqm({
		ajax: '{/literal}{$cfg.path.url_site}ajax_attachment.php?id={literal}' + id,
		modal: true,
		overlay: 25
	}).jqmShow();
}
</script>
{/literal}
