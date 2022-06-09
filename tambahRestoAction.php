<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
if (!isset($_SESSION['login'])) {
    header("Location: loginRegister.html");
}
$namaResto = $_POST["namaResto"];
$alamat = $_POST["alamat"];

//$password = $_POST["password"];


//$dsn = "mysql:host=$db_hostname;dbname=$db_database;charset=$db_charset";
if (!empty($namaResto) && !empty($alamat)) {
    try {
        $servername = "localhost";
        $username = "root";
        $password = "";

        $conn = new PDO("mysql:host=$servername;dbname=pbw", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


        //$conn->prepare("INSERT INTO `resto`(`namaResto`, `alamat`) VALUES (:namaResto,:alamat)");

        $result = $conn->prepare("INSERT INTO resto(namaResto, alamat) VALUES (:namaResto,:alamat)");


        $result->bindParam(':namaResto', $namaResto, PDO::PARAM_STR);
        $result->bindParam(':alamat', $alamat, PDO::PARAM_STR);
        //$result->bindParam(':email', $email, PDO::PARAM_STR);
        $result->execute();

        if ($conn) {
            echo "<script>
         alert('Insert Success');
         window.location.href='list.php';
         </script>";
        } else {
            echo "<script>
            alert('Register Failed');
            window.location.href='tambahResto.php';
            </script>";
        }
    } catch (PDOException $e) {
        exit("PDO Error: " . $e->getMessage() . "<br>");
    }
}
