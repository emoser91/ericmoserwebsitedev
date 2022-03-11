<?php

/**
 * Will make it work if server does not have
 * allow_url_fopen
 */
function fileGetContentsCurl($url)
{
    $ch = curl_init();

    curl_setopt($ch, CURLOPT_AUTOREFERER, true);
    curl_setopt($ch, CURLOPT_HEADER, 0);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);

    $data = curl_exec($ch);
    curl_close($ch);

    return $data;
}

/**
 * Build the captcha request URL
 */
function buildCaptchaUrl()
{
    $captcha = $_POST['g-recaptcha-response'];
    $secret = "6LeyH7EZAAAAAABcHiuJFFTBdHM6X0irGioaAvIn";
    return "https://www.google.com/recaptcha/api/siteverify?secret=$secret&response=" . $captcha . "&remoteip=" . $_SERVER['REMOTE_ADDR'];
}

/**
 * Sends the captcha and returns true on success - else false
 */
function sendCaptchaResponse()
{
    $response = json_decode(fileGetContentsCurl(buildCaptchaUrl()), true);
    // echo "<pre>";print_r($response);echo"</pre>";
    if ($response['success'] == false) {
        return false;
    }
    return true;

}

//Check status of submit button
if(isset($_POST['submit'])){
    $name = $_POST['name'];
    $subject = $_POST['subject'];
    $phone = $_POST['phone'];
    $mailFrom = $_POST['email'];
    $message = $_POST['message'];
    $captcha = $_POST['captcha'];

    $mailTo = "main@ericmoser.com";
    // $mailTo = "todd@brookstoneprinting.com";

    $headers = "From: ".$mailFrom;
    
    //Adding the rest of these helped make the email not go to spam in gmail
    $headers = "Reply-To: ".$mailFrom;
    $headers = "Return-Path: ".$mailFrom;
    $headers = "CC: ".$mailFrom;
    $headers = "BCC: ".$mailFrom;

    $txt = "You have received a Contact e-mail: \n\n";
    $txt .= "Information: \n";
    $txt .= "Name:  ".$name."\n";
    $txt .= "Subject:  ".$subject."\n";
    $txt .= "Phone:  ".$phone."\n";
    $txt .= "Email:  ".$mailFrom."\n";
    $txt .= "Message:  ".$message."\n";

    if(sendCaptchaResponse() == true)
    {
        //Validation has passed
        // echo "<pre>";print_r($_POST);echo"</pre>";
        if(empty($name) || empty($subject) || empty($phone) || empty($mailFrom) || empty($message))
        {
            // echo "A Field was Empty, Please Try Again.";
            header('Location: ../emailfailed.html');
        }
        else
        {
            if ( mail($mailTo,$subject,$txt,$headers) ) 
            {
                // print("<script>window.alert('The email has been sent!');</script>");
                // echo "The email has been sent!";
                header('Location: ../emailsuccess.html');
        
            } 
            else
            {
                // print("<script>window.alert('The email has failed, Please Try Again.');</script>");
                // echo "The email has failed!";
                header('Location: ../emailfailed.html');
            }
        }
        
    }
    else
    {
        // echo "Validation Failed, Please Try Again.";
        header('Location: ../emailfailed.html');
    }
    
}

?> 