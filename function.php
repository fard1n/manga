<?php
    
    function generateLinks($text, $link){

        return "<a href='{$link}'>$text</a>";

    }

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

    function getDirContents($dir){
       
        
        $contents = [];
        if (is_dir($dir)) {
           
        if ($dh = opendir($dir)) {
            
            while (($file = readdir($dh)) !== false) {
                if($file == '.' || $file == '..'){
                continue;
            } 
                else{    
              array_push($contents, $file);
                }
               
            }
            closedir($dh);
        }
    }
    return $contents;
}

function calculateNumberOfPages($itemCounts, $itemsPerPage = 6){

        if($itemCounts>0){
           
        $pageCounts = ceil($itemCounts/$itemsPerPage);
        return $pageCounts;
    }}

function generatePageNumber($pageCounts, $baseLink){

    $counter = 1;
    while($counter <= $pageCounts){
        
        echo "<li><a href='{$baseLink}?page={$counter}'>$counter</a></li>";
        $counter++;
    }

}

function getMangas($pageId){
    
        global $itemsPerPage, $conn;
        $counter = $itemsPerPage;
        $allTitles = query($conn, 'select  count(*) from manga', []);
        $allTitles = (int)$allTitles ->fetch()[0];
        $titleId = $allTitles - (($pageId * $itemsPerPage) - ( $itemsPerPage));
        echo $titleId;
        $mangaList=[];
        $tmpList = [];

     while($counter > 0 & $titleId != 0 & $titleId != -1){
     
        $result = query($conn, 'select * from manga where id=:id', ['id' => $titleId]);
        $tmp = $result->fetch();
        
        array_push($mangaList ,$tmp);
        $titleId--;
        $counter--; 

    }
    
    // foreach($tmpList as $tmp){
    //     array_push($titleList, $tmp['title']);
        
    // }

    
    return $mangaList;
    
 
}


function getMangaPage($mangaTitle){

    global $dir;
    $mangaDir = $dir . $mangaTitle;
    $mangaPages = getDirContents($mangaDir);
      
    $pageLinks = [];
    foreach($mangaPages as $page){
       
        $tmp = $mangaDir . "/" .$page;
        array_push($pageLinks, $tmp);
    }
  
    return $pageLinks;

}

function generateCards($pageId, $pageNumber){
    global $itemsPerPage;
    $mangaList = getMangas($pageId);
    $section = ceil(count($mangaList)/(3));
    $counter = 0;
    $cardsCount = count($mangaList);
  
    while($section > 0){
        echo "<section class='thumbs clear'>";
        while($cardsCount){
            
            
        $cover = getMangaPage($mangaList[$counter]['title']);
        echo  "<div class='card left'>";
            echo        "<div class='card__img'>";
                    echo "<img src={$cover[1]}>";
                echo    "</div>";
                echo    "<div class='card__text'>";
                echo               generateLinks($mangaList[$counter]['title'], 'single.php?id=' . $mangaList[$counter]['id'] . "&pageNumber={$pageNumber}");
                echo    "</div>";
                echo        "</div>";
                $cardsCount--;
                $counter++;
            }
              echo "</section>";
        $section--;
        $tmp = $itemsPerPage/2;
            
    }
}
?>