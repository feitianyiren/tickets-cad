<?php
/**
 * @package c_personnel.php
 * @author John Doe <john.doe@example.com>
 * @since
 * @version
 */
?>
<SCRIPT>
/**
 *
 * @param {type} myform
 * @returns {undefined}
 */
function validate_form(myform) {	// reject empty form elements
    myform.frm_date_of_birth.value = myform.frm_year_date_of_birth.value + "-" + myform.frm_month_date_of_birth.value + "-" + myform.frm_day_date_of_birth.value + " 00:00:00";
    myform.frm_year_date_of_birth.disabled=true;
    myform.frm_month_date_of_birth.disabled=true;
    myform.frm_day_date_of_birth.disabled=true;
    myform.submit();
    }				// end function
</SCRIPT>
        <FORM NAME="c" METHOD="post" ACTION="<?php print $_SERVER['PHP_SELF']; ?>" /><!-- 1/21/09 - APRS moved to responder schema  -->
        <INPUT TYPE="hidden" NAME="func" 		VALUE="pc"/>
        <INPUT TYPE="hidden" NAME="tablename" 	VALUE="<?php print $tablename;?>" />
        <INPUT TYPE="hidden" NAME="indexname" 	VALUE="id" />
        <INPUT TYPE="hidden" NAME="sortby" 		VALUE="id" />
        <INPUT TYPE="hidden" NAME="sortdir"		VALUE=0 />
        <INPUT TYPE="hidden" NAME="frm_date_of_birth" VALUE="" />
        <INPUT TYPE="hidden" NAME="frm__by" 	VALUE="<?php print $_SESSION['user_id']; ?>" />
        <INPUT TYPE="hidden" NAME="frm__from" 	VALUE="<?php print $_SERVER['REMOTE_ADDR']; ?>" />
        <INPUT TYPE="hidden" NAME="frm__on" 	VALUE="<?php print mysql_format_date(time() - (get_variable('delta_mins')*60));?>" />

        <TABLE BORDER="0" ALIGN="center">
        <TR CLASS="even" VALIGN="top"><TD COLSPAN="2" ALIGN="CENTER"><FONT SIZE="+1"><?php print gettext("Table 'Personnel' - Add New Entry");?></FONT></TD></TR>
        <TR><TD>&nbsp;</TD></TR>
    <TR VALIGN="baseline" CLASS="odd"><TD CLASS="td_label" ALIGN="right"><?php print gettext('Surname');?>:</TD>
        <TD><INPUT ID="ID1" CLASS="dirty" MAXLENGTH="48" SIZE="48" type="text" NAME="frm_surname" VALUE="" onFocus="JSfnChangeClass(this.id, 'dirty');" onChange = "this.value=JSfnTrim(this.value);"/> <SPAN class='warn' ><?php print gettext('text');?></SPAN></TD></TR>
    <TR VALIGN="baseline" CLASS="even"><TD CLASS="td_label" ALIGN="right"><?php print gettext('Fornames');?>:</TD>
        <TD><INPUT ID="ID2" CLASS="dirty" MAXLENGTH="48" SIZE="48" type="text" NAME="frm_forenames" VALUE="" onFocus="JSfnChangeClass(this.id, 'dirty');" onChange = "this.value=JSfnTrim(this.value);"/> <SPAN class='warn' ><?php print gettext('text');?></SPAN></TD></TR>
    <TR VALIGN="baseline" CLASS="odd"><TD CLASS="td_label" ALIGN="right"><?php print gettext('Address');?>:</TD>
        <TD><INPUT ID="ID3" CLASS="dirty" MAXLENGTH="128" SIZE="48" type="text" NAME="frm_address" VALUE="" onFocus="JSfnChangeClass(this.id, 'dirty');" onChange = "this.value=JSfnTrim(this.value);"/> <SPAN class='warn' ><?php print gettext('text');?></SPAN></TD></TR>
    <TR VALIGN="baseline" CLASS="even"><TD CLASS="td_label" ALIGN="right"><?php print gettext('State');?>:</TD>
        <TD><INPUT ID="ID4" CLASS="dirty" MAXLENGTH="24" SIZE="4" type="text" NAME="frm_state" VALUE="" onFocus="JSfnChangeClass(this.id, 'dirty');" onChange = "this.value=JSfnTrim(this.value);"/> <SPAN class='warn' ><?php print gettext('text');?></SPAN></TD></TR>
    <TR VALIGN="baseline" CLASS="odd"><TD CLASS="td_label" ALIGN="right"><?php print gettext('Date of Birth');?>:</TD>
        <TD><?php print generate_dateonly_dropdown('date_of_birth',0,FALSE);?></TD></TR>
    <TR VALIGN="baseline" CLASS="even"><TD CLASS="td_label" ALIGN="right"><?php print gettext('Gender');?>:</TD>
        <TD><INPUT ID="ID5" CLASS="dirty" MAXLENGTH="48" SIZE="48" type="text" NAME="frm_gender" VALUE="" onFocus="JSfnChangeClass(this.id, 'dirty');" onChange = "this.value=JSfnTrim(this.value);"/> <SPAN class='warn' ><?php print gettext('text');?></SPAN></TD></TR>
    <TR VALIGN="baseline" CLASS="odd"><TD CLASS="td_label" ALIGN="right"><?php print gettext('Identifier');?>:</TD>
        <TD><INPUT ID="ID6" CLASS="dirty" MAXLENGTH="48" SIZE="48" type="text" NAME="frm_person_identifier" VALUE="" onFocus="JSfnChangeClass(this.id, 'dirty');" onChange = "this.value=JSfnTrim(this.value);"/> <SPAN class='warn' ><?php print gettext('text');?></SPAN></TD></TR>
    <TR VALIGN="baseline" CLASS="even"><TD CLASS="td_label" ALIGN="right"><?php print gettext('Email');?>:</TD>
        <TD><INPUT ID="ID7" CLASS="dirty" MAXLENGTH="48" SIZE="48" type="text" NAME="frm_email" VALUE="" onFocus="JSfnChangeClass(this.id, 'dirty');" onChange = "this.value=JSfnTrim(this.value);"/> <SPAN class='warn' ><?php print gettext('text');?></SPAN></TD></TR>
    <TR VALIGN="baseline" CLASS="odd"><TD CLASS="td_label" ALIGN="right"><?php print gettext('Home phone');?>:</TD>
        <TD><INPUT ID="ID8" CLASS="dirty" MAXLENGTH="48" SIZE="48" type="text" NAME="frm_homephone" VALUE="" onFocus="JSfnChangeClass(this.id, 'dirty');" onChange = "this.value=JSfnTrim(this.value);"/> <SPAN class='warn' ><?php print gettext('text');?></SPAN></TD></TR>
    <TR VALIGN="baseline" CLASS="even"><TD CLASS="td_label" ALIGN="right"><?php print gettext('Work phone');?>:</TD>
        <TD><INPUT ID="ID9" CLASS="dirty" MAXLENGTH="48" SIZE="48" type="text" NAME="frm_workphone" VALUE="" onFocus="JSfnChangeClass(this.id, 'dirty');" onChange = "this.value=JSfnTrim(this.value);"/> <SPAN class='warn' ><?php print gettext('text');?></SPAN></TD></TR>
    <TR VALIGN="baseline" CLASS="odd"><TD CLASS="td_label" ALIGN="right"><?php print gettext('Cellphone');?>:</TD>
        <TD><INPUT ID="ID10" CLASS="dirty" MAXLENGTH="48" SIZE="48" type="text" NAME="frm_cellphone" VALUE="" onFocus="JSfnChangeClass(this.id, 'dirty');" onChange = "this.value=JSfnTrim(this.value);"/> <SPAN class='warn' ><?php print gettext('text');?></SPAN></TD></TR>
    <TR VALIGN="baseline" CLASS="even"><TD CLASS="td_label" ALIGN="right"><?php print gettext('Next of Kin Name');?>:</TD>
        <TD><INPUT ID="ID11" CLASS="dirty" MAXLENGTH="48" SIZE="48" type="text" NAME="frm_next_of_kin_name" VALUE="" onFocus="JSfnChangeClass(this.id, 'dirty');" onChange = "this.value=JSfnTrim(this.value);"/> <SPAN class='warn' ><?php print gettext('text');?></SPAN></TD></TR>
    <TR VALIGN="baseline" CLASS="odd"><TD CLASS="td_label" ALIGN="right"><?php print gettext('Next of Kin Address');?>:</TD>
        <TD><INPUT ID="ID12" CLASS="dirty" MAXLENGTH="48" SIZE="48" type="text" NAME="frm_next_of_kin_address" VALUE="" onFocus="JSfnChangeClass(this.id, 'dirty');" onChange = "this.value=JSfnTrim(this.value);"/> <SPAN class='warn' ><?php print gettext('text');?></SPAN></TD></TR>
    <TR VALIGN="baseline" CLASS="even"><TD CLASS="td_label" ALIGN="right"><?php print gettext('Next of Kin Home phone');?>:</TD>
        <TD><INPUT ID="ID13" CLASS="dirty" MAXLENGTH="48" SIZE="48" type="text" NAME="frm_next_of_kin_homephone" VALUE="" onFocus="JSfnChangeClass(this.id, 'dirty');" onChange = "this.value=JSfnTrim(this.value);"/> <SPAN class='warn' ><?php print gettext('text');?></SPAN></TD></TR>
    <TR VALIGN="baseline" CLASS="odd"><TD CLASS="td_label" ALIGN="right"><?php print gettext('Next of Kin Work phone');?>:</TD>
        <TD><INPUT ID="ID14" CLASS="dirty" MAXLENGTH="48" SIZE="48" type="text" NAME="frm_next_of_kin_workphone" VALUE="" onFocus="JSfnChangeClass(this.id, 'dirty');" onChange = "this.value=JSfnTrim(this.value);"/> <SPAN class='warn' ><?php print gettext('text');?></SPAN></TD></TR>
    <TR VALIGN="baseline" CLASS="even"><TD CLASS="td_label" ALIGN="right"><?php print gettext('Next of Kin Cellphone');?>:</TD>
        <TD><INPUT ID="ID15" CLASS="dirty" MAXLENGTH="48" SIZE="48" type="text" NAME="frm_next_of_kin_cellphone" VALUE="" onFocus="JSfnChangeClass(this.id, 'dirty');" onChange = "this.value=JSfnTrim(this.value);"/> <SPAN class='warn' ><?php print gettext('text');?></SPAN></TD></TR>
    <TR VALIGN="baseline" CLASS="odd"><TD CLASS="td_label" ALIGN="right"><?php print gettext('AR Callsign');?>:</TD>
        <TD><INPUT ID="ID16" CLASS="dirty" MAXLENGTH="48" SIZE="48" type="text" NAME="frm_amateur_radio_callsign" VALUE="" onFocus="JSfnChangeClass(this.id, 'dirty');" onChange = "this.value=JSfnTrim(this.value);"/> <SPAN class='warn' ><?php print gettext('text');?></SPAN></TD></TR>
    <TR VALIGN="baseline" CLASS="even"><TD CLASS="td_label" ALIGN="right"><?php print gettext('Notes');?>:</TD>
        <TD><TEXTAREA ID="ID17" name="frm_person_notes" rows="6" cols="48" onFocus="JSfnChangeClass(this.id, 'dirty');" onChange = "this.value=JSfnTrim(this.value);"></TEXTAREA> <SPAN class='warn' ><?php print gettext('text');?></SPAN></TD></TR>
    <TR VALIGN="baseline" CLASS="odd"><TD CLASS="td_label" ALIGN="right"><?php print gettext('Capabilities');?>:</TD>
        <TD><TEXTAREA ID="ID18" name="frm_person_capabilities" rows="6" cols="48" onFocus="JSfnChangeClass(this.id, 'dirty');" onChange = "this.value=JSfnTrim(this.value);"></TEXTAREA> <SPAN class='warn' ><?php print gettext('text');?></SPAN></TD></TR>
        <tr><td colspan=99 align='center'>
        </td></TR>
        <TR><TD COLSPAN="99" ALIGN="center">
        <BR />
        <INPUT TYPE="button"				VALUE="<?php print gettext('Cancel');?>" onClick = "Javascript: document.retform.func.value='r';document.retform.submit();"/>&nbsp;&nbsp;&nbsp;&nbsp;
        <INPUT TYPE="button"				VALUE="<?php print gettext('Reset');?>" onClick = "document.c.reset();" />&nbsp;&nbsp;&nbsp;&nbsp;
        <INPUT TYPE="button" NAME="sub_but" VALUE="               <?php print gettext('Submit');?>                " onclick="this.disabled=true; validate_form(this.form, this);"/>
        </TD></TR>
        </FORM>
        </TD></TR></TABLE>

<?php
