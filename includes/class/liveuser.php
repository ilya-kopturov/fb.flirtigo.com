<?php
/* $Id: liveuser.php 354 2008-05-28 03:14:18Z andi $ */

//Roles
define('ROLE_ANONYMOUS', 1);
define('ROLE_STANDARD', 2);
define('ROLE_SILVER', 3);
define('ROLE_GOLD', 4);
//Privileges
define('SEARCH', 1);
define('BROWSE', 2);
define('VIEW_WHOS_ONLINE', 3);
define('MESSAGING', 4);
define('RATE_PROFILES', 5);
define('VIEW_XTRAS', 6);
define('PLAY_VIDEOS', 7);
define('WHO_VIEWED_ME', 8);
define('VIEW_PUBLIC_PHOTOS', 9);
define('VIEW_PUBLIC_VIDEOS', 10);
define('VIEW_PRIVATE_GALLERY', 11);
define('SEARCH_DETAILED', 12);

class LiveUser {
	protected static $acl = null;
	protected static $lu = null;

	//don't allow creating more than one instance, creating protected constructor
	protected function __construct() {
		self::$acl = new Zend_Acl();
		//add roles
		self::$acl->addRole(new Zend_Acl_Role(ROLE_ANONYMOUS));
		self::$acl->addRole(new Zend_Acl_Role(ROLE_STANDARD), ROLE_ANONYMOUS);
		self::$acl->addRole(new Zend_Acl_Role(ROLE_SILVER), ROLE_STANDARD);
		self::$acl->addRole(new Zend_Acl_Role(ROLE_GOLD));
		//add privileges
		self::$acl->deny(ROLE_ANONYMOUS);
		self::$acl->allow(ROLE_STANDARD, null, array(SEARCH, BROWSE, VIEW_WHOS_ONLINE));
		self::$acl->allow(ROLE_SILVER, null, array(MESSAGING, RATE_PROFILES, WHO_VIEWED_ME, VIEW_PUBLIC_PHOTOS, VIEW_PRIVATE_GALLERY, SEARCH_DETAILED));
		self::$acl->allow(ROLE_GOLD);

		self::$lu = new stdClass();
		//get current user
		self::$lu->user = $GLOBALS['db']->get_row("SELECT * FROM tblUsers WHERE id = '{$_SESSION['sess_id']}' LIMIT 1");
		//get user role
		switch (self::$lu->user['accesslevel']) {
			case '0':
				self::$lu->userRole = ROLE_STANDARD;
				break;
			case '1':
				self::$lu->userRole = ROLE_SILVER;
				break;
			case '2':
				self::$lu->userRole = ROLE_GOLD;
				break;
			default:
				self::$lu->userRole = ROLE_ANONYMOUS;
		}
	}

	public static function &singleton() {
		return is_null(self::$lu) || is_null(self::$acl) ? new LiveUser() : self;
	}

	public static function getUser() {
		self::singleton();
		return self::$lu->user;
	}

	public static function getUserRole() {
		self::singleton();
		return self::$lu->userRole;
	}

	public static function isAllowed($privilege) {
		self::singleton();
		return self::$acl->isAllowed(self::$lu->userRole, null, $privilege);
	}
}