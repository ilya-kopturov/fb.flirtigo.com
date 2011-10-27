{* $Id: mail.tpl 557 2008-06-17 18:13:22Z root $ *}

<script type="text/javascript" src="{$cfg.path.url_site}jqgrid/jquery.jqGrid.js"></script>

{include file="site/dirtyflirting/login/menu.tpl"}

<table class="center" cellpadding="0" cellspacing="0">
<tr>
    <td valign="top" align="center" style="padding: 0;">
	{* MEMBER PAGE - RIGHT *}
		<div id="mail" style="width:744px">
			<ul>
				<li><a href="{$cfg.path.url_site}ajax_mail_folder.php?f=1" title="Inbox"><span>Inbox</span></a></li>
				<li><a href="{$cfg.path.url_site}ajax_mail_folder.php?f=4" title="Flirts"><span>Flirts</span></a></li>
				<li><a href="{$cfg.path.url_site}ajax_mail_folder.php?f=5" title="Site Announce"><span>Site Announce</span></a></li>
				<li><a href="{$cfg.path.url_site}ajax_mail_folder.php?f=2" title="Outbox"><span>Outbox</span></a></li>
				<li><a href="{$cfg.path.url_site}ajax_mail_folder.php?f=3" title="Trash"><span>Trash</span></a></li>
				<li><a href="{$cfg.path.url_site}ajax_mail_options.php" title="Options"><span>Options</span></a></li>
			</ul>
		</div>
	{* MEMBER PAGE - RIGHT - FINISH *}
	</td>
</tr>
</table>

{literal}
<script type="text/javascript">
$(document).ready(function() {
	mail_tabs = $('#mail > ul').tabs({
		cache: true,
		add: function(ui) {
        	$(this).tabs('select', $('li', this).size() - 1);
        },
		show: function(ui) {
			$('#error_alert').fadeOut('fast');
		}
	});
	$('li:eq(5)', mail_tabs).css({marginRight: '10px'});
});
</script>
{/literal}
