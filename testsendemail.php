<?php
if(isset($_POST['submit'])) {
  $to = 'waseem.khasman@gmail.com';
  $subject = $_POST['subject'];
  $message = $_POST['message'];
  $headers = 'From: ' . $_POST['email'] . "\r\n" .
    'Reply-To: ' . $_POST['email'] . "\r\n" .
    'X-Mailer: PHP/' . phpversion();
  
  mail($to, $subject, $message, $headers);
  
  echo '<p>Thank you for your message. We will get back to you as soon as possible.</p>';
}
?>