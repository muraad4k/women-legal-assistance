<?php

if(isset($_GET['file'])){
    $filePath ="./uploads/". $_GET['file'];
    header('Content-Type: application/pdf');
    header('Content-Disposition: inline; filename="' . basename($filePath) . '"');
    readfile($filePath);

}

?>