<?php
require_once 'tampilMyReview.php';
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
if (!isset($_SESSION['login'])) {
    header("Location: loginRegister.html");
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Reviews</title>
    <link rel="stylesheet" href="myReviews.css">
</head>

<body>

    <form>
        <input style="float:inline-start; padding-left: 10px; margin-left: 15px; margin-top:30px; height: 30px; border-radius:20px; width: 250px;" id="keyword" type="text" name="search" placeholder=" Search your resto's review!">
        <!--  <input type="submit" name="submit" value="Search "> -->
    </form>
    <br>
    <div class="logo">
        <h3 id=fp style="
        clear:both;
    
    color: white;
	margin-right: auto;
	margin:30px;
	float:inline-start;
    font-size: 25px;"><a style="color:white ;text-decoration: none;" href="FrontPage.php">Food Reviews</a></h3>

    </div>
    <div id="container">
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
    </div>
    <script src="searchMyReviews.js"></script>
</body>

</html>