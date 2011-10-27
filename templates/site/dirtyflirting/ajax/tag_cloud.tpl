<div class="clearfix" style="width:150px">
	<div class="clear"><img src="{$cfg.image.pixel}" height="5"></div>
	{foreach name=tags from=$tags item=tag}
		{assign var="ratio" value=$tag.count/$tag_sum*6}
		{assign var="header" value=$ratio*100/-6%6+6}
		<h{$header} style="display:inline">
			<a title="search for {$tag.tag|lower}" href="{$cfg.path.url_site}tag/{$tag.tag|lower|escape:'urlpathinfo'}" style="font-size:{$ratio+1}em">{$tag.tag|lower|capitalize}</a>
		</h{$header}>
	{foreachelse}
		Empty tag cloud
	{/foreach}
</div>
