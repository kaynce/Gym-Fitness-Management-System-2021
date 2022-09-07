 <?php if (session_status() === PHP_SESSION_NONE){ session_start(); }?>

<?php
if(!empty($_GET['file'])){

    $custom_file_name = 'my-qr-code.png';

    $fileName = basename($_GET['file']);

    $filePath = '../admin/qrcodes/'.$fileName;

    if(!empty($fileName) && file_exists($filePath)){
        // Define headers
        header('Content-Length: ' . filesize($filePath));  
        header('Content-Encoding: none');
        header("Cache-Control: public");
        header("Content-Description: File Transfer");
        header("Content-Disposition: attachment; filename=$custom_file_name");
        header("Content-type: application/octet-stream");
        // header("Content-Type: application/zip");
        header("Content-Transfer-Encoding: binary");
        
        // Read the file
        readfile($filePath);
        
        exit;
    }else{
        echo 'The File '.$fileName.' does not exist.';
    }
}