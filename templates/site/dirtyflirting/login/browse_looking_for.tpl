{include file="site/dirtyflirting/login/menu.tpl"}

<table style="margin-left: auto; margin-right: auto; width: 744px;" cellpadding="0" cellspacing="0">
    <tr>
        <td style="padding: 0;">
            {* MEMBER PAGE - RIGHT - *}

            {if $smarty.get.msg}
            <table class="error" style="width:568px">
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
                    <td align="left" colspan="3" style="padding: 5px;">
                        <a href="/mem_browseresults.php?looking=0&sex=1{if $smarty.get.country}&country={$smarty.get.country}{/if}{if $smarty.get.state}&state={$smarty.get.state}{/if}">Man seeking woman</a>
                    </td>
                </tr>
                <tr>
                    <td align="left" colspan="3" style="padding: 5px;">
                        <a href="/mem_browseresults.php?looking=1&sex=0{if $smarty.get.country}&country={$smarty.get.country}{/if}{if $smarty.get.state}&state={$smarty.get.state}{/if}">Women seeking man</a>
                    </td>
                </tr>
                <tr>
                    <td align="left" colspan="3" style="padding: 5px;">
                        <a href="/mem_browseresults.php?looking=1&sex=1{if $smarty.get.country}&country={$smarty.get.country}{/if}{if $smarty.get.state}&state={$smarty.get.state}{/if}">Woman seeking woman</a>
                    </td>
                </tr>
                <tr>
                    <td align="left" colspan="3" style="padding: 5px;">
                        <a href="/mem_browseresults.php?looking=0&sex=0{if $smarty.get.country}&country={$smarty.get.country}{/if}{if $smarty.get.state}&state={$smarty.get.state}{/if}">Man seeking man</a>
                    </td>
                </tr>
                <tr>
                    <td align="left" colspan="3" style="padding: 5px;">
                        <a href="/mem_browseresults.php?looking=0&sex=2{if $smarty.get.country}&country={$smarty.get.country}{/if}{if $smarty.get.state}&state={$smarty.get.state}{/if}">Man seeking couple</a>
                    </td>
                </tr>
                <tr>
                    <td align="left" colspan="3" style="padding: 5px;">
                        <a href="/mem_browseresults.php?looking=1&sex=2{if $smarty.get.country}&country={$smarty.get.country}{/if}{if $smarty.get.state}&state={$smarty.get.state}{/if}">Women seeking couple</a>
                    </td>
                </tr>
                <tr>
                    <td align="left" colspan="3" style="padding: 5px;">
                        <a href="/mem_browseresults.php?looking=2&sex=0{if $smarty.get.country}&country={$smarty.get.country}{/if}{if $smarty.get.state}&state={$smarty.get.state}{/if}">Couple seeking man</a>
                    </td>
                </tr>
                <tr>
                    <td align="left" colspan="3" style="padding: 5px;">
                        <a href="/mem_browseresults.php?looking=2&sex=1{if $smarty.get.country}&country={$smarty.get.country}{/if}{if $smarty.get.state}&state={$smarty.get.state}{/if}">Couple seeking women</a>
                    </td>
                </tr>
            </table>

            {* MEMBER PAGE - RIGHT - FINISH *}
        </td>
    </tr>
</table>