<?php
require 'function.php';
require 'config.php';
require 'db.php';
require "blog.php";




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

                         query($conn , "insert into manga(title) values(:title)", array('title' => $fileName));
                        
                        
                    }
                }
            }
            
        }

    }}

     $itemCounts = query($conn , "select count(title) from manga", array());
     $itemCounts = $itemCounts ->fetch();
     $itemCounts =  $itemCounts[0];

        //get directory  names
        
        
        
        //get directory 1.jpg image
        
        //show them
        
        include "views/index.view.php";
