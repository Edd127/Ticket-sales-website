<?php
session_start();
include("connection.php");
include("functions.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Techno</title>
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


    <a href="prodigy.php" class="sectiune">

        <div class="descriere">
            <h1>The Prodigy</h1>
            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer
                took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries,
                but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s
                with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing
                software like Aldus PageMaker including versions of Lorem Ipsum.</p>

        </div>
        <div class="poza">
            <img src="http://widefuture.com/wp-content/uploads/2016/12/the-prodigy-54715.jpg">
        </div>

    </a>
    <a href="arminvbuuren.php" class="sectiune">
        <div class="descriere">
            <h1>Armin Van Buuren</h1>
            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer
                took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries,
                but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s
                with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing
                software like Aldus PageMaker including versions of Lorem Ipsum.</p>
        </div>
        <div class="poza">
            <img src="https://wallpaperaccess.com/full/2197902.jpg">
        </div>
    </a>
    <a href="faithless.php" class="sectiune">
        <div class="descriere">
            <h1>The Faithless</h1>
            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer
                took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries,
                but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s
                with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing
                software like Aldus PageMaker including versions of Lorem Ipsum.</p>
        </div>
        <div class="poza">
            <img src="https://images3.alphacoders.com/197/thumb-1920-197327.jpg">
        </div>

    </a>


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