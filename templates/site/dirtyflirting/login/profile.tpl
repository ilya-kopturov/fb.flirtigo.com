{* $Id: profile.tpl 536 2008-06-13 13:21:46Z andi $ *}

<div class="center">
    <table border="0" cellspacing="0" cellpadding="0" width="744" style="width: 744px;">
        <tr>
            <td width="744" colspan="2" class="menu menu_text" style="width: 744px;">
                {if $site_section eq 'public'}
                {include file="site/dirtyflirting/public/menu.tpl"}
                {else}
                {include file="site/dirtyflirting/login/menu.tpl"}
                {/if}
            </td>
        </tr>
        <tr>
            <td class="fastsearch" valign="top" style="paddin:0;margin:0;">
                {include file="site/dirtyflirting/login/leftside.tpl" show_cams="Y"}
            </td>
            <td valign="top" align="left">
                {* MEMBER PAGE - RIGHT - *}
                <div class="blacktitle" style="margin-left:10px">{$profile.screenname}</div>
                <div id="profile">
                    <ul>
                        <li><a href="{$cfg.path.url_site}ajax_public_profile.php?{rnd_md5}&id={$profile.id}" title="Profile"><span>Profile</span></a></li>
                        <li><a href="{$cfg.path.url_site}ajax_public_pictures.php?{rnd_md5}&id={$profile.id}&p={$smarty.get.p}" title="Pictures"><span>Photos</span></a></li>
                        <li><a href="{$cfg.path.url_site}ajax_public_videos.php?{rnd_md5}&id={$profile.id}&v={$smarty.get.v}" title="Videos"><span>Videos</span></a></li>
                        <li><a href="{$cfg.path.url_site}ajax_private_gallery.php?{rnd_md5}&id={$profile.id}&g={$smarty.get.g}&filter={$smarty.get.filter}" title="Private Gallery"><span>Private Gallery</span></a></li>
                    </ul>
                </div>

                {* MEMBER PAGE - RIGHT - FINISH *}
            </td>
        </tr>
    </table>
</div>

{literal}

<script type="text/javascript">
    $('#profile > ul').tabs(1);
		
    $('#profile > ul').tabs({
        remote:true,
        spinner:''
    });
		
</script>
{/literal}
