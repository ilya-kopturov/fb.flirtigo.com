{* $Id: mail_folder.tpl 533 2008-06-13 11:00:01Z andi $ *}

{if $emails}
<div id="mail_folder_container">
	<div class="generic_container" id="{$folders[$folder]}_summary" class="mail_summary">Loading {$folders[$folder]} Summary...</div>
	<div class="clear"><img src="{$cfg.image.pixel}" height="10"></div>
	<table id="mail_folder_{$folders[$folder]}" class="scroll" border="0" cellpadding="0" cellspacing="0" width=100%></table>
	<div id="mail_pager_{$folders[$folder]}" class="scroll" style="text-align:center;"></div>
	<div class="clear"><img src="{$cfg.image.pixel}" height="2"></div>
	<div style="text-align:left">
		<a href="javascript:;" onclick="doDelete($('#mail_folder_{$folders[$folder]}'), $('#{$folders[$folder]}_summary'), '{$folders[$folder]}', {$folder})">
		{if $folder eq '3' or $folder eq '5'}
		[delete selected]
		{else}
		[trash selected]
		{/if}
		</a>
	</div>
</div>
{literal}
<script>
$.extend($.jgrid.nav, {
    refreshtitle: "Reload {/literal}{$folders[$folder]}{literal}"
});
$("#mail_folder_{/literal}{$folders[$folder]}{literal}").jqGrid({
	url: '{/literal}{$cfg.path.url_site}xml_mail_messages.php{literal}?f={/literal}{$folder}{literal}',
	datatype: "xml",
	colNames: ['', '<b>Video</b>', '<b>Photo</b>', {/literal}{if $folder eq 2}'<b>To</b>'{else}'<b>From</b>'{/if}{literal}, {/literal}{if $folder eq 1 or $folder eq 4}'<b>Subject (click to view message)</b>'{else}'<b>Subject</b>'{/if}{literal}, '<b>Date</b>'],
	colModel: [
		{name: 'is_new', index: 'is_new', width: 22, sortable: false, align: 'center', resizable: false},
		{name: 'is_video', index: 'is_video', width: 38, sortable: false, align: 'center', resizable: false},
		{name: 'is_photo', index: 'is_photo', width: 38, sortable: false, align: 'center', resizable: false},
		{name: 'user_from', index: 'user_from', width: 100, sortable: true},
		{name: 'subject', index: 'subject', width: 330, sortable: true},
		{name: 'date_sent', index: 'date_sent', width: 150, sortable: true}
	],
	width: $('div.generic_container').outerWidth(),
	height: '100%',
	recordtext: 'email(s)',
	loadtext: 'Loading {/literal}{$folders[$folder]}{literal}...',
	hidegrid: false,
	rowNum: 10,
	rowList: [10, 20, 30],
	imgpath: '{/literal}{$cfg.path.url_site}jqgrid/themes/coffe/images{literal}',
	pager: $("#mail_pager_{/literal}{$folders[$folder]}{literal}"),
	viewrecords: true,
	sortname: 'date_sent',
	sortorder: "desc",
	multiselect: true,
	onSelectRow: function(id) {
		var url = '{/literal}{$cfg.path.url_site}ajax_read_message.php{literal}?id=' + id + '&f={/literal}{$folder}{literal}&p=' + this.getPage();
		mail_tabs.tabs('add', url, this.getRowData(id)['subject'].substr(0, 10) + '...');
	},
	loadComplete: function() {
		$("#{/literal}{$folders[$folder]}_summary{literal}").load('{/literal}{$cfg.path.url_site}ajax_mail_summary.php?f={$folder}{literal}');
		$('#mail_messages_count').load('{/literal}{$cfg.path.url_site}ajax_check_mail.php{literal}');
		$('input.cbox').click(function(e) {
			e.stopPropagation();
		});
	}
}).navGrid('#mail_pager_{/literal}{$folders[$folder]}{literal}', {
	edit: false,
	add: false,
	del: false,
	search: false
});

function doDelete(grid, summary, folderName, folderIndex) {
	var params = '?u=t&f=' + folderIndex;
	var selected = $('input.cbox[checked]').each(function() {
		params += '&del[]=' + this.value;
	});
	if (selected.size() == 0) {
		alert("You didn't select any message.");
	} else {
		$.get('{/literal}{$cfg.path.url_site}ajax_mail_folder.php{literal}' + params, function(response) {
			//summary.load("{/literal}{$cfg.path.url_site}{literal}ajax_mail_summary.php?f=" + folderIndex);
			grid.trigger('reloadGrid');
		});
	}
}
</script>
{/literal}
{else}
<div id="mail_folder_container">
        <div class="generic_container" id="{$folders[$folder]}_summary" class="mail_summary">Loading {$folders[$folder]} Summary...</div>
        <div class="clear"><img src="{$cfg.image.pixel}" height="10"></div>
        <table id="mail_folder_{$folders[$folder]}" class="scroll" border="0" cellpadding="0" cellspacing="0" width=100%></table>
        <div id="mail_pager_{$folders[$folder]}" class="scroll" style="text-align:center;"></div>
        <div class="clear"><img src="{$cfg.image.pixel}" height="2"></div>
        <div style="text-align:left">
                <a href="javascript:;" onclick="doDelete($('#mail_folder_{$folders[$folder]}'), $('#{$folders[$folder]}_summary'), '{$folders[$folder]}', {$folder})">
                {if $folder eq '3' or $folder eq '5'}
                [delete selected]
                {else}
                [trash selected]
                {/if}
                </a>
        </div>
</div>
{literal}
<script>
$.extend($.jgrid.nav, {
    refreshtitle: "Reload {/literal}{$folders[$folder]}{literal}"
});
$("#mail_folder_{/literal}{$folders[$folder]}{literal}").jqGrid({
        url: '{/literal}{$cfg.path.url_site}xml_mail_messages.php{literal}?f={/literal}{$folder}{literal}',
        datatype: "xml",
        colNames: ['', '<b>Video</b>', '<b>Photo</b>', {/literal}{if $folder eq 2}'<b>To</b>'{else}'<b>From</b>'{/if}{literal}, {/literal}{if $folder eq 1 or $folder eq 4}'<b>Subject (click to view message)</b>'{else}'<b>Subject</b>'{/if}{literal}, '<b>Date</b>'],
        colModel: [
                {name: 'is_new', index: 'is_new', width: 22, sortable: false, align: 'center', resizable: false},
                {name: 'is_video', index: 'is_video', width: 38, sortable: false, align: 'center', resizable: false},
                {name: 'is_photo', index: 'is_photo', width: 38, sortable: false, align: 'center', resizable: false},
                {name: 'user_from', index: 'user_from', width: 100, sortable: true},
                {name: 'subject', index: 'subject', width: 330, sortable: true},
                {name: 'date_sent', index: 'date_sent', width: 150, sortable: true}
        ],
        width: $('div.generic_container').outerWidth(),
        height: '100%',
        recordtext: 'email(s)',
        loadtext: 'Loading {/literal}{$folders[$folder]}{literal}...',
        hidegrid: true,
        rowNum: 10,
        rowList: [10, 20, 30],
        imgpath: '{/literal}{$cfg.path.url_site}jqgrid/themes/coffe/images{literal}',
        pager: $("#mail_pager_{/literal}{$folders[$folder]}{literal}"),
        viewrecords: true,
        sortname: 'date_sent',
        sortorder: "desc",
        multiselect: true,
        onSelectRow: function(id) {
                var url = '{/literal}{$cfg.path.url_site}ajax_read_message.php{literal}?id=' + id + '&f={/literal}{$folder}{literal}&p=' + this.getPage();
                mail_tabs.tabs('add', url, this.getRowData(id)['subject'].substr(0, 10) + '...');
        },
        loadComplete: function() {
                $("#{/literal}{$folders[$folder]}_summary{literal}").load('{/literal}{$cfg.path.url_site}ajax_mail_summary.php?f={$folder}{literal}');
                $('#mail_messages_count').load('{/literal}{$cfg.path.url_site}ajax_check_mail.php{literal}');
                $('input.cbox').click(function(e) {
                        e.stopPropagation();
                });
        }
}).navGrid('#mail_pager_{/literal}{$folders[$folder]}{literal}', {
        edit: false,
        add: false,
        del: false,
        search: false
});

function doDelete(grid, summary, folderName, folderIndex) {
        var params = '?u=t&f=' + folderIndex;
        var selected = $('input.cbox[checked]').each(function() {
                params += '&del[]=' + this.value;
        });
        if (selected.size() == 0) {
                alert("You didn't select any message.");
        } else {
                $.get('{/literal}{$cfg.path.url_site}ajax_mail_folder.php{literal}' + params, function(response) {
                        //summary.load("{/literal}{$cfg.path.url_site}{literal}ajax_mail_summary.php?f=" + folderIndex);
                        grid.trigger('reloadGrid');
                });
        }
}
</script>
{/literal}

<div style="text-align:center">No message in this folder</div>
{/if}
