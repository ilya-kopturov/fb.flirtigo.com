<?php
/* $Id: ajax_delete_profile.php 340 2008-05-20 17:07:04Z andi $ */

define("IN_MAINSITE", TRUE);
define("IS_AJAX", true);

include("includes/require/site_head.php");

check_session($db, $_SESSION['sess_pass'], $_SESSION['sess_screenname'], 0);

$db->query("UPDATE tblUsers SET disabled = 'Y' WHERE id = '{$_SESSION['sess_id']}' LIMIT 1");