<div id="show_rateprofiles_{$var.tab}" name="show_profiles">
    <form method="get">
        <table width="{$canvas_width}" class="memberstable" border="0" cellpadding="0" cellspacing="0">
            <tr>
                <td align="center" class="mostwanted" style="padding: 10px 0px 10px 5px;">
                    <b>Show me:</b>
                    <span style="padding: 0px 10 0px 5px;">
                        <select name="showme" class="mostwanted" style="width: 90px;" onchange="javascript: onShow(this.value);">
                            <option value="0" {if $var.showme == 0}selected{/if}>Photos</option>
                            <option value="1" {if $var.showme == 1}selected{/if}>Videos</option>
                        </select>
                    </span>
                    <b>of:</b>
                    <span style="padding: 0px 10 0px 5px;">
                        <select name="of" class="mostwanted" style="width: 90px;">
                            <option value="0" {if $var.of == 0}selected{/if}>men only</option>
                            <option value="1" {if $var.of == 1}selected{/if}>women only</option>
                            <option value="2" {if $var.of == 2}selected{/if}>couples only</option>
                        </select>
                    </span>
                    <b>Age:</b>
                    <span style="padding: 0px 10 0px 5px;">
                        <select name="age_from" class="mostwanted">
                            {html_options values=$cfg.profile.age output=$cfg.profile.age selected=$var.age_from}
                        </select>
                        to
                        <select name="age_to" class="mostwanted">
                            {html_options values=$cfg.profile.age output=$cfg.profile.age selected=$var.age_to}
                        </select>
                    </span>
                    <b>Using:</b>
                    <span style="padding: 0px 10 0px 5px;">
                        <select name="using" class="mostwanted" style="width: 90;" id="inputUsing" {if $var.showme == 1}disabled="disabled"{/if}>
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
                        <td align="center" width="90%" style="padding: 5px 5px 5px 10px;">
                            <table border="0" cellpadding="0" cellspacing="0" align="center">
                                <tr>
                                <table cellpadding="2" cellspacing="2" border="0" align="center">
                                    <tr>
                                        <td valign="middle" align="center" width="400px" height="400px">
                                            {if $var.showme}
                                            <a href="{$cfg.path.url_site}profile/{screenname user_id=$users[mostwanted].id}">
                                                <div style="width:320px;">
                                                    <div class="videoplayer">
                                                        <embed src="{$cfg.path.url_site}mediaplayer.swf" width="320" height="260"
                                                               allowscriptaccess="always"
                                                               allowfullscreen="true"
                                                               flashvars="height=260&width=320&file={$cfg.path.url_site}media/media/videos/{$users[mostwanted].id}_{$users[mostwanted].content_id}.flv&autostart=true&searchbar=false"/>
                                                    </div>
                                                </div>
                                            </a>
                                            {else}
                                            <a href="{$cfg.path.url_site}profile/{screenname user_id=$users[mostwanted].id}"><img src="{$cfg.path.url_site}showphoto.php?id={$users[mostwanted].id}&t=b&m=Y" border="1" style="border-color: #FFFFFF;"></a>
                                            {/if}
                                        </td>
                                    </tr>
                                </table>
                    </tr>
                    <tr>
                        <td align="center">
                            <table cellpadding="0" cellspacing="0" border="0" width="300px">
                                <tr>
                                    <td class="mostwanted" style="padding-top: 5px; font-size: 14px;" align="left">
                                        <a href="{$cfg.path.url_site}profile/{screenname user_id=$users[mostwanted].id}">{$users[mostwanted].screenname}</a>, {age birthday=$users[mostwanted].birthdate} yr old {assign var="sex" value=$users[mostwanted].sex}{$cfg.profile.sex[$sex]}
                                    </td>
                                </tr>
                                <tr>
                                    <td class="mostwanted" style="padding-top: 5px; font-size: 14px;" align="left">
                                        Location: {location type="short" typeloc=$users[mostwanted].typeloc city=$users[mostwanted].city country=$users[mostwanted].country}
                                    </td>
                                </tr>
                                <tr>
                                    <td class="mostwanted" style="padding-top: 5px; padding-bottom: 15px; font-size: 14px;" align="left">
                                        Rate this profile: {rating rating=$users[mostwanted].rating id=$users[mostwanted].id}
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </table>
            </td>
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