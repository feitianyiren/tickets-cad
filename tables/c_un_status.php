<?php
/**
 * @package c_un_status.php
 * @author John Doe <john.doe@example.com>
 * @since
 * @version
 */
/*
2/9/10 - initial release
5/25/10 - Changed default value of radio buttons for hid value to "n"
*/
?>
<SCRIPT>
  /**
   *
   * @param {type} the_form
   * @returns {undefined}
   */
    function set_bg_vals(the_form) {
        the_form.frm_bg_color.value = the_form.dmy_status_id.options[document.c.dmy_status_id.selectedIndex].style.backgroundColor;
        the_form.frm_text_color.value = the_form.dmy_status_id.options[document.c.dmy_status_id.selectedIndex].style.color;
        }
</SCRIPT>
        <FORM NAME="c" METHOD="post" ACTION="<?php print $_SERVER['PHP_SELF']; ?>">
        <INPUT TYPE="hidden" NAME="tablename" 	VALUE="un_status"/>
        <INPUT TYPE="hidden" NAME="indexname" 	VALUE="id"/>
        <INPUT TYPE="hidden" NAME="sortby" 		VALUE="id"/>
        <INPUT TYPE="hidden" NAME="sortdir"		VALUE=0 />
        <INPUT TYPE="hidden" NAME="func" 		VALUE="pc"/>

        <TABLE BORDER="0" ALIGN="center">
        <TR CLASS="even" VALIGN="top"><TD COLSPAN="2" ALIGN="CENTER"><FONT SIZE="+1"><?php print gettext("Table 'Unit Status' - Add New Entry");?></FONT></TD></TR>
        <TR><TD COLSPAN=4>&nbsp;</TD></TR>
        <TR VALIGN="baseline" CLASS="odd"><TD CLASS="td_label" ALIGN="right"><?php print gettext('Status');?>:</TD>
            <TD><INPUT  ID="ID1"  MAXLENGTH="20" SIZE="20" type="text" NAME="frm_status_val" VALUE="" onFocus="JSfnChangeClass(this.id, 'dirty');" onChange = "this.value=JSfnTrim(this.value);"/></TD>
            </TR>
        <TR VALIGN="baseline" CLASS="even"><TD CLASS="td_label" ALIGN="right"><?php print gettext('Can dispatch');?>:</TD>
            <TD VALIGN='baseline'><SPAN STYLE = 'margin-left:20px'><B><?php print gettext('Yes');?> &raquo;<INPUT TYPE='radio' NAME="frm_dispatch" VALUE= 0  CHECKED /></SPAN>
            <SPAN STYLE = 'margin-left:20px'><?php print gettext('No - not enforced');?> &raquo;<INPUT TYPE='radio' NAME="frm_dispatch" VALUE= "1" /></SPAN>
            <SPAN STYLE = 'margin-left:20px'><?php print gettext('No - enforced');?> &raquo;<INPUT TYPE='radio' NAME="frm_dispatch" VALUE= "2" /></SPAN>
            </TD></TR>
        <TR VALIGN="baseline" CLASS="odd"><TD CLASS="td_label" ALIGN="right"><?php print gettext('Description');?>:</TD>
            <TD><INPUT  ID="ID2"  MAXLENGTH="60" SIZE="60" type="text" NAME="frm_description" VALUE="" onFocus="JSfnChangeClass(this.id, 'dirty');" onChange = "this.value=JSfnTrim(this.value);"> </TD></TR>
        <TR VALIGN="baseline" CLASS="even"><TD CLASS="td_label" ALIGN="right"><?php print gettext('Hide');?>:</TD><TD VALIGN='baseline'><SPAN STYLE = 'margin-left:20px'><B><?php print gettext('No');?> &raquo;<INPUT TYPE='radio' NAME="frm_hide" VALUE= "n"  CHECKED /></SPAN><SPAN STYLE = 'margin-left:20px'><?php print gettext('Yes');?> &raquo;<INPUT TYPE='radio' NAME="frm_hide" VALUE= "y" /></TD></TR>
        <TR VALIGN="baseline" CLASS="odd"><TD CLASS="td_label" ALIGN="right"><?php print gettext('Group');?>:</TD>
            <TD><INPUT  ID="ID4"  MAXLENGTH="20" SIZE="20" type="text" NAME="frm_group" VALUE="" onFocus="JSfnChangeClass(this.id, 'dirty');" onChange = "this.value=JSfnTrim(this.value);"></TD></TR>
        <TR VALIGN="baseline" CLASS="even"><TD CLASS="td_label" ALIGN="right"><?php print gettext('Sort');?>:</TD><TD><INPUT ID="ID5" MAXLENGTH=11 SIZE=11 TYPE= "text" NAME="frm_sort" VALUE="" onFocus="JSfnChangeClass(this.id, 'dirty');" onChange = "this.value=JSfnTrim(this.value);"/> </TD></TR>
        <TR VALIGN="baseline" CLASS="odd"><TD CLASS="td_label" ALIGN="right"><?php print gettext('Background color');?>:</TD>
            <TD>
                <SELECT name='dmy_status_id' STYLE='background-color:transparent; color:black;' ONCHANGE =  "set_bg_vals (this.form);this.style.backgroundColor=this.options[this.selectedIndex].style.backgroundColor; this.style.color=this.options[this.selectedIndex].style.color;">
                <OPTION VALUE=0 STYLE='background-color:transparent; 	color:black;' SELECTED><?php print gettext('None');?></OPTION>
                <OPTION VALUE=1 STYLE='background-color:maroon; 		color:white;' ><?php print gettext('Maroon');?></OPTION>
                <OPTION VALUE=2 STYLE='background-color:red; 			color:white;' ><?php print gettext('Red');?></OPTION>
                <OPTION VALUE=3 STYLE='background-color:orange; 		color:black;' ><?php print gettext('Orange');?></OPTION>
                <OPTION VALUE=4 STYLE='background-color:tan; 			color:black;' ><?php print gettext('Tan');?></OPTION>
                <OPTION VALUE=5 STYLE='background-color:yellow; 		color:black;' ><?php print gettext('Yellow');?></OPTION>
                <OPTION VALUE=6 STYLE='background-color:olive; 			color:white;' ><?php print gettext('Olive');?></OPTION>
                <OPTION VALUE=7 STYLE='background-color:purple; 		color:white;' ><?php print gettext('Purple');?></OPTION>
                <OPTION VALUE=8 STYLE='background-color:fuchsia; 		color:white;' ><?php print gettext('Fuchsia');?></OPTION>
                <OPTION VALUE=9 STYLE='background-color:HotPink; 		color:black;' ><?php print gettext('HotPink');?></OPTION>
                <OPTION VALUE=10 STYLE='background-color:pink; 			color:black;' ><?php print gettext('Pink');?></OPTION>
                <OPTION VALUE=12 STYLE='background-color:green; 		color:white;' ><?php print gettext('Green');?></OPTION>
                <OPTION VALUE=13 STYLE='background-color:PaleGreen; 	color:black;' ><?php print gettext('PaleGreen');?></OPTION>
                <OPTION VALUE=14 STYLE='background-color:lime; 			color:black;' ><?php print gettext('Lime');?></OPTION>
                <OPTION VALUE=15 STYLE='background-color:aqua; 			color:black;' ><?php print gettext('Aqua');?></OPTION>
                <OPTION VALUE=16 STYLE='background-color:black; 		color:white;' ><?php print gettext('Black');?></OPTION>
                <OPTION VALUE=17 STYLE='background-color:silver; 		color:black;' ><?php print gettext('Silver');?></OPTION>
                <OPTION VALUE=18 STYLE='background-color:SlateGray; 	color:white;' ><?php print gettext('SlateGray');?></OPTION>
                <OPTION VALUE=19 STYLE='background-color:navy; 			color:white;' ><?php print gettext('Navy');?></OPTION>
                <OPTION VALUE=20 STYLE='background-color:blue; 			color:white;' ><?php print gettext('Blue');?></OPTION>
                </SELECT>
            </TD></TR>
            <TR><TD COLSPAN="99" ALIGN="center">
        <BR />
    <INPUT TYPE="button"	VALUE="<?php print gettext('Cancel');?>" onClick = "Javascript: document.retform.func.value='r';document.retform.submit();"/>&nbsp;&nbsp;&nbsp;&nbsp;
    <INPUT TYPE="reset"		VALUE="<?php print gettext('Reset');?>"  onClick = "this.form.frm_bg_color.value=this.form.def_bg_color.value; this.form.frm_text_color.value=this.form.def_text_color.value; this.form.reset();" />&nbsp;&nbsp;&nbsp;&nbsp;
    <INPUT TYPE="button" NAME="sub_but" VALUE="               <?php print gettext('Submit');?>                " onclick="this.disabled=true; JSfnCheckInput(this.form, this);"/>
        <INPUT TYPE="hidden" NAME="frm_bg_color"  	VALUE="transparent" />
        <INPUT TYPE="hidden" NAME="frm_text_color"	VALUE="black" />
        <INPUT TYPE="hidden" NAME="def_bg_color"  	VALUE="transparent" /> <!-- default values see reset button -->
        <INPUT TYPE="hidden" NAME="def_text_color"	VALUE="black" />

        </TD></TR>
        </FORM>
        </TD></TR>
        </TABLE>

<?php
