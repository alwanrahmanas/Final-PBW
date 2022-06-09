<?php
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
  <title>Add Resto</title>
  <link rel="stylesheet" href="tambahResto.css">
</head>

<body>
  <div class="container">

    <form id="contact" action="tambahRestoAction.php" method="post">
      <h3>Input Here!</h3>
      <fieldset>
        <input placeholder="Nama Restoran" type="text" tabindex="1" name="namaResto" required autofocus>
      </fieldset>
      <fieldset>
        <textarea placeholder="Address" tabindex="5" name="alamat" required></textarea>
      </fieldset>
      <fieldset>
        <button name="submit" type="submit" id="contact-submit" data-submit="...Sending">Submit</button>
      </fieldset>
    </form>


  </div>
</body>

</html>