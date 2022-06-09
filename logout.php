<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
    
}



if(isset($_SESSION['login'])){
    unset($_SESSION['login']);
    session_unset();
    session_destroy();
    echo "<script>
    alert('Session Destroyed');
    window.location.href='FrontPage.php';
    </script>";
}else{
    echo "<script>
    alert('Session login gaada');
    
    </script>";
}
header('location: FrontPage.php');
