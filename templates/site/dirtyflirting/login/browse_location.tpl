{include file="site/dirtyflirting/login/menu.tpl"}

<table style="margin: auto; width: 744px;" cellpadding="0" cellspacing="0">
    <tr>
        <td style="padding: 0;">
            {* MEMBER PAGE - RIGHT - *}

            {if $smarty.get.msg}
            <table class="error" style="width:568px;">
                <tr>
                    <td class="h_error">
                        <div class="errorTextSmall" align="center">{$smarty.get.msg}</div>
                    </td>
                </tr>
            </table>
            {/if}

            <table style="width: 744px;" cellpadding="0" cellspacing="0">
                <tr>
                    <td class="redtitle" style="padding-bottom: 15px; text-align: left;">Browse</td>
                </tr>
            </table>

            <table class="memberstable normaltext" style="width: 744px;" cellpadding="0" cellspacing="0" border="0">
                <tr>
                    <td align="left" colspan="3" style="padding: 5px; font-weight: bold;">United States</td>
                </tr>
                <tr>
                    {section name="us" loop=$usa_states start="1"}
                    <td align="left" style="padding: 5px 5px 5px 20px;">
                        <a href="/mem_browse.php?country=1&state={$smarty.section.us.index}&step=looking_for">{$usa_states[us]}</a>
                    </td>
                    {if $smarty.section.us.iteration%3 == 0}
                </tr><tr>
                    {/if}
                    {/section}
                </tr>
                <tr>
                    <td align="left" colspan="3" style="padding: 5px; font-weight: bold;">Europe</td>
                </tr>
                <tr>
                    {section name="eu" loop=$eu_countries}
                    <td align="left" style="padding: 5px 5px 5px 20px;">
                        <a href="/mem_browse.php?country={$eu_countries[eu].id}&step=looking_for">{$eu_countries[eu].country}</a>
                    </td>
                    {if $smarty.section.eu.iteration%3 == 0}
                </tr><tr>
                    {/if}
                    {/section}
                </tr>
                <tr>
                    <td align="left" style="padding: 5px; font-weight: bold;">Rest of the World</td>
                </tr>
                <tr>
                    {section name="row" loop=$row_countries}
                    <td align="left" style="padding: 5px 5px 5px 20px;">
                        <a href="/mem_browse.php?country={$row_countries[row].id}&step=looking_for">{$row_countries[row].country}</a>
                    </td>
                    {if $smarty.section.row.iteration%3 == 0}
                </tr><tr>
                    {/if}
                    {/section}
                </tr>
            </table>

            {* MEMBER PAGE - RIGHT - FINISH *}
        </td>
    </tr>
</table>