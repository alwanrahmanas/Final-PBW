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
    $conn = new PDO("mysql:host=$servername;dbname=pbw", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $conn1 = new PDO("mysql:host=$servername;dbname=pbw", $username, $password);
    $conn1->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $conn1->setAttribute(PDO::MYSQL_ATTR_USE_BUFFERED_QUERY, true);
    $nama = $_SESSION["nama"];
    $namaResto = $_SESSION["namaResto"];
    $id = $_SESSION["id"];
    $ulasan = $_POST["ulasan"];


    $sql1 = "SELECT id FROM review where namaResto = '$namaResto' and id = $id";

    $result = $conn1->query($sql1);
    $result->setFetchMode(PDO::FETCH_ASSOC);
    $rows = $result->fetchAll();
    
    if (count($rows) == 0) {

        $result = $conn->prepare("INSERT INTO review (id, namaPengulas, namaResto, ulasan) VALUES (:id, :namaPengulas, :namaResto, :ulasan)");
        //$result = $conn->prepare("UPDATE `review` SET ulasan=:ulasan WHERE id= and ");
        $result->bindParam(':id', $id, PDO::PARAM_STR);
        $result->bindParam(':namaPengulas', $nama, PDO::PARAM_STR);
        $result->bindParam(':namaResto', $namaResto, PDO::PARAM_STR);
        $result->bindParam(':ulasan', $ulasan, PDO::PARAM_STR);
        $result->execute();

        $conn = null;
        header('location: addReview.php');
    } else {
        /* $sql = "UPDATE review SET ulasan = '$ulasan' where namaResto = '$namaResto' and id = $id";
                $result=$conn->query($sql);
                $conn = null; 
                header('location: tampilReview.php'); */
        echo "<script>
                       alert('You have already reviewed this restaurant');
                       window.location.href='list.php';
                       </script>";
    }
    /*  if($conn1){
                echo"<script>
                       alert('Fail to add review');
                       window.location.href='addReview.php';
                       </script>";
            }
            else{
                $sql = "INSERT INTO `review`(`id`,`namaResto`, `namaPengulas`,`ulasan`) 
                VALUES ('$id','$namaResto','$nama','$ulasan')";
                $conn->exec($sql);
                if($conn){
                    echo"<script>
                    alert('Successfully added');
                    window.location.href='list.php';
                    </script>";
                }else{
                       
                } */
} catch (PDOException $e) {
    exit("PDO Error: " . $e->getMessage() . "<br>");
}
