


<?php
$nama = $_REQUEST["nama"];
$email = $_REQUEST["email"];
$pwd = $_POST["password"];


//$dsn = "mysql:host=$db_hostname;dbname=$db_database;charset=$db_charset";

try {
    $servername = "localhost";
    $username = "root";
    $password = "";
    $conn = new PDO("mysql:host=$servername;dbname=pbw", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


    $sql1 = "SELECT nama FROM user where nama = '$nama' or email = '$email'";

    $result = $conn->query($sql1);
    $result->setFetchMode(PDO::FETCH_ASSOC);
    $rows = $result->fetchAll();

    if (count($rows) == 0) {
        $_SESSION["ready"] = true;
        $result = $conn->prepare("INSERT INTO `user`(`nama`, `password`,`email`) VALUES (:nama, :password, :email)");



        $result->bindParam(':nama', $nama, PDO::PARAM_STR);
        $result->bindParam(':password', $pwd, PDO::PARAM_STR);
        $result->bindParam(':email', $email, PDO::PARAM_STR);
        $result->execute();

        if ($conn) {

            echo "<script>
             alert('Register Success');
             window.location.href='LoginRegister.html';
             </script>";
        } else {
            echo "<script>
             alert('Register Failed');
             window.location.href='register.php';
             
             </script>";
        }
    } else {
        /* $sql = "UPDATE review SET ulasan = '$ulasan' where namaResto = '$namaResto' and id = $id";
            $result=$conn->query($sql);
            $conn = null; 
            header('location: tampilReview.php'); */
        $_SESSION["ready"] = false;
        echo "<script>
            alert('Username Already Exists');
            window.location.href='Register.php';
            
            </script>";
    }
} catch (PDOException $e) {
    exit("PDO Error: " . $e->getMessage() . "<br>");
}
?>