{assign var="email_id" value=$smarty.get.e}
{foreach from=$smarty.session.mail_attachments[$email_id] key=index item=attachment}
<div>
	{if $attachment.type eq 'picture'}
	<img class="mail_att" width="16" src="{$cfg.path.url_site}templates/site/dirtyflirting/login/images/dirtyflirting_mailpicture.gif">
	{elseif $attachment.type eq 'video'}
	<img class="mail_att" width="16" src="{$cfg.path.url_site}templates/site/dirtyflirting/login/images/dirtyflirting_mailvideo.gif">
	{/if}
	<span class="mail_att">{$attachment.orig}</span>
	<a class="mail_att" href="javascript:;" onclick="deleteAttachment({$index})" title="Delete '{$attachment.orig}'">[x]</a>
</div>

{foreachelse}
<div>No attachment</div>
{/foreach}

{literal}
<script>
function deleteAttachment(id) {
	$.get('{/literal}{$cfg.path.url_site}ajax_message_attachments.php?e={$email_id}&u=d&id={literal}' + id, function(response) {
		$('#message_attachments').load('{/literal}{$cfg.path.url_site}ajax_message_attachments.php?e={$email_id}{literal}');
	});
}
</script>
{/literal}