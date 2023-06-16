<?php
if ($c=oci_connect("hris_test","t1m4h00#","UMHRIS")){
 }
 else {
   $err=OCIError();
   echo "<br><font color='#FF0000'><strong>Harap maaf! Pangkalan data HRIS di dalam penyelenggaraan - Sila cuba lagi<strong></font><br><br>".$err[text];
   die();
 }
$conn_oracle_status='test';
?>




