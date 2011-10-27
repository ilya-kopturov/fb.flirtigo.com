<?php
/* $Id: ajax_flirt.php 531 2008-06-12 21:02:43Z andi $ */

define("IN_MAINSITE", true);
define("IS_AJAX", true);

include ("includes/require/site_head.php");

check_session($db, $_SESSION['sess_pass'], $_SESSION['sess_screenname']);

echo "viewed me";