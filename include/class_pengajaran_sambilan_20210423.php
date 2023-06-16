<?php

class umum
	{	
//paparan no screen

public static function Breadcrumb($no_staff)
		{
			
		$DataStaf=MPS_Data::DataStaff($no_staff);
		$tun_gelaran=$DataStaf['ktrgn_gelaran'];
	    $tun_nama=$DataStaf['nama'];
		$jns_staff=$DataStaf['jns_staff'];	
			
		if($jns_staff=='STAFF')	
		{
		$url_1 = "http://portal.um.edu.my/mainpage.php?module=LamanStaf";
		$url_2 = "../../modul_adhoc/modul_dashboard/";
		$url_3 = "../../logout.php";
		}
		else
		{
		$url_1 = "http://umexternal.um.edu.my/pengajar/personal.php";
		$url_2 = "../../pengajar/personal.php";
		$url_3 = "../../pengajar/logout.php";
			
		}

		
			
		$str = '';
		$str.= 	'<table width="90%"  align="center" style="font-size:11px" >';
		$str.= 	'<tr><td>';
	
		$str.= '<ul class="breadcrumb">';
		if($jns_staff=='STAFF')	
		{
    	$str.= '<li><a href="'.$url_1.'">UMportal</a></li>';
    	$str.= '<li><a href="'.$url_2.'">Staff E-Services</a></li>';
		
		}
		else
		{
		$str.= '<li><a href="'.$url_1.'">Umexternal</a></li>';
    	$str.= '<li><a href="'.$url_2.'">Home Umexternal</a></li>';
		}
    	$str.= '<li class="active">Permohonan Pengajaran Sambilan</li>';
		$str.= '<li class="pull-right"><a href="'.$url_3.'">Logout</a></li>';	
		$str.= '</ul>';
		
		$str.= '</td></tr>';	
		
		
		
		$str.= 	'<tr><td align="right" class="font_sub_title_bm">';
	
		$str.= 	'<strong>Selamat Datang '.$tun_gelaran.'&nbsp;'.$tun_nama.'</strong>';
		
		$str.= '</td></tr>';
		$str.= 	'<tr><td align="right" class="font_sub_title_bi">';
	
		$str.= 	'<em>Welcome '.$tun_gelaran.'&nbsp;'.$tun_nama.'</em>';
		
		$str.= '</td></tr>';		
		
		$str.= '</table>';
		
		return $str;	
		}


public static function NoScreen($url_tahap)
	{
		$str = '';

		  $url_penuh_hdr = $_SERVER['REQUEST_URI'];
		  $url_penuh_dtl = explode("/",$url_penuh_hdr); 
		  
		  	  $url_hdr = $url_penuh_dtl[$url_tahap];
			  $url_dtl = explode("_",$url_hdr); 
	
			   $no_modul = $url_dtl[0];
			$no_submodul = $url_dtl[1];
			   $no_jenis = $url_dtl[2];
			   
			   //echo  $url_penuh_hdr;
		
		$str.= '<table style="font-size:10px" border="0" align="right" cellpadding="5" cellspacing="0">';
		$str.= '<tr><td><font color="#FFFFFF"><b>Modul</b></font></td>';
		$str.= '<td><font color="#FFFFFF"><b>&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;&nbsp;</b></font></td>';
		$str.= '<td><font color="#FFFFFF">'.strtoupper($no_modul).'</font></td></tr>';
		$str.= '<tr><td><font color="#FFFFFF"><b>Sub-Modul</b></font></td>';
		$str.= '<td><font color="#FFFFFF"><b>&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;&nbsp;</b></font></td>';
		$str.= '<td><font color="#FFFFFF">'.strtoupper($no_submodul).'</font></td></tr>';
		$str.= '<tr><td><font color="#FFFFFF"><b>No. Skrin</b></font></td>';
		$str.= '<td><font color="#FFFFFF"><b>&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;&nbsp;</b></font></td>';
		$str.= '<td><font color="#FFFFFF">'.strtoupper($no_jenis).'</font></td></tr>';
		$str.= '</table>';
		
		return $str;
	}
	
	public static function FormKalender($input_nama,$input_data)
	{
	global $c;
	$str = '';
	
	//$str.=	'<div class="container">';
    //$str.=	'<div class="row">';
    //$str.=	'<div class="col-sm-6">';
    //$str.=	'<div class="form-group">';
    $str.=	'<div class="input-group date" id="'.$input_nama.'" style="width:200px">';
    $str.=	'<input type="text" class="form-control" name="'.$input_nama.'"  id="'.$input_nama.' "value="'.$input_data.'"  required="required" />';
    $str.=	'<span class="input-group-addon">';
    $str.=	'<span class="glyphicon glyphicon-calendar"></span>';
    $str.=	'</span>';
    $str.=	'</div>';
    //$str.=	'</div>';
    //$str.=	'</div>';
    //$str.=	'</div>';
	//$str.=	'</div>';
	
	return $str;
	ocilogoff($c);	
	}
	
	public static function TabPentadbir($no_staff,$skrin)
		{
			global $c;
			$str = '';
			
			//echo "";
			$str.=	'<table width="100%" border="0" align="center">';
			$str.=	'<tr>';
			$str.=	'<td colspan="3"><ul class="nav nav-tabs">';
			
			//if($skrin == "1"){$aktif_1 = 'class="active"';}else {$aktif_1 = '';}
			if($skrin == "2"){$aktif_2 = 'class="active"';}else {$aktif_2 = '';}
			if($skrin == "3"){$aktif_3 = 'class="active"';}else {$aktif_3 = '';}
	/*
			$str.=	'<li role="presentation" '.$aktif_1.'>';
			$str.=	'<a href="pkh_mps_sc012d_iklan_pengajaran.php?skrin=1&no_staff='.$no_staff.'" title="Input Maklumat Iklan">';
			$str.=	'<span><strong>Input Maklumat Iklan</strong></span></a></li>';*/
			
			$str.=	'<li role="presentation" '.$aktif_2.'>';
			$str.=	'<a href="pkh_mps_sc012d_iklan_pengajaran.php?skrin=2&no_staff='.$no_staff.'" title="Senarai Iklan Semasa">';
			$str.=	'<span><strong>Senarai Iklan Semasa</strong></span></a></li>';
			
			$str.=	'<li role="presentation" '.$aktif_3.'>';
			$str.=	'<a href="pkh_mps_sc012d_iklan_pengajaran.php?skrin=3&no_staff='.$no_staff.'" title="Senarai Iklan Sebelum">';
			$str.=	'<span><strong>Senarai Iklan Sebelum</strong></span></a></li>';
			
			
			$str.=	'</ul></td>';
			
			$str.=	'  </tr>';
			$str.=	'</table>';
			return $str;
			ocilogoff($c);
				
				
			}
			
	public static function TabPentadbirStatus($no_staff,$skrin,$flag)
		{
			global $c;
			$str = '';
			
			//echo "";
			$str.=	'<table width="100%" border="0" align="center">';
			$str.=	'<tr>';
			$str.=	'<td colspan="3"><ul class="nav nav-tabs">';
			
			//if($skrin == "1"){$aktif_1 = 'class="active"';}else {$aktif_1 = '';}
			if($skrin == "1"){$aktif_1 = 'class="active"';}else {$aktif_1 = '';}
			if($skrin == "2"){$aktif_2 = 'class="active"';}else {$aktif_2 = '';}
	
			
			$str.=	'<li role="presentation" '.$aktif_1.'>';
			$str.=	'<a href="pkh_mps_sc015d_status_permohonan.php?skrin=1&no_staff='.$no_staff.'&flag=" title="Status">';
			$str.=	'<span><strong>Status Permohonan Staf <br>Jabatan Yang Memohon</strong></span></a></li>';
			
			$str.=	'<li role="presentation" '.$aktif_2.'>';
			$str.=	'<a href="pkh_mps_sc015d_status_permohonan.php?skrin=2&no_staff='.$no_staff.'&flag=1" title="Status">';
			$str.=	'<span><strong>Status Permohonan Staf <br>Yang Memohon Di Jabatan Pentadbir</strong></span></a></li>';
			
			
			$str.=	'</ul></td>';
			
			$str.=	'  </tr>';
			$str.=	'</table>';
			return $str;
			ocilogoff($c);
				
				
			}
			
	public static function PaparanNota()
	{
		$str='';
		
		$str.=	'<div class="col-lg-12">';
		$str.=	'<table class="table table-striped table-bordered table-hover"  style="font-size:11px;">';
		$str.=	'<tr>';
		$str.=	'<td  class="warning">';
		$str.=	'<strong>Nota</strong>';
		$str.=	'</td>';
		$str.=	'</tr>';
		$str.=	'<tr>';
		$str.=	'<td class="warning">';
		$str.=	'1.&nbsp;&nbsp;Sekiranya Kod Kursus Tiada Di Dalam Pilihan Mohon Untuk Hubungi <strong>PENTADBIR SISTEM ISIS DI PTJ</strong>.';
		$str.=	'</td>';
		$str.=	'</tr>';
		$str.=	'</table>';
		
		$str.=	'</div>';	
		
		return $str;
	}
	
	public static function PaparanNotaPengguna()
	{
		$str='';
		
		$str.=	'<div class="col-lg-12">';
		$str.=	'<table class="table table-striped table-bordered table-hover"  style="font-size:11px;">';
		$str.=	'<tr>';
		$str.=	'<td  class="warning">';
		$str.=	'<strong>Nota</strong>';
		$str.=	'</td>';
		$str.=	'</tr>';
		$str.=	'<tr>';
		$str.=	'<td class="warning">';
		$str.=	'1.&nbsp;&nbsp;Skrin <strong>Senarai Permohonan</strong> Akan Paparkan Permohonan Yang Masih <strong>Dalam Proses Sahaja</strong>.';
		$str.=	'</td>';
		$str.=	'</tr>';
		$str.=	'<tr>';
		$str.=	'<td class="warning">';
		$str.=	'2.&nbsp;&nbsp;Skrin <strong>Rekod Permohonan</strong> Akan Paparkan Permohonan Yang Telah <strong>Diluluskan,Dibatalkan dan Tidak Diluluskan</strong>.';
		$str.=	'</td>';
		$str.=	'</tr>';
		$str.=	'</table>';
		
		$str.=	'</div>';	
		
		return $str;
	}

	public static function PaparanNotaPelulus()
	{
		$str='';
		
		$str.=	'<div class="col-lg-12">';
		$str.=	'<table class="table table-striped table-bordered table-hover"  style="font-size:11px;">';
		$str.=	'<tr>';
		$str.=	'<td colspan="5" class="warning">';
		$str.=	'<strong>Nota</strong>';
		$str.=	'</td>';
		$str.=	'</tr>';
		$str.=	'<tr>';
		$str.=	'<td colspan="5" class="success">';
		$str.=	'1.&nbsp;&nbsp;Sila klik pada butang di menu <strong>Tindakan</strong> untuk pilihan [lulus/tidak lulus] permohonan staf';
		$str.=	'</td>';
		$str.=	'</tr>';
		$str.=	'<tr>';
		$str.=	'<td colspan="5" class="success">';
		$str.=	'2.&nbsp;&nbsp;Beban Tugas Terkumpul = Beban Tugas Yang Diisi Oleh Staf + Beban Tugas Yang Sedang Diproses Berdasarkan sesi dan semester yang sama.';
		$str.=	'</td>';
		$str.=	'</tr>';
		$str.=	'<tr>';
		$str.=	'<td colspan="5" class="success">';
		$str.=	'3.&nbsp;&nbsp;Beban Tugas Semasa = Beban Tugas yang sedang dipohon oleh staf berdasarkan sesi,semester dan kursus yang dimasukkan oleh pentadbir ptj.';
		$str.=	'</td>';
		$str.=	'</tr>';
		
		$str.=	'<tr>';
		$str.=	'<td colspan="5" class="success">';
		$str.=	'<strong>4.&nbsp;&nbsp;SILA BUAT PILIHAN SESI DAN KURSUS UNTUK MEMBUAT KELULUSAN.</strong>';
		$str.=	'</td>';
		$str.=	'</tr>';
		
		
		$str.=	'</table>';
		
		$str.=	'</div>';	
		
		return $str;
	}
	
	
	
	}

class MPS_Data
	{
	
	//Tahun dan Bulan Semasa
	public static function TahunBulanHari()
	{
	global $c;
	
	$sql_data1 = "  SELECT TO_CHAR(SYSDATE,'YYYY') AS TAHUN,
					TO_CHAR(SYSDATE,'MM') AS BULAN,
					TO_CHAR(SYSDATE,'DD') AS HARI
					FROM DUAL
					";
	//echo $sql_data1.'<br/><br/>';					
	$sql_data1a = oci_parse($c,$sql_data1);
	oci_execute($sql_data1a,OCI_DEFAULT);
	if(oci_fetch($sql_data1a))
		{
			$tahun = oci_result($sql_data1a,"TAHUN");
			$bulan = oci_result($sql_data1a,"BULAN");
			 $hari = oci_result($sql_data1a,"HARI");
		}
	oci_free_statement($sql_data1a);
	
	return array
		(
			'tahun'=> $tahun,
			'bulan'=> $bulan,
			'hari'=> $hari
		);	
	ocilogoff($c);	
	}		
	
	public static function DataHari()
	{
	global $c;
	
	$sql_semak1 =	"	SELECT COUNT(*) AS KIRA FROM
						(
						SELECT HRI_NAMA_HARI FROM SN_KD_HARI
						ORDER BY HRI_KOD_HARI_DB ASC
						)
						";
	$sql_semak1a = OCIParse($c,$sql_semak1);
	OCIExecute($sql_semak1a,OCI_DEFAULT);
	if(OCIFetch($sql_semak1a))
		{ 
			  $bil_1 = OCIResult($sql_semak1a,"KIRA");
		}
	oci_free_statement($sql_semak1a);
	
	
	$sql_data1 =	"	SELECT HRI_NAMA_HARI FROM SN_KD_HARI
						ORDER BY HRI_KOD_HARI_DB ASC
						";
	$sql_data1a = OCIParse($c,$sql_data1);
	OCIExecute($sql_data1a,OCI_DEFAULT);
	while(OCIFetch($sql_data1a))
		{ 
			  $namahari[] = OCIResult($sql_data1a,"HRI_NAMA_HARI");
			}
	oci_free_statement($sql_data1a);
		
	return array
		(
			      'bil' => $bil_1,
			  'namahari' => $namahari
		);
	OCILogOff($c);
	} 

	//RESEARCH_MANAGE_IS_V	- Data Staff
	public static function DataStaff($no_staff)
	{
		
		global $c;	
		$str = '';
		
		//$no_staff='00001634';
	
		$sql_semak1= " 	SELECT COUNT(*) AS KIRA FROM
						(
						SELECT 'STAFF' AS JNS_STAFF,
						EMP_NO AS NO_STAFF,
						EMP_NO AS CPG_ID_SAP,
						NVL(EMP_IC_NEW,PASSPORT_NO) AS NO_KP,
						'' AS GELARAN,EMP_GELARAN AS KTRGN_GELARAN,
						EMP_NAME AS NAMA,
						EMP_EMAIL_ADD AS EMAIL,
						JAWATAN_HAKIKI AS JAWATAN,
						POSITION_DESC AS KTRGN_JAWATAN,
						GRADE_CODE AS GRED,
						PTJ_CODE AS PTJ,
						PTJ_DESC AS KTRGN_PTJ,
						DEPARTMENT_CODE AS JBT,
						DEPARTMENT_DESC AS KTRGN_JBT
						FROM RESEARCH_MANAGE_IS_V
						WHERE EMP_NO = '".$no_staff."'
						UNION
						SELECT 'NON' AS JNS_STAFF,
						CPG_NOKP AS NO_STAFF,
						CPG_ID_SAP AS ID_SAP,
						NVL(CPG_NOKP_UPD,CPG_NOKP) AS NO_KP,
						CPG_GELARAN AS GELARAN,'' AS KTRGN_GELARAN,
						CPG_NAMA AS NAMA,
						CPG_EMEL AS EMAIL,
						'' AS JAWATAN,
						CPG_JAWATAN_SEKARANG AS KTRGN_JAWATAN,
						'' AS GRED,
						'' AS PTJ,
						'' AS KTRGN_PTJ,
						'' AS JBT,
						'' AS KTRGN_JBT
						FROM SN_KH_CALON_PENGAJAR
						WHERE CPG_NOKP = '".$no_staff."'
						)
						";
		//echo $sql_semak1.'<br/><br/>';
		$sql_semak1a = oci_parse($c,$sql_semak1);
		oci_execute($sql_semak1a,OCI_DEFAULT);
		if (oci_fetch($sql_semak1a))
		{
			$bil_1 = oci_result($sql_semak1a,"KIRA");
		}
		oci_free_statement($sql_semak1a);
	
		if ($bil_1 != '0')
		{
			
		$sql_data1 = "	SELECT 'STAFF' AS JNS_STAFF,
						EMP_NO AS ID_SAP,
						NVL(EMP_IC_NEW,PASSPORT_NO) AS NO_KP,
						'' AS GELARAN,EMP_GELARAN AS KTRGN_GELARAN,
						EMP_NAME AS NAMA,
						EMP_EMAIL_ADD AS EMAIL,
						JAWATAN_HAKIKI AS JAWATAN,
						POSITION_DESC AS KTRGN_JAWATAN,
						GRADE_CODE AS GRED,
						PTJ_CODE AS PTJ,
						PTJ_DESC AS KTRGN_PTJ,
						DEPARTMENT_CODE AS JBT,
						DEPARTMENT_DESC AS KTRGN_JBT,
						'' AS POSKAD,
						'' AS BANDAR,
						'' AS NEGERI,
						RKH_TARAF_KHIDMAT AS TARAF,
						BIO_TEKS_KELAYAKAN AS KELAYAKANAKADEMIK
						FROM RESEARCH_MANAGE_IS_V
						WHERE EMP_NO = '".$no_staff."'
						UNION
						SELECT 'NON' AS JNS_STAFF,
						CPG_ID_SAP AS ID_SAP,
						NVL(CPG_NOKP_UPD,CPG_NOKP) AS NO_KP,
						CPG_GELARAN AS GELARAN,
						'' AS KTRGN_GELARAN,
						CPG_NAMA AS NAMA,
						CPG_EMEL AS EMAIL,
						'' AS JAWATAN,
						CPG_JAWATAN_SEKARANG AS KTRGN_JAWATAN,
						'' AS GRED,
						'' AS PTJ,
						CPG_ALMT_SURAT2 AS KTRGN_PTJ,
						'' AS JBT,
						CPG_ALMT_SURAT1 AS KTRGN_JBT,
						CPG_POSKOD_SURAT AS POSKAD,
						CPG_BANDAR_SURAT AS BANDAR,
						CPG_NEGERI_SURAT AS NEGERI,
						'' AS TARAF,
						CPG_KELULUSAN_MAX AS KELAYAKANAKADEMIK
						FROM SN_KH_CALON_PENGAJAR
						WHERE CPG_NOKP = '".$no_staff."'
						";
			//echo $sql_data1.'<br>'; 					
			$sql_data1a = oci_parse($c,$sql_data1);
			oci_execute($sql_data1a,OCI_DEFAULT);
			if(oci_fetch($sql_data1a))
			{ 			
			
					   $jns_staff = oci_result($sql_data1a,"JNS_STAFF");
					      $id_sap = oci_result($sql_data1a,"ID_SAP");
					       $no_kp = oci_result($sql_data1a,"NO_KP");
					     $gelaran = oci_result($sql_data1a,"GELARAN");
				   $ktrgn_gelaran = oci_result($sql_data1a,"KTRGN_GELARAN");
						    $nama = oci_result($sql_data1a,"NAMA");
						   $email = oci_result($sql_data1a,"EMAIL");
					     $jawatan = oci_result($sql_data1a,"JAWATAN"); 
				   $ktrgn_jawatan = oci_result($sql_data1a,"KTRGN_JAWATAN"); 
					        $gred = oci_result($sql_data1a,"GRED");
					         $ptj = oci_result($sql_data1a,"PTJ"); 
					   $ktrgn_ptj = oci_result($sql_data1a,"KTRGN_PTJ");
					         $jbt = oci_result($sql_data1a,"JBT"); 
					   $ktrgn_jbt = oci_result($sql_data1a,"KTRGN_JBT");
					 $ktrgn_taraf = oci_result($sql_data1a,"TARAF");
				  $ktrgn_akademik = oci_result($sql_data1a,"KELAYAKANAKADEMIK");
				          $poskad = oci_result($sql_data1a,"POSKAD");
					      $bandar = oci_result($sql_data1a,"BANDAR");
					      $negeri = oci_result($sql_data1a,"NEGERI");
			}
			
			oci_free_statement($sql_data1a);
	
			return array ( 
				   	   'bil' => $bil_1, 
			     'jns_staff' => $jns_staff, 
			        'id_sap' => $id_sap,
				     'no_kp' => $no_kp,
			       'gelaran' => $gelaran, 
			 'ktrgn_gelaran' => $ktrgn_gelaran, 
				      'nama' => $nama, 
				     'email' => $email,
			       'jawatan' => $jawatan,
		     'ktrgn_jawatan' => $ktrgn_jawatan,
				      'gred' => $gred, 
				       'ptj' => $ptj, 
				 'ktrgn_ptj' => $ktrgn_ptj, 
				       'jbt' => $jbt,
				 'ktrgn_jbt' => $ktrgn_jbt,
			   'ktrgn_taraf' => $ktrgn_taraf,
		    'ktrgn_akademik' => $ktrgn_akademik,
			        'poskad' => $poskad,
				    'bandar' => $bandar,
				    'negeri' => $negeri
						);
		}
		
	ocilogoff($c);
	}

	//Baca Table sn_pa_biodata
	public static function DataBiodata($no_staff)
	{
		
		global $c;	
		$str = '';
		
		//$no_staff='00001634';
	
		$sql_semak1= " 	SELECT COUNT(*) AS KIRA FROM
						(
						SELECT BIO_WARGANEGARA,BIO_NEGARA_ASAL,BIO_TKH_LAHIR,BIO_JANTINA,
						BIO_KELAYAKAN_TERTINGGI,THP_KELULUSAN_TERTINGGI,THP_KTRGN_TAHAP
						FROM SN_PA_BIODATA,SN_KD_THP
						WHERE BIO_KELAYAKAN_TERTINGGI=THP_KOD_TAHAP
						and bio_nostaf='".$no_staff."'
						UNION
						SELECT CPG_WARGANEGARA AS BIO_WARGANEGARA,CPG_NEGERI_LAHIR AS BIO_NEGARA_ASAL,CPG_TKH_LAHIR AS BIO_TKH_LAHIR,
						CPG_JANTINA AS BIO_JANTINA,CPG_KELULUSAN_MAX AS BIO_KELAYAKAN_TERTINGGI,THP_KELULUSAN_TERTINGGI,THP_KTRGN_TAHAP AS THP_KTRGN_TAHAP
						FROM SN_KH_CALON_PENGAJAR,SN_KD_THP
						WHERE CPG_NOKP='".$no_staff."'
						AND CPG_KELULUSAN_MAX=THP_KOD_TAHAP
						)
						";
		//echo $sql_semak1.'<br/>';
		$sql_semak1a = oci_parse($c,$sql_semak1);
		oci_execute($sql_semak1a,OCI_DEFAULT);
		if (oci_fetch($sql_semak1a))
		{
			$bil_1 = oci_result($sql_semak1a,"KIRA");
		}
		oci_free_statement($sql_semak1a);
	
		if ($bil_1 != '0')
		{
			
		$sql_data1 = "	SELECT BIO_WARGANEGARA,BIO_NEGARA_ASAL,BIO_TKH_LAHIR,BIO_JANTINA,
						BIO_KELAYAKAN_TERTINGGI,THP_KELULUSAN_TERTINGGI,THP_KTRGN_TAHAP
						FROM SN_PA_BIODATA,SN_KD_THP
						WHERE BIO_KELAYAKAN_TERTINGGI=THP_KOD_TAHAP
						and bio_nostaf='".$no_staff."'
						UNION
						SELECT CPG_WARGANEGARA AS BIO_WARGANEGARA,CPG_NEGERI_LAHIR AS BIO_NEGARA_ASAL,CPG_TKH_LAHIR AS BIO_TKH_LAHIR,
						CPG_JANTINA AS BIO_JANTINA,CPG_KELULUSAN_MAX AS BIO_KELAYAKAN_TERTINGGI,THP_KELULUSAN_TERTINGGI,THP_KTRGN_TAHAP AS THP_KTRGN_TAHAP
						FROM SN_KH_CALON_PENGAJAR,SN_KD_THP
						WHERE CPG_NOKP='".$no_staff."'
						AND CPG_KELULUSAN_MAX=THP_KOD_TAHAP
						";
			//echo $sql_data1.'<br>'; 					
			$sql_data1a = oci_parse($c,$sql_data1);
			oci_execute($sql_data1a,OCI_DEFAULT);
			if(oci_fetch($sql_data1a))
			{ 			
			
					 $warganegara = oci_result($sql_data1a,"BIO_WARGANEGARA");
					  $negaraAsal = oci_result($sql_data1a,"BIO_NEGARA_ASAL");
					   $trkhlahir = oci_result($sql_data1a,"BIO_TKH_LAHIR");
					     $jantina = oci_result($sql_data1a,"BIO_JANTINA");
			   $kelayakanAkademik = oci_result($sql_data1a,"THP_KTRGN_TAHAP");
				     $kodakademik = oci_result($sql_data1a,"BIO_KELAYAKAN_TERTINGGI");
						$maxtahap = oci_result($sql_data1a,"THP_KELULUSAN_TERTINGGI");
						 
			}
			
			if($jantina=='L')
			{
				$ktrgnjantina="LELAKI";	
			}
			else
			{
				$ktrgnjantina="PEREMPUAN";	
			}
			
			oci_free_statement($sql_data1a);
	
			return array ( 
				 'warganegara' => $warganegara, 
			      'negaraAsal' => $negaraAsal, 
			       'trkhlahir' => $trkhlahir,
				     'jantina' => $jantina,
				'ktrgnjantina' => $ktrgnjantina,
		   'kelayakanAkademik' => $kelayakanAkademik, 
			     'kodakademik' => $kodakademik,
				    'maxtahap' => $maxtahap
				       );
		}
		
	ocilogoff($c);
	}
	//Table Iklan
	
	public static function DataIklan($kodjbtadmin,$sesi,$skrin,$sem)
	{
		
		global $c;	
		$str = '';
		
		$date=date("Ymd");
		
		if($skrin=='2')
		{
			$cond="AND TO_CHAR(SYSDATE,'yyyymmdd') <= TO_CHAR(TWI_TKH_TAMAT,'yyyymmdd')";
		}
		else
		{
			$cond="AND TO_CHAR(TWI_TKH_TAMAT,'yyyymmdd') < '".$date."'";
		}
		
		
		
		/*$kodjbtadmin='I10';
		$sem='1';
		$sesi='2017/2018';*/
		
		$data=" SELECT TWI_JABATAN,TWI_SESI,TWI_SEBAB_TAWARAN,
				TWI_NOSTAF_KJ,TWI_NOSTAF_KPTJ,TWI_KOD_KURSUS,TWI_IKLAN,TWI_TELEFON_PTJ,
				TWI_SEM,TWI_KATEGORI_JAWATAN,TWI_NORUJUK,
				to_char(TWI_TKH_MULA,'dd Mon yyyy') as TWI_TKH_MULA,
				to_char(TWI_TKH_TAMAT,'dd Mon yyyy') as TWI_TKH_TAMAT,
				KPK_JENIS_KURSUS,KPK_BIL_PEL,KPK_JWTN_PERUNTUK,KPK_JWTN_DIISI,KPK_BIDANG,KPK_LAYAK_POHON,
				KPK_KELAYAKAN_MIN,TWI_BLOK_KUMP,TWI_KTRGN_KURSUS
				FROM SN_KH_TAWARAN_INFO,SN_KH_KEPERLUAN_KURSUS
				WHERE TWI_SESI=KPK_SESI
				AND KPK_JABATAN= TWI_JABATAN
				AND TWI_SEM=KPK_SEM
				AND TWI_KOD_KURSUS=KPK_KOD_KURSUS
				AND TWI_KATEGORI_JAWATAN=KPK_KATEGORI_JAWATAN
				AND TWI_SESI='".$sesi."'
				AND TWI_SEM='".$sem."'
				AND TWI_JABATAN='".$kodjbtadmin."'
				AND TWI_NORUJUK=KPK_NORUJUK
				$cond
				";
		
			
		$sql_semak1 = "	SELECT COUNT(*) AS KIRA FROM
						(
						$data
						)	
					";
	//echo $sql_semak1.'<br/>';				
	$sql_semak1a=oci_parse ($c, $sql_semak1);
	oci_execute ($sql_semak1a, OCI_DEFAULT);
	if (oci_fetch($sql_semak1a)) 				
	{
		$bil_1 = ociresult($sql_semak1a,"KIRA");
	}

	if ($bil_1 != 0)
	{
	$sql_data1 = "	$data
					";
	//echo $sql_data1.'<br/>';				
	$sql_data1a=oci_parse ($c, $sql_data1);
	oci_execute ($sql_data1a, OCI_DEFAULT);
	while (oci_fetch($sql_data1a)) 				
	{
		$jbtnnadmin [] = ociresult($sql_data1a,"TWI_JABATAN");
		   $sesisem [] = ociresult($sql_data1a,"TWI_SESI");
	 $sebabtawaran [] = ociresult($sql_data1a,"TWI_SEBAB_TAWARAN");
		 $nostafkj [] = ociresult($sql_data1a,"TWI_NOSTAF_KJ");
	   $nostafkptj [] = ociresult($sql_data1a,"TWI_NOSTAF_KPTJ");
		$kodkursus [] = ociresult($sql_data1a,"TWI_KOD_KURSUS");
		    $iklan [] = ociresult($sql_data1a,"TWI_IKLAN");
		  $telefon [] = ociresult($sql_data1a,"TWI_TELEFON_PTJ");
		 $semester [] = ociresult($sql_data1a,"TWI_SEM");
  $kategorijawatan [] = ociresult($sql_data1a,"TWI_KATEGORI_JAWATAN");
	$trkhmulaiklan [] = ociresult($sql_data1a,"TWI_TKH_MULA");
	$trktamatiklan [] = ociresult($sql_data1a,"TWI_TKH_TAMAT");
	  $jeniskursus [] = ociresult($sql_data1a,"KPK_JENIS_KURSUS");
	   $bilpelajar [] = ociresult($sql_data1a,"KPK_BIL_PEL");
	 $jwtnperuntuk [] = ociresult($sql_data1a,"KPK_JWTN_PERUNTUK");
		$jwtndiisi [] = ociresult($sql_data1a,"KPK_JWTN_DIISI");
	   $bidanglain [] = ociresult($sql_data1a,"KPK_BIDANG");
	   $layakpohon [] = ociresult($sql_data1a,"KPK_LAYAK_POHON");
	 $kelayakanmin [] = ociresult($sql_data1a,"KPK_KELAYAKAN_MIN");
	    $ktrgnblok [] = ociresult($sql_data1a,"TWI_KTRGN_KURSUS");
	         $blok [] = ociresult($sql_data1a,"TWI_BLOK_KUMP");
		  $norujuk [] = ociresult($sql_data1a,"TWI_NORUJUK");
	}
	
			return array (
				    'bil_1' => $bil_1, 
				'jbtnnadmin' => $jbtnnadmin, 
				   'sesisem' => $sesisem, 
			 'sebabtawaran' => $sebabtawaran,
				 'nostafkj' => $nostafkj,
			   'nostafkptj' => $nostafkptj, 
				'kodkursus' => $kodkursus, 
				    'iklan' => $iklan, 
				  'telefon' => $telefon,
				 'semester' => $semester,
		  'kategorijawatan' => $kategorijawatan,
			'trkhmulaiklan' => $trkhmulaiklan,
			'trktamatiklan' => $trktamatiklan,
			  'jeniskursus' => $jeniskursus,
			   'bilpelajar' => $bilpelajar,
			 'jwtnperuntuk' => $jwtnperuntuk,
				'jwtndiisi' => $jwtndiisi,
			   'bidanglain' => $bidanglain,
			   'layakpohon' => $layakpohon,
			 'kelayakanmin' => $kelayakanmin,
			    'ktrgnblok' => $ktrgnblok,
					 'blok' => $blok,
			      'norujuk' => $norujuk
						);
		
		
	ocilogoff($c);
	
	
	ocifreestatement($sql_data1a);
	}
	}
	
	public static function DataTawaranInfo($no_staff,$norujukaniklan)
	{
		global $c;
		   
		   $jbt_ajar = '';
		  $sesi_ajar = '';
		 $sebab_ajar = '';
	  $nostafkj_ajar = '';
	$nostafkptj_ajar = '';
	 $kodkursus_ajar = '';
		   $telefon1 = '';
	     $tarikhmula = '';
	    $tarikhtamat = ' ';
	      $ktrgnblok = '';
	           $blok = '';
		   $semester = '';
		   $kategori = '';
		
		
		$sql_data1 = "	SELECT TWI_JABATAN,TWI_SESI,TWI_SEBAB_TAWARAN,TWI_NOSTAF_KJ,
						TO_CHAR(TWI_TKH_MULA,'dd Mon yyyy') as TARIKHMULA,TWI_KATEGORI_JAWATAN,
						TO_CHAR(TWI_TKH_TAMAT,'dd Mon yyyy') as TARIKHTAMAT,TWI_SEM,
						TWI_NOSTAF_KPTJ,TWI_KOD_KURSUS,TWI_TELEFON_PTJ,TWI_KTRGN_KURSUS,TWI_BLOK_KUMP
						FROM SN_KH_TAWARAN_INFO WHERE TWI_NORUJUK='".$norujukaniklan."'
					 ";
		//echo $sql_data1.'<br/>';				
		$sql_data1a=oci_parse ($c, $sql_data1);
		oci_execute ($sql_data1a, OCI_DEFAULT);
		if (oci_fetch($sql_data1a)) 				
		{
			   $jbt_ajar = ociresult($sql_data1a,"TWI_JABATAN");
			  $sesi_ajar = ociresult($sql_data1a,"TWI_SESI");
			 $sebab_ajar = ociresult($sql_data1a,"TWI_SEBAB_TAWARAN");
		  $nostafkj_ajar = ociresult($sql_data1a,"TWI_NOSTAF_KJ");
		$nostafkptj_ajar = ociresult($sql_data1a,"TWI_NOSTAF_KPTJ");
		 $kodkursus_ajar = ociresult($sql_data1a,"TWI_KOD_KURSUS");
		       $telefon1 = ociresult($sql_data1a,"TWI_TELEFON_PTJ");
		     $tarikhmula = ociresult($sql_data1a,"TARIKHMULA");
			$tarikhtamat = ociresult($sql_data1a,"TARIKHTAMAT");
			  $ktrgnblok = ociresult($sql_data1a,"TWI_KTRGN_KURSUS");
			       $blok = ociresult($sql_data1a,"TWI_BLOK_KUMP");
			   $semester = ociresult($sql_data1a,"TWI_SEM");
			   $kategori = ociresult($sql_data1a,"TWI_KATEGORI_JAWATAN");
			 
		}
		
		return array
		(
					'jbt_ajar' => $jbt_ajar,
				   'sesi_ajar' => $sesi_ajar,
				  'sebab_ajar' => $sebab_ajar,
			   'nostafkj_ajar' => $nostafkj_ajar,
			 'nostafkptj_ajar' => $nostafkptj_ajar,
			  'kodkursus_ajar' => $kodkursus_ajar,
			 	     'telefon' => $telefon1,
				  'tarikhmula' => $tarikhmula,
				 'tarikhtamat' => $tarikhtamat,
				   'ktrgnblok' => $ktrgnblok,
				        'blok' => $blok,
					'semester' => $semester,
					'kategori' => $kategori 
		);
		
		
		
		ocilogoff($c);			
	
		
	}
	
	public static function DataTawaranKursus($no_staff,$norujukaniklan)
	{
		global $c;
		   
		  $kuliah ='';
		  $toturial ='';
		  $amali ='';
		  $haritertentu ='';
		  $hari='';
		  $tarikhisiiklan='';
		
		
		$sql_data1 = "	SELECT NVL(TWK_JAM_KULIAH,'0') AS TWK_JAM_KULIAH,
               			NVL(TWK_JAM_TUTORIAL,'0') AS TWK_JAM_TUTORIAL,
               			NVL(TWK_JAM_AMALI,'0') AS TWK_JAM_AMALI,
						TWK_HARI_TERTENTU,TWK_NYATAKAN_HARI ,
						TO_CHAR(TWK_TKH_ISI,'DD Mon YYYY') as TWK_TKH_ISI
						FROM SN_KH_TAWARAN_KURSUS 
						WHERE TWK_NORUJUK='".$norujukaniklan."'
					 ";
		//echo $sql_data1.'<br/>';				
		$sql_data1a=oci_parse ($c, $sql_data1);
		oci_execute ($sql_data1a, OCI_DEFAULT);
		if (oci_fetch($sql_data1a)) 				
		{
			   $kuliah = ociresult($sql_data1a,"TWK_JAM_KULIAH");
			 $tutorial = ociresult($sql_data1a,"TWK_JAM_TUTORIAL");
			    $amali = ociresult($sql_data1a,"TWK_JAM_AMALI");
		 $haritertentu = ociresult($sql_data1a,"TWK_HARI_TERTENTU");
		 	     $hari = ociresult($sql_data1a,"TWK_NYATAKAN_HARI");
	   $tarikhisiiklan = ociresult($sql_data1a,"TWK_TKH_ISI");
		}
		else
		{
			$kuliah ='';
		  	$tutorial ='';
		    $amali ='';
		    $haritertentu ='';
		    $hari='';
			$tarikhisiiklan='';
			
		}
		
		return array
		(
				 'kuliah' => $kuliah,
			   'tutorial' => $tutorial,
				  'amali' => $amali,
		   'haritertentu' => $haritertentu,
				   'hari' => $hari,
		 'tarikhisiiklan' => $tarikhisiiklan
			 
		);
		
		
		
		ocilogoff($c);			
	
		
	}
	
	//table sn_kh_keperluan_kursus
	public static function DataKeperluankursus($no_staff,$norujukaniklan)
	{
		
		global $c;	
		$str = '';
		$kjabatan = '';
		$ksesi = '';
		$kkodkursus = '';
		$kjeniskursus = '';
		$kbilpelajar = '';
		$kjwtnperuntuk = '';
		$kjwtnisi = '';
		$kbidang = '';
		$kkategori =''; 
		$kkelayakan = '';
		$kakademik='';
		$ksem = '';
		
			
		$sql_data1 = "SELECT KPK_JABATAN,KPK_SESI,KPK_KOD_KURSUS,KPK_SEM,
					  KPK_JENIS_KURSUS,KPK_BIL_PEL,KPK_LAYAK_POHON,
					  KPK_JWTN_PERUNTUK,KPK_JWTN_DIISI,KPK_BIDANG,
					  KPK_KATEGORI_JAWATAN,KPK_KELAYAKAN_MIN
					  FROM SN_KH_KEPERLUAN_KURSUS 
					  WHERE KPK_NORUJUK='".$norujukaniklan."'
					 ";
			//echo $sql_data1.'<br>'; 					
			$sql_data1a = oci_parse($c,$sql_data1);
			oci_execute($sql_data1a,OCI_DEFAULT);
			if(oci_fetch($sql_data1a))
			{ 			
			
				$kjabatan = oci_result($sql_data1a,"KPK_JABATAN");
				$ksesi = oci_result($sql_data1a,"KPK_SESI");
				$kkodkursus = oci_result($sql_data1a,"KPK_KOD_KURSUS");
				$kjeniskursus = oci_result($sql_data1a,"KPK_JENIS_KURSUS");
				$kbilpelajar = oci_result($sql_data1a,"KPK_BIL_PEL");
				$kjwtnperuntuk = oci_result($sql_data1a,"KPK_JWTN_PERUNTUK");
				$kjwtnisi = oci_result($sql_data1a,"KPK_JWTN_DIISI");
				$kbidang = oci_result($sql_data1a,"KPK_BIDANG"); 
				$kkategori = oci_result($sql_data1a,"KPK_KATEGORI_JAWATAN"); 
				$kakademik = oci_result($sql_data1a,"KPK_KELAYAKAN_MIN");
				$kkelayakan = oci_result($sql_data1a,"KPK_LAYAK_POHON");
				$ksem = oci_result($sql_data1a,"KPK_SEM");
	
			}
			
			oci_free_statement($sql_data1a);
	
			return array ( 
				'kjabatan' => $kjabatan, 
				'ksesi' => $ksesi, 
				'kkodkursus' => $kkodkursus,
				'kjeniskursus' => $kjeniskursus,
				'kbilpelajar' => $kbilpelajar, 
				'kjwtnperuntuk' => $kjwtnperuntuk, 
				'kjwtnisi' => $kjwtnisi, 
				'kbidang' => $kbidang,
				'kkategori' => $kkategori,
				'kkelayakan' => $kkelayakan,
				'kakademik' => $kakademik,
				'ksem' => $ksem
						);
		
		
	ocilogoff($c);
	}
	
	

	public static function DataSubjek($sesi,$semester)
	{
	global $c;
	
	$kod='';
	
	$sqlsubjek="SELECT DISTINCT SUB_KOD_SUBJEK,SUB_KTRGN_SUBJEK 
				FROM SN_KD_KURSUS_PELAJAR 
				WHERE SUB_SESI='".$sesi."'
				AND SUB_SEMESTER='".$semester."'
				UNION
				SELECT DISTINCT MHN_KOD_SUBJEK AS SUB_KOD_SUBJEK,
				MHN_KTRGN_SUBJEK_BM AS SUB_KTRGN_SUBJEK 
				FROM SIS_VW_KRS_INDUK_MBBS
				ORDER BY SUB_KOD_SUBJEK";
	
	$sql_semak1 =	"	SELECT COUNT(*) AS KIRA FROM
						(
						$sqlsubjek
						)
						";
	//echo $sql_semak1.'<br/><br/>';					
	$sql_semak1a = OCIParse($c,$sql_semak1);
	OCIExecute($sql_semak1a,OCI_DEFAULT);
	if(OCIFetch($sql_semak1a))
		{ 
			  $bil_1 = OCIResult($sql_semak1a,"KIRA");
		}
	oci_free_statement($sql_semak1a);
	
	if($bil_1!='0')
	{
	$sql_data1 =	"$sqlsubjek";
		$sql_data1a = OCIParse($c,$sql_data1);
		OCIExecute($sql_data1a,OCI_DEFAULT);
		while(OCIFetch($sql_data1a))
			{ 
		      	  $kod[] = OCIResult($sql_data1a,"SUB_KOD_SUBJEK");
				$ktrgn[] = OCIResult($sql_data1a,"SUB_KTRGN_SUBJEK");
			}
	oci_free_statement($sql_data1a);
		
	return array
		(
			  'bil' => $bil_1,
			  'kod' => $kod,
			'ktrgn' => $ktrgn
		
		);
	}
	OCILogOff($c);
	} 
	
	public static function DataSesi()
	{
	global $c;
	
	$sql_data1 =	"	SELECT TO_CHAR(sysdate,'YYYY') AS TAHUN 
						FROM DUAL 
						";
	$sql_data1a = OCIParse($c,$sql_data1);
	OCIExecute($sql_data1a,OCI_DEFAULT);
	if(OCIFetch($sql_data1a))
		{ 
	   	  $tahun = OCIResult($sql_data1a,"TAHUN");
		}
	oci_free_statement($sql_data1a);
	
	$tahun_depan = $tahun+1;
	$tahun_lepas = $tahun-1;
	
	$akhir =  $tahun.'/'.$tahun_depan;
	 $awal =  $tahun_lepas.'/'.$tahun;	
	return array
		(
			  'akhir' => $akhir,
			   'awal' => $awal
		
		);
	OCILogOff($c);
	}
	
	public static function KelayakanAkademik($no_staff_pemohonan)
	{
	global $c;
	
	$kod_tahap = '';
	$bidang = '';
	$khusus = '';
	$ins = '';
	$ins_lain = '';
	$negara_pengajian = '';
	$mula_pengajian = '';
	$tamat_pengajian = '';
	$tahun_anugerah = '';
	$keputusan = '';
	$pngk = '';
	$institut = '';
	$ktrgn_tahap = '';
	
	$sql_semak1 =	"	SELECT COUNT(*) AS KIRA FROM
						(
						SELECT LYK_KP AS NOKP, LYK_TAHAP AS TAHAP_PENGAJIAN, 
						LYK_BIDANG AS BIDANG_PENGAJIAN, 
						LYK_PENGKHUSUSAN AS KHUSUS_PENGAJIAN, 
						LYK_INSTITUSI AS INSTITUT_PENGAJIAN, 
						LYK_INSTITUSI_LAIN AS INSTITUT_PENGAJIAN_LAIN, 
						LYK_NEGARA AS NEGARA_PENGAJIAN, 
						TO_CHAR(LYK_TKH_MULA,'dd/mm/yyyy') AS MULA_PENGAJIAN, 
						TO_CHAR(LYK_TKH_TAMAT,'dd/mm/yyyy') AS TAMAT_PENGAJIAN, 
						LYK_THN_ANUGERAH AS TAHUN_ANUGERAH, 
						LYK_KEPUTUSAN AS KEPUTUSAN_PENGAJIAN, 
						INS_KTRGN_INSTITUT AS INSTITUT,
						LYK_CGPA AS PNGK_PENGAJIAN, THP_KTRGN_TAHAP AS TAHAP
						FROM SN_KH_KELAYAKAN, SN_KD_INS, SN_KD_THP
						WHERE LYK_KP = '".$no_staff_pemohonan."'
						AND LYK_INSTITUSI = INS_KOD_INSTITUT
						AND LYK_TAHAP = THP_KOD_TAHAP
						)
						";
	//echo $sql_semak1.'<br/>';		
	$sql_semak1a = OCIParse($c,$sql_semak1);
	OCIExecute($sql_semak1a,OCI_DEFAULT);
	if(OCIFetch($sql_semak1a))
		{ 
			  $bil_1 = OCIResult($sql_semak1a,"KIRA");
		}
	oci_free_statement($sql_semak1a);
	
	
	$sql_data1 =	"	SELECT LYK_KP AS NOKP, LYK_TAHAP AS TAHAP_PENGAJIAN, 
						LYK_BIDANG AS BIDANG_PENGAJIAN, 
						LYK_PENGKHUSUSAN AS KHUSUS_PENGAJIAN, 
						LYK_INSTITUSI AS INSTITUT_PENGAJIAN, 
						LYK_INSTITUSI_LAIN AS INSTITUT_PENGAJIAN_LAIN, 
						LYK_NEGARA AS NEGARA_PENGAJIAN, 
						TO_CHAR(LYK_TKH_MULA,'dd/mm/yyyy') AS MULA_PENGAJIAN, 
						TO_CHAR(LYK_TKH_TAMAT,'dd/mm/yyyy') AS TAMAT_PENGAJIAN, 
						LYK_THN_ANUGERAH AS TAHUN_ANUGERAH, 
						LYK_KEPUTUSAN AS KEPUTUSAN_PENGAJIAN, 
						INS_KTRGN_INSTITUT AS INSTITUT,
						LYK_CGPA AS PNGK_PENGAJIAN, THP_KTRGN_TAHAP AS TAHAP
						FROM SN_KH_KELAYAKAN, SN_KD_INS, SN_KD_THP
						WHERE LYK_KP = '".$no_staff_pemohonan."'
						AND LYK_INSTITUSI = INS_KOD_INSTITUT
						AND LYK_TAHAP = THP_KOD_TAHAP
						";
	//echo $sql_data1.'<br/>';		
	$sql_data1a = OCIParse($c,$sql_data1);
	OCIExecute($sql_data1a,OCI_DEFAULT);
	while(OCIFetch($sql_data1a))
		{ 
			   $kod_tahap[] = OCIResult($sql_data1a,"TAHAP_PENGAJIAN");
			      $bidang[] = OCIResult($sql_data1a,"BIDANG_PENGAJIAN");
			      $khusus[] = OCIResult($sql_data1a,"KHUSUS_PENGAJIAN");
			         $ins[] = OCIResult($sql_data1a,"INSTITUT_PENGAJIAN");
			    $ins_lain[] = OCIResult($sql_data1a,"INSTITUT_PENGAJIAN_LAIN");
		$negara_pengajian[] = OCIResult($sql_data1a,"NEGARA_PENGAJIAN");
		  $mula_pengajian[] = OCIResult($sql_data1a,"MULA_PENGAJIAN");
		 $tamat_pengajian[] = OCIResult($sql_data1a,"TAMAT_PENGAJIAN");
		  $tahun_anugerah[] = OCIResult($sql_data1a,"TAHUN_ANUGERAH");
			   $keputusan[] = OCIResult($sql_data1a,"KEPUTUSAN_PENGAJIAN");
			        $pngk[] = OCIResult($sql_data1a,"PNGK_PENGAJIAN");
				$institut[] = OCIResult($sql_data1a,"INSTITUT");
			 $ktrgn_tahap[] = OCIResult($sql_data1a,"TAHAP");
		}
	oci_free_statement($sql_data1a);
		
	return array
		(
			         'bil' => $bil_1,
			   'kod_tahap' => $kod_tahap,
			      'bidang' => $bidang,
			      'khusus' => $khusus,
			         'ins' => $ins,
			    'ins_lain' => $ins_lain,
		'negara_pengajian' => $negara_pengajian,
		  'mula_pengajian' => $mula_pengajian,
		 'tamat_pengajian' => $tamat_pengajian,
		  'tahun_anugerah' => $tahun_anugerah,
			   'keputusan' => $keputusan,
			        'pngk' => $pngk,
			    'institut' => $institut,
		  	 'ktrgn_tahap' => $ktrgn_tahap
		);
		
		
	ocilogoff($c);
	} 
	
	
	
	public static function KodKursus($kodkursus,$sesi_staf,$semester)
	{
		global $c;
	$str = '';
	
	$ktrgnsubjek='';
	$tiada_rekod='';
	$sql_semak1 = "	SELECT DISTINCT SUB_KOD_SUBJEK,SUB_KTRGN_SUBJEK 
					FROM SN_KD_KURSUS_PELAJAR
					WHERE SUB_KOD_SUBJEK='".$kodkursus."' 
					AND SUB_SESI='".$sesi_staf."'  
					AND SUB_SEMESTER='".$semester."'
					UNION
					SELECT DISTINCT MHN_KOD_SUBJEK AS SUB_KOD_SUBJEK,
					MHN_KTRGN_SUBJEK_BM AS SUB_KTRGN_SUBJEK 
					FROM SIS_VW_KRS_INDUK_MBBS
					WHERE MHN_KOD_SUBJEK='".$kodkursus."' 
					ORDER BY SUB_KOD_SUBJEK

					";
	//echo $sql_semak1.'<br/>';				
	$sql_semak1a = oci_parse ($c, $sql_semak1);
	oci_execute ($sql_semak1a, OCI_DEFAULT);
	if (oci_fetch($sql_semak1a)) 				
		{
			$ktrgnsubjek = ociresult($sql_semak1a,"SUB_KTRGN_SUBJEK");
		}
	ocifreestatement($sql_semak1a);
	
	if($kodkursus=='DDD0003')
	{
		$ktrgnsubjek='GCP TAHUN 3';
	}
	elseif($kodkursus=='DDD0004')
	{
		$ktrgnsubjek='GCP TAHUN 4';
	}
	elseif($kodkursus=='DDD0005')
	{
		$ktrgnsubjek='GCP TAHUN 5';
	}
	else
	{
		$ktrgnsubjek=$ktrgnsubjek;
	}
	
	
	if($ktrgnsubjek!='')
	{
	$str.= $ktrgnsubjek;	
	}
	else
	{
	$str.= '-';	
	}
	
	
	return $str;	
	ocilogoff($c);	
		
		
	}
	
	//table sn_kd_thp
	public static function DataTahapKelayakanKursus($kkelayakan)
	{
		
		global $c;	
		$str = '';
		$kodkelayakan = '';
		$ktrgnkelayakan = '';
		$mintahap = '';
			
		$sql_data1 = "SELECT THP_KELULUSAN_TERTINGGI,THP_KOD_TAHAP,THP_KTRGN_TAHAP FROM SN_KD_THP WHERE THP_KOD_TAHAP='".$kkelayakan."'";
			//echo $sql_data1.'<br>'; 					
			$sql_data1a = oci_parse($c,$sql_data1);
			oci_execute($sql_data1a,OCI_DEFAULT);
			if(oci_fetch($sql_data1a))
			{ 			
				$mintahap= oci_result($sql_data1a,"THP_KELULUSAN_TERTINGGI");
				$kodkelayakan= oci_result($sql_data1a,"THP_KOD_TAHAP");
				$ktrgnkelayakan = oci_result($sql_data1a,"THP_KTRGN_TAHAP");
	
			}
			
			oci_free_statement($sql_data1a);
	
			return array ( 
				    'mintahap' => $mintahap, 
				'kodkelayakan' => $kodkelayakan, 
			  'ktrgnkelayakan' => $ktrgnkelayakan
				);
		
		
	ocilogoff($c);
	}

	/********************************************************/
	//Semakan Data Permohonan
	
	public static function DataListPermohonan($no_staff,$skrin,$pilihansesi)
	{
	global $c;
	
    $bil_1='';
	$norujukanseq = '';
	$tarikhperakuan='';

	if($skrin==1)
	{
		$cond="AND (PSH_STATUS_POHON in ('B','A1','A2','A3','A4','D'))";
			
	}
	else
	{
		$cond="AND PSH_STATUS_POHON in ('R','C','A','L')";		
	}
	
	if($pilihansesi=='')
	{
		$cond1="";
	}
	else
	{
		$cond1=" AND PSH_SESI ='".$pilihansesi."'";	
	}
	
	$sql_1 = " 	 SELECT DISTINCT PSH_KUMPULAN_SEQ,PSH_SESI,PSH_SEMESTER ,
				 TO_CHAR(PSH_TKH_PERAKUAN,'dd Mon yyyy') as TARIKHPERAKUAN
				 FROM SN_KH_PENGAJAR_HDR 
				 WHERE PSH_ID='".$no_staff."'
				 $cond1
				 $cond
				 ORDER BY PSH_SESI,PSH_SEMESTER DESC
			   	";
	
		
	$sql_semak1 = "	SELECT COUNT(*) AS KIRA FROM
					(
					$sql_1
					)	
					";
	//echo $sql_semak1.'<br/>';				
	$sql_semak1a=oci_parse ($c, $sql_semak1);
	oci_execute ($sql_semak1a, OCI_DEFAULT);
	if (oci_fetch($sql_semak1a)) 				
		{
			$bil_1 = ociresult($sql_semak1a,"KIRA");
		}
		
	$sql_data = "$sql_1";
//	echo $sql_data.'<br/>';				
	$sql_data1a=oci_parse ($c, $sql_data);
	oci_execute ($sql_data1a, OCI_DEFAULT);
	while (oci_fetch($sql_data1a)) 				
		{
			$norujukanseq [] = ociresult($sql_data1a,"PSH_KUMPULAN_SEQ");
			$tarikhperakuan [] = ociresult($sql_data1a,"TARIKHPERAKUAN");
		}
	
	
	return array
		(
			  'bil_1' => $bil_1,
			  'norujukanseq' => $norujukanseq,
			  'tarikhperakuan' => $tarikhperakuan
		);
	
	
	ocilogoff($c);		
	}
	
	
	
	
	public static function DataSenaraiIklan($no_staff,$skrin,$pilihanjabatan,$flag,$sesi_staf,$sem)
	{
	global $c;
	$jabatan='';
	$tarikhmula='';
	$tarikhtamat='';
	$sesi='';
	$semester='';
	$kategorijawatan='';
	$kodkursus='';
	$norujukiklan='';
	$jamkuliah='';
	$jamtoturial='';
	$jamamali='';
	$harisubjek='';
	$blokkump='';
	$ktrgnblok='';
	
	$Data1=MPS_Data::TahunBulanHari();
	$tahun = $Data1['tahun'];
	$bulan = $Data1['bulan'];
	 $hari = $Data1['hari'];
	
	$tarikh="$tahun$bulan$hari";
	
	if($pilihanjabatan=='')
	{
		$cond="";
	}
	else
	{
		$cond="AND A.TWI_JABATAN='".$pilihanjabatan."'";
	}
	
	if($flag==1)
	{
		$cond2="AND TWI_SESI='".$sesi_staf."' AND TWI_SEM='".$sem."'";	
	}
	else
	{
		$cond2="";	
	}
	
	$sql_1 = " 	SELECT DISTINCT
				A.TWI_JABATAN,B.TWK_JABATAN,A.TWI_TKH_MULA,
				A.TWI_SEM,A.TWI_SESI,
				A.TWI_KATEGORI_JAWATAN,
				A.TWI_KOD_KURSUS,
				TO_CHAR(A.TWI_TKH_MULA,'dd Mon yyyy') as TARIKHMULA,
				TO_CHAR(A.TWI_TKH_TAMAT,'dd Mon yyyy') as TARIKHTAMAT,
				A.TWI_BLOK_KUMP,
				A.TWI_KTRGN_KURSUS,
				B.TWK_NORUJUK,
				NVL(B.TWK_JAM_KULIAH,'0') AS TWK_JAM_KULIAH,
                NVL(B.TWK_JAM_TUTORIAL,'0') AS TWK_JAM_TUTORIAL,
                NVL(B.TWK_JAM_AMALI,'0') AS TWK_JAM_AMALI,
				B.TWK_NYATAKAN_HARI
				FROM SN_KH_TAWARAN_INFO A,SN_KH_TAWARAN_KURSUS B
				WHERE B.TWK_JABATAN=A.TWI_JABATAN
				AND A.TWI_SEM=B.TWK_SEM
				AND A.TWI_SESI=B.TWK_SESI
				AND A.TWI_KATEGORI_JAWATAN=B.TWK_KATEGORI_JAWATAN
				AND A.TWI_KOD_KURSUS=B.TWK_KOD_KURSUS
				AND A.TWI_IKLAN='Y'
				AND A.TWI_NOSTAF_KJ IS NOT NULL
				AND A.TWI_NOSTAF_KPTJ IS NOT NULL
				$cond
				$cond2
				AND ('".$tarikh."' BETWEEN TO_CHAR(A.TWI_TKH_MULA,'yyyymmdd') AND TO_CHAR(A.TWI_TKH_TAMAT,'yyyymmdd'))
				AND NOT EXISTS
                (
                SELECT 'X'
                FROM SN_KH_PENGAJAR_HDR
                WHERE PSH_NORUJUK_IKLAN=TWK_NORUJUK
                AND PSH_ID='".$no_staff."'
				AND PSH_STATUS_POHON NOT IN ('C','R') 
				) 
				ORDER BY A.TWI_JABATAN,TWI_TKH_MULA ASC
			   	";
	
		
	$sql_semak1 = "	SELECT COUNT(*) AS KIRA FROM
					(
					$sql_1
					)	
					";
	//echo $sql_semak1.'<br/>';				
	$sql_semak1a=oci_parse ($c, $sql_semak1);
	oci_execute ($sql_semak1a, OCI_DEFAULT);
	if (oci_fetch($sql_semak1a)) 				
		{
			$bil_1 = ociresult($sql_semak1a,"KIRA");
		}
	
	if($bil_1!='0')
	{
	
		$sql_data1 = "$sql_1";
		
		//echo $sql_data1.'<br/>';				
		$sql_data1a=oci_parse ($c, $sql_data1);
		oci_execute ($sql_data1a, OCI_DEFAULT);
		while (oci_fetch($sql_data1a)) 				
			{
				$jabatan[] = ociresult($sql_data1a,"TWI_JABATAN");
				$tarikhmula[] = ociresult($sql_data1a,"TARIKHMULA");
				$tarikhtamat[] = ociresult($sql_data1a,"TARIKHTAMAT");
				$sesi[] = ociresult($sql_data1a,"TWI_SESI");
				$semester[] = ociresult($sql_data1a,"TWI_SEM");
				$kategorijawatan[] = ociresult($sql_data1a,"TWI_KATEGORI_JAWATAN");
				$kodkursus[] = ociresult($sql_data1a,"TWI_KOD_KURSUS");
				$norujukiklan[] = ociresult($sql_data1a,"TWK_NORUJUK");
				$jamkuliah[] = ociresult($sql_data1a,"TWK_JAM_KULIAH");
				$jamtoturial[] = ociresult($sql_data1a,"TWK_JAM_TUTORIAL");
				$jamamali[] = ociresult($sql_data1a,"TWK_JAM_AMALI");
				$harisubjek[] = ociresult($sql_data1a,"TWK_NYATAKAN_HARI");
				$blokkump[] = ociresult($sql_data1a,"TWI_BLOK_KUMP");
				$ktrgnblok[] = ociresult($sql_data1a,"TWI_KTRGN_KURSUS");
				 
			}
		
	
	return array
		(
			'bil_1' => $bil_1,
			'jabatan' => $jabatan,
			'tarikhmula' =>$tarikhmula,
			'tarikhtamat' => $tarikhtamat,
			'sesi' => $sesi,
			'semester' => $semester,
			'kategorijawatan' => $kategorijawatan,
			'kodkursus' => $kodkursus,
			'norujukiklan' => $norujukiklan,
			'jamkuliah' => $jamkuliah,
			'jamtoturial' => $jamtoturial,
			'jamamali' => $jamamali,
			'harisubjek' => $harisubjek,
			'blokkump' => $blokkump,
			'ktrgnblok' => $ktrgnblok
		);
	
	}
	ocilogoff($c);		
	}
	
	public static function DataSenaraiJabatanIklan($no_staff,$pilihanjabatan,$flag,$sesi,$semester)	
	{
		
	global $c;
	$str = '';
	
	$Data1=MPS_Data::TahunBulanHari();
	$tahun = $Data1['tahun'];
	$bulan = $Data1['bulan'];
	 $hari = $Data1['hari'];
	
	$tarikh="$tahun$bulan$hari";
	
	//echo $pilihan_jabatan;
	if($flag==1)
	{
		$cond="AND TWI_SESI='".$sesi."' AND TWI_SEM='".$semester."'";	
	}
	else
	{
		$cond="";
	}
		$sql_data1 ="   SELECT DISTINCT JBT_KOD_JABATAN,
						JBT_KTRGN_JABATAN 
						FROM SN_KD_JBT, SN_KH_TAWARAN_INFO
						WHERE JBT_AKTIF='Y'
						AND JBT_KOD_JABATAN=TWI_JABATAN
						AND ('".$tarikh."' BETWEEN TO_CHAR(TWI_TKH_MULA,'yyyymmdd') 
						AND TO_CHAR(TWI_TKH_TAMAT,'yyyymmdd'))
						AND TWI_NOSTAF_KJ IS NOT NULL
						AND TWI_NOSTAF_KPTJ IS NOT NULL
						$cond
						ORDER BY JBT_KTRGN_JABATAN ASC
					";
	
	
		$sql_data1a = OCIParse($c,$sql_data1);
		OCIExecute($sql_data1a,OCI_DEFAULT);
		while(OCIFetch($sql_data1a))
				{ 
				  $jbt_kod_pilihan = OCIResult($sql_data1a,"JBT_KOD_JABATAN");
				$jbt_ktrgn_pilihan = OCIResult($sql_data1a,"JBT_KTRGN_JABATAN");
				
		
		
	
		if($pilihanjabatan == $jbt_kod_pilihan)
		{		
			$str.=	'<option value='.$jbt_kod_pilihan.' selected>'.$jbt_ktrgn_pilihan.' </option>';
		}
		else
		{
			$str.=	'<option value='.$jbt_kod_pilihan.' > '.$jbt_ktrgn_pilihan.' </option>';
		}
		
	}
	
	oci_free_statement($sql_data1a);

    
	return $str;
	OCILogOff($c);
	} 


	public static function DataMaklumatPermohonan($no_staff,$norujukanseq,$skrin)
	{
	global $c;
	
	
	//echo "$norujukan<br>";
	
    $bil_1='';
	$jbtajar='';
	$sesi='';
	$akuan='';
	$trkhakuan='';
	$kodkursus='';
	$semester='';
	$jumbebanajar='';
	$kategorijawatan='';
	$statuspohon='';
	$norujukaniklan='';
	$nostafkj ='';
	$sahkj ='';
	$trkhsahkj ='';
	$ulasankj ='';
	
	$nostafkptj ='';
	$sahkptj ='';
	$trkhsahkptj ='';
	$ulasankptj='';
	
	$nostafkjajar ='';
	$sahkjajar='';
	$trkhsahkjajar ='';
	$ulasankjajar ='';
	
	$nostafkptjajar ='';
	$sahkptjajar ='';
	$trkhsahkptjajar ='';
	$ulasankptjajar ='';
	
	$nostafbsm ='';
	$sahbsm ='';
	$trkhsahbsm ='';
	$ulasanbsm ='';
	
	if($skrin==1)
	{
		$cond="AND (PSH_STATUS_POHON in ('B','A1','A2','A3','A4','D') OR PSH_STATUS_POHON IS NULL)";
			
	}
	else
	{
		$cond="AND PSH_STATUS_POHON in ('R','C','A','L')";		
	}
	
	
	$sql_1 = " 	SELECT PSH_JABATAN_AJAR,
				PSH_SESI,
				PSH_PERAKUAN,
				PSH_TKH_PERAKUAN,
				PSH_SAH_KJ,
				PSH_NOSTAF_KJ,
				PSH_TKH_SAH_KJ,
				PSH_JAM_SEMINGGU,
				PSH_SOKONG_KPTJ,
				PSH_NOSTAF_KPTJ,
				PSH_TKH_SOKONG_KPTJ,
				PSH_NOSTAF_KJ_AJAR,
				PSH_SOKONG_KJ_AJAR,
				PSH_TKH_SOKONG_KJ_AJAR,
				PSH_NOSTAF_KPTJ_AJAR,
				PSH_SOKONG_KPTJ_AJAR,
				PSH_TKH_SOKONG_KPTJ_AJAR,
				PSH_KOD_KURSUS,PSH_SEMESTER,
				PSH_JUM_BEBAN_AJAR,
				PSH_SAH_TERIMA,
				TO_CHAR(PSH_TKH_SAH_TERIMA,'DD Mon YYYY') AS PSH_TKH_SAH_TERIMA,
				PSH_KATEGORI_JAWATAN,
				PSH_STATUS_POHON,
				PSH_NOSTAF_BSM,
				PSH_LULUS_BSM,
				PSH_TKH_BSM,
				PSH_ULASAN_BSM,
				PSH_ULASAN_KJ,
				PSH_ULASAN_KPTJ,
				PSH_ULASAN_KJ_AJAR,
				PSH_ULASAN_KPTJ_AJAR,
				PSH_NORUJUK_PENGAJAR,
				PSH_NORUJUK_IKLAN,
				PSH_NORUJUK_PENGAJAR
				FROM SN_KH_PENGAJAR_HDR
				WHERE PSH_ID='".$no_staff."'
				$cond
				AND PSH_KUMPULAN_SEQ='".$norujukanseq."'
				ORDER BY PSH_SESI,PSH_SEMESTER DESC
			   	";
	
		
	$sql_semak1 = "	SELECT COUNT(*) AS KIRA FROM
					(
					$sql_1
					)	
					";
	//echo $sql_semak1.'<br/>';				
	$sql_semak1a=oci_parse ($c, $sql_semak1);
	oci_execute ($sql_semak1a, OCI_DEFAULT);
	if (oci_fetch($sql_semak1a)) 				
		{
			$bil_1 = ociresult($sql_semak1a,"KIRA");
		}
	
	if($bil_1>'0')
	{
	
		$sql_data1 = "$sql_1";
		
		//echo $sql_data1.'<br/>';				
		$sql_data1a=oci_parse ($c, $sql_data1);
		oci_execute ($sql_data1a, OCI_DEFAULT);
		while (oci_fetch($sql_data1a)) 				
			{
				$jbtajar [] = ociresult($sql_data1a,"PSH_JABATAN_AJAR");
				   $sesi [] = ociresult($sql_data1a,"PSH_SESI");
				  $akuan [] = ociresult($sql_data1a,"PSH_PERAKUAN");
			  $trkhakuan [] = ociresult($sql_data1a,"PSH_TKH_PERAKUAN");
			  $sahterima [] = ociresult($sql_data1a,"PSH_SAH_TERIMA");
			  $tarikhsah [] = ociresult($sql_data1a,"PSH_TKH_SAH_TERIMA");
			  
			   $nostafkj [] = ociresult($sql_data1a,"PSH_NOSTAF_KJ");
			      $sahkj [] = ociresult($sql_data1a,"PSH_SAH_KJ");
			  $trkhsahkj [] = ociresult($sql_data1a,"PSH_TKH_SAH_KJ");
			   $ulasankj [] = ociresult($sql_data1a,"PSH_ULASAN_KJ");
			  
			 $nostafkptj [] = ociresult($sql_data1a,"PSH_NOSTAF_KPTJ");
			    $sahkptj [] = ociresult($sql_data1a,"PSH_SOKONG_KPTJ");
			$trkhsahkptj [] = ociresult($sql_data1a,"PSH_TKH_SOKONG_KPTJ");
			 $ulasankptj [] = ociresult($sql_data1a,"PSH_ULASAN_KPTJ");
			  
		   $nostafkjajar [] = ociresult($sql_data1a,"PSH_NOSTAF_KJ_AJAR");
			  $sahkjajar [] = ociresult($sql_data1a,"PSH_SOKONG_KJ_AJAR");
		  $trkhsahkjajar [] = ociresult($sql_data1a,"PSH_TKH_SOKONG_KJ_AJAR");
		   $ulasankjajar [] = ociresult($sql_data1a,"PSH_ULASAN_KJ_AJAR");
			  
		 $nostafkptjajar [] = ociresult($sql_data1a,"PSH_NOSTAF_KPTJ_AJAR");
			$sahkptjajar [] = ociresult($sql_data1a,"PSH_SOKONG_KPTJ_AJAR");
	    $trkhsahkptjajar [] = ociresult($sql_data1a,"PSH_TKH_SOKONG_KPTJ_AJAR");
		 $ulasankptjajar [] = ociresult($sql_data1a,"PSH_ULASAN_KPTJ_AJAR");
		
		      $nostafbsm [] = ociresult($sql_data1a,"PSH_NOSTAF_BSM");
			     $sahbsm [] = ociresult($sql_data1a,"PSH_LULUS_BSM");
	         $trkhsahbsm [] = ociresult($sql_data1a,"PSH_TKH_BSM");
		      $ulasanbsm [] = ociresult($sql_data1a,"PSH_ULASAN_BSM");
			  
			  $kodkursus [] = ociresult($sql_data1a,"PSH_KOD_KURSUS");
			   $semester [] = ociresult($sql_data1a,"PSH_SEMESTER");
		   $jumbebanajar [] = ociresult($sql_data1a,"PSH_JUM_BEBAN_AJAR");
		$kategorijawatan [] = ociresult($sql_data1a,"PSH_KATEGORI_JAWATAN");
		    $statuspohon [] = ociresult($sql_data1a,"PSH_STATUS_POHON");
		      $norujukan [] = ociresult($sql_data1a,"PSH_NORUJUK_PENGAJAR");
		 $norujukaniklan [] = ociresult($sql_data1a,"PSH_NORUJUK_IKLAN");
		 
		         
			}
		
	
	return array
		(
			  'bil_1' => $bil_1,
			'jbtajar' => $jbtajar,
			   'sesi' => $sesi,
			  'akuan' => $akuan,
		  'trkhakuan' => $trkhakuan,
		  'kodkursus' => $kodkursus,
		   'semester' => $semester,
	   'jumbebanajar' => $jumbebanajar,
	'kategorijawatan' => $kategorijawatan,
	    'statuspohon' => $statuspohon,
	 'norujukaniklan' => $norujukaniklan,
	      'norujukan' => $norujukan,
		   'nostafkj' =>  $nostafkj,
		      'sahkj' =>  $sahkj,
		  'trkhsahkj' =>  $trkhsahkj,
		   'ulasankj' =>  $ulasankj,
		 'nostafkptj' =>  $nostafkptj,
		    'sahkptj' =>  $sahkptj,
		'trkhsahkptj' =>  $trkhsahkptj,
		 'ulasankptj' =>  $ulasankptj,
	   'nostafkjajar' =>  $nostafkjajar,
		  'sahkjajar' =>  $sahkjajar,
	  'trkhsahkjajar' =>  $trkhsahkjajar,
	   'ulasankjajar' =>  $ulasankjajar,	  
	 'nostafkptjajar' =>  $nostafkptjajar,
		'sahkptjajar' =>  $sahkptjajar,
    'trkhsahkptjajar' =>  $trkhsahkptjajar,
	 'ulasankptjajar' =>  $ulasankptjajar,	   
	      'nostafbsm' =>  $nostafbsm,
		     'sahbsm' =>  $sahbsm,
		 'trkhsahbsm' =>  $trkhsahbsm,
		  'ulasanbsm' =>  $ulasanbsm ,
		   'sahterima' => $sahterima,
		   'tarikhsah' => $tarikhsah
		
		    
		);
	
	}
	ocilogoff($c);		
	} 
	
	public static function DataKhidmatSedia($no_staff,$sesi,$semester,$jabatan,$kodkursus)
	{
		$khs_status='';
		
		global $c;	
		$str = '';
		
		$data=" SELECT KHS_STATUS FROM SN_KH_KHIDMAT_SEDIADA
				WHERE KHS_JABATAN_AJAR='".$jabatan."'
				AND KHS_SESI='".$sesi."'
				AND KHS_KOD_KURSUS='".$kodkursus."'
				AND KHS_SEM='".$semester."'
				AND KHS_NOSTAF='".$no_staff."'
				";
		
			
		$sql_semak1 = "	SELECT COUNT(*) AS KIRA FROM
						(
						$data
						)	
					";
	//echo $sql_semak1.'<br/>';				
	$sql_semak1a=oci_parse ($c, $sql_semak1);
	oci_execute ($sql_semak1a, OCI_DEFAULT);
	if (oci_fetch($sql_semak1a)) 				
	{
		$bil_1 = ociresult($sql_semak1a,"KIRA");
	}

	if ($bil_1 != 0)
	{
	$sql_data1 = "$data";
	//echo $sql_data1.'<br/>';				
	$sql_data1a=oci_parse ($c, $sql_data1);
	oci_execute ($sql_data1a, OCI_DEFAULT);
	if (oci_fetch($sql_data1a)) 				
	{
		   $khs_status = ociresult($sql_data1a,"KHS_STATUS");
	}
	
			return array (
				  'bil_1' => $bil_1, 
				'khs_status' => $khs_status
						);
	ocilogoff($c);
	
	ocifreestatement($sql_data1a);
	}
	}
	
	
	//semakan table ketua
	public static function DataKetua($no_staff)
	{
	global $c;
	
    $bil_1='';
	
	

	
	$sql_1 = " 	 SELECT SKT_PELULUS1,SKT_PELULUS2 FROM SN_AT_KETUA WHERE SKT_NOSTAF='".$no_staff."'
				 AND SKT_MODUL='MPS'
			 ";
	
		
	$sql_semak1 = "	SELECT COUNT(*) AS KIRA FROM
					(
					$sql_1
					)	
					";
	//echo $sql_semak1.'<br/>';				
	$sql_semak1a=oci_parse ($c, $sql_semak1);
	oci_execute ($sql_semak1a, OCI_DEFAULT);
	if (oci_fetch($sql_semak1a)) 				
		{
			$bil_1 = ociresult($sql_semak1a,"KIRA");
		}
	
	if($bil_1!='0')
	{
	
		$sql_data1 = "$sql_1";
		
		//echo $sql_data1.'<br/>';				
		$sql_data1a=oci_parse ($c, $sql_data1);
		oci_execute ($sql_data1a, OCI_DEFAULT);
		if (oci_fetch($sql_data1a)) 				
			{
				$nopelulus1 = ociresult($sql_data1a,"SKT_PELULUS1");
				$nopelulus2 = ociresult($sql_data1a,"SKT_PELULUS2");
			}
		
	
	return array
		(
			     'bil_1' => $bil_1,
			'nopelulus1' => $nopelulus1,
		    'nopelulus2' => $nopelulus2
		);
	
	}
	ocilogoff($c);		
	}
	

	/*****************************************************/


	
	//Semakan Kelulusan
		
	public static function DataKelulusanHdr($unt_staf,$jbt_ajar,$status,$nostaff,$statusstaf,$pilihansesi,$pilihanKursus)
	{
	global $c;
	$sql_1='';
	 $bil_1='';
	
	if($statusstaf=='NON')
	{
		$cond="AND PSH_JAWATAN='NON'";	
	}
	elseif($statusstaf=='STAFF')
	{
		$cond="AND PSH_JAWATAN NOT IN ('NON')";
	}
	else
	{
		$cond="";	
	}
	
	if($pilihanKursus=='XX')
	{
		$cond1 = "";	
	}
	else
	{
		$cond1 = "AND PSH_KOD_KURSUS = '".$pilihanKursus."'";	
	}
	
	//I Kelulusan Pentadbir PTj
	if($status == 'I')
		{
	$sql_1 = " 	SELECT PSH_NORUJUK_PENGAJAR, 
				CPG_NAMA AS NAMA, PSH_ID
 			   	FROM SN_KH_PENGAJAR_HDR,SN_KH_CALON_PENGAJAR
			   	WHERE PSH_STATUS_POHON = '".$status."'
			   	AND PSH_ID = CPG_NOKP
			   	AND PSH_JABATAN_AJAR = '".$jbt_ajar."'
			   	AND PSH_UNIT = '".$unt_staf."'
				AND PSH_SESI= '".$pilihansesi."'
				$cond1
				UNION
				SELECT TO_PSH_NORUJUK_PENGAJAR,
				BIO_NAMA AS NAMA, PSH_ID
				FROM SN_KH_PENGAJAR_HDR,SN_PA_BIODATA
				WHERE PSH_STATUS_POHON = '".$status."'
				AND PSH_ID = BIO_NOSTAF
				AND PSH_JABATAN_AJAR = '".$jbt_ajar."'
			   	AND PSH_UNIT = '".$unt_staf."'
				$cond1
			   	ORDER BY NAMA 
			   	";
		}
	
	
	 //D Kelulusan BSM
	if($status == 'D')
		{
	$sql_1 = "	SELECT PSH_NORUJUK_PENGAJAR,
				CPG_NAMA AS NAMA, PSH_ID
 			   	FROM SN_KH_PENGAJAR_HDR,SN_KH_CALON_PENGAJAR
			   	WHERE PSH_STATUS_POHON = '".$status."'
			   	AND PSH_ID = CPG_NOKP
				AND PSH_SESI= '".$pilihansesi."'
				$cond1
				$cond
				UNION
				SELECT PSH_NORUJUK_PENGAJAR,
				BIO_NAMA AS NAMA, PSH_ID
				FROM SN_KH_PENGAJAR_HDR,SN_PA_BIODATA
				WHERE PSH_STATUS_POHON = '".$status."'
				AND PSH_ID = BIO_NOSTAF
				AND PSH_SESI= '".$pilihansesi."'
				$cond1
				$cond
				ORDER BY NAMA 
			   	";
		}
	//A1 Kelulusan KJ	
	if($status == 'A1')
		{
	$sql_1 = " 	SELECT PSH_NORUJUK_PENGAJAR,
				CPG_NAMA AS NAMA, PSH_ID
 			   	FROM SN_KH_PENGAJAR_HDR,SN_KH_CALON_PENGAJAR
			   	WHERE PSH_STATUS_POHON = '".$status."'
			   	AND PSH_ID = CPG_NOKP
				AND PSH_NOSTAF_KJ = '".$nostaff."'
				AND PSH_SESI= '".$pilihansesi."'
				$cond1
			   	UNION
				SELECT PSH_NORUJUK_PENGAJAR,
				BIO_NAMA AS NAMA, PSH_ID
				FROM SN_KH_PENGAJAR_HDR,SN_PA_BIODATA
				WHERE PSH_STATUS_POHON = '".$status."'
				AND PSH_ID = BIO_NOSTAF
				AND PSH_NOSTAF_KJ = '".$nostaff."'
				AND PSH_SESI= '".$pilihansesi."'
				$cond1
				ORDER BY NAMA
			   	";
		}
	
	if($status == 'A2')
		{
	$sql_1 = " 	SELECT PSH_NORUJUK_PENGAJAR,
				CPG_NAMA AS NAMA, PSH_ID
 			   	FROM SN_KH_PENGAJAR_HDR,SN_KH_CALON_PENGAJAR
			   	WHERE PSH_STATUS_POHON = '".$status."'
			   	AND PSH_ID = CPG_NOKP
				AND PSH_NOSTAF_KPTJ = '".$nostaff."'
				AND PSH_SESI= '".$pilihansesi."'
				$cond1
			   	UNION
				SELECT PSH_NORUJUK_PENGAJAR,
				BIO_NAMA AS NAMA, PSH_ID
				FROM SN_KH_PENGAJAR_HDR,SN_PA_BIODATA
				WHERE PSH_STATUS_POHON = '".$status."'
				AND PSH_ID = BIO_NOSTAF
				AND PSH_NOSTAF_KPTJ = '".$nostaff."'
				AND PSH_SESI= '".$pilihansesi."'
				$cond1
				ORDER BY NAMA
			   	";
		}
	
	if($status == 'A3')
		{
	$sql_1 = " 	SELECT PSH_NORUJUK_PENGAJAR,
				CPG_NAMA AS NAMA, PSH_ID
 			   	FROM SN_KH_PENGAJAR_HDR,SN_KH_CALON_PENGAJAR
			   	WHERE PSH_STATUS_POHON = '".$status."'
			   	AND PSH_ID = CPG_NOKP
				AND PSH_NOSTAF_KJ_AJAR = '".$nostaff."'
				AND PSH_SESI= '".$pilihansesi."'
				$cond1
			   	UNION
				SELECT PSH_NORUJUK_PENGAJAR,
				BIO_NAMA AS NAMA, PSH_ID
				FROM SN_KH_PENGAJAR_HDR,SN_PA_BIODATA
				WHERE PSH_STATUS_POHON = '".$status."'
				AND PSH_ID = BIO_NOSTAF
				AND PSH_NOSTAF_KJ_AJAR = '".$nostaff."'
				AND PSH_SESI= '".$pilihansesi."'
				$cond1
				ORDER BY NAMA
			   	";
		}
	
	if($status == 'A4')
		{
	$sql_1 = " 	SELECT PSH_NORUJUK_PENGAJAR,
				CPG_NAMA AS NAMA, PSH_ID
 			   	FROM SN_KH_PENGAJAR_HDR,SN_KH_CALON_PENGAJAR
			   	WHERE PSH_STATUS_POHON = '".$status."'
			   	AND PSH_ID = CPG_NOKP
				AND PSH_NOSTAF_KPTJ_AJAR = '".$nostaff."'
				AND PSH_SESI= '".$pilihansesi."'
				$cond1
			   	UNION
				SELECT PSH_NORUJUK_PENGAJAR,
				BIO_NAMA AS NAMA, PSH_ID
				FROM SN_KH_PENGAJAR_HDR,SN_PA_BIODATA
				WHERE PSH_STATUS_POHON = '".$status."'
				AND PSH_ID = BIO_NOSTAF
				AND PSH_NOSTAF_KPTJ_AJAR = '".$nostaff."'
				AND PSH_SESI= '".$pilihansesi."'
				$cond1
				ORDER BY NAMA
			   	";
		}
	
	
	if($status!='')
	{	
	$sql_semak1 = "	SELECT COUNT(*) AS KIRA FROM
					(
					$sql_1
					)	
					";
	//echo $sql_semak1.'<br/>';				
	$sql_semak1a=oci_parse ($c, $sql_semak1);
	oci_execute ($sql_semak1a, OCI_DEFAULT);
	if (oci_fetch($sql_semak1a)) 				
		{
			$bil_1 = ociresult($sql_semak1a,"KIRA");
		}
	
	if ($bil_1 > 0)
		{
		$sql_data1 = "	$sql_1";
		
		//echo $sql_data1.'<br/>';				
		$sql_data1a=oci_parse ($c, $sql_data1);
		oci_execute ($sql_data1a, OCI_DEFAULT);
		while (oci_fetch($sql_data1a)) 				
			{
						  $no_rujuk[] = ociresult($sql_data1a,"PSH_NORUJUK_PENGAJAR");
				$no_staff_pemohonan[] = ociresult($sql_data1a,"PSH_ID");
				              $nama[] = ociresult($sql_data1a,"NAMA");
			}
		}
	else
		{
			          $no_rujuk = '';
			$no_staff_pemohonan = '';
			              $nama = '';
		}
	return array
		(
			     		 'bil' => $bil_1,
					'no_rujuk' => $no_rujuk,
		  'no_staff_pemohonan' => $no_staff_pemohonan,
			            'nama' => $nama
		);
	}
		
	ocilogoff($c);		
	}
	
	public static function DataRekodHdr($nostaff,$tahun,$status,$pilihansesi)
	{
	global $c;
	
	$sql_1='';
	
	if($tahun == '')
		{
			$syarat = '';	
		}
	else
		{
			$syarat = "AND PSH_SESI LIKE '%$tahun%'";	
		}
		
	
	 //D Kelulusan BSM
	if($status == 'D')
		{
	$sql_1 = "	SELECT PSH_NORUJUK_PENGAJAR AS NO_RUJUK,
				CPG_NAMA AS NAMA, PSH_ID,PSH_SESI,PSH_SEMESTER
 			   	FROM SN_KH_PENGAJAR_HDR,SN_KH_CALON_PENGAJAR
			   	WHERE  PSH_ID = CPG_NOKP
				AND PSH_LULUS_BSM IS NOT NULL
				AND PSH_SESI='".$pilihansesi."'
				UNION
				SELECT PSH_NORUJUK_PENGAJAR AS NO_RUJUK,
				BIO_NAMA AS NAMA, PSH_ID,PSH_SESI,PSH_SEMESTER
				FROM SN_KH_PENGAJAR_HDR,SN_PA_BIODATA
				WHERE  PSH_ID = BIO_NOSTAF
				AND PSH_LULUS_BSM IS NOT NULL
				AND PSH_SESI='".$pilihansesi."'
				ORDER BY NAMA,PSH_SEMESTER,PSH_SESI DESC  
			   	";
		}
	//A1 Kelulusan KJ	
	if($status == 'A1')
		{
	$sql_1 = " 	SELECT PSH_NORUJUK_PENGAJAR AS NO_RUJUK,
				CPG_NAMA AS NAMA, PSH_ID,PSH_SESI,PSH_SEMESTER
 			   	FROM SN_KH_PENGAJAR_HDR,SN_KH_CALON_PENGAJAR
			   	WHERE PSH_SAH_KJ IS NOT NULL
			   	AND PSH_ID = CPG_NOKP
				AND PSH_NOSTAF_KJ = '".$nostaff."'
			   	AND PSH_SAH_KJ IS NOT NULL
				AND PSH_SESI='".$pilihansesi."'
				UNION
				SELECT PSH_NORUJUK_PENGAJAR AS NO_RUJUK,
				BIO_NAMA AS NAMA, PSH_ID,PSH_SESI,PSH_SEMESTER
				FROM SN_KH_PENGAJAR_HDR,SN_PA_BIODATA
				WHERE PSH_SAH_KJ IS NOT NULL
				AND PSH_ID = BIO_NOSTAF
				AND PSH_NOSTAF_KJ = '".$nostaff."'
				AND PSH_SAH_KJ IS NOT NULL
				AND PSH_SESI='".$pilihansesi."'
				ORDER BY NAMA,PSH_SEMESTER,PSH_SESI DESC 
			   	";
		}
	
	if($status == 'A2')
		{
	$sql_1 = " 	SELECT PSH_NORUJUK_PENGAJAR AS NO_RUJUK,
				CPG_NAMA AS NAMA, PSH_ID,PSH_SESI,PSH_SEMESTER
 			   	FROM SN_KH_PENGAJAR_HDR,SN_KH_CALON_PENGAJAR
			   	WHERE PSH_ID = CPG_NOKP
				AND PSH_NOSTAF_KPTJ = '".$nostaff."'
				AND PSH_SOKONG_KPTJ IS NOT NULL
				AND PSH_SESI='".$pilihansesi."'
			   	UNION
				SELECT PSH_NORUJUK_PENGAJAR AS NO_RUJUK,
				BIO_NAMA AS NAMA, PSH_ID,PSH_SESI,PSH_SEMESTER
				FROM SN_KH_PENGAJAR_HDR,SN_PA_BIODATA
				WHERE PSH_ID = BIO_NOSTAF
				AND PSH_NOSTAF_KPTJ = '".$nostaff."'
				AND PSH_SOKONG_KPTJ IS NOT NULL
				AND PSH_SESI='".$pilihansesi."'
				ORDER BY NAMA,PSH_SEMESTER,PSH_SESI DESC  
			   	";
		}
	
	if($status == 'A3')
		{
	$sql_1 = " 	SELECT PSH_NORUJUK_PENGAJAR AS NO_RUJUK,
				CPG_NAMA AS NAMA, PSH_ID,PSH_SESI,PSH_SEMESTER
 			   	FROM SN_KH_PENGAJAR_HDR,SN_KH_CALON_PENGAJAR
			   	WHERE PSH_ID = CPG_NOKP
				AND PSH_NOSTAF_KJ_AJAR = '".$nostaff."'
				AND PSH_SOKONG_KJ_AJAR IS NOT NULL
				AND PSH_SESI='".$pilihansesi."'
			   	UNION
				SELECT PSH_NORUJUK_PENGAJAR AS NO_RUJUK,
				BIO_NAMA AS NAMA, PSH_ID,PSH_SESI,PSH_SEMESTER
				FROM SN_KH_PENGAJAR_HDR,SN_PA_BIODATA
				WHERE PSH_ID = BIO_NOSTAF
				AND PSH_NOSTAF_KJ_AJAR = '".$nostaff."'
				AND PSH_SOKONG_KJ_AJAR IS NOT NULL
				AND PSH_SESI='".$pilihansesi."'
				ORDER BY NAMA,PSH_SEMESTER,PSH_SESI DESC  			   	
			";
		}
	
	if($status == 'A4')
		{
	$sql_1 = " 	SELECT PSH_NORUJUK_PENGAJAR AS NO_RUJUK,
				CPG_NAMA AS NAMA, PSH_ID,PSH_SESI,PSH_SEMESTER
 			   	FROM SN_KH_PENGAJAR_HDR,SN_KH_CALON_PENGAJAR
			   	WHERE PSH_ID = CPG_NOKP
				AND PSH_NOSTAF_KPTJ_AJAR = '".$nostaff."'
				AND PSH_SOKONG_KPTJ_AJAR IS NOT NULL
				AND PSH_SESI='".$pilihansesi."'
			   	UNION
				SELECT PSH_NORUJUK_PENGAJAR AS NO_RUJUK,
				BIO_NAMA AS NAMA, PSH_ID,PSH_SESI,PSH_SEMESTER
				FROM SN_KH_PENGAJAR_HDR,SN_PA_BIODATA
				WHERE PSH_ID = BIO_NOSTAF
				AND PSH_NOSTAF_KPTJ_AJAR = '".$nostaff."'
				AND PSH_SOKONG_KPTJ_AJAR IS NOT NULL
				AND PSH_SESI='".$pilihansesi."'
				ORDER BY NAMA,PSH_SEMESTER,PSH_SESI DESC  
			   	";
		}
	
	
	
	if($status!='')
	{
	$sql_semak1 = "	SELECT COUNT(*) AS KIRA FROM
					(
					$sql_1
					)	
					";
	//echo $sql_semak1.'<br/>';				
	$sql_semak1a=oci_parse ($c, $sql_semak1);
	oci_execute ($sql_semak1a, OCI_DEFAULT);
	if (oci_fetch($sql_semak1a)) 				
		{
			$bil_1 = ociresult($sql_semak1a,"KIRA");
		}
	
	if ($bil_1 > 0)
		{
		$sql_data1 = "	$sql_1
						";
		
		//echo $sql_data1.'<br/>';				
		$sql_data1a=oci_parse ($c, $sql_data1);
		oci_execute ($sql_data1a, OCI_DEFAULT);
		while (oci_fetch($sql_data1a)) 				
			{
						  $no_rujuk[] = ociresult($sql_data1a,"NO_RUJUK");
				$no_staff_pemohonan[] = ociresult($sql_data1a,"PSH_ID");
				              $nama[] = ociresult($sql_data1a,"NAMA");
			}
		}
	else
		{
			          $no_rujuk = '';
			$no_staff_pemohonan = '';
			              $nama = '';
		}
	return array
		(
			     		 'bil' => $bil_1,
					'no_rujuk' => $no_rujuk,
		  'no_staff_pemohonan' => $no_staff_pemohonan,
			            'nama' => $nama
		);
	}
		
	ocilogoff($c);		
	}	

	
	
	
	
	public static function BebanTugas($no_staff_pemohonan,$sesi,$semester,$kodkursus,$kategorijawatan,$jbt_ajar)
	{
	global $c;	
	$jam_program = 0;
	 $jam_semasa = 0;
		 $jam_ps = 0;
		
	//Pengiraan Beban Tugas
	// 1- Beban tugas Program yang telah lulus
	// 2- Beban Tugas yang dimasukan oleh Pemohon
	// 3- Beban tugas pengajaran semasa
	
	// 1- Beban tugas Program yang telah lulus
			$sql_semak1 = "	SELECT NVL(SUM(NVL(PSH_JUM_BEBAN_AJAR,0)),0) AS biljam FROM (
							SELECT PSH_JABATAN_AJAR,PSH_KOD_KURSUS, PSH_JUM_BEBAN_AJAR,PSH_SESI,
							PSH_SEMESTER,TO_CHAR(PSH_TKH_SOKONG_KPTJ_AJAR,'dd Mon yyyy') as PSH_TKH_SOKONG_KPTJ_AJAR,
							TO_CHAR(PSH_TKH_SAH_TERIMA,'dd Mon yyyy') as PSH_TKH_SAH_TERIMA,PSH_STATUS_POHON,
							PSH_KATEGORI_JAWATAN
							FROM SN_KH_PENGAJAR_HDR
							WHERE PSH_ID='".$no_staff_pemohonan."'
							AND PSH_SESI='".$sesi."' 
							AND PSH_SEMESTER='".$semester."'
							AND PSH_KOD_KURSUS <> '".$kodkursus."'
							AND PSH_STATUS_POHON IN ('A','A4','A1','A2','A3','D')
							AND PSH_JUM_BEBAN_AJAR IS NOT NULL
							UNION
							SELECT PSH_JABATAN_AJAR,PSH_KOD_KURSUS, PSH_JUM_BEBAN_AJAR,PSH_SESI,
							PSH_SEMESTER,TO_CHAR(PSH_TKH_SOKONG_KPTJ_AJAR,'dd Mon yyyy') as PSH_TKH_SOKONG_KPTJ_AJAR,
							TO_CHAR(PSH_TKH_SAH_TERIMA,'dd Mon yyyy') as PSH_TKH_SAH_TERIMA,PSH_STATUS_POHON,
							PSH_KATEGORI_JAWATAN
							FROM SN_KH_PENGAJAR_HDR
							WHERE PSH_ID='".$no_staff_pemohonan."'
							AND PSH_SESI='".$sesi."'
							AND PSH_SEMESTER='".$semester."'
							AND PSH_KATEGORI_JAWATAN <> '".$kategorijawatan."'
							AND PSH_STATUS_POHON IN ('A','A4','A1','A2','A3','D')
							AND PSH_JUM_BEBAN_AJAR IS NOT NULL
							UNION
							SELECT PSH_JABATAN_AJAR,PSH_KOD_KURSUS, PSH_JUM_BEBAN_AJAR,PSH_SESI,
							PSH_SEMESTER,TO_CHAR(PSH_TKH_SOKONG_KPTJ_AJAR,'dd Mon yyyy') as PSH_TKH_SOKONG_KPTJ_AJAR,
							TO_CHAR(PSH_TKH_SAH_TERIMA,'dd Mon yyyy') as PSH_TKH_SAH_TERIMA,PSH_STATUS_POHON,
							PSH_KATEGORI_JAWATAN
							FROM SN_KH_PENGAJAR_HDR
							WHERE PSH_ID='".$no_staff_pemohonan."'
							AND PSH_SESI='".$sesi."'
							AND PSH_SEMESTER='".$semester."'
							AND PSH_JABATAN_AJAR <> '".$jbt_ajar."'
							AND PSH_STATUS_POHON IN ('A','A4','A1','A2','A3','D')
							AND PSH_JUM_BEBAN_AJAR IS NOT NULL
							)
			";
			//echo $sql_semak1.'<br/><br/>';		
			$sql_semak1a=oci_parse ($c, $sql_semak1);
			oci_execute ($sql_semak1a, OCI_DEFAULT);
			if (oci_fetch($sql_semak1a)) 				
				{
					$jam_program = ociresult($sql_semak1a,"BILJAM");
				}
			oci_free_statement($sql_semak1a);
		
	
	// 2- Beban Tugas yang dimasukan oleh Pemohon
			$sql_semak2 = "	SELECT NVL(SUM(NVL(PSD_JAM_MINGGU,0)),0) AS KIRA
							FROM SN_KH_PENGAJAR_DTL
							WHERE PSD_SESI='".$sesi."'
							AND PSD_SEM='".$semester."'
							AND PSD_STATUS_LULUS in ('A','Y','S')
							AND PSD_ID='".$no_staff_pemohonan."'
						";
			//echo $sql_semak2.'<br/>';							
			$sql_semak2a=oci_parse ($c, $sql_semak2);
			oci_execute ($sql_semak2a, OCI_DEFAULT);
			if (oci_fetch($sql_semak2a)) 				
				{
					  //$jam_semasa = ociresult($sql_semak2a,"KIRA");
					  $jam_semasa = '0';
				}
			
			oci_free_statement($sql_semak2a);	
			
	// 3- Beban tugas pengajaran semasa
			$sql_semak3 = "		SELECT SUM(KIRA) AS KIRA FROM
								(
								SELECT NVL(SUM(NVL(PSH_JUM_BEBAN_AJAR,0)),0) AS KIRA
								FROM SN_KH_PENGAJAR_HDR
								WHERE  PSH_STATUS_POHON IN ('B','A1','A2','A3','A4','D')
								AND PSH_SESI = '".$sesi."'
								AND PSH_SEMESTER = '".$semester."'
							    AND PSH_ID = '".$no_staff_pemohonan."'
								AND PSH_JABATAN_AJAR='".$jbt_ajar."'
								AND PSH_KATEGORI_JAWATAN='".$kategorijawatan."'
								AND PSH_KOD_KURSUS='".$kodkursus."'
								)
								";
			//echo $sql_semak3.'<br/>';		
			$sql_semak3a=oci_parse ($c, $sql_semak3);
			oci_execute ($sql_semak3a, OCI_DEFAULT);
			if (oci_fetch($sql_semak3a)) 				
				{
					$jam_ps = ociresult($sql_semak3a,"KIRA");
				}
			oci_free_statement($sql_semak3a);
			
		
		// 3- Beban tugas pengajaran semasa
			$sql_semak4 = "		SELECT COUNT(*) As KIRA FROM
								(
								SELECT PSH_ID
								FROM SN_KH_PENGAJAR_HDR
								WHERE  PSH_STATUS_POHON IN ('A1','A2','A3','A4','D')
								AND PSH_SESI = '".$sesi."'
								AND PSH_SEMESTER = '".$semester."'
							    AND PSH_ID = '".$no_staff_pemohonan."'
								)
								";
			//echo $sql_semak3.'<br/>';		
			$sql_semak4a=oci_parse ($c, $sql_semak4);
			oci_execute ($sql_semak4a, OCI_DEFAULT);
			if (oci_fetch($sql_semak4a)) 				
				{
					$bilPermohonan = ociresult($sql_semak4a,"KIRA");
				}
			oci_free_statement($sql_semak4a);	
			
			//echo " $jam_semasa  <br> $jam_ps <br> $jam_program";
			
			$beban=$jam_semasa+$jam_ps+$jam_program;
		
		
	return array
		(
	   'jam_program' => $jam_program,
		'jam_semasa' => $jam_semasa,
		    'jam_ps' => $jam_ps,
	 'bilPermohonan' => $bilPermohonan,
		     'beban' => $beban
		);	
	ocilogoff($c);	
	}
	
	public static function DataPTjHdr()
	{
	global $c;
	
	$sql_semak1 =	"	SELECT COUNT(*) AS KIRA FROM
						(
						SELECT PTG_KOD_PTJ, PTG_KTRGN_PTJ 
						FROM SN_KD_PTJ 
						WHERE PTG_AKTIF='Y' 
						AND PTG_KOD_PTJ NOT IN ('-','G','NA','Q') 
						ORDER BY PTG_KTRGN_PTJ
						)
						";
		$sql_semak1a = OCIParse($c,$sql_semak1);
		OCIExecute($sql_semak1a,OCI_DEFAULT);
		if(OCIFetch($sql_semak1a))
			{ 
		      	  $bil_1 = OCIResult($sql_semak1a,"KIRA");
			}
		oci_free_statement($sql_semak1a);
	
	
	$sql_data1 =	"	SELECT PTG_KOD_PTJ, PTG_KTRGN_PTJ 
						FROM SN_KD_PTJ 
						WHERE PTG_AKTIF='Y' 
						AND PTG_KOD_PTJ NOT IN ('-','G','NA','Q') 
						ORDER BY PTG_KTRGN_PTJ
						";
		$sql_data1a = OCIParse($c,$sql_data1);
		OCIExecute($sql_data1a,OCI_DEFAULT);
		while(OCIFetch($sql_data1a))
			{ 
		      	  $kod[] = OCIResult($sql_data1a,"PTG_KOD_PTJ");
				$ktrgn[] = OCIResult($sql_data1a,"PTG_KTRGN_PTJ");
			}
	oci_free_statement($sql_data1a);
		
	return array
		(
			  'bil' => $bil_1,
			  'kod' => $kod,
			'ktrgn' => $ktrgn
		
		);
	OCILogOff($c);
	} 
	
	public static function DataJbtHdr($pilihan_ptj)
	{
	global $c;
	
	if($pilihan_ptj != '')
		{
			$syarat = "WHERE JBT_KOD_PTJ = '".$pilihan_ptj."'";
		}
	else
		{
			$syarat = "";
		}

	$sql_semak1 = "	SELECT COUNT(*) AS KIRA FROM
					(
					SELECT JBT_KOD_JABATAN, JBT_KTRGN_JABATAN 
					FROM SN_KD_JBT 
					$syarat
					ORDER BY JBT_KTRGN_JABATAN
					)
					";
	//echo $sql_semak1.'<br/>';		
	$sql_semak1a = OCIParse($c,$sql_semak1);
	OCIExecute($sql_semak1a,OCI_DEFAULT);
	if(OCIFetch($sql_semak1a))
		{ 
			  $bil_1 = OCIResult($sql_semak1a,"KIRA");
		}
	oci_free_statement($sql_semak1a);


	$sql_data1 =	"	SELECT JBT_KOD_JABATAN, JBT_KTRGN_JABATAN 
						FROM SN_KD_JBT 
						$syarat
						ORDER BY JBT_KTRGN_JABATAN
						";
	$sql_data1a = OCIParse($c,$sql_data1);
	OCIExecute($sql_data1a,OCI_DEFAULT);
	while(OCIFetch($sql_data1a))
		{ 
			  $kod_jbtn[] = OCIResult($sql_data1a,"JBT_KOD_JABATAN");
			$ktrgn_jbtn[] = OCIResult($sql_data1a,"JBT_KTRGN_JABATAN");
		}
	oci_free_statement($sql_data1a);
	
	return array
		(
			  'bil' => $bil_1,
			  'kod' => $kod_jbtn,
			'ktrgn' => $ktrgn_jbtn
		);

		
	ocilogoff($c);
	} 

	public static function DataGelaran()
	{
	global $c;
	
	$sql_semak1 =	"	SELECT COUNT(*) AS KIRA FROM
						(
						SELECT GLR_KOD_GELARAN, GLR_KTRGN_GELARAN_BM
						FROM SN_KD_GELARAN
						WHERE GLR_AKTIF = 'Y'
						ORDER BY GLR_KTRGN_GELARAN_BM
						)
						";
	$sql_semak1a = OCIParse($c,$sql_semak1);
	OCIExecute($sql_semak1a,OCI_DEFAULT);
	if(OCIFetch($sql_semak1a))
		{ 
			  $bil_1 = OCIResult($sql_semak1a,"KIRA");
		}
	oci_free_statement($sql_semak1a);
	
	
	$sql_data1 =	"	SELECT GLR_KOD_GELARAN, GLR_KTRGN_GELARAN_BM
						FROM SN_KD_GELARAN
						WHERE GLR_AKTIF = 'Y'
						ORDER BY GLR_KTRGN_GELARAN_BM
						";
	$sql_data1a = OCIParse($c,$sql_data1);
	OCIExecute($sql_data1a,OCI_DEFAULT);
	while(OCIFetch($sql_data1a))
		{ 
			  $kod[] = OCIResult($sql_data1a,"GLR_KOD_GELARAN");
			$ktrgn[] = OCIResult($sql_data1a,"GLR_KTRGN_GELARAN_BM");
			}
	oci_free_statement($sql_data1a);
		
	return array
		(
			  'bil' => $bil_1,
			  'kod' => $kod,
			'ktrgn' => $ktrgn
		);
	OCILogOff($c);
	}
	

	public static function Jabatan($jbt)
	{
	global $c;
	
	$sql_semak1 =	"	SELECT COUNT(*) AS KIRA FROM
						(
						SELECT DISTINCT JBT_KTRGN, PTJ_KTRGN FROM SN_VW_PTJ_JBT_SKS_UNT 
						WHERE JBT_KOD = '".$jbt."'
						)
						";
	//echo $sql_semak1.'<br/>';		
	$sql_semak1a = OCIParse($c,$sql_semak1);
	OCIExecute($sql_semak1a,OCI_DEFAULT);
	if(OCIFetch($sql_semak1a))
		{ 
			  $bil_1 = OCIResult($sql_semak1a,"KIRA");
		}
	oci_free_statement($sql_semak1a);
	
	if($bil_1 > 0)
		{
	$sql_data1 =	"	SELECT DISTINCT JBT_KTRGN, PTJ_KTRGN,PTJ_KOD,JBT_KOD FROM SN_VW_PTJ_JBT_SKS_UNT 
						WHERE JBT_KOD = '".$jbt."'
						";
	//echo $sql_data1.'<br/>';		
	$sql_data1a = OCIParse($c,$sql_data1);
	OCIExecute($sql_data1a,OCI_DEFAULT);
	if(OCIFetch($sql_data1a))
		{ 
		   $ktrgn_jbt = OCIResult($sql_data1a,"JBT_KTRGN");
		   $ktrgn_ptj = OCIResult($sql_data1a,"PTJ_KTRGN");
		   $kodptj = OCIResult($sql_data1a,"PTJ_KOD");
		}
	oci_free_statement($sql_data1a);
		}
	else
		{
		$ktrgn_jbt = '-';	
		$ktrgn_ptj = '-';
		$kodptj='';
		}
		
	return array
		(
			 'ktrgn_jbt' => $ktrgn_jbt,
			 'ktrgn_ptj' => $ktrgn_ptj,
			 'kodptj' => $kodptj
		);
	ocilogoff($c);
	} 
	
	
	public static function DataPentadbirPengajaran($no_staff)
	{
	global $c;
	$date = date("d-M-Y");
	//$no_staff='00011663';	
	
	$sql_data =" SELECT ADM_JNS_ROLE,JBT_KOD_JABATAN ,PTG_KOD_PTJ
				FROM SN_KD_ADMIN_PTJ,SN_KD_PTJ,SN_KD_JBT
				WHERE ADM_NOSTAF='".$no_staff."' 
				AND ADM_MODUL ='MPS' 
				AND PTG_KOD_PTJ=JBT_KOD_PTJ
				AND ADM_PTJ=JBT_KOD_JABATAN
				AND (ADM_TKH_MULA >= TO_DATE('".$date."','dd-mm-yyyy')
				OR ADM_TKH_TAMAT >=  TO_DATE('".$date."','dd-mm-yyyy'))
				 
					";
	//echo $sql_semak5.'<br/>';	
	$sql_data1a = ociparse($c,$sql_data);
	ociexecute($sql_data1a,OCI_DEFAULT);
	if (ocifetch($sql_data1a))
		{
			$leveladmin = ociresult($sql_data1a,"ADM_JNS_ROLE");
			$kodjbtadmin = ociresult($sql_data1a,"JBT_KOD_JABATAN");
			$kodptjadmin = ociresult($sql_data1a,"PTG_KOD_PTJ");
		}
		else
		{
			$leveladmin  = '';
			$kodjbtadmin = '';
			$kodptjadmin = '';
		}
	oci_free_statement($sql_data1a);
	
		return array
			(
		   'leveladmin' => $leveladmin,
		  'kodjbtadmin' => $kodjbtadmin,
		  'kodptjadmin' => $kodptjadmin
			);	
			
	ocilogoff($c);
			
	}
	
	public static function DataPenyandang($kodjbtadmin)
	{
	global $c;
	
	$no_staff='00011663';	
	
	$sql_data =" SELECT BIO_NOSTAF,JWT_KOD_JAWATAN 
				 FROM SN_VW_MAKL_PENYANDANG 
				 WHERE JWT_KOD_JAWATAN IN ('J227','J231') 
				 AND JBT_KOD_JABATAN='".$kodjbtadmin."'
					";
	//echo $sql_semak5.'<br/>';	
	$sql_data1a = ociparse($c,$sql_data);
	ociexecute($sql_data1a,OCI_DEFAULT);
	if (ocifetch($sql_data1a))
		{
			$nogajipelulus = ociresult($sql_data1a,"BIO_NOSTAF");
			$kodjawatan = ociresult($sql_data1a,"JWT_KOD_JAWATAN");
		}
		else
		{
			$nogajipelulus  = '';
			$kodjawatan = '';
			
		}
	oci_free_statement($sql_data1a);
	
		return array
			(
		   'nogajipelulus' => $nogajipelulus,
		  'kodjawatan' => $kodjawatan,
			);	
			
	ocilogoff($c);
			
	}
	
	
	public static function DataJabatanPengajaran($kodptjadmin,$pilihan,$kodjbtadmin,$pilihansemester)
	{
	global $c;
	
	$sql_1='';
	
	if($kodjbtadmin=='XX')
	{
		$cond="AND JBT_KOD_JABATAN LIKE '%%'";
	}
	else
	{
		$cond="AND JBT_KOD_JABATAN LIKE '%".$kodjbtadmin."%'";
	}
	
	$sql_1 = " 	SELECT DISTINCT JBT_KOD_JABATAN,JBT_KTRGN_JABATAN 
				FROM SN_KH_KEPERLUAN_KURSUS,SN_KD_JBT
				WHERE KPK_JABATAN=JBT_KOD_JABATAN
				AND JBT_KOD_PTJ='".$kodptjadmin."'
				$cond
				AND KPK_SESI='".$pilihan."'
				AND KPK_SEM='".$pilihansemester."'
			  ";
			  
	$sql_semak1 = "	SELECT COUNT(*) AS KIRA FROM
					(
					$sql_1
					)	
					";
	//echo $sql_semak1.'<br/>';				
	$sql_semak1a=oci_parse ($c, $sql_semak1);
	oci_execute ($sql_semak1a, OCI_DEFAULT);
	if (oci_fetch($sql_semak1a)) 				
		{
			$bil_1 = ociresult($sql_semak1a,"KIRA");
		}
	//echo $bil_1;
	if ($bil_1 > 0)
		{
		$sql_data1 = "$sql_1";
		
		//echo $sql_data1.'<br/>';				
		$sql_data1a=oci_parse ($c, $sql_data1);
		oci_execute ($sql_data1a, OCI_DEFAULT);
		while (oci_fetch($sql_data1a)) 				
			{
				$kodjabatan[] = ociresult($sql_data1a,"JBT_KOD_JABATAN");
				$ktrgnjabatan[] = ociresult($sql_data1a,"JBT_KTRGN_JABATAN");
			}
		
	return array
		(
			       'bil' => $bil_1,
			'kodjabatan' => $kodjabatan,
		  'ktrgnjabatan' => $ktrgnjabatan
			           
		);
	}
		
	ocilogoff($c);		
	}
	
	public static function DataPTj($pilihanptj)
	{
	global $c;
	
	$sql_1='';
	
	$sql_1 = "SELECT PTG_KOD_PTJ,PTG_KTRGN_PTJ FROM SN_KD_PTJ WHERE PTG_KOD_PTJ='".$pilihanptj."'
			  ";
			  
	$sql_semak1 = "	SELECT COUNT(*) AS KIRA FROM
					(
					$sql_1
					)	
					";
	//echo $sql_semak1.'<br/>';				
	$sql_semak1a=oci_parse ($c, $sql_semak1);
	oci_execute ($sql_semak1a, OCI_DEFAULT);
	if (oci_fetch($sql_semak1a)) 				
		{
			$bil_1 = ociresult($sql_semak1a,"KIRA");
		}
	//echo $bil_1;
	if ($bil_1 > 0)
		{
		$sql_data1 = "$sql_1";
		
		//echo $sql_data1.'<br/>';				
		$sql_data1a=oci_parse ($c, $sql_data1);
		oci_execute ($sql_data1a, OCI_DEFAULT);
		if (oci_fetch($sql_data1a)) 				
			{
				$kodptj = ociresult($sql_data1a,"PTG_KOD_PTJ");
				$ktrgnptj = ociresult($sql_data1a,"PTG_KTRGN_PTJ");
			}
		
	return array
		(
			       'bil' => $bil_1,
			'kodptj' => $kodptj,
		  'ktrgnptj' => $ktrgnptj
			           
		);
	}
		
	ocilogoff($c);		
	}
	
	
	public static function DataSenaraiPermohonan($pilihanjbt,$pilihansesi,$pilihansemester,$kodkursus,$pilihanjawatan,$norujukan)
	{
	global $c;
	
	$sql_1='';
	/*$pilihanjbt='I13';
	$pilihansesi='2017/2018';
	$pilihansemester='1';
	$kodkursus='FAD1009';
	$pilihanjawatan='D';*/
	
	$sql_1 = "	SELECT PSH_ID,PSH_JAWATAN,PSH_UNIT,PSH_JABATAN_AJAR,PSH_SESI,PSH_PERAKUAN,
				PSH_TKH_PERAKUAN,PSH_STATUS_POHON,
				TO_CHAR(PSH_CREATED_DATE,'YYYYMMDDHH24MISS')||'_'||PSH_ID AS NORUJUK,
				PSH_SAH_KJ,
				PSH_SOKONG_KPTJ,
				PSH_SOKONG_KJ_AJAR,
				PSH_SOKONG_KPTJ_AJAR,
				PSH_KATEGORI_JAWATAN,
				PSH_NORUJUK_PENGAJAR
				FROM SN_KH_PENGAJAR_HDR
				WHERE PSH_JABATAN_AJAR='".$pilihanjbt."'
				AND PSH_SESI='".$pilihansesi."'
				AND PSH_SEMESTER='".$pilihansemester."'
				AND PSH_KOD_KURSUS='".$kodkursus."'
				AND PSH_KATEGORI_JAWATAN='".$pilihanjawatan."'
				AND PSH_NORUJUK_IKLAN = '".$norujukan."'
			  ";
			  
	$sql_semak1 = "	SELECT COUNT(*) AS KIRA FROM
					(
					$sql_1
					)	
					";
	//echo $sql_semak1.'<br/>';				
	$sql_semak1a=oci_parse ($c, $sql_semak1);
	oci_execute ($sql_semak1a, OCI_DEFAULT);
	if (oci_fetch($sql_semak1a)) 				
		{
			$bil_1 = ociresult($sql_semak1a,"KIRA");
		}
	//echo $bil_1;
	if ($bil_1 > 0)
		{
		$sql_data1 = "$sql_1";
		
		//echo $sql_data1.'<br/>';				
		$sql_data1a=oci_parse ($c, $sql_data1);
		oci_execute ($sql_data1a, OCI_DEFAULT);
		while (oci_fetch($sql_data1a)) 				
			{
				$idpemohon [] = ociresult($sql_data1a,"PSH_ID");
				$jawatan [] = ociresult($sql_data1a,"PSH_JAWATAN");
				$unit [] = ociresult($sql_data1a,"PSH_UNIT");
				$jabatanajar [] = ociresult($sql_data1a,"PSH_JABATAN_AJAR");
				$sesi [] = ociresult($sql_data1a,"PSH_SESI");
				$akuan [] = ociresult($sql_data1a,"PSH_PERAKUAN");
				$trkhakaun [] = ociresult($sql_data1a,"PSH_TKH_PERAKUAN");
				$statuspohon [] = ociresult($sql_data1a,"PSH_STATUS_POHON");
				$norujuk [] = ociresult($sql_data1a,"NORUJUK");
				$sah_kj[] = ociresult($sql_data1a,"PSH_SAH_KJ");
				$sokong_kptj[] = ociresult($sql_data1a,"PSH_SOKONG_KPTJ");
				$sokong_kj_ajar[] = ociresult($sql_data1a,"PSH_SOKONG_KJ_AJAR");
				$sokong_kptj_ajar[] = ociresult($sql_data1a,"PSH_SOKONG_KPTJ_AJAR");
				$kategori[] = ociresult($sql_data1a,"PSH_KATEGORI_JAWATAN");
				$norujukpengajar[] = ociresult($sql_data1a,"PSH_NORUJUK_PENGAJAR");
			}
		
	return array
		(
			'bil' => $bil_1,
	  'idpemohon' => $idpemohon,
		'jawatan' => $jawatan,
		   'unit' => $unit,
	'jabatanajar' => $jabatanajar,
		   'sesi' => $sesi,
		  'akuan' => $akuan,
	  'trkhakaun' => $trkhakaun,
	'statuspohon' => $statuspohon,
		'norujuk' => $norujuk,
		 'sah_kj' => $sah_kj,
	'sokong_kptj' => $sokong_kptj,
 'sokong_kj_ajar' => $sokong_kj_ajar,
'sokong_kptj_ajar' => $sokong_kptj_ajar,
		'kategori' => $kategori,
 'norujukpengajar' => $norujukpengajar
		);
	}
		
	ocilogoff($c);		
	}
	
	public static function DataStatusPermohonan($status,$sah_kj,$sokong_kptj,$sokong_kj_ajar,$sokong_kptj_ajar)
	{
		 global $c;
	   	 $str = '';
		 $ktrgnstatus='';
		 
		 if($status!='')
		 {
			if($status=='B')
			{	
				
				$ktrgnstatus = '<div class="alert alert-info" align="center">BELUM LENGKAP<br><em>Not Completed</em></div>';
				
			}
			elseif($status=='A1')
			{	
				
				$ktrgnstatus = '<div class="alert alert-info" align="center">DALAM PROSES KETUA JABATAN<br><em>Waiting Approval 
								From Head Department</em></div>';
				
			}
			elseif($status=='A2')
			{	
				
				$ktrgnstatus = '<div class="alert alert-info" align="center">DALAM PROSES DEKAN<br><em>Waiting Approval From Dean</em> </div>';
				 
			}
			elseif($status=='A3')
			{
				
				 $ktrgnstatus = '<div class="alert alert-info" align="center">DALAM PROSES KETUA JABATAN TEMPAT MENGAJAR<br><em>Waiting Approval From Head of Teaching Department</em></div>';
				 
				 
			}
			elseif($status=='A4')
			{
				
				$ktrgnstatus = '<div class="alert alert-info" align="center">DALAM PROSES DEKAN TEMPAT MENGAJAR<br><em>Waiting Approval From Dean of Teaching Department</em></div>';
				 	
			}
			elseif($status=='A')
				{
					$ktrgnstatus = '<div class="alert alert-success" align="center">PERMOHONAN DILULUSKAN<br><em>Application Approved</em></div>';
				}
			elseif($status=='R')
				{
					if($sah_kj=='T')
					{
					$ktrgnstatus = '<div class="alert alert-danger" align="center">PERMOHONAN TIDAK DILULUSKAN OLEH KETUA JABATAN<br><em>Not Approved</em></div>';
					}
					elseif($sokong_kptj=='T')
					{
					$ktrgnstatus = '<div class="alert alert-danger" align="center">PERMOHONAN TIDAK DILULUSKAN DEKAN<br><em>Not Approved</em></div>';
					}
					
					elseif($sokong_kj_ajar=='T')
					{
					$ktrgnstatus = '<div class="alert alert-danger" align="center">PERMOHONAN TIDAK DILULUSKAN OLEH KETUA JABATAN TEMPAT AJAR<br><em>Not Approved</em></div>';
					}
					
					elseif($sokong_kptj_ajar=='T')
					{
					$ktrgnstatus = '<div class="alert alert-danger" align="center">PERMOHONAN TIDAK DILULUSKAN OLEH DEKAN TEMPAT AJAR<br><em>Not Approved</em></div>';
					}
					else
					{
					$ktrgnstatus = '<div class="alert alert-danger" align="center">PERMOHONAN TIDAK DILULUSKAN<br><em>Not Approved</em></div>';
					}
					
				}
			elseif($status=='D')
				{
					$ktrgnstatus = '<div class="alert alert-info" align="center">DALAM PROSES BSM KERANA JUMLAH BEBAN TUGAS MELEBIHI 7 JAM BERDASARKAN SESI DAN SEMESTER<br><em>Waiting Approval From BSM</em></div>';
				}
			elseif($status=='L')
				{
					$ktrgnstatus = '<div class="alert alert-danger" align="center">PERMOHONAN TELAH LUPUT</div>';
				}
			if($status=='C')
			{	
				
				$ktrgnstatus = '<div class="alert alert-danger" align="center">PERMOHONAN DIBATALKAN</div>';
				$ktrgnbi = '<div class="alert alert-danger" align="center"><em>Cancelled</em></div>';
				
			}
			 
		 }
		 else
		 {
				if ($sah_kj == 'A')
				{
				$ktrgnstatus = '<div class="alert alert-info" align="center">
									DALAM PROSES : KETUA JABATAN DITEMPAT  BERKHIDMAT MEMBENARKAN PERMOHONAN</div>';
				}
				
				if ($sah_kj == 'R')
				{
				$ktrgnstatus = '<div class="alert alert-danger" align="center">KETUA JABATAN TIDAK MEMBENARKAN</div>';
				}
				
				if($sokong_kptj=='A')
				{
				$ktrgnstatus = '<div class="alert alert-info" align="center">DALAM PROSES : TELAH DISOKONG OLEH DEKAN DITEMPAT BERKHIDMAT</div>';	
				}
				
				if($sokong_kptj=='R')
				{
				$ktrgnstatus = '<div class="alert alert-danger" align="center">DEKAN TIDAK MEMBENARKAN</div>';
				}
				
				if ($sokong_kj_ajar == 'A')
				{
				$ktrgnstatus = '<div class="alert alert-info" align="center">DALAM PROSES : TELAH DILULUSKAN OLEH KETUA JABATAN PENGAJARAN SAMBILAN</div>';
				}
				
				if ($sokong_kj_ajar == 'R')
				 {
					  $ktrgnstatus = '<div class="alert alert-danger" align="center">TIDAK BERJAYA</div>';
				 }
				 
				if ($sokong_kptj_ajar == 'A')
				{
					$ktrgnstatus = '<div class="alert alert-success" align="center">DILULUSKAN</div>';
				}
				
				 if ($sokong_kptj_ajar == 'R')
				 {
					  $ktrgnstatus =  '<div class="alert alert-danger" align="center">TIDAK BERJAYA</div>';
				 }
				
				if($sah_kj=='' && $sokong_kptj=='' && $sokong_kj_ajar=='' && $sokong_kptj_ajar=='')
				{
					 $ktrgnstatus = '<div class="alert alert-warning" align="center">DALAM PROSES</div>';
				}
			 
			 
		 }
		 
		 return $ktrgnstatus;
		 
		
	}
	
	
	public static function DataDokumen($kodjbtadmin,$norujuk)
	{
	$str = '';
	global $c;
	
	//echo $mode;
	$dok_kira='';
	$d_dok_id ='';
	$d_dok_jns ='';
	$d_dok_nama ='';
	$d_dok_asal ='';
	$d_dok_lokasi ='';
//	$pilihan=str_replace('/','',$pilihan);
	
	//$norujukdok=$pilihan.'_'.$kodjbtadmin.'_'.$pilihankursus.'_'.$pilihansemester.'_'.$kategori;
	
	$sql_semak1= " SELECT COUNT(*) AS KIRA FROM
						(
						SELECT DOK_ID,DOK_NORUJUK,DOK_JNS_FAIL,DOK_LOK_FAIL,
						DOK_NAMA_FAIL,DOK_FAIL_ASAL
						FROM SN_KH_PENGAJAR_DOK 
						WHERE DOK_NORUJUK_IKLAN='".$norujuk."'
						)
						";
							//echo $sql_semak1;
	$sql_semak1a = OCIParse($c,$sql_semak1);
	OCIExecute($sql_semak1a,OCI_DEFAULT);
	if (OCIFetch($sql_semak1a))
		{
			$bil = OCIResult($sql_semak1a,"KIRA");
		}
		
		if($dok_kira != '0')
			{		
			$sql_data2 = "	SELECT DOK_ID,DOK_NORUJUK,DOK_JNS_FAIL,DOK_LOK_FAIL,
							DOK_NAMA_FAIL,DOK_FAIL_ASAL
							FROM SN_KH_PENGAJAR_DOK 
							WHERE DOK_NORUJUK_IKLAN='".$norujuk."'
							";
									
		//echo $sql_data2.'<br/><br/>';
			$sql_data2a = OCIParse($c,$sql_data2);
			OCIExecute($sql_data2a,OCI_DEFAULT);
			while(OCIFetch($sql_data2a))
				{
					$d_dok_id [] = OCIResult($sql_data2a,"DOK_ID");
				   $d_dok_jns []= OCIResult($sql_data2a,"DOK_JNS_FAIL");
				  $d_dok_nama []= OCIResult($sql_data2a,"DOK_NAMA_FAIL");
				  $d_dok_asal []= OCIResult($sql_data2a,"DOK_FAIL_ASAL");
				$d_dok_lokasi []= OCIResult($sql_data2a,"DOK_LOK_FAIL");
		
		//$str.=	$d_dok_jns.'';
				}
				
			return array
			(
				'dok_kira' => $bil ,
				'd_dok_id' => $d_dok_id,
				'd_dok_jns' => $d_dok_jns,
				'd_dok_nama' => $d_dok_nama,
				'd_dok_asal' => $d_dok_asal,
				'd_dok_lokasi' => $d_dok_lokasi
			           
			);
				
			}
	return $str;
	ocilogoff($c);
	}
	
	
	
	public static function DataSenaraiJabatan($kodptjadmin,$kodjbtadmin,$pilihan,$flag,$pilihansemester)
	{
	$str = '';
	global $c;
	
	//$pilihan='2017/2018';
	//$kodjbtadmin='F05';
	$bil_1='';
	$idpemohon ='';
	$jawatan ='';
	$unit ='';
	$jabatanajar ='';
	$sesi ='';
	$akuan ='';
	$trkhakaun ='';
	$statuspohon='';
	$norujuk ='';
	$sah_kj='';
	$sokong_kptj='';
	$sokong_kj_ajar='';
	$sokong_kptj_ajar='';
	$kategori='';
	$kodkursus='';
	$jumbeban='';
	$semester='';
	$sahterima='';
	$trkhterima='';
	$sahemel='';
	$trkhemel='';
	$sebabbatal='';
	$trkhbatal ='';
	
	
	
	if($kodjbtadmin=='XX')
	{
		$kodjbtadmin='';	
	}
	else
	{
		$kodjbtadmin=$kodjbtadmin;	
	}
	
	if($flag=='')
	{
	$data1="    SELECT EMP_NAME,DEPARTMENT_DESC,POSITION_DESC,UNIT_CODE,PTJ_DESC,RKH_TARAF_KHIDMAT,
				PSH_ID,PSH_JAWATAN,PSH_UNIT,PSH_JABATAN_AJAR,PSH_SESI,PSH_PERAKUAN,
				PSH_TKH_PERAKUAN,PSH_STATUS_POHON,PSH_KOD_KURSUS,PSH_SEMESTER,PSH_JUM_BEBAN_AJAR,
				PSH_NORUJUK_PENGAJAR AS NORUJUK,
				PSH_SAH_KJ,
				PSH_SOKONG_KPTJ,
				PSH_SOKONG_KJ_AJAR,
				PSH_SOKONG_KPTJ_AJAR,
				PSH_KATEGORI_JAWATAN,
				DEPARTMENT_CODE,
				PSH_SAH_TERIMA,
				TO_CHAR(PSH_TKH_SAH_TERIMA,'DD MON YYYY') PSH_TKH_SAH_TERIMA,
				PSH_HANTAR_EMEL,
				TO_CHAR(PSH_TKH_HANTAR_EMEL,'DD MON YYYY') PSH_TKH_HANTAR_EMEL,
				PSH_SEBAB_PEMBATALAN,
				TO_CHAR(PSH_TKH_PEMBATALAN,'DD MON YYYY') PSH_TKH_PEMBATALAN
				FROM SN_KH_PENGAJAR_HDR,RESEARCH_MANAGE_IS_V
				WHERE PSH_ID=EMP_NO
				AND PSH_SESI='".$pilihan."'
				AND PSH_SEMESTER='".$pilihansemester."'
				AND DEPARTMENT_CODE LIKE '%".$kodjbtadmin."%'
				AND PTJ_CODE = '".$kodptjadmin."'
			";
	}
	else
	{
	$data1="    SELECT PSH_ID,PSH_JAWATAN,PSH_UNIT,PSH_JABATAN_AJAR,PSH_SESI,PSH_PERAKUAN,
				PSH_TKH_PERAKUAN,PSH_STATUS_POHON,PSH_KOD_KURSUS,PSH_SEMESTER,PSH_JUM_BEBAN_AJAR,
				PSH_NORUJUK_PENGAJAR AS NORUJUK,
				PSH_SAH_KJ,
				PSH_SOKONG_KPTJ,
				PSH_SOKONG_KJ_AJAR,
				PSH_SOKONG_KPTJ_AJAR,
				PSH_KATEGORI_JAWATAN,
				PSH_SAH_TERIMA,
				TO_CHAR(PSH_TKH_SAH_TERIMA,'DD MON YYYY') PSH_TKH_SAH_TERIMA,
				PSH_HANTAR_EMEL,
				TO_CHAR(PSH_TKH_HANTAR_EMEL,'DD MON YYYY') PSH_TKH_HANTAR_EMEL,
				PSH_SEBAB_PEMBATALAN,
				TO_CHAR(PSH_TKH_PEMBATALAN,'DD MON YYYY') PSH_TKH_PEMBATALAN
				FROM SN_KH_PENGAJAR_HDR,SN_KD_JBT
				WHERE  PSH_SESI='".$pilihan."'
				AND PSH_SEMESTER='".$pilihansemester."'
				AND PSH_JABATAN_AJAR LIKE '%".$kodjbtadmin."%'
				AND PSH_JABATAN_AJAR=JBT_KOD_JABATAN
				AND JBT_KOD_PTJ='".$kodptjadmin."'
			";	
	}
	
	
	$sql_semak1= " SELECT COUNT(*) AS KIRA FROM
					(
					$data1
					)
						";
	//echo $sql_semak1;
	$sql_semak1a = OCIParse($c,$sql_semak1);
	OCIExecute($sql_semak1a,OCI_DEFAULT);
	if (OCIFetch($sql_semak1a))
		{
			$bil_1 = OCIResult($sql_semak1a,"KIRA");
		}
		
		//echo "<< $bil_1";
		
		if($bil_1 != '0')
			{		
			$sql_data2 = "$data1";
									
		//echo $sql_data2.'<br/><br/>';
			$sql_data2a = OCIParse($c,$sql_data2);
			OCIExecute($sql_data2a,OCI_DEFAULT);
			while (oci_fetch($sql_data2a)) 				
			{
				$idpemohon [] = ociresult($sql_data2a,"PSH_ID");
				  $jawatan [] = ociresult($sql_data2a,"PSH_JAWATAN");
				     $unit [] = ociresult($sql_data2a,"PSH_UNIT");
			  $jabatanajar [] = ociresult($sql_data2a,"PSH_JABATAN_AJAR");
				     $sesi [] = ociresult($sql_data2a,"PSH_SESI");
				    $akuan [] = ociresult($sql_data2a,"PSH_PERAKUAN");
				$trkhakaun [] = ociresult($sql_data2a,"PSH_TKH_PERAKUAN");
			  $statuspohon [] = ociresult($sql_data2a,"PSH_STATUS_POHON");
				  $norujuk [] = ociresult($sql_data2a,"NORUJUK");
				    $sah_kj[] = ociresult($sql_data2a,"PSH_SAH_KJ");
			   $sokong_kptj[] = ociresult($sql_data2a,"PSH_SOKONG_KPTJ");
			$sokong_kj_ajar[] = ociresult($sql_data2a,"PSH_SOKONG_KJ_AJAR");
		  $sokong_kptj_ajar[] = ociresult($sql_data2a,"PSH_SOKONG_KPTJ_AJAR");
				  $kategori[] = ociresult($sql_data2a,"PSH_KATEGORI_JAWATAN");
				 $kodkursus[] = ociresult($sql_data2a,"PSH_KOD_KURSUS");
				  $jumbeban[] = ociresult($sql_data2a,"PSH_JUM_BEBAN_AJAR");
				  $semester[] = ociresult($sql_data2a,"PSH_SEMESTER");
				 $sahterima[] = ociresult($sql_data2a,"PSH_SAH_TERIMA");
				$trkhterima[] = ociresult($sql_data2a,"PSH_TKH_SAH_TERIMA");
				   $sahemel[] = ociresult($sql_data2a,"PSH_HANTAR_EMEL");
				  $trkhemel[] = ociresult($sql_data2a,"PSH_TKH_HANTAR_EMEL");
				$sebabbatal[] = ociresult($sql_data2a,"PSH_SEBAB_PEMBATALAN");
				 $trkhbatal[] = ociresult($sql_data2a,"PSH_TKH_PEMBATALAN");
			}
		}
		
	return array
		(
		   'bil_1' => $bil_1,
	  'idpemohon' => $idpemohon,
		'jawatan' => $jawatan,
		   'unit' => $unit,
	'jabatanajar' => $jabatanajar,
		   'sesi' => $sesi,
		  'akuan' => $akuan,
	  'trkhakaun' => $trkhakaun,
	'statuspohon' => $statuspohon,
		'norujuk' => $norujuk,
		 'sah_kj' => $sah_kj,
	'sokong_kptj' => $sokong_kptj,
 'sokong_kj_ajar' => $sokong_kj_ajar,
'sokong_kptj_ajar' => $sokong_kptj_ajar,
		'kategori' => $kategori,
	   'kodkursus' => $kodkursus,
		'jumbeban' => $jumbeban,
		'semester' => $semester,
	   'sahterima' => $sahterima,
	  'trkhterima' => $trkhterima,
	  	 'sahemel' => $sahemel,
	    'trkhemel' => $trkhemel,
	  'sebabbatal' => $sebabbatal,
	   'trkhbatal' => $trkhbatal
		);
				
	return $str;
	ocilogoff($c);
	}
	
	
	public static function DataPermohonanDetail($no_staff_pemohonan,$norujukan)
	{
	global $c;
	
	$sql = "SELECT PSH_ID, CPG_NAMA AS NAMA, PSH_STATUS_POHON AS STATUS, PSH_SESI, PSH_KOD_KURSUS, 
			PSH_SEMESTER, PSH_SESI, PSH_KATEGORI_JAWATAN, 
			TO_CHAR(PSH_TKH_PERAKUAN, 'dd Mon yyyy') AS TARIKHMOHON,
			PSH_PERAKUAN,
			PSH_JAWATAN, PSH_UNIT, CPG_JAWATAN_SEKARANG AS JAWATAN, PSH_JUM_BEBAN_AJAR, '' AS JABATAN, '' AS PTJ, 
			TO_CHAR(CPG_TKH_LAHIR, 'DD MON YYYY') AS TARIKH_LAHIR, CPG_TEL_HP AS NO_HP, CPG_EMEL AS EMEL,
			CPG_TMPT_LAHIR AS TEMPAT_LAHIR, CPG_JANTINA AS JANTINA, CPG_NOKP AS NO_KP, 
			CPG_WARGANEGARA AS WARGANEGARA,
			CPG_ALMT_SURAT1 AS ALAMAT1, CPG_ALMT_SURAT2 AS ALAMAT2, CPG_POSKOD_SURAT AS POSKOD,
			CPG_BANDAR_SURAT AS BANDAR, CPG_NEGERI_SURAT AS NEGERI_ALAMAT,
			TO_CHAR(SYSDATE, 'YYYY') - TO_CHAR(CPG_TKH_LAHIR, 'YYYY') AS UMUR, 
			CPG_JAWATAN_SEKARANG AS JWTN_SEKARANG, 
			CPG_KHIDMAT_KERAJAAN AS KHIDMAT_KRJN,
			CPG_MAJIKAN_NAMA AS MAJIKAN,
			PSH_JABATAN_AJAR, 
			PSH_NOSTAF_KJ,
			PSH_SAH_KJ,
			TO_CHAR(PSH_TKH_SAH_KJ,'dd Mon yyyy') as PSH_TKH_SAH_KJ,
			PSH_JAM_SEMINGGU,
			PSH_SOKONG_KPTJ,
			PSH_NOSTAF_KPTJ,
			TO_CHAR(PSH_TKH_SOKONG_KPTJ,'dd Mon yyyy') as PSH_TKH_SOKONG_KPTJ,
			PSH_NOSTAF_KJ_AJAR,
			PSH_SOKONG_KJ_AJAR,
			TO_CHAR(PSH_TKH_SOKONG_KJ_AJAR,'dd Mon yyyy') as PSH_TKH_SOKONG_KJ_AJAR,
			PSH_NOSTAF_KPTJ_AJAR,
			PSH_SOKONG_KPTJ_AJAR,
			TO_CHAR(PSH_TKH_SOKONG_KPTJ_AJAR,'dd Mon yyyy') as PSH_TKH_SOKONG_KPTJ_AJAR,
			PSH_SAH_TERIMA AS SAH_TERIMA,
			PSH_NORUJUK_IKLAN,
			PSH_NORUJUK_PENGAJAR,
			PSH_NOSTAF_BSM,
			PSH_LULUS_BSM,
			PSH_TKH_BSM,
			PSH_ULASAN_BSM,
			PSH_ULASAN_KJ,
			PSH_ULASAN_KPTJ,
			PSH_ULASAN_KJ_AJAR,
			PSH_ULASAN_KPTJ_AJAR,
			PSH_KUMPULAN_SEQ,
			PSH_STATUS_POHON,
			TO_CHAR(PSH_TKH_SAH_TERIMA,'dd Mon yyyy') as PSH_TKH_SAH_TERIMA,
			PSH_SAH_TERIMA
			FROM SN_KH_PENGAJAR_HDR, SN_KH_CALON_PENGAJAR
			WHERE PSH_ID = CPG_NOKP
			AND PSH_NORUJUK_PENGAJAR = '".$norujukan."'
			AND PSH_ID='".$no_staff_pemohonan."'
			UNION 
			SELECT PSH_ID, BIO_NAMA AS NAMA, PSH_STATUS_POHON AS STATUS, PSH_SESI, 
			PSH_KOD_KURSUS, PSH_SEMESTER, PSH_SESI, PSH_KATEGORI_JAWATAN,
			TO_CHAR(PSH_TKH_PERAKUAN, 'dd Mon yyyy') AS TARIKHMOHON, 
			PSH_PERAKUAN,
			PSH_JAWATAN, PSH_UNIT, JWT_KTRGN_JAWATAN, PSH_JUM_BEBAN_AJAR, JBT_KTRGN_JABATAN, PTG_KTRGN_PTJ, 
			TO_CHAR(BIO_TKH_LAHIR, 'DD MON YYYY') AS TARIKH_LAHIR, BIO_NO_HP, BIO_USERID_UMMAIL,
			BIO_TEMPAT_LAHIR, BIO_JANTINA, BIO_IC_BARU, BIO_NEGARA_ASAL AS WARGANEGARA,
			BIO_ALAMAT_SEMASA_1, BIO_ALAMAT_SEMASA_2, BIO_POSKOD_SEMASA, 
			BIO_BANDAR_SEMASA, BIO_NEGERI_SEMASA,
			TO_CHAR(SYSDATE, 'YYYY') - TO_CHAR(BIO_TKH_LAHIR, 'YYYY') AS UMUR, RKH_JAWATAN_HAKIKI, '' AS KHIDMAT_KRJN,
			'' AS MAJIKAN,
			PSH_JABATAN_AJAR, 
			PSH_NOSTAF_KJ,
			PSH_SAH_KJ,
			TO_CHAR(PSH_TKH_SAH_KJ,'dd Mon yyyy') as PSH_TKH_SAH_KJ,
			PSH_JAM_SEMINGGU,
			PSH_SOKONG_KPTJ,
			PSH_NOSTAF_KPTJ,
			TO_CHAR(PSH_TKH_SOKONG_KPTJ,'dd Mon yyyy') as PSH_TKH_SOKONG_KPTJ,
			PSH_NOSTAF_KJ_AJAR,
			PSH_SOKONG_KJ_AJAR,
			TO_CHAR(PSH_TKH_SOKONG_KJ_AJAR,'dd Mon yyyy') as PSH_TKH_SOKONG_KJ_AJAR,
			PSH_NOSTAF_KPTJ_AJAR,
			PSH_SOKONG_KPTJ_AJAR,
			TO_CHAR(PSH_TKH_SOKONG_KPTJ_AJAR,'dd Mon yyyy') as PSH_TKH_SOKONG_KPTJ_AJAR,
			PSH_SAH_TERIMA AS SAH_TERIMA,
			PSH_NORUJUK_IKLAN,
			PSH_NORUJUK_PENGAJAR,
			PSH_NOSTAF_BSM,
			PSH_LULUS_BSM,
			PSH_TKH_BSM,
			PSH_ULASAN_BSM,
			PSH_ULASAN_KJ,
			PSH_ULASAN_KPTJ,
			PSH_ULASAN_KJ_AJAR,
			PSH_ULASAN_KPTJ_AJAR,
			PSH_KUMPULAN_SEQ,
			PSH_STATUS_POHON,
			TO_CHAR(PSH_TKH_SAH_TERIMA,'dd Mon yyyy') as PSH_TKH_SAH_TERIMA,
			PSH_SAH_TERIMA
			FROM SN_KH_PENGAJAR_HDR, SN_PA_BIODATA, SN_PA_SUMM_KHIDMAT, SN_KD_JAWAT, SN_KD_JBT, SN_KD_PTJ
			WHERE PSH_ID = BIO_NOSTAF 
			AND PSH_NORUJUK_PENGAJAR = '".$norujukan."'
			AND PSH_ID='".$no_staff_pemohonan."'
			AND BIO_NOSTAF = RKH_NOSTAF
			AND RKH_JAWATAN_HAKIKI = JWT_KOD_JAWATAN
			AND PSH_UNIT = JBT_KOD_JABATAN
			AND JBT_KOD_PTJ = PTG_KOD_PTJ
			";
	
	
	$sql_semak1 = "	SELECT COUNT(PSH_ID) AS KIRA FROM
					(
					$sql
					)	
					";
	
	//echo $sql_semak1.'<br/>';				
	$sql_semak1a=oci_parse ($c, $sql_semak1);
	oci_execute ($sql_semak1a, OCI_DEFAULT);
	if (oci_fetch($sql_semak1a)) 				
		{
			$bil_1 = ociresult($sql_semak1a,"KIRA");
		}
	
	if ($bil_1 != 0)
		{
		$sql_data1 = "$sql";
		
		//echo $sql_data1.'<br/>';				
		$sql_data1a=oci_parse ($c, $sql_data1);
		oci_execute ($sql_data1a, OCI_DEFAULT);
		if (oci_fetch($sql_data1a)) 				
			{
				    $id = ociresult($sql_data1a,"PSH_ID");
				  $nama = ociresult($sql_data1a,"NAMA");
				$status = ociresult($sql_data1a,"STATUS");
				  $sesi = ociresult($sql_data1a,"PSH_SESI");
			$kod_kursus = ociresult($sql_data1a,"PSH_KOD_KURSUS");
			       $sem = ociresult($sql_data1a,"PSH_SEMESTER");
			      $sesi = ociresult($sql_data1a,"PSH_SESI");
		          $gred = ociresult($sql_data1a,"PSH_JAWATAN");
			 $ktrgn_ptj = ociresult($sql_data1a,"PSH_UNIT");
			   $jawatan = ociresult($sql_data1a,"JAWATAN");
	   $jum_beban_tugas = ociresult($sql_data1a,"PSH_JUM_BEBAN_AJAR");
	           $jabatan = ociresult($sql_data1a,"JABATAN");
			       $ptj = ociresult($sql_data1a,"PTJ");
	     $kategori_jwtn = ociresult($sql_data1a,"PSH_KATEGORI_JAWATAN");
		  $tarikh_lahir = ociresult($sql_data1a,"TARIKH_LAHIR");
		  $tempat_lahir = ociresult($sql_data1a,"TEMPAT_LAHIR");
		       $jantina = ociresult($sql_data1a,"JANTINA");
			     $no_kp = ociresult($sql_data1a,"NO_KP");
	  	   $warganegara = ociresult($sql_data1a,"WARGANEGARA");
		         $no_hp = ociresult($sql_data1a,"NO_HP");
				  $emel = ociresult($sql_data1a,"EMEL");
			   $alamat1 = ociresult($sql_data1a,"ALAMAT1");
		       $alamat2 = ociresult($sql_data1a,"ALAMAT2");
	  	        $poskod = ociresult($sql_data1a,"POSKOD");
		        $bandar = ociresult($sql_data1a,"BANDAR");
		 $negeri_alamat = ociresult($sql_data1a,"NEGERI_ALAMAT");
		          $umur = ociresult($sql_data1a,"UMUR");
	     $jwtn_sekarang = ociresult($sql_data1a,"JWTN_SEKARANG");
			  $kerajaan = ociresult($sql_data1a,"KHIDMAT_KRJN");
		      $jbt_ajar = ociresult($sql_data1a,"PSH_JABATAN_AJAR");
	        $sah_terima = ociresult($sql_data1a,"SAH_TERIMA");
			  $perakuan = ociresult($sql_data1a,"PSH_PERAKUAN");
			$tarikpohon = ociresult($sql_data1a,"TARIKHMOHON");
		  $norujukiklan = ociresult($sql_data1a,"PSH_NORUJUK_IKLAN");
		     $norujukan = ociresult($sql_data1a,"PSH_NORUJUK_PENGAJAR");
			 $nostafkj  = ociresult($sql_data1a,"PSH_NOSTAF_KJ");
			    $sahkj  = ociresult($sql_data1a,"PSH_SAH_KJ");
			$trkhsahkj  = ociresult($sql_data1a,"PSH_TKH_SAH_KJ");
			 $ulasankj  = ociresult($sql_data1a,"PSH_ULASAN_KJ");
		   $nostafkptj  = ociresult($sql_data1a,"PSH_NOSTAF_KPTJ");
		   	  $sahkptj  = ociresult($sql_data1a,"PSH_SOKONG_KPTJ");
		  $trkhsahkptj  = ociresult($sql_data1a,"PSH_TKH_SOKONG_KPTJ");
		   $ulasankptj  = ociresult($sql_data1a,"PSH_ULASAN_KPTJ");
		 $nostafkjajar  = ociresult($sql_data1a,"PSH_NOSTAF_KJ_AJAR");
			$sahkjajar  = ociresult($sql_data1a,"PSH_SOKONG_KJ_AJAR");
		$trkhsahkjajar  = ociresult($sql_data1a,"PSH_TKH_SOKONG_KJ_AJAR");
		 $ulasankjajar  = ociresult($sql_data1a,"PSH_ULASAN_KJ_AJAR");
	   $nostafkptjajar  = ociresult($sql_data1a,"PSH_NOSTAF_KPTJ_AJAR");
		  $sahkptjajar  = ociresult($sql_data1a,"PSH_SOKONG_KPTJ_AJAR");
	   $trkhsahkptjajar = ociresult($sql_data1a,"PSH_TKH_SOKONG_KPTJ_AJAR");
	   $ulasankptjajar  = ociresult($sql_data1a,"PSH_ULASAN_KPTJ_AJAR");
			$nostafbsm  = ociresult($sql_data1a,"PSH_NOSTAF_BSM");
		   	   $sahbsm  = ociresult($sql_data1a,"PSH_LULUS_BSM");
		   $trkhsahbsm  = ociresult($sql_data1a,"PSH_TKH_BSM");
			$ulasanbsm  = ociresult($sql_data1a,"PSH_ULASAN_BSM");
		 $norujukanseq  = ociresult($sql_data1a,"PSH_KUMPULAN_SEQ");
		  $statuspohon  = ociresult($sql_data1a,"PSH_STATUS_POHON");
		 $tarikhterima  = ociresult($sql_data1a,"PSH_TKH_SAH_TERIMA");
		    $sahterima  = ociresult($sql_data1a,"PSH_SAH_TERIMA");
		      $majikan  = ociresult($sql_data1a,"MAJIKAN");
			}
		}
	else
		{
				    $id = '';
				  $nama = '';
				$status = '';
				  $sesi = '';
			$kod_kursus = '';
			       $sem = '';
			      $sesi = '';
		          $gred = '';
			 $ktrgn_ptj = '';
			   $jawatan = '';
	   $jum_beban_tugas = '';
	           $jabatan = '';
			       $ptj = '';
		 $kategori_jwtn = '';
		  $tarikh_lahir = '';
	      $tempat_lahir = '';
		       $jantina = '';
			     $no_kp = '';
	  	   $warganegara = '';
		         $no_hp = '';
				  $emel = '';
		  	   $alamat1 = '';
			   $alamat2 = '';
	  	        $poskod = '';
		        $bandar = '';
		 $negeri_alamat = '';
		          $umur = '';
	     $jwtn_sekarang = '';
		      $kerajaan = '';
			  $jbt_ajar = '';
			  $nostafkj = '';
			     $sahkj = '';
	         $trkhsahkj = '';
			 $ulasankj  = '';
		   $nostafkptj  = '';
		   	  $sahkptj  = '';
		  $trkhsahkptj  = '';
		    $ulasankptj = '';
		 $nostafkjajar  = '';
			$sahkjajar  = '';
		$trkhsahkjajar  = '';
		  $ulasankjajar = '';
	    $nostafkptjajar = '';
		  $sahkptjajar  = '';
	   $trkhsahkptjajar = '';
	   $ulasankptjajar  = '';
			$nostafbsm  = '';
		   	   $sahbsm  = '';
		   $trkhsahbsm  = '';
			 $ulasanbsm = '';
		  $norujukanseq = '';
		  $statuspohon = '';
		  $sah_terima = '';
		  $perakuan = '';
		  $norujukiklan  = '';
		  $tarikpohon = '';
		   $norujukan = '';
		  $tarikhterima = '';
		  $sahterima = '';
		   $majikan  = '';
			 // $tkh_sah = '';
	        
		}
		
	return array
			(
				   'bil' => $bil_1,
				    'id' => $id,
				  'nama' => $nama,
				'status' => $status,
				  'sesi' => $sesi,
			'kod_kursus' => $kod_kursus,
			       'sem' => $sem,
			      'sesi' => $sesi,
		          'gred' => $gred,
		     'ktrgn_ptj' => $ktrgn_ptj,
			   'jawatan' => $jawatan,
	   'jum_beban_tugas' => $jum_beban_tugas,
	           'jabatan' => $jabatan,
			       'ptj' => $ptj,
	     'kategori_jwtn' => $kategori_jwtn,
		  'tarikh_lahir' => $tarikh_lahir,
		  'tempat_lahir' => $tempat_lahir,
		       'jantina' => $jantina,
			     'no_kp' => $no_kp,
	   	   'warganegara' => $warganegara,
		         'no_hp' => $no_hp,
				  'emel' => $emel,
			   'alamat1' => $alamat1,
			   'alamat2' => $alamat2 ,
	  	        'poskod' => $poskod,
		        'bandar' => $bandar,
		 'negeri_alamat' => $negeri_alamat,
		          'umur' => $umur,
  	     'jwtn_sekarang' => $jwtn_sekarang,
		      'kerajaan' => $kerajaan,
			  'jbt_ajar' => $jbt_ajar,
			'sah_terima' => $sah_terima,
			  'perakuan' => $perakuan,
		  'norujukiklan' => $norujukiklan,
		    'tarikpohon' => $tarikpohon,
			 'norujukan' => $norujukan,
			  'nostafkj' => $nostafkj,
		         'sahkj' => $sahkj,
		     'trkhsahkj' => $trkhsahkj,
		      'ulasankj' => $ulasankj,
		    'nostafkptj' => $nostafkptj,
		       'sahkptj' => $sahkptj,
		   'trkhsahkptj' => $trkhsahkptj,
		    'ulasankptj' => $ulasankptj,
	      'nostafkjajar' => $nostafkjajar,
		     'sahkjajar' => $sahkjajar,
	     'trkhsahkjajar' => $trkhsahkjajar,
	      'ulasankjajar' => $ulasankjajar,	  
	    'nostafkptjajar' => $nostafkptjajar,
		   'sahkptjajar' => $sahkptjajar,
       'trkhsahkptjajar' => $trkhsahkptjajar,
	    'ulasankptjajar' => $ulasankptjajar,	   
	         'nostafbsm' => $nostafbsm,
		        'sahbsm' => $sahbsm,
		    'trkhsahbsm' => $trkhsahbsm,
		     'ulasanbsm' => $ulasanbsm, 
		  'norujukanseq' => $norujukanseq,
		  'statuspohon' => $statuspohon,
		  'tarikhterima' => $tarikhterima,
		  'sahterima' => $sahterima,
		  'majikan' => $majikan
			   //'tkh_sah' => $tkh_sah
			);
		
	ocilogoff($c);	
	}
	
	
	//MPS_DATA
	
	public static function DataNegara($negara)
	{
		
		global $c;	
		$str = '';
		
		//$no_staff='00001634';
		
		if($negara=='')
		{
		$sql_semak1= " 	SELECT COUNT(*) AS KIRA FROM
						(
						SELECT NGA_KOD_NEGARA,NGA_KTRGN_NEGARA FROM SN_KD_NGA
						order by NGA_KTRGN_NEGARA asc
						)
						";
		}
		else
		{
		$sql_semak1= " 	SELECT COUNT(*) AS KIRA FROM
						(
						SELECT NGA_KOD_NEGARA,NGA_KTRGN_NEGARA FROM SN_KD_NGA
						WHERE NGA_KOD_NEGARA='".$negara."'
						)
						";
		}
		//echo $sql_semak1.'<br/>';exit;
		$sql_semak1a = oci_parse($c,$sql_semak1);
		oci_execute($sql_semak1a,OCI_DEFAULT);
		if (oci_fetch($sql_semak1a))
		{
			$bil_1 = oci_result($sql_semak1a,"KIRA");
		}
		oci_free_statement($sql_semak1a);
	
		if ($bil_1 != '0')
		{
		
		if($negara=='')
		{
		$sql_data1= " SELECT NGA_KOD_NEGARA,NGA_KTRGN_NEGARA FROM SN_KD_NGA
						order by NGA_KTRGN_NEGARA asc
						
						";
		}
		else
		{
		$sql_data1 = "SELECT NGA_KOD_NEGARA,NGA_KTRGN_NEGARA FROM SN_KD_NGA
						WHERE NGA_KOD_NEGARA='".$negara."'
						";
		}//echo $sql_data1.'<br>'; 					
			$sql_data1a = oci_parse($c,$sql_data1);
			oci_execute($sql_data1a,OCI_DEFAULT);
			while(oci_fetch($sql_data1a))
			{ 			
			
					 $kodnegara[] = oci_result($sql_data1a,"NGA_KOD_NEGARA");
				   $ktrgnnegara[] = oci_result($sql_data1a,"NGA_KTRGN_NEGARA");
					   
						 
			}
			
			
			
			oci_free_statement($sql_data1a);
	
			return array ( 
				'bil_1' => $bil_1, 
				 'kodnegara' => $kodnegara, 
			      'ktrgnnegara' => $ktrgnnegara
			       );
		}
		
	ocilogoff($c);
	}
	
	public static function DataPengajaranSemasa($no_staff_pemohonan,$sesi,$sem)
	{
		
		global $c;	
		$str = '';
		
		$data=" SELECT ROWIDTOCHAR(ROWID) AS ROW_ID,PSD_JABATAN_AJAR,PSD_KOD_KURSUS,
                PSD_JAM_MINGGU,PSD_SESI,
                PSD_SEM ,PSD_STATUS_LULUS,
                TO_CHAR(PSD_TKH_LULUS,'dd Mon yyyy') PSD_TKH_LULUS
                FROM SN_KH_PENGAJAR_DTL
                WHERE PSD_SESI='".$sesi."'
                AND PSD_SEM='".$sem."'
                AND PSD_ID='".$no_staff_pemohonan."'
                AND PSD_STATUS_LULUS IN ('Y','S','A')
				";
		
			
		$sql_semak1 = "	SELECT COUNT(*) AS KIRA FROM
						(
						$data
						)	
					";
	//echo $sql_semak1.'<br/>';				
	$sql_semak1a=oci_parse ($c, $sql_semak1);
	oci_execute ($sql_semak1a, OCI_DEFAULT);
	if (oci_fetch($sql_semak1a)) 				
	{
		$bil_1 = ociresult($sql_semak1a,"KIRA");
	}

	if ($bil_1 != 0)
	{
	$sql_data1 = "$data";
	//echo $sql_data1.'<br/>';				
	$sql_data1a=oci_parse ($c, $sql_data1);
	oci_execute ($sql_data1a, OCI_DEFAULT);
	while (oci_fetch($sql_data1a)) 				
	{
		   $jabatan [] = ociresult($sql_data1a,"PSD_JABATAN_AJAR");
		 $kodkursus [] = ociresult($sql_data1a,"PSD_KOD_KURSUS");
	   $jamseminggu [] = ociresult($sql_data1a,"PSD_JAM_MINGGU");
		 $sesi_staf [] = ociresult($sql_data1a,"PSD_SESI");
	  	  $semester [] = ociresult($sql_data1a,"PSD_SEM");
		 $trkhlulus [] = ociresult($sql_data1a,"PSD_TKH_LULUS");
		    $status [] = ociresult($sql_data1a,"PSD_STATUS_LULUS");
			 $rowid [] = ociresult($sql_data1a,"ROW_ID");
	}
	
			return array (
				  'bil_1' => $bil_1, 
				'jabatan' => $jabatan, 
			  'kodkursus' => $kodkursus, 
			'jamseminggu' => $jamseminggu,
			  'sesi_staf' => $sesi_staf,
			   'semester' => $semester,
			  'trkhlulus' => $trkhlulus,
			     'status' => $status,
				  'rowid' => $rowid
						);
	ocilogoff($c);
	
	ocifreestatement($sql_data1a);
	}
	}
	
	
	public static function DataPengajaranDtl($no_staff,$rowid)
	{
		
		global $c;	
		$str = '';
		
		$rowid=str_replace(" ","+",$rowid);
		
		$data=" SELECT ROWIDTOCHAR(ROWID) AS ROW_ID,PSD_JABATAN_AJAR,PSD_KOD_KURSUS,
				PSD_JAM_MINGGU,PSD_JAM_SEM,PSD_SESI,PSD_KULIAH,PSD_TUTORIAL,PSD_AMALI,
				PSD_KERTAS_SOALAN,PSD_PERIKSA_SKRIP,
				PSD_SEM ,PSD_STATUS_LULUS,PSD_ALASAN,
				TO_CHAR(PSD_TKH_LULUS,'dd Mon yyyy') PSD_TKH_LULUS
				FROM SN_KH_PENGAJAR_DTL
				WHERE PSD_STATUS_LULUS IN ('Y','S','A')
				AND ROWID='".$rowid."'
				";
		
			
		$sql_semak1 = "	SELECT COUNT(*) AS KIRA FROM
						(
						$data
						)	
					";
	//echo $sql_semak1.'<br/>';				
	$sql_semak1a=oci_parse ($c, $sql_semak1);
	oci_execute ($sql_semak1a, OCI_DEFAULT);
	if (oci_fetch($sql_semak1a)) 				
	{
		$bil_1 = ociresult($sql_semak1a,"KIRA");
	}

	if ($bil_1 != 0)
	{
	$sql_data1 = "$data";
	//echo $sql_data1.'<br/>';				
	$sql_data1a=oci_parse ($c, $sql_data1);
	oci_execute ($sql_data1a, OCI_DEFAULT);
	if (oci_fetch($sql_data1a)) 				
	{
		   $jabatan  = ociresult($sql_data1a,"PSD_JABATAN_AJAR");
		 $kodkursus  = ociresult($sql_data1a,"PSD_KOD_KURSUS");
	   $jamseminggu  = ociresult($sql_data1a,"PSD_JAM_MINGGU");
	        $jamsem  = ociresult($sql_data1a,"PSD_JAM_SEM");
		 $sesi_staf  = ociresult($sql_data1a,"PSD_SESI");
	  	  $semester  = ociresult($sql_data1a,"PSD_SEM");
		 $trkhlulus  = ociresult($sql_data1a,"PSD_TKH_LULUS");
		    $status  = ociresult($sql_data1a,"PSD_STATUS_LULUS");
			$kuliah  = ociresult($sql_data1a,"PSD_KULIAH");
		  $toturial  = ociresult($sql_data1a,"PSD_TUTORIAL");
			 $amali  = ociresult($sql_data1a,"PSD_AMALI");
			$soalan  = ociresult($sql_data1a,"PSD_KERTAS_SOALAN");
			 $skrin  = ociresult($sql_data1a,"PSD_PERIKSA_SKRIP");
			$alasan  = ociresult($sql_data1a,"PSD_ALASAN");
			 $rowid  = ociresult($sql_data1a,"ROW_ID");
	}
	
			return array (
				  'bil_1' => $bil_1, 
				'jabatan' => $jabatan, 
			  'kodkursus' => $kodkursus, 
			'jamseminggu' => $jamseminggu,
			     'jamsem' => $jamsem,
			  'sesi_staf' => $sesi_staf,
			   'semester' => $semester,
			  'trkhlulus' => $trkhlulus,
			     'status' => $status,
				 'kuliah' => $kuliah,
				 'toturial' => $toturial,
				 'amali' => $amali,
				  'soalan' => $soalan,
				   'skrin' => $skrin,
				   'alasan' => $alasan,
				  'rowid' => $rowid
						);
	ocilogoff($c);
	
	ocifreestatement($sql_data1a);
	}
	}
	
	public static function DataPengajaranDiluluskan($no_staff_pemohonan,$sesi,$sem,$kodkursus,$kategorijawatan,$jbt_ajar)
	{
		
		global $c;	
		$str = '';
		
		$data=" SELECT PSH_JABATAN_AJAR,PSH_KOD_KURSUS, PSH_JUM_BEBAN_AJAR,PSH_SESI,
				PSH_SEMESTER,TO_CHAR(PSH_TKH_SOKONG_KPTJ_AJAR,'dd Mon yyyy') as PSH_TKH_SOKONG_KPTJ_AJAR,
				TO_CHAR(PSH_TKH_SAH_TERIMA,'dd Mon yyyy') as PSH_TKH_SAH_TERIMA,PSH_STATUS_POHON,
				PSH_KATEGORI_JAWATAN,PSH_NORUJUK_PENGAJAR
				FROM SN_KH_PENGAJAR_HDR
				WHERE PSH_ID='".$no_staff_pemohonan."'
				AND PSH_SESI='".$sesi."'
				AND PSH_SEMESTER='".$sem."'
				AND PSH_KOD_KURSUS <> '".$kodkursus."'
				AND PSH_STATUS_POHON IN ('A','A4','A1','A2','A3','D')
				AND PSH_JUM_BEBAN_AJAR IS NOT NULL
				UNION
				SELECT PSH_JABATAN_AJAR,PSH_KOD_KURSUS, PSH_JUM_BEBAN_AJAR,PSH_SESI,
				PSH_SEMESTER,TO_CHAR(PSH_TKH_SOKONG_KPTJ_AJAR,'dd Mon yyyy') as PSH_TKH_SOKONG_KPTJ_AJAR,
				TO_CHAR(PSH_TKH_SAH_TERIMA,'dd Mon yyyy') as PSH_TKH_SAH_TERIMA,PSH_STATUS_POHON,
				PSH_KATEGORI_JAWATAN,PSH_NORUJUK_PENGAJAR
				FROM SN_KH_PENGAJAR_HDR
				WHERE PSH_ID='".$no_staff_pemohonan."'
				AND PSH_SESI='".$sesi."'
				AND PSH_SEMESTER='".$sem."'
				AND PSH_KATEGORI_JAWATAN <> '".$kategorijawatan."'
				AND PSH_STATUS_POHON IN ('A','A4','A1','A2','A3','D')
				AND PSH_JUM_BEBAN_AJAR IS NOT NULL
				UNION
				SELECT PSH_JABATAN_AJAR,PSH_KOD_KURSUS, PSH_JUM_BEBAN_AJAR,PSH_SESI,
				PSH_SEMESTER,TO_CHAR(PSH_TKH_SOKONG_KPTJ_AJAR,'dd Mon yyyy') as PSH_TKH_SOKONG_KPTJ_AJAR,
				TO_CHAR(PSH_TKH_SAH_TERIMA,'dd Mon yyyy') as PSH_TKH_SAH_TERIMA,PSH_STATUS_POHON,
				PSH_KATEGORI_JAWATAN,PSH_NORUJUK_PENGAJAR
				FROM SN_KH_PENGAJAR_HDR
				WHERE PSH_ID='".$no_staff_pemohonan."'
				AND PSH_SESI='".$sesi."'
				AND PSH_SEMESTER='".$sem."'
				AND PSH_JABATAN_AJAR <> '".$jbt_ajar."'
				AND PSH_STATUS_POHON IN ('A','A4','A1','A2','A3','D')
				AND PSH_JUM_BEBAN_AJAR IS NOT NULL
				";
		
			
		$sql_semak1 = "	SELECT COUNT(*) AS KIRA FROM
						(
						$data
						)	
					";
	//echo $sql_semak1.'<br/>';				
	$sql_semak1a=oci_parse ($c, $sql_semak1);
	oci_execute ($sql_semak1a, OCI_DEFAULT);
	if (oci_fetch($sql_semak1a)) 				
	{
		$bil_1 = ociresult($sql_semak1a,"KIRA");
	}

	if ($bil_1 != 0)
	{
	$sql_data1 = "$data";
	//echo $sql_data1.'<br/>';				
	$sql_data1a=oci_parse ($c, $sql_data1);
	oci_execute ($sql_data1a, OCI_DEFAULT);
	while (oci_fetch($sql_data1a)) 				
	{
		   $jabatan [] = ociresult($sql_data1a,"PSH_JABATAN_AJAR");
		$kodkursus1 [] = ociresult($sql_data1a,"PSH_KOD_KURSUS");
	   $jamseminggu [] = ociresult($sql_data1a,"PSH_JUM_BEBAN_AJAR");
		 $sesi_staf [] = ociresult($sql_data1a,"PSH_SESI");
	  	  $semester [] = ociresult($sql_data1a,"PSH_SEMESTER");
		 $trkhlulus [] = ociresult($sql_data1a,"PSH_TKH_SOKONG_KPTJ_AJAR");
		 $sahterima [] = ociresult($sql_data1a,"PSH_TKH_SAH_TERIMA");
   $kategorijawatan1[] = ociresult($sql_data1a,"PSH_KATEGORI_JAWATAN");
  			$status [] = ociresult($sql_data1a,"PSH_STATUS_POHON");
		   $norujuk [] = ociresult($sql_data1a,"PSH_NORUJUK_PENGAJAR");
		 
	}
	
			return array (
				  'bil_1' => $bil_1, 
				'jabatan' => $jabatan, 
			  'kodkursus1' => $kodkursus1, 
			'jamseminggu' => $jamseminggu,
			  'sesi_staf' => $sesi_staf,
			   'semester' => $semester,
			   'trkhlulus' => $trkhlulus,
			    'sahterima' => $sahterima,
		 'kategorijawatan' => $kategorijawatan1,
		 		'status' => $status,
				'norujuk' => $norujuk 
						);
	ocilogoff($c);
	
	ocifreestatement($sql_data1a);
	}
	}
	
	
	public static function DataHantarBSM($no_staff,$jbt_ajar,$kodkursus,$sesi_staf,$semester)
	{
		
		global $c;	
		$str = '';
		
		$data=" SELECT TO_CHAR(PSH_CREATED_DATE,'YYYYMMDDHH24MiSS')||'_'||PSH_ID AS NO_RUJUK, 
				CPG_NAMA AS NAMA, PSH_ID
 			   	FROM SN_KH_PENGAJAR_HDR,SN_KH_CALON_PENGAJAR
			   	WHERE PSH_ID = '".$no_staff."'
			   	AND PSH_ID = CPG_NOKP
			   	AND PSH_SESI = '".$sesi_staf."'
				AND PSH_KOD_KURSUS = '".$kodkursus."'
				AND PSH_SEMESTER = '".$semester."'
				AND PSH_STATUS_POHON='D'
				UNION
				SELECT TO_CHAR(PSH_CREATED_DATE,'YYYYMMDDHH24MiSS')||'_'||PSH_ID AS NO_RUJUK,
				BIO_NAMA AS NAMA, PSH_ID
				FROM SN_KH_PENGAJAR_HDR,SN_PA_BIODATA
				WHERE PSH_ID=BIO_NOSTAF
				AND PSH_ID = '".$no_staff."'
				AND PSH_SESI = '".$sesi_staf."'
				AND PSH_KOD_KURSUS = '".$kodkursus."'
				AND PSH_SEMESTER = '".$semester."'
				AND PSH_STATUS_POHON='D'
			   	ORDER BY NAMA 
				";
		
			
		$sql_semak1 = "	SELECT COUNT(*) AS KIRA FROM
						(
						$data
						)	
					";
	//echo $sql_semak1.'<br/>';				
	$sql_semak1a=oci_parse ($c, $sql_semak1);
	oci_execute ($sql_semak1a, OCI_DEFAULT);
	if (oci_fetch($sql_semak1a)) 				
	{
		$bil_1 = ociresult($sql_semak1a,"KIRA");
	}

	if ($bil_1 != 0)
	{
	$sql_data1 = "$data";
	//echo $sql_data1.'<br/>';				
	$sql_data1a=oci_parse ($c, $sql_data1);
	oci_execute ($sql_data1a, OCI_DEFAULT);
	while (oci_fetch($sql_data1a)) 				
	{
		  $no_rujuk [] = ociresult($sql_data1a,"NO_RUJUK");
		 $no_staff_pemohonan [] = ociresult($sql_data1a,"PSH_ID");
		      $nama [] = ociresult($sql_data1a,"NAMA");
	  	 
	}
	
			return array (
			'bil' => $bil_1, 
			'no_rujuk' => $no_rujuk, 
			'no_staff_pemohonan' => $no_staff_pemohonan, 
			'nama' => $nama
						);
	ocilogoff($c);
	
	ocifreestatement($sql_data1a);
	}
	}
	
	public static function DataLoginCalonLuar($no_staff)
	{
		
		global $c;	
		$str = '';
		
		$data=" SELECT MLI_KP,CPG_NAMA, MLI_NAMA,MLI_EMEL,MLI_STATUS FROM SN_KH_PENGAJAR_LOG A
				LEFT JOIN SN_KH_CALON_PENGAJAR B
				ON A.MLI_KP = B.CPG_NOKP
				AND MLI_KP NOT IN ('1')
				ORDER BY CPG_NAMA ASC
				";
		
			
		$sql_semak1 = "	SELECT COUNT(*) AS KIRA FROM
						(
						$data
						)	
					";
	//echo $sql_semak1.'<br/>';				
	$sql_semak1a=oci_parse ($c, $sql_semak1);
	oci_execute ($sql_semak1a, OCI_DEFAULT);
	if (oci_fetch($sql_semak1a)) 				
	{
		$bil_1 = ociresult($sql_semak1a,"KIRA");
	}

	if ($bil_1 != 0)
	{
	$sql_data1 = "$data";
	//echo $sql_data1.'<br/>';				
	$sql_data1a=oci_parse ($c, $sql_data1);
	oci_execute ($sql_data1a, OCI_DEFAULT);
	while (oci_fetch($sql_data1a)) 				
	{
		$nokp [] = ociresult($sql_data1a,"MLI_KP");
		$namacalon [] = ociresult($sql_data1a,"CPG_NAMA");
		$emelcalon [] = ociresult($sql_data1a,"MLI_EMEL");
		$status [] = ociresult($sql_data1a,"MLI_STATUS"); 	 
	}
	
			return array (
			'bil' => $bil_1, 
			'nokp' => $nokp, 
			'namacalon' => $namacalon, 
			'emelcalon' => $emelcalon,
			'status' => $status
						);
	ocilogoff($c);
	
	ocifreestatement($sql_data1a);
	}
	}
	
	public static function DataKiraanBebanTugas($no_staff,$norujukanseq)
	{
		
		global $c;	
		$str = '';
		$jumlah='';
		
		$data=" SELECT SUM(NVL(PSH_JUM_BEBAN_AJAR,'0')) AS JUMLAH 
				FROM SN_KH_PENGAJAR_HDR
				WHERE PSH_ID='".$no_staff."'
				AND PSH_STATUS_POHON NOT IN ('R','L','C','B')
				AND PSH_KUMPULAN_SEQ='".$norujukanseq."'
				";
		
			
		$sql_semak1 = "	SELECT COUNT(*) AS KIRA FROM
						(
						$data
						)	
					";
	//echo $sql_semak1.'<br/>';				
	$sql_semak1a=oci_parse ($c, $sql_semak1);
	oci_execute ($sql_semak1a, OCI_DEFAULT);
	if (oci_fetch($sql_semak1a)) 				
	{
		$bil_1 = ociresult($sql_semak1a,"KIRA");
	}

	if ($bil_1 != 0)
	{
	$sql_data1 = "$data";
	//echo $sql_data1.'<br/>';				
	$sql_data1a=oci_parse ($c, $sql_data1);
	oci_execute ($sql_data1a, OCI_DEFAULT);
	if (oci_fetch($sql_data1a)) 				
	{
		$jumlah  = ociresult($sql_data1a,"JUMLAH"); 	 
	}
	
			return array
			(
			'bil' => $bil_1, 
			'jumlah' => $jumlah 
			);
	ocilogoff($c);
	
	ocifreestatement($sql_data1a);
	}
	}


	public static function DataTahapKelayakan()
	{
	global $c;
	
	$sql_semak1 =	"	SELECT COUNT(*) AS KIRA FROM
						(
						SELECT THP_KTRGN_TAHAP
						FROM SN_KD_THP
						WHERE THP_AKTIF = 'Y'
						ORDER BY THP_KTRGN_TAHAP
						)
						";
	//echo $sql_semak1.'<br/>';	
	$sql_semak1a = OCIParse($c,$sql_semak1);
	OCIExecute($sql_semak1a,OCI_DEFAULT);
	if(OCIFetch($sql_semak1a))
		{ 
			  $bil_1 = OCIResult($sql_semak1a,"KIRA");
		}
	oci_free_statement($sql_semak1a);
	
	
	$sql_data1 =	"	SELECT THP_KTRGN_TAHAP
						FROM SN_KD_THP
						WHERE THP_AKTIF = 'Y'
						ORDER BY THP_KTRGN_TAHAP
						";
	//echo $sql_data1.'<br/>';						
	$sql_data1a = OCIParse($c,$sql_data1);
	OCIExecute($sql_data1a,OCI_DEFAULT);
	while(OCIFetch($sql_data1a))
		{ 
			$tahap[] = OCIResult($sql_data1a,"THP_KTRGN_TAHAP");
		}
	oci_free_statement($sql_data1a);
		
	return array
		(
			    'bil' => $bil_1,
			  'tahap' => $tahap
		);
		
	ocilogoff($c);
	}
	
	public static function DataKeteranganNegara($negara)
	{
		
		global $c;	
		$str = '';
		$ktrgnnegara='';
		$kodnegara='';
		//$no_staff='00001634';
		
		$data="SELECT KOD,NEGARA FROM SN_VW_NEGERI_NEGARA
			   WHERE KOD='".$negara."'";
		
		
		$sql_semak1= " 	SELECT COUNT(*) AS KIRA FROM
						(
						$data
						)
						";
		
		//echo $sql_semak1.'<br/>';exit;
		$sql_semak1a = oci_parse($c,$sql_semak1);
		oci_execute($sql_semak1a,OCI_DEFAULT);
		if (oci_fetch($sql_semak1a))
		{
			$bil_1 = oci_result($sql_semak1a,"KIRA");
		}
		oci_free_statement($sql_semak1a);
	
		
		
		
		$sql_data1= "$data";
		//echo $sql_data1.'<br>'; 					
		$sql_data1a = oci_parse($c,$sql_data1);
		oci_execute($sql_data1a,OCI_DEFAULT);
		if(oci_fetch($sql_data1a))
		{ 			
		
				 $kodnegara = oci_result($sql_data1a,"KOD");
			   $ktrgnnegara = oci_result($sql_data1a,"NEGARA");		 
		}
		oci_free_statement($sql_data1a);
	
		return array ( 
	        'bil_1' => $bil_1, 
		'kodnegara' => $kodnegara, 
	  'ktrgnnegara' => $ktrgnnegara
			       );
		
		
	ocilogoff($c);
	}
	
	
	public static function DataStatistik($no_staff,$pilihansesi,$status,$pilihanKursus)
	{
	global $c;
	
	
	 $bil_1 = '';
	 $idstaf = '';
	 $jawatan = '';
	 $kategorijawatan = '';	
	 $kodkursus = '';
	 $sesi = '';
	 $semester = '';
	 $jbtajar = '';
	 $jumbebanajar = '';
	
	
	if($status=='A1')
	{
		$cond = "PSH_NOSTAF_KJ='".$no_staff."'";
		$cond1 = "AND PSH_SAH_KJ='Y'";
	}
	
	if($status=='A2')
	{
		$cond = "PSH_NOSTAF_KPTJ='".$no_staff."'";
		$cond1 = "AND PSH_SOKONG_KPTJ='Y'";
	}
	
	if($status=='A3')
	{
		$cond = "PSH_NOSTAF_KJ_AJAR='".$no_staff."'";
		$cond1 = "AND PSH_SOKONG_KJ_AJAR='Y'";
	}
	
	if($status=='A4')
	{
		$cond = "PSH_NOSTAF_KPTJ_AJAR='".$no_staff."'";
		$cond1 = "AND PSH_SOKONG_KPTJ_AJAR='Y'";
	}
	
	if($pilihanKursus=='')
	{
		$cond2="";	
	}
	else
	{
		$cond2="AND PSH_KOD_KURSUS='".$pilihanKursus."'";	
	}
	
	$sql_semak1 =	"	SELECT COUNT(*) AS KIRA FROM
						(
						SELECT DISTINCT PSH_KOD_KURSUS,PSH_SESI,PSH_SEMESTER ,PSH_JABATAN_AJAR
						FROM SN_KH_PENGAJAR_HDR
						WHERE 
						$cond
						$cond1
						$cond2
						)
						";
	//echo $sql_semak1.'<br/>';	
	$sql_semak1a = OCIParse($c,$sql_semak1);
	OCIExecute($sql_semak1a,OCI_DEFAULT);
	if(OCIFetch($sql_semak1a))
		{ 
			  $bil_1 = OCIResult($sql_semak1a,"KIRA");
		}
	oci_free_statement($sql_semak1a);
	
	
	$sql_data1 =	"	SELECT DISTINCT PSH_KOD_KURSUS,PSH_SESI,PSH_SEMESTER ,PSH_JABATAN_AJAR
						FROM SN_KH_PENGAJAR_HDR
						WHERE 
						$cond
						$cond1
						$cond2
						ORDER BY PSH_SESI,PSH_SEMESTER,PSH_KOD_KURSUS 
						";
	//echo $sql_data1.'<br/>';						
	$sql_data1a = OCIParse($c,$sql_data1);
	OCIExecute($sql_data1a,OCI_DEFAULT);
	while(OCIFetch($sql_data1a))
		{ 
			$kodkursus[] = OCIResult($sql_data1a,"PSH_KOD_KURSUS");
			     $sesi[] = OCIResult($sql_data1a,"PSH_SESI");
			 $semester[] = OCIResult($sql_data1a,"PSH_SEMESTER");
			  $jbtajar[] = OCIResult($sql_data1a,"PSH_JABATAN_AJAR");
		}
	oci_free_statement($sql_data1a);
		
	return array
		(
			        'bil' => $bil_1,
			  'kodkursus' => $kodkursus,
			       'sesi' => $sesi,
			   'semester' => $semester,
			    'jbtajar' => $jbtajar,
		);
		
	ocilogoff($c);
	}
	
	
	public static function DataStatistikKursus($no_staff,$pilihansesi,$status,$pilihanKursus)
	{
	global $c;
	
	
	 $bil_1 = '';
	 $idstaf = '';
	 $jawatan = '';
	 $kategorijawatan = '';	
	 $kodkursus = '';
	 $sesi = '';
	 $semester = '';
	 $jbtajar = '';
	 $jumbebanajar = '';
	
	
	if($status=='A1')
	{
		$cond = "PSH_NOSTAF_KJ='".$no_staff."'";
		$cond1 = "AND PSH_SAH_KJ='Y'";
	}
	
	if($status=='A2')
	{
		$cond = "PSH_NOSTAF_KPTJ='".$no_staff."'";
		$cond1 = "AND PSH_SOKONG_KPTJ='Y'";
	}
	
	if($status=='A3')
	{
		$cond = "PSH_NOSTAF_KJ_AJAR='".$no_staff."'";
		$cond1 = "AND PSH_SOKONG_KJ_AJAR='Y'";
	}
	
	if($status=='A4')
	{
		$cond = "PSH_NOSTAF_KPTJ_AJAR='".$no_staff."'";
		$cond1 = "AND PSH_SOKONG_KPTJ_AJAR='Y'";
	}
	
	if($pilihanKursus=='')
	{
		$cond2="";	
	}
	else
	{
		$cond2="AND PSH_KOD_KURSUS='".$pilihanKursus."'";	
	}
	
	$sql_semak1 =	"	SELECT COUNT(*) AS KIRA FROM
						(
						SELECT DISTINCT PSH_ID,PSH_JAWATAN,
						PSH_KOD_KURSUS,PSH_KATEGORI_JAWATAN,
						PSH_JUM_BEBAN_AJAR,
						PSH_SESI,PSH_SEMESTER ,PSH_JABATAN_AJAR
						FROM SN_KH_PENGAJAR_HDR
						WHERE
						$cond
						$cond1
						AND PSH_SESI='".$pilihansesi."'
						$cond2
						)
						";
	//echo $sql_semak1.'<br/>';	
	$sql_semak1a = OCIParse($c,$sql_semak1);
	OCIExecute($sql_semak1a,OCI_DEFAULT);
	if(OCIFetch($sql_semak1a))
		{ 
			  $bil_1 = OCIResult($sql_semak1a,"KIRA");
		}
	oci_free_statement($sql_semak1a);
	
	
	$sql_data1 =	"	SELECT DISTINCT PSH_ID,PSH_JAWATAN,
						PSH_KOD_KURSUS,PSH_KATEGORI_JAWATAN,
						PSH_JUM_BEBAN_AJAR,
						PSH_SESI,PSH_SEMESTER ,PSH_JABATAN_AJAR
						FROM SN_KH_PENGAJAR_HDR
						WHERE 
						$cond
						$cond1
						AND PSH_SESI='".$pilihansesi."'
						$cond2
						ORDER BY PSH_KOD_KURSUS,PSH_SEMESTER,PSH_SESI
						";
	//echo $sql_data1.'<br/>';						
	$sql_data1a = OCIParse($c,$sql_data1);
	OCIExecute($sql_data1a,OCI_DEFAULT);
	while(OCIFetch($sql_data1a))
		{ 
			   $idstaf[] = OCIResult($sql_data1a,"PSH_ID");
			  $jawatan[] = OCIResult($sql_data1a,"PSH_JAWATAN");
	  $kategorijawatan[] = OCIResult($sql_data1a,"PSH_KATEGORI_JAWATAN");
			$kodkursus[] = OCIResult($sql_data1a,"PSH_KOD_KURSUS");
			     $sesi[] = OCIResult($sql_data1a,"PSH_SESI");
			 $semester[] = OCIResult($sql_data1a,"PSH_SEMESTER");
			  $jbtajar[] = OCIResult($sql_data1a,"PSH_JABATAN_AJAR");
		 $jumbebanajar[] = OCIResult($sql_data1a,"PSH_JUM_BEBAN_AJAR");
		}
	oci_free_statement($sql_data1a);
		
	return array
		(
			        'bil' => $bil_1,
				 'idstaf' => $idstaf,
				'jawatan' => $jawatan,
		'kategorijawatan' => $kategorijawatan,	
			  'kodkursus' => $kodkursus,
			       'sesi' => $sesi,
			   'semester' => $semester,
			    'jbtajar' => $jbtajar,
		   'jumbebanajar' => $jumbebanajar
		);
		
	ocilogoff($c);
	}
	
	public static function DataStatistikKursusDtl($no_staff,$kodkursus,$semester,$sesi,$status,$jbtajar)
	{
	global $c;
	
	$idstaf='';
	$kategorijawatan='';
	$jawatan='';
	$bilkursus='';
	$cond='';
	$cond1='';
	
	//echo "$status";
	
	if($status=='A3')
	{
		$cond = "AND PSH_NOSTAF_KJ_AJAR='".$no_staff."'";
		$cond1 = "AND PSH_SOKONG_KJ_AJAR='Y'";
	}
	
	if($status=='A4')
	{
		$cond = "AND PSH_NOSTAF_KPTJ_AJAR='".$no_staff."'";
		$cond1 = "AND PSH_SOKONG_KPTJ_AJAR='Y'";
	}
	
	
	
	$DataPengajar=" SELECT DISTINCT PSH_ID,PSH_SESI,PSH_JABATAN_AJAR,PSH_JAWATAN,
					PSH_KATEGORI_JAWATAN ,PSH_SEMESTER,PSH_KOD_KURSUS,
					PSH_SOKONG_KJ_AJAR,PSH_SAH_KJ,PSH_SOKONG_KPTJ,
					PSH_JUM_BEBAN_AJAR,PSH_SOKONG_KPTJ_AJAR
					FROM SN_KH_PENGAJAR_HDR 
					WHERE PSH_SESI='".$sesi."' 
					AND PSH_KOD_KURSUS='".$kodkursus."'
					AND PSH_SEMESTER='".$semester."'
					AND PSH_JABATAN_AJAR = '".$jbtajar."'
					$cond
					$cond1
				  ";
	
	$sql_semak1 =	"SELECT COUNT(*) AS BIL FROM
					($DataPengajar)
					";
	//echo $sql_semak1.'<br/><br/>';	
	$sql_semak1a = OCIParse($c,$sql_semak1);
	OCIExecute($sql_semak1a,OCI_DEFAULT);
	if(OCIFetch($sql_semak1a))
		{ 
			  $bilkursus = OCIResult($sql_semak1a,"BIL");
		}
	oci_free_statement($sql_semak1a);
	


	$sql_data1 =	"$DataPengajar";
	//echo $sql_data1.'<br/>';						
	$sql_data1a = OCIParse($c,$sql_data1);
	OCIExecute($sql_data1a,OCI_DEFAULT);
	while(OCIFetch($sql_data1a))
		{ 
			$idstaf[] = OCIResult($sql_data1a,"PSH_ID");
		   $jawatan[] = OCIResult($sql_data1a,"PSH_JAWATAN");
   $kategorijawatan[] = OCIResult($sql_data1a,"PSH_KATEGORI_JAWATAN");
		}
	oci_free_statement($sql_data1a);



	return array
		(
			   'bilkursus' => $bilkursus,
				  'idstaf' => $idstaf,
				 'jawatan' => $jawatan,
		 'kategorijawatan' => $kategorijawatan
		);
		
	ocilogoff($c);
	}

	}
//end MPS_Data

class SkrinAkses
	{
	public static function AksesSkrin($nostaff,$peranan)
		{
	   global $c;
	   $str = '';
	//$status = '';
	
	//A1 - KJ Staf 
	$sql_semak1 ="	SELECT COUNT(PSH_NOSTAF_KJ) AS KIRA
					FROM SN_KH_PENGAJAR_HDR
					WHERE PSH_NOSTAF_KJ = '".$nostaff."'
					--AND PSH_STATUS_POHON = 'A1'
					";
	//echo $sql_semak1.'<br/>';	
	$sql_semak1a = OCIParse($c,$sql_semak1);
	OCIExecute($sql_semak1a,OCI_DEFAULT);
	if (OCIFetch($sql_semak1a))
		{
			$bil_1 = OCIResult($sql_semak1a,"KIRA");
		}
	oci_free_statement($sql_semak1a);
		
	if ($bil_1 > '0'){$kj_staff = '1';}
	else{$kj_staff = '0';}
	
	
	//A2 - KPTJ Staf 
	$sql_semak2 ="	SELECT COUNT(PSH_NOSTAF_KPTJ) AS KIRA
					FROM SN_KH_PENGAJAR_HDR
					WHERE PSH_NOSTAF_KPTJ = '".$nostaff."'
					--AND PSH_STATUS_POHON = 'A2'
					";
	//echo $sql_semak2.'<br/>';	
	$sql_semak2a = OCIParse($c,$sql_semak2);
	OCIExecute($sql_semak2a,OCI_DEFAULT);
	if (OCIFetch($sql_semak2a))
		{
			$bil_2 = OCIResult($sql_semak2a,"KIRA");
		}
	oci_free_statement($sql_semak2a);
		
	if ($bil_2 > '0'){$kptj_staff = '1';}
	else{$kptj_staff = '0';}
	
	
	//A3 - KJ Ajar 
	$sql_semak3 ="	SELECT COUNT(PSH_NOSTAF_KJ_AJAR) AS KIRA
					FROM SN_KH_PENGAJAR_HDR
					WHERE PSH_NOSTAF_KJ_AJAR = '".$nostaff."'
				--	AND PSH_STATUS_POHON = 'A3'
					";
	//echo $sql_semak3.'<br/>';	
	$sql_semak3a = OCIParse($c,$sql_semak3);
	OCIExecute($sql_semak3a,OCI_DEFAULT);
	if (OCIFetch($sql_semak3a))
		{
			$bil_3 = OCIResult($sql_semak3a,"KIRA");
		}
	oci_free_statement($sql_semak3a);
		
	if ($bil_3 > '0'){$kj_ajar = '1';}
	else{$kj_ajar = '0';}
	
	
	//A4 - KPTJ Ajar 
	$sql_semak4 ="	SELECT COUNT(PSH_NOSTAF_KPTJ_AJAR) AS KIRA
					FROM SN_KH_PENGAJAR_HDR
					WHERE PSH_NOSTAF_KPTJ_AJAR = '".$nostaff."'
				--	AND PSH_STATUS_POHON = 'A4'
					";
	//echo $sql_semak4.'<br/>';	
	$sql_semak4a = OCIParse($c,$sql_semak4);
	OCIExecute($sql_semak4a,OCI_DEFAULT);
	if (OCIFetch($sql_semak4a))
		{
			$bil_4 = OCIResult($sql_semak4a,"KIRA");
		}
	oci_free_statement($sql_semak4a);
		
	if ($bil_4 > '0'){$kptj_ajar = '1';}
	else{$kptj_ajar = '0';}
	
	
	//D - BSM 
	$sql_semak5 ="	SELECT COUNT(ADM_NOSTAF) AS KIRA
					FROM SN_KD_ADMIN_PTJ
					WHERE ADM_MODUL = 'MPS'
					AND ADM_ROLE = 'P'
					AND (ADM_JNS_ROLE = 'A' or ADM_JNS_ROLE='B')
					AND ADM_AKTIF = 'Y'
					AND SYSDATE >= ADM_TKH_MULA
					AND SYSDATE <= ADM_TKH_TAMAT
					AND ADM_NOSTAF = '".$nostaff."'
					";
	//echo $sql_semak5.'<br/>';	
	$sql_semak5a = OCIParse($c,$sql_semak5);
	OCIExecute($sql_semak5a,OCI_DEFAULT);
	if (OCIFetch($sql_semak5a))
		{
			$bil_5 = OCIResult($sql_semak5a,"KIRA");
		}
	oci_free_statement($sql_semak5a);
		
	if ($bil_5 > '0'){$bsm = '1';}
	else{$bsm = '0';}
	
		
	
	return array
			(
		  'kj_staff' => $kj_staff,
		'kptj_staff' => $kptj_staff,
		   'kj_ajar' => $kj_ajar,
		 'kptj_ajar' => $kptj_ajar,
		       'bsm' => $bsm
			);	
			
	ocilogoff($c);
	}
	
	public static function Tasklist($nostaff,$peranan)
		{
	global $c;
	   $str = '';
	$status = '';
	
	//A1 - KJ Staf 
	$sql_semak1 ="	SELECT COUNT(PSH_ID) AS KIRA
					FROM SN_KH_PENGAJAR_HDR
					WHERE PSH_NOSTAF_KJ = '".$nostaff."'
					AND PSH_STATUS_POHON = 'A1'
					";
	//echo $sql_semak1.'<br/>';	
	$sql_semak1a = OCIParse($c,$sql_semak1);
	OCIExecute($sql_semak1a,OCI_DEFAULT);
	if (OCIFetch($sql_semak1a))
		{
			$kj_staff = OCIResult($sql_semak1a,"KIRA");
		}
	oci_free_statement($sql_semak1a);
		
	//A2 - KPTJ Staf 
	$sql_semak2 ="	SELECT COUNT(PSH_ID) AS KIRA
					FROM SN_KH_PENGAJAR_HDR
					WHERE PSH_NOSTAF_KPTJ = '".$nostaff."'
					AND PSH_STATUS_POHON = 'A2'
					";
	//echo $sql_semak2.'<br/>';	
	$sql_semak2a = OCIParse($c,$sql_semak2);
	OCIExecute($sql_semak2a,OCI_DEFAULT);
	if (OCIFetch($sql_semak2a))
		{
			$kptj_staff = OCIResult($sql_semak2a,"KIRA");
		}
	oci_free_statement($sql_semak2a);
	
	//A3 - KJ Ajar
	$sql_semak3 ="	SELECT COUNT(PSH_ID) AS KIRA
					FROM SN_KH_PENGAJAR_HDR
					WHERE PSH_NOSTAF_KJ_AJAR = '".$nostaff."'
					AND PSH_STATUS_POHON = 'A3'
					";
	//echo $sql_semak3.'<br/>';	
	$sql_semak3a = OCIParse($c,$sql_semak3);
	OCIExecute($sql_semak3a,OCI_DEFAULT);
	if (OCIFetch($sql_semak3a))
		{
			$kj_ajar = OCIResult($sql_semak3a,"KIRA");
		}
	oci_free_statement($sql_semak3a);
	
	//A4 - KPTJ Ajar
	$sql_semak4 ="	SELECT COUNT(PSH_ID) AS KIRA
					FROM SN_KH_PENGAJAR_HDR
					WHERE PSH_NOSTAF_KPTJ_AJAR = '".$nostaff."'
					AND PSH_STATUS_POHON = 'A4'
					";
	//echo $sql_semak4.'<br/>';	
	$sql_semak4a = OCIParse($c,$sql_semak4);
	OCIExecute($sql_semak4a,OCI_DEFAULT);
	if (OCIFetch($sql_semak4a))
		{
			$kptj_ajar = OCIResult($sql_semak4a,"KIRA");
		}
	oci_free_statement($sql_semak4a);
	
	//D - BSM
	$sql_semak5 ="	SELECT COUNT(PSH_NORUJUK_PENGAJAR) AS KIRA 
					FROM SN_KD_ADMIN_PTJ, SN_KH_PENGAJAR_HDR
					WHERE ADM_AKTIF='Y'
					AND ADM_MODUL = 'MPS'
					AND ADM_TKH_TAMAT >= SYSDATE
					AND PSH_STATUS_POHON = 'D'
					AND ADM_NOSTAF='".$nostaff."'
					AND ADM_ROLE='P'
					";
	//echo $sql_semak5.'<br/>';	
	$sql_semak5a = OCIParse($c,$sql_semak5);
	OCIExecute($sql_semak5a,OCI_DEFAULT);
	if (OCIFetch($sql_semak5a))
		{
			$bsm = OCIResult($sql_semak5a,"KIRA");
		}
	oci_free_statement($sql_semak5a);
	
			
	return array
			(
		'kj_staff' => $kj_staff,
	  'kptj_staff' => $kptj_staff,
	     'kj_ajar' => $kj_ajar,
	   'kptj_ajar' => $kptj_ajar,
	         'bsm' => $bsm
	         
			);	
	ocilogoff($c);
	}	
	
	public static function AksesAdminPTM($no_staff)
		{
	   global $c;
	   $str = '';
	//$status = '';
	
	//A1 - KJ Staf 
	$sql_semak1 ="	SELECT DISTINCT COUNT(ADM_NOSTAF) AS KIRA 
					FROM SN_KD_ADMIN_PTJ
					WHERE ADM_JNS_MODUL IS NULL
					AND ADM_MODUL IS NULL
					AND ADM_AKTIF = 'Y'
					AND ADM_NOSTAF='".$no_staff."'
					";
	//echo $sql_semak1.'<br/>';	
	$sql_semak1a = OCIParse($c,$sql_semak1);
	OCIExecute($sql_semak1a,OCI_DEFAULT);
	if (OCIFetch($sql_semak1a))
		{
			$bil_1 = OCIResult($sql_semak1a,"KIRA");
		}
	oci_free_statement($sql_semak1a);
		
	if ($bil_1 > '0'){$ptm = '1';}
	else{$ptm = '0';}
		
	return array
			(
		  'ptm' => $ptm
			);	
			
	ocilogoff($c);
	}
	
	public static function AksesPentadbirPtj($no_staff)
		{
	   global $c;
	   $str = '';
	//$status = '';
	
	//A1 - KJ Staf 
	$sql_semak1 ="	SELECT COUNT(ADM_NOSTAF) AS KIRA 
					FROM SN_KD_ADMIN_PTJ
					WHERE ADM_MODUL='MPS'
					AND ADM_AKTIF='Y'
					AND ADM_NOSTAF='".$no_staff."'
					AND ADM_ROLE='D'
					";
	//echo $sql_semak1.'<br/>';	
	$sql_semak1a = OCIParse($c,$sql_semak1);
	OCIExecute($sql_semak1a,OCI_DEFAULT);
	if (OCIFetch($sql_semak1a))
		{
			$bil_1 = OCIResult($sql_semak1a,"KIRA");
		}
	oci_free_statement($sql_semak1a);
		
	if ($bil_1 > '0'){$pentadbir = '1';}
	else{$pentadbir = '0';}
		
	return array
			(
		  'pentadbir' => $pentadbir
			);	
			
	ocilogoff($c);
	}
	
	public static function AksesPentadbirBsm($no_staff)
		{
	   global $c;
	   $str = '';
	//$status = '';
	
	//A1 - KJ Staf 
	$sql_semak1 ="	SELECT COUNT(ADM_NOSTAF) AS KIRA 
					FROM SN_KD_ADMIN_PTJ
					WHERE ADM_MODUL='MPS'
					AND ADM_AKTIF='Y'
					AND ADM_NOSTAF='".$no_staff."'
					AND ADM_ROLE='P'
					";
	//echo $sql_semak1.'<br/>';	
	$sql_semak1a = OCIParse($c,$sql_semak1);
	OCIExecute($sql_semak1a,OCI_DEFAULT);
	if (OCIFetch($sql_semak1a))
		{
			$bil_1 = OCIResult($sql_semak1a,"KIRA");
		}
	oci_free_statement($sql_semak1a);
		
	if ($bil_1 > '0'){$pentadbirbsm = '1';}
	else{$pentadbirbsm = '0';}
		
	return array
			(
		  'pentadbirbsm' => $pentadbirbsm
			);	
			
	ocilogoff($c);
	}
	}
	
//end Data SkrinAkses
class MPS_Senarai
	{
	
	public static	function SenaraiPTj($kodptjadmin)
	{
	global $c;
	$str = '';
	
	
	$str.=	'<select class="form-control input-sm" name="pilihanptj" id="pilihanptj"  onchange="SubmitForm()">';
	
	
	$str.=	'<option value=""> --- SEMUA PTj --- </option>';
	
	
	
	//echo "<< $pilihan_ptj";
	
		$sql_data1 =	"select PTG_KOD_PTJ, PTG_KTRGN_PTJ from sn_kd_ptj where  
						PTG_AKTIF='Y' and ptg_kod_ptj not in ('-','G','NA','Q') order by ptg_ktrgn_ptj
							";
		$sql_data1a = OCIParse($c,$sql_data1);
		OCIExecute($sql_data1a,OCI_DEFAULT);
		while(OCIFetch($sql_data1a))
			{ 
		      $ptj_kod_pilihan = OCIResult($sql_data1a,"PTG_KOD_PTJ");
			$ptj_ktrgn_pilihan = OCIResult($sql_data1a,"PTG_KTRGN_PTJ");
			
			
			
			
	if($kodptjadmin == $ptj_kod_pilihan) {	
	$str.=	'<option value='.$ptj_kod_pilihan.' selected>'.$ptj_ktrgn_pilihan .'</option>';
	}
	else
	{
	$str.=	'<option value='.$ptj_kod_pilihan.' >'.$ptj_ktrgn_pilihan .'</option>';
	}
	}	
	
	
	
	$str.=	'</select>';
	

	
	return $str;
	OCILogOff($c);
	}
	
	public static function SenaraiJabatan($leveladmin,$kodjbtadmin,$kodptjadmin)
	{
		global $c;
		$str = '';
		//echo "<< <br> $kodjabatan << $pilihan_jabatan";
		if($leveladmin == 'A')
			{
			$syarat = "SELECT JBT_KOD_JABATAN,JBT_KTRGN_JABATAN 
					   FROM SN_KD_JBT
					   WHERE JBT_AKTIF = 'Y'
					   AND JBT_KOD_PTJ='".$kodptjadmin."'";
			}
		else
			{
			$syarat = "SELECT JBT_KOD_JABATAN,JBT_KTRGN_JABATAN 
					   FROM SN_KD_JBT
					   WHERE JBT_AKTIF = 'Y'
					   AND JBT_KOD_JABATAN='".$kodjbtadmin."'";
			}
			
		$sql_semak1 = "	SELECT COUNT(*) AS KIRA FROM
						(
						$syarat
						)
						";
		//echo $sql_semak1.'<br/>';				
		$sql_semak1a=oci_parse($c, $sql_semak1);
		oci_execute($sql_semak1a, OCI_DEFAULT);
		if (oci_fetch($sql_semak1a)) 				
			{
				  $bil_1 = ociresult($sql_semak1a,"KIRA");
			}
		//echo $bil_1.'<br>';
		oci_free_statement($sql_semak1a);
		
		$sql_data1 = "$syarat";
		//echo $sql_data1.'<br/>';				
		$sql_data1a=oci_parse($c, $sql_data1);
		oci_execute($sql_data1a, OCI_DEFAULT);
		while (oci_fetch($sql_data1a)) 				
			{
				  $jbt_kod[] = ociresult($sql_data1a,"JBT_KOD_JABATAN");
				$jbt_ktrgn[] = ociresult($sql_data1a,"JBT_KTRGN_JABATAN");
			}
		oci_free_statement($sql_data1a);
		
		
	
		$str.=	'<select class="form-control input-sm" name="pilihanjabatan" id="pilihanjabatan"  onchange="SubmitForm()" >';
		
		
		$str.=	'<option value="" > --- Sila Pilih Jabatan --- </option>';
		
		for($i=0;$i<$bil_1;$i++)
			{
		$ptj = '';		
		$jbt = 	$jbt_kod[$i];
		
				
			if($jbt==$kodjbtadmin)
			{
				
			$str.= '<option value="'.$jbt.'" selected >'.$jbt_ktrgn[$i].'</option>';
		
			}
			else
			{
			$str.= '<option value="'.$jbt.'">'.$jbt_ktrgn[$i].'</option>';
			}
					
				
			}
		
		if($kodjbtadmin=='XX')
		{
		$str.=	'<option value="XX" selected="selected"> - SEMUA JABATAN -</option>';	
		}
		else
		{
		$str.=	'<option value="XX" > - SEMUA JABATAN -</option>';	
		}
		$str.=	'</select>';
		
		
		return $str;
		OCILogOff($c);
		}
		
	public static function SenaraiSesi($pilihansesi)
	{
		global $c;
		$str = '';
		$cond = "SELECT DISTINCT SESI_PENGAJIAN FROM SN_KD_JADUAL_KALENDAR 
				 WHERE SESI_PENGAJIAN > '2013/2014'
				 ORDER BY SESI_PENGAJIAN DESC";		
			
		$sql_semak1 = "	SELECT COUNT(*) AS KIRA FROM
						(
						$cond
						)
						";
		//echo $sql_semak1.'<br/>';				
		$sql_semak1a=oci_parse($c, $sql_semak1);
		oci_execute($sql_semak1a, OCI_DEFAULT);
		if (oci_fetch($sql_semak1a)) 				
			{
				  $bil_1 = ociresult($sql_semak1a,"KIRA");
			}
		//echo $bil_1.'<br>';
		oci_free_statement($sql_semak1a);
		
		$str.=	'<select class="form-control input-sm" name="pilihansesi" id="pilihansesi"  onchange="SubmitForm()" required>';
		$str.=	'<option value="" > --- Sila Pilih Sesi --- </option>';
		
		$sql_data1 = "$cond";
		//echo $sql_data1.'<br/>';				
		$sql_data1a=oci_parse($c, $sql_data1);
		oci_execute($sql_data1a, OCI_DEFAULT);
		
		
		while (oci_fetch($sql_data1a)) 				
			{
				 $sesipengajian = ociresult($sql_data1a,"SESI_PENGAJIAN");
				 
				// $sesi=str_replace('/','',$sesipengajian);
		
		if($sesipengajian==$pilihansesi)
			{
			$str.= '<option value="'.$sesipengajian.'" selected >'.$sesipengajian.'</option>';
		
			}
			else
			{
			$str.= '<option value="'.$sesipengajian.'">'.$sesipengajian.'</option>';
			}
		}			
		$str.=	'</select>';		
		
		oci_free_statement($sql_data1a);
			
	
		
		
		
		return $str;
		OCILogOff($c);
		}
		
	public static function SenaraiSesiPermohonan($pilihansesi)
	{
		global $c;
		$str = '';
		$cond = "SELECT DISTINCT SESI_PENGAJIAN FROM SN_KD_JADUAL_KALENDAR 
				 WHERE SESI_PENGAJIAN > '2013/2014'
				 ORDER BY SESI_PENGAJIAN DESC";		
			
		$sql_semak1 = "	SELECT COUNT(*) AS KIRA FROM
						(
						$cond
						)
						";
		//echo $sql_semak1.'<br/>';				
		$sql_semak1a=oci_parse($c, $sql_semak1);
		oci_execute($sql_semak1a, OCI_DEFAULT);
		if (oci_fetch($sql_semak1a)) 				
			{
				  $bil_1 = ociresult($sql_semak1a,"KIRA");
			}
		//echo $bil_1.'<br>';
		oci_free_statement($sql_semak1a);
		
		$str.=	'<select class="form-control input-sm" name="pilihansesi" id="pilihansesi"  onchange="SubmitForm()" required>';
		$str.=	'<option value="" > --- Semua Sesi --- </option>';
		
		$sql_data1 = "$cond";
		//echo $sql_data1.'<br/>';				
		$sql_data1a=oci_parse($c, $sql_data1);
		oci_execute($sql_data1a, OCI_DEFAULT);
		
		
		while (oci_fetch($sql_data1a)) 				
			{
				 $sesipengajian = ociresult($sql_data1a,"SESI_PENGAJIAN");
				 
				// $sesi=str_replace('/','',$sesipengajian);
		
		if($sesipengajian==$pilihansesi)
			{
			$str.= '<option value="'.$sesipengajian.'" selected >'.$sesipengajian.'</option>';
		
			}
			else
			{
			$str.= '<option value="'.$sesipengajian.'">'.$sesipengajian.'</option>';
			}
		}
				
			
		$str.=	'</select>';		
		
		oci_free_statement($sql_data1a);
			
	
		
		
		
		return $str;
		OCILogOff($c);
		}
		
	public static function  SenaraiSemester($pilihansemester)
	{
		global $c;
		$str = '';
		//echo "<< <br> $kodjabatan << $pilihan_jabatan";
		
		if($pilihansemester==1){ $selected1="selected"; } else { $selected1="";	}
		if($pilihansemester==2){ $selected2="selected"; } else { $selected2="";	}
		if($pilihansemester==3){ $selected3="selected"; } else { $selected3="";	}
		
		$str.=	'<select class="form-control input-sm" name="pilihansemester" id="pilihansemester"  onchange="SubmitForm()" required>';
		
		
		$str.=	'<option value="" > --- Sila Pilih Semester --- </option>';
		$str.= '<option value="1" '.$selected1.'>1</option>';
		$str.= '<option value="2" '.$selected2.'>2</option>';
		$str.= '<option value="3" '.$selected3.'>3</option>';
		$str.=	'</select>';
		
		
		return $str;
		OCILogOff($c);
		}
		
	public static function  SenaraiKodKursus($pilihankursus,$pilihansesi,$pilihansemester)
	{
		global $c;
		$str = '';
		
		/*UNION 
	 	SELECT 'DDD0003' AS SUB_KOD_SUBJEK,'GCP TAHUN 3' AS SUB_KTRGN_SUBJEK FROM DUAL
		 UNION 
		 SELECT 'DDD0004' AS SUB_KOD_SUBJEK,'GCP TAHUN 4' AS SUB_KTRGN_SUBJEK FROM DUAL
		 UNION 
		 SELECT 'DDD0005' AS SUB_KOD_SUBJEK,'GCP TAHUN 5' AS SUB_KTRGN_SUBJEK FROM DUAL*/
		
		
		//echo "<< <br> $kodjabatan << $pilihan_jabatan";
		$cond = "SELECT DISTINCT SUB_KOD_SUBJEK,SUB_KTRGN_SUBJEK from SN_KD_KURSUS_PELAJAR
                 WHERE SUB_SESI='".$pilihansesi."'
                 AND SUB_SEMESTER='".$pilihansemester."'
				 UNION
				 SELECT DISTINCT MHN_KOD_SUBJEK AS SUB_KOD_SUBJEK,
				 MHN_KTRGN_SUBJEK_BM AS SUB_KTRGN_SUBJEK 
				 FROM SIS_VW_KRS_INDUK_MBBS
                 ORDER BY SUB_KOD_SUBJEK";
			
			
		$sql_semak1 = "	SELECT COUNT(*) AS KIRA FROM
						(
						$cond
						)
						";
		//echo $sql_semak1.'<br/>';				
		$sql_semak1a=oci_parse($c, $sql_semak1);
		oci_execute($sql_semak1a, OCI_DEFAULT);
		if (oci_fetch($sql_semak1a)) 				
			{
				  $bil_1 = ociresult($sql_semak1a,"KIRA");
			}
		//echo $bil_1.'<br>';
		oci_free_statement($sql_semak1a);
		
		$sql_data1 = "$cond";
		//echo $sql_data1.'<br/>';				
		$sql_data1a=oci_parse($c, $sql_data1);
		oci_execute($sql_data1a, OCI_DEFAULT);
		while (oci_fetch($sql_data1a)) 				
			{
				  $kodkursus1[] = ociresult($sql_data1a,"SUB_KOD_SUBJEK");
				  $ktrgnkursus1[] = ociresult($sql_data1a,"SUB_KTRGN_SUBJEK");
			}
		oci_free_statement($sql_data1a);
		
		$str.= '<div class="form-group" style="width:100%">';

		$str.='<select  style="width:100%;font-size:11px;"  data-toggle="dropdown" aria-haspopup="true" aria-expanded="true"  class="js-example-tags" name="pilihankursus" id="pilihankursus"  javascript:{this.value = this.value.toUpperCase(); }" required>';
		
		/*$str.='<select  style="width:100%;font-size:11px;"  data-toggle="dropdown" aria-haspopup="true" aria-expanded="true"  class="js-example-tags" name="pilihankursus" id="pilihankursus" required >';*/
		
		//$str.= '<select name="pilihankursus" id="pilihankursus" class="form-control input-sm" required >';
		//$str.=	'<select  name="pilihankursus" id="pilihankursus" required class="form-control" >';
		
		
		$str.=	'<option value="" > --- Sila Pilih Kursus --- </option>';
		
		for($i=0;$i<$bil_1;$i++)
			{
		
		$kodkursus = $kodkursus1[$i];
		$ktrgnkursus = $ktrgnkursus1[$i];
		
				
			if($pilihankursus==$kodkursus)
			{
				
			$str.= '<option value="'.$kodkursus.'" selected >'.$kodkursus .'&nbsp;-&nbsp;'.$ktrgnkursus .'</option>';
		
			}
			else
			{
			$str.= '<option value="'.$kodkursus.'">'.$kodkursus .'&nbsp;-&nbsp;'.$ktrgnkursus .'</option>';
			
			}
					
				
			}
			
		/*$str.= '<option value="DDD0003" selected >DDD0003&nbsp;-&nbsp;GCP TAHUN 3</option>';
		$str.= '<option value="DDD0004" selected >DDD0004&nbsp;-&nbsp;GCP TAHUN 4</option>';
		$str.= '<option value="DDD0005" selected >DDD0005&nbsp;-&nbsp;GCP TAHUN 5</option>';*/
		$str.=	'</select>';
		$str.=	'</div>';
		
		return $str;
		OCILogOff($c);
		}
		
	public static function  SenaraiKelayakan($kelayakan)
	{
		global $c;
		$str = '';
		//echo "<< <br> $kodjabatan << $pilihan_jabatan";
		
		if($kelayakan=='B'){ $selected1="selected"; } else { $selected1="";	}
		if($kelayakan=='A'){ $selected2="selected"; } else { $selected2="";	}
		if($kelayakan=='K'){ $selected3="selected"; } else { $selected3="";	}
		
		$str.=	'<select class="form-control input-sm" name="kelayakan" id="kelayakan" required>';
		
		
		$str.=	'<option value="" > --- Sila Pilih Kelayakan Pemohon --- </option>';
		$str.= '<option value="B" '.$selected1.'>Staf Bukan Akademik</option>';
		$str.= '<option value="A" '.$selected2.'>Staf Akademik</option>';
		$str.= '<option value="K" '.$selected3.'>Staf Akademik &amp; Bukan Akademik</option>';
		$str.=	'</select>';
		
		
		return $str;
		OCILogOff($c);
		}
		
	public static function  SenaraiAkademik($kakademik)
	{
		global $c;
		$str = '';
		//echo "<< <br> $kodjabatan << $pilihan_jabatan";
		$cond = "SELECT THP_KOD_TAHAP,THP_KTRGN_TAHAP
   			     FROM SN_KD_THP
                 WHERE THP_AKTIF='Y'
                 AND THP_KELULUSAN_TERTINGGI IS NOT NULL
                 ORDER BY THP_KTRGN_TAHAP";
			
			
		$sql_semak1 = "	SELECT COUNT(*) AS KIRA FROM
						(
						$cond
						)
						";
		//echo $sql_semak1.'<br/>';				
		$sql_semak1a=oci_parse($c, $sql_semak1);
		oci_execute($sql_semak1a, OCI_DEFAULT);
		if (oci_fetch($sql_semak1a)) 				
			{
				  $bil_1 = ociresult($sql_semak1a,"KIRA");
			}
		//echo $bil_1.'<br>';
		oci_free_statement($sql_semak1a);
		
		$sql_data1 = "$cond";
		//echo $sql_data1.'<br/>';				
		$sql_data1a=oci_parse($c, $sql_data1);
		oci_execute($sql_data1a, OCI_DEFAULT);
		while (oci_fetch($sql_data1a)) 				
			{
				  $kodtahap1[] = ociresult($sql_data1a,"THP_KOD_TAHAP");
				  $ktrgntahap1[] = ociresult($sql_data1a,"THP_KTRGN_TAHAP");
			}
		oci_free_statement($sql_data1a);
		
		
		
		$str.= '<div class="form-group" style="width:100%">';

		$str.='<select  style="width:100%;font-size:11px;"  data-toggle="dropdown" aria-haspopup="true" aria-expanded="true"  class="js-example-tags" name="kakademik" id="kakademik"  javascript:{this.value = this.value.toUpperCase(); }" required>';
		
		//$str.=	'<select class="form-control input-sm" name="kakademik" id="kakademik" required>';
		
		
		$str.=	'<option value="" > --- Sila Pilih Kelayakan Akademik --- </option>';
		
		for($i=0;$i<$bil_1;$i++)
			{
		
		$kodtahap = $kodtahap1[$i];
		$ktrgntahap = $ktrgntahap1[$i];
		
				
			if($kakademik==$kodtahap)
			{
				
			$str.= '<option value="'.$kodtahap.'" selected >'.$ktrgntahap .'</option>';
		
			}
			else
			{
			$str.= '<option value="'.$kodtahap.'">'.$ktrgntahap .'</option>';
			}
					
				
			}
			
	
		$str.=	'</select>';
		
		$str.= '</div>';
		return $str;
		OCILogOff($c);
		}
		
	public static function  PilihanStaf($statusstaf)
	{
		global $c;
		$str = '';
		//echo "<< <br> $kodjabatan << $pilihan_jabatan";
		if($statusstaf==''){ $selected1="selected"; } else { $selected1="";	}
		if($statusstaf=='STAFF'){ $selected2="selected"; } else { $selected2="";	}
		if($statusstaf=='NON'){ $selected3="selected"; } else { $selected3="";	}
		
		$str.=	'<select class="form-control input-sm" name="statusstaf" id="statusstaf" required onchange="SubmitForm()">';
		
		
		$str.=	'<option value="" '.$selected1.'> --- Semua Permohonan --- </option>';
		$str.= '<option value="STAFF" '.$selected2.'>Staf UM</option>';
		$str.= '<option value="NON" '.$selected3.'>Bukan Staf UM</option>';
		$str.=	'</select>';
		
		
		return $str;
		OCILogOff($c);
		}
		
		
	public static function PilihanKursusPelulus($no_staff,$pilihansesi,$pilihanKursus,$status)
		{
		global $c;
		$str = '';
		
		
		if($status=='A1')
		{
			$syarat="AND PSH_NOSTAF_KJ='".$no_staff."'";
			
		}
		
		if($status=='A2')
		{
			$syarat="AND PSH_NOSTAF_KPTJ='".$no_staff."'";	
		}
		
		if($status=='A3')
		{
			$syarat="AND PSH_NOSTAF_KJ_AJAR='".$no_staff."'";
		}
		
		if($status=='A4')
		{
			$syarat="AND PSH_NOSTAF_KPTJ_AJAR='".$no_staff."'";
		}
		
		if($status=='D')
		{
			$syarat="";	
		}
		
		
		
		
		$cond = "SELECT PSH_KOD_KURSUS,COUNT(PSH_ID) AS KIRA
				FROM SN_KH_PENGAJAR_HDR
				WHERE PSH_SESI='".$pilihansesi."'
				AND PSH_STATUS_POHON='".$status."'
				$syarat
				GROUP BY PSH_KOD_KURSUS
				ORDER BY PSH_KOD_KURSUS
				 ";		
			
		$sql_semak1 = "	SELECT COUNT(*) AS KIRA FROM
						(
						$cond
						)
						";
		//echo $sql_semak1.'<br/>';				
		$sql_semak1a=oci_parse($c, $sql_semak1);
		oci_execute($sql_semak1a, OCI_DEFAULT);
		if (oci_fetch($sql_semak1a)) 				
			{
				  $bil_1 = ociresult($sql_semak1a,"KIRA");
			}
		//echo $bil_1.'<br>';
		oci_free_statement($sql_semak1a);
		
		$str.=	'<select class="form-control input-sm" name="pilihanKursus" id="pilihanKursus"  onchange="SubmitForm()" required>';
		$str.=	'<option value="" > --- Sila Pilih Kursus --- </option>';
		
		$sql_data1 = "$cond";
		//echo $sql_data1.'<br/>';				
		$sql_data1a=oci_parse($c, $sql_data1);
		oci_execute($sql_data1a, OCI_DEFAULT);
		
		
		while (oci_fetch($sql_data1a)) 				
			{
				 $kodKursus = ociresult($sql_data1a,"PSH_KOD_KURSUS");
				 $bil = ociresult($sql_data1a,"KIRA");
				 
				 $sql_data2 =	"	SELECT DISTINCT SUB_KTRGN_SUBJEK FROM 
                 					SN_KD_KURSUS_PELAJAR  
                                    WHERE SUB_KOD_SUBJEK='".$kodKursus."'
								";
				//echo $sql_semak1.'<br/><br/>';					
				$sql_data2a = OCIParse($c,$sql_data2);
				OCIExecute($sql_data2a,OCI_DEFAULT);
				if(OCIFetch($sql_data2a))
					{ 
						  $keteranganSubjek = OCIResult($sql_data2a,"SUB_KTRGN_SUBJEK");
					}
				oci_free_statement($sql_data2a);
				 
				 
				 
				 
				// $sesi=str_replace('/','',$sesipengajian);
		
		if($pilihanKursus==$kodKursus)
			{
			$str.= '<option value="'.$kodKursus.'" selected >'.$keteranganSubjek.'&nbsp;('.$kodKursus.')&nbsp;-&nbsp;'.$bil.' </option>';
		
			}
			else
			{
			$str.= '<option value="'.$kodKursus.'">'.$keteranganSubjek.'&nbsp;('.$kodKursus.')&nbsp;-&nbsp;'.$bil.'</option>';
			}
		}	
		
		if($pilihanKursus=='XX')
		{
		$str.=	'<option value="XX" selected="selected"> - SEMUA KURSUS - </option>';
		}
		else
		{
		$str.=	'<option value="XX" > - SEMUA KURSUS - </option>';	
		}
		$str.=	'</select>';		
		
		oci_free_statement($sql_data1a);
			
	
		
		
		
		return $str;
		OCILogOff($c);
		}
		
		
		
	
	}
//end Data SkrinAkses

class MPS_Operasi
	{
		public static function JanaNoRujukanIklan($no_staff)
		{
		global $c;
		
		// 1- semak staf punya jabatan
		
		$sql_semak1	=	"  	SELECT COUNT(*) AS KIRA FROM 
							(	
							SELECT KODPTJ_POHON 
							FROM SN_VW_ATT_STAFF 
							WHERE NOGAJI_POHON = '".$no_staff."'
							)
							";
		//echo $sql_semak1;
		
		$sql_semak1a = oci_parse($c,$sql_semak1);
		oci_execute($sql_semak1a,OCI_DEFAULT);
		if(oci_fetch($sql_semak1a))
			{
				$bil_1 = oci_result($sql_semak1a,"KIRA");
			}
		oci_free_statement($sql_semak1a);
		
		if($bil_1 > 0)
			{
			$sql_data1	=	"  	SELECT KODPTJ_POHON 
								FROM SN_VW_ATT_STAFF 
								WHERE NOGAJI_POHON = '".$no_staff."'
								";
			//echo $sql_data1;
			
			$sql_data1a = oci_parse($c,$sql_data1);
			oci_execute($sql_data1a,OCI_DEFAULT);
			if(oci_fetch($sql_data1a))
				{
					$ptj = oci_result($sql_data1a,"KODPTJ_POHON");
				}
			oci_free_statement($sql_data1a);
			
			$sql_semak2	=	"  	SELECT COUNT(*) AS KIRA FROM 
								(	
								SELECT TO_CHAR(TWK_TKH_ISI,'YYYYMMDDHH24MISS') AS TRC_TKH_POHON,
								TWK_JABATAN,TWK_SESI,TWK_KOD_KURSUS,TWK_SEM,
								TWK_KATEGORI_JAWATAN 
								FROM SN_KH_TAWARAN_KURSUS,SN_KD_JBT 
								WHERE TWK_NORUJUK IS NULL
								AND TWK_JABATAN = JBT_KOD_JABATAN
								AND JBT_KOD_PTJ = '".$ptj."'
								)
							";
			//echo $sql_semak2;
			
			$sql_semak2a = oci_parse($c,$sql_semak2);
			oci_execute($sql_semak2a,OCI_DEFAULT);
			if(oci_fetch($sql_semak2a))
				{
					$bil_2 = oci_result($sql_semak2a,"KIRA");
				}
			oci_free_statement($sql_semak2a);
			
			if($bil_2 > 0)
			{
				$sql_data2	=	"  	SELECT TO_CHAR(TWK_TKH_ISI,'YYYYMMDDHH24MISS') AS TWK_TKH_ISI,
									TWK_JABATAN,TWK_SESI,TWK_KOD_KURSUS,TWK_SEM,
									TWK_KATEGORI_JAWATAN 
									FROM SN_KH_TAWARAN_KURSUS,SN_KD_JBT 
									WHERE TWK_NORUJUK IS NULL
									AND TWK_JABATAN = JBT_KOD_JABATAN
									AND JBT_KOD_PTJ = '".$ptj."'
								";
				//echo $sql_data2;
				$sql_data2a = oci_parse($c,$sql_data2);
				oci_execute($sql_data2a,OCI_DEFAULT);
				while(oci_fetch($sql_data2a))
					{
						  $tkh_isi = oci_result($sql_data2a,"TWK_TKH_ISI");
						  $jabatan = oci_result($sql_data2a,"TWK_JABATAN");
						     $sesi = oci_result($sql_data2a,"TWK_SESI");
					   $kod_kursus = oci_result($sql_data2a,"TWK_KOD_KURSUS");
						      $sem = oci_result($sql_data2a,"TWK_SEM");
				  		$kat_jawat = oci_result($sql_data2a,"TWK_KATEGORI_JAWATAN");
						
											
							$tahun = substr($tkh_isi,0,4);
							$bulan = substr($tkh_isi,4,2);
							
							$tahunbulan="$tahun$bulan";
							
							//$tahunbulan="201803";
							
							//echo $tahun.'$tahun<br/>';
							//echo $bulan.'$bulan<br/>';
					
						$no_rujuk = MPS_Operasi::JanaNoRujukanIklanSemasa($tahun,$bulan);
					//	echo $max.'$max<br/>';
					//	echo $no_rujuk.'$no_rujuk<br/>';
						
						$sql_update1	=	"  	UPDATE SN_KH_TAWARAN_KURSUS 
												SET TWK_NORUJUK  = '".$no_rujuk."'
												WHERE TO_CHAR(TWK_TKH_ISI,'YYYYMMDDHH24MISS') ='".$tkh_isi."'
												AND TWK_JABATAN='".$jabatan."'
												AND TWK_SESI='".$sesi."'
												AND TWK_SEM='".$sem."'
												AND TWK_KOD_KURSUS='".$kod_kursus."'
												AND TWK_KATEGORI_JAWATAN='".$kat_jawat."'
												
											";
						//echo $sql_update1.'<br/><br/>';
						$sql_update1a = oci_parse($c,$sql_update1);
						oci_execute($sql_update1a,OCI_DEFAULT);
						
						
						
						$sql_update2	=	"  	UPDATE SN_KH_TAWARAN_INFO SET TWI_NORUJUK='".$no_rujuk."'
												WHERE  TWI_JABATAN='".$jabatan."'
												AND TWI_SESI='".$sesi."'
												AND TWI_SEM='".$sem."'
												AND TWI_KOD_KURSUS='".$kod_kursus."'
												AND TWI_KATEGORI_JAWATAN='".$kat_jawat."'
												";
						//echo $sql_update2.'<br/><br/>';
						$sql_update2a = oci_parse($c,$sql_update2);
						oci_execute($sql_update2a,OCI_DEFAULT);
						
						$sql_update3	=	"  	UPDATE SN_KH_KEPERLUAN_KURSUS SET KPK_NORUJUK='".$no_rujuk."'
												WHERE  KPK_JABATAN='".$jabatan."'
												AND KPK_SESI='".$sesi."'
												AND KPK_SEM='".$sem."'
												AND KPK_KOD_KURSUS='".$kod_kursus."'
												AND KPK_KATEGORI_JAWATAN='".$kat_jawat."'
											 ";
						//echo $sql_update3.'<br/><br/>';
						$sql_update3a = oci_parse($c,$sql_update3);
						oci_execute($sql_update3a,OCI_DEFAULT);
						
						ocicommit($c);
						}
						
						//exit;
					
					oci_free_statement($sql_data2a);
				}
				
	
						/*$sql_semak3	=	" SELECT TWK_NORUJUK,
										  TWK_JABATAN,TWK_SESI,TWK_KOD_KURSUS,TWK_SEM,
										  TWK_KATEGORI_JAWATAN 
										  FROM SN_KH_TAWARAN_KURSUS,SN_KD_JBT 
										  WHERE TWK_JABATAN = JBT_KOD_JABATAN
										  AND TWK_NORUJUK IS NOT NULL
										  AND JBT_KOD_PTJ = '".$ptj."'
										";
						//echo $sql_semak3;
						
						$sql_semak3a = oci_parse($c,$sql_semak3);
						oci_execute($sql_semak3a,OCI_DEFAULT);
						while(oci_fetch($sql_semak3a))
						{
						  $norujukan = oci_result($sql_semak3a,"TWK_NORUJUK");
						  $jabatan = oci_result($sql_semak3a,"TWK_JABATAN");
						     $sesi = oci_result($sql_semak3a,"TWK_SESI");
					   $kod_kursus = oci_result($sql_semak3a,"TWK_KOD_KURSUS");
						      $sem = oci_result($sql_semak3a,"TWK_SEM");
				  		$kat_jawat = oci_result($sql_semak3a,"TWK_KATEGORI_JAWATAN");
						
						
					
						
						oci_commit($c);
						
						}
						oci_free_statement($sql_semak3a);*/
						
						
						//oci_free_statement($sql_update3a);						
					
			}
					
			
		ocilogoff($c);	
		}
		
		public static function JanaKumpulanSeq($no_staff,$sesi,$semester)
		{
		global $c;
		
		//1.bersihkan data
		$sesihdr=str_replace('/','_',$sesi);
		
		
		
		// 1- semak staf punya jabatan
		
		$sql_semak1	=	"  	SELECT COUNT(*) AS KIRA FROM 
							(	
							SELECT PSH_KUMPULAN_SEQ FROM SN_KH_PENGAJAR_HDR
							WHERE PSH_ID='".$no_staff."'
							AND PSH_SESI='".$sesi."'
							AND PSH_SEMESTER='".$semester."'
							)
							";
		//echo $sql_semak1;
		
		$sql_semak1a = oci_parse($c,$sql_semak1);
		oci_execute($sql_semak1a,OCI_DEFAULT);
		if(oci_fetch($sql_semak1a))
			{
				$bil_1 = oci_result($sql_semak1a,"KIRA");
			}
		oci_free_statement($sql_semak1a);
		
		
			$sql_data1	=	"SELECT NVL(MAX(SUBSTR(A.PSH_KUMPULAN_SEQ,13)),0) AS NILAI_MAKSIMUM 
                      	     FROM SN_KH_PENGAJAR_HDR A
                             WHERE PSH_ID='".$no_staff."'
							 AND PSH_SESI='".$sesi."'
							 AND PSH_SEMESTER='".$semester."'
							";
		//echo $sql_data1;
		
		$sql_data1a = oci_parse($c,$sql_data1);
		oci_execute($sql_data1a,OCI_DEFAULT);
		if(oci_fetch($sql_data1a))
			{
				$max = oci_result($sql_data1a,"NILAI_MAKSIMUM");
			}
		oci_free_statement($sql_data1a);
		
		if ($max == 999) 
				{
					//alert script = "Bilangan Data telah mencapai bilangan Maximum untuk Bulan ini. Sila cuba bulan depan"	
				} 
			else 
				{
				$seq = $max+1;
				$no_rujuk = $sesihdr.'_'.$semester.'_'.str_pad($seq,3, "0", STR_PAD_LEFT);											
				}
			
		return $no_rujuk;
		ocilogoff($c);	
			
			
		
		}
		
		public static function JanaNoRujukanIklanSemasa($tahun,$bulan)
			{
		global $c;
		
		$sql_data2	="  SELECT NVL(MAX(SUBSTR(A.TWK_NORUJUK,9)),0) AS NILAI_MAKSIMUM 
                        FROM SN_KH_TAWARAN_KURSUS A
                        WHERE SUBSTR(A.TWK_NORUJUK,3,4) = '".$tahun."'
                        AND SUBSTR(A.TWK_NORUJUK,7,2)  = '".$bulan."'
						";
		//echo $sql_data2.'<br/>';
			
			$sql_data2a = oci_parse($c,$sql_data2);
			oci_execute($sql_data2a,OCI_DEFAULT);
			if(oci_fetch($sql_data2a))
				{
					$max = oci_result($sql_data2a,"NILAI_MAKSIMUM");
				}
			oci_free_statement($sql_data2a);	
			
			if ($max == 99999) 
				{
					//alert script = "Bilangan Data telah mencapai bilangan Maximum untuk Bulan ini. Sila cuba bulan depan"	
				} 
			else 
				{
				$seq = $max+1;
				$no_rujuk = 'PS'.$tahun.$bulan.str_pad($seq,5, "0", STR_PAD_LEFT);											
				}
			
		return $no_rujuk;
		ocilogoff($c);	
		}
		
		public static function NoRujukanPengajaran($tahun,$bulan)
			{
		global $c;
		
		$sql_data2	="  SELECT NVL(MAX(SUBSTR(A.PSH_NORUJUK_PENGAJAR,9)),0) AS NILAI_MAKSIMUM 
						FROM SN_KH_PENGAJAR_HDR A
						WHERE SUBSTR(A.PSH_NORUJUK_PENGAJAR,3,4) = '".$tahun."'
						AND SUBSTR(A.PSH_NORUJUK_PENGAJAR,7,2)  = '".$bulan."'
						";
		//echo $sql_data2.'<br/>';
			
			$sql_data2a = oci_parse($c,$sql_data2);
			oci_execute($sql_data2a,OCI_DEFAULT);
			if(oci_fetch($sql_data2a))
				{
					$max = oci_result($sql_data2a,"NILAI_MAKSIMUM");
				}
			oci_free_statement($sql_data2a);	
			
			if ($max == 99999) 
				{
					//alert script = "Bilangan Data telah mencapai bilangan Maximum untuk Bulan ini. Sila cuba bulan depan"	
				} 
			else 
				{
				$seq = $max+1;
				$no_rujuk = 'PG'.$tahun.$bulan.str_pad($seq,5, "0", STR_PAD_LEFT);											
				}
			
		return $no_rujuk;
		ocilogoff($c);	
		}
		
		
		
	}
	

class StatistikNomborRujukan
{
	public static function  StatistikTableKursus($pilihansesi,$semester,$jnsKategori)
	{
		global $c;
		$str = '';
		//echo "<< <br> $kodjabatan << $pilihan_jabatan";
		
		if($jnsKategori=='')
		{
			$cond1="";
			$cond2="";
		}
		
		if($jnsKategori==1)
		{
			$cond1="AND TWK_NORUJUK IS NOT NULL";
			$cond2="AND TWK_SEM='".$semester."'";
		}
		
		if($jnsKategori==2)
		{
			$cond1="AND TWK_NORUJUK IS NULL";
			$cond2="AND TWK_SEM='".$semester."'";
		}
		
		$sql = "  SELECT DISTINCT TWK_JABATAN,TWK_SESI,TWK_SEM,
				  TWK_KOD_KURSUS,TWK_KATEGORI_JAWATAN
				  FROM SN_KH_TAWARAN_KURSUS
				  WHERE
				  TWK_SESI='".$pilihansesi."'
				  $cond1
				  $cond2
				  AND TWK_JABATAN IS NOT NULL
				  AND TWK_SESI IS NOT NULL
				  AND TWK_SEM IS NOT NULL
				  AND TWK_KOD_KURSUS IS NOT NULL
				  AND TWK_KATEGORI_JAWATAN IS NOT NULL
               ";
			
			
		$sql_semak1 = "	SELECT COUNT(*) AS KIRA FROM
						(
						$sql
						)
						";
		//echo $sql_semak1.'<br/>';				
		$sql_semak1a=oci_parse($c, $sql_semak1);
		oci_execute($sql_semak1a, OCI_DEFAULT);
		if (oci_fetch($sql_semak1a)) 				
			{
				  $bil_1 = ociresult($sql_semak1a,"KIRA");
			}
		//echo $bil_1.'<br>';
		oci_free_statement($sql_semak1a);
		
		return $bil_1;
		
		OCILogOff($c);
		}	
		
	public static function  StatistikTableInfo($pilihansesi,$semester,$jnsKategori)
	{
		global $c;
		$str = '';
		//echo "<< <br> $kodjabatan << $pilihan_jabatan";
		
		if($jnsKategori=='')
		{
			$cond1="";
			$cond2="";
		}
		
		if($jnsKategori==1)
		{
			$cond1="AND TWI_NORUJUK IS NOT NULL";
			$cond2="AND TWI_SEM='".$semester."'";
		}
		
		if($jnsKategori==2)
		{
			$cond1="AND TWI_NORUJUK IS NULL";
			$cond2="AND TWI_SEM='".$semester."'";
		}
		
		$sql = "  SELECT DISTINCT TWI_JABATAN,TWI_SESI,TWI_KOD_KURSUS,
				  TWI_SEM,TWI_KATEGORI_JAWATAN
				  FROM SN_KH_TAWARAN_INFO
				  WHERE
				  TWI_SESI='".$pilihansesi."'
				  $cond1
				  $cond2
 				  AND TWI_JABATAN IS NOT NULL
                  AND TWI_SESI IS NOT NULL
				  AND TWI_SEM IS NOT NULL
				  AND TWI_KOD_KURSUS IS NOT NULL
	              AND TWI_KATEGORI_JAWATAN IS NOT NULL               
				";
			
			
		$sql_semak1 = "	SELECT COUNT(*) AS KIRA FROM
						(
						$sql
						)
						";
		//echo $sql_semak1.'<br/>';				
		$sql_semak1a=oci_parse($c, $sql_semak1);
		oci_execute($sql_semak1a, OCI_DEFAULT);
		if (oci_fetch($sql_semak1a)) 				
			{
				  $bil_1 = ociresult($sql_semak1a,"KIRA");
			}
		//echo $bil_1.'<br>';
		oci_free_statement($sql_semak1a);
		
		return $bil_1;
		
		OCILogOff($c);
		}
		
	public static function  StatistikTableKeperluanKursus($pilihansesi,$semester,$jnsKategori)
	{
		global $c;
		$str = '';
		//echo "<< <br> $kodjabatan << $pilihan_jabatan";
		if($jnsKategori=='')
		{
			$cond1="";
			$cond2="";
		}
		
		
		if($jnsKategori==1)
		{
			$cond1="AND KPK_NORUJUK IS NOT NULL";
			$cond2="AND KPK_SEM='".$semester."'";
		}
		
		if($jnsKategori==2)
		{
			$cond1="AND KPK_NORUJUK IS NULL";
			$cond2="AND KPK_SEM='".$semester."'";
		}
		
		$sql = "  SELECT DISTINCT KPK_JABATAN,KPK_SESI,KPK_SEM,KPK_KOD_KURSUS,KPK_KATEGORI_JAWATAN
				  FROM SN_KH_KEPERLUAN_KURSUS
				  WHERE
				  KPK_SESI='".$pilihansesi."'
				  $cond1
				  $cond2
				  AND KPK_JABATAN IS NOT NULL
				  AND KPK_SESI IS NOT NULL
                  AND KPK_SEM IS NOT NULL
                  AND KPK_KOD_KURSUS IS NOT NULL
                  AND KPK_KATEGORI_JAWATAN IS NOT NULL
               ";
			
			
		$sql_semak1 = "	SELECT COUNT(*) AS KIRA FROM
						(
						$sql
						)
						";
		//echo $sql_semak1.'<br/>';				
		$sql_semak1a=oci_parse($c, $sql_semak1);
		oci_execute($sql_semak1a, OCI_DEFAULT);
		if (oci_fetch($sql_semak1a)) 				
			{
				  $bil_1 = ociresult($sql_semak1a,"KIRA");
			}
		//echo $bil_1.'<br>';
		oci_free_statement($sql_semak1a);
		
		return $bil_1;
		
		OCILogOff($c);
		}
		
		
	public static function  StatistikTablePengajaran($pilihansesi,$semester,$jnsKategori)
	{
		global $c;
		$str = '';
		//echo "<< <br> $kodjabatan << $pilihan_jabatan";
		
		if($jnsKategori=='')
		{
			$cond1="";
			$cond2="";
		}
		
		if($jnsKategori==1)
		{
			$cond1="AND PSH_NORUJUK_PENGAJAR IS NOT NULL";
			$cond2="AND PSH_SEMESTER='".$semester."'";
		}
		
		if($jnsKategori==2)
		{
			$cond1="AND PSH_NORUJUK_PENGAJAR IS NULL";
			$cond2="AND PSH_SEMESTER='".$semester."'";
		}
		
		$sql = "  SELECT ROWIDTOCHAR(ROWID) AS ROW_ID,PSH_ID,PSH_JABATAN_AJAR,PSH_SESI,
				  PSH_KOD_KURSUS,PSH_SEMESTER,
				  PSH_KATEGORI_JAWATAN,PSH_NORUJUK_IKLAN
				  FROM SN_KH_PENGAJAR_HDR
				  WHERE PSH_SESI='".$pilihansesi."'
				  $cond1
				  $cond2
				  AND PSH_JABATAN_AJAR IS NOT NULL
				  AND PSH_SESI IS NOT NULL
				  AND PSH_SEMESTER IS NOT NULL
				  AND PSH_KOD_KURSUS IS NOT NULL
				  AND PSH_KATEGORI_JAWATAN IS NOT NULL
				  AND PSH_CREATED_DATE IS NOT NULL
               ";
			
			
		$sql_semak1 = "	SELECT COUNT(*) AS KIRA FROM
						(
						$sql
						)
						";
		//echo $sql_semak1.'<br/>';				
		$sql_semak1a=oci_parse($c, $sql_semak1);
		oci_execute($sql_semak1a, OCI_DEFAULT);
		if (oci_fetch($sql_semak1a)) 				
			{
				  $bil_1 = ociresult($sql_semak1a,"KIRA");
			}
		//echo $bil_1.'<br>';
		oci_free_statement($sql_semak1a);
		
		return $bil_1;
		
		OCILogOff($c);
		}
		
	public static function  StatistikTablePengajaranIklan($pilihansesi,$semester,$jnsKategori)
	{
		global $c;
		$str = '';
		//echo "<< <br> $kodjabatan << $pilihan_jabatan";
		
		if($jnsKategori=='')
		{
			$cond1="";
			$cond2="";
		}
		
		if($jnsKategori==1)
		{
			$cond1="AND PSH_NORUJUK_IKLAN IS NOT NULL";
			$cond2="AND PSH_SEMESTER='".$semester."'";
		}
		
		if($jnsKategori==2)
		{
			$cond1="AND PSH_NORUJUK_IKLAN IS NULL";
			$cond2="AND PSH_SEMESTER='".$semester."'";
		}
		
		$sql = "  SELECT ROWIDTOCHAR(ROWID) AS ROW_ID,PSH_ID,PSH_JABATAN_AJAR,PSH_SESI,
				  PSH_KOD_KURSUS,PSH_SEMESTER,
				  PSH_KATEGORI_JAWATAN,PSH_NORUJUK_IKLAN
				  FROM SN_KH_PENGAJAR_HDR
				  WHERE PSH_SESI='".$pilihansesi."'
				  $cond1
				  $cond2
				  AND PSH_JABATAN_AJAR IS NOT NULL
				  AND PSH_SESI IS NOT NULL
				  AND PSH_SEMESTER IS NOT NULL
				  AND PSH_KOD_KURSUS IS NOT NULL
				  AND PSH_KATEGORI_JAWATAN IS NOT NULL
				  AND PSH_CREATED_DATE IS NOT NULL
               ";
			
			
		$sql_semak1 = "	SELECT COUNT(*) AS KIRA FROM
						(
						$sql
						)
						";
		//echo $sql_semak1.'<br/>';				
		$sql_semak1a=oci_parse($c, $sql_semak1);
		oci_execute($sql_semak1a, OCI_DEFAULT);
		if (oci_fetch($sql_semak1a)) 				
			{
				  $bil_1 = ociresult($sql_semak1a,"KIRA");
			}
		//echo $bil_1.'<br>';
		oci_free_statement($sql_semak1a);
		
		return $bil_1;
		
		OCILogOff($c);
		}
		
	public static function  StatistikTablePengajaranSeq($pilihansesi,$semester,$jnsKategori)
	{
		global $c;
		$str = '';
		//echo "<< <br> $kodjabatan << $pilihan_jabatan";
		
		if($jnsKategori=='')
		{
			$cond1="";
			$cond2="";
		}
		
		if($jnsKategori==1)
		{
			$cond1="AND PSH_KUMPULAN_SEQ IS NOT NULL";
			$cond2="AND PSH_SEMESTER='".$semester."'";
		}
		
		if($jnsKategori==2)
		{
			$cond1="AND PSH_KUMPULAN_SEQ IS NULL";
			$cond2="AND PSH_SEMESTER='".$semester."'";
		}
		
		$sql = "  SELECT ROWIDTOCHAR(ROWID) AS ROW_ID,PSH_ID,PSH_JABATAN_AJAR,PSH_SESI,
				  PSH_KOD_KURSUS,PSH_SEMESTER,
				  PSH_KATEGORI_JAWATAN,PSH_NORUJUK_IKLAN
				  FROM SN_KH_PENGAJAR_HDR
				  WHERE PSH_SESI='".$pilihansesi."'
				  $cond1
				  $cond2
				  AND PSH_JABATAN_AJAR IS NOT NULL
				  AND PSH_SESI IS NOT NULL
				  AND PSH_SEMESTER IS NOT NULL
				  AND PSH_KOD_KURSUS IS NOT NULL
				  AND PSH_KATEGORI_JAWATAN IS NOT NULL
				  AND PSH_CREATED_DATE IS NOT NULL
               ";
			
			
		$sql_semak1 = "	SELECT COUNT(*) AS KIRA FROM
						(
						$sql
						)
						";
		//echo $sql_semak1.'<br/>';				
		$sql_semak1a=oci_parse($c, $sql_semak1);
		oci_execute($sql_semak1a, OCI_DEFAULT);
		if (oci_fetch($sql_semak1a)) 				
			{
				  $bil_1 = ociresult($sql_semak1a,"KIRA");
			}
		//echo $bil_1.'<br>';
		oci_free_statement($sql_semak1a);
		
		return $bil_1;
		
		OCILogOff($c);
		}
}

class MPS_Papar
{
	
		public static function Papar_MaklumatStaf($susunan,$no_staff)
		{
	$str = '';
	
	$Data1 = MPS_Data::DataStaff($no_staff);
	
	$jns_staff=$Data1['jns_staff'];
	
	//echo "<< $jns_staff";
		
	
	$str.=	'<div class="row">';
	$str.=	'<div class="col-lg-12">';
	$str.=	'<div class="panel panel-info width="100%">';
    $str.=	'<div class="panel-heading">';
	
	$str.= '<table width="100%">';
	$str.= '<tr>';
	$str.= '<td width="3%"><span class="fa-stack fa-lg fa-2x">';
   	$str.=	'<i class="fa fa-circle-thin fa-stack-2x"></i>';
   	$str.=	'<i class="fa fa-stack-1x"><div style="font-size:12px"><b>'.$susunan.'</b></div></i>';
 	$str.=	'</span></td>';
	$str.= '<td width="2%">&nbsp;</td>';
	$str.= '<td align="left" width="75%">';
	$str.=	'<div><b>Maklumat Staf</b></div>';
	$str.=	'<div><em>Staff Information</em></div>';
	$str.= '</td></tr></table>';
		
	$str.= '</div><!-- /.panel-heading" -->';

	$str.=	'<div class="panel-body">';
	
	$str.=	'<div class="col-lg-12">';
	$str.=	'<table width="100%" class="table table-borderless" style="font-size:12px" border="0">';
	$str.=	'<tr>';
	$str.=	'<td >';
	$str.=	'<font class="font_sub_title_bm" >Maklumat Staf </font><br>';
	$str.=	'<font class="font_sub_title_bi">Staff Information</font>';
	$str.=	'</td>';
	$str.=	'</tr>';
	
	$str.=	'</table>';
	$str.=	'</div>';
	
	
	$str.=	'<div class="col-lg-6">';
	$str.=	'<table width="100%" class="table table-borderless" style="font-size:12px">';
	$str.=	'<tr>';
	$str.=	'<td width="30%">';
	$str.=	'<div class="font_others_bm">Nama</div>';
	$str.=	'<div class="font_others_bi">(Name)</div></td>';
	$str.=	'<td width="10%">:</td>';
	$str.=	'<td width="60%">'.$Data1['nama'].' ('.$no_staff.')</td>';
	$str.=	'</tr>';
	
	$str.=	'<tr>';
	$str.=	'<td>';
	$str.=	'<div class="font_others_bm">Jawatan</div>';
	$str.=	'<div class="font_others_bi">(Designation)</div></td>';
	$str.=	'<td>:</td>';
	$str.=	'<td>';
	if($jns_staff=='NON')
	{
	$str.=  $Data1['ktrgn_jawatan'];	
	}
	else
	{
	$str.=  $Data1['ktrgn_jawatan'].' ('.$Data1['gred'].')';
	}
	$str.=	'</td>';
	$str.=	'</tr>';
	
	$str.=	'</table>';
	$str.=	'</div><!-- /.col-md-6 -->';	
	
	$str.=	'<div class="col-lg-6">';
	$str.=	'<table width="100%" class="table table-borderless" style="font-size:12px">';
	if($jns_staff=='NON')
	{
	
	$str.=	'<tr>';
	$str.=	'<td width="30%">';
	
	$str.=	'<div class="font_others_bm">Maklumat Emel</div>';
	$str.=	'<div class="font_others_bi">Information Email</div></td>';
	$str.=	'<td width="10%">:</td>';
	$str.=	'<td width="60%">';
	$str.=  $Data1['email'];
	$str.=	'</td>';
	$str.=	'</tr>';
	}
	else
	{

	$str.=	'<tr>';
	$str.=	'<td width="30%">';
	
	$str.=	'<div class="font_others_bm">Ptj</div>';
	$str.=	'<div class="font_others_bi">(Ptj)</div></td>';
	$str.=	'<td width="10%">:</td>';
	$str.=	'<td width="60%">';
	$str.=  $Data1['ktrgn_ptj'];
	$str.=	'</td>';
	$str.=	'</tr>';
	}
	
	if($jns_staff=='NON')
	{
	}
	else
	{
	$str.=	'<tr>';
	$str.=	'<td>';
	$str.=	'<div class="font_others_bm">Jabatan</div>';
	$str.=	'<div class="font_others_bi">(Department)</div></td>';
	$str.=	'<td>:</td>';
	$str.=	'<td>'.$Data1['ktrgn_jbt'].'</td>';
	$str.=	'</tr>';
	}
	$str.=	'</table>';
	$str.=	'</div><!-- /.col-md-6 -->';		
	
	
	$str.=	'</div><!-- /.panel-body -->';	
	
	$str.=	'</div><!-- /.panel -->';
	$str.=	'</div><!-- /.col-lg-12 -->';	
	$str.=	'</div><!-- /.row -->';
	
	return $str;
	}
	
		/*public static function Papar_MaklumatStaf($susunan,$no_staff)
		{
	$str = '';
	
	
	$Data1= MPS_Data::DataStaff($no_staff);
	$kkelayakan=$Data1['ktrgn_akademik'];
	
	$Data2= MPS_Data::DataTahapKelayakanKursus($kkelayakan);
	$ktrgnkelayakan=$Data2['ktrgnkelayakan'];
	//echo "<< $jns_staff";
		
	
	$str.=	'<div class="row">';
	$str.=	'<div class="col-lg-12">';
	$str.=	'<div class="panel panel-info width="100%">';
    $str.=	'<div class="panel-heading">';
	
	$str.= '<table width="100%" style="font-size:11px">';
	$str.= '<tr>';
	$str.= '<td width="3%"><span class="fa-stack fa-lg fa-2x">';
   	$str.=	'<i class="fa fa-circle-thin fa-stack-2x"></i>';
   	$str.=	'<i class="fa fa-stack-1x"><div style="font-size:11px"><b>'.$susunan.'</b></div></i>';
 	$str.=	'</span></td>';
	$str.= '<td width="2%">&nbsp;</td>';
	$str.= '<td align="left" width="75%">';
	$str.=	'<div><font class="font_sub_title_bm" >Maklumat Pemohon</font></div>';
	$str.=	'<div><font class="font_sub_title_bi">User Information</font></div>';
	$str.= '</td></tr></table>';
		
	$str.= '</div><!-- /.panel-heading" -->';

	$str.=	'<div class="panel-body">';
	
	
	$str.=	'<div class="col-lg-12" style="font-size:11px">';
	
	$str.=	'<table width="100%" class="table table-borderless" style="font-size:11px" border="0">';
	$str.=	'<tr>';
	$str.=	'<td >';
	$str.=	'<font class="font_sub_title_bm" ><strong>Maklumat Pemohon </strong></font><br>';
	$str.=	'<font class="font_sub_title_bi"><em>User Information</em></font>';
	$str.=	'</td>';
	$str.=	'</tr>';
	
	$str.=	'</table>';
	$str.=	'</div>';
	
	
	$str.=	'<div class="col-lg-6">';
	$str.=	'<table width="100%"  style="font-size:11px">';
	$str.=	'<tr>';
	$str.=	'<td width="30%" >';
	$str.=	'<div ><strong>Nama</strong></div>';
	$str.=	'<div ><em>(Name)</em></div></td>';
	$str.=	'<td width="10%">:</td>';
	$str.=	'<td width="60%">'.$Data1['nama'].' ('.$no_staff.')</td>';
	$str.=	'</tr>';
	
	
	$str.=	'<tr>';
	$str.=	'<td>';
	$str.=	'<div ><strong>Kad Pengenalan/Passport</strong></div>';
	$str.=	'<div ><em>(Ic/Passport No)</em></div></td>';
	$str.=	'<td>:</td>';
	$str.=	'<td>';
	
	$str.=  $no_staff;
	
	$str.=	'</td>';
	$str.=	'</tr>';
	
	if($Data1['ktrgn_jawatan']!='')
	{
	$str.=	'<tr>';
	$str.=	'<td>';
	$str.=	'<div ><strong>Jawatan</strong></div>';
	$str.=	'<div ><em>(Designation)</em></div></td>';
	$str.=	'<td>:</td>';
	$str.=	'<td>';
	
	$str.=  $Data1['ktrgn_jawatan'].'';
	
	$str.=	'</td>';
	$str.=	'</tr>';
	}
	$str.=	'<tr>';
	$str.=	'<td>';
	$str.=	'<div><strong>Kelulusan Akademik Tertinggi</strong>
</div>';
	$str.=	'<div ><em>(Highest Academic Qualification)</em></div></td>';
	$str.=	'<td>:</td>';
	$str.=	'<td>';
	
	$str.=  $ktrgnkelayakan;
	
	$str.=	'</td>';
	$str.=	'</tr>';
	
	
	$str.=	'</table>';
	$str.=	'</div><!-- /.col-md-6 -->';	
	
	
	
	$str.=	'</div><!-- /.panel-body -->';	
	
	$str.=	'</div><!-- /.panel -->';
	$str.=	'</div><!-- /.col-lg-12 -->';	
	$str.=	'</div><!-- /.row -->';
	
	return $str;
	}*/	
}


?>


	







	
	
	
	
	
	
	
	
			 





