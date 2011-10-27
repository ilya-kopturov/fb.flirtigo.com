{* $Id: mail_message_detail.tpl 543 2008-06-13 18:50:22Z andi $ *}

<div id="message_{$email.id}">
<div class="message generic_container">
	<div style="float:left;">
		<a href="{$cfg.path.url_site}profile/{screenname user_id=$email.user_from}">
			<img src="{$cfg.path.url_site}showphoto.php?{rnd_md5}&id={$email.user_from}&m=Y&t=m&p=1" width="121px" height="121px" alt="{screenname user_id=$email.user_from}">
		</a>
		<div>
			<div><img src="{$cfg.image.pixel}" height="10"></div>
			<div><a href="{$cfg.path.url_site}profile/{screenname user_id=$email.user_from}" class="featuredBoxLink">[view full profile]</a></div>
			<div><a href="javascript:;" class="featuredBoxLink" onclick="addHotBlock('H', {$email.user_from})">[add user to hot list]</a></div>
			<div><a href="javascript:;" class="featuredBoxLink" onclick="addHotBlock('B', {$email.user_from})">[block user]</a></div>
			<div><a href="javascript:;" class="featuredBoxLink" onclick="reportSpam({$email.user_from}, {$email.id})">[report as spam]</a></div>
		</div>
	</div>
	<div style="margin-left:136px">
		<div>
			<div style="float:left">
				{if $smarty.get.f eq 2}
				<b>To</b>:
				<a href="{$cfg.path.url_site}profile/{screenname user_id=$email.user_to}">{screenname user_id=$email.user_to}</a>
				{else}
				<b>From</b>:
				<a href="{$cfg.path.url_site}profile/{screenname user_id=$email.user_from}">{screenname user_id=$email.user_from}</a>
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
		{if $email.type NEQ 'R' AND $smarty.session.sess_id NEQ $email.user_from}
		[<a href="javascript:;" class="featuredBoxLink" onclick="$('#message_{$email.id}').load('{$cfg.path.url_site}ajax_message_reply.php?id={$email.id}&f={$smarty.get.f}');">reply</a>]
		{/if}
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
