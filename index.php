<?php
require "views/index.view.php";
require 'function.php';
require 'config.php';

if($_SERVER['REQUEST_METHOD']=='POST'){

    if(isset($_FILES['fileToUpload'])){

        $file = $_FILES['fileToUpload'];
        $fileName = pathinfo($file['name'], PATHINFO_FILENAME);
        
        if(file_exists($dir . $fileName)){
            echo 'File exist with the same name';
        }
        else
         mkdir('uploads/' . $fileName);
         upload($file, $dir . $fileName . '/');
         unzip($dir . $fileName . '/' . $file['name'], $dir . $fileName . '/');
    }
}

   
