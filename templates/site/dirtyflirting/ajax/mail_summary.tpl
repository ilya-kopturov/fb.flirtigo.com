{* $Id: mail_summary.tpl 544 2008-06-13 19:07:44Z root $ *}

<b>Messages in {$folders[$folder]}</b>
{if $new.emails eq '0'}
<div>You have <a href="javascript:;" class="inbox">{$new.emails} new mail message(s)</a> and <a href="javascript:;" class="inbox">{$old.emails} read message(s)</a>.</div>
{else}
<div>You have <a href="javascript:;" class="inbox"><b> {$new.emails} new mail message(s)</b></a> and <a href="javascript:;" class="inbox">{$old.emails} read message(s)</a>.</div>
{/if}

{if $new.flirts eq '0'}
<div>You have <a href="javascript:;" class="inbox" onclick="mail_tabs.tabs('select', 1)">{$new.flirts} new flirt(s)</a> and <a href="javascript:;" class="inbox" onclick="mail_tabs.tabs('select', 1)">{$old.flirts} read flirt(s)</a>.</div>
{else}
<div>You have <a href="javascript:;" class="inbox" onclick="mail_tabs.tabs('select', 1)"><b>{$new.flirts} new flirt(s)</b></a> and <a href="javascript:;" class="inbox" onclick="mail_tabs.tabs('select', 1)">{$old.flirts} read flirt(s)</a>.</div>
{/if}

{if $new.announce eq '0'}
<div>You have <a href="javascript:;" class="inbox" onclick="mail_tabs.tabs('select', 2)">{$new.announce} new site announcement(s)</a> and <a href="javascript:;" class="inbox" onclick="mail_tabs.tabs('select', 2)">{$old.announce} read site announcement(s)</a>.</div>
{else}
<div>You have <a href="javascript:;" class="inbox" onclick="mail_tabs.tabs('select', 2)"><b>{$new.announce} new site announcement(s)</b></a> and <a href="javascript:;" class="inbox" onclick="mail_tabs.tabs('select', 2)">{$old.announce} read site announcement(s)</a>.</div>
{/if}

<div><img src="{$cfg.image.pixel}" height="10"></div>
<div>Adjust your message <a href="{$cfg.path.url_site}mem_mail.php#Options" onclick="mail_tabs.tabs('select', 5);">options</a>.</div>
{if $folders[$folder] eq 'Trash'}
	<div><img src="{$cfg.image.pixel}" height="10"></div>
	<div>Trash is deleted in 30 days</div>
{/if}
