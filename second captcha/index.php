<?php
session_start();
$message = '';
if ( isset($_POST['securityCode']) && ($_POST['securityCode']!="")){
	if(strcasecmp($_SESSION['captcha'], $_POST['securityCode']) != 0){
		$message = "You have entered incorrect security code! Please try again.";
	}else{
		$message = "Your have entered correct security code."; 
	}
} else {
	$message = "Enter security code."; 
}
?>
<div class="container">
	<h2>Example: Build Captcha Script with PHP</h2>
	<div class="row">			
		<div class="col-md-6">
			<div class="col-md-12">
				<form name="form" class="form" action="" method="post">								
					<div class="form-group">
						<label for="captcha" class="text-info">
						<?php if($message) { ?>
							<span 
class="text-warning"><strong><?php 
echo $message; ?></strong></span>
						<?php } ?>	
						</label><br>
						<input type="text" name="securityCode"
 id="securityCode" class="form-control" placeholder="Enter Security Code">
					</div>
					<div class="form-group">								
						<img src="get_captcha.php?rand=<?php
 echo rand(); ?>" id='captcha'>
						<br>
						<p><br>Need another 
security code? <a href="javascript:void(0)" 
id="reloadCaptcha">click</a></p>
					</div>										
					<div class="form-group">	
						<input type="submit" 
name="submit" class="btn btn-info btn-md" value="Submit">								
					</div>							
				</form>
			</div>
		</div>
	</div>
</div>