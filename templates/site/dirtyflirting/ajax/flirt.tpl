{* $Id: flirt.tpl 532 2008-06-12 21:18:53Z andi $ *}

<div class="clearfix" style="width:460px;text-align:left;">
	<div style="float:right;">
		<a href="javascript:;" onclick="$('#flirt_popup').jqmHide().remove()" title="Close">
			<img src="{$cfg.path.url_site}js/jqm_close.gif" border="0">
		</a>
	</div>
	<div class="redtitle" style="text-align:center">Send a Free Dirty Flirt</div>
	<div class="clear" style="clear:both"><img src="{$cfg.image.pixel}" height="10"></div>
	<div>Select a flirt from below and hit send and the user will receive it in their Messages.</div>
	<div><b>Tip</b>: Emails usually get a better response!</div>
	<div class="clear" style="clear:both"><img src="{$cfg.image.pixel}" height="10"></div>
	<div class="generic_container clearfix" style="height:450px;overflow:auto">
		{foreach name=flirts from=$flirts item=flirt}
		<div style="float:left;width:210px;">
			<form method="POST" class="flirt_form" style="float:left;">
				<input type="hidden" name="to" value="{$smarty.get.id}">
				<input type="hidden" name="id" value="{$flirt.id}">
				<div style="float:left;margin-right:10px;">
					<img src="{$cfg.path.url_site}images/{$flirt.id}.gif" width="100">
				</div>
				<div style="float:left;width:100px;font-weight:bold;">
					<div>{$flirt.whisper} </div>
					<div><img src="{$cfg.image.pixel}" height="5"></div>
					<div><input type="submit" value="Send"></div>
				</div>
			</form>
		</div>
		{if $smarty.foreach.flirts.index mod 2}
		<div class="clear" style="clear:both"><img src="{$cfg.image.pixel}" height="5"></div>
		{/if}
		{/foreach}
	</div>
</div>

{literal}
<script>
$('form.flirt_form').ajaxForm({
	url: {/literal}'{$cfg.path.url_site}ajax_flirt.php?u=t'{literal},
	dataType: 'script'
});
</script>
{/literal}
