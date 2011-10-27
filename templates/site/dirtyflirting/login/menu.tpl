{* $Id: menu.tpl 693 2008-06-30 15:26:58Z bogdan $ *}

  <div class="center">

      <ul class="menu menu_text">
            <li class="menu_item">
              <a class="menu_link" href="{$cfg.path.url_site}mem_index.php">Home</a>
            </li>
            <li class="menu_item">
              <a class="menu_link" href="{$cfg.path.url_site}mem_searchbasic.php">Search</a>
            </li>
            <li class="menu_item">
              <a class="menu_link" href="{$cfg.path.url_site}mem_mail.php">Messages: <span id="mail_messages_count">{$smarty.session.sess_newmails}</span></a>
            </li>
            <li class="menu_item">
              <a class="menu_link" href="{$cfg.path.url_site}mem_browse.php">Browse</a>
            </li>
           <li class="menu_item">
              <a class="menu_link" href="{$cfg.path.url_site}mem_who.php">Online Now</a>
            </li>
           <li class="menu_item" >
              <a class="menu_link" href="{$cfg.path.url_site}mem_mostwanted.php#Most_Viewed">New Faces</a>
            </li>
            <li class="menu_item" >
              <a class="menu_link" href="{$cfg.path.url_site}mem_myprofile.php">My Profile</a>
            </li>
           <li class="menu_item">
              <a class="menu_link" href="{$cfg.path.url_site}mem_cams.php">Cams</a>
            </li>
            <li class="menu_item">
              <a class="menu_link" href="{$cfg.path.url_site}mem_bonus.php">Bonus</a>
            </li>
</ul>
  </div>

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