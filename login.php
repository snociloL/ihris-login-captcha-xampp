<?php
	if(ISSET($_POST['login'])){
		$userid = $_POST['userid'];
		$password = $_POST['password'];
		$captcha = $_POST['captcha'];
		
		if($userid == "admin" && $password == "admin"){
			if($_SESSION['captcha'] == $captcha){
				echo "<center><label class='text-success'>Login successfully</label></center>";
			}else{
				echo "<center><label class='text-danger'>Invalid captcha!</label></center>";
			}
		}else{
			echo "<center><label class='text-danger'>Invalid username or password</label></center>";
		}
	}
?>