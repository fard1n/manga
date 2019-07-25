<?php

require "config.php";
require "db.php";
require "setup.php";
require "function.php";

if(isset($_GET['id']) & isset($_GET['pageNumber'])){
   
   
    $result = query($conn, 'select title from manga where id=:id', ['id' =>$_GET['id']]);
    $mangaTitle = $result->fetch()[0];
    $pages =  getMangaPage($mangaTitle);
    $pageNumber = $_GET['pageNumber'];

    if($pageNumber < count($pages)  & $pageNumber > 0){
    $pageLink = $pages[$pageNumber];
    $currentPageLink = $_SERVER['REQUEST_URI'];
    $nextPageLink  = preg_replace('/pageNumber.*/', 'pageNumber=' . ($pageNumber + 1), $currentPageLink);
    $previousPageLink  = preg_replace('/pageNumber.*/', 'pageNumber=' . ($pageNumber - 1), $currentPageLink);
    }   
    else{
        header('Location: /manga/index.php');

    }
}
else{
    //header("index.php");
    echo "set id";
}




include "views/single.view.php";
?>