<?php
/* $Id: option.php 530 2008-06-12 20:45:54Z root $ */

$cfg['option']['from_name']         = "flirtigo.com";
$cfg['option']['from_email']        = "dontreply@flirtigo.com";
$cfg['option']['online_time']       = 10;
$cfg['option']['new_time']          = 30;
$cfg['option']['profiles_per_page'] = 10;
$cfg['option']['picture_size']      = 1;
$cfg['option']['video_size']        = 30;
$cfg['option']['urgent_mail']       = 5;
$cfg['option']['email_support']     = "support__flirtigo.com";
$cfg['option']['members']           = array("Free Member","Silver Member","Gold Member");
$cfg['option']['emailserver']       = array("Yahoo","Hotmail","AOL","All others");
$cfg['option']['sex_looking']       = array("0" => array("looking" => 0, "sex" => 1),
                                            "1" => array("looking" => 1, "sex" => 0),
                                            "2" => array("looking" => 0, "sex" => 0),
                                            "3" => array("looking" => 1, "sex" => 1),
                                            "4" => array("looking" => 2, "sex" => 0),
                                            "5" => array("looking" => 2, "sex" => 1));
/*
<option value="0" selected>Women seeking Men</option>
<option value="1">Men seeking Women</option>
<option value="2">Men seeking Men</option>
<option value="3">Women seeking Women</option>
<option value="4">Men seeking Couple</option>
<option value="5">Woman seeking Couple</option>
*/
