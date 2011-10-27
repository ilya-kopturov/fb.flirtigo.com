<div id="show_rateprofiles_{$var.tab}" name="show_profiles">
    <form method="get">
        <table width="{$canvas_width}" class="memberstable" border="0" cellpadding="0" cellspacing="0">
            <tr>
                <td align="center" class="mostwanted" style="padding: 10px 0px 10px 5px;">
                    <b>Show me:</b>
                    <span style="padding: 0px 10px 0px 5px;">
                        <select name="showme" class="mostwanted" style="width: 90px;" onchange="javascript: onShow(this.value);">
                            <option value="0" {if $var.showme == 0}selected{/if}>Photos</option>
                            <option value="1" {if $var.showme == 1}selected{/if}>Videos</option>
                        </select>
                    </span>
                    <b>of:</b>
                    <span style="padding: 0px 10px 0px 5px;">
                        <select name="of" class="mostwanted" style="width: 90px;">
                            <option value="0" {if $var.of == 0}selected{/if}>men only</option>
                            <option value="1" {if $var.of == 1}selected{/if}>women only</option>
                            <option value="2" {if $var.of == 2}selected{/if}>couples only</option>
                        </select>
                    </span>
                    <b>Age:</b>
                    <span style="padding: 0px 10px 0px 5px;">
                        <select name="age_from" class="mostwanted">
                            {html_options values=$cfg.profile.age output=$cfg.profile.age selected=$var.age_from}
                        </select>
                        to
                        <select name="age_to" class="mostwanted">
                            {html_options values=$cfg.profile.age output=$cfg.profile.age selected=$var.age_to}
                        </select>
                    </span>
                    <b>Using:</b>
                    <span style="padding: 0px 10px 0px 5px;">
                        <select name="using" class="mostwanted" style="width: 90px;" id="inputUsing" {if $var.showme == 1}disabled="disabled"{/if}>
                                <option value="0" {if $var.using == 0}selected{/if}>Thumbnails</option>
                            <option value="1" {if $var.using == 1}selected{/if}>Large Photos</option>
                        </select>
                    </span>
                    <span style="padding: 0px 5px 0px 5px;">
                        <input align="absmiddle" type="image" src="{$cfg.template.url_template}login/images/dirtyflirting_showme.gif" name="showme">
                    </span>
                </td>
            </tr>
        </table>
    </form>
    <div><img src="{$cfg.image.pixel}" height="10"></div>
    <table class="memberstable" width="{$canvas_width}" border="0" cellpadding="0" cellspacing="0">
        <tr>
            <td align="center" valign="top" height="50" width="{$canvas_width}">
                <table width="{$canvas_width}" border="0" cellpadding="0" cellspacing="0">
                    <tr valign="top">
                        {section name=mostwanted loop=$users}
                        <td align="left" width="140" style="padding: 5px 5px 5px 10px;">
                            <table border="0" cellpadding="0" cellspacing="0">
                                <tr>
                                    {*<td><a {if $isAllowed} href="javascript:;" onclick="loadProfile('{$start_from+$smarty.section.mostwanted.iteration}{remove_start str=$smarty.server.QUERY_STRING}')" {else} href="{$cfg.path.url_upgrade}" target="_parent" {/if} ><img src="{$cfg.path.url_site}{if $var.showme}videothumb.php?user_id={else}showphoto.php?id={/if}{$users[mostwanted].id}&t=r&p=1&a=Y" border="1" style="border-color: #FFFFFF;"></td>*}
                                            <td><a {if $isAllowed} href="{$cfg.path.url_site}profile/{screenname user_id=$users[mostwanted].id}" {else} href="{$cfg.path.url_upgrade}" target="_parent" {/if} ><img src="{$cfg.path.url_site}{if $var.showme}videothumb.php?user_id={else}showphoto.php?id={/if}{$users[mostwanted].id}&t=r&p=1&a=Y" border="1" style="border-color: #FFFFFF;"></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="mostwanted" style="padding-top: 5px;"><a href="{$cfg.path.url_site}profile/{screenname user_id=$users[mostwanted].id}" class="join_text"><u>{$users[mostwanted].screenname}</u></a></td>
                                                    </tr>
                                                    <tr>
                                                        <td style="padding-top: 5px;" class="mostwanted">Views: <B>{$users[mostwanted].viewed}</B></td>
                                                    </tr>
                                                    <tr>
                                                        <td style="padding-top: 5px;" class="mostwanted">Rating: {rating rating=$users[mostwanted].rating id=$users[mostwanted].id}</td>
                                                    </tr>
                                                    <tr>
                                                        <td style="padding-top: 5px; padding-bottom: 15px;" class="mostwanted"><B>{$users[mostwanted].votes}</B> votes (<B>{$users[mostwanted].rating|string_format:"%.2f"}</B>)</td>
                                                    </tr>
                                                    </table>
                                            </td>
                                            {if $smarty.section.mostwanted.iteration%5 == 0}
                                </tr>
                                <tr valign="top">
                                    {/if}
                                    {sectionelse}
                                    <td align="center" class="mostwanted"> No results found.</td>
                                    {/section}
                                </tr>
                            </table>
                        </td>
                    </tr>
                </table>
                <table width="{$canvas_width}" border="0" cellpadding="0" cellspacing="0">
                    <tr>
                        <td align="center" class="mostwanted" style="padding: 5px 15px 5px 5px; color: #7E0000;">
                            {if $users}{$result_nav}{/if}
                        </td>
                    </tr>
                </table>
                </div>

                {literal}
                <script type="text/javascript">
                    function onShow(val){
                        inp = document.getElementById('inputUsing');
                        if(val == 1){
                            inp.disabled = true;
                        }else{
                            inp.disabled = false;
                        }
                    }
                </script>
                {/literal}