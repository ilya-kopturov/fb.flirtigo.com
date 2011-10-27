<div class="center">
	<div id="whos_inside_block1">
		<div class="grey" id="whos_inside_block2">
			<div class="clear" style="width: 5px; height: 15px;"></div>
			<div class="container_text caption">
				<span class="container_red_text">whos</span> inside
			</div>
			<div class="tabs_container">
				<div id="Top_Rated_button" class="indextabs" >Top Rated</div>
				<div style="float: right; width: 5px;"><img src="{$base_url}images/pixel.gif" style="width: 5px;" /></div>
				<div id="Featured_button" class="indextabs_hover">Featured</div>
			</div>
			<div class="thumbs_container">
				<div id="Featured" class="tab_container">
				{section name="user" loop=$featured max=8}
					{if $featured[user].id}
						<div class="pic_user">
							<div class="thumb">
								<a href="{$base_url}profile/{screenname user_id=$featured[user].id}"><img class="bg" src="{$base_url}templates/site/dirtyflirting/public/images/hornybook_bgpicturegrey.gif" alt="adult dating" /></a>
								<img class="photo" src="{$base_url}showphoto.php?id={$featured[user].id}&m=Y&t=s&p=1" alt="internet dating" />
							</div>
							<div class="smalltext info"><a href="{$base_url}profile/{screenname user_id=$featured[user].id}" style="text-decoration: underline;">{$featured[user].screenname}</a></div>
							<div class="smalltext info">{age birthday=$featured[user].birthdate} Years Old</div>
							<div class="smalltext info">{$featured[user].city}</div>
						</div>
					{else}
						<div class="pic_no_user"><img src="{$base_url}templates/site/dirtyflirting/public/images/hornybook_bgpicturegrey_full.gif" alt="adult personals" /></div>
					{/if}
					{if $smarty.section.user.iteration % 4 == 0 && !$smarty.section.user.last}
						<div style="clear: both;"><img src="{$base_url}images/pixel.gif" height="1px"/></div>
					{/if}
				{/section}
				</div>
				{* Top Rated *}
						<div id="Top_Rated" class="tab_container" style="display: none;">
						{section name="user" loop=$toprated max=8}
							{if $toprated[user].id}
								<div class="pic_user">
									<div class="thumb">
										<a href="{$base_url}profile/{screenname user_id=$toprated[user].id}"><img class="bg" src="{$base_url}templates/site/dirtyflirting/public/images/hornybook_bgpicturegrey.gif" alt="online dating" /></a>
										<img	class="photo" src="{$base_url}showphoto.php?id={$toprated[user].id}&m=Y&t=r&p=1" alt="adult social network" />
									</div>
									<div class="smalltext info"><a href="{$base_url}profile/{screenname user_id=$toprated[user].id}" style="text-decoration: underline;">{$toprated[user].screenname}</a></div>
									<div class="smalltext info">{age birthday=$toprated[user].birthdate} Years Old</div>
									<div class="smalltext info">{$toprated[user].city}</div>
								</div>
							{else}
								<div class="pic_no_user"><img src="{$base_url}templates/site/dirtyflirting/public/images/hornybook_bgpicturegrey_full.gif" alt="adult social networking" /></div>
							{/if}
							{if $smarty.section.user.iteration % 4 == 0 && !$smarty.section.user.last}
								<div class="clear"><img src="{$base_url}images/pixel.gif" style="width: 1px;" alt="married sex" /></div>
							{/if}
						{/section}
						</div>
						{*end Top Rated*}
					</div>
					<div class="clear"><img src="{$base_url}images/pixel.gif" height="1px"/></div>
					<div class="more">
						[<a href="{$base_url}join.php">more</a>]
					</div>
		</div>
	</div>
	<div class="grey" id="right_block">
		<div class="sugnup_container">
				<a href="{$base_url}join.php"><img src="{$base_url}templates/site/dirtyflirting/public/images/hornybook_bcreateaccount.gif" alt="Free" /></a>
		</div>
		<div style="width: 240px; height: 15px; background-color: white;">
			<img src="{$base_url}images/pixel.gif" style="height: 15px;">
		</div>
			<div class="grey" style="float: left; width: 233px; height: 320px; padding: 7px 3px 0px 3px;">
				<div class="container_text" style="float: left; height: 30px; text-align: left;">
					<span class="container_red_text">quick</span> search
				</div>				
				<form method="get" action="/locate.php">
			<input type="hidden" name="heading" value="Women seeking Men">
					<div style="clear: both; width: 219px; height: 150px; background-color: white; padding: 5px; margin: 0px;">
						<div style="float: left; width: 54px; text-align: left;">Search</div>
						<div style="float: left; width: 155px;">
							<select name="sex_looking" style="width:155px;">
								<option value="0" selected>Women seeking Men</option>
								<option value="1">Men seeking Women</option>
								<option value="2">Men seeking Men</option>
								<option value="3">Women seeking Women</option>
								<option value="4">Men seeking Couples</option>
								<option value="5">Woman seeking Couples</option>
							</select>
						</div>
						<div class="clear"><img src="{$base_url}images/pixel.gif" style="width: 3px; border: 0px;" alt="live cams" /></div>
						<div style="float: left; width: 54px; text-align: left;">Ages</div>
				<div style="float: left; width: 155px; text-align: left;">
					<select style="width:50px" name="age_from">{html_options values=$cfg.profile.age output=$cfg.profile.age selected=18}</select>
					<span>to</span>
					<select style="width:50px" name="age_to">{html_options values=$cfg.profile.age output=$cfg.profile.age selected=99}</select>
							</div>
						<div class="clear"><img src="{$base_url}images/pixel.gif" style="width: 6px; border: 0px;" alt="live sex cams" /></div>
						<div style="float: left; width: 54px; text-align: left;">State</div>
							<div style="float: left; width: 155px;">
								<select name="state" style="vertical-align:middle; width:155px;">
								<option value="0">Choose...</option>
					{foreach from=$states key=id item=name}
					<option value="{$id}">{$name}</option>
					{/foreach}
					</select>
							</div>
						<div class="clear"><img src="{$base_url}images/pixel.gif" style="width: 6px; border: 0px;" alt="sex date" /></div>
						<div style="float: left; width: 54px; text-align: left;">Country</div>
						<div style="float: left; width: 155px;">
							<select name="country" style="vertical-align:middle;width:155px;">
							<option value="1">Choose...</option>
							{foreach from=$countries key=id item=name}
								<option value="{$id}" {if $id == $userArea.id}selected{/if}>{$name}</option>
								{if $id == 3}
									<option value="15" {if 15 == $userArea.id}selected{/if}>Australia</option>
								{elseif $id == 39}
									<option value="2" {if 2 == $userArea.id}selected{/if}>Canada</option>
								{elseif $id == 220}
									<option value="3" {if 3 == $userArea.id}selected{/if}>United Kingdom</option>
									<option value="2" {if 2 == $userArea.id}selected{/if}>United States</option>
								{/if}
							{/foreach}
							</select>
						</div>
						<div class="clear"><img src="{$base_url}images/pixel.gif" style="height: 6px; border: 0px;" alt="sex dating" /></div>
						<div style="width: 204px; text-align: right;"><input type="image" name="login" src="{$base_url}templates/site/dirtyflirting/login/images/hornybook_quicksearch.gif" /></div>
					</div>
					</form>
					<div class="container_text" style="float: left; height: 25px; text-align: left; padding-top: 5px;">
						<span class="container_red_text">tag</span> search
					</div>
					<div class="grey" id="tag_cloud">
						{foreach name=tags from=$tags item=tag}
					{assign var="ratio" value=$tag.count/$tag_sum*6}
				{assign var="header" value=$ratio*100/6%6+6}
					<h{$header}>
						<a title="search for {$tag.tag|lower}" href="/tag/{$tag.tag|lower|escape:'urlpathinfo'}" style="font-size:{$ratio+1}em">{$tag.tag|lower|capitalize}</a>
					</h{$header}>
				{foreachelse}
				Empty tag cloud
				{/foreach}
					</div>
				</div>
		{* ... *}
	</div>
</div>
<div class="clear"><img src="{$base_url}images/pixel.gif" height="15px" alt="adult date"/></div>

{literal}
<script type="text/javascript">
$(document).ready(function() {
	$('select[name="sex_looking"]').change(function() {
		$('input[name="heading"]').attr('value', this.options[this.selectedIndex].text);
	});
	
	$('#Featured_button').hover(function(){
		$(this).addClass('indextabs_hover');
	}, function(){
		$(this).addClass('indextabs');
		var $currDisplay = $('#Featured').css('display');
		if($currDisplay == 'none'){
			$(this).removeClass('indextabs_hover');
		}
	});
	
	$('#Top_Rated_button').hover(function(){
		$(this).addClass('indextabs_hover');
	}, function(){
		$(this).addClass('indextabs');
		var $currDisplay = $('#Top_Rated').css('display');
		if($currDisplay == 'none'){
			$(this).removeClass('indextabs_hover');
		}
	});
	
	$('#Featured_button').click(function(){
		$('#Top_Rated').css('display', 'none');
		$('#Featured').css('display',  'block');
		$(this).addClass('indextabs_hover');
		$('#Top_Rated_button').removeClass('indextabs_hover');
		$('#Top_Rated_button').addClass('indextabs');
	});
	$('#Top_Rated_button').click(function(){
		$('#Featured').css('display',  'none');
		$('#Top_Rated').css('display', 'block');
		$(this).addClass('indextabs_hover');
		$('#Featured_button').removeClass('indextabs_hover');
		$('#Featured_button').addClass('indextabs');
	});
});
</script>

<script type="text/javascript">
var gaJsHost = (("https:" == document.location.protocol) ? "https://ssl." : "http://www.");
document.write(unescape("%3Cscript src='" + gaJsHost + "google-analytics.com/ga.js' type='text/javascript'%3E%3C/script%3E"));
</script>
<script type="text/javascript">
try {
var pageTracker = _gat._getTracker("UA-1817400-9");
pageTracker._trackPageview();
} catch(err) {}</script>
{/literal}