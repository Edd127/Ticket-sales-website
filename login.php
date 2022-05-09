<?php
session_start();
include("connection.php");
include("functions.php");

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    if (!empty($email) &&  !empty($password)) {
        $query = "SELECT * FROM customer WHERE email= '$email' limit 1";
        $result = mysqli_query($con, $query);

        if ($result) {
            if ($result && mysqli_num_rows($result) > 0) {
                $user_data = mysqli_fetch_assoc($result);

                if ($user_data['password'] === $password) {
                    $_SESSION['email'] = $user_data['email'];
                    header("Location: user_page.php");
                    die;
                }
            }
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="styles.css">
</head>

<body>
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
    <div>
        <form method="post" class="formular">
            <p>Email</p>
            <input type="text" name="email">
            <p>Parola</p>
            <input type="password" name="password">

            <p><input type="submit" value="Login"></p>
            <p><a href="signup.php">Nu ai cont? Creează-ți unul </a></p>
            <p><a href="recuperare_parola.php">Am uitat parola</a></p>


        </form>
    </div>

    <footer class="subsol">

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