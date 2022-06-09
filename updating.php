<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}



if (isset($_GET['namaResto'])) {
    $_SESSION['namaResto'] = $_GET['namaResto'];
} else {
    $_GET['namaResto'] = $_SESSION['namaResto'];
}
require_once 'tampilUlasanSebelumnya.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Review</title>
    <link rel="stylesheet" href="updating.css">
</head>

<body>





    <h1 style="text-align: center; margin: 20px">
        Update your review here!
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

                    <form id=form action="updatingAction.php" method="post">

                        <!-- <input type="hidden" name="namaResto" value="<?= $_GET['namaResto'] ?>"> -->
                        <br>
                        <textarea style="margin-left: 15px; padding-top: 10px;" placeholder="Ulasan" id="ulasan" name="ulasan" rows="10" cols="50" required><?php echo ($row['ulasan']) ?></textarea>
                        </td>
                        <td>
                            <input style=" width:150px; height: 30px; border-radius: 15px; margin-top:15px;" label="ulasan" type="submit" value="Submit" name="submit" id="submit" action="addReviewAction.php">
                        </td>
                    </form>
                    <tr>
                        <div id="dom-target" style="display: none;">
                            <?php
                            $output = "42"; // Again, do some operation, get the output.
                            echo htmlspecialchars($output); /* You have to escape because the result
                                           will not be valid HTML otherwise. */
                            ?>
                        </div>
                        <script>
                            var div = document.getElementById("dom-target");
                            var myData = div.textContent;
                        </script>

                </table>
                <br>
                <div class="logo">
                    <h3 style="color: white; margin-left: -15px;"><a href="myReviews.php">Back to Your Review</a></h3>
                </div>
                </tr>

            </div>


            <div style="display: table-cell; height: 100px; ">

            </div>
        </div>
    </div>
</body>

</html>