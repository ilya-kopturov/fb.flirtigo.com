<?php

/**
 * Define type of current running environment
 */
define('ENVIRONMENT', 'dev');	// 'dev', 'prod'


/**
 * Define root path
 */
define('PATH_ROOT', realpath(dirname(__FILE__) . '/../..') . '/');

/**
 * Define includes folder path
 */
define('PATH_INCLUDES', PATH_ROOT . 'includes/');

/**
 * Define pear folder path
 */
define('PATH_PEAR', PATH_ROOT . 'pear/');

/**
 * Define templates folder path
 */
define('PATH_TEMPLATES', PATH_ROOT . 'templates/');


set_include_path('.' . PATH_SEPARATOR . PATH_INCLUDES . PATH_SEPARATOR . PATH_ROOT . 'pear/');		//fphp

?>