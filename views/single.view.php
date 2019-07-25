<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="views/css/reset.css">
    <link rel="stylesheet" href="views/css/style.css">
    <title>Document</title>
</head>
<body>
    <div class="container">
        <div class="page">
         <a href=<?= $nextPageLink ?>><img src=<?= $pageLink ?>></a>  
        </div>
        <div class="previous"><a href=<?= $previousPageLink?> rel="noopener noreferrer">previous</a></div>
        <div class="Next"><a href=<?= $nextPageLink?>      rel="noopener noreferrer">Next</a></div>
    </div>
</body>
</html>