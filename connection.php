<?php
require_once "Mail.php";

$from ="ofprince2009@gmail.com";
$to = 'salisutemmy9@.com';

$host = "ssl://smtp.gmail.com";
$port = "465";
$username = "ofprince2009@gmail.com";
$password = '134679fazee';

$subject = "test";
$body = "test";

$headers = array ('From' => $from, 'To' => $to,'Subject' => $subject);
$smtp = Mail::factory('smtp',
array ('host' => $host,
'port' => $port,
'auth' => true,
'username' => $username,
'password' => $password));

$mail = $smtp->send($to, $headers, $body);

if (PEAR::isError($mail)) {
echo($mail->getMessage());
} else {
echo("Message successfully sent!\n");
}
?>