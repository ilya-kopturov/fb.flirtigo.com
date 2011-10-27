{include file="site/dirtyflirting/login/menu.tpl"}
<table class="center">
    <tr>
        {*
        <td class="fastsearch" style="vertical-align: top;">
            {include file="site/dirtyflirting/login/leftside.tpl"}
        </td>
        *}
        <td valign="top" align="left">
            <div class="redtitle">My Profile</div>
            <div id="profile">
                <ul>
                    <li><a href="{$cfg.path.url_site}ajax_profile_overview.php?{rnd_md5}" title="Overview"><span>Overview</span></a></li>
                    <li><a href="{$cfg.path.url_site}ajax_profile_edit.php?{rnd_md5}" title="Edit Profile"><span>Edit Profile</span></a></li>
                    <li><a href="{$cfg.path.url_site}ajax_profile_pictures.php?{rnd_md5}{if $smarty.get.p}&p={$smarty.get.p}{/if}" title="Edit Pictures"><span>Photos</span></a></li>
                    <li><a href="{$cfg.path.url_site}ajax_profile_videos.php?{rnd_md5}{if $smarty.get.v}&v={$smarty.get.v}{/if}" title="Edit Videos"><span>Videos</span></a></li>
                    <li><a href="{$cfg.path.url_site}ajax_profile_gallery.php?{rnd_md5}" title="Private Gallery"><span>Private Gallery</span></a></li>
                    <li><a href="{$cfg.path.url_site}ajax_profile_tags.php?{rnd_md5}" title="Edit Tags"><span>Tags</span></a></li>
                    <li><a href="{$cfg.path.url_site}ajax_profile_hot-block.php?{rnd_md5}{if $smarty.get.l}&l={$smarty.get.l}{/if}&t={$smarty.get.t}" title="Edit Hot / Block Lists"><span>Hot / Block Lists</span></a></li>
                    <li><a href="{$cfg.path.url_site}ajax_profile_stats.php?{rnd_md5}{if $smarty.get.s}&s={$smarty.get.s}{/if}" title="Who Viewed Me"><span>Who Viewed Me</span></a></li>
                    <li><a href="{$cfg.path.url_site}ajax_profile_options.php?{rnd_md5}" title="Options"><span>Options</span></a></li>
                </ul>
            </div>
        </td>
    </tr>
</table>
<div id="overview_edit_profile" style="display:none;position:absolute;font-size:.9em"><a href="javascript:;" onclick="$('#profile > ul').tabs('select', 1);">[Edit Profile]</a></div>

{literal}
<script type="text/javascript">
    $(document).ready(function() {
        var tabs = $('#profile > ul').tabs({
            bookmarkable:true,
            cache: true,
            select: function(ui) {
                $('#error_alert').slideUp('slow');
            },
            remote:true,
            spinner:null
        });
    });
</script>
{/literal}