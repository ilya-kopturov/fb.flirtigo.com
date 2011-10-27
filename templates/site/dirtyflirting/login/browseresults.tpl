{if $site_section eq 'public'}
{*<table class="center" cellpadding="0" cellspacing="0">
    <tr>
        <td colspan="2" class="menu menu_text" style="padding: 0;">
            <table cellpadding="0" cellspacing="0">
                <tr>
                    <td style="width: 45px; text-align: center;"><a class="menu_link" href="{$cfg.path.url_site}index.php" target="_parent">Home</a></td>
                    <td>/</td>
                    <td style="width: 75px; text-align: center;"><a class="menu_link" href="{$cfg.path.url_site}join.php" target="_parent">Free Join</a></td>
                    <td>/</td>
                    <td style="width: 60px; text-align: center;"><a class="menu_link" href="{$cfg.path.url_site}join.php" target="_parent">Browse</a></td>
                    <td>/</td>
                    <td style="width: 60px; text-align: center;"><a class="menu_link" href="{$cfg.path.url_support}" target="_blank">Support</a></td>
                    <td>/</td>
                    <td style="width: 50px; text-align: center;"><a class="menu_link" href="{$cfg.path.url_site}join.php" target="_parent">Login</a></td>
                </tr>
            </table>
        </td>
    </tr>
</table>*}
{else}
{include file="site/dirtyflirting/login/menu.tpl"}
{/if}

<table class="center" cellpadding="0" cellspacing="0">
    <tr>
        <td style="vertical-align: top; text-align: center;">
            <table cellpadding="0" cellspacing="0" class="list_header">
                <tr>
                    <td colspan="{if $smarty.get.tag}6{else}4{/if}" class="redtitle">
                        {if $smarty.get.tag}
                        Users tagged with {$smarty.get.tag}
                        {else}
                        Browse Results
                        {/if}
                    </td>
                </tr>
                <tr> <td>
                        <ul class="tabs_bd">
                            <li class="featuredPopular1" align="left">
                                {if !$online and !$smarty.get.tag}
                                <span class="curr">Results</span>
                                {elseif $smarty.get.tag}
                                <a href="{$cfg.path.url_site}mem_browseresults.php?tag={$smarty.get.tag|urlencode}&sex=1"><span>Results</span></a>
                                {else}
                                <a href="{$cfg.path.url_site}mem_browseresults.php?{$resultslink}"><span>Results</span></a>
                                {/if}
                            </li>
                            <li class="featuredPopular2">
                            </li>
                            {if !$smarty.get.tag}
                            <li>
                                {if $online}
                                <span class="curr">Online Now</span>
                                {else}
                                <a href="{$cfg.path.url_site}mem_browseresults.php?{$onlinelink}"><span>Online Now</span></a>
                                {/if}
                            </li>

                            {else}
                            <li>
                                <a href="{$cfg.path.url_site}mem_browseresults.php?tag={$smarty.get.tag|urlencode}&sex=0"><span>Male</span></a>
                            </li>
                            <li>
                                <a href="{$cfg.path.url_site}mem_browseresults.php?tag={$smarty.get.tag|urlencode}&sex=2"><span>Couples</span></a>
                            </li>
                            {/if}
                        </ul>
                    </td>
                </tr>
            </table>
            {include file="site/dirtyflirting/login/resultsection.tpl"}

            {* MEMBER PAGE - RIGHT - FINISH *}
        </td>
    </tr>
</table>