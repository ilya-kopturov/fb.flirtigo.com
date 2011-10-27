{* $Id: menu.tpl 693 2008-06-30 15:26:58Z bogdan $ *}

  <table class="center">
    <tr>
      <td class="menu menu_text">
        <table cellpadding="0" cellspacing="0">
          <tr>
            <td style="width: 6px;"><img src="{$cfg.template.url_template}login/images/hornybook_bgleftmenu.gif"></td>
            <td class="menu_item" style="width: 55px;">
              <a class="menu_link" href="{$cfg.path.url_site_ssl}mem_index.php">Home</a>
            </td>
            <td style="width: 2px;"><img src="{$cfg.template.url_template}login/images/hornybook_separatormenu.gif"></td>
            <td class="menu_item" style="width: 65px;">
              <a class="menu_link" href="{$cfg.path.url_site_ssl}mem_searchbasic.php">Search</a>
            </td>
            <td style="width: 2px;"><img src="{$cfg.template.url_template_ssl}login/images/hornybook_separatormenu.gif"></td>
            <td class="menu_item" style="width: 110px;">
              <a class="menu_link" href="{$cfg.path.url_site_ssl}mem_mail.php">Messages: <span id="mail_messages_count">{$smarty.session.sess_newmails}</span></a>
            </td>
            <td style="width: 2px;"><img src="{$cfg.template.url_template_ssl}login/images/hornybook_separatormenu.gif"></td>
            <td class="menu_item" style="width: 72px;">
              <a class="menu_link" href="{$cfg.path.url_site_ssl}mem_browse.php">Browse</a>
            </td>
            <td style="width: 2px;"><img src="{$cfg.template.url_template_ssl}login/images/hornybook_separatormenu.gif"></td>
            <td class="menu_item" style="width: 100px;">
              <a class="menu_link" href="{$cfg.path.url_site_ssl}mem_who.php">Online Now</a>
            </td>
            <td style="width: 2px;"><img src="{$cfg.template.url_template_ssl}login/images/hornybook_separatormenu.gif"></td>
            <td class="menu_item" style="width: 102px;">
              <a class="menu_link" href="{$cfg.path.url_site_ssl}mem_mostwanted.php#Most_Viewed">New Faces</a>
            </td>
            <td style="width: 2px;"><img src="{$cfg.template.url_template_ssl}login/images/hornybook_separatormenu.gif"></td>
            <td class="menu_item" style="width: 93px;">
              <a class="menu_link" href="{$cfg.path.url_site_ssl}mem_myprofile.php">My Profile</a>
            </td>
            <td style="width: 2px;"><img src="{$cfg.template.url_template_ssl}login/images/hornybook_separatormenu.gif"></td>
            <td class="menu_item" style="width: 62px;">
              <a class="menu_link" href="{$cfg.path.url_site_ssl}mem_cams.php">Cams</a>
            </td>
            <td style="width: 2px;"><img src="{$cfg.template.url_template_ssl}login/images/hornybook_separatormenu.gif"></td>
            <td class="menu_item" style="width: 60px;">
              <a class="menu_link" href="{$cfg.path.url_site_ssl}mem_bonus.php">Bonus</a>
            </td>
            <td style="width: 6px;"><img src="{$cfg.template.url_template_ssl}login/images/hornybook_bgrightmenu.gif"></td>
          </tr>
        </table>
      </td>
    </tr>
  </table>

<div id="error_alert">
   <table>
     <tr>
       <td class="h_error">
         <div class="errorTextBig" style="text-align:center"></div>
         <div class="errorTextSmall"></div>
       </td>
     </tr>
   </table>
   <div class="clear"><img src="{$cfg.image.pixel}" height="10"></div>
</div>