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
require_once 'tampilUlasanSebelumnya.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="edit.css">
</head>

<body>
  <div class="container">
    <form id=contact action="updatingAction.php" method="post">
      <h4>Write your review about:<br> <?= $_SESSION['namaResto'] ?></h4>

      <fieldset>
        <textarea name="ulasan" placeholder="Your Review" tabindex="5" required><?php echo ($row['ulasan']) ?></textarea>
      </fieldset>
      <fieldset>
        <button name="submit" type="submit" id="contact-submit" data-submit="...Sending">Submit</button>
      </fieldset>
    </form>


  </div>
</body>

</html>