<?php
/* $Id: crypt.php 340 2008-05-20 17:07:04Z andi $ */

define('SECRET', '^AKJWfd387y#$@%Osd]}{[$$'); //!!! do not change or you screw the crypt/decrypt process !!!
include_once($cfg['path']['dir_site'].'Crypt/Rc4.php');

$rc4 = new Crypt_RC4(SECRET);
