<?php
session_start();
include("connection.php");
include("functions.php");
check_login($con);
$email = $_SESSION['email'];
$user_data = check_login($con);
$customer_id = $user_data['customer_id'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="styles.css" />
  <title>Contul meu</title>
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

  <div class="cont-utilizator">
    <h3>
      Salut,
      <?php echo $user_data['first_name']; ?>!
    </h3>
    <p>Biletele cumparate sunt:</p>
    <table class="table" style="overflow-x:auto;">
      <tr>
        <th>Numele Concertului</th>
        <th>Locație</th>
        <th>Oraș</th>
        <th>Data concertului</th>
        <th>Categoria biletului</th>
      </tr>
      <?php echo show_tickets($con); ?>
    </table>

    <div class="delogare">
      <a href="logout.php"><button>Delogare</button></a>
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