<?php
require "views/index.view.php";
require 'function.php';

if($_SERVER['REQUEST_METHOD']=='POST'){

    if(isset($_FILES['fileToUpload'])){
        $file = $_FILES['fileToUpload'];
        $name = pathinfo($file['name'], PATHINFO_FILENAME);
       
        
         mkdir('uploads\\' . $name);
         upload($file, 'C:\xampp\htdocs\Manga\uploads\\' . $name . '\\');
    }

   
}