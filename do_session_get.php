<?php
/**
 * @package do_session_get.php
 * @author John Doe <john.doe@example.com>
 * @since 2010-01-23
 * @version 2010-07-28
 */
/*
1/23/10 initial release
7/28/10 Added inclusion of startup.inc.php for checking of network status and setting of file name variables to support no-maps versions of scripts.
*/
//
// generic session value reader - note name, method
//
error_reporting(E_ALL);

@session_start();
require_once($_SESSION['fip']);		//7/28/10
session_start();
//	$_SESSION[$_GET['f_n']] = $_GET['v_n'];
//snap(basename(__FILE__),$_GET['the_name') ;
print $_SESSION[$_GET['the_name']];
