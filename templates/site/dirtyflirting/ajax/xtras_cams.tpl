{if $smarty.session.cams.live}
<table class="memberstable normaltext" style="width: {$canvas_width}px;" cellpadding="0" cellspacing="0">
    <tr>
        <td style="align: center; padding: 5px;">
            <table cellpadding="0" cellspacing="0" border="0" style="width: 98%; border: 0px;">
                <tr>
                    <td style="width: 50%; text-align: left; font: bold 15px;">
                        <img src="{$cfg.template.url_template}login/images/dirtyflirting_xtras_light.gif" style="border: 0px; vertical-align: middle;" alt="FlirtiGo.com - Xtras"/> LIVE AMATEURS NOW!
                    </td>
                    <td style="width: 50%; text-align: right; font: bold 15px;">Cam Time Now: {$camsHour|date_format:"%H.%M %P"}</td>
                </tr>
                <tr>
                    <td colspan="2" style="text-align: left; padding: 10px;">
                        <table cellpadding="0" cellspacing="0" style="border: 0px;">
                            <tr>
                                {section name="cam" loop=$smarty.session.cams.live}
                                <td style="width: 160px; text-align: left; padding-right: 20px; font: normal 12px; vertical-align: top;">
                                    <div><a href="{if $smarty.session.sess_accesslevel >=1}{$smarty.session.cams.live[cam].show_link}" target="_blank{else}{$cfg.path.url_upgrade}?id={$smarty.session.sess_id}{/if}"><img src="{$smarty.session.cams.live[cam].performer_schedule_pic}" style="width: 120px; height: 90px; border: 0px;"/></a></div>
                                    <div><img src="{$cfg.path.url_site}images/pixel.gif" style="height: 5px;" /></div>
                                    <div style="font-weight: bold;">{$smarty.session.cams.live[cam].performer_name} - <span style="color: red;">LIVE!</span></div>
                                    <div><img src="{$cfg.path.url_site}images/pixel.gif" style="height: 5px;" /></div>
                                    <div>{$smarty.session.cams.live[cam].description|truncate:80:"..."}</div>
                                </td>
                                {/section}
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>
        </td>
    </tr>                 
</table>

<div><img src="{$cfg.path.url_site}images/pixel.gif" style="height: 10px;" /></div>
{/if}
{if $smarty.session.cams.next}
<table class="memberstable normaltext" style="width: {$canvas_width}px;" cellpadding="0" cellspacing="0">
    <tr>
        <td style="align: center; padding: 5px;">
            <table cellpadding="0" cellspacing="0" border="0" style="width: 98%; border: 0px;">
                <tr>
                    <td style="width: 100%; text-align: left; font: bold 15px;">Todays Schedule...</td>
                </tr>
                <tr>
                    <td colspan="2" style="text-align: left; padding: 10px;">
                        <table cellpadding="0" cellspacing="0" style="border: 0px;">
                            <tr>
                                {section name="cam" loop=$smarty.session.cams.next}
                                <td style="width: 160px; text-align: left; padding-right: 20px; font: normal 12px; vertical-align: top;">
                                    <div><a href="{if $smarty.session.sess_accesslevel >=1}{$smarty.session.cams.next[cam].show_link}" target="_blank{else}{$cfg.path.url_upgrade}?id={$smarty.session.sess_id}{/if}"><img src="{$smarty.session.cams.next[cam].performer_schedule_pic}" style="width: 120px; height: 90px; border: 0px;"/></a></div>
                                    <div><img src="{$cfg.path.url_site}images/pixel.gif" style="height: 5px;" /></div>
                                    <div style="font-weight: bold;">{$smarty.session.cams.next[cam].performer_name}</div>
                                    <div><img src="{$cfg.path.url_site}images/pixel.gif" style="height: 5px;" /></div>
                                    <div>{$smarty.session.cams.next[cam].description|truncate:80:"..."}</div>
                                    <div><img src="{$cfg.path.url_site}images/pixel.gif" style="height: 20px;" /></div>
                                </td>
                                {/section}
                            </tr>
                            <tr>
                                {section name="cam" loop=$smarty.session.cams.next}
                                <td style="width: 160px; text-align: left; padding-right: 20px; font: normal 12px; vertical-align: top;">
                                    <div style="font-weight: bold;">{$smarty.session.cams.next[cam].start_24|date_format:"%H:%M %P"} USA EST (+5GMT)</div>
                                </td>
                                {/section}
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>
        </td>
    </tr>                 
</table>
{/if}

{if !$smarty.session.cams.next && !$smarty.session.cams.live}
<table class="memberstable normaltext" style="width: {$canvas_width}px;" cellpadding="0" cellspacing="0">
    <tr>
        <td style="align: center; padding: 5px;">
            <img src="{$cfg.template.url_template}login/images/dirtyflirting_camerror.jpg" style="border:0px;" alt="FlirtiGo.com Cam Error"/>
        </td>
    </tr>
</table>
{/if}