<?php 

if (isset($_POST['sending_email_btn'])) {
$to = "mileniaulwanzafira@example.com";
$subject = "My subject";
$txt = "Hello world!";

// Always set content-type when sending HTML email
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

mail($to,$subject,$txt,$headers);
}
?>