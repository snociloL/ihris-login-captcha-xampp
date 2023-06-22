<?php
session_start();
?>
<?
	include('conn/conn_rcis.php');
	
	$nostaf_admin  = $_POST['nostaf_admin'];
	$flag  = $_POST['flag'];
	$kod_negara  = $_POST['warganegara'];
	$no_ic_new  = $_POST['nokad_new'];
	$no_ic_old  = $_POST['nokad_old'];
	$no_passport  = $_POST['nokad2'];
	$sah  = $_POST['sah'];
	$gelaran  = $_POST['gelaran']; 
	$namasblm  = $_POST['nama']; 
	$nama =  str_replace("'","''", $namasblm);
	$user_dob  = $_POST['birthdate'];
	$user_emel  = $_POST['alamatemel'];
	$mini  = $_POST['mini'];
	$idnama= $_POST['userid'];
	$katalaluan= $_POST['password'];
	$ali=0;
	
	if($no_passport != "") {$user_pass_valid = $no_passport; }
	if($no_ic_old != "") {$user_pass_valid = $no_ic_old;}
	if($no_ic_new != "") {$user_pass_valid = $no_ic_new; } 
	
	//calculate age
	$d_trk = explode("/",$user_dob);
	$d_now = explode("/",date("d/m/Y"));  
	if($user_dob != ""){
	if($d_now[2] > $d_trk[2]){
	if($d_now[1] > $d_trk[1]){
	if($d_now[0] >= $d_trk[0])
	$umur = $d_now[2] - $d_trk[2];
	else
	$umur = $d_now[2] - $d_trk[2] - 1;
	}else
	$umur = $d_now[2] - $d_trk[2] - 1;
	}else
	$umur = 0;
	}

	$captcha = isset($_GET['captcha'])?$_GET['captcha']:'captcha';
	if ( $captcha == 'captcha' ){
		$captcha = isset($_POST['captcha'])?$_POST['captcha']:'';
		// Validation: Checking entered captcha code with the generated captcha code
		if(strcmp($_SESSION['captcha'], $_POST['captcha']) != 0){
		// Note: the captcha code is compared case insensitively.
		// if you want case sensitive match, check above with strcmp()
		echo '<script language="javascript" type="text/javascript">
		alert ("Kod Captcha yang dimasukkan tidak sama!\n\nEntered captcha code does not match! ");
		window.location.href ="daftarbaru_bknstaf.php";
		</script>';	
		
		}else{
		$status = "<p style='color:#FFFFFF; font-size:20px'>
		<span style='background-color:#46ab4a;'>Your captcha code is match.</span>
		</p>";	
		echo($status);
		if ($umur <= 17){ 
			$ali++;
			?>
			<script language="JavaScript">
			alert ("Hanya 18 Tahun ke atas sahaja dibenarkan memohon Pengajaran Sambilan");
			window.location.href="daftarbaru_bknstaf.php?flag=<?php echo $flag?>&nostaf_admin=<?php echo $nostaf_admin?>";
			</script>
			<? 	}
			
			$s1 = OCIParse($r, $check="select distinct cpg_nokp from sn_kh_calon_pengajar where cpg_nokp = '$user_pass_valid' ");
			//echo $check;
			//exit;
			OCIExecute($s1, OCI_DEFAULT);
			while (OCIFetch($s1)){
			$NOKP=OCIResult($s1,"CPG_NOKP");
			}
			
			$s5 = OCIParse($r, $check5="select distinct cpg_kplama from sn_kh_calon_pengajar where  cpg_kplama = '$user_pass_valid'");
			//echo $check5;
			//exit;
			OCIExecute($s5, OCI_DEFAULT);
			while (OCIFetch($s5)){
			$KPLAMA=OCIResult($s5,"CPG_KPLAMA");
			}
			
			$s6 = OCIParse($r, $check6="select distinct cpg_norujuk_pas from sn_kh_calon_pengajar where cpg_norujuk_pas = '$user_pass_valid'");
			//echo $check6;
			//exit;
			OCIExecute($s6, OCI_DEFAULT);
			while (OCIFetch($s6)){
			$PASSPORT=OCIResult($s6,"CPG_NORUJUK_PAS");
			}
			
			
			$s3 = OCIParse($r, $check3="select distinct CPG_EMEL from sn_kh_calon_pengajar where CPG_EMEL = '$user_emel'");
			OCIExecute($s3, OCI_DEFAULT);
			while (OCIFetch($s3)){
			$CPG_EMEL=OCIResult($s3,"CPG_EMEL");
			}
			
			$s4 = OCIParse($r, $check4="select distinct BIO_IC_BARU from SN_PA_BIODATA, SN_KD_STAT_STAF 
			where BIO_IC_BARU = '$user_pass_valid' 
			and BIO_STATUS_STAF=STS_KOD_STATUS
			and STS_AKTIF='Y' ");
			OCIExecute($s4, OCI_DEFAULT);
			while (OCIFetch($s4)){
			$BIO_IC_BARU=OCIResult($s4,"BIO_IC_BARU"); 
			}
			?>
			<? //semakan pendaftaran 
			if ($NOKP) {
			$ali++;
			?>
			<script language="JavaScript">
			alert ("No. ID Pengguna (No.Kad Pengenalan Baru) telah digunakan. Pendaftaran gagal.");
			window.location.href="daftarbaru_bknstaf.php?flag=<?php echo $flag?>&nostaf_admin=<?php echo $nostaf_admin?>";
			</script>
			<? } else if ($KPLAMA) { 
			$ali++;
			?>
			<script language="JavaScript">
			alert ("No. ID Pengguna (No.Kad Pengenalan Lama/Polis/Tentera) telah digunakan. Pendaftaran gagal.");
			window.location.href="daftarbaru_bknstaf.php?flag=<?php echo $flag?>&nostaf_admin=<?php echo $nostaf_admin?>";
			</script>
			<? } else if ($PASSPORT) {
			$ali++;
			?>
			<script language="JavaScript">
			alert ("No. ID Pengguna (No.Passport) telah digunakan. Pendaftaran gagal.");
			window.location.href="daftarbaru_bknstaf.php?flag=<?php echo $flag?>&nostaf_admin=<?php echo $nostaf_admin?>";
			</script>	
			<? } else if ($CPG_EMEL) { 
			$ali++;
			?>
			<script language="JavaScript">
			alert ("Alamat e-mel sudah digunakan, sila gunakan alamat e-mel lain.");
			window.location.href="daftarbaru_bknstaf.php?flag=<?php echo $flag?>&nostaf_admin=<?php echo $nostaf_admin?>";
			</script>
			<? } else if ($BIO_IC_BARU) {
			$ali++;
			?>
			<script language="JavaScript">
			alert ("Staf Universiti Malaya tidak dibenarkan memohon sebagai calon luar. Sila login menggunakan Sistem e-Recruitment Staf.");
			window.location.href="daftarbaru_bknstaf.php?flag=<?php echo $flag?>&nostaf_admin=<?php echo $nostaf_admin?>";
			</script>	
			<? } else { ?>
			<?
			
			if($ali==0)
			{
			$s2 = OCIParse($r, $insert_daftar="INSERT INTO SN_KH_CALON_PENGAJAR(CPG_NOKP, CPG_NORUJUK_PAS, CPG_KPLAMA, CPG_NAMA, CPG_GELARAN, CPG_EMEL, CPG_WARGANEGARA, CPG_TKH_LAHIR, CPG_CREATED_BY, CPG_CREATED_DATE,CPG_KELULUSAN_MAX) 
			VALUES ('$user_pass_valid', '$no_passport', '$no_ic_old','$nama', '$gelaran', '$user_emel', '$kod_negara', to_date('$user_dob','dd/mm/yyyy'),'$user_pass_valid',sysdate,'$mini')"); 
				//echo $insert_daftar; //exit;
				$result = OCI_Execute($s2, OCI_DEFAULT);
				if($result==FALSE)
				{
					echo "<script>alert('Terdapat masalah dalam memasukkan rekod anda, sila masukkan data yang betul.');";
					echo "window.location.href='daftarbaru_bknstaf.php?flag=<?php echo $flag?>&nostaf_admin=<?php echo $nostaf_admin?>'; </script>";
					exit;
				}
				OCICommit($r);
				
				
			$sql_semak1	=	"SELECT COUNT(MLI_KP) AS KIRA FROM SN_KH_PENGAJAR_LOG
							 WHERE MLI_KP='".$user_pass_valid."'
								";
			//echo $sql_semak1.'<br/><br/>';		
			$sql_semak1a = oci_parse($r,$sql_semak1);
			oci_execute($sql_semak1a,OCI_DEFAULT);
			if(oci_fetch($sql_semak1a))
			{
				$bil_1 = oci_result($sql_semak1a,"KIRA");
			}
			oci_free_statement($sql_semak1a);
			
			if($bil_1=='0')
			{
				$sql_insert1 ="INSERT INTO SN_KH_PENGAJAR_LOG 
							  (MLI_KP,MLI_NAMA,MLI_EMEL,MLI_KATALALUAN,MLI_STATUS,MLI_CREATED_BY,MLI_CREATED_DATE)
							  VALUES('".$user_pass_valid."','".$idnama."','".$user_emel."','".$katalaluan."','Y','".$user_pass_valid."',SYSDATE)
							 ";					
				
			}
			else
			{
				$sql_insert1 ="UPDATE SN_KH_PENGAJAR_LOG SET 
							   MLI_NAMA='".$idnama."',MLI_KATALALUAN='".$katalaluan."',MLI_UPDATED_BY='".$user_pass_valid."',MLI_UPDATED_DATE=SYSDATE
							   WHERE MLI_KP='".$user_pass_valid."'
							  ";
				
			}
			//echo $sql_insert1;exit;
			$sql_insert1a = ociparse($r,$sql_insert1);
			ociexecute($sql_insert1a,OCI_DEFAULT);
			ocicommit($r);
			OCILogOff($r);
				
			}
			?>
			<script language="JavaScript" type="text/javascript">
			//alert('Pendaftaran anda berjaya. Sila guna No.Kad Pengenalan Baru/Lama/Polis/Tentera untuk login ke dalam sistem.');
			alert('Pendaftaran anda berjaya. Sila login.');
			window.location.href='daftarbaru_bknstaf.php?flag=<?php echo $flag?>&nostaf_admin=<?php echo $nostaf_admin?>';
			</script>
			<? 
			}
			}
		}
	?>