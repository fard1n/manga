<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="views/css/reset.css">
    <link rel="stylesheet" href="views/css/uikit.css">
    <link rel="stylesheet" href="views/css/style.css">
</head>
<body>
    <div class="container">
        <section class="upload">
            <form action="" method="post" enctype="multipart/form-data">
            <label for="name">Manga name:</label>
            <input type="text" id="name" name="name">
            <input type="file" name="fileToUpload" id="fileToUpload">
            <input type="submit" value="Upload" name="submit">
            
            </form>
        </section>

            <?php 
            if($pageStatus)
                 generateCards($page,1);
            else
                echo"404";  
            ?>

            <section>
            <ul>
               <?php
               generatePageNumber(calculateNumberOfPages($itemCounts, $itemsPerPage),'index.php');
               ?>
            </ul>
            </section>
            </div>

    
</body>
</html>