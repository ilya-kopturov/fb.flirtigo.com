<div class="center">
	<div id="whos_inside_block1">
		<div class="grey" id="whos_inside_block2">
			<div class="clear" style="width: 5px; height: 15px;"></div>
			<div class="container_text caption">
                        <a href="{$base_url}join.php" style="text-decoration: none;">Join Now for Free</a>
			</div>
			<div class="tabs_container">
				<div id="Top_Rated_button" class="indextabs" >Top Rated</div>
				<div style="float: right; width: 5px;"><img src="{$base_url}images/pixel.gif" style="width: 5px;" /></div>
				<div id="Featured_button" class="indextabs_hover">Featured</div>
			</div>
			<div class="thumbs_container">
				<div id="Featured" class="tab_container">
				{section name="user" loop=$featured max=15}
					{if $featured[user].id}
						<div class="pic_user">
							<div class="thumb">
								<a href="{$base_url}profile/{screenname user_id=$featured[user].id}">
								<img class="photo" src="{$base_url}showphoto.php?id={$featured[user].id}&m=Y&t=s&p=1" alt="internet dating" /></a>
							</div>
						</div>
					{else}
						<div class="pic_no_user"><img src="{$base_url}templates/site/dirtyflirting/public/images/hornybook_bgpicturegrey_full.gif" alt="adult personals" /></div>
					{/if}
					{if $smarty.section.user.iteration % 5  == 0 && !$smarty.section.user.last}
						<div style="clear: both;"><img src="{$base_url}images/pixel.gif" height="1px"/></div>
					{/if}
				{/section}
				</div>
				{* Top Rated *}
						<div id="Top_Rated" class="tab_container" style="display: none;">
						{section name="user" loop=$toprated max=15 }
							{if $toprated[user].id}
								<div class="pic_user">
									<div class="thumb">
										<a href="{$base_url}profile/{screenname user_id=$toprated[user].id}">
										<img	class="photo" src="{$base_url}showphoto.php?id={$toprated[user].id}&m=Y&t=r&p=1" alt="adult social network" /></a>
									</div>
								</div>
							{else}
                                                <div class="pic_no_user"><img src="{$base_url}templates/site/dirtyflirting/public/images/hornybook_bgpicturegrey_full.gif" alt="adult personals" /></div>
 						{/if}
							{if $smarty.section.user.iteration % 5 == 0 && !$smarty.section.user.last}
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
