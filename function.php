<?php
    
    function upload($file,$path)
    {
        echo $path;
        $res = move_uploaded_file($file['tmp_name'], $path . $file['name']);
     
    }

    function makedir(){
        
    }

?>