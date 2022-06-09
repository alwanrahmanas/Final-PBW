<?php

require_once 'listAction.php';
if (!isset($_SESSION['login'])) {
    header("Location: loginRegister.html");
}

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}





?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List Restaurant</title>
    <link rel="stylesheet" href="list.css">
</head>

<body>


    <nav class="pojok" style="float:inline-start">
        <div class="logo">
            <h3><a style="text-decoration:none; " href="FrontPage.php">Food Reviews</a></h3>
            <?php if ($_SESSION['role'] == "admin") { ?>
                <br>
                <a href="tambahResto.php" id="login">Add Resto</a>
            <?php } ?>
        </div>
        <form style="float:inline-start; margin-left: 15px;" action="" method="post">
            <input type="text" name="keyword" id="keyword" placeholder="Search Restaurant">
            <!-- <input type="submit" name="submit" value="Search" id=" search"> -->
        </form>

    </nav>



    <div id="container">

        <table border="1" id="tab">
            <tr>

                <th class="header-top1">Nama Resto</th>
                <th class="header-top2">Alamat</th>
                <th class="header-top3"> Aksi</th>

            </tr>
            <?php foreach ($row as $rows) : ?>
                <tr class="data">

                    <td><?= $rows["namaResto"] ?></td>
                    <td><?= $rows["alamat"] ?> </td>

                    <td>
                        <a href="addReview.php?namaResto=<?= $rows["namaResto"]; ?>">Review</a>
                    </td>
                </tr>

            <?php endforeach; ?>

        </table>
    </div>
    <br>
    <script src="searchList.js">
    </script>

</body>

</html>