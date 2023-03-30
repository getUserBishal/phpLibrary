<?php
    @session_start(); 

    $host = 'localhost';
    $database = 'library';
    $user = 'root';
    $password = '';
   

    $connection = mysqli_connect($host, $user, $password, $database);

  

