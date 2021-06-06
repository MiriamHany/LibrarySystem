<?php

if(isset($_POST['email_data']))
{
 require 'class/class.phpmailer.php';
 $output = '';
 foreach($_POST['email_data'] as $row)
 {
  $mail = new PHPMailer;
  $mail->IsSMTP();        //Sets Mailer to send message using SMTP
  $mail->Host = 'smtpout.secureserver.net';  //Sets the SMTP hosts of your Email hosting, this for Godaddy
  $mail->Port = '80';        //Sets the default SMTP server port
  $mail->SMTPAuth = true;       //Sets SMTP authentication. Utilizes the Username and Password variables
  $mail->Username = 'xxxxxxxxxx';     //Sets SMTP username
  $mail->Password = 'xxxxxxxxxx';     //Sets SMTP password
  $mail->SMTPSecure = '';       //Sets connection prefix. Options are "", "ssl" or "tls"
  $mail->From = 'info@webslesson.com';   //Sets the From email address for the message
  $mail->FromName = 'Webslesson';     //Sets the From name of the message
  $mail->AddAddress($row["email"], $row["name"]); //Adds a "To" address
  $mail->WordWrap = 50;       //Sets word wrapping on the body of the message to a given number of characters
  $mail->IsHTML(true);       //Sets message type to HTML
  $mail->Subject = 'Lorem ipsum dolor sit amet, consectetur adipiscing elit'; //Sets the Subject of the message
  //An HTML or plain text message body
  $mail->Body = '
  <p> Welcome Sir please release book or re-borrow it </p>
  ';
  $mail->AltBody = '';
  $result = $mail->Send();      //Send an Email. Return true on success or false on error
  if($result["code"] == '400')
  {
   $output .= html_entity_decode($result['full_error']);
  }
 }
 if($output == '')
 {
  echo 'ok';
 }
 else
 {
  echo $output;
 }
}
?>