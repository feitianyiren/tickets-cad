<?php
/**
 * @package install_module.php
 * @author John Doe <john.doe@example.com>
 * @since 2010-09-10
 * @version 2011-03-15
 */
/*
9/10/10 Module Installation Script
3/15/11 changed stylesheet.php to stylesheet.php
*/

@session_start();

require_once './incs/functions.inc.php';
error_reporting(E_ALL);				// 2/3/09
do_login(basename(__FILE__));	// session_start()
$tickets_dir = getcwd();
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 3.2 Final//EN">
<HTML>
<HEAD>
<META HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=UTF-8">
<META HTTP-EQUIV="Expires" CONTENT="0">
<META HTTP-EQUIV="Cache-Control" CONTENT="no-cache">
<META HTTP-EQUIV="Pragma" CONTENT="NO-CACHE">
<META HTTP-EQUIV="Content-Script-Type"	CONTENT="text/javascript">
<LINK REL="StyleSheet" HREF="stylesheet.php" TYPE="text/css" />	<!-- 3/15/11 -->
<SCRIPT  SRC='./js/misc_function.js' type='text/javascript'></SCRIPT>  <!-- 4/14/10 -->
</HEAD>
<BODY>

<?php

/**
 * prefix
 * Insert description here
 *
 * @param $tbl
 *
 * @return
 *
 * @access
 * @static
 * @see
 * @since
 */
function prefix($tbl) {		/* returns concatenated string */
    global $mysql_prefix;

    return  $mysql_prefix . $tbl;
    }

$table_name = prefix("modules");	//	check to see if module table exists - if not create.
$query = "CREATE TABLE IF NOT EXISTS `$table_name` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `mod_name` varchar(48) NOT NULL,
  `mod_status` int(4) NOT NULL DEFAULT '0' COMMENT 'Set to 1 for module Active, 0 for module inactive',
  `table` varchar(18) NOT NULL,
  `affecting_files` varchar(128) NOT NULL COMMENT 'Files that use this module',
  `httpuser` varchar(48) DEFAULT NULL COMMENT 'For data sources behind protected areas',
  `httppwd` varchar(48) DEFAULT NULL COMMENT 'For data sources behind protected areas',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;";
$result = mysql_query($query) or do_error($query, 'mysql_query() failed', mysql_error(), __FILE__, __LINE__);
if ($result) {
print gettext("Module Table Created");
}

/**
 * get_mod_to_install
 * Insert description here
 *
 *
 * @return
 *
 * @access
 * @static
 * @see
 * @since
 */
function get_mod_to_install() {
    $to_install = array();
    $current = array();
    if (mod_table_exists("modules") == 1) {
        $query = "SELECT * FROM $GLOBALS[mysql_prefix]modules`";
        $result = mysql_query($query);
        if ($result) {
            while ($row = mysql_fetch_assoc($result)) {
                $current[] = $row['mod_name'];
                }
            }
        }

    $entry = array();
    $path = "./modules";
    if ($handle = opendir($path)) {
        while (false !== ($dirname = readdir($handle))) {
            if ($dirname != "." && $dirname != "..") {
                $entry[] = $dirname;
                }
            }
        closedir($handle);
        }
    foreach ($entry as $val) {
        if (!(in_array($val, $current))) {
            $to_install[] = $val;
            }
        }
    $ret_str = "<SELECT NAME='frm_module'>";
    $i=1;
    foreach ($to_install as $val) {
        $ret_str .= "<OPTION VALUE=" . $val . ">" . $val . "</OPTION>";
        }
    $ret_str .= "</SELECT>";

    return $ret_str;
    }

/**
 * module_tabs_exist
 * Insert description here
 *
 * @param $name
 *
 * @return
 *
 * @access
 * @static
 * @see
 * @since
 */
function module_tabs_exist($name) {
    $query 		= "SELECT COUNT(*) FROM `$GLOBALS[mysql_prefix]modules`";
    $result 	= mysql_query($query);
    $num_rows 	= @mysql_num_rows($result);
    if ($num_rows) {
        $query_exists	= "SELECT * FROM `$GLOBALS[mysql_prefix]modules` WHERE `mod_name`=\"{$name}\"";
        $result_exists	= mysql_query($query_exists) or do_error($query_exists, 'mysql_query() failed', mysql_error(), __FILE__, __LINE__);
        $num_rows = mysql_num_rows($result_exists);
        if ($num_rows != 0) {
            return 1;
        } else {
            return 0;
        }
        } else {
        return 0;
        }
    }

/**
 * mod_table_exists
 * Insert description here
 *
 * @param $tablename
 *
 * @return
 *
 * @access
 * @static
 * @see
 * @since
 */
function mod_table_exists($tablename) {			//check if mysql table exists, if it's a re-install
    $query 		= "SELECT COUNT(*) FROM $tablename";
    $result 	= mysql_query($query);
    $num_rows 	= @mysql_num_rows($result);
    if ($num_rows) {
        return 1;
    } else {
        return 0;
    }
    }

/**
 * get_structure
 * Insert description here
 *
 * @param $structurefile
 *
 * @return
 *
 * @access
 * @static
 * @see
 * @since
 */
function get_structure($structurefile) {
    $xml_file = "./structure.xml";
    $data="";
    if (function_exists("curl_init")) {
        $ch = curl_init();
        $timeout = 5;
        curl_setopt($ch, CURLOPT_URL, $xml_file);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
        $data = curl_exec($ch);
        curl_close($ch);
        }
    else {				// not CURL
        if ($fp = @fopen($xml_file, "r")) {
            while (!feof($fp) && (strlen($data)<9000)) $data .= fgets($fp, 128);
            fclose($fp);
            }
        else {
            print "-error " . __LINE__;		// @fopen fails
            }
    }

    return $data;
    }	// end function get_structure

/**
 * write_path
 * Insert description here
 *
 * @param $filepath
 * @param $tickets_dir
 *
 * @return
 *
 * @access
 * @static
 * @see
 * @since
 */
function write_path($filepath, $tickets_dir) {
    global $docRoot, $tickets_dir;
    if (!$fp = fopen($tickets_dir.$filepath . '/path.inc.php', 'a')) {
           print '<LI><FONT CLASS="warn">' . gettext('Cannot open path.inc.php for writing') . '</FONT></LI>';
    } else {
        ftruncate($fp,0);
        fwrite($fp, "<?php\n");
        fwrite($fp, "	/* " . gettext('generated by') . " '" . basename( __FILE__) . "' " . date('r') . " */\n");
        fwrite($fp, '	$tickets_root 	= '."'$tickets_dir';\n");
        fwrite($fp, '?>');
    }

    fclose($fp);
    print '<LI> ' . gettext("Wrote Data Path URL") . '</LI><BR />';
    }

if (isset($_POST['submit'])) { // Handle the form.
    print $_POST['frm_module'];


    print "<DIV style='background-color:#CECECE; position: absolute; width: 60%; height: 60%; left: 20%; top: 10%; border:2px inset #FFF2BF; display: block; text-align: center'>";

    $structurefile = "./modules/" . $_POST['frm_module'] . "/structure.xml";
    $xml = simplexml_load_file($structurefile);

    //	Read XML file for details of structure and other information.

    $modname = $xml->name;
    $author = $xml->author;
    $created = $xml->creationDate;
    $version = $xml->version;
    $description = $xml->description;
    $directoryname = $xml->directories->directoryname;
    $tablename = $xml->tables->tablename;
    $installfile = $xml->configuration->installfile;
    $installfile = "./" . $installfile;
    $modincsdir = $xml->directories->incsdirectoryname;
    $modincsdir = "/" . $modincsdir;

    $mod_entry_exists = module_tabs_exist($modname); // if a table entry aready exists for the module
    $mod_table_exists = mod_table_exists($tablename);

        if ((file_exists($directoryname)) && ($mod_entry_exists==1) && ($mod_table_exists==1)) { // checks fully functioning previous existance of module.
           echo gettext("The Module Directory and tables already exist. Please remove existing versions before installing a new one");
        } else {

            write_path($modincsdir, $tickets_dir);

            // Print out Module details

            print gettext('Module Name') . ": " . $modname . "<BR />";
            print gettext('Module Directory') . ": " . $directoryname . "<BR />";
            print gettext('Author') . ": " . $author . "<BR />";
            print gettext('Created') . ": " . $created . "<BR />";
            print gettext('Version') . ": " . $version . "<BR />";
            print gettext('Description') . ": " . $description . "<BR />";

            unlink($structurefile);

            print "<A HREF=$installfile><< " . gettext('Configure Module') . " >></A>";
            print "</DIV>";
        }
} else { // If form not submitted print form.
?>
    <DIV style='background-color:#CECECE; position: absolute; width: 60%; height: 60%; left: 20%; top: 10%; border:2px inset #FFF2BF; display: block'>
    <center><?php print gettext('TICKETS MODULES INSTALLATION.');?></center>
    <DIV style='background-color:#CECECE; position: absolute; width: 40%; height: 20%; left: 5%; top: 10%; border:2px inset #FFF2BF; display: block'>
    <TABLE BORDER="0" style='width: 100%;'>
    <TH COLSPAN="2"><?php print gettext('Chose Module to Install');?><BR /></TH>
    <FORM action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
    <fieldset>
    <TR CLASS="even"><TD><?php print gettext('Module');?>:</TD><TD><?php print get_mod_to_install();?></TD></fieldset>
    <TR CLASS="even"><TD COLSPAN="2" ALIGN="center"><input type="submit" name="submit" value="<?php print gettext('Submit');?>" /></TD></TR>
    </FORM></TABLE>
    </div>
    <DIV style='background-color:#CECECE; position: absolute; width: 50%; height: 80%; right: 5%; top: 10%; border:2px inset #FFF2BF; display: block'>
    <?php print gettext('HELP PANEL');?>
    </DIV>
    </DIV>
    <?php
    }
