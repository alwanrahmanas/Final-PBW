<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
/* if(isset($_POST['submit'])){
    $nama = $_POST['nama'];
} */
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

    $search = $_REQUEST['keyword'];
    $nr = $_SESSION["namaResto"];
    $sql = "SELECT * FROM review WHERE ulasan LIKE '%$search%' and namaResto = '$nr'";

    //cetak data
    $result = $conn->query($sql);
    $result->setFetchMode(PDO::FETCH_ASSOC);
    $row = $result->fetchAll();
    $conn = null;
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
?>
<table border="1" id="t">
    <tr>

        <th class="header-top1">Nama Pengulas</th>
        <th class="header-top2">Ulasan</th>

    </tr>
    <?php foreach ($row as $rows) : ?>
        <tr class="data">

            <td>
                <?= $rows["namaPengulas"] ?>
            </td>
            <td>
                <?= $rows["ulasan"] ?>
            </td>


        </tr>
    <?php endforeach; ?>

</table>