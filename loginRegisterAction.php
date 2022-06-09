<?php

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}


try {
    $servername = "localhost";
    $username = "root";
    $password = "";

    //global $conn;
    $conn = new PDO("mysql:host=$servername;dbname=pbw", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    /*  echo "Connected successfully"; */

    $_SESSION["nama"] = $_POST["nama"];

    $pwd = $_POST["password"];
    $nama = $_POST["nama"];

    //$sql = "SELECT * FROM user WHERE nama = ':nama' and password = ':password' ";


    $result = $conn->prepare("SELECT * FROM user WHERE nama = :nama and password = :password");
    //$conn->exec($sql);
    $result->bindParam(':nama', $nama, PDO::PARAM_STR);
    $result->bindParam(':password', $pwd, PDO::PARAM_STR);
    $result->execute();
    $result->setFetchMode(PDO::FETCH_ASSOC);

    $row = $result->fetch();


    if ($row) {
        if ($row['password'] == $pwd) {
            $_SESSION['login'] = true;
            $_SESSION['role'] = $row['role'];
            $_SESSION["id"] = $row["id"];
            echo "<script>
            
            window.location.href='FrontPage.php';
            
            </script>";
        }
    } else {
        echo "<script>
        alert('Wrong Username or Password!');
        
        window.location.href='LoginRegister.html';
        </script>";
    }
    $conn = null;
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
