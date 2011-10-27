<?php

define("IN_MAINSITE", TRUE);


include ("./includes/" . "require" . "/" . "site_head.php");

check_session($db, $_SESSION['sess_pass'], $_SESSION['sess_screenname'], 1);


#----------------------------------------
# plufinfeeds.php
#----------------------------------------
# Create key and redirect to pluginfeeds.com
#
# Copyright (C) 2004 Cyberheat, Inc
#
# Requires: PHP >= 3.0.9
#
# This code is provided as-is with absolutely no warranties of any kind. You
# are free to use this code however you deem necessary within the members area
# of your site. Redistribution of this code is expressly forbidden. Cyberheat,
# Inc will not be held responsible for any changes you make to this code. This
# license is subject to change at any time without prior notice. The latest
# version of the PluginFeeds User License can be found at
# http://www.pluginfeeds.com/pful.html
#
# Last modified:    2004-10-12
# Script version:   1.4
# Protocol version: 2
#
# CHANGELOG:
#   1.0: Initial release
#   1.1: Added support for $HTTP_SERVER_VARS in older versions of php.
#   1.2: Changed access url to access.pluginfeeds.com
#   1.3: Added settings for php error handling
#   1.4: Updated to protocol version 2.  Added interstitial page.

#----------------------------------------
# Detect PHP version
#----------------------------------------
$phpversion = phpversion();
list($ver1, $ver2, $ver3) = explode('.', $phpversion);
if($ver1 < 3 || ( $ver1 == 3 && $ver2 == 0 && $ver3 < 9 )) {
  die("This script requires PHP version 3.0.9 or newer.  You're running $phpversion\n");
}

#----------------------------------------
# Set error handling
#----------------------------------------
@eval("ini_set('display_errors', 0);");
@eval("ini_set('log_errors', 1);");
error_reporting(E_ERROR | E_PARSE);

#----------------------------------------
# Redirect
#----------------------------------------
$url = makePluginFeedsURL();
if(!headers_sent()) {
  header("Location: $url");
}

#----------------------------------------
# Backup page if the redirect above doesn't work
#----------------------------------------
?>
<html>
  <head>
    <title>PluginFeeds Access</title>
    <meta http-equiv="refresh" content="2;url=<?= $url ?>">
  </head>

  <body bgcolor="white">

    <h2>PluginFeeds Access</h2>

    If you are not automatically redirected in 2 seconds, please <a href="<?= $url ?>">Click Here</a> to continue to PluginFeeds.
    
  </body>
</html>


<?
#----------------------------------------
# Create a valid, keyed PluginFeeds URL
#----------------------------------------
function makePluginFeedsURL()
{
    #----------------------------------------
    # Config variables
    #----------------------------------------
    $customer_id = '696481';
    $access_code = 'PxYSLgMcLwTgT4u2tpb2';
  
    #----------------------------------------
    #----------------------------------------
    # End Config -- No need to modify below 
    #----------------------------------------
    #----------------------------------------
  
    #----------------------------------------
    # Global variables
    #----------------------------------------
    global $HTTP_SERVER_VARS;

    $version     = 2;
    $time        = time();
    $product_id  = ( $_SERVER ) ? $_SERVER['QUERY_STRING']    : $HTTP_SERVER_VARS['QUERY_STRING'];
    $user_agent  = ( $_SERVER ) ? $_SERVER['HTTP_USER_AGENT'] : $HTTP_SERVER_VARS['HTTP_USER_AGENT'];
    $host        = ( $_SERVER ) ? $_SERVER['HTTP_HOST']       : $HTTP_SERVER_VARS['HTTP_HOST'];
    $port        = ( $_SERVER ) ? $_SERVER['SERVER_PORT']     : $HTTP_SERVER_VARS['SERVER_PORT'];
    $server_name = ( $_SERVER ) ? $_SERVER['SERVER_NAME']     : $HTTP_SERVER_VARS['SERVER_NAME'];
    $request_uri = ( $_SERVER ) ? $_SERVER['REQUEST_URI']     : $HTTP_SERVER_VARS['REQUEST_URI'];
  
    #----------------------------------------
    # Construct referer
    #----------------------------------------
    $https    = ( $_SERVER ) ? $_SERVER['HTTPS'] : $HTTP_SERVER_VARS['HTTPS'];
    $protocol = ( $https == 'on' ) ? 'https' : 'http';
    $port     = ($port == '80') ? '' : ":$port";
    $referer  = urlencode($protocol . '://' . ($host ? $host : $server_name) . $port . $request_uri);
  
    #----------------------------------------
    # Construct user_id
    #----------------------------------------
    $letters = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890";
    $rand_string = '';
    for($i = 0; $i < 5; $i++) {
      $rand_string .= substr($letters, rand(0, strlen($letters)), 1);
    }
    $user_id = $customer_id . time() . getmypid() . $rand_string;
  
    #----------------------------------------
    # Format the user agent
    #----------------------------------------
    if(preg_match('/(.*?;.*?;.*?(;|\)))/', $user_agent, $matches)) {
      $user_agent = $matches[1];
    } else {
      $user_agent = substr($user_agent, 0, 40);
    }

    #----------------------------------------
    # Create the key
    #----------------------------------------
    $key = 'm' . md5(
      $customer_id .
      $access_code .
      $product_id .
      $user_agent .
      $time .
      $user_id
    );
    
    #----------------------------------------
    # Concat the url and return
    #----------------------------------------
    $url = "http://access.pluginfeeds.com/access.php?"
         . "k=$key"
         . "&c=$customer_id"
         . "&p=$product_id"
         . "&t=$time"
         . "&u=$user_id"
         . "&v=$version"
         . "&r=$referer";

    return $url;
}
?>
