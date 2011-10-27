<?php
session_start();
echo strcasecmp($_GET['captcha'], $_SESSION['captcha_id']) == 0 ? 'true' : 'false';
?>