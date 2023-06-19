<?php
session_start();
include("include/conn_oracle.php"); 
//include("include/hris_users.php"); 


global $c;
global $username;


//echo "<< $conn_oracle_status";

$flag=isset($_GET['flag'])?$_GET['flag']:'';



//echo "$flag " ;exit;
//$flag==1 - Login
//$flag==2 - Terlupa kata laluan

if($flag==1)
{
	$userid = isset($_GET['userid'])?$_GET['userid']:'userid';
	if ($userid == 'userid') {$userid = isset($_POST['userid'])?$_POST['userid']:'';}

	$password = isset($_GET['password'])?$_GET['password']:'password';
	if ($password == 'password') {$password = isset($_POST['password'])?$_POST['password']:'';}

	$captcha = isset($_GET['captcha'])?$_GET['captcha']:'captcha';
	if ( $captcha == 'captcha' ){
		$captcha = isset($_POST['captcha'])?$_POST['captcha']:'';
		// Validation: Checking entered captcha code with the generated captcha code
		if(strcmp($_SESSION['captcha'], $_POST['captcha']) != 0){
		// Note: the captcha code is compared case insensitively.
		// if you want case sensitive match, check above with strcmp()
		$status = "<p style='color:#FFFFFF; font-size:20px'>
		<span style='background-color:#FF0000;'>Entered captcha code does not match! 
		Kindly try again.</span></p>";
		var_dump($_SESSION['captcha']);
		var_dump($_POST['captcha']);
		}else{
		$status = "<p style='color:#FFFFFF; font-size:20px'>
		<span style='background-color:#46ab4a;'>Your captcha code is match.</span>
		</p>";	
		echo LoginPassword($userid,$password);
			}
		}
		echo($status);
		
		
}

if($flag==2)
{
	echo TerlupaKatalaluan($conn_oracle_status);	
}

if($flag==3)
{
	echo DaftarKataLaluan();	
}

//>>>>>>>>>>>>>>flag 1 >>>>>>>>>>>>>>>>>>>>
function LoginPassword($userid,$password)
	{
		global $c;	
		$str = '';
		$md5 = '';
		$error_msg = '';
		//$proxy1 = $_SERVER["REMOTE_ADDR"];
		//$userid='puteri94';
		//$password_hdr ="puteri94";
		
			
			$sql_semak1 = "	SELECT COUNT(MLI_KP) AS KIRA
						    FROM SN_KH_PENGAJAR_LOG
                            WHERE (MLI_NAMA = '".$userid."' or MLI_EMEL= '".$userid."')
							";
			//echo $sql_semak1.'<br>';exit;
			$sql_semak1a = OCIParse($c,$sql_semak1);
			OCIExecute($sql_semak1a,OCI_DEFAULT);
			if(OCIFetch($sql_semak1a))
			{ 
			     $bil_1 = OCIResult($sql_semak1a,"KIRA");
			}
		
			//echo "<< $bil_1";exit;
			
			if($bil_1 > '0')
				{
				
				$sql_data1 = "	SELECT MLI_KP, MLI_MD5
								FROM SN_KH_PENGAJAR_LOG
								WHERE MLI_STATUS = 'Y'
								AND (MLI_NAMA = '".$userid."' or MLI_EMEL= '".$userid."')
								";
				//echo $sql_data1.'<br>';exit;				
				$sql_data1a = OCIParse($c,$sql_data1);
				OCIExecute($sql_data1a,OCI_DEFAULT);
				if(OCIFetch($sql_data1a))
					{ 		$kod_ic = OCIResult($sql_data1a,"MLI_KP");
						       $md5 = OCIResult($sql_data1a,"MLI_MD5");
					}
					
				if($md5 == 'Y')
					{		
						$password_hdr_cut = md5($password);
						$password_hdr=substr($password_hdr_cut,1,15);
					}
				else
					{
						$password_hdr = $password;
					}	
					
				
					
				$sql_semak2 = "	SELECT COUNT(MLI_KP) AS KIRA
						    	FROM SN_KH_PENGAJAR_LOG
                            	WHERE (MLI_NAMA = '".$userid."' or MLI_EMEL= '".$userid."') 
								AND MLI_KATALALUAN='".$password_hdr."'
								";
				//echo $sql_semak2.'<br>';exit;				
				$sql_semak2a = OCIParse($c,$sql_semak2);
				OCIExecute($sql_semak2a,OCI_DEFAULT);
				if(OCIFetch($sql_semak2a))
					{ 
							$bil_2 = OCIResult($sql_semak2a,"KIRA");
					}
					
					
					
				
				if ($bil_2 > 0)
					{
						
						$sql_insert1 ="INSERT INTO SN_AU_INS_USRLOG
								       (LGN_USERID, LGN_WEB, LGN_MODUL, LGN_MASA, LGN_IP_ADDRESS) 
									   VALUES ( '$UserID', 'Y', 'MPS',sysdate,'$proxy1')
					 				";	
						 $sql_insert4a = ociparse($c,$sql_insert4);
						 ociexecute($sql_insert4a,OCI_DEFAULT);
					     ocicommit($c);	
						
						session_start();
						$_SESSION['NoKP'] = $kod_ic;
						
						header("Location: ../pengajar/personal.php");	
					}
				else
					{
						$error_msg = '1';
					}	
			
				}
			else
				{
				$error_msg = '1';	
				}
			
		if ($error_msg == '1')
		{
		/*echo '<script language="javascript" type="text/javascript">
		alert ("HARAP MAAF KERJA-KERJA PENAMBAHBAIKKAN SEDANG DIJALANKAN SEHINGGA 24 OGOS 2018");
		window.location.href ="pkh_mps_sc001a_login.php";
		</script>';*/
			
		 echo '<script language="javascript" type="text/javascript">
		alert ("SILA MASUKKAN ID PENGGUNA/EMEL DAN KATALALUAN YANG BETUL!\n\nPLEASE ENTER YOUR USERNAME AND PASSWORD CORRECTLY!");
		window.location.href ="pkh_mps_sc001a_login.php";
		</script>';		
		}
		
			
		return $str;
		ocilogoff($c);	
	}
	
//>>>>>>>>>>>>>>flag 2 >>>>>>>>>>>>>>>>>>>>	
function TerlupaKatalaluan($conn_oracle_status)
	{
	global $c;
	$str = '';
		
	$email = isset($_POST['email'])?$_POST['email']:'';
	
	
	
	
	$sql_semak1 = "	SELECT COUNT(MLI_NAMA) AS KIRA 
					FROM SN_KH_PENGAJAR_LOG 
					WHERE MLI_EMEL='".$email."'
					AND MLI_STATUS='Y' 
					";
					
	//echo $sql_semak1.'<br>'; 					
	$sql_semak1a = oci_parse($c,$sql_semak1);
	oci_execute($sql_semak1a,OCI_DEFAULT);
	
	if (oci_fetch($sql_semak1a))
		{
		 $bil_1 = ociresult($sql_semak1a,"KIRA");
		}
	oci_free_statement($sql_semak1a);
	
	
	$sql_semak2 = "	SELECT COUNT(MLI_EMEL) AS KIRA 
					FROM SN_KH_PENGAJAR_LOG 
					WHERE MLI_EMEL='".$email."'
					AND MLI_STATUS='Y' 
					";
					
	//echo $sql_semak1.'<br>'; 					
	$sql_semak2a = oci_parse($c,$sql_semak2);
	oci_execute($sql_semak2a,OCI_DEFAULT);
	
	if (oci_fetch($sql_semak2a))
		{
		 $bil_2 = ociresult($sql_semak2a,"KIRA");
		}
	oci_free_statement($sql_semak2a);
	
	
	if ($bil_1 == '0')
	{
		echo "<script>";
		echo "alert('TIADA ID PENGGUNA. MOHON UNTUK DAFTAR ID PENGGUNA TERLEBIH DAHULU');";
		echo "</script>";
		
		echo "<script>";
		echo "window.location.href='pkh_mps_sc003a_katalaluan.php?flag=2';";
		echo "</script>";
	}
	elseif ($bil_2 == '0')
	{
		echo "<script>";
		echo "alert('EMEL TIDAK WUJUD. SILA MASUKKAN EMEL DENGAN BETUL');";
		echo "</script>";
		
		echo "<script>";
		echo "window.location.href='pkh_mps_sc003a_katalaluan.php?flag=1';";
		echo "</script>";
		
	}
	else
	{
		$new_password = rand();	
		$new_password_md5 = md5($new_password);	
		
		$new_password_md5_cut=substr($new_password_md5,1,15);
		
	
		$sql_update1 = "	UPDATE SN_KH_PENGAJAR_LOG SET MLI_KATALALUAN='".$new_password_md5_cut."',
							MLI_MD5='Y' 
							WHERE  MLI_EMEL='".$email."'
							";
							
		//echo $sql_update1.'<br>';exit; 					
		$sql_update1a = oci_parse($c,$sql_update1);
		oci_execute($sql_update1a,OCI_DEFAULT);
		ocicommit($c);
		oci_free_statement($sql_update1a);
		
		echo EmailMakluman($email,$new_password,$conn_oracle_status);	
		
		echo "<script>";
		echo "alert('KATALALUAN BARU TELAH DIHANTAR (EMEL). SILA SEMAK DAN LOGIN MENGGUNAKAN KATALALUAN YANG BARU.');";
		echo "</script>";
		
		echo "<script>";
		echo "window.location.href='pkh_mps_sc001a_login.php';";
		echo "</script>";
		
	
	//echo $email.'<br/>';
	//echo $new_password.'<br/>';
	//echo $new_password_md5.'<br/>';
	
	}
	
	
	return $str;
	ocilogoff($c); 

	}
	
function EmailMakluman($email,$new_password,$conn_oracle_status)
	{
	global $c;
	$str = '';
	require_once('phpmailer/class.phpmailer.php');
	
	$tajuk_surat= 'Katalaluan / Password (Pengajaran Sambilan/Part-Time Teaching)';
		
	$Mail = new PHPMailer();
  	$Mail->PluginDir	= 'phpmailer/';
  	$Mail->SetLanguage("en", 'phpmailer/language/');
  	$Mail->IsSendmail(); 

	
	if ($conn_oracle_status == 'live')
		{
			$emel_recipient = $email;
			//$emel_recipient = $staff_email;
			//$emel_recipient = "rizmanizan@um.edu.my";  
			//$emel_recipient="ali_e@um.edu.my";	
			//$Mail->AddBCC("june@um.edu.my");
		}
	else
		{
			$emel_recipient = "june@um.edu.my";  
			//$Mail->AddBCC("ali_e@um.edu.my");
			$Mail->AddBCC("ihris_test@um.edu.my");
		}
			
		

	//echo $emel_recipient.'<br/><br/>';
	$Mail->AddAddress($emel_recipient); 
	$Mail->FromName = "Pentadbir UMexternal - Staff E-Services";
	$Mail->SetFrom  ="noreply@smtp10.um.edu.my";
	$Mail->AddReplyTo = "noreply@smtp10.um.edu.my";
	$Mail->Subject = $tajuk_surat;
	$body = LupaKatalaluan($email,$new_password);  
	$Mail->Priority	= 1;
	$Mail->AltBody    = "To view the message, please use an HTML compatible email viewer!"; // optional, comment out and test
	$Mail->MsgHTML($body);
		
		if($Mail->Send()) 
			{ 
				$mailstat="Success"; 
				
			} 
		else 
			{ 
				$mailstat="Fail";
				echo "Error sending: " .$Mail->ErrorInfo;
			} 
	
	
	return $str;	
	ocilogoff($c);
	}
	
function LupaKatalaluan($email,$new_password)		
	{
global $c;	
$str = '';

//echo $email;


$sql_semak2 = "	SELECT (GLR_KTRGN_GELARAN_BM ||' '|| CPG_NAMA) AS NAMA 
				FROM SN_KH_CALON_PENGAJAR,SN_KD_GELARAN
				WHERE GLR_KOD_GELARAN=CPG_GELARAN
				AND CPG_EMEL='".$email."'
					";
	//echo $sql_semak2.'<br/>';exit;				
	$sql_semak2a=oci_parse($c, $sql_semak2);
	oci_execute ($sql_semak2a, OCI_DEFAULT);
	if (oci_fetch($sql_semak2a)) 				
		{
			$nama_user = ociresult($sql_semak2a,"NAMA");
		}
	ocifreestatement($sql_semak2a);


//echo "<< $nama_user"; exit;
		
$str.=	'<table class="frame" align="center" style="font-size:12px">';

$str.=	'<tr><td valign="top">';

$str.=	'<table width="590px" height="100%" align="center" border="0">';
$str.=	'<tr><td valign="top" align="left" height="5%">Berikut merupakan maklumat Log Masuk ke Sistem Pengajaran Sambilan : <br/><br/></td></tr>';

$str.=	'<font size="3">Nama : '.$nama_user.'</font><br/>';
$str.=	'<font size="3">Id Pengguna : '.$email.'</font><br/>';
$str.=	'<font size="3">Katalaluan Anda Yang Baru Ialah : '.$new_password.'</font><br/><br/><br/><br/>';

$str.=	'**********************************************************************************************************';

$str.=	'<br/><br/><br/>';

$str.=	'<tr><td valign="top" align="left" height="5%"><i>Following is the Login Information for Part-Time Teaching System: </i><br/><br/></td></tr>';


$str.=	'<font size="3"><i>Name :'.$nama_user.',</i></font><br/>';
$str.=	'<font size="3"><i>User Id : '.$email.',</i></font><br/>';
$str.=	'<font size="3"><i>Your New Password Is : '.$new_password.'</i></font><br/><br/><br/><br/>';

$str.=	'<br/><br/>';
$str.=	'<b>&#42;&nbsp;<em>INI ADALAH CETAKAN KOMPUTER, TANDATANGAN TIDAK DIPERLUKAN</em>&nbsp;&#42;</b>';
$str.=	'</td></tr>';
$str.=	'</table>';

$str.=	'</td></tr>';
//$str.=	'<tr><td valign="bottom" valign="bottom">'.Surat::SuratFooter().'.</td></tr>';
$str.=	'</table>';


return $str;
ocilogoff($c);	
	}
	
//>>>>>>>>>>>>>>flag 3 >>>>>>>>>>>>>>>>>>>>	
function DaftarKataLaluan()
	{
	global $c;
	$str = '';
		
	$icnumber = isset($_POST['icnumber'])?$_POST['icnumber']:'';
	$userid = isset($_POST['userid'])?$_POST['userid']:'';
	$password = isset($_POST['password'])?$_POST['password']:'';
	
	
	
	
	
	$sql_semak1 = "	SELECT COUNT(MLI_KP) AS KIRA 
				    FROM SN_KH_PENGAJAR_LOG 
					WHERE MLI_KP='".$icnumber."' 
					";
					
	//echo $sql_semak1.'<br>'; 					
	$sql_semak1a = oci_parse($c,$sql_semak1);
	oci_execute($sql_semak1a,OCI_DEFAULT);
	
	if (oci_fetch($sql_semak1a))
		{
		 $bil_1 = ociresult($sql_semak1a,"KIRA");
		}
	oci_free_statement($sql_semak1a);
	
	
	$sql_semak2 = "	SELECT COUNT(BIO_NOSTAF) AS KIRA 
					FROM SN_PA_BIODATA A, SN_VW_ATT_STAFF B
					WHERE (A.BIO_IC_BARU='".$icnumber."' OR A.BIO_IC_LAMA='".$icnumber."' OR A.BIO_NO_PASSPORT='".$icnumber."') 
					AND A.BIO_NOSTAF=B.NOGAJI_POHON 
					";
					
	//echo $sql_semak2.'<br>'; exit;					
	$sql_semak2a = oci_parse($c,$sql_semak2);
	oci_execute($sql_semak2a,OCI_DEFAULT);
	
	if (oci_fetch($sql_semak2a))
		{
		 $bil_2 = ociresult($sql_semak2a,"KIRA");
		}
	oci_free_statement($sql_semak2a);
	
	
	if ($bil_2 > '0')
	{
		echo "<script>";
		echo "alert('Kakitangan Universiti Malaya Tidak Dibenarkan Untuk Memohon Sebagai Calon Luar. << University of Malaya staff is not allowed to apply as external candidate');";
		echo "</script>";
		
		echo "<script>";
		echo "window.location.href='../pengajar/home.php';";
		echo "</script>";
		
	}
	elseif ($bil_1 == '0')
	{
		echo "<script>";
		echo "alert('Nombor Kad Pengenalan/Ic Number/Passport Tidak Didaftarkan. Mohon Masukkan Maklumat Yang Betul!');";
		echo "</script>";
		
		echo "<script>";
		echo "window.location.href='pkh_mps_sc003a_katalaluan.php?flag=2';";
		echo "</script>";
	}
	
	else
	{
			
		$new_password_md5 = md5($password);	
		
		$new_password_md5_cut=substr($new_password_md5,1,15);
	
		$sql_update1 = " UPDATE SN_KH_PENGAJAR_LOG SET MLI_NAMA='".$userid."',
						 MLI_KATALALUAN='".$new_password_md5_cut."',MLI_MD5='Y'
						 WHERE  MLI_KP='".$icnumber."'
					   ";
							
		//echo $sql_update1.'<br>';exit; 					
		$sql_update1a = oci_parse($c,$sql_update1);
		oci_execute($sql_update1a,OCI_DEFAULT);
		ocicommit($c);
		oci_free_statement($sql_update1a);
		
		
		echo "<script>";
		echo "alert('Maklumat Telah Disimpan. Sila Login Semula.');";
		echo "</script>";
		
		echo "<script>";
		echo "window.location.href='pkh_mps_sc001a_login.php';";
		echo "</script>";
		
	
	//echo $email.'<br/>';
	//echo $new_password.'<br/>';
	//echo $new_password_md5.'<br/>';
	
	}
	
	
	return $str;
	ocilogoff($c); 

	}	

?>