<?php
    header('Content-Type: application/json');

    $uploaded = array();

    if(!empty($_FILES['file']['name'][0])){

        $files = $_FILES['file'];

        $uploaded = array();
        $failed = array();

        $allowed = array('txt', 'jpg');


        foreach($files['name'] as $position => $name){
            
            $file_size = $files['size'][$position];
            $file_error = $files['error'][$position];
            $file_tmp = $_FILES['file']['tmp_name'][$position];
            $file_destination = '/home4/mosere/public_html/uploads/' . $name;

            $file_ext = explode('.', $name);
            $file_ext = strtolower(end($file_ext));

            if(in_array($file_ext, $allowed)){
                echo "File ext type passed";
                if($file_error == 0){
                    echo "File error check passed";
                    if($file_size <= 2097152){
                        echo "File size check passed";
            
                        if(move_uploaded_file($file_tmp, $file_destination)){
                            echo "File Uploaded";
                            $uploaded[] = array(
                                'name' => $file_name,
                                'file' => '/home4/mosere/public_html/uploads/' . $file_name
                            );
                        }
                        else {
                            echo "File Upload Failed";
                        }
        
                    }
                    else{
                        $failed[$position] = "[{$file_name}] file size too large.";
                    }
                }
                else{
                    echo "File error check failed";
                }
            }
            else{
                $failed[$position] = "[{$file_name}] file extension '{$file_ext}' is not allowed.";
            }
        }

        echo json_encode($uploaded);
        
        if(!empty($uploaded)){
           echo json_encode($uploaded);
        }
        
        if(!empty($failed)){
            print_r($failed);
        }
    }



    // Original Working Version
    // header('Content-Type: application/json');

    // $uploaded = array();

    // if(!empty($_FILES['file']['name'][0])){
    //     foreach($_FILES['file']['name'] as $position => $name){
            
    //         $file_tmp = $_FILES['file']['tmp_name'][$position];
    //         $file_destination = '/home4/mosere/public_html/uploads/' . $name;

    //         if(move_uploaded_file($file_tmp, $file_destination)){
    //             // echo "Check 5";
    //             $uploaded[] = array(
    //                 'name' => $name,
    //                 'file' => '/home4/mosere/public_html/uploads/' . $name
    //             );
    //         }
    //     }
    // }

    // echo json_encode($uploaded);

?>

