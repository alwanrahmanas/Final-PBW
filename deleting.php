<?php



if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

try {

    $servername = "localhost";
    $username = "root";
    $password = "";


    $conn = new PDO("mysql:host=$servername;dbname=pbw", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $id = $_SESSION['id'];
    $nr = $_GET['namaResto'];

    $sql = "DELETE FROM review WHERE id=$id and namaResto='$nr'";
    $conn->exec($sql); //conn diset agar memiliki attribut exec, bukan menyimpan nilai exec ke dalam variabel

    echo "
   <script>
       
       window.location.href='myReviews.php';
       </script>";


    $conn = null;
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
