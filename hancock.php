<?php
session_start();
include("connection.php");
include("functions.php");
$concert = 6;
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Herbie Hancock</title>
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


    </nav>

    <div class="artist">
        <div class="scris">
            <h1>Herbie Hancock</h1>
            <p>What is Lorem Ipsum?
                Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,
                when an unknown printer took a galley of type and scrambled it to make a type specimen book.
                It has survived not only five centuries, but also the leap into electronic typesetting,
                remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages,
                nd more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
        </div>
        <div class="slider">
            <div class="slides">
                <input type="radio" name="radio-btn" id="radiob1" />
                <input type="radio" name="radio-btn" id="radiob2" />
                <input type="radio" name="radio-btn" id="radiob3" />

                <div class="slide first">
                    <img src="https://i.guim.co.uk/img/media/01b127760ff96673c5defa26c17a2d8d68534ed9/0_0_3500_2100/master/3500.jpg?width=1200&height=1200&quality=85&auto=format&fit=crop&s=e328b9af5f832d5fae5c9919fc56f0da" alt="img1" />
                </div>
                <div class="slide">
                    <img src="https://www.udiscovermusic.com/wp-content/uploads/2020/03/Herbie-Hancock-GettyImages-84844147.jpg" alt="img2" />
                </div>
                <div class="slide">
                    <img src="https://www.herbiehancock.com/wp-content/uploads/2016/04/Herbie-Hancock-COLOR2-SONY-e1487188293101.jpg" alt="img3" />
                </div>

                <!--navigare automata-->
                <div class="navigare-auto">
                    <div class="auto1"></div>
                    <div class="auto2"></div>
                    <div class="auto3"></div>
                </div>
            </div>

            <!--navigare manuala-->

            <div class="navigare-manuala">
                <label for="radiob1" class="manual"></label>
                <label for="radiob2" class="manual"></label>
                <label for="radiob3" class="manual"></label>
            </div>
            <script src="script.js"></script>
        </div>


        <div class="achizitie">
            <p>Cumpără bilet!</p>
            <table class="table">

                <tr>
                    <th>Codul Categoriei</th>
                    <th>Descriere</th>
                    <th>Preț</th>
                </tr>
                <?php echo show_category($con); ?>
            </table>
        </div>
        <div class=butoane-achizitie>
            <form method=post>
                <p><?php echo '<p>Grăbește-te! Mai sunt ' . check_avail($con, 1, $concert) . ' bilete disponibile pentru categoria 1!'; ?></p>
                <input type="submit" name="alegere" value="Cumpara bilet categoria 1" />

                <p><?php echo '<p>Grăbește-te! Mai sunt ' . check_avail($con, 2, $concert) . ' bilete disponibile pentru categoria 2!'; ?></p>
                <input type="submit" name="alegere" value="Cumpara bilet categoria 2" />




                <p><?php echo '<p>Grăbește-te! Mai sunt ' . check_avail($con, 3, $concert) . ' bilete disponibile pentru categoria 3!'; ?></p>
                <input type="submit" name="alegere" value="Cumpara bilet categoria 3" />

                <?php
                buy_tickets_by_concrt_categ($con, $concert)

                ?>
            </form>
        </div>
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