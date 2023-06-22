<?php

global $username;
global $c;
//include("../../conn_oracle.php");
//include("../../hris_users.php");
include ("include/conn_oracle.php");
include ("include/class_pengajaran_sambilan.php");


	

		error_reporting(E_ALL);
		ini_set('display_errors', 1);
	


$operasi = isset($_POST['operasi'])?$_POST['operasi']:'operasi';
if($operasi == 'operasi'){$operasi = isset($_GET['operasi'])?$_GET['operasi']:'';};

$status = isset($_GET['status'])?$_GET['status']:'status';
if($status == 'status'){$status = isset($_POST['status'])?$_POST['status']:'';}

//echo "<< $operasi";
//echo $conn_oracle_status.'<br><br>';
	

if($operasi == 'mohon')
	{
		echo SimpanPermohonan();
	}
	
if($operasi == 'maklumat')
	{
		$flag = isset($_GET['flag'])?$_GET['flag']:'flag';
		if($flag == 'flag'){$flag = isset($_POST['flag'])?$_POST['flag']:'';}
		
		if($flag=='hapus')
		{
		echo HapusMaklumatDetail();	
		}
		elseif($flag=='2')
		{
		echo KemaskiniMaklumatDetail();	
		}
		else
		{
		echo SimpanMaklumatDetail();
		}
		
	}

if($operasi == 'batalpengguna')
	{
		
		echo BatalPermohonan();
	}

if($operasi == 'pengguna')
	{
		
		echo HantarPermohonan($conn_oracle_status);
	}
	
if($operasi == 'pengesahan')
	{
		echo SahTawaran($conn_oracle_status);
	}

if($operasi == 'tambah')
	{
	//echo "Tambah <<";
	echo TambahTarikh();	
	}
	
if($operasi == 'hapus')
	{
	echo "hapus";
	}	


/*******************************************************/

//Bahagian Permohonan
function SimpanPermohonan()
	{
	global $c;
	global $username;
	$str='';
	$kumpseq='';
	
	$no_staff = isset($_GET['no_staff'])?$_GET['no_staff']:'no_staff';
	if($no_staff == 'no_staff'){$no_staff = isset($_POST['no_staff'])?$_POST['no_staff']:'';}
	
	$norujukiklan = isset($_GET['norujukiklan'])?$_GET['norujukiklan']:'norujukiklan';
	if($norujukiklan == 'norujukiklan'){$norujukiklan = isset($_POST['norujukiklan'])?$_POST['norujukiklan']:'';}
	
	
	$flag = isset($_GET['flag'])?$_GET['flag']:'flag';
	if($flag == 'flag'){$flag = isset($_POST['flag'])?$_POST['flag']:'';}
	
	$papar = isset($_GET['papar'])?$_GET['papar']:'papar';
	if($papar == 'papar'){$papar = isset($_POST['papar'])?$_POST['papar']:'';}
	
	$norujukanseq = isset($_GET['norujukanseq'])?$_GET['norujukanseq']:'norujukanseq';
	if($norujukanseq == 'norujukanseq'){$norujukanseq = isset($_POST['norujukanseq'])?$_POST['norujukanseq']:'';}
	
	
	$norujuk=$norujukiklan;
	
	$Data1=MPS_Data::TahunBulanHari();
	$tahun=$Data1['tahun'];
	$bulan=$Data1['bulan'];
	
	

	$Data2=MPS_Data::DataTawaranKursus($no_staff,$norujuk);
	$amali=$Data2['amali'];
	$kuliah=$Data2['kuliah'];
	$tutorial=$Data2['tutorial'];
	$hari=$Data2['hari'];
	$tarikhisiiklan=$Data2['tarikhisiiklan'];

	
	$Data3=MPS_Data::DataTawaranInfo($no_staff,$norujuk);
	   $jbt_ajar = $Data3['jbt_ajar'];
	  $sesi_ajar = $Data3['sesi_ajar'];
	   $semester = $Data3['semester'];
	 $sebab_ajar = $Data3['sebab_ajar'];
  $nostafkj_ajar = $Data3['nostafkj_ajar'];
$nostafkptj_ajar = $Data3['nostafkptj_ajar'];
 $kodkursus_ajar = $Data3['kodkursus_ajar'];
       $kategori = $Data3['kategori'];
	   $telefon1 = $Data3['telefon'];
	 $tarikhmula = $Data3['tarikhmula'];
	$tarikhtamat = $Data3['tarikhtamat'];
	  $ktrgnblok = $Data3['ktrgnblok'];
		   $blok = $Data3['blok'];	
		$kategori= $Data3['kategori'];	
		
	$Data4=MPS_Data::DataStaff($no_staff);
	$jawatan=$Data4['gred'];
	$jabatanhakiki=$Data4['jbt'];
	
	
	$sql_semak1 = " SELECT DISTINCT PSH_KUMPULAN_SEQ FROM SN_KH_PENGAJAR_HDR
					WHERE PSH_ID='".$no_staff."'
					AND PSH_SESI='".$sesi_ajar."'
					AND PSH_STATUS_POHON='B'
					AND PSH_SEMESTER='".$semester."'
				   ";
			//echo $sql_semak3.'<br/>';		
			$sql_semak1a=oci_parse ($c, $sql_semak1);
			oci_execute ($sql_semak1a, OCI_DEFAULT);
			if (oci_fetch($sql_semak1a)) 				
				{
					$kumpseq = ociresult($sql_semak1a,"PSH_KUMPULAN_SEQ");
				}
			oci_free_statement($sql_semak1a);

	
	$jumlahjam=$kuliah+$tutorial+$amali;
	
	$norujukan=MPS_Operasi::NoRujukanPengajaran($tahun,$bulan);
	
	
	if($kumpseq!='')
	{
		$norujukseq=$kumpseq;	
	}
	elseif($flag=='1')
	{
		$norujukseq=$norujukanseq;
	}
	else
	{
		$norujukseq=MPS_Operasi::JanaKumpulanSeq($no_staff,$sesi_ajar,$semester);
	}
	//echo $norujukseq;
	//exit;	
	
	$sqlsemak = "SELECT COUNT(*) AS BIL FROM SN_KH_PENGAJAR_HDR WHERE PSH_ID='".$no_staff."' AND PSH_NORUJUK_IKLAN='".$norujukan."'";
	//	echo "$sqlChk<br>";
	$sqlsemak1= ociparse($c,$sqlsemak);
	ociexecute($sqlsemak1,OCI_DEFAULT);
	if (ocifetch($sqlsemak1)){
	$bil = ociresult($sqlsemak1,"BIL");
	}
	
	ocifreestatement($sqlsemak1);
	
	$status="B";

	if($bil=='0')
	{
		
		
		$sql_insert1 = "INSERT INTO SN_KH_PENGAJAR_HDR
					   (PSH_ID, PSH_JAWATAN, PSH_UNIT, 
    					PSH_JABATAN_AJAR,PSH_SESI,PSH_KOD_KURSUS,
						PSH_SEMESTER,PSH_NOSTAF_KJ_AJAR,
						PSH_NOSTAF_KPTJ_AJAR,
						PSH_JUM_BEBAN_AJAR,PSH_CREATED_BY, 
						PSH_CREATED_DATE,PSH_KATEGORI_JAWATAN,
						PSH_STATUS_POHON,
						PSH_NORUJUK_PENGAJAR,
						PSH_NORUJUK_IKLAN,
						PSH_KUMPULAN_SEQ) 
   						VALUES                     
    					('".$no_staff."',
						'NON',
						'NON',
						'".$jbt_ajar."',
						'".$sesi_ajar."',
						'".$kodkursus_ajar."',
						'".$semester."',
						'".$nostafkj_ajar."',
						'".$nostafkptj_ajar."',
						'".$jumlahjam."',
						'".$username."',
						SYSDATE,
						'".$kategori."',
						'".$status."',
						'".$norujukan."',
						'".$norujuk."',
						'".$norujukseq."')
					"; 
					//echo $sql_insert1.'<br><br>';exit;
				//echo $sql_insert2.'<br><br>';exit;
				$sql_insert1a = oci_parse($c,$sql_insert1);
				oci_execute($sql_insert1a,OCI_DEFAULT);
			
	
	}
	
	
	
		if(oci_num_rows($sql_insert1a) > 0)
		{
			oci_commit($c);	
			oci_free_statement($sql_insert1a);
			echo '<div id="loading3" style="visibility:visible" align="center"><img src="images/others/ajax-loader.gif"/></div>';
			echo "<script>";
			echo "alert('Maklumat telah dikemaskini. <<The application has updated. >>');";
			echo "window.location.href='pkh_mps_sc007b_permohonan_dtl.php?no_staff=$no_staff&norujukanseq=$norujukseq&sesi=$sesi_ajar&semester=$semester&papar=$papar'";
			echo "</script>";
		}
		
		else
		{
			oci_rollback($c);	
			oci_free_statement($sql_insert1);
			
			echo '<div id="loading3" style="visibility:visible" align="center"><img src="images/others/ajax-loader.gif"/></div>';
			echo "<script>";
			echo "alert('Terdapat masalah dalam mengemaskini rekod, Sila cuba sekali lagi <<There is a problem, Please try again. >>');";
			echo "window.location.href='pkh_mps_sc006b_permohonan.php?no_staff=$no_staff&papar=$papar'";
			echo "</script>";
		}
	
	
	
	ocilogoff($c);
	}
	
function BatalPermohonan()
	{
	global $c;
	global $username;
	$str='';
	
	
	$no_staff = isset($_GET['no_staff'])?$_GET['no_staff']:'no_staff';
	if($no_staff == 'no_staff'){$no_staff = isset($_POST['no_staff'])?$_POST['no_staff']:'';}
	
	$norujukan = isset($_GET['norujukan'])?$_GET['norujukan']:'norujukan';
	if($norujukan == 'norujukan'){$norujukan = isset($_POST['norujukan'])?$_POST['norujukan']:'';}
	
	$status = isset($_GET['status'])?$_GET['status']:'status';
	if($status == 'status'){$status = isset($_POST['status'])?$_POST['status']:'';}
	
	$norujukanseq = isset($_GET['norujukanseq'])?$_GET['norujukanseq']:'norujukanseq';
	if($norujukanseq == 'norujukanseq'){$norujukanseq = isset($_POST['norujukanseq'])?$_POST['norujukanseq']:'';}
	
	$papar = isset($_GET['papar'])?$_GET['papar']:'papar';
	if($papar == 'papar'){$papar = isset($_POST['papar'])?$_POST['papar']:'';}
	
	if($status=='B')
	{
		$sql_delete = "DELETE SN_KH_PENGAJAR_HDR WHERE PSH_ID='".$no_staff."'
				   	   AND PSH_NORUJUK_PENGAJAR	='".$norujukan."'"; 
				//echo $sql_delete.'<br><br>';exit;
				//echo $sql_insert2.'<br><br>';exit;
				$sql_delete1a = oci_parse($c,$sql_delete);
				oci_execute($sql_delete1a,OCI_DEFAULT);	
				
		
		
			oci_commit($c);	
			oci_free_statement($sql_delete1a);
			echo '<div id="loading3" style="visibility:visible" align="center"><img src="images/others/ajax-loader.gif"/></div>';
			echo "<script>";
			echo "alert('Maklumat telah dikemaskini. <<The application has updated. >>');";
			echo "window.location.href='pkh_mps_sc005b_status.php?skrin=1&ukp=$no_staff&papar=$papar'";
			echo "</script>";
				
		
	}
	else
	{
		$sql_delete = "UPDATE SN_KH_PENGAJAR_HDR SET PSH_STATUS_POHON='C' 
					   WHERE PSH_ID='".$no_staff."'
				   	   AND PSH_NORUJUK_PENGAJAR	='".$norujukan."'"; 
				//echo $sql_delete.'<br><br>';exit;
				//echo $sql_insert2.'<br><br>';exit;
				$sql_delete1a = oci_parse($c,$sql_delete);
				oci_execute($sql_delete1a,OCI_DEFAULT);		
	}
	
	
	$sql_delete2 = "DELETE SN_KH_PENGAJAR_DTL WHERE PSD_ID='".$no_staff."'
				   	   AND PSD_NORUJUK_PENGAJAR	='".$norujukan."'"; 
				//echo $sql_delete.'<br><br>';exit;
				//echo $sql_insert2.'<br><br>';exit;
				$sql_delete2a = oci_parse($c,$sql_delete2);
				oci_execute($sql_delete2a,OCI_DEFAULT);	
	
	
		if(oci_num_rows($sql_delete1a) > 0)
		{
			oci_commit($c);	
			oci_free_statement($sql_delete1a);
			echo '<div id="loading3" style="visibility:visible" align="center"><img src="images/others/ajax-loader.gif"/></div>';
			echo "<script>";
			echo "alert('Maklumat telah dikemaskini. <<The application has updated. >>');";
			echo "window.location.href='pkh_mps_sc005b_status.php?skrin=2&ukp=$no_staff&papar=$papar'";
			echo "</script>";
		}
		
		else
		{
			oci_rollback($c);	
			oci_free_statement($sql_delete1a);
			
			echo '<div id="loading3" style="visibility:visible" align="center"><img src="images/others/ajax-loader.gif"/></div>';
			echo "<script>";
			echo "alert('Terdapat masalah dalam mengemaskini rekod, Sila cuba sekali lagi <<There is a problem, Please try again. >>');";
			echo "window.location.href='pkh_mps_sc005b_status.php?skrin=1&ukp=$no_staff&papar=$papar";
			echo "</script>";
		}
	
	
	
	ocilogoff($c);
	}

function SimpanMaklumatDetail()
	{
	global $c;
	global $username;
	$str='';
	
	
	$no_staff = isset($_GET['no_staff'])?$_GET['no_staff']:'no_staff';
	if($no_staff == 'no_staff'){$no_staff = isset($_POST['no_staff'])?$_POST['no_staff']:'';}
	
	$norujukanseq = isset($_GET['norujukanseq'])?$_GET['norujukanseq']:'norujukanseq';
	if($norujukanseq == 'norujukanseq'){$norujukanseq = isset($_POST['norujukanseq'])?$_POST['norujukanseq']:'';}
	
	$kodjbtadmin = isset($_GET['pilihanjabatan'])?$_GET['pilihanjabatan']:'pilihanjabatan';
	if ($kodjbtadmin == 'pilihanjabatan') {$kodjbtadmin = isset($_POST['pilihanjabatan'])?$_POST['pilihanjabatan']:'';}
	
	$flag = isset($_GET['flag'])?$_GET['flag']:'flag';
	if($flag == 'flag'){$flag = isset($_POST['flag'])?$_POST['flag']:'';}
	
	$pilihansemester = isset($_GET['pilihansemester'])?$_GET['pilihansemester']:'pilihansemester';
	if ($pilihansemester == 'pilihansemester') {$pilihansemester = isset($_POST['pilihansemester'])?$_POST['pilihansemester']:'';}
	
	$pilihansesi = isset($_GET['pilihansesi'])?$_GET['pilihansesi']:'pilihansesi';
	if ($pilihansesi == 'pilihansesi') {$pilihansesi = isset($_POST['pilihansesi'])?$_POST['pilihansesi']:'';}
	
	$pilihankursus = isset($_GET['pilihankursus'])?$_GET['pilihankursus']:'pilihankursus';
	if ($pilihankursus == 'pilihankursus') {$pilihankursus = isset($_POST['pilihankursus'])?$_POST['pilihankursus']:'';}
	
	
	$rbkuliah = isset($_GET['rbkuliah'])?$_GET['rbkuliah']:'rbkuliah';
	if ($rbkuliah == 'rbkuliah') {$rbkuliah = isset($_POST['rbkuliah'])?$_POST['rbkuliah']:'';}
	
	
	$rbtutorial = isset($_GET['rbtutorial'])?$_GET['rbtutorial']:'rbtutorial';
	if ($rbtutorial == 'rbtutorial') {$rbtutorial = isset($_POST['rbtutorial'])?$_POST['rbtutorial']:'';}
	
	$rbamali = isset($_GET['rbamali'])?$_GET['rbamali']:'rbamali';
	if ($rbamali == 'rbamali') {$rbamali = isset($_POST['rbamali'])?$_POST['rbamali']:'';}
	
	$rbsoalan = isset($_GET['rbsoalan'])?$_GET['rbsoalan']:'rbsoalan';
	if ($rbsoalan == 'rbsoalan') {$rbsoalan = isset($_POST['rbsoalan'])?$_POST['rbsoalan']:'';}
	
	$rbskrip = isset($_GET['rbskrip'])?$_GET['rbskrip']:'rbskrip';
	if ($rbskrip == 'rbskrip') {$rbskrip = isset($_POST['rbskrip'])?$_POST['rbskrip']:'';}
	
	$tarikhlulus = isset($_GET['datetimepicker_1'])?$_GET['datetimepicker_1']:'datetimepicker_1';
	if ($tarikhlulus == 'datetimepicker_1') {$tarikhlulus = isset($_POST['datetimepicker_1'])?$_POST['datetimepicker_1']:'';}
	
	$rbstatus= isset($_GET['rbstatus'])?$_GET['rbstatus']:'rbstatus';
	if ($rbstatus == 'rbstatus') {$rbstatus = isset($_POST['rbstatus'])?$_POST['rbstatus']:'';}
	
	$jammgu = isset($_GET['jammgu'])?$_GET['jammgu']:'jammgu';
	if ($jammgu == 'jammgu') {$jammgu = isset($_POST['jammgu'])?$_POST['jammgu']:'';}
	
	
	$jumsem = isset($_GET['jumsem'])?$_GET['jumsem']:'jumsem';
	if ($jumsem == 'jumsem') {$jumsem = isset($_POST['jumsem'])?$_POST['jumsem']:'';}
	
	$ulasan = isset($_GET['ulasan'])?$_GET['ulasan']:'ulasan';
	if ($ulasan == 'ulasan') {$ulasan = isset($_POST['ulasan'])?$_POST['ulasan']:'';}
	
	$papar = isset($_GET['papar'])?$_GET['papar']:'papar';
	if ($papar == 'papar') {$papar = isset($_POST['papar'])?$_POST['papar']:'';}
	
//	echo "$no_staff << $norujukan << $flag << $pilihansemester << $pilihansesi";
	
	
		
		$sql_insert1 = "INSERT INTO SN_KH_PENGAJAR_DTL
						(PSD_ID,
						PSD_JABATAN_AJAR,
						PSD_SESI, 
						PSD_SEM,
						PSD_KOD_KURSUS,
						PSD_KULIAH,
						PSD_TUTORIAL,
						PSD_AMALI,
						PSD_JAM_MINGGU,
						PSD_JAM_SEM,
						PSD_KERTAS_SOALAN,
						PSD_PERIKSA_SKRIP,
						PSD_STATUS_LULUS,
						PSD_TKH_LULUS,
						PSD_ALASAN,
						PSD_CREATED_BY,
						PSD_CREATED_DATE) 
						VALUES 					
						('".$no_staff."',
						'".$kodjbtadmin."',
						'".$pilihansesi."',
						'".$pilihansemester."',
						'".$pilihankursus."',
						'".$rbkuliah."',
						'".$rbtutorial."',
						'".$rbamali."',
						'".$jammgu."',
						'".$jumsem."',
						'".$rbsoalan."',
						'".$rbskrip."',
						'".$rbstatus."',
						to_date('".$tarikhlulus."','dd/mm/yyyy'),
						'".$ulasan."',
						'".$username."',
						sysdate)
					"; 
				//echo $sql_insert1.'<br><br>';exit;
				//echo $sql_insert2.'<br><br>';exit;
				$sql_insert1a = oci_parse($c,$sql_insert1);
				oci_execute($sql_insert1a,OCI_DEFAULT);
				

	
		if(oci_num_rows($sql_insert1a) > 0)
		{
			oci_commit($c);	
			oci_free_statement($sql_insert1a);
			echo '<div id="loading3" style="visibility:visible" align="center"><img src="images/others/ajax-loader.gif"/></div>';
			echo "<script>";
			echo "alert('Permohonan telah dikemaskini. <<The application has updated. >>');";
			echo "window.location.href='pkh_mps_sc008b_permohonan_dtl_kemaskini.php?no_staff=$no_staff&norujukanseq=$norujukanseq&flag=$flag&papar=$papar'";
			echo "</script>";
		}
		
		else
		{
			oci_rollback($c);	
			oci_free_statement($sql_insert1);
			
			echo '<div id="loading3" style="visibility:visible" align="center"><img src="images/others/ajax-loader.gif"/></div>';
			echo "<script>";
			echo "alert('Terdapat masalah dalam mengemaskini rekod, Sila cuba sekali lagi <<There is a problem, Please try again. >>');";
			echo "window.location.href='pkh_mps_sc008b_permohonan_dtl_kemaskini.php?no_staff=$no_staff&norujukanseq=$norujukanseq&flag=$flag&papar=$papar'";
			echo "</script>";
		}
	
	
	
	ocilogoff($c);
	}
	
function KemaskiniMaklumatDetail()
	{
	global $c;
	global $username;
	$str='';
	
	
	$no_staff = isset($_GET['no_staff'])?$_GET['no_staff']:'no_staff';
	if($no_staff == 'no_staff'){$no_staff = isset($_POST['no_staff'])?$_POST['no_staff']:'';}
	
	$norujukanseq = isset($_GET['norujukanseq'])?$_GET['norujukanseq']:'norujukanseq';
	if($norujukanseq == 'norujukanseq'){$norujukanseq = isset($_POST['norujukanseq'])?$_POST['norujukanseq']:'';}
	
	$kodjbtadmin = isset($_GET['pilihanjabatan'])?$_GET['pilihanjabatan']:'pilihanjabatan';
	if ($kodjbtadmin == 'pilihanjabatan') {$kodjbtadmin = isset($_POST['pilihanjabatan'])?$_POST['pilihanjabatan']:'';}
	
	$flag = isset($_GET['flag'])?$_GET['flag']:'flag';
	if($flag == 'flag'){$flag = isset($_POST['flag'])?$_POST['flag']:'';}
	
	$pilihansemester = isset($_GET['pilihansemester'])?$_GET['pilihansemester']:'pilihansemester';
	if ($pilihansemester == 'pilihansemester') {$pilihansemester = isset($_POST['pilihansemester'])?$_POST['pilihansemester']:'';}
	
	$pilihansesi = isset($_GET['pilihansesi'])?$_GET['pilihansesi']:'pilihansesi';
	if ($pilihansesi == 'pilihansesi') {$pilihansesi = isset($_POST['pilihansesi'])?$_POST['pilihansesi']:'';}
	
	$pilihankursus = isset($_GET['pilihankursus'])?$_GET['pilihankursus']:'pilihankursus';
	if ($pilihankursus == 'pilihankursus') {$pilihankursus = isset($_POST['pilihankursus'])?$_POST['pilihankursus']:'';}
	
	
	$rbkuliah = isset($_GET['rbkuliah'])?$_GET['rbkuliah']:'rbkuliah';
	if ($rbkuliah == 'rbkuliah') {$rbkuliah = isset($_POST['rbkuliah'])?$_POST['rbkuliah']:'';}
	
	
	$rbtutorial = isset($_GET['rbtutorial'])?$_GET['rbtutorial']:'rbtutorial';
	if ($rbtutorial == 'rbtutorial') {$rbtutorial = isset($_POST['rbtutorial'])?$_POST['rbtutorial']:'';}
	
	$rbamali = isset($_GET['rbamali'])?$_GET['rbamali']:'rbamali';
	if ($rbamali == 'rbamali') {$rbamali = isset($_POST['rbamali'])?$_POST['rbamali']:'';}
	
	$rbsoalan = isset($_GET['rbsoalan'])?$_GET['rbsoalan']:'rbsoalan';
	if ($rbsoalan == 'rbsoalan') {$rbsoalan = isset($_POST['rbsoalan'])?$_POST['rbsoalan']:'';}
	
	$rbskrip = isset($_GET['rbskrip'])?$_GET['rbskrip']:'rbskrip';
	if ($rbskrip == 'rbskrip') {$rbskrip = isset($_POST['rbskrip'])?$_POST['rbskrip']:'';}
	
	$tarikhlulus = isset($_GET['datetimepicker_1'])?$_GET['datetimepicker_1']:'datetimepicker_1';
	if ($tarikhlulus == 'datetimepicker_1') {$tarikhlulus = isset($_POST['datetimepicker_1'])?$_POST['datetimepicker_1']:'';}
	
	$rbstatus= isset($_GET['rbstatus'])?$_GET['rbstatus']:'rbstatus';
	if ($rbstatus == 'rbstatus') {$rbstatus = isset($_POST['rbstatus'])?$_POST['rbstatus']:'';}
	
	$jammgu = isset($_GET['jammgu'])?$_GET['jammgu']:'jammgu';
	if ($jammgu == 'jammgu') {$jammgu = isset($_POST['jammgu'])?$_POST['jammgu']:'';}
	
	
	$jumsem = isset($_GET['jumsem'])?$_GET['jumsem']:'jumsem';
	if ($jumsem == 'jumsem') {$jumsem = isset($_POST['jumsem'])?$_POST['jumsem']:'';}
	
	$ulasan = isset($_GET['ulasan'])?$_GET['ulasan']:'ulasan';
	if ($ulasan == 'ulasan') {$ulasan = isset($_POST['ulasan'])?$_POST['ulasan']:'';}
	
	$rowid = isset($_GET['rowid'])?$_GET['rowid']:'rowid';
	if ($rowid == 'rowid') {$rowid = isset($_POST['rowid'])?$_POST['rowid']:'';}
	
	$rowid=str_replace(" ","+",$rowid);
	
	
	$papar = isset($_GET['papar'])?$_GET['papar']:'papar';
	if ($papar == 'papar') {$papar = isset($_POST['papar'])?$_POST['papar']:'';}
	
	$sql_update = " UPDATE SN_KH_PENGAJAR_DTL SET 
					PSD_JABATAN_AJAR='".$kodjbtadmin."',
					PSD_SESI='".$pilihansesi."',
					PSD_SEM='".$pilihansemester."',
					PSD_KOD_KURSUS='".$pilihankursus."',
					PSD_KULIAH='".$rbkuliah."',
					PSD_TUTORIAL='".$rbtutorial."',
					PSD_AMALI='".$rbamali."',
					PSD_JAM_MINGGU='".$jammgu."',
					PSD_JAM_SEM='".$jumsem."',
					PSD_KERTAS_SOALAN='".$rbsoalan."',
					PSD_PERIKSA_SKRIP='".$rbskrip."',
					PSD_STATUS_LULUS='".$rbstatus."',
					PSD_TKH_LULUS=to_date('".$tarikhlulus."','dd Mon yyyy'),
					PSD_ALASAN='".$ulasan."',
					PSD_UPDATED_BY='".$username."',
					PSD_UPDATED_DATE=sysdate
					WHERE ROWID='".$rowid."'
					AND PSD_ID='".$no_staff."'
					"; 
				//echo $sql_update.'<br><br>';
				//echo $sql_insert2.'<br><br>';exit;
				$sql_update1a = oci_parse($c,$sql_update);
				oci_execute($sql_update1a,OCI_DEFAULT);
			
	
		if(oci_num_rows($sql_update1a) > 0)
		{
			//exit;
			oci_commit($c);	
			oci_free_statement($sql_update1a);
			echo '<div id="loading3" style="visibility:visible" align="center"><img src="images/others/ajax-loader.gif"/></div>';
			echo "<script>";
			echo "alert('Maklumat telah dikemaskini. <<The application has updated.>>');";
			echo "window.location.href='pkh_mps_sc008b_permohonan_dtl_kemaskini.php?no_staff=$no_staff&norujukanseq=$norujukanseq&flag=1&papar=$papar'";
			echo "</script>";
		}
		
		else
		{
			//exit;
			oci_rollback($c);	
			oci_free_statement($sql_update1a);
			
			echo '<div id="loading3" style="visibility:visible" align="center"><img src="images/others/ajax-loader.gif"/></div>';
			echo "<script>";
			echo "alert('Terdapat masalah dalam mengemaskini rekod, Sila cuba sekali lagi <<There is a problem, Please try again.>>');";
			echo "window.location.href='pkh_mps_sc008b_permohonan_dtl_kemaskini.php?no_staff=$no_staff&norujukanseq=$norujukanseq&flag=1&papar=$papar'";
			echo "</script>";
		}
		
	ocilogoff($c);
	}
	
function HapusMaklumatDetail()
	{
	global $c;
	global $username;
	$str='';
	
	
	$no_staff = isset($_GET['no_staff'])?$_GET['no_staff']:'no_staff';
	if($no_staff == 'no_staff'){$no_staff = isset($_POST['no_staff'])?$_POST['no_staff']:'';}
	
	$norujukanseq = isset($_GET['norujukanseq'])?$_GET['norujukanseq']:'norujukanseq';
	if($norujukanseq == 'norujukanseq'){$norujukanseq = isset($_POST['norujukanseq'])?$_POST['norujukanseq']:'';}
	
	$papar = isset($_GET['papar'])?$_GET['papar']:'papar';
	if($papar == 'papar'){$papar = isset($_POST['papar'])?$_POST['papar']:'';}
	
	$rowid = isset($_GET['rowid'])?$_GET['rowid']:'rowid';
	if ($rowid == 'rowid') {$rowid = isset($_POST['rowid'])?$_POST['rowid']:'';}
	
	$rowid=str_replace(" ","+",$rowid);
	
	$sql_delete = "DELETE SN_KH_PENGAJAR_DTL WHERE PSD_ID='".$no_staff."'
				   AND ROWID='".$rowid."'"; 
				//echo $sql_delete.'<br><br>';exit;
				//echo $sql_insert2.'<br><br>';exit;
				$sql_delete1a = oci_parse($c,$sql_delete);
				oci_execute($sql_delete1a,OCI_DEFAULT);
			
	
		if(oci_num_rows($sql_delete1a) > 0)
		{
			oci_commit($c);	
			oci_free_statement($sql_delete1a);
			echo '<div id="loading3" style="visibility:visible" align="center"><img src="images/others/ajax-loader.gif"/></div>';
			echo "<script>";
			echo "alert('Maklumat telah dikemaskini. <<The application has updated.>>');";
			echo "window.location.href='pkh_mps_sc008b_permohonan_dtl_kemaskini.php?no_staff=$no_staff&norujukanseq=$norujukanseq&flag=1&papar=$papar'";
			echo "</script>";
		}
		
		else
		{
			oci_rollback($c);	
			oci_free_statement($sql_delete1a);
			
			echo '<div id="loading3" style="visibility:visible" align="center"><img src="images/others/ajax-loader.gif"/></div>';
			echo "<script>";
			echo "alert('Terdapat masalah dalam mengemaskini rekod, Sila cuba sekali lagi <<There is a problem, Please try again.>>');";
			echo "window.location.href='pkh_mps_sc008b_permohonan_dtl_kemaskini.php?no_staff=$no_staff&norujukanseq=$norujukanseq&flag=1&papar=$papar'";
			echo "</script>";
		}
		
	ocilogoff($c);
	}

function HantarPermohonan($conn_oracle_status)
	{
	global $c;
	global $username;
	$str='';
	
	
	$no_staff = isset($_GET['no_staff'])?$_GET['no_staff']:'no_staff';
	if($no_staff == 'no_staff'){$no_staff = isset($_POST['no_staff'])?$_POST['no_staff']:'';}
//echo $conn_oracle_status.'<br><br>';
//echo $no_staff;exit;
	
	$norujukanseq = isset($_GET['norujukanseq'])?$_GET['norujukanseq']:'norujukanseq';
	if($norujukanseq == 'norujukanseq'){$norujukanseq = isset($_POST['norujukanseq'])?$_POST['norujukanseq']:'';}
	
	$papar = isset($_GET['papar'])?$_GET['papar']:'papar';
	if($papar == 'papar'){$papar = isset($_POST['papar'])?$_POST['papar']:'';}
	
	$tarikhmula_lantik= isset($_POST['datetimepicker_3'])?$_POST['datetimepicker_3']:'datetimepicker_3'; 
	if($tarikhmula_lantik == 'datetimepicker_3')$tarikhmula_lantik = isset($_GET['datetimepicker_3'])?$_GET['datetimepicker_3']:'';
	
	$tarikhtamat_lantik= isset($_POST['datetimepicker_4'])?$_POST['datetimepicker_4']:'datetimepicker_4'; 
	if($tarikhtamat_lantik == 'datetimepicker_4')$tarikhtamat_lantik = isset($_GET['datetimepicker_4'])?$_GET['datetimepicker_4']:'';
	
	////echo $tarikhmula_lantik.'<br>';
	//echo $tarikhtamat_lantik.'<<<br>'; exit;
	
	$Data1=MPS_Data::DataKetua($no_staff);
	$nopelulus1=$Data1['nopelulus1'];
	$nopelulus2=$Data1['nopelulus2'];
	
	$nostafkj=$nopelulus1;
	$dekan=$nopelulus2;
	
	$Data2= MPS_Data::DataStaff($no_staff);
	$nama=$Data2['nama'];
	

	if($no_staff!='')
	{
				$semakSql = "SELECT TWI_NOSTAF_KJ,TWI_NOSTAF_KPTJ,PSH_JABATAN_AJAR,PSH_NORUJUK_IKLAN,SUBSTR(PSH_JABATAN_AJAR,0,1) AS KOD_PTJ,
							 PSH_SESI,PSH_KOD_KURSUS,PSH_SEMESTER,PSH_KATEGORI_JAWATAN,PSH_NORUJUK_PENGAJAR, PSH_VERIFIED_STATUS
							 FROM SN_KH_PENGAJAR_HDR,SN_KH_TAWARAN_INFO
							 WHERE PSH_JABATAN_AJAR=TWI_JABATAN
							 AND PSH_SESI=TWI_SESI
							 AND PSH_KOD_KURSUS=TWI_KOD_KURSUS
							 AND PSH_SEMESTER=TWI_SEM
							 AND PSH_KATEGORI_JAWATAN=TWI_KATEGORI_JAWATAN
							 AND PSH_ID='".$no_staff."'
							 AND PSH_PERAKUAN IS NULL
							 AND PSH_KUMPULAN_SEQ='".$norujukanseq."'
							 ";
			//echo $semakSql;exit;
				$semakSql1a= ociparse($c,$semakSql);
				ociexecute($semakSql1a,OCI_DEFAULT);
				while (ocifetch($semakSql1a))
				{
					$nostafkjajar=ociresult($semakSql1a,"TWI_NOSTAF_KJ");
					$nostafkptjajar=ociresult($semakSql1a,"TWI_NOSTAF_KPTJ");
					$pshjabatan=ociresult($semakSql1a,"PSH_JABATAN_AJAR");
					$pshptj=ociresult($semakSql1a,"KOD_PTJ");
					$pshsesi=ociresult($semakSql1a,"PSH_SESI");
					$pshkodkursus=ociresult($semakSql1a,"PSH_KOD_KURSUS");
					$pshsemester=ociresult($semakSql1a,"PSH_SEMESTER");
					$pshkategorijawatan=ociresult($semakSql1a,"PSH_KATEGORI_JAWATAN");
					$norujukan=ociresult($semakSql1a,"PSH_NORUJUK_PENGAJAR");
					$norujukaniklan=ociresult($semakSql1a,"PSH_NORUJUK_IKLAN");
					$verify_status=ociresult($semakSql1a,"PSH_VERIFIED_STATUS");

					
					$sqldata4=" SELECT SUM(NVL(TWK_JAM_KULIAH,'0')+NVL(TWK_JAM_TUTORIAL,0)+NVL(TWK_JAM_AMALI,'0')) AS JUMJAM 
								FROM SN_KH_TAWARAN_KURSUS
							    WHERE TWK_JABATAN='".$pshjabatan."'
				                AND TWK_SESI='".$pshsesi."'
				                AND TWK_SEM='".$pshsemester."'
				                AND TWK_KOD_KURSUS='".$pshkodkursus."'
								AND TWK_KATEGORI_JAWATAN='".$pshkategorijawatan."'
								AND TWK_NORUJUK='".$norujukaniklan."'
								";
					//echo $sqldata4;
					$sqldata4a = OCIParse($c,$sqldata4);
					OCIExecute($sqldata4a,OCI_DEFAULT);
					if (OCIFetch($sqldata4a)){
					$jumJam = ociresult($sqldata4a,"JUMJAM");
					}
					
					if ($pshkategorijawatan=='E')
					{
					$sql_update2 = "UPDATE SN_KH_CALON_PENGAJAR 
				    SET CPG_TKH_LANTIK_MULA=to_date('".$tarikhmula_lantik."','dd Mon yyyy'),
					CPG_TKH_LANTIK_TAMAT=to_date('".$tarikhtamat_lantik."','dd Mon yyyy')
					WHERE CPG_NOKP='".$no_staff."'
					"; 
					//echo $sql_insert2.'<br><br>';
				//echo $sql_update2.'<br><br>';exit;
				$sql_update2a = oci_parse($c,$sql_update2);
				oci_execute($sql_update2a,OCI_DEFAULT);
				oci_commit($c);
				
					}
					
						
					if($nostafkjajar==$nostafkptjajar && $pshkategorijawatan!='E')
					{
						$status='A4';	
					}
					elseif ($pshkategorijawatan=='E' && $verify_status == 'Y')
					{
						$status='A';	
					}
					elseif ($pshkategorijawatan=='E' && $verify_status == 'T')
					{
						$status='R';	
					}
					elseif ($pshkategorijawatan=='E' && $verify_status == '')
					{
						$status='A5';	
					}
					else
					{
						$status='A3';	
					}
					
				//echo $status; exit;	
									
					$sql_insert2 = "UPDATE SN_KH_PENGAJAR_HDR 
				    SET PSH_NOSTAF_KJ='".$nostafkj."',
					PSH_NOSTAF_KPTJ='".$dekan."', 
					PSH_PERAKUAN='Y',
					PSH_JUM_BEBAN_AJAR='".$jumJam."',
					PSH_NOSTAF_KJ_AJAR='".$nostafkjajar."',
					PSH_NOSTAF_KPTJ_AJAR='".$nostafkptjajar."',
					PSH_TKH_PERAKUAN=SYSDATE,
					PSH_STATUS_POHON='".$status."'
					WHERE PSH_ID='".$no_staff."'
					AND PSH_JABATAN_AJAR='".$pshjabatan."'
					AND PSH_SESI='".$pshsesi."'
					AND PSH_KOD_KURSUS='".$pshkodkursus."'
					AND PSH_SEMESTER='".$pshsemester."'
					AND PSH_KATEGORI_JAWATAN='".$pshkategorijawatan."'
					AND PSH_PERAKUAN IS NULL
					AND PSH_NORUJUK_PENGAJAR='".$norujukan."' 
					"; 
					//echo $sql_insert2.'<br><br>';
				//echo $sql_insert2.'<br><br>';exit;
				$sql_insert2a = oci_parse($c,$sql_insert2);
				oci_execute($sql_insert2a,OCI_DEFAULT);
				oci_commit($c);
				//ocifreestatement($sql_insert2a);
				
				$BebanTugas = MPS_Data::BebanTugas($no_staff,$pshsesi,$pshsemester,$pshkodkursus,$pshkategorijawatan,$pshjabatan);
				$beban=$BebanTugas['beban'];
				
				$Data3=MPS_Data::Jabatan($pshjabatan);
				$ktrgn_jbt=$Data3['ktrgn_jbt'];
				
				        
				    
//echo $beban; exit;

				
				if ($pshkategorijawatan=="D") $jawatan = "DEMONSTRATOR"; 
				if ($pshkategorijawatan=="L") $jawatan = "PENSYARAH"; 
				if ($pshkategorijawatan=="T") $jawatan = "PENGAJAR";
				
				$ktrgnkodkursus=MPS_Data::KodKursus($pshkodkursus,$pshsesi,$pshsemester);
				
				//Pentadbir PTj 
				$sql_semak5 ="	SELECT ADM_NOSTAF
								FROM SN_KD_ADMIN_PTJ
								WHERE ADM_MODUL = 'MPS'
								AND ADM_ROLE = 'A'
								AND ADM_JNS_ROLE='B'
								AND ADM_AKTIF = 'Y'
								AND SYSDATE >= ADM_TKH_MULA
								AND SYSDATE <= ADM_TKH_TAMAT
								AND ADM_PTJ='".$pshptj."'
								";
				//echo $sql_semak5.'<br/>';	
				$sql_semak5a = OCIParse($c,$sql_semak5);
				OCIExecute($sql_semak5a,OCI_DEFAULT);
				if (OCIFetch($sql_semak5a))
					{
						$nostaff_ar = OCIResult($sql_semak5a,"ADM_NOSTAF");
					}
				else
					{
						$nostaff_ar = '';
					}
				oci_free_statement($sql_semak5a);
				
				$semakidAR = "SELECT NAMA_POHON,USERID_UMMAIL FROM SN_VW_ATT_STAFF WHERE NOGAJI_POHON='".$nostaff_ar."'" ;
				//echo $semakid;
				$semakidAR1= ociparse($c,$semakidAR);
				ociexecute($semakidAR1,OCI_DEFAULT);
				if (ocifetch($semakidAR1))
				{
					$namaar=ociresult($semakidAR1,"NAMA_POHON");
					$emailar=ociresult($semakidAR1,"USERID_UMMAIL");
				} 
				ocifreestatement($semakidAR1);
				
			
				
				//echo "$beban";exit;
				//echo $beban;
				//$beban=8;
				if($pshkategorijawatan!='E')
			
				{
					if($beban > 7)
					{
							$sql_update3 = " 	UPDATE SN_KH_PENGAJAR_HDR
												SET PSH_STATUS_POHON = 'D',
												PSH_PERAKUAN='Y',
												PSH_JUM_BEBAN_AJAR='".$jumJam."',
												PSH_NOSTAF_KJ_AJAR='".$nostafkjajar."',
												PSH_NOSTAF_KPTJ_AJAR='".$nostafkptjajar."',
												PSH_TKH_PERAKUAN=SYSDATE
												WHERE PSH_ID='".$no_staff."'
												AND PSH_JABATAN_AJAR='".$pshjabatan."'
												AND PSH_SESI='".$pshsesi."'
												AND PSH_KOD_KURSUS='".$pshkodkursus."'
												AND PSH_SEMESTER='".$pshsemester."'
												AND PSH_KATEGORI_JAWATAN='".$pshkategorijawatan."'
												AND PSH_NORUJUK_PENGAJAR='".$norujukan."'
												";
												
							//echo $sql_update3;exit;
							$sql_update3a = ociparse($c,$sql_update3);
							ociexecute($sql_update3a,OCI_DEFAULT);
							
							include('pkh_mps_sc009d_emel.php');
					
							$send_date = date('d/m/Y');
							$Mail->Mailer = "smtp";
							$Mail->Host	= "smtp1.um.edu.my";
							$Mail->FromName="Pentadbir Portal HRIS";
							//$Mail->From="c@um.edu.my";
							$Mail->SetFrom="ihris_admin@um.edu.my";
							$Mail->AddReplyTo ="ihris_admin@um.edu.my";
							$Mail->Subject = "Notifikasi Permohonan Pengajaran Sambilan";
							$body="
							Tarikh: $send_date<br><br>
					
							Tuan/Puan/Dr/Profesor,<br><br>
								
							Untuk perhatian/tindakan,<br><br>
								
							Permohonan Membuat Pengajaran Sambilan Di Luar Jabatan/Fakulti.<br><br>
								
							Adalah dimaklumkan bahawa pemohon ini telah memohon untuk membuat 
							Pengajaran Sambilan di luar jabatan/fakulti di Universiti Malaya<br><br>
								
							Nama : $nama <br>
							No.Staff : $no_staff<br>
							Jabatan yang dipohon : $ktrgn_jbt<br>
							Sesi : $pshsesi<br>
							Semester : $pshsemester<br>
							Jawatan Dipohon : $jawatan<br>
							Kod Subjek : $ktrgnkodkursus &nbsp; ($pshkodkursus)<br><br>
								
							Oleh yang demikian,mohon pihak Tuan/Puan/Dr/Profesor untuk membuat 
							pengesahan terhadap permohonan calon ini didalam 
							sistem portal ( https://ihris.um.edu.my/ ) di kategori Perkhidmatan&Saraan > Pengajaran Sambilan > 
							$ktrgn Dimana Tempat Pemohon Akan Mengajar.
							<br><br>
							Sekian, terima kasih.
							<br><br>
							Pentadbir<br>
							Sistem UMPortal (Staff e-Services)
							";  
							$Mail->Priority	= 1;
							$Mail->AddAddress("$emailar");
							//$Mail->AddCC("$emailar");
							
							$Mail->AltBody    = "To view the message, please use an HTML compatible email viewer!"; // optional, comment out and test
							$Mail->MsgHTML($body);
							
							
							if($Mail->Send()) {
							echo "OK";
							} else {
							echo "Error sending: " .$Mail->ErrorInfo;
							}
							
							if(oci_num_rows($sql_update3a) > 0)
							{
								oci_commit($c);	
								oci_free_statement($sql_update3a);
							
							echo "<script>";
							echo "alert('Permohonan telah dikemaskini. <<The application has updated. >>');";
							echo "window.location.href='pkh_mps_sc005b_status.php?pilihansesi=$pshsesi&ukp=$no_staff&papar=$papar'";
							echo "</script>";
								
									
							}
								
							else
							{
							oci_rollback($c);	
							oci_free_statement($sql_update3a);
							
							echo '<div id="loading3" style="visibility:visible" align="center"><img src="images/others/ajax-loader.gif"/></div>';
							echo "<script>";
							echo "alert('Terdapat masalah dalam mengemaskini rekod, Sila cuba sekali lagi <<There is a problem, Please try again. >>');";
							echo "window.location.href='pkh_mps_sc007b_permohonan_dtl.php?no_staff=$no_staff&norujukanseq=$norujukanseq&papar=$papar'";
							echo "</script>";
							}
							
												
						}
					else
					{
						
				
					
				$semakid = "SELECT NAMA_POHON,USERID_UMMAIL FROM SN_VW_ATT_STAFF WHERE NOGAJI_POHON='".$nostafkjajar."'" ;
				//echo $semakid;
				$semakidA= ociparse($c,$semakid);
				ociexecute($semakidA,OCI_DEFAULT);
				if (ocifetch($semakidA))
				{
					$namakj=ociresult($semakidA,"NAMA_POHON");
					$emailkj=ociresult($semakidA,"USERID_UMMAIL");
				} 
				ocifreestatement($semakidA);
				
				$semakdekan = "SELECT NAMA_POHON,USERID_UMMAIL FROM SN_VW_ATT_STAFF WHERE NOGAJI_POHON='".$nostafkptjajar."'" ;
				//echo $semakid;
				$semakdekan1a= ociparse($c,$semakdekan);
				ociexecute($semakdekan1a,OCI_DEFAULT);
				if (ocifetch($semakdekan1a))
				{
					$namadekan=ociresult($semakdekan1a,"NAMA_POHON");
					$emeldekan=ociresult($semakdekan1a,"USERID_UMMAIL");
				} 
				ocifreestatement($semakdekan1a);
				
				//echo $nostafkjajar;exit;
				if($nostafkjajar==$nostafkptjajar)
					{
						$emel=$emeldekan;	
						$ktrgn="Kebenaran KPTj (tempat ajar)";
					}
					else
					{
						$emel=$emailkj;
						$ktrgn="Kebenaran Ketua Jabatan (KJ) (tempat ajar)";
					}
	
				if ($conn_oracle_status == 'test')
				{
					$emel="lyynnda@um.edu.my"; 
					$emailar="lyynnda@um.edu.my";
					//$email_penyelia="lyynnda@um.edu.my";
					//$Mail->AddBCC("ihris@um.edu.my");
					//$emel_recipient="sharifahalia@um.edu.my";
				}
	
				
				include('pkh_mps_sc009d_emel.php');	
				$send_date = date('d/m/Y');
				$Mail->Mailer = "smtp";
				$Mail->Host	= "smtp1.um.edu.my";
				$Mail->FromName="Pentadbir Portal HRIS";
				//$Mail->From="c@um.edu.my";
				$Mail->SetFrom="ihris_admin@um.edu.my";
				$Mail->AddReplyTo ="ihris_admin@um.edu.my";
				$Mail->Subject = "Notifikasi Permohonan Pengajaran Sambilan";
				$body="
				Tarikh: $send_date<br><br>
		
				Tuan/Puan/Dr/Profesor,<br><br>
					
				Untuk perhatian/tindakan,<br><br>
					
				Permohonan Membuat Pengajaran Sambilan Di Luar Jabatan/Fakulti.<br><br>
					
				Adalah dimaklumkan bahawa pemohon ini telah memohon untuk membuat 
				Pengajaran Sambilan di luar jabatan/fakulti di Universiti Malaya<br><br>
					
				Nama : $nama <br>
				No.Staff : $no_staff<br>
				Jabatan yang dipohon : $ktrgn_jbt<br>
				Sesi : $pshsesi<br>
				Semester : $pshsemester<br>
				Jawatan Dipohon : $jawatan<br>
				Kod Subjek : $ktrgnkodkursus &nbsp; ($pshkodkursus)<br><br>
					
				Oleh yang demikian,mohon pihak Tuan/Puan/Dr/Profesor untuk membuat 
				pengesahan terhadap permohonan calon ini didalam 
				sistem portal ( https://ihris.um.edu.my/ ) di kategori Perkhidmatan&Saraan > Pengajaran Sambilan > 
				$ktrgn Dimana Tempat Pemohon Akan Mengajar.
				<br><br>
				Sekian, terima kasih.
				<br><br>
				Pentadbir<br>
				Sistem UMPortal (Staff e-Services)
				";  
				$Mail->Priority	= 1;
				$Mail->AddAddress("$emel");
				$Mail->AddCC("$emailar");
				
				$Mail->AltBody    = "To view the message, please use an HTML compatible email viewer!"; // optional, comment out and test
				$Mail->MsgHTML($body);
				
				
				
				
				if($Mail->Send()) {
				echo "OK";
				} else {
				echo "Error sending: " .$Mail->ErrorInfo;
				} 
				
				
				
				//exit;
				
				if(oci_num_rows($sql_insert2a) > 0)
				{
					oci_commit($c);	
					oci_free_statement($sql_insert2a);
				echo "<script>";
				echo "alert('Permohonan telah dikemaskini. <<The application has updated. >>');";
				echo "window.location.href='pkh_mps_sc005b_status.php?skrin=2&pilihansesi=$pshsesi&ukp=$no_staff&papar=$papar'";
				echo "</script>";
					
						
				}
					
				else
				{
				oci_rollback($c);	
				oci_free_statement($sql_insert2a);
				
				echo '<div id="loading3" style="visibility:visible" align="center"><img src="images/others/ajax-loader.gif"/></div>';
				echo "<script>";
				echo "alert('Terdapat masalah dalam mengemaskini rekod, Sila cuba sekali lagi <<There is a problem, Please try again. >>');";
				echo "window.location.href='pkh_mps_sc007b_permohonan_dtl.php?no_staff=$no_staff&norujukanseq=$norujukanseq&papar=$papar'";
				echo "</script>";
				}
			}
		
				}//tutup check $pshkategorijawatan!='E'
				elseif($pshkategorijawatan=='E')
				{echo "<script>";
				echo "alert('Permohonan telah dikemaskini. <<The application has updated. >>');";
				echo "window.location.href='pkh_mps_sc005b_status.php?skrin=2&pilihansesi=$pshsesi&ukp=$no_staff&papar=$papar'";
				echo "</script>";}
		}
	}
	
	elseif($namasmb!='')
	{
		$semakSql = "SELECT TWI_NOSTAF_KJ,TWI_NOSTAF_KPTJ,PSH_JABATAN_AJAR,
							 PSH_SESI,PSH_KOD_KURSUS,PSH_SEMESTER,PSH_KATEGORI_JAWATAN,
							 PSH_NORUJUK_IKLAN
							 FROM SN_KH_PENGAJAR_HDR,SN_KH_TAWARAN_INFO
							 WHERE PSH_JABATAN_AJAR=TWI_JABATAN
							 AND PSH_SESI=TWI_SESI
							 AND PSH_KOD_KURSUS=TWI_KOD_KURSUS
							 AND PSH_SEMESTER=TWI_SEM
							 AND PSH_KATEGORI_JAWATAN=TWI_KATEGORI_JAWATAN
							 AND PSH_ID='".$no_staff."'
							 AND PSH_PERAKUAN IS NULL";
			//echo $semakid;
				$semakSql1a= ociparse($c,$semakSql);
				ociexecute($semakSql1a,OCI_DEFAULT);
				while (ocifetch($semakSql1a))
				{
					$nostafkjajar=ociresult($semakSql1a,"TWI_NOSTAF_KJ");
					$nostafkptjajar=ociresult($semakSql1a,"TWI_NOSTAF_KPTJ");
					$pshjabatan=ociresult($semakSql1a,"PSH_JABATAN_AJAR");
					$pshsesi=ociresult($semakSql1a,"PSH_SESI");
					$pshkodkursus=ociresult($semakSql1a,"PSH_KOD_KURSUS");
					$pshsemester=ociresult($semakSql1a,"PSH_SEMESTER");
					$pshkategorijawatan=ociresult($semakSql1a,"PSH_KATEGORI_JAWATAN");
					$norujukaniklan=ociresult($semakSql1a,"PSH_NORUJUK_IKLAN");
					
					$sqldata4=" SELECT SUM(NVL(TWK_JAM_KULIAH,'0')+NVL(TWK_JAM_TUTORIAL,0)+NVL(TWK_JAM_AMALI,'0')) AS JUMJAM 
								FROM SN_KH_TAWARAN_KURSUS
							    WHERE TWK_JABATAN='".$pshjabatan."'
				                AND TWK_SESI='".$pshsesi."'
				                AND TWK_SEM='".$pshsemester."'
				                AND TWK_KOD_KURSUS='".$pshkodkursus."'
								AND TWK_KATEGORI_JAWATAN='".$pshkategorijawatan."'
								AND TWK_NORUJUK='".$norujukaniklan."'
								";
					//echo $sqldata4;
					$sqldata4a = OCIParse($c,$sqldata4);
					OCIExecute($sqldata4a,OCI_DEFAULT);
					if (OCIFetch($sqldata4a)){
					$jumJam = ociresult($sqldata4a,"JUMJAM");
					}
		
		
				$sql_insert2 = "UPDATE SN_KH_PENGAJAR_HDR 
				    SET PSH_NOSTAF_KJ='".$nostafkj."',
					PSH_NOSTAF_KPTJ='".$dekan."', 
					PSH_PERAKUAN='Y',
					PSH_JUM_BEBAN_AJAR='".$jumJam."',
					PSH_NOSTAF_KJ_AJAR='".$nostafkjajar."',
					PSH_NOSTAF_KPTJ_AJAR='".$nostafkptjajar."',
					PSH_TKH_PERAKUAN=SYSDATE,
					PSH_STATUS_POHON='A1'
					WHERE PSH_ID='".$no_staff."'
					AND PSH_JABATAN_AJAR='".$pshjabatan."'
					AND PSH_SESI='".$pshsesi."'
					AND PSH_KOD_KURSUS='".$pshkodkursus."'
					AND PSH_SEMESTER='".$pshsemester."'
					AND PSH_PERAKUAN IS NULL   
					"; 
					//echo $sql_insert2.'<br><br>';exit;
				//echo $sql_insert2.'<br><br>';exit;
				$sql_insert2a = oci_parse($c,$sql_insert2);
				oci_execute($sql_insert2a,OCI_DEFAULT);
				
				
				if(oci_num_rows($sql_insert2a) > 0)
					{
				oci_commit($c);	
				oci_free_statement($sql_insert2a);
				
				echo '<div id="loading3" style="visibility:visible" align="center"><img src="images/others/ajax-loader.gif"/></div>';
				
					echo "<script>";
			echo "alert('Permohonan telah dikemaskini. <<The application has updated. >>');";
			echo "window.location.href='pkh_mps_sc005b_status.php?pilihansesi=$pshsesi&ukp=$no_staff&papar=$papar'";
			echo "</script>";
				
					}
				
				else
					{
				oci_rollback($c);	
				oci_free_statement($sql_insert2a);
				
				echo '<div id="loading3" style="visibility:visible" align="center"><img src="images/others/ajax-loader.gif"/></div>';
				
				echo "<script>";
				echo "alert('Terdapat masalah dalam mengemaskini rekod, Sila cuba sekali lagi <<There is a problem, Please try again. >>');";
				echo "window.location.href='pkh_mps_sc005b_status.php?pilihansesi=$pshsesi&ukp=$no_staff&papar=$papar'";
				echo "</script>";
					}	
				}
		
	}
	
	$url_tasklist = '../../ihris/modul_adhoc/modul_task_list/';
	include($url_tasklist.'/include/class_senarai_tugas.php');
	
	//$no_staff=$nostaff;
	
	//echo PelulusKemaskiniTasklist::KiraPengajaranSambilanKJ($no_staff);
	//echo PelulusKemaskiniTasklist::KiraPengajaranSambilanKPTJ($n);
	echo PelulusKemaskiniTasklist::KiraPengajaranSambilanTempatAjarKJ($nostafkjajar);
	echo PelulusKemaskiniTasklist::KiraPengajaranSambilanTempatAjarKPTJ($nostafkptjajar);

	
	ocilogoff($c);
	}
	
function SahTawaran($conn_oracle_status)
	{
	global $c;
	global $username;
	$str='';
	
	
	$no_staff = isset($_GET['no_staff'])?$_GET['no_staff']:'no_staff';
	if($no_staff == 'no_staff'){$no_staff = isset($_POST['no_staff'])?$_POST['no_staff']:'';}
	
	$norujukan = isset($_GET['norujukan'])?$_GET['norujukan']:'norujukan';
	if($norujukan == 'norujukan'){$norujukan = isset($_POST['norujukan'])?$_POST['norujukan']:'';}
	
	$tarikhlapor = isset($_GET['datetimepicker_1'])?$_GET['datetimepicker_1']:'datetimepicker_1';
	if($tarikhlapor == 'datetimepicker_1'){$tarikhlapor = isset($_POST['datetimepicker_1'])?$_POST['datetimepicker_1']:'';}

	$tarikhlapor2 = isset($_GET['datetimepicker_3'])?$_GET['datetimepicker_3']:'datetimepicker_3';
	if($tarikhlapor2 == 'datetimepicker_3'){$tarikhlapor2 = isset($_POST['datetimepicker_3'])?$_POST['datetimepicker_3']:'';}
	
	$lradio = isset($_GET['lradio'])?$_GET['lradio']:'lradio';
	if($lradio == 'lradio'){$lradio = isset($_POST['lradio'])?$_POST['lradio']:'';}
    
    $kod_hono = isset($_GET['kod_hono'])?$_GET['kod_hono']:'kod_hono';
	if($kod_hono == 'kod_hono'){$kod_hono = isset($_POST['kod_hono'])?$_POST['kod_hono']:'';}
	
	$papar = isset($_GET['papar'])?$_GET['papar']:'papar';
	if($papar == 'papar'){$papar = isset($_POST['papar'])?$_POST['papar']:'';}

	if($tarikhlapor)
	{$tarikhlapor=$tarikhlapor;}
	else
	{$tarikhlapor=$tarikhlapor2;}
	
		
		$sql_update = " UPDATE SN_KH_PENGAJAR_HDR
						SET PSH_SAH_TERIMA='$lradio', 
                        PSH_HONORORIUM = '$kod_hono', 
						PSH_TKH_SAH_TERIMA=TO_DATE('".$tarikhlapor."','dd/mm/yyyy'),
						PSH_UPDATED_BY='".$no_staff."',
						PSH_UPDATED_DATE=SYSDATE
						WHERE PSH_ID='".$no_staff."' 
						AND PSH_NORUJUK_PENGAJAR='".$norujukan."'
					"; 
					//echo $sql_update.'<br><br>';exit;
				//echo $sql_insert2.'<br><br>';exit;
				$sql_update1a = oci_parse($c,$sql_update);
				oci_execute($sql_update1a,OCI_DEFAULT);
			

		$Data1=MPS_Data::DataPermohonanDetail($no_staff,$norujukan);
		$pilihansesi=$Data1['sesi'];
		$kategori_jwtn=$Data1['kategori_jwtn'];

			 $Data5 = MPS_Data::DataGRA($no_staff);
		     $nostaf_penyelia_ra = $Data5['nostaf_penyelia'];
		                $nokp_ra = $Data5['nokp'];
			      $kodstudent_ra = $Data5['kodstudent'];
						
		                  $Data4 = Api::PengajarSambilan($no_staff);
		   @$nostaf_penyelia_stud = $Data4['nostaf_penyelia_stud'];
		   		      @$nokp_stud = $Data4['nokp'];
		   	   @$kodstudent_stud = $Data4['kodstudent'];
					  
						   $Data6 = Api::PengajarSambilanPassport($no_staff);
				        @$nokp_for = $Data6['nokp'];
		     @$nostaf_penyelia_for = $Data6['nostaf_penyelia_stud'];
				  @$kodstudent_for = $Data6['kodstudent'];

		   
		   if($nokp_ra)
		   {$nostaf_penyelia=$nostaf_penyelia_ra;
		   $kod_student=$kodstudent_ra;}
		   elseif($nokp_stud)
		   {$nostaf_penyelia=$nostaf_penyelia_stud;
		   $kod_student=$kodstudent_stud;}
		   elseif($nokp_for)
		   {$nostaf_penyelia=$nostaf_penyelia_for;
		   $kod_student=$kodstudent_for;}
		
		if(oci_num_rows($sql_update1a) > 0)
		{
			//exit;
			
			oci_commit($c);	
			oci_free_statement($sql_update1a);
			
			
			
			
			
			if(@$nostaf_penyelia && $kategori_jwtn!='E')
			{
					if ($conn_oracle_status == 'test')
					{
						$emel="lyynnda@um.edu.my"; 
						$emailar="lyynnda@um.edu.my";
						//$email_penyelia="lyynnda@um.edu.my";
						//$Mail->AddBCC("ihris@um.edu.my");
						//$emel_recipient="sharifahalia@um.edu.my";
					}	
					
			$Data3=MPS_Data::Jabatan($pshjabatan);
				$ktrgn_jbt=$Data3['ktrgn_jbt'];
				$ktrgnptj2=$Data5['ktrgn_ptj2'];		
				
			echo EmailPenyelia($kod_student,$nostaf_penyelia,$conn_oracle_status,$nama,$no_staff,$ktrgn_jbt,$pshsesi,$pshsemester,$jawatan,$ktrgnkodkursus,$pshkodkursus,$emel,$emailar,$ktrgnptj2);
			}
			
			
			echo '<div id="loading3" style="visibility:visible" align="center"><img src="images/others/ajax-loader.gif"/></div>';
			echo '<form id="DataForm" name="DataForm" action="pkh_mps_sc005b_status.php?ukp='.$no_staff.'&pilihansesi='.$pilihansesi.'&papar='.$papar.'&skrin=2" method="post">';
			echo '</form>';
			echo '<script>';
			echo "alert('Maklumat Telah Disimpan');";
			echo 'document.getElementById(\'DataForm\').submit();'; 
			echo '</script>';
			
			//exit;
		}
		
		else
		{
			oci_rollback($c);	
			oci_free_statement($sql_update1a);
			
			
			echo '<div id="loading3" style="visibility:visible" align="center"><img src="images/others/ajax-loader.gif"/></div>';
			echo '<form id="DataForm" name="DataForm" action="pkh_mps_sc010b_sah_pengesahan.php?no_staff='.$no_staff.'&pilihansesi='.$pilihansesi.'&papar='.$papar.'&skrin=2" method="post">';
			echo '</form>';
			echo '<script>';
			echo "alert('Terdapat masalah dalam mengemaskini rekod, Sila cuba sekali lagi <<There is a problem, Please try again. >>');";
			echo 'document.getElementById(\'DataForm\').submit();'; 
			echo '</script>';
			
			
		}
	
	
	
	ocilogoff($c);
	}
	
function EmailPenyelia($kod_student,$nostaf_penyelia,$conn_oracle_status,$nama,$no_staff,$ktrgn_jbt,$pshsesi,$pshsemester,$jawatan,$ktrgnkodkursus,$pshkodkursus,$emel,$emailar,$ktrgnptj2)
{
	
	global $c;
	global $username;
	$str='';	
	
		include('pkh_mps_sc009d_emel.php');
			
	
			     
		   
		  // echo $nostaf_penyelia.'<br><br>';exit;
		   
		   
		   		
			$semak1 = "SELECT NAMA_POHON,USERID_UMMAIL FROM SN_VW_ATT_STAFF WHERE NOGAJI_POHON='".$nostaf_penyelia."'" ;
			//echo $semak1;exit;
			$semak1a= ociparse($c,$semak1);
			ociexecute($semak1a,OCI_DEFAULT);
			if (ocifetch($semak1a))
			{
				$nama_penyelia=ociresult($semak1a,"NAMA_POHON");
				$email_penyelia=ociresult($semak1a,"USERID_UMMAIL");
			} 
			ocifreestatement($semak1a);		
			
				if ($conn_oracle_status == 'test')
			{
				
				$email_penyelia='lyynnda@um.edu.my';
				//$Mail->AddBCC("ihris@um.edu.my");
				//$emel_recipient="sharifahalia@um.edu.my";
			}
			
			$send_date = date('d/m/Y');
			$Mail->Mailer = "smtp";
			$Mail->Host	= "smtp1.um.edu.my";
			$Mail->FromName="Pentadbir Portal HRIS";
			//$Mail->From="c@um.edu.my";
			$Mail->SetFrom="ihris_admin@um.edu.my";
			$Mail->AddReplyTo ="ihris_admin@um.edu.my";
			$Mail->Subject = "UM Graduate Teaching Assistantship Scheme (GTA)";
			$body="
			Date: $send_date<br><br>
	
			Dear Sir/Madam,<br><br>
				
			Untuk perhatian/tindakan,<br><br>
				
			Please be informed that your supervisee, $nama (Matrics No: $kod_student) has applied for the Graduate Teaching Assistantship Scheme (GTA) 
			at the Faculty of $ktrgnptj2 for Semester $pshsemester, Academic Session $pshsesi.<br><br>
				
			Thank you.<br><br>
			Administrator<br>
			UM Graduate Teaching Assistantship Scheme (GTA)
			";  
			$Mail->Priority	= 1;
			$Mail->AddAddress("$email_penyelia");
			//$Mail->AddCC("$emailar");
			
			$Mail->AltBody    = "To view the message, please use an HTML compatible email viewer!"; // optional, comment out and test
			$Mail->MsgHTML($body);	
			if($Mail->Send()) {
			echo "OK2";
			} else {
			echo "Error sending: " .$Mail->ErrorInfo;
			} 

ocilogoff($c);
}

/*******************************************************/




?>




