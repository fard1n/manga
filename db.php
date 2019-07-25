<?php 

function connect($host = 'localhost', $name, $username = 'root', $password = ''){

    try{

      //  $conn = new PDO('mysql:host = {$host}; dbname = {$name}, {$username}, {$password}');
        $conn = new PDO("mysql:host=localhost;dbname={$name}", 'root', '');
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        return $conn;
    }

    catch(Excetption $e)
    {
        return false;
    }

}

function query($conn, $query, $binding){

    $stmt = $conn -> prepare($query);
    if ($stmt -> execute($binding)){
       
        return $stmt;
    }
    else{
        return false;
        
    }
    

}