<?php
/**
 * @package persist2.php
 * @author John Doe <john.doe@example.com>
 * @since 2011-03-15
 * @version 2011-03-15
 */
/*
3/15/11 new release
*/
error_reporting(E_ALL);

@session_start();
require_once($_SESSION['fip']);		//7/28/10

//if($istest) {
//	dump ($_GET);
//	dump ($_POST);
//	}

$f_n = 		urldecode($_POST['f_n']);
$v_n = 		$_POST['v_n']; 
$sess_id = 	$_POST['sess_id'];				// sess_id

//$query = "UPDATE `$GLOBALS[mysql_prefix]session` SET `$f_n` ='$v_n' WHERE `sess_id`='$sess_id' LIMIT 1";
//$result = mysql_query($query) or do_error($query,'mysql_query() failed', mysql_error(), __FILE__, __LINE__);

@session_start(); 		// 1/23/10
$_SESSION[$f_n] = $v_n;
print"";
?>