	<?
	include('conn/conn_rcis.php');
	?>
	
	<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
	<HTML><HEAD><TITLE>University of Malaya : e-Recruitment System</TITLE>
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
	<META content="recruitment, university, malaysia" name=keywords>
	<META content="University Of Malaya e-Recruitment System" name=description>
	<META content="" name=title>
	<LINK media=screen href="css/template-css.css" type=text/css rel=stylesheet>
	<LINK media=screen href="css/mainmenu.css" type=text/css rel=stylesheet>
	<LINK media=print href="css/template-css-print.css" type=text/css rel=stylesheet>
	<script type="text/JavaScript">
	<!--
	function MM_jumpMenu(targ,selObj,restore){ //v3.0
	eval(targ+".location='"+selObj.options[selObj.selectedIndex].value+"'");
	if (restore) selObj.selectedIndex=0;
	}
	//-->
	</script>
	<META content="MSHTML 6.00.6000.16705" name=GENERATOR>
	</HEAD>
	<BODY><BR>
	<SCRIPT LANGUAGE="JavaScript" SRC="js/calendarpopup.js"></SCRIPT>
	<SCRIPT LANGUAGE="JavaScript" ID="js20">
	var call20 = new CalendarPopup();
	call20.showYearNavigation();
	call20.showYearNavigationInput();
	</SCRIPT>
	<SCRIPT LANGUAGE="JavaScript">
	function FilterKey(){
	if(event.keyCode >= 65 && event.keyCode <= 90)
	return true
	if(event.keyCode >= 97 && event.keyCode <= 122)
	return true
	if(event.keyCode >= 48 && event.keyCode <= 57)
	return true
	if(event.keyCode == 95)
	return true				
	alert("Only [a-z] [A-Z] [0-9] [ _ ] characters are accepted")
	return false
	}
	
	function FilterKey2(){
	if(event.keyCode >= 33 && event.keyCode <= 126)
	return true		
	alert("All characters are accepted except space")
	return false
	}	
	</script>
	<script>
	function checkEmail(emField){ //reference to email field passed as argument
	
	var fieldValue = emField.value // store field's entire value in variable
	
	// Begin Valid Email Address Tests
	//if field is not empty
	if(fieldValue != ""){ 
	var atSymbol = 0
	//loop through field value string
	for(var a = 0; a < fieldValue.length; a++){ 
	//look for @ symbol and for each @ found, increment atSymbol variable by 1
	if(fieldValue.charAt(a) == "@"){ 
	atSymbol++
	}
	}
	// if more than 1 @ symbol exists
	if(atSymbol > 1){ 
	// then cancel and don't submit form
	alert("Sila masukkan email yang sah!") 
	return false
	}
	// if 1 @ symbol was found, and it is not the 1st character in string
	if(atSymbol == 1 && fieldValue.charAt(0) != "@"){ 
	//look for period at 2nd character after @ symbol 
	var period = fieldValue.indexOf(".",fieldValue.indexOf("@")+2) 
	// "." immediately following 1st "." ? 
	var twoPeriods = (fieldValue.charAt((period+1)) == ".") ? true : false 
	//if period was not found OR 2 periods together OR field contains less than 5 characters OR period is in last position
	if(period == -1 || twoPeriods || fieldValue.length < period + 2 || fieldValue.charAt(fieldValue.length-1)=="."){
	// then cancel and don't submit form
	alert("Sila masukkan email yang sah!") 
	return false
	}	
	}
	// no @ symbol exists or it is in position 0 (the first character of the field)
	else{ 
	// then cancel and don't submit form
	alert("Sila masukkan email yang sah!")
	return false 
	}
	}
	// if field is empty
	else{ 
	// then cancel and don't submit form
	alert("Sila masukkan email yang sah!")
	return false 
	}
	//all tests passed, submit form
	//alert("VALID EMAIL ADDRESS!")
	return true
	}
	</script>
	<? include('js/checkregister.jsp'); ?>
	<TABLE cellSpacing=0 cellPadding=0 width=850 align=center bgColor=#ffffff border=0>
	<TBODY>
	<TR>
	<TD width=5 height=5><IMG height=5 src="images/b1.gif" width=5></TD>
	<TD background=images/b_top.gif></TD>
	<TD width=5 height=5><IMG height=5 src="images/b2.gif" width=5></TD></TR>
	<TR>
	<TD background=images/b_left.gif></TD>
	<TD> 
	<? include('headermain.php'); ?>
	<TABLE cellSpacing=0 cellPadding=0 width=850 border=0>
	<TBODY>
	<TR>
	<TD vAlign=top>
	<TABLE cellSpacing=5 cellPadding=0 width="100%" border=0>
	<TBODY>
	<TR>
	<TD vAlign=top width="25%"> 
	<? if (empty($_SESSION['NoKP']))
	{
	include('menumain.php');	
	
	} else {
	include('menusystem.php');
	}  
	?>
	</TD>
	<TD vAlign=top width="75%">
	<br>
	<div align="left"><a href="home.php">Home</a> &gt; Pendaftaran Baru <em>(New Registration</em>)</div>
	<div align="center"> 
	<br>
	<!-- shamzuri -->
	<table height="100%" cellspacing="0" cellpadding="0" border="0" width="600">
	<tbody>
	<tr>
	<td align="left" valign="top">
	<table height="15" cellspacing="0" cellpadding="0" border="0" width="600" style="background-image:  url(images/content_top_bg.jpg); background-repeat: repeat-x; background-position: left top;">
	<tbody>
	<tr>
	<td align="left" width="15" valign="top"><img height="15" width="15" src="images/content_topl.jpg"/></td>
	<td width="570"></td>
	<td align="right" width="15" valign="top"><img height="15" width="15" src="images/content_topr.jpg"/></td>
	</tr>
	</tbody>
	</table>
	</td>
	</tr>
	<tr>
	<td height="100%" bgcolor="#f0f0f0" align="left" valign="top" style="border-left: 1px solid rgb(204, 204, 204); border-right: 1px solid rgb(204, 204, 204);">
	<table height="100%" cellspacing="0" cellpadding="0" border="0" width="598">
	<tbody>
	<tr>
	<td class="text_about" height="100%" align="center" width="598" valign="top" style="padding: 0pt 15px;">
	<form onSubmit="return Validator(this)" action="daftarbaru_insert.php" method="post" name="frmRegister">
	<table width="100%" border="0" cellspacing="0" cellpadding="0">
	<tr> 
	<td colspan="3"><font color="#000099" size="4" face="Cambria"><strong>Pendaftaran 
	Baru<em> (New Registration) </em></strong></font></td>
	</tr>
	<tr> 
	<td colspan="3">&nbsp; <div align="left"><font color="#FF0000">* 
	Semua maklumat wajib diisi (<em>All fields are required to be filled up</em>)</font></div></td>
	</tr>
	<tr> 
	<td width="24%">&nbsp;</td>
	<td width="2%">&nbsp;</td>
	<td width="74%"></td>
	</tr>
	<script language="JavaScript" type="text/javascript">
	function ShowChoice(country){
	if(country == 'MY'){
	document.frmRegister.nokad2.value ="";
	document.getElementById('ShowWarga1').style.display = "block";
	document.getElementById('ShowWarga2').style.display = "block";
	document.getElementById('ShowWarga3').style.display = "block";
	document.getElementById('ShowWarga4').style.display = "block";
	document.getElementById('ShowBukanWarga1').style.display = "none";
	document.getElementById('ShowBukanWarga2').style.display = "none";
	document.getElementById('ShowBukanWarga3').style.display = "none";
	document.getElementById('ShowBukanWarga4').style.display = "none";
	}
	else{
	document.frmRegister.nokad_new.value ="";
	document.frmRegister.nokad_old.value ="";
	document.getElementById('ShowWarga1').style.display = "none";
	document.getElementById('ShowWarga2').style.display = "none";
	document.getElementById('ShowWarga3').style.display = "none";
	document.getElementById('ShowWarga4').style.display = "none";
	document.getElementById('ShowBukanWarga1').style.display = "block";
	document.getElementById('ShowBukanWarga2').style.display = "block";
	document.getElementById('ShowBukanWarga3').style.display = "block";
	document.getElementById('ShowBukanWarga4').style.display = "block";
	}
	}
	</script>
	<tr> 
	<td>Kewarganegaraan<br>(<em>Nationality</em>)</td>
	<td>:</td>
	<td> <select id="ddl" name="warganegara" onChange="ShowChoice(this.value)">
	<option value="">--Sila Pilih--</option>
	<?	$s_warga = OCIParse($r, "select WGN_KOD_WARGA, WGN_KTRGN_WARGA 
							  from SN_KD_WGN 
							  order by WGN_KTRGN_WARGA");
		OCIExecute($s_warga, OCI_DEFAULT);
		while (OCIFetch($s_warga)) {
			$kod_warga=OCIResult($s_warga,"WGN_KOD_WARGA");
			$ktrgn_warga=OCIResult($s_warga,"WGN_KTRGN_WARGA"); 
			if($warganegara==$kod_warga)
				echo "<option value='$kod_warga' selected>$ktrgn_warga</option>";
			else
				echo "<option value='$kod_warga'>$ktrgn_warga</option>";
			}
	?>
	</select> </td>
	</tr>
	<tr id="ShowWarga1" style="display:none"> 
	<td height="10" colspan="3"> <br> 
	<font color="#990000">(* Penting 
	: Sila masukkan salah satu sahaja 
	yang mana berkenaan iaitu sama 
	ada<strong> No. KP Baru</strong> 
	ATAU <strong>No. KP Lama/Tentera/Polis) 
	</strong></font><br> </td>
	</tr>
	<tr id="ShowWarga2" style="display:none"> 
	<td>No. KP Baru</td>
	<td>:</td>
	<td><input name="nokad_new" class="text" type="text" id="nokad1" maxlength="12" size="16" onBlur="javascript:this.value=this.value.toUpperCase();" onKeyPress="return FilterKey()" onChange="nokad_old.value = '';"> 
	</td>
	</tr>
	<tr id="ShowWarga3" style="display:none"> 
	<td height="10"></td>
	<td></td>
	<td></td>
	</tr>
	<tr id="ShowWarga4" style="display:none"> 
	<td>No. KP Lama/Tentera/Polis</td>
	<td>:</td>
	<td><input name="nokad_old" class="text" type="text" id="nokad1" maxlength="12" size="16" onBlur="javascript:this.value=this.value.toUpperCase();" onKeyPress="return FilterKey()" onChange="nokad_new.value = '';"></td>
	</tr>
	<tr id="ShowBukanWarga1" style="display:none"> 
	<td height="10"></td>
	<td></td>
	<td></td>
	</tr>
	<!-- <tr id="ShowBukanWarga3" style="display:none"> 
	<td>Taraf Penduduk Tetap Malaysia</td>
	<td>:</td>
	<td><? //echo "<input name=\"sah\""; echo "type=\"checkbox\" value=\"Y\">"; ?>&nbsp;(Sila 
	tanda sekiranya Ya)</td>
	</tr>-->
	<tr id="ShowBukanWarga4" style="display:none"> 
	<td height="12"></td>
	<td></td>
	<td></td>
	</tr>
	<tr id="ShowBukanWarga2" style="display:none"> 
	<td>No. Passport</td>
	<td>:</td>
	<td><input name="nokad2" class="text" type="text" id="nokad2" maxlength="12" size="16" onBlur="javascript:this.value=this.value.toUpperCase();" onKeyPress="return FilterKey()"></td>
	</tr>
	<tr> 
	<td height="10"></td>
	<td></td>
	<td></td>
	</tr>
	<tr> 
	<td>Gelaran<br>
	(<em>Title </em>)</td>
	<td>:</td>
	<td><SELECT name="gelaran" id="ddl">
	<option value="XXX">--Sila 
	Pilih--</option>
	<?
	$sqlGelaran = OCIParse($r, "select GLR_KOD_GELARAN, GLR_KTRGN_GELARAN_BM 
							  from SN_KD_GELARAN 
							  order by GLR_KTRGN_GELARAN_BM");
	OCIExecute($sqlGelaran, OCI_DEFAULT);
	while (OCIFetch($sqlGelaran)) {
		$kod_gelaran=OCIResult($sqlGelaran,"GLR_KOD_GELARAN");
		$ktrgn_gelaran=OCIResult($sqlGelaran,"GLR_KTRGN_GELARAN_BM");  
		if($gelaran==$kod_gelaran)
			echo "<option value=$kod_gelaran selected>$ktrgn_gelaran</option>";
		else
			echo "<option value=$kod_gelaran>$ktrgn_gelaran</option>";
	}
	?>
	</select><br>
	<em>(Please select - Miss,Madam,Mr.Mrs,etc</em>)</td>
	</tr>
	<tr> 
	<td height="10"></td>
	<td></td>
	<td></td>
	</tr>
	<tr> 
	<td>Nama (Ikut Nama IC)<br>(<em>Name-According to I/C/Passport</em>)</td>
	<td>&nbsp;</td>
	<td><input class="TEXT" name="nama" type="text" id="nama" size="50" onBlur="javascript:{this.value = this.value.toUpperCase(); }" ></td>
	</tr>
	<tr> 
	<td height="10"></td>
	<td></td>
	<td></td>
	</tr>
	<tr> 
	<td>Tarikh Lahir<br>(<em>Date Of Birth</em>)</td>
	<td>:</td>
	<td><A HREF="#" onClick="call20.select(document.frmRegister.birthdate,'anchor20','dd/MM/yyyy'); return false;" TITLE="Please click here to input date" NAME="anchor20" ID="anchor20"> 
	<input class="TEXT" id="birthdate" size="10" maxlength="10" name="birthdate" readonly style="cursor:hand; text-align:center" value="">
	</A>&nbsp;<img src=images/cancel.png width="18" height="18" border=0 align=center title="Delete Date" onClick="javascript:document.frmRegister.birthdate.value=''"></td>
	</tr>
	<tr> 
	<td height="10"></td>
	<td></td>
	<td></td>
	</tr>
	<tr>
	<td>Kelayakan Akademik Tertinggi<br>(<em>Highest Academic Qualification</em>)</td>
	<td>:</td>
	<td><select name="mini"  id="ddl">
	<option value="XX">--Sila 
	Pilih--</option>
	<?
	$sqlthp="
	select thp_kod_tahap, thp_ktrgn_tahap, thp_kelulusan_tertinggi
	from sn_kd_thp
	where thp_aktif = 'Y' and thp_ktrgn_tahap like ('%DIP%')
	union
	select thp_kod_tahap, thp_ktrgn_tahap, thp_kelulusan_tertinggi
	from sn_kd_thp
	where thp_aktif = 'Y' and thp_ktrgn_tahap like ('IJA%')
	union
	select thp_kod_tahap, thp_ktrgn_tahap, thp_kelulusan_tertinggi
	from sn_kd_thp
	where thp_aktif = 'Y' and thp_kod_tahap in ('TP04','TP07','TP24','TP25','TP32','TP28','TP40','TP45')
	order by 3, 2
	--select THP_KOD_TAHAP, THP_KTRGN_TAHAP
	--from SN_KD_THP
	--where THP_AKTIF = 'Y' and THP_KTRGN_TAHAP like ('%DIP%')
	--union
	--select THP_KOD_TAHAP, THP_KTRGN_TAHAP
	--from SN_KD_THP
	--where THP_AKTIF = 'Y' and THP_KTRGN_TAHAP like ('IJA%')
	--order by THP_KTRGN_TAHAP
	";
	
	
	$qry = OCIParse($r,$sqlthp);
	OCIExecute($qry,OCI_DEFAULT);
	while (OCIFetch($qry)){
	$kodthp = ociresult($qry,"THP_KOD_TAHAP");
	$ktrgnthp = ociresult($qry,"THP_KTRGN_TAHAP");
	echo "<option ";
	if ($kodthp==$kodthp1)
	echo " selected ";
	echo "value=\"$kodthp\">$ktrgnthp </option>";
	}
	?>
	</select><br>(<em>Please select-Diploma,Advance Diploma,Post Grad.Diploma,Doctor of Philosophy(PhD),Master and Bachelor(First Degree) </em>)</td>
	</tr>
	<tr> 
	<td height="10"></td>
	<td></td>
	<td></td>
	</tr>
	<tr> 
	<td>Alamat E-Mel<br>(<em>Email Address</em>)</td>
	<td>:</td>
	<td><input class="TEXT" name="alamatemel" type="text" id="alamatemel" maxlength="50" size="50" value="" required onBlur="checkEmail(this)" > 
	</td>
	</tr>
	<tr> 
	<td></td>
	<td></td>
	<td>(Sila masukkan alamat e-mel 
	yang sah<br>(<em>Please insert valid email address</em>)</td>
	</tr>
    <tr> 
	<td height="10"></td>
	<td></td>
	<td></td>
	</tr>
	<tr> 
	<td>Id Pengguna<br>(<em>User Id</em>)</td>
    <td>:</td>
	<td><input class="TEXT" name="userid" type="text" id="userid" maxlength="30" size="30" required></td>
    </tr>
    <tr> 
	<td height="10"></td>
	<td></td>
	<td></td>
	</tr>
	<tr>
    <td>Katalaluan<br>(<em>Password</em>)</td>
    <td>:</td> 
	<td><input class="TEXT" name="password" type="password" id="password" maxlength="30" size="30" required></td>
	</tr>
    <tr> 
	<td height="10"></td>
	<td></td>
	<td></td>
	</tr>
	<tr> 
	<td colspan="3" align="center"> 
	<input id="button" class="btn" type="submit" name="btn_simpan"  onClick="return CheckUserRegister()"  
	value="Daftar" title=" Daftar "/>
	&nbsp; <input id="button" class="btn" type="reset" name="btn_reset" value=" Reset " title=" Reset "/> 
	</td>
	</tr>
	</table>
	</form>
	</td>
	</tr>
	</tbody>
	</table>
	</td>
	</tr>
	<tr>
	<td align="left" valign="top">
	<table height="15" cellspacing="0" cellpadding="0" border="0" width="600" style="background-image:  url(images/content_btm_bg.jpg); background-repeat: repeat-x; background-position: left top;">
	<tbody>
	<tr>
	<td align="left" width="15" valign="top"><img height="15" width="15" src="images/content_btml.jpg"/></td>
	<td width="570"/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	<td align="right" width="15" valign="top"><img height="15" width="15" src="images/content_btmr.jpg"/></td>
	</tr>
	</tbody>
	</table>
	</td>
	</tr>
	</tbody>
	</table>
	<!-- end shamzuri -->
	</div>
	<BR>
	<br>
	</TD>
	</TR></TBODY></TABLE></TD></TR></TBODY></TABLE>
	<?
	include('footeracademic.php');
	?>
	</TD>
	<TD background=images/b_right.gif></TD></TR>
	<TR>
	<TD width=5 height=5><IMG height=5 src="images/b3.gif" width=5></TD>
	<TD background=images/b_bottom.gif></TD>
	<TD width=5 height=5><IMG height=5 src="images/b4.gif" 
	width=5></TD></TR></TBODY></TABLE>
	<?
	// Logoff from Oracle...
	OCILogOff($r);
	?></BODY></HTML>
