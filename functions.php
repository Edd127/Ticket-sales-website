<?php

//------------------------functie de verificare a login-ului----------------

function check_login($con)
{
    if (isset($_SESSION['email'])) {
        $email = $_SESSION['email'];
        $query = "SELECT * FROM customer WHERE email= '$email' LIMIT 1";
        $result = mysqli_query($con, $query);

        if ($result && mysqli_num_rows($result) > 0) {
            $user_data = mysqli_fetch_assoc($result);
            return $user_data;
        }
    } else {
        header("Location: login.php");
        die;
    }
    header("Location: contul_meu.php");
}



//-----------------------------functii de validare--------------------------

function check_password($password)
{
    $contorString = 0;
    $contorNumber = 0;
    for ($x = 0; $x < strlen($password); $x++) ($x = $x . strtoupper($x)) ? ($contorString++) : (null);

    for ($x = 0; $x < strlen($password); $x++) (is_numeric($password[$x])) ? ($contorNumber++) : (null);

    if ($contorString >= 1 && $contorNumber >= 1 && strlen($password) >= 8) {
        return true;
    } else {
        echo '<script>alert("Parola invalida")</script>';
        return false;
    }
}



function check_phone_number($phone_number)
{
    if (preg_match('~[0][0-9]{9}~', $phone_number))

        return true;
    else {
        echo '<script>alert("Numar de telefon invalid")</script>';
        return false;
    }
}
//---------------------------functie verificare email

function check_email($con, $email)
{
    $query = "SELECT email FROM customer WHERE email='$email'";
    $result = mysqli_query($con, $query);
    $data = mysqli_fetch_assoc($result) or die(mysqli_error($con));
    $qemail = $data['email'];


    if ($qemail == $email) {
        echo '<script>alert(email existent)</script>';
        header("location:recuperare_parola.php");
    } else {
        return true;
    }
}


//---------------------------functie numarare bilete disponibile
function check_avail($con, $categ, $concert)
{
    $query = "SELECT count(*) AS numar from ticket where concert_id=$concert and category_code=$categ and bought=0";
    $result = mysqli_query($con, $query);
    $data = mysqli_fetch_assoc($result) or die(mysqli_error($con));
    $total = $data['numar'];

    return $total;
}


//------------------------functie de cumparare in functie de categorie si de concert
function buy_tickets_by_concrt_categ($con, $concert)
{
    if (isset($_POST['alegere'])) {
        $categ = "";

        switch ($_POST['alegere']) {
            case "Cumpara bilet categoria 1":
                $categ = 1;
                buy_tickets($con, $categ, $concert);
                break;
            case "Cumpara bilet categoria 2":
                $categ = 2;
                buy_tickets($con, $categ, $concert);
                break;
            case "Cumpara bilet categoria 3":
                $categ = 3;
                buy_tickets($con, $categ, $concert);
                break;
            default:
                echo "<script>alertbox(nu merge)</script>";
                break;
        }
    }
}


//-----------------------functie de cumparare tickete in functie de categorie
function buy_tickets($con, $categ, $concert)
{

    $user_data = check_login($con);
    $customer_id = $user_data['customer_id'];

    //selectare id_ticket
    $query = "SELECT ticket_id FROM ticket WHERE concert_id=$concert AND category_code=$categ AND bought=false ORDER BY ticket_id LIMIT 1";
    $result = mysqli_query($con, $query);
    $data = mysqli_fetch_assoc($result) or die(mysqli_error($con));
    $id_ticket = $data['ticket_id'];

    //  update bilet
    $query1 = "UPDATE ticket set bought=1 WHERE ticket_id=$id_ticket";
    $result = mysqli_query($con, $query1);
    if (empty($result)) {
        echo 'nu merge';
    }


    $query = "INSERT INTO bought_tickets VALUES(NULL, $customer_id, $id_ticket, $categ, $concert)";
    $result = mysqli_query($con, $query);
    if (!empty($result)) {
        echo '<script>alertbox("Biletul a fost achizitionat cu succes!")</script>';
    }
    echo "<meta http-equiv='refresh' content='0'>"; //refresh la pagina dupa submit
}


//-----------------------functie de afisare a categoriilor biletelor

function show_category($con)
{
    $query = "SELECT category_code, description, price FROM category_code";
    $result = mysqli_query($con, $query) or die(mysqli_error($con));

    while ($row = mysqli_fetch_array($result)) {

        echo "<tr><td>" . $row['category_code'] . "</td><td>" . $row['description'] . "</td><td>" . $row['price'] . "</td></tr>";
    }
}


//-----------------------functie de afisare a biletelor cumparate

function show_tickets($con)
{
    $user_data = check_login($con);
    $customer_id = $user_data['customer_id'];

    $query = "SELECT locations.location_name , locations.city, concerts.concert_date, concerts.concert_name, bought_tickets.category_code
    FROM locations INNER JOIN (concerts INNER JOIN bought_tickets ON concerts.concert_id = bought_tickets.concert_id) ON locations.location_id = concerts.location_id
    WHERE bought_tickets.customer_id= $customer_id";


    $result = mysqli_query($con, $query) or die(mysqli_error($con));

    while ($row = mysqli_fetch_array($result)) {

        echo "<tr><td>" . $row['concert_name'] . "</td><td>" . $row['location_name'] . "</td><td>" . $row['city'] . "</td><td>" . $row['concert_date'] . "</td><td>" . $row['category_code'] . "</td></tr>";
    }
}
