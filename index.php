<?php
require 'config.php';
require 'function.php';
require 'db.php';
require "setup.php";



$page;
$pageStatus;
if($_SERVER['REQUEST_METHOD']=='POST'){

    if(isset($_FILES['fileToUpload'])){

        $file = $_FILES['fileToUpload'];
        $fileName = pathinfo($file['name'], PATHINFO_FILENAME);
        // $fileWithOutSpace = preg_replace('/\s/', '-', $fileName);
        
        if(preg_replace('/\s/', '-', $fileName))
        {
            $fileName = preg_replace('/\s/', '-', $fileName); 
        }
        
        
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


        if(isset($_GET['page'])){
           
            $pageStatus = true;
            $page = $_GET['page'];
        }
        elseif(empty($_GET)){
           
            $pageStatus = true;
            $page = 1;
        }
        else{

            $pageStatus = false;
        }
        
        include "views/index.view.php";
