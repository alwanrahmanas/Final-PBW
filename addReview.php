<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
if (!isset($_SESSION['login'])) {
    header("Location: loginRegister.html");
}



if (isset($_GET['namaResto'])) {
    $_SESSION['namaResto'] = $_GET['namaResto'];
} else {
    $_GET['namaResto'] = $_SESSION['namaResto'];
}

?>
<?php ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="addReview.css">
</head>

<body>
    <!-- <?php
            if (!isset($_GET['namaResto']) or $_GET['namaResto'] == null) {
                var_dump($_GET['namaResto']);
            }
            ?> -->

    <?php require 'tampilReview.php'; ?>
    <nav>

        <div class="pojok">
            <form>
                <input style=" padding-left: 10px; margin-left: 15px; margin-top:30px; height: 30px; border-radius:20px;" id="keyword" type="text" name="search" placeholder=" Search Reviews Here!">
                <!--  <input type="submit" name="submit" value="Search "> -->
            </form>
        </div>
    </nav>

    <h1 style="text-align: center; margin: 20px">
        Add your review and see reviews before here!
    </h1>
    <div style="width: 100%; display: table; margin-top: 50px;">
        <div style="display: table-row; height: 100%; ">
            <div style="width: 50%; display: table-cell;  " class=t1>
                <table style="width: 99%; margin-top:auto; border-radius: 10px" id="tt">

                    <tr>
                        <h1 style="margin-top: 30px; margin-left: 10px">

                            Write down your review about:<br> <?= $_SESSION['namaResto'] ?>

                        </h1>
                    </tr>

                    <form id=form action="addReviewAction.php" method="post">


                        <br>
                        <textarea style="margin-left: 15px;padding: 10px;" placeholder="Ulasan" id="ulasan" name="ulasan" rows="10" cols="50" required></textarea>
                        </td>
                        <td>
                            <input style=" width:150px; height: 30px; border-radius: 15px; margin-top:15px;" label="ulasan" type="submit" value="Submit" name="submit" id="submit" action="addReviewAction.php">
                        </td>
                    </form>
                    <tr>


                </table>
                <br>
                <div class="logo">
                    <h3 style="color: white; margin-left: -15px;"><a href="list.php">Back Food List</a></h3>
                </div>
                </tr>

            </div>


            <div id="container" style="display: table-cell; height: 100px; ">
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
            </div>
        </div>
    </div>
    <script src="searchAddReview.js">
    </script>
</body>

</html>