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


    $id = $_SESSION['id'];
    $nr = $_SESSION['namaResto'];
    $sql = "SELECT ulasan FROM review where  id = $id and namaResto = '$nr'";

    //cetak data
    $result = $conn->query($sql);
    $result->setFetchMode(PDO::FETCH_ASSOC);
    $row = $result->fetch();
    $conn = null;
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
