<?php
// $uploaddir = '/var/www/uploads/';
// $uploaddir = '/public_html/uploads';
// $uploadfile = $uploaddir . basename($_FILES['userfile']['name']);

// echo '<pre>';
// if (move_uploaded_file($_FILES['userfile']['tmp_name'], $uploadfile)) {
//     echo "File is valid, and was successfully uploaded.\n";
// } else {
//     echo "Possible file upload attack!\n";
// }

// echo 'Here is some more debugging info:';
// print_r($_FILES);

// print "</pre>";



if(isset($_FILES['file'])){
    $file = $_FILES['file'];
    // print_r($file);

    echo "Check 1";

    //File properties
    $file_name = $file['name'];
    $file_tmp = $file['tmp_name'];
    $file_size = $file['size'];
    $file_error = $file['error'];

    //Work out the file extension
    $file_ext = explode('.', $file_name);
    $file_ext = strtolower(end($file_ext));

    print_r($file_ext);

    $allowed = array('txt', 'jpg');

    if(in_array($file_ext, $allowed)){
        echo "Check 2";
        if($file_error == 0){
            echo "Check 3";
            if($file_size <= 2097152){
                echo "Check 4";
                //Create random file name so you wont overwrite other files
                $file_name_new = uniqid('', true) . '.' . $file_ext;
                // $file_destination = '/home4/mosere/public_html/scripts/uploads/' . $file_name_new;
                $file_destination = '/home4/mosere/public_html/uploads/' . $file_name;

                if(move_uploaded_file($file_tmp, $file_destination)){
                    echo $file_destination;
                    echo "Check 5";
                }
                else {
                    echo "Upload Failed";
                }

            }
        }
    }


}

?>