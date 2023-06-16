<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "https://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="https://www.w3.org/1999/xhtml">




<head>
<link rel="stylesheet" type="text/css" href="style/style.css" />
</head>

<body>
<?php

include("conn_oracle.php");

session_start();
	
	$username = $_SESSION['MM_Username'];
	
		 $qry = 	OCIParse($c,"select sta_nostaf from sn_login where sta_id_pengguna='$username' and sta_aktif='Y' ");
    				OCIExecute($qry,OCI_DEFAULT);
     			if (OCIFetch($qry)){
 	 $nostaff = ociresult($qry,"STA_NOSTAF");
     }


$arrStr = explode("/", $_SERVER['SCRIPT_NAME'] );
$arrStr = array_reverse($arrStr );
$rest = substr("$arrStr[0]", 0, 50);

//echo $rest;

$dir_main01 = 'Cuti Staf';
$dir_main02 = 'Maklumat Staf';									$dir_main02_url = 'index_makl_staf.php';
$dir_main03 = 'Penilaian Prestasi Tahunan';						$dir_main03_url = 'index_ppt.php';
$dir_main04 = 'Perkhidmatan Dan Saraan';
$dir_main05 = 'Latihan Dan Perkembangan Staf';
$dir_main06 = 'E-Displin Staf';
$dir_main07 = 'E-Attendance Staf';
$dir_main08 = 'Perubatan';
$dir_main09 = 'Tuntutan Staf';
$dir_main10 = 'Perisytiharan Harta';							$dir_main10_url = 'index_harta.php';
$dir_main11 = 'Perlantikan';

$dir_group01 = 'Cuti Tahunan';									$dir_group01_url = 'index_ct_tahunan.php';
$dir_group02 = 'Cuti Persidangan';								$dir_group02_url = 'index_ct_persidangan.php';
$dir_group03 = 'Cuti Penyelidikan';								$dir_group03_url = 'index_ct_penyelidikan.php';
$dir_group04 = 'Cuti Sabatikal';								$dir_group04_url = 'index_ct_sabatikal.php';
$dir_group05 = 'Cuti Rekod Tidak Hadir';						$dir_group05_url = 'index_xhadir_kerja.php';
$dir_group06 = 'Cuti Cuti Kehadapan & GCR';						$dir_group06_url = 'index_ct_gcr.php';
$dir_group07 = 'Cuti Haji';										$dir_group07_url = 'index_cuti_haji.php';
$dir_group08 = 'Pengajaran Sambilan';							$dir_group08_url = 'index_pengajaran_sambilan.php';
$dir_group09 = 'Kenaikan Pangkat Akademik';						$dir_group09_url = 'index_pangkat.php';
$dir_group10 = 'Kenaikan Pangkat Bukan Akademik';				$dir_group10_url = 'index_bkn_pangkat.php';
$dir_group11 = 'Pertukaran Perlantikan Pemberian Opsyen)';		$dir_group11_url = 'index_opsyen.php';
$dir_group12 = 'Penilaian 360°';								$dir_group12_url = 'index_rakansekerja.php';
$dir_group13 = 'Kursus Dalaman';								$dir_group13_url = 'index_kurDalaman.php';
$dir_group14 = 'Peperiksaan Perkhidmatan';						$dir_group14_url = 'index_peperiksaan.php';
$dir_group15 = 'SLAB/SLAI/HLCB Pemantauan';						$dir_group15_url = 'index_pemantauan.php';
$dir_group16 = 'SLAB/SLAI/HLCB Perlanjutan';					$dir_group16_url = 'index_ssh_menu.php';
$dir_group17 = 'Pengurusan Staf Bermasalah';					$dir_group17_url = 'index_staf_masalah.php';
$dir_group18 = 'Staf Hadir Lewat';								$dir_group18_url = 'index_hdr_lewat.php';
$dir_group19 = 'Pengesahan Kerja Lebihmasa';					$dir_group19_url = 'index_pengesahan_ot_menu.php';
$dir_group20 = 'Rekod Kehadiran Staf';							$dir_group20_url = 'index_attendance_staff.php';
$dir_group21 = 'Senarai Klinik Panel';							$dir_group21_url = '.php';
$dir_group22 = 'Tukar Klinik Panel';							$dir_group22_url = '.php';
$dir_group23 = 'Rawatan Perubatan Ibu Bapa';					$dir_group23_url = '.php';
$dir_group24 = 'Permohonan Tuntutan Pergigian';					$dir_group24_url = '.php';
$dir_group25 = 'Wang Pendahuluan';								$dir_group25_url = 'index_wpd.php';
$dir_group26 = 'Tuntutan Kerja Lebih Masa';						$dir_group26_url = 'index_overtime.php';
$dir_group27 = 'Tuntutan Pengajaran Sambilan';					$dir_group27_url = 'index_pengSambilan.php';
$dir_group28 = 'Tuntutan Perjalanan Dalam/ Luar Negeri';		$dir_group28_url = 'index_tunDlmNeg.php';
$dir_group29 = 'Perlantikan Akademik';							$dir_group29_url = 'index_perlantikan_akademik.php';
$dir_group30 = 'Perlantikan Bukan Akademik';					$dir_group30_url = 'index_perlantikan_bukan_akademik.php';
$dir_group31 = 'Perlantikan (Lapor Diri)';						$dir_group31_url = 'index_lapordiri.php';







switch ($rest) {

   case "index.php" :
   break;

   case "index_ct_tahunan.php" :
   $dir_main = " -> ".$dir_main01;
   $dir_group = " -> ".$dir_group01;  
   $dir_group_url = $dir_group01_url;
   break;

   case "index_ct_persidangan.php" :
   $dir_main = " -> ".$dir_main01;
   $dir_group = " -> ".$dir_group02;  
   $dir_group_url = $dir_group02_ur1;
   break;
   
   case "index_ct_penyelidikan.php" :
   $dir_main = " -> ".$dir_main01;
   $dir_group = " -> ".$dir_group03;  
   $dir_group_url = $dir_group03_ur1;
   break;
   
   case "index_ct_sabatikal.php" :
   $dir_main = " -> ".$dir_main01;
   $dir_group = " -> ".$dir_group04;  
   $dir_group_url = $dir_group04_ur1;
   break; 
   
   case 'index_xhadir_kerja.php' :
   $dir_main = " -> ".$dir_main01;
   $dir_group = " -> ".$dir_group05;  
   $dir_group_url = $dir_group05_ur1;
   break; 
   
   case 'index_ct_gcr.php' :
   $dir_main = " -> ".$dir_main01;
   $dir_group = " -> ".$dir_group06;  
   $dir_group_url = $dir_group06_ur1;
   break;
   
   case 'index_cuti_haji.php' :
   $dir_main = " -> ".$dir_main01;
   $dir_group = " -> ".$dir_group07;  
   $dir_group_url = $dir_group07_ur1;
   break;
   
   case 'index_makl_staf.php' :
   $dir_main = " -> ".$dir_main02;
   //$dir_group = " -> ".$dir_group;  
   $dir_group_url = $dir_main02_ur1;
   break;
   
   case 'index_ppt.php' :
   $dir_main = " -> ".$dir_main03;
   //$dir_group = " -> ".$dir_group;  
   $dir_group_url = $dir_main03_ur1;
   break;
   
   case 'index_ppt.php' :
   $dir_main = " -> ".$dir_main03;
   //$dir_group = " -> ".$dir_group;  
   $dir_group_url = $dir_main03_ur1;
   break;
   
   case 'index_pengajaran_sambilan.php' :
   $dir_main = " -> ".$dir_main04;
   $dir_group = " -> ".$dir_group08;  
   $dir_group_url = $dir_group08_ur1;
   break;
   
   case 'index_pangkat.php' :
   $dir_main = " -> ".$dir_main04;
   $dir_group = " -> ".$dir_group09;  
   $dir_group_url = $dir_group09_ur1;
   break;
   
   case 'index_bkn_pangkat.php' :
   $dir_main = " -> ".$dir_main04;
   $dir_group = " -> ".$dir_group10;  
   $dir_group_url = $dir_group10_ur1;
   break;
   
   case 'index_opsyen.php' :
   $dir_main = " -> ".$dir_main04;
   $dir_group = " -> ".$dir_group11;  
   $dir_group_url = $dir_group11_ur1;
   break;
   
   case 'index_rakansekerja.php' :
   $dir_main = " -> ".$dir_main04;
   $dir_group = " -> ".$dir_group12;  
   $dir_group_url = $dir_group12_ur1;
   break;
   
   case 'index_kurDalaman.php' :
   $dir_main = " -> ".$dir_main05;
   $dir_group = " -> ".$dir_group13;  
   $dir_group_url = $dir_group13_ur1;
   break;
   
   case 'index_peperiksaan.php' :
   $dir_main = " -> ".$dir_main05;
   $dir_group = " -> ".$dir_group14;  
   $dir_group_url = $dir_group14_ur1;
   break;
    
   case 'index_pemantauan.php' :
   $dir_main = " -> ".$dir_main05;
   $dir_group = " -> ".$dir_group15;  
   $dir_group_url = $dir_group15_ur1;
   break;
   
   case 'index_ssh_menu.php' :
   $dir_main = " -> ".$dir_main05;
   $dir_group = " -> ".$dir_group16;  
   $dir_group_url = $dir_group16_ur1;
   break;
   
   case 'index_staf_masalah.php' :
   $dir_main = " -> ".$dir_main06;
   $dir_group = " -> ".$dir_group17;  
   $dir_group_url = $dir_group17_ur1;
   break;
   
   case 'index_hdr_lewat.php' :
   $dir_main = " -> ".$dir_main06;
   $dir_group = " -> ".$dir_group18;  
   $dir_group_url = $dir_group18_ur1;
   break;
   
   case "index_pengesahan_ot_menu.php" :
   $dir_main = " -> ".$dir_main07;
   $dir_group = " -> ".$dir_group19;  
   $dir_group_url = $dir_group19_ur1;
   break;
   
   case "index_attendance_staff.php" :
   $dir_main = " -> ".$dir_main07;
   $dir_group = " -> ".$dir_group20;  
   $dir_group_url = $dir_group20_ur1;
   break;
   
   case "index_wpd.php" :
   $dir_main = " -> ".$dir_main09;
   $dir_group = " -> ".$dir_group25;  
   $dir_group_url = $dir_group25_ur1;
   break;
   
   case "index_overtime.php" :
   $dir_main = " -> ".$dir_main09;
   $dir_group = " -> ".$dir_group26;  
   $dir_group_url = $dir_group26_ur1;
   break;
   
   case "index_pengSambilan.php" :
   $dir_main = " -> ".$dir_main09;
   $dir_group = " -> ".$dir_group27;  
   $dir_group_url = $dir_group27_ur1;
   break;
   
   case "index_tunDlmNeg.php" :
   $dir_main = " -> ".$dir_main09;
   $dir_group = " -> ".$dir_group28;  
   $dir_group_url = $dir_group28_ur1;
   break; 
   
   case 'index_harta.php' :
   $dir_main = " -> ".$dir_main10;
   //$dir_group = " -> ".$dir_group;  
   $dir_group_url = $dir_main10_ur1;
   break;
   
   case "index_perlantikan_akademik.php" :
   $dir_main = " -> ".$dir_main11;
   $dir_group = " -> ".$dir_group29;  
   $dir_group_url = $dir_group29_ur1;
   break; 
  
   case "index_perlantikan_bukan_akademik.php" :
   $dir_main = " -> ".$dir_main11;
   $dir_group = " -> ".$dir_group30;  
   $dir_group_url = $dir_group30_ur1;
   break;
 
   case "index_lapordiri.php" :
   $dir_main = " -> ".$dir_main11;
   $dir_group = " -> ".$dir_group31;  
   $dir_group_url = $dir_group31_ur1;
   break;
    
  }

?>
<table border="0" width="100%">
<?php $qryLev = OCIParse($c,$senarai = "select b.nogaji_pohon,b.gelaran,a.bio_nama, b.ptj_pohon   
									from sn_pa_biodata a, sn_vw_att_staff b  
									where b.nama_pohon = a.bio_nama 
									and b.nogaji_pohon = '$nostaff'");
		OCIExecute($qryLev, OCI_DEFAULT);
		//echo '$senarai'; 
		
		while (OCIFetch($qryLev)) {
		$nama=OCIResult($qryLev,"BIO_NAMA");
		$gelaran=ociresult($qryLev,"GELARAN");
		
		}?>
	<tr>
		<td>
			<a href="https://portal.um.edu.my/mainpage.php?module=LamanStaf" target="_top">MyDesktop (UMPOrtal)</a>
			<font class="font_others">&nbsp;->&nbsp;</font>
			<a href="https://ihristest.um.edu.my/index.php">Staff E-Services (New)</a>
			<font class="font_others"><?php echo $dir_main ?></font>
			<a href="<?php $dir_group_url?>"> <?php echo $dir_group ?> </a>			</td>
		
 		 <td align="right"><a href="https://ihristest.um.edu.my/logout.php" target="_top">>> Logout</a></td></tr>
		 <tr>
		<td colspan="2" align="right" class='font_justification' >Selamat Datang&nbsp;<?php echo $gelaran;?>&nbsp;<?php echo $nama;?>
		
		
		</td>
 		 </tr>
		 <tr>
		<td colspan="2" align="right" class='font_justification_bi'><i>Welcome &nbsp;<?php echo $gelaran;?>&nbsp;<?php echo $nama;?></i>
		
		
		</td>
 		 </tr>
</table>





</body>
</html>