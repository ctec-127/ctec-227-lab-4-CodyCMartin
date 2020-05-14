<?php

session_start();


$upload_errors = array(
    UPLOAD_ERR_OK                 => "No errors.",
    UPLOAD_ERR_INI_SIZE          => "Larger than upload_max_filesize.",
    UPLOAD_ERR_FORM_SIZE         => "Larger than form MAX_FILE_SIZE.",
    UPLOAD_ERR_PARTIAL             => "Partial upload.",
    UPLOAD_ERR_NO_FILE             => "No file selected.",
    UPLOAD_ERR_NO_TMP_DIR         => "No temporary directory.",
    UPLOAD_ERR_CANT_WRITE         => "Can't write to disk.",
    UPLOAD_ERR_EXTENSION         => "File upload stopped by extension."
);

if ($_SERVER['REQUEST_METHOD'] == "POST") {


    $error = $_FILES['file_upload']['error'];
    $message = $upload_errors[$error];

    $tmp_file = $_FILES['file_upload']['tmp_name'];

    $target_file = basename($_FILES['file_upload']['name']);

    $upload_dir = $_SESSION['username'];

    //testing
    // echo ($upload_dir);

    // // testing session variable set so we can gain access
    // if (isset($_SESSION['username'])) {
    //     echo ("yes");
    // } else {
    //     echo ("no");
    // }


    if (move_uploaded_file($tmp_file, $upload_dir . "/" . $target_file)) {
        $message = "File uploaded successfully";
    } else {
        $error = $_FILES['file_upload']['error'];
        $message = $upload_errors[$error];
    }

    $dir = $_SESSION['username'];
}



function display_images()
{

    if (isset($_GET['file'])) {
        if (unlink($_SESSION['username'] . "/" . $_GET['file'])) {
            header("location: gallery.php");
        } else {
            echo "<p>Sorry, something went wrong.</p>";
        }
    }

    $dir = $_SESSION['username'];

    if (is_dir($dir)) {
        if ($dir_handle = opendir($dir)) {
            while ($filename = readdir($dir_handle)) {
                $filename = rawurlencode($filename);
                if (!is_dir($filename) && $filename != '.DS_Store') {
                    echo "<div class=\"col-md-4 col-xs-12\"><img src=\"$dir/$filename\" alt=\"Upload photo\">";
                    echo "<a href=\"?file=$filename\">Delete</a></div>";
                }
            }
            closedir($dir_handle);
        }
    }
}
