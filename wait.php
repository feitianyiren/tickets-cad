<?php
/**
 * @package wait.php
 * @author John Doe <john.doe@example.com>
 * @since version
 * @version string
 */
/*
1/12/09 initial version
3/15/11 changed stylesheet.php to stylesheet.php
*/
error_reporting(E_ALL);		// 10/1/08

?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 3.2 Final//EN">
<HTML>
<HEAD>
<TITLE><?php gettext("Wait for Login"); ?></TITLE>
<META HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=UTF-8">
<META HTTP-EQUIV="Expires" CONTENT="0"/>
<META HTTP-EQUIV="Cache-Control" CONTENT="NO-CACHE"/>
<META HTTP-EQUIV="Pragma" CONTENT="NO-CACHE"/>
<META HTTP-EQUIV="Content-Script-Type"	CONTENT="text/javascript"/>
<LINK REL=StyleSheet HREF="stylesheet.php?version=<?php print time();?>" TYPE="text/css"/>	<!-- 3/15/11 -->
</HEAD>
<BODY>
<BR><CENTER><H3><?php gettext("Waiting for login"); ?></H3></CENTER>
</BODY>
</HTML>
