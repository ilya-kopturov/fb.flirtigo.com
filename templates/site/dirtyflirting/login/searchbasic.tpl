{include file="site/dirtyflirting/login/menu.tpl"}

<table class="search_container" cellpadding="0" cellspacing="0">
    <tr>
        <td>
            {if $smarty.get.msg}
            <table class="error">
                <tr>
                    <td class="h_error">
                        <div class="errorTextSmall" align="center">{$smarty.get.msg}</div>
                    </td>
                </tr>
            </table>
            {/if}
            <form name="basicsearch" method="get" action="mem_searchresults.php" style="width: 744px;" onsubmit="javascript: if( checkcity('basicsearch') )return true; else return false;">
                <input type="hidden" name="searchtype" value="basic">
                <table cellpadding="0" cellspacing="0" style="width: 744px;">
                    <tr>
                        <td>
                            <div class="tabs_header" cellpadding="0" cellspacing="0">
                                <div style="padding: 10px 0px;">
                                    <div colspan="4" class="redtitle" style="text-align: left;">Basic Search</div>
                                </div>
<!--
                                <ul class="tabs_bd">
                                    <li class="featuredPopular1">
                                        <span class="curr">Basic</span>
                                    </li>
                                    <li>
                                        <a href="{$cfg.path.url_site}mem_searchdetailed.php"><span>Detailed</span></a>
                                    </li>
                                </ul>
                                <div class="clear"></div>
-->
                                <div class="div_new_tabs_bd">
                                    <ul class="new_tabs_bd">
                                        <li class="featuredPopular1 li_new_tabs_bd_a">
                                            <a href="#"><span>Basic</span></a>
                                        </li>
                                        <li>
                                            <a href="{$cfg.path.url_site}mem_searchdetailed.php"><span>Detailed</span></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td align="center" >
                            <div style="padding: 5px 10px; background-color: #EFEFEF;">
                                <table class="memberstable normaltext" style="width: 724px;" cellpadding="0" cellspacing="0">
                                    <tr style="padding: 25px 5px 5px 10px;">
                                        <td width="130" class="label">
                                            I am / We are a:
                                        </td>
                                        <td width="250" align="left" valign="middle">
                                            <select name="looking" class="search_input" style="width: 150px;">{html_options options=$cfg.profile.sex selected="0"}</select>
                                        </td>
                                        <td colspan="2" width="380"></td>
                                    </tr>
                                    <tr style="padding: 5px 0px 5px 10px;">
                                        <td width="130" class="label">
                                            Looking for:
                                        </td>
                                        <td width="250" align="left" valign="middle">
                                            <select name="sex" class="search_input" style="width: 150px;" onchange="javascript: searchcouple('basicsearch',this.value);">{html_options options=$cfg.profile.looking selected="1"}</select>
                                        </td>
                                        <td colspan="2" width="380"></td>
                                    </tr>
                                    <tr style="padding: 5px 5px 5px 10px;">
                                        <td width="130" align="left" valign="top" >
                                            For:
                                        </td>
                                        <td width="250" align="left" valign="top" >
                                            <input type="checkbox" name="for[0]"	value="0" {if $search_data.for[0] == 0 && $search_data.for[0] != ''}checked{/if} class="search_input"><label>{$cfg.profile.for[0]}</label>
                                            <br>
                                            <input type="checkbox" name="for[2]"	value="2" {if $search_data.for[2] == 2 && $search_data.for[2] != ''}checked{/if} class="search_input"><label>{$cfg.profile.for[2]}</label>
                                            <br>
                                            <input type="checkbox" name="for[4]"	value="4" {if $search_data.for[4] == 4 && $search_data.for[4] != ''}checked{/if} class="search_input"><label>{$cfg.profile.for[4]}</label>
                                        </td>
                                        <td width="380" align="left" valign="top"	colspan="2">
                                            <input type="checkbox" name="for[1]"	value="1" {if $search_data.for[1] == 1 && $search_data.for[1] != ''}checked{/if} class="search_input"><label>{$cfg.profile.for[1]}</label>
                                            <br>
                                            <input type="checkbox" name="for[3]"	value="3" {if $search_data.for[3] == 3 && $search_data.for[3] != ''}checked{/if} class="search_input"><label>{$cfg.profile.for[3]}</label>
                                            <br>
                                            <input type="checkbox" name="for[5]"	value="5" {if $search_data.for[5] == 5 && $search_data.for[5] != ''}checked{/if} class="search_input"><label>{$cfg.profile.for[5]}</label>
                                            <br>
                                            <input type="checkbox" name="for[6]"	value="6" {if $search_data.for[6] == 6 && $search_data.for[6] != ''}checked{/if} class="search_input"><label>{$cfg.profile.for[6]}</label>
                                        </td>
                                    </tr>
                                    <tr style="padding: 35px 5px 5px 10px;">
                                        <td width="380" align="left" valign="bottom" colspan="2" style="padding-top: 20px;" >
                                            Members details
                                        </td>
                                        <td width="380" align="left" valign="bottom" colspan="2" style="padding-top: 20px;" >
                                            Partner (Couples Only)
                                        </td>
                                    </tr>
                                    <tr style="padding: 5px 5px 5px 10px;">
                                        <td width="130" class="label">
                                            Age:
                                        </td>
                                        <td width="250" class="label">
                                            <select name="age_from" class="search_input">{html_options values=$cfg.profile.age output=$cfg.profile.age selected="18"}</select> - <select name="age_to" class="search_input">{html_options values=$cfg.profile.age output=$cfg.profile.age selected="99"}</select>
                                        </td>
                                        <td width="380" align="left" valign="middle"	colspan="2">
                                            <select disabled name="p_age_from" class="search_input">{html_options values=$cfg.profile.age output=$cfg.profile.age selected="18"}</select> - <select disabled name="p_age_to" class="search_input">{html_options values=$cfg.profile.age output=$cfg.profile.age selected="99"}</select>
                                        </td>
                                    </tr>
                                    <tr style="padding: 5px 5px 5px 10px;">
                                        <td width="130" class="label">
                                            Height:
                                        </td>
                                        <td width="250" class="label">
                                            <select name="height" class="search_input" style="width: 150px;">{html_options options=$cfg.profile.height|replace:'Ask Me':'- any -'}</select>
                                        </td>
                                        <td width="380" align="left" valign="middle"	colspan="2">
                                            <select disabled name="p_height" class="search_input" style="width: 150px;">{html_options options=$cfg.profile.height|replace:'Ask Me':'- any -'}</select>
                                        </td>
                                    </tr>
                                    <tr style="padding: 5px 5px 5px 10px;">
                                        <td width="130" class="label">
                                            Weight:
                                        </td>
                                        <td width="250" class="label">
                                            <select name="weight" class="search_input" style="width: 150px;">{html_options options=$cfg.profile.weight|replace:'Ask Me':'- any -'}</select>
                                        </td>
                                        <td width="380" align="left" valign="middle"	colspan="2">
                                            <select disabled name="p_weight" class="search_input" style="width: 150px;">{html_options options=$cfg.profile.weight|replace:'Ask Me':'- any -'}</select>
                                        </td>
                                    </tr>
                                    <tr style="padding: 5px 5px 5px 10px;">
                                        <td width="130" class="label">
                                            Body shape:
                                        </td>
                                        <td width="250" class="label">
                                            <select name="bodytype" class="search_input" style="width: 150px;">{html_options options=$cfg.profile.bodytype|replace:'Ask Me':'- any -'}</select>
                                        </td>
                                        <td width="380" align="left" valign="middle"	colspan="2">
                                            <select disabled name="p_bodytype" class="search_input" style="width: 150px;">{html_options options=$cfg.profile.bodytype|replace:'Ask Me':'- any -'}</select>
                                        </td>
                                    </tr>
                                    <tr style="padding: 5px 5px 5px 10px;">
                                        <td width="130" class="label">
                                            Hair color:
                                        </td>
                                        <td width="250" class="label">
                                            <select name="haircolor" class="search_input" style="width: 150px;">{html_options options=$cfg.profile.haircolor|replace:'Ask Me':'- any -'}</select>
                                        </td>
                                        <td width="380" align="left" valign="middle"	colspan="2">
                                            <select disabled name="p_haircolor" class="search_input" style="width: 150px;">{html_options options=$cfg.profile.haircolor|replace:'Ask Me':'- any -'}</select>
                                        </td>
                                    </tr>
                                    <tr style="padding: 5px 5px 5px 10px;">
                                        <td width="130" class="label">
                                            Eye color:
                                        </td>
                                        <td width="250" class="label">
                                            <select name="eyecolor" class="search_input" style="width: 150px;">{html_options options=$cfg.profile.eyecolor|replace:'Ask Me':'- any -'}</select>
                                        </td>
                                        <td width="380" align="left" valign="middle"	colspan="2">
                                            <select disabled name="p_eyecolor" class="search_input" style="width: 150px;">{html_options options=$cfg.profile.eyecolor|replace:'Ask Me':'- any -'}</select>
                                        </td>
                                    </tr>
                                    <tr style="padding: 5px 5px 5px 10px;">
                                        <td width="130" class="label">
                                            Smoker:
                                        </td>
                                        <td width="250" class="label">
                                            <select name="smoking" class="search_input" style="width: 150px;">{html_options options=$cfg.profile.smoking|replace:'Ask Me':'- any -'}</select>
                                        </td>
                                        <td width="380" align="left" valign="middle"	colspan="2">
                                            <select disabled name="p_smoking" class="search_input" style="width: 150px;">{html_options options=$cfg.profile.smoking|replace:'Ask Me':'- any -'}</select>
                                        </td>
                                    </tr>
                                    <tr style="padding: 5px 5px 5px 10px;">
                                        <td width="130" class="label">
                                            Drink:
                                        </td>
                                        <td width="250" class="label">
                                            <select name="drinking" class="search_input" style="width: 150px;">{html_options options=$cfg.profile.drinking|replace:'Ask Me':'- any -'}</select>
                                        </td>
                                        <td width="380" align="left" valign="middle"	colspan="2">
                                            <select disabled name="p_drinking" class="search_input" style="width: 150px;">{html_options options=$cfg.profile.drinking|replace:'Ask Me':'- any -'}</select>
                                        </td>
                                    </tr>
                                    <tr style="padding: 5px 5px 5px 10px;">
                                        <td width="130" class="label">
                                            Ethnicity:
                                        </td>
                                        <td width="250" class="label">
                                            <select name="ethnicity" class="search_input" style="width: 150px;">{html_options options=$cfg.profile.ethnicity|replace:'Ask Me':'- any -'}</select>
                                        </td>
                                        <td width="380" align="left" valign="middle"	colspan="2">
                                            <select disabled name="p_ethnicity" class="search_input" style="width: 150px;">{html_options options=$cfg.profile.ethnicity|replace:'Ask Me':'- any -'}</select>
                                        </td>
                                    </tr>
                                    <tr style="padding: 15px 5px 5px 10px;">
                                        <td width="130" class="label">
                                            City:
                                        </td>
                                        <td width="250" class="label">
                                            <input type="text" name="city" class="search_input" style="width: 145px;" value="{if $search_date.city}{$search_date.city}{else}{$smarty.session.sess_city}{/if}">
                                        </td>
                                        <td width="380" align="left" valign="middle"	colspan="2"></td>
                                    </tr>
                                    <tr style="padding: 5px 5px 5px 10px;">
                                        <td width="130" class="label">
                                            State/Town:
                                        </td>
                                        <td width="250" class="label">
                                            <select name="state" class="search_input" style="width: 150px;">
                                                <option value="0">- any -</option>
                                                {foreach from=$states key=id item=name}
                                                <option value="{$id}" {if $search_data.state == $id}selected{elseif $smarty.session.sess_state == $id}selected{/if}>{$name}</option>
                                                {/foreach}
                                            </select>
                                        </td>
                                        <td width="380" align="left" valign="middle"	colspan="2">
                                            {*<input type="checkbox" name="withpicture"	value="1" {if $search_data.withpicture == 1}checked{/if} class="search_input"><label>only show members with photos or videos</label>*}
                                        </td>
                                    </tr>
                                    <tr style="padding: 5px 5px 5px 10px;">
                                        <td width="130" class="label">
                                            Country:
                                        </td>
                                        <td width="250" class="label">
                                            <select name="country" class="search_input" style="width: 150px;">
                                                {foreach from=$countries key=id item=name}
                                                <option value="{$id}" {if $search_data.country == $id}selected{elseif $smarty.session.sess_country == $id}selected{/if}>{$name}</option>
                                                {/foreach}
                                            </select>
                                        </td>
                                        <td width="380" class="label" colspan="2">
                                            <input type="checkbox" name="withpicture"	value="1" {if $search_data.withpicture == 1}checked{/if} class="search_input"><label>only show members with picture or videos</label>
                                        </td>
                                    </tr>
                                    <tr style="padding: 35px 5px 15px 5px;">
                                        <td align="center" colspan="4">
                                            <!--<input type="image" src="{$cfg.template.url_template}login/images/dirtyflirting_button_search.gif" name="submit" />-->
                                            <div class="div_button">
                                                <span style="margin: 0 0 0 330px;"><input type="submit" name="submit" value="Search" /></span>
                                            </div>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </td>
                    </tr>
                </table>
            </form>
        </td>
    </tr>
</table>