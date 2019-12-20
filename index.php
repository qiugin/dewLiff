<?php
    session_start();

    // check apakah session email sudah ada atau belum.
    // jika belum maka akan diredirect ke halaman index (login)
    if( empty($_SESSION['email']) ){
        header('Location: login.php');
    }

    include_once("index.html");
?>