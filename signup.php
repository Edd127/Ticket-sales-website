<?php
session_start();
include("connection.php");
include("functions.php");

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $password = $_POST['password'];
    $phone_number = $_POST['phone_number'];
    $email = $_POST['email'];
    $secret_word = $_POST['secret_word'];

    if (!empty($first_name) && !empty($last_name) && check_password($password) && check_phone_number($phone_number) && !empty($email) && check_email($con, $email) && !empty($secret_word)) {
        $query = "INSERT INTO customer  VALUES (null,'$first_name','$last_name','$password','$phone_number','$email','$secret_word')";
        mysqli_query($con, $query);
        header("Location: login.php");
        die;
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inregistrare</title>
    <link rel="stylesheet" href="styles.css">
</head>

<body class="inregistrare">
    <nav>
        <input id="but-nav" type="checkbox">
        <div class="brand"><img src="img/nav/brand1.png"></div>
        <ul class="nav-paths">
            <?php
            if (isset($_SESSION['email'])) { ?>
                <li><a href="index.php">Acasa</a></li>
                <li><a href="clasica.php">Clasica</a></li>
                <li><a href="jazz.php">Jazz</a></li>
                <li><a href="rock.php">Rock</a></li>
                <li><a href="techno.php">Techno</a></li>
                <li><a href="user_page.php">Contul meu</a></li>
            <?php  } else {  ?>
                <li><a href="index.php">Acasa</a></li>
                <li><a href="clasica.php">Clasica</a></li>
                <li><a href="jazz.php">Jazz</a></li>
                <li><a href="rock.php">Rock</a></li>
                <li><a href="techno.php">Techno</a></li>
                <li><a href="login.php">Logare utilizator</a></li>
                <li><a href="signup.php">Înregistrează-te!</a></li>
            <?php  } ?>
        </ul>
        <label for="but-nav" class="icon-burger">
            <div class="linie"></div>
            <div class="linie"></div>
            <div class="linie"></div>
        </label>
    </nav>

    <div id="box">
        <form method="post" class="formular">
            <p>Email:</p>
            <input type="text" name="email">
            <p>Nume:</p>
            <input type="text" name="first_name">
            <p>Prenume:</p>
            <input type="text" name="last_name">
            <p>Parola:</p>
            <input type="password" name="password">
            <p>Numarul de telefon:</p>
            <input type="text" name="phone_number">
            <p>Cuvant secret:</p>
            <input type="text" name="secret_word">


            <p><input type="submit" value="Inregistrare">
            </p>
            <p> <a href="login.php"> Ai cont? Logheaza-te! </a></p>


        </form>
    </div>
    < <footer class="subsol">
        <div class="contact">
            <ul>
                <li>
                    <a href="https://www.unitbv.ro/"><img src="img/footer/unitbv.PNG" /></a>
                </li>
                <li>
                    <a href="https://www.instagram.com/universitateatransilvania/"><img src="img/footer/instagram.png" /></a>
                </li>
                <li>
                    <a href=" https://www.facebook.com/unitbv"><img src="img/footer/facebook.png" /></a>
                </li>
            </ul>
            <p>Brașov 2021-2022</p>
        </div>
        </footer>
</body>

</html>