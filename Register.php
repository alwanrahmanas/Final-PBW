<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="Register.css">
</head>

<body>
    <form name="form1" class="register-form" action="registerAction.php" method="post">

        <input type="text" placeholder="Name" id="nama" name="nama" required autofocus onkeyup="validateUser(document.form1.nama)">
        <input type="password" placeholder="Password" id="password" name="password" required>
        <input type="text" placeholder="Email" name="email" id="email" required onkeyup="validateEmail(document.form1.email)">
        <p id="demo"></p>
        <input style="color: #FFFFFF; background-color: rgba(76,76,76); font-family: Grandstander;" type="submit" action="registerAction.php" value="Submit" id="submit">
        <p class="message">Already registered? <a href="LoginRegister.html">Login</a></p>
    </form>
    <script>
        function validateEmail(text) {

            var re = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
            //var submit = document.getElementById("submit");
            var x = text.value;
            if (re.test(x)) {
                document.getElementById("demo").innerHTML = "";
                document.getElementById("submit").disabled = false;
            } else {
                document.getElementById("demo").innerHTML = "Invalid email ";
                document.getElementById("submit").disabled = true;
            }

        }

        function validateUser(t) {
            var x = t.value;
            var xml = new XMLHttpRequest();
            xml.onreadystatechange = function() {

                if (this.readyState == 4 && this.status == 200) {
                    if (this.responseText == "true") {
                        document.getElementById("demo").innerHTML = "Username already taken ";
                        document.getElementById("submit").disabled = true;
                    } else {
                        document.getElementById("demo").innerHTML = "";
                        document.getElementById("submit").disabled = false;
                    }
                }
            };
            xml.open("GET", "registerAction.php?nama=" + x, true);
            xml.send();

        }
    </script>
</body>

</html>