{include file="site/dirtyflirting/login/menu.tpl"}

<table class="center" cellpadding="0" cellspacing="0" border="0">
    <tr>
        <td align="left" valign="top" style="padding: 0; width: {$canvas_width};">
            <div class="redtitle">New Faces</div>
            <div id="rateprofiles">
                <ul>
                    <li><a href="{$cfg.path.url_site}ajax_mostwanted{if $var.using}_large{/if}.php?{rnd_md5}&content=viewed&showme={$var.showme}&of={$var.of}&age_from={$var.age_from}&age_to={$var.age_to}&using={$var.using}&tab=Most_Viewed" title="Most Viewed"><span>Most Viewed</span></a></li>
                    <li><a href="{$cfg.path.url_site}ajax_mostwanted{if $var.using}_large{/if}.php?{rnd_md5}&orderby=rating&showme={$var.showme}&of={$var.of}&age_from={$var.age_from}&age_to={$var.age_to}&using={$var.using}&tab=Top_Rated" title="Top Rated"><span>Top Rated</span></a></li>
                </ul>
            </div>
        </td>
    </tr>
</table>

<script type="text/javascript">
    {literal}
    $(document).ready(function() {
        var tabs = $('#rateprofiles > ul').tabs();
    });
    function loadProfile(start) {
        //dhtmlHistory.add('Rate_Profile', {tabs:'rateprofiles', select:location.hash});
        $('#show_rateprofiles').load('{/literal}{$cfg.path.url_site}ajax_mostwanted_large.php?start={literal}' + start);
    }
    {/literal}
</script>