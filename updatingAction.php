<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
if (!isset($_SESSION['login'])) {
    header('location: loginRegister.html');
}

try {

    $servername = "localhost";
    $username = "root";
    $password = "";

    //global $conn;
    $conn = new PDO("mysql:host=$servername;dbname=pbw", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    /*  echo "Connected successfully"; */
    $id = $_SESSION['id'];
    $ulasan = $_POST['ulasan'];
    $namaResto = $_SESSION['namaResto'];

    /* //cetak data
    $result=$conn->query($sql);
    $result->setFetchMode(PDO::FETCH_ASSOC);
    $row=$result->fetchAll();
    $conn = null; */





    $result = $conn->prepare("UPDATE `review` SET ulasan=:ulasan WHERE id=:id and namaResto=:namaResto");
    $result->bindParam(':ulasan', $ulasan, PDO::PARAM_STR);
    $result->bindParam(':id', $id, PDO::PARAM_STR);
    $result->bindParam(':namaResto', $namaResto, PDO::PARAM_STR);
    $result->execute();
    $conn = null;
    header('location: MyReviews.php');
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
