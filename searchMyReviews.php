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
    $id = $_SESSION["id"];
    $sql = "SELECT * FROM review WHERE namaResto LIKE '%$search%' and id = $id";

    //cetak data
    $result = $conn->query($sql);
    $result->setFetchMode(PDO::FETCH_ASSOC);
    $row = $result->fetchAll();
    $conn = null;
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
?>
<table border="1" id="tab">
    <tr>

        <th class="header-top1">Nama Resto</th>
        <th class="header-top2">Ulasan</th>
        <th class="header-top4">Aksi</th>
    </tr>
    <?php foreach ($row as $rows) : ?>
        <tr class="data">

            <td>
                <?= $rows["namaResto"] ?>
            </td>
            <td><?= $rows["ulasan"] ?></td>
            <td>
                <a href="edit.php?namaResto=<?= $rows["namaResto"]; ?>">Edit</a> |
                <a href="deleting.php?namaResto=<?= $rows["namaResto"]; ?>">Delete</a>
            </td>
        </tr>

    <?php endforeach; ?>

</table>