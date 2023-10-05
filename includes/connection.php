<?php
    $servername = 'localhost';
    $username = 'root';
    $password = '';
    $dbName = 'estate';

    // create connection
    $connect = mysqli_connect($servername, $username, $password, $dbName);

    function sanitize($connectionstring, $data){
        $data = htmlspecialchars($data);
        $data = trim($data);
        $data = stripcslashes($data);
        $data = mysqli_real_escape_string($connectionstring, $data);
        return $data;
    }

?>