{* $Id: index.tpl 702 2008-07-01 00:12:17Z bogdan $ *}
<div class="center">
<div class="index_container">
</div>
<div class="clear"><img src="{$base_url}images/pixel.gif"
	style="width: 5px;" /></div>
</div>

{include file="site/dirtyflirting/login/menu.tpl"}

<div class="center">
<div class="clear"><img src="{$base_url}images/pixel.gif"
	style="width: 5px;" /></div>
<div class="index_container">
<div id="featured_block" class="grey">
<div class="container_text caption"><span
	class="container_red_text">featured</span> members content</div>
<div class="tabs_header">
<div id="viewcontent">
<ul>
	<li><a href="#Picture_Gallery" title="Picture Gallery">
	Picture Gallery </a></li>
	<li><a
		href="#Video_Gallery{if $smarty.session.sess_accesslevel == 0}_Upgrade{/if}"
		title="Video Gallery{if $smarty.session.sess_accesslevel == 0}_Upgrade{/if}"
		onclick="{if $smarty.session.sess_accesslevel == 0}needUpgrade(); return false;{/if}">
	Video Gallery </a></li>
</ul>
</div>
</div>
<div class="tabs_content">
<div id="Video_Gallery_Upgrade"
	style="display: none; padding: 0px; margin: 0px; border: 0px;"></div>
<div id="Video_Gallery"
	style="display: none; padding: 0px; margin: 0px; border: 0px;">
{section name="video" loop=$videogallery max=8} {if
$videogallery[video].id}
<div class="pic_user">
<div class="thumb"><a
	href="{$base_url}profile/{screenname user_id=$videogallery[video].id}">
<!--	<img class="bg" 	src="{$cfg.template.url_template}login/images/hornybook_bgpicture.gif" 
	alt="" /></a> --!>
	<img class="photo" src="{$base_url}showphoto.php?id={$videogallery[video].id}&m=Y&t=s&p=1" alt="" />
</div>
<div class="smalltext info">{$videogallery[video].screenname}</div>
</div>
{else}
<div class="pic_no_user"><img
	src="{$cfg.template.url_template}login/images/hornybook_bgpicture_full.gif"
	alt="" style="width: 94px; height: 94px; border: 1px;" /></div>
{/if} {if $smarty.section.video.iteration % 4 == 0 &&
!$smarty.section.video.last}
<div class="clear"><img src="{$base_url}images/pixel.gif"
	style="width: 1px;" alt="" /></div>
{/if} {/section}</div>
<div id="Picture_Gallery"
	style="display: none; padding: 0px; margin: 0px; border: 0px;">
{section name="picture" loop=$picturegallery max=8} {if
$picturegallery[picture].id}
<div class="pic_user">
<div class="thumb"><a id="a_{$picturegallery[picture].id}"
	href="{$base_url}profile/{screenname user_id=$picturegallery[picture].id}">
	<!-- <img	class="bg" src="{$cfg.template.url_template}login/images/hornybook_bgpicture.gif" alt="" /></a> --!>
        <img class="photo" id="pic_{$picturegallery[picture].id}"
	src="{$base_url}showphoto.php?id={$picturegallery[picture].id}&m=Y&t=s&p=1"
	alt="" /></div>
<div id="div_{$picturegallery[picture].id}" class="smalltext info">{$picturegallery[picture].screenname}</div>
</div>
{else}
<div class="pic_no_user"><img
	src="{$cfg.template.url_template}login/images/hornybook_bgpicture_full.gif"
	alt="" style="width: 94px; height: 94px; border: 0px;" /></div>
{/if} {if $smarty.section.picture.iteration % 4 == 0 &&
!$smarty.section.picture.last}
<div class="clear"><img src="{$base_url}images/pixel.gif"
	style="width: 1px;" alt="" /></div>
{/if} {/section}</div>
</div>
<div class="clear"><img src="{$base_url}images/pixel.gif"
	style="width: 5px;" /></div>
<div class="more">[<a href="/mem_videogallery.php">more</a>]</div>
</div>
<div id="inbox_snapshot_block" class="grey">
<div class="container_text caption"><span
	class="container_red_text">inbox</span> snapshot</div>
<div id="tab_header_inbox"><div class="ui-tabs-nav"><span class="ui-tabs-selected"><a href="#">Inbox</a></span></div></div>
<div class="inbox_cont">
<div style="padding: 5px;">
<div class="subj_img_cont"><img
	src="{$cfg.template.url_template}login/images/hornybook_inboxsubject.gif"
	alt="" /></div>
<div style="float: left; width: 15px;">|</div>
<div class="container_text subject">Subject</div>
<div class="clear"><img src="{$cfg.image.pixel}"
	style="height: 20px;" /></div>
{section name=mail loop=$mymessages}
<div class="item">{if $mymessages[mail] != 'S'} <img
	src="{$cfg.template.url_template}login/images/hornybook_withpicture.gif"
	alt="" /> {else} <img
	src="{$cfg.template.url_template}login/images/hornybook_withoutpicture.gif"
	alt="" /> {/if}</div>
<div class="subject"><a
	href="/mem_mail.php{if $mymessages[mail].type == 'F'}#Flirts{elseif $mymessages[mail].folder == 5}#Site_Announce{/if}">{$mymessages[mail].subject|truncate:20:'...'}</a></div>
<div class="clear"><img src="{$cfg.image.pixel}"
	style="height: 2px;" /></div>
{sectionelse}
<div style="align: center;">Inbox is empty</div>
{/section}</div>
</div>
<div class="clear"><img src="{$base_url}images/pixel.gif"
	style="width: 5px;" /></div>
<div class="more">[<a href="/mem_mail.php">more</a>]</div>
</div>

</div>
<div class="clear"><img src="{$base_url}images/pixel.gif"
	style="height: 10px;" /></div>
<div class="index_container">
<div class="grey" id="my_hb_block">
<div class="container_text caption"><span
	class="container_red_text">my</span> hornybook</div>
<div id="tabs_container">
<div id="myhornybook">
<ul>
	<li><a href="#Hot_List" title="Hot List"> Hot List </a></li>
	<li><a
		href="#Viewed_Me{if $smarty.session.sess_accesslevel == 0}_Upgrade{/if}"
		title="Viewed Me{if $smarty.session.sess_accesslevel == 0}_Upgrade{/if}"
		onclick="{if $smarty.session.sess_accesslevel == 0}needUpgrade(); return false;{/if}">
	Viewed Me </a></li>
</ul>
</div>
</div>

<div class="tabs_content">
<div id="Viewed_Me_Upgrade"
	style="display: none; padding: 0px; margin: 0px; border: 0px;"></div>
<div id="Viewed_Me"
	style="display: none; padding: 0px; margin: 0px; border: 0px;">
{section name="view" loop=$viewedme max=4} {if $viewedme[view].id}
<div class="pic_user">
<div class="thumb"><a
	href="{$base_url}profile/{screenname user_id=$viewedme[view].id}"><img
	class="bg"
	src="{$cfg.template.url_template}login/images/hornybook_bgpicture.gif"
	alt="" /></a> <img class="photo"
	src="{$base_url}showphoto.php?id={$viewedme[view].id}&m=Y&t=s&p=1" alt="" /></div>
<div class="smalltext info">{$viewedme[view].screenname}</div>
</div>
{else}
<div class="pic_no_user"><img
	src="{$cfg.template.url_template}login/images/hornybook_bgpicture_full.gif"
	alt="" /></div>
{/if} {/section}</div>
<div id="Hot_List"
	style="display: none; padding: 0px; margin: 0px; border: 0px;">
{section name="hot" loop=$hotlist max=4} {if $hotlist[hot].id}
<div class="pic_user">
<div class="thumb"><a
	href="{$base_url}profile/{screenname user_id=$hotlist[hot].id}"><img
	class="bg"
	src="{$cfg.template.url_template}login/images/hornybook_bgpicture.gif"
	alt="" /></a> <img class="photo"
	src="{$base_url}showphoto.php?id={$hotlist[hot].id}&m=Y&t=s&p=1" alt="" /></div>
<div id="div_{$hotlist[hot].id}" class="smalltext info">{$hotlist[hot].screenname}
[<a href="javascript:;" style="font-weight: bold;"
	onclick="removeHotBlock({$hotlist[hot].id});">x</a>]</div>
</div>
{else}
<div class="pic_no_user"><img
	src="{$cfg.template.url_template}login/images/hornybook_bgpicture_full.gif"
	alt="" /></div>
{/if} {/section}</div>
</div>
<div class="clear"><img src="{$base_url}images/pixel.gif"
	style="width: 5px;" /></div>
<div class="more">[<a id="myhornybook_more"
	href="/mem_myprofile.php#Edit_Hot__Block_Lists">more</a>]</div>
</div>
      <div id="my_profile_block">
<div class="container_text caption"><span
	class="container_red_text">my</span> profile</div>
<div class="preview pphoto">
<div class="thumb"><img
	src="{$cfg.template.url_template}login/images/hornybook_bgpicture.gif"
	class="bg" alt="{$smarty.session.sess_screenname}" /> <img
	src="{$base_url}showphoto.php?id={$smarty.session.sess_id}&m=Y&t=s&p=1" alt=""
	class="photo" /></div>
<div class="normaltext text_prev">Photo Preview</div>
<div class="normaltext text_discreet">Discreet:
{$smarty.session.sess_picturediscret}</div>
<div class="smalltext text_pa">{if
$smarty.session.sess_picturepending == 'Y'}Pending Approval{/if}</div>
</div>
<div class="preview pvideo">
<div class="thumb"><img
	src="{$cfg.template.url_template}login/images/hornybook_bgpicture.gif"
	class="bg" alt="{$smarty.session.sess_screenname}" /> <img
	src="/videothumb.php" alt="" class="photo" /></div>
<div class="normaltext text_prev">Video Preview</div>
<div class="normaltext text_discreet">Discreet:
{$smarty.session.sess_videodiscret}</div>
<div class="smalltext text_pa">{if
$smarty.session.sess_videopending}Pending Approval{/if}</div>
</div>
<div class="clear"><img src="{$base_url}images/pixel.gif"
	style="height: 2px;" alt="" /></div>
<div class="normaltext text_rating">Your rating: {rateme
rating=$smarty.session.sess_rating id=$smarty.session.sess_id
screenname=$smarty.session.sess_screenname}</div>
	<div class="clear"><img src="{$base_url}images/pixel.gif"
	style="width: 5px;" /></div>
<div class="edit_link">[<a href="/mem_myprofile.php#Edit_Profile">edit</a>]</div>
</div>
{literal} <script type="text/javascript">
		$('#myhornybook > ul').tabs({
    		select: function() {
        			if($('#myhornybook > ul').data('selected.tabs') == 0){
        				$('#myhornybook_more').attr({href : "{/literal}/mem_myprofile.php#Who_Viewed_Me{literal}"});
        			}else{
        				$('#myhornybook_more').attr({href : "{/literal}/mem_myprofile.php#Edit_Hot__Block_Lists{literal}"});
        			}
    		},
    		click: function() {
					setTimeout(function() {
						window.location = '{/literal}{$cfg.path.url_upgrade}{literal}';
					}, 0);
    		}
    		
		});
		
		$(document).ready(function() {
			$('select[name="sex_looking"]').change(function() {
				if(this.options[this.selectedIndex].value == '0'){
					$('input[name="sex"]').attr('value', '1');
					$('input[name="looking"]').attr('value', '0');
				}else if(this.options[this.selectedIndex].value == '1'){
					$('input[name="sex"]').attr('value', '0');
					$('input[name="looking"]').attr('value', '1');
				}else if(this.options[this.selectedIndex].value == '2'){
					$('input[name="sex"]').attr('value', '0');
					$('input[name="looking"]').attr('value', '0');
				}else if(this.options[this.selectedIndex].value == '3'){
					$('input[name="sex"]').attr('value', '1');
					$('input[name="looking"]').attr('value', '1');
				}else if(this.options[this.selectedIndex].value == '4'){
					$('input[name="sex"]').attr('value', '0');
					$('input[name="looking"]').attr('value', '2');
				}else if(this.options[this.selectedIndex].value == '5'){
					$('input[name="sex"]').attr('value', '1');
					$('input[name="looking"]').attr('value', '2');
				}
			});
		});
		
		$('#viewcontent > ul').tabs();
		
		function removePic(pic){
			var pic_element = '#pic_' + pic;
			var div_element = '#div_' + pic;
			$(pic_element).attr({src: "{/literal}{$cfg.template.url_template}login/images/hornybook_bgpicture_full.gif{literal}"});
			$(div_element).css({text: ""});
		}
		function removeHotBlock(id) {
			var pic_element = '#pic_' + id;
			var div_element = '#div_' + id;
			var a_element = '#a_' + id;
			$(pic_element).attr({src: "{/literal}{$cfg.template.url_template}login/images/hornybook_bgpicture_full.gif{literal}"});
			$(pic_element).attr({style: "width: 94px; height: 94px; border: 0px;"});
			$(div_element).remove();
			$(a_element).remove();
			$.get('{/literal}/{literal}ajax_hot-block.php?d&id=' + id);
		}
		
		function needUpgrade() {
			setTimeout(function() {
				window.location = '{/literal}{$cfg.path.url_upgrade}{literal}';
			}, 0);
		}
  	</script> {/literal}
