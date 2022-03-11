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
    echo "<pre>";print_r($response);echo"</pre>";
    if ($response['success'] == false) {
        return false;
    }
    return true;

}

if(array_key_exists('submit_form',$_POST))
{
    echo "<pre>";print_r($_POST);echo"</pre>";

    if(sendCaptchaResponse() == true)
    {
            echo "You passed validation!";
    }
    else
    {
        echo "Failed!";
    }
		
}
    
?> 

<form method="post" action="">
<input type="text" name="your_name" placeholder="Your Name" /><br /><br />
<input type="text" name="email" placeholder="Your Email Address" /><br /><br />
<div class="g-recaptcha" data-sitekey="6LfRILEZAAAAACLNnsof8sHLiB-sKg6Qi0ZA3Nj4"></div>
<input type="submit" name="submit_form" value="Submit Your Information" />
</form>	
<script src='https://www.google.com/recaptcha/api.js'></script>