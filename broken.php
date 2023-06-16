<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);
$url_css = 'bootstrap_css_1/';

 ?>
<!DOCTYPE html>
<html lang="en">

<head profile="http://ihris.um.edu.my">
<link rel="icon" 
      type="image/png" 
      href="http://ihris.um.edu.my/modul_adhoc/modul_dashboard/images/um_ikon.png">

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>UM External (Dev)</title>
    
      <!-- Bootstrap Core CSS -->
    <link href="<?php echo $url_css;?>css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="<?php echo $url_css;?>css/plugins/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="<?php echo $url_css;?>css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="<?php echo $url_css;?>font-awesome-4.1.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <style>
      html body {width: 100%;height: 100%;padding: 0px;margin: 0px;overflow: hidden;font-family: arial;font-size: 10px;color: #6e6e6e;background-color: #FFFFFF;}
	  #preview-frame {width: 100%;background-color: #fff;}</style>
      
	 
	</head>

<body>
<?php

$seq = isset($_POST['seq'])?$_POST['seq']:'0';
$seq = sanitizeValidateIndex($seq);

$link = isset($_POST['link'])?$_POST['link']:'link';
if ($link == 'link'){$link = isset($_GET['link'])?$_GET['link']:'';}
$link = sanitizeValidateIndex($link);
	
if ($link == 'UMEXTERNAL')
	{
		$url = isset($_POST['url'])?$_POST['url']:'url';
		if ($url == 'url'){$url = isset($_GET['url'])?$_GET['url']:'';}
		$url = sanitizeValidateIndex($url);
	}
else
	{
		$url = 'index.php';	
	}

$url = str_replace("../","",urldecode($url));
if ($seq == '0')
 	{
echo Menu::PilihanMenu($url,$link);	
	}
else
	{	
echo Menu::Header($url);
	}
	
class Menu
{
public static function Header($url)
	{
	$str = '';
	$str.=	'<iframe src="'.$url.'" id="preview-frame" name="preview-frame"'; 
	$str.=	'allowfullscreen  width="100%" frameborder="0" scrolling="auto"></iframe>';
	return $str;
	}


public static function PilihanMenu($url,$link)
	{
	$str = '';
	$nama_borang = 'kemaskini_form';
	
	$str.= 	'<form name="'.$nama_borang.'" id="'.$nama_borang.'"  action="index.php"  target="_parent" method="post">';
	$str.= 	'<input name="url" type="hidden" value="'.$url.'">';
	$str.= 	'<input name="link" type="hidden" value="'.$link.'">';
	$str.= 	'<input name="seq" type="hidden" value="1">';
	$str.= 	'</form>';
	
	
	return $str;
	}
}  

function sanitizeValidateIndex($data) 
{ 
  $data = isset($data)?$data:'';
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  $data=str_replace("'","''",$data);
  $data=str_replace("\'","''",$data); 
  return $data;
}
?>	
	
 	 <!-- jQuery Version 1.11.0 -->
    <script src="<?php echo $url_css;?>js/jquery-1.11.0.js"></script>
	
    <script >
         var calcHeight = function() {
           $('#preview-frame').height($(window).height());
         }

         $(document).ready(function() {
           calcHeight();
         }); 

         $(window).resize(function() {
           calcHeight();
         }).load(function() {
           calcHeight();
         });
     </script>        
 <?php 
 if ($seq == '0')
 	{
?>		   
    <script language="javascript">
	document.getElementById('kemaskini_form').submit();
	</script>
    
<?php
	}
?>    
</body>
</html>
