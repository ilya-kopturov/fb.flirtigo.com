{* $Id: leftside.tpl 537 2008-06-13 14:30:38Z andi $ *}

        <table class="stats" cellpadding="0" cellspacing="0" style="margin-top:0px;">
		<tr>
            <td align="left">
        	{if $show_stats}
			<div class="stats">
				<div class="stats_bold">Current Stats:</div>
				<div>{$stats.total} members</div>

				<div class="clear"><img src="{$cfg.image.pixel}" height="5"></div>
			</div>
         	{/if}
            <div class="blacktitle" style="text-align:center">Featured Members</div>
		    <div id="featuredmost">
			    <ul>
				  <li><a href="{$cfg.path.url_site}featuredsmall.php?limit=4" title="Featured"><span>Featured</span></a></li>
				  <li><a href="{$cfg.path.url_site}mostpopularsmall.php?limit=4" title="Most Popular"><span>Most Popular</span></a></li>
			    </ul>
		   </div>
          {if $show_cams && $smarty.session.cams.live}
			<div class="clear" style="background-color:black"><img src="{$cfg.image.pixel}" height="1"></div>
			<div class="blacktitle">Live Cams</div>
            <div class="normaltext">Whos Live Now?</div>
            {if $smarty.session.sess_id}
			<a href="{$cfg.path.url_site}mem_xtras.php"><img src="{$smarty.session.cams.live[0].performer_schedule_pic}" alt="FlirtiGo.com" style="border: 0px; width: 80px; height: 60px;" /></a>
			{else}
			<img src="{$smarty.session.cams.live[0].performer_schedule_pic}" alt="FlirtiGo.com" style="border: 0px; width: 80px; height: 60px;" />
			{/if}
			<div class="normaltext" style="float:left">{$smarty.session.cams.live[0].start_24|date_format:"%H:%M %P"} USA EST</div>
             <div style="float:right;" class="featuredBoxLink">
               {if $smarty.session.sess_id}
                 [<a href="{$cfg.path.url_site}mem_xtras.php" class="featuredBoxLink">more</a>]
               {else}
                 [<a href="{$cfg.path.url_site}join.php" class="featuredBoxLink">more</a>]
               {/if}
             </div>
          {else if $show_cams && $smarty.session.cams.next}
			<div class="clear" style="background-color:black"><img src="{$cfg.image.pixel}" height="1"></div>
			<div class="blacktitle">Live Cams</div>
            <div class="normaltext">Whos Live Now?</div>
            {if $smarty.session.sess_id}
			<a href="{$cfg.path.url_site}mem_xtras.php"><img src="{$smarty.session.cams.next[0].performer_schedule_pic}" alt="FlirtiGo.com" style="border: 0px; width: 80px; height: 60px;" /></a>
			{else}
			<img src="{$smarty.session.cams.next[0].performer_schedule_pic}" alt="FlirtiGo.com" style="border: 0px; width: 80px; height: 60px;" />
			{/if}
			<div class="normaltext" style="float:left">{$smarty.session.cams.next[0].start_24|date_format:"%H:%M %P"} USA EST</div>
             <div style="float:right;" class="featuredBoxLink">
               {if $smarty.session.sess_id}
                 [<a href="{$cfg.path.url_site}mem_xtras.php" class="featuredBoxLink">more</a>]
               {else}
                 [<a href="{$cfg.path.url_site}join.php" class="featuredBoxLink">more</a>]
               {/if}
             </div>
          {/if}
          {if $show_cloud}
			<div class="clear" style="background-color:black"><img src="{$cfg.image.pixel}" height="1"></div>
			<div class="stats_bold" style="text-align:center">Featured Member Tags:</div>
			<div id="tag_cloud" class="featured clearfix" style="text-align:center">
			{foreach name=tags from=$tags item=tag}
				{assign var="ratio" value=$tag.count/$tag_sum*6}
				{assign var="header" value=$ratio*100/6%6+6}
				<h{$header}>
					<a title="search for {$tag.tag|lower}" href="{$cfg.path.url_site}tag/{$tag.tag|lower|escape:'urlpathinfo'}" style="font-size:{$ratio+1}em">{$tag.tag|lower|capitalize}</a>
				</h{$header}>
			{foreachelse}
				Empty tag cloud
			{/foreach}
			</div>
		{/if}
          </td>
          </tr>
        </table>

	{literal}
	<script type="text/javascript">
		$('#featuredmost > ul').tabs({
			fxAutoHeight:false,
			remote:true,
			spinner:''
		});
  	</script>
	{/literal}
