<?php
    define("DB_SERVER", "localhost");
    define("DB_USER", "cl59-matt-cp5"); //username
    define("DB_PASS", "Liberty07!"); //password
    define("DB_NAME", "cl59-matt-cp5"); // database name
    
    $connection = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
    
    if(mysqli_connect_errno()) {
        die("Database connection failed: " .
            mysqli_connect_error() .
            " (" . mysqli_connect_errno() . ")"
        );
    } else {
        
    }

?>