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
    $secret = "6LfRILEZAAAAACV9G0JEnEpt1RyyRPrPx9LV-uId";
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

$errors = [];
$data = [];

if (empty($_POST['name'])) 
{
    $errors['name'] = 'Name is required.';
}

if (empty($_POST['email'])) 
{
    $errors['email'] = 'Email is required.';
}

if (empty($_POST['superheroAlias'])) 
{
    $errors['superheroAlias'] = 'Superhero alias is required.';
}

if (!empty($errors)) 
{
    // $data['success'] = false;
    // $data['errors'] = $errors;

    if(sendCaptchaResponse() == true)
    {
        //Validation has passed
        $errors['superheroAlias'] = 'validation passed';
    }
    else
    {
        echo "Validation Failed, Please Try Again.";
        $errors['superheroAlias'] = 'Validation has failed';
    }

    $data['success'] = false;
    $data['errors'] = $errors;


} 
else 
{
    $data['success'] = true;
    $data['message'] = 'Success!';

    $name = $_POST['name'];
    $mailFrom = $_POST['email'];
    $subject = $_POST['superheroAlias'];

    $mailTo = "emoser91@gmail.com";

    $headers = "From: ".$mailFrom;
    
    //Adding the rest of these helped make the email not go to spam in gmail
    $headers = "Reply-To: ".$mailFrom;
    $headers = "Return-Path: ".$mailFrom;
    $headers = "CC: ".$mailFrom;
    $headers = "BCC: ".$mailFrom;

    $txt .= "Information: \n";
    $txt .= "Name:  ".$name."\n";
    $txt .= "Email:  ".$mailFrom."\n";
    $txt .= "SuperHeroAlias:  ".$subject."\n";

    // if(sendCaptchaResponse() == true)
    // {
    //     //Validation has passed
    //     mail($mailTo,$subject,$txt,$headers);
    //     $errors['superheroAlias'] = 'validation passed';
    // }
    // else
    // {
    //     echo "Validation Failed, Please Try Again.";
    //     $errors['superheroAlias'] = 'Validation has failed';
    // }
}

echo json_encode($data);

?>