<?php
/* $Id: ajax_check_mail.php 528 2008-06-12 15:27:14Z andi $ */

define("IN_MAINSITE", true);
//define("IS_AJAX", true);

include ("includes/require/site_head.php");

$result = 0;
if ($_SESSION['sess_id']) $result = number_format($db->get_var("SELECT COUNT(*) 
                                                                FROM   tblMails 
                                                                WHERE  user_id = '{$_SESSION['sess_id']}' AND 
                                                                       (folder = '1' or folder = '5') AND 
                                                                       new = 'Y' "), 0, '', '');

print $result;