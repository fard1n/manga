<?php
require "views/index.view.php";
require 'function.php';
require 'config.php';
require 'db.php';



if($_SERVER['REQUEST_METHOD']=='POST'){

    if(isset($_FILES['fileToUpload'])){

        $file = $_FILES['fileToUpload'];
        $fileName = pathinfo($file['name'], PATHINFO_FILENAME);
        
        if(file_exists($dir . $fileName)){
           
            echo 'File exist with the same name';
        }

        else
        {
                if(mkdir('uploads/' . $fileName)){
                
                 if(upload($file, $dir . $fileName . '/')){
                    
                    if(unzip($dir . $fileName . '/' . $file['name'], $dir . $fileName . '/')){

                        //insert into data base
                        

                    }
                }
            }

        }

    //get directory  names

   
    //get directory 1.jpg image

    //show them
}}

$res = connect($host = '', 'manga','root', '');
var_dump($res);

    $q = query($res , 'select * from manga',[]);

    
    
   while($row = $q->fetch()){
       print_r($row);
    }
   
