
<?php
session_start();
$first1=$_GET['var1'];
$first2=$_GET['var2'];
$first3=$_GET['var3'];
$first4=$_GET['var4'];
$first5=$_GET['var5'];




require_once "connect.php";

function sendMail($klient,$pojazd)
{
    error_reporting(E_ALL);
    require_once "../phpmailer/class.phpmailer.php";

    $polaczenie = @new mysqli('localhost', 'root', '', 'ai');

    if($polaczenie->connect_errno!=0){
        echo "Error".$polaczenie->connect_errno." Opis: ".$polaczenie->connect_error;

    }else {
        $sql = "SELECT marki.nazwa as marki,
modele.nazwa as modele,
klienci.imie as imie,
klienci.nazwisko as nazwisko,
klienci.email as email,
pojazdy.cena as cena,
kolory.nazwa as kolor,
silniki.nazwa as silnik,
data_transakcji as data

FROM 
`transakcje`
INNER JOIN klienci on transakcje.id_klienta=klienci.id 
INNER JOIN pojazdy on transakcje.id_pojazdu=pojazdy.id 
INNER JOIN modele on pojazdy.id_modelu=modele.id 
INNER JOIN marki ON modele.id_marki=marki.id  
INNER JOIN kolory ON pojazdy.id_koloru=kolory.id 
INNER JOIN silniki ON pojazdy.id_silnika=silniki.id 
WHERE id_klienta=$klient and id_pojazdu=$pojazd";

        $wynik=$polaczenie->query($sql) ;
        $r=$wynik->fetch_assoc();
        $var1= $r['marki'];
        $var2=$r['modele'];
        $var3=$r['imie'];
        $var4=$r['nazwisko'];
        $var5=$r['cena'];
        $var6=$r['kolor'];
        $var7=$r['silnik'];
        $var8=$r['data'];
        $var9=$r['email'];





        $polaczenie->close();

    }


   $body="<html>
<body>
<h1>Witaj serdecznie,".$var3." ".$var4."</h1>
<h2> Dziękuje bardzo za zakup samochodu ".$var1." ".$var2." z naszej strony!</h2>
<h2>Wkrótce zadwonimy w celu umówienia się z Tobą na odbiór samochodu.</h2>

<h4>Z konfiguracją.</h4>
<p>Kolor: ".$var6." </p>
<p>Silnik: ".$var7." </p>

<p>W dniu ".$var8." za jedyne:".$var5." zł </p>

<h5><br><br>Z wyrazami szacunku,<br>Załoga Aysta</h5>

</body>
</html>";


    $mail = new PHPMailer();

    $mail->IsSMTP();
    $mail->From = "aysta@gmail.com";
    $mail->FromName = "Aysta";
    $mail->Host = "smtp.gmail.com";
    $mail->SMTPSecure = "ssl";
    $mail->Port = 465;
    $mail->SMTPAuth = true;
    $mail->Username = "aiprojektaysta@gmail.com";
    $mail->Password = "zaq1@WSX";
    $mail->AddAddress($var9);
    $mail->WordWrap = 50;
    $mail->IsHTML(true);
    $mail->Subject = "Zakup";
    $mail->Body = $body;

    $mail->send();


}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Material Design Bootstrap</title>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">
    <!-- Bootstrap core CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <!-- Material Design Bootstrap -->
    <link href="../css/mdb.min.css" rel="stylesheet">
    <link href="../css/style.css" rel="stylesheet">
    <style>
        html,
        body,
        header,
        .view.jarallax {
            height: 100%;
            min-height: 100%;
        }
        input[type="submit"] {
            background: none;
            color: inherit;
            border: none;

        }

    </style>
    <script>
        function pop() {
            alert("Wiadomość została wysłana");
        }
    </script>
</head>

<body class="salon-lp">

<!-- Navigation & Intro -->
<header>
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top scrolling-navbar wow fadeIn" data-wow-delay="0.15s">
        <div class="container">
            <a class="navbar-brand font-weight-bold title" href="#">Potwierdzenie</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02"
                    aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
                <ul class="list-unstyled navbar-nav mr-auto smooth-scroll">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Marki
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="../html/amery.html">Amerykańskie</a>
                            <a class="dropdown-item" href="../html/japon.html">Japońskie</a>
                            <a class="dropdown-item" href="../html/euro.html">Europejskie</a>
                        </div>
                    </li>

                </ul>
                <ul class="navbar-nav dropdown smooth-scroll">
                    <li class="nav-item">
                        <a href="https://www.facebook.com/" target="_blank" class="nav-link"><i class="fab fa-facebook-f"></i></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../shop/sklep.php" data-offset="90">Sklep</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="rejestracja.php" data-offset="90">Rejestracja</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../index.html" data-offset="90">Strona Główna</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Navbar -->
    <!-- Intro Section -->
    <div id="glowna" class="view jarallax" data-jarallax='{"speed": 0.2}'>
        <div class="mask rgba-black-light">
            <div class="container h-100 d-flex justify-content-center align-items-center">
                <div class="row smooth-scroll">
                    <div class="col-md-12 text-center">
                        <div class="text-white wow fadeInDown">
                            <h1 class="display-4 text-uppercase font-weight-bold mt-5 mt-xl-2">Dziękujemy za dokonanie zakupu.</h1>
                            <hr class="hr-light my-4">
                            <h2 class="subtext-header font-weight-bold white-text mb-3">Wkrótce skontaktujemy się z Tobą.
                                <p class="clearfix d-none d-md-block">Pozdrawiamy.</p>
                                <p class="clearfix d-none d-md-block">
                                    <?php
                                    $polaczenie = @new mysqli($servername, $username, $password, $dbname);

                                    if($polaczenie->connect_errno!=0){
                                    echo "Error".$polaczenie->connect_errno." Opis: ".$polaczenie->connect_error;

                                    }else{



                                    $sqlupdate="UPDATE pojazdy SET id_silnika='$first5'  WHERE id='$first3'";
                                    $polaczenie->query($sqlupdate);
                                    $sqlupdate1="UPDATE pojazdy SET id_koloru='$first4' WHERE id='$first3'";
                                    $polaczenie->query($sqlupdate1);
                                        $sqlupdate2="UPDATE pojazdy SET czy_sprzedano='0' WHERE id='$first3'";
                                        $polaczenie->query($sqlupdate2);
                                    $sqlklient="SELECT id FROM klienci where pesel=$first2 and kod_indeks=$first1";
                                    $wynik=$polaczenie->query($sqlklient);
                                    $r=$wynik->fetch_assoc();
                                    $cyk=$r['id'];

                                    //echo "<br/> ".$cyk;
                                    //echo "<br/> ".$first3;




                                        $sqltran="INSERT INTO `transakcje` (`id`, `id_klienta`, `id_pojazdu`, `data_transakcji`) VALUES (NULL, '$cyk', '$first3', curdate())";
                                    if($wynik=$polaczenie->query($sqltran)){
                                      echo"  <div class=\"text-center\"><a href=\"../index.html\">
                                        <button  class=\"btn btn-primary btn-rounded\" >
                                            <i  aria-hidden=\"true\" ></i>Powrót do strony głównej</button></a>
                                        </div>";
                                    }else{

                                    }

                                    $polaczenie->close();
                                    }
                                    sendMail($cyk,$first3);

                                    ?>



                                </p>
                            </h2>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>


</header>


<script type="text/javascript" src="js/jquery-3.4.1.min.js"></script>
<!--  Bootstrap tooltips  -->
<script type="text/javascript" src="js/popper.min.js"></script>
<!--  Bootstrap core JavaScript  -->
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<!--  MDB core JavaScript  -->
<script type="text/javascript" src="js/mdb.min.js"></script>

<!-- Custom scripts -->
<script>
    // Animation init
    new WOW().init();

    // MDB Lightbox Init
    $(function () {
        $("#mdb-lightbox-ui").load("/mdb-addons/mdb-lightbox-ui.html");
    });

</script>

</body>

</html>

