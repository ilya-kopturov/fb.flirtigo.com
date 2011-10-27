{* $Id: mail_message_simple.tpl 538 2008-06-13 15:53:10Z andi $ *}

<div id="message_{$email.id}">
	<div class="message generic_container">
		<div style="float:left">
			{if $email.multimedia eq 'I'}
			<a onclick="showPicturePopup({$email.attachment_id})" href="javascript:;">
				<img width="75" height="75" border="0" src="{$cfg.path.url_site}showphoto.php?{rnd_md5}&photo_id={$email.attachment_id}&t=m">
			</a>
			{elseif $email.multimedia eq 'V'}
			<a href="javascript:;" onclick="showVideoPlayer({$email.attachment_id})">
				<img border="0" width="75" height="75" src="{$cfg.path.url_site}videothumb.php?{rnd_md5}&id={$email.attachment_id}">
			</a>
			{else}
			<a href="{$cfg.path.url_site}profile/{screenname user_id=$email.user_from}">
				<img border="0" src="{$cfg.path.url_site}showphoto.php?{rnd_md5}&id={$email.user_from}&m=Y&t=m&p=1"  width="75px" height="75px" alt="{screenname user_id=$email.user_from}">
			</a>
			{/if}
			<div>
			{if $email.multimedia eq 'I'}
			[<a onclick="showPicturePopup({$email.attachment_id})" href="javascript:;" class="featuredBoxLink">click to view</a>]
			{elseif $email.multimedia eq 'V'}
			[<a onclick="showVideoPlayer({$email.attachment_id})" href="javascript:;" class="featuredBoxLink">click to play</a>]
			{else}
			[<a href="{$cfg.path.url_site}profile/{screenname user_id=$email.user_from}" class="featuredBoxLink">click to view</a>]
			{/if}
			</div>
		</div>
		<div style="margin-left:90px">
			<div>
				<div style="float:left">
					<b>From</b>:
					<a href="{$cfg.path.url_site}profile/{screenname user_id=$email.user_from}">{screenname user_id=$email.user_from}</a>
				</div>
				{if $email.multimedia eq 'V'}
				<img style="float:right" src="{$cfg.path.url_site}templates/site/dirtyflirting/login/images/dirtyflirting_mailvideo.gif">
				{elseif $email.multimedia eq 'I'}
				<img style="float:right" src="{$cfg.path.url_site}templates/site/dirtyflirting/login/images/dirtyflirting_mailpicture.gif">
				{/if}
				<br>
			</div>
			<div>
				<div style="float:left">
					<b>Message type</b>:
					{if $email.multimedia eq 'I'}
					Image email
					{elseif $email.multimedia eq 'V'}
					Video email
					{else}
					Standard email
					{/if}
				</div>
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
			<div>
				<div style="float:left">
				{if $smarty.session.sess_accesslevel eq 0}
					<a href="{$cfg.path.url_upgrade}?id={$smarty.session.sess_id}">[click here to view message]</a>
				{else}
					<b>Message</b>: {$email.message|truncate:30:"..."}
				{/if}
				</div>
				<br>
				<div style="text-align:right">
					[<a href="javascript:;" class="featuredBoxLink" onclick="$('#message_{$email.id}').load('{$cfg.path.url_site}ajax_message.php?detail&id={$email.id}')">more</a>]
					{if $email.type neq 'R'}
					[<a href="javascript:;" class="featuredBoxLink" onclick="$('#message_{$email.id}').load('{$cfg.path.url_site}ajax_message_reply.php?id={$email.id}')">reply</a>]
					{/if}
				</div>
			</div>
		</div>
	</div>
</div>