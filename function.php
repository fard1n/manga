<?php
    
    function upload($file,$path)
    {
        
        $res = move_uploaded_file($file['tmp_name'], $path . $file['name']);
     
    }

    function validateFile($file){

            $result = new finfo();
        
            if (is_resource($result) === true) {
                return $result->file($filename, FILEINFO_MIME_TYPE);
            }
        
            return false;

    }

    function unzip($filePath, $outputPath){
       
        echo $filePath;
        echo '</br>';

        $zip = new ZipArchive;
        $res = $zip->open($filePath);

        if ($res === TRUE) {
            echo 'file open';
          $zip->extractTo($outputPath);
          $zip->close();
          echo "file extract sucessfully";
        } else {
          echo '<br> faild to extract </br>';
        }
    }

?>