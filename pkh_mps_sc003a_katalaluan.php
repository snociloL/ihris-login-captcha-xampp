<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>

	<title>Modul -  Modul Pengajaran Sambilan</title>
	
    <!-- Bootstrap Core CSS -->
    <link href="bootstrap_css_1/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="bootstrap_css_1/css/plugins/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- DataTables CSS -->
    <link href="bootstrap_css_1/css/plugins/dataTables.bootstrap.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="bootstrap_css_1/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="bootstrap_css_1/font-awesome-4.1.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    
    <link rel="stylesheet" type="text/css" href="style/style.css" />

</head>
<body onLoad="top.scrollTo(0,0)">

<?php

if($conn_oracle_status == 'test')
		{
			error_reporting(E_ALL);
			ini_set('display_errors', 1);
		}

//session_start(); 
//include('dbconnect.php');

include("include/conn_oracle.php"); 

	
echo PaparanIndex();

		
	function PaparanIndex()
		{
		$str = '';
		
		$flag = isset($_GET['flag'])?$_GET['flag']:'flag';
		if ($flag == 'flag') {$flag = isset($_POST['flag'])?$_POST['flag']:'';}
		
		$str.= 	'<table width="100%" style="font-size:12px;">';
		$str.= 	'<tr><td collspan="3">&nbsp;</td></tr>';
		$str.= 	'<tr>';
		$str.= 	'<td width="5%">&nbsp;</td>';
		$str.= 	'<td width="90%">';
		$str.=	'<div class="row">';
		$str.=	'<div class="col-lg-12">';
		$str.=	'<div class="panel panel-primary widht="100%">';
		
        $str.=	'<div class="panel-heading"></i></button><b>Log Masuk Pengajaran Sambilan</b><br/>';
		$str.=	'<em>Part-time Teaching Login</em></div>';
                       
		$str.=	'<div class="panel-body">';
		
		if($flag==1)
		{
		$str.=  TerlupaKataLaluan();
		}
		if($flag==2)
		{
		$str.=  TiadaKataLaluan();
		}
		$str.=	'</div>';
		$str.=	'<!-- /.panel-body -->';
		
		$str.=  '<div class="panel-footer">';
		$str.=  '<table>';
		$str.=  '<tr>';
		$str.=  '<td>';
		$str.=	'<a href="pkh_mps_sc001a_login.php">';
		$str.=	'<button type="button" class="btn btn-default btn-sm pull-left">&lt;&lt;&nbsp;&nbsp;Kembali [Back]</button>';	
		$str.=	'</a>';
		$str.=  '</td>';
		$str.=  '</tr>';
		$str.=  '</table>';
		$str.= 	'</div>';
		$str.=	'<!-- /.panel-footer -->';
		$str.=	'</div>';
        $str.=	'<!-- /.panel -->';
		$str.=	'</div>';
        $str.=	'<!-- /.col-lg-12 -->';
		$str.=	'</div>';
		$str.=	'<!-- /.row -->';
		
		$str.=  '</td>';
		$str.=  '<td width="5%">&nbsp;</td>';
		$str.=  '</tr>';
		
		$str.=  '</table>';
		
		return $str;
		}
		
		
	function  TerlupaKataLaluan()
		{
		global $c;	
		$str= '';
		
		
		$str.= ' <div class="container" align="center">';
		$str.= ' <div class="row" align="center">';
		$str.= ' <div class="row" align="center">';
		$str.= ' <div class="col-md-6 col-md-offset-3" align="center">';
		$str.= ' <div class="panel panel-default">';
		$str.= ' <div class="panel-body">';
		$str.= ' <div class="text-center">';
		$str.= ' <h3><i class="fa fa-lock fa-4x"></i></h3>';
		$str.= ' <h2 class="text-center">Forgot Password?</h2>';
		$str.= ' <p>You can reset your password here.</p>';
		$str.= ' <div class="panel-body">';
							 
		$str.= ' <form class="form" action="pkh_mps_sc002a_operasi.php?flag=2" method="post">';
		$str.= ' <fieldset>';
		$str.= ' <div class="form-group">';
		$str.= ' <div class="input-group">';
		$str.= ' <span class="input-group-addon"><i class="glyphicon glyphicon-envelope color-blue"></i></span>';
									  
		$str.= ' <input style="font-size:11px" size="60" maxlength="60" type="text" class="form-control" 
		name="email" id="email"  placeholder="Emel Pengajaran Sambilan / Part Time Teaching Email"  oninvalid="setCustomValidity("Please enter a valid email address!")" onchange="try{setCustomValidity("")}catch(e){}" required>';
		//$str.= 'oninvalid="setCustomValidity("Please enter a valid email address!")" onchange="try{setCustomValidity('')}catch(e){}" required="">';
		$str.= ' </div>';
		$str.= ' </div>';

		$str.='<?php echo $status; ?>';
		$str.='<form name="validation" method="post" action="">';
		$str.='<label><strong>Enter Captcha:</strong></label><br />';
		$str.='<input type="text" name="captcha" required />';
		$str.='<p><br />';
		$str.='<img src="captcha.php?rand=<?php echo rand(); ?>" id="captcha_image">';
		$str.='</p>';
		$str.='<p>Can`t read the image? ';
		$str.='<a href="javascript: refreshCaptcha();">click here</a>';
		$str.=' to refresh</p>';
		$str.='<input type="submit" name="submit" value="Submit">';
		$str.='</form>';
		$str.='<br>';

		$str.= ' <br><br>';
		$str.= ' <div class="form-group">';
		$str.= ' <input class="btn btn-lg btn-primary btn-block" value="Emel Katalaluan/Emel Password" type="submit">';
		$str.= ' </div>';
		$str.= ' </fieldset>';
		$str.= ' </form>';
								 
		$str.= ' </div>';
		$str.= ' </div>';
		$str.= ' </div>';
		$str.= ' </div>';
		$str.= ' </div>';
		$str.= ' </div>';
		$str.= ' </div>';
		$str.= ' </div>';
		return $str;	
		OCILogOff($c);	
		
		}
		
	function  TiadaKataLaluan()
		{
		global $c;	
		$str= '';
		
		
		$str.= ' <div class="container" align="center">';
		$str.= ' <div class="row" align="center">';
		$str.= ' <div class="row" align="center">';
		$str.= ' <div class="col-md-6 col-md-offset-3" align="center">';
		$str.= ' <div class="panel panel-default">';
		$str.= ' <div class="panel-body">';
		$str.= ' <div class="text-center">';
		
		$str.= ' <h4 class="text-center">Tiada Id Pengguna dan Kata laluan?</h4>';
		//$str.= ' <p>You can reset your password here.</p>';
		$str.= ' <div class="panel-body">';
							 
		$str.= ' <form class="form" action="pkh_mps_sc002a_operasi.php?flag=3" method="post">';
		$str.= ' <fieldset>';
		
		$str.= ' <div class="form-group">';
		$str.= ' <div class="input-group">';
		$str.= ' <span class="input-group-addon"><i class="glyphicon glyphicon-credit-card color-blue"></i></span>';
					  
		$str.= ' <input style="font-size:11px" size="60" maxlength="60" type="text" class="form-control" 
		name="icnumber" id="icnumber"  placeholder="No Kad Pengenalan/Ic Number/Passport"required>';
		$str.= ' </div>';
		$str.= ' </div>';
		
		$str.= ' <div class="form-group">';
		$str.= ' <div class="input-group">';
		$str.= ' <span class="input-group-addon"><i class="glyphicon glyphicon-user color-blue"></i></span>';
		$str.= ' <input style="font-size:11px" size="60" maxlength="60" type="text" class="form-control" 
		name="userid" id="userid"  placeholder="Id Pengguna / User Id"   required>';
		$str.= ' </div>';
		$str.= ' </div>';
		
		$str.= ' <div class="form-group">';
		$str.= ' <div class="input-group">';
		$str.= ' <span class="input-group-addon"><i class="glyphicon glyphicon-lock color-blue"></i></span>';
		$str.= ' <input style="font-size:11px" size="60" maxlength="60" type="text" class="form-control" 
		name="password" id="password"  placeholder="Password / Password" required>';
		$str.= ' </div>';
		$str.= ' </div>';

		$str.='<?php echo $status; ?>';
		$str.='<form name="validation" method="post" action="">';
		$str.='<label><strong>Enter Captcha:</strong></label><br />';
		$str.='<input type="text" name="captcha" required/>';
		$str.='<p><br />';
		$str.='<img src="captcha.php?rand=<?php echo rand(); ?>" id="captcha_image">';
		$str.='</p>';
		$str.='<p>Can`t read the image? ';
		$str.='<a href="javascript: refreshCaptcha();">click here</a>';
		$str.=' to refresh</p>';
		$str.='<input type="submit" name="submit" value="Submit">';
		$str.='</form>';
		$str.='<br>';
		
		
		$str.= ' <br><br>';
		$str.= ' <div class="form-group">';
		$str.= ' <input class="btn btn-lg btn-primary btn-block" value="Simpan/Save" type="submit">';
		$str.= ' </div>';
		$str.= ' </fieldset>';
		$str.= ' </form>';
								 
		$str.= ' </div>';
		$str.= ' </div>';
		$str.= ' </div>';
		$str.= ' </div>';
		$str.= ' </div>';
		$str.= ' </div>';
		$str.= ' </div>';
		$str.= ' </div>';
		return $str;	
		OCILogOff($c);	
		
		}
	
	
		
		
?>        
        


    <!-- jQuery Version 1.11.0 -->
    <script src="bootstrap_css_1/js/jquery-1.11.0.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="bootstrap_css_1/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="bootstrap_css_1/js/plugins/metisMenu/metisMenu.min.js"></script>

    <!-- DataTables JavaScript -->
    <script src="bootstrap_css_1/js/plugins/dataTables/jquery.dataTables.js"></script>
    <script src="bootstrap_css_1/js/plugins/dataTables/dataTables.bootstrap.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="bootstrap_css_1/js/sb-admin-2.js"></script>

    <!-- Refresh Captcha -->
	<script>
    function refreshCaptcha(){
        var img = document.images['captcha_image'];
        img.src = img.src.substring(
            0,img.src.lastIndexOf("?")
            )+"?rand="+Math.random()*1000;
    }
    </script>

  
    
    
</body>
</html>