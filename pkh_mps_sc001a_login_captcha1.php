<?php
session_start();
$status = '';
if ( isset($_POST['captcha']) && ($_POST['captcha']!="") ){
// Validation: Checking entered captcha code with the generated captcha code
if(strcmp($_SESSION['captcha'], $_POST['captcha']) != 0){
// Note: the captcha code is compared case insensitively.
// if you want case sensitive match, check above with strcmp()
$status = "<p style='color:#FFFFFF; font-size:20px'>
<span style='background-color:#FF0000;'>Entered captcha code does not match! 
Kindly try again.</span></p>";
}else{
$status = "<p style='color:#FFFFFF; font-size:20px'>
<span style='background-color:#46ab4a;'>Your captcha code is match.</span>
</p>";	
	}
}
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
											$conn_oracle_status = 'test';

if($conn_oracle_status == 'test')
		{
			error_reporting(E_ALL);
			ini_set('display_errors', 1);
		}

//session_start(); 
//include('dbconnect.php');
	
echo PaparanIndex();

		
	function PaparanIndex()
		{
		$str = '';
		
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
		
		$str.=  SenaraiItem();
		
		$str.=	'</div>';
		$str.=	'<!-- /.panel-body -->';
		
		$str.=  '<div class="panel-footer">';
		$str.=  '<table>';
		$str.=  '<tr>';
		$str.=  '<td>';
		$str.=	'<a href="../pengajar/home.php">';
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
		
		
	function  SenaraiItem()
		{
		global $c;	
															$userid = 0;
															$password = 'password';
		$str= '';
		
		$str.= '<form name="loginForm" action="pkh_mps_sc002a_operasi.php?flag=1" method=post onsubmit="return validateForm()" class="form-horizontal"';
		//$str.= '<form id="userLogin" action="loginuser.php" method="post" name="userLogin">';
		$str.= 'style="font-size:11px;" width="100%">';
		
		$str.= '<input class="form-control" type="hidden" name="userid" id="userid" value="'.$userid.'">';
		$str.= '<input class="form-control" type="hidden" name="password" id="password" value="'.$password.'">';
		
		$str.= '<div class="form-group" >';
		$str.= '<div class="col-sm-3 control-label">';
		$str.= '<i class="fa fa-user fa-2x"></i>';
		$str.= '</div>';
		$str.= '<div class="col-sm-6" >';
		$str.= '<input style="font-size:11px" type="text" class="form-control" name="userid" id="userid"  placeholder="Id Pengguna/Emel" required>';
		$str.= '</div>';
		$str.= '</div>';
		
		
		
		$str.= '<div class="form-group">';
		$str.= '<div class="col-sm-3 control-label">';
		$str.= '<i class="fa fa-lock fa-2x"></i>';
		$str.= '</div>';
		$str.= '<div class="col-sm-6" >';
		$str.= '<input style="font-size:11px" type="password" class="form-control" name="password" id="password" placeholder="Kata Laluan" required>';
		$str.= '</div>';
		$str.= '</div>';
		
		/*$str.= '<div class="form-group">';
		$str.= '<div class="col-sm-offset-3 col-sm-6">';
		$str.= '<div class="checkbox">';
		$str.= '<label>';
		$str.= '<input  style="font-size:11px" type="checkbox"> Remember me';
		$str.= '</label>';
		$str.= '</div>';
		$str.= '</div>';
		$str.= '</div>';*/
								$str.='<div class="col-sm-offset-3 col-sm-6">';
								$str.='<?php echo $status; ?>';
								$str.='<div class="form-group">';
								$str.='<label><strong>Enter Captcha:</strong></label><br />';
								$str.='<p><br />';
								$str.='<img src="captcha.php?rand=<?php echo rand(); ?>" id="captcha_image">';
								$str.='<br>';
								$str.='<input type="text" name="captcha" required/>';
								$str.='</p>';
								$str.='<p>Can`t read the image? ';
								$str.='<a href="javascript: refreshCaptcha();">click here</a>';
								$str.=' to refresh</p>';
								$str.='</div>';
								$str.= '</div>';
								
		
		$str.= '<div class="form-group">';

		$str.= '<?php include "login.php"?>';
		// $str.='<center><button name="login" class="btn btn-primary"><span class="glyphicon glyphicon-log-in"></span> login</button></center>';


		$str.= '<div class="col-sm-offset-3 col-sm-6">';
		$str.= '<button  style="font-size:11px" type="submit" name="loginbutton" id="loginbutton" class="btn btn-primary">Login</button>&nbsp;&nbsp;';
		$str.= '<button  style="font-size:11px" type="reset"  name="cancelbutton" id="cancelbutton"  class="btn btn-danger">Cancel</button>&nbsp;&nbsp;';

		$str.= '</div>';
		$str.= '</div>';
		
		$str.= '<div class="form-group">';
		$str.= '<div class="col-sm-offset-3 col-sm-6">';
		$str.= '<a href="pkh_mps_sc003a_katalaluan.php?flag=1">Terlupa Katalaluan</a><br>';
		$str.= '<em>Forgot Password</em><br>';
		$str.= '</div>';
		$str.= '</div>';
		
		
		$str.= '<div class="form-group">';
		$str.= '<div class="col-sm-offset-3 col-sm-6" >';
		$str.= '<div class="alert alert-danger">';
		$str.= ' Bagi Pengajar sambilan yang pernah berdaftar dengan sistem pengajaran sambilan dan belum mempunyai kata laluan untuk akses ke Sistem Pengajaran Sambilan sila berhubung dengan mana-mana pentadbir ptj untuk menjana kata laluan.';
		$str.= '<br><br>';
		$str.= '<i>For existing users who did not yet have the password to access Part-Time Teaching please contact PTj administrator to generate the password.</i>';
		//$str.= '<em>No User Id/Password</em><br>';
		$str.= '</div>';
		$str.= '</div>';
		$str.= '</div>';
		
		
		/*$str.= '<div class="form-group">';
		$str.= '<div class="col-sm-offset-3 col-sm-6">';
		$str.= '<a href="pkh_mps_sc003a_katalaluan.php?flag=2">Tiada ID Pengguna/Katalaluan</a><br>';
		$str.= '<em>No User Id/Password</em><br>';
		$str.= '</div>';
		$str.= '</div>';*/
		
		$str.= '</form>';
			
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

    <!-- Page-Level Demo Scripts - Tables - Use for reference -->
    <script>
    $(document).ready(function() {
        $('#dataTables-example').dataTable();
    });
    </script>
    
    <script>
    $(document).ready(function(){
	$("#mytable #checkall").click(function () {
        if ($("#mytable #checkall").is(':checked')) {
            $("#mytable input[type=checkbox]").each(function () {
                $(this).prop("checked", true);
            });

        } else {
            $("#mytable input[type=checkbox]").each(function () {
                $(this).prop("checked", false);
            });
        }
    });
    
    $("[data-toggle=tooltip]").tooltip();
	});
 	</script>

<script>
    //Refresh Captcha
    function refreshCaptcha(){
        var img = document.images['captcha_image'];
        img.src = img.src.substring(
            0,img.src.lastIndexOf("?")
            )+"?rand="+Math.random()*1000;
    }
    </script>
    
    
</body>
</html>