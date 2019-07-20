<?php
    
    function upload($file,$path)
    {
        
        if($res = move_uploaded_file($file['tmp_name'], $path . $file['name'])){
            return true;
            
        }
        return false;
     
    }

    function validateFile($file){

            $result = new finfo();
        
            if (is_resource($result) === true) {
                return $result->file($filename, FILEINFO_MIME_TYPE);
            }
        
            return false;

    }

    function unzip($filePath, $outputPath){
       
    
        $zip = new ZipArchive;
        $res = $zip->open($filePath);

        if ($res === TRUE) {
            echo 'file open';
          $zip->extractTo($outputPath);
          $zip->close();
          echo "file extract sucessfully";
          return true;
        } else {
          echo '<br> faild to extract </br>';
          return false;
        }
    }

    function getDirContents(){
        $contents = [];
    if (is_dir($dir)) {
        if ($dh = opendir($dir)) {
            while (($file = readdir($dh)) !== false) {
               $contents = $file;
            }
            closedir($dh);
        }
    }
}
    
?>