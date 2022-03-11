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

if(isset($_POST['submit'])){
    $name = $_POST['name'];
    $mailFrom = $_POST['email'];

    $company = $_POST['company'];
    $address = $_POST['address'];
    $city = $_POST['city'];
    $state = $_POST['state'];
    $zip = $_POST['zip'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $fax = $_POST['fax'];

    $job = $_POST['job'];
    $duedate = $_POST['duedate'];
    $quantity = $_POST['quantity'];
    $pages = $_POST['numberofpages'];
    $size = $_POST['size'];
    $sides = $_POST['sides'];
    $ink = $_POST['ink'];
    $stock = $_POST['stock'];
    $artwork = $_POST['artwork'];
    $message = $_POST['message'];

    $captcha = $_POST['captcha'];

    // $mailTo = "main@ericmoser.com";
    $mailTo = "todd@brookstoneprinting.com";

    $headers = "From: ".$mailFrom;
    
    //Adding the rest of these helped make the email not go to spam in gmail
    $headers = "Reply-To: ".$mailFrom;
    $headers = "Return-Path: ".$mailFrom;
    $headers = "CC: ".$mailFrom;
    $headers = "BCC: ".$mailFrom;

    $txt = "You have received a Quote Request e-mail: \n\n";
    $txt .= "Personal Information: \n";
    $txt .= "Name:  ".$name."\n";
    $txt .= "Company:  ".$company."\n";
    $txt .= "Address:  ".$address."\n";
    $txt .= "City:  ".$city."\n";
    $txt .= "State:  ".$state."\n";
    $txt .= "Zip-Code:  ".$zip."\n";
    $txt .= "Phone:  ".$phone."\n";
    $txt .= "Email:  ".$mailFrom."\n";
    $txt .= "Fax:  ".$fax."\n\n";

    $txt .= "Product Information: \n";
    $txt .= "Job Description:  ".$job."\n";
    $txt .= "Quantity:  ".$quantity."\n";
    $txt .= "Number of Pages:  ".$pages."\n";
    $txt .= "Finished Size:  ".$size."\n";
    $txt .= "Paper:  ".$stock."\n";
    $txt .= "Ink:  ".$ink."\n";
    $txt .= "Sides:  ".$sides."\n";
    $txt .= "Artwork:  ".$artwork."\n";
    $txt .= "Due Date:  ".$duedate."\n";
    $txt .= "Message:  ".$message."\n";

    $subject = "Brookstone Printing Quote Request from  ".$name;

    if(sendCaptchaResponse() == true)
    {
        //Validation has passed
        // echo "<pre>";print_r($_POST);echo"</pre>";
        if(empty($name) || empty($company) || empty($address) || empty($city) || empty($state) || empty($zip) || empty($phone) || empty($mailFrom) || 
        empty($job) || empty($quantity) || empty($pages) || empty($size) || empty($stock) || empty($ink) || empty($sides) || empty($artwork) || empty($duedate) || empty($message))
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
                // You can also do a redirect to a new page like thank you for your email
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
        echo "Validation Failed, Please Try Again.";
    }

}

?> 
