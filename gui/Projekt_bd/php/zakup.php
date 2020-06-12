
<?php
session_start();
$first1=$_GET['var1'];
$first2=$_GET['var2'];
$first3=$_GET['var3'];//pojazd
$first4=$_GET['var4'];
$first5=$_GET['var5'];
$first6=$_GET['var6'];//kwota
$first7=$_GET['var7'];//typ transakcji
$cenakonc=$_GET['var6'];
//$cyk id_klienta


require_once "connect.php";

function sendMail($klient,$pojazd)
{
    error_reporting(E_ALL);
    require_once "../phpmailer/class.phpmailer.php";

    $conn=oci_connect("krzysiek","Kris4539","localhost/bd_projekt");
    if(!$conn){
        echo "nie";
    }else{
        $sql='begin p6_zakup_potwierdzenie(:bind1,:bind2,:bind3,:bind4,:bind5,:bind6,:bind7,:bind8,:bind9,:bind10,:bind11); end;';

        $stid=oci_parse($conn,$sql);
        oci_bind_by_name($stid,':bind1',$klient,1);
        oci_bind_by_name($stid,':bind2',$pojazd,1);
        oci_bind_by_name($stid,':bind3',$var1,50);
        oci_bind_by_name($stid,':bind4',$var2,50);
        oci_bind_by_name($stid,':bind5',$var3,50);
        oci_bind_by_name($stid,':bind6',$var4,50);
        oci_bind_by_name($stid,':bind7',$var5,50);
        oci_bind_by_name($stid,':bind8',$var6,50);
        oci_bind_by_name($stid,':bind9',$var7,50);
        oci_bind_by_name($stid,':bind10',$var8,50);
        oci_bind_by_name($stid,':bind11',$var9,50);
        oci_execute($stid);

        oci_free_statement($stid);
        oci_close($conn);

    }


   $body="<html>
<body>
<h1>Witaj serdecznie,".$var3." ".$var4."</h1>
<h2> Dziękuje bardzo za zakup samochodu ".$var1." ".$var2." z naszej strony!</h2>
<h2>Wkrótce zadzwonimy w celu umówienia się z Tobą na odbiór samochodu.</h2>

<h4>Z konfiguracją.</h4>
<p>Kolor: ".$var7." </p>
<p>Silnik: ".$var8." </p>

<p>W dniu ".$var9." za jedyne:".$var6." zł </p>

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
    $mail->AddAddress($var5);
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
                        <a class="nav-link" href="../index.php" data-offset="90">Strona Główna</a>
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
                                    $conn=oci_connect($username,$password,$name);
                                    if(!$conn){
                                        echo "nie";
                                    }else{

                                        $sql="SELECT cena from pojazdy where id_pojazdu=$first3";
                                        $stid=oci_parse($conn,$sql);
                                        oci_execute($stid);

                                        while (($row = oci_fetch_array($stid,OCI_ASSOC)) != false) {
                                            $test1 = $row['CENA'];
                                        }

                                        oci_free_statement($stid);
                                        //$first3-pojazd
                                        //$first6-kwota podana przez uzytkownika
                                        //$var6-cena za samochod
                                        $sql="SELECT sprawdz_kwote($first3,$first6,$test1)as wynik from dual";
                                        $stid=oci_parse($conn,$sql);
                                        oci_execute($stid);

                                    while (($row = oci_fetch_array($stid,OCI_ASSOC)) != false) {
                                        $test = $row['WYNIK'];
                                    }
                                        oci_free_statement($stid);


                                        $sql='begin p6_zakup(:bind1,:bind2,:bind3,:bind4); end;';

                                        $czy_sprzedano='0';
                                        $sql='begin p6_zakup(:bind1,:bind2,:bind3,:bind4); end;';

                                        $stid=oci_parse($conn,$sql);
                                        oci_bind_by_name($stid,':bind1',$first3,1);
                                        oci_bind_by_name($stid,':bind2',$first5,1);
                                        oci_bind_by_name($stid,':bind3',$first4,1);
                                        oci_bind_by_name($stid,':bind4',$czy_sprzedano,1);
                                        oci_execute($stid);
                                        oci_free_statement($stid);

                                        $sql='begin p6_zakup_2(:bind1,:bind2,:bind3); end;';

                                        $stid=oci_parse($conn,$sql);
                                        oci_bind_by_name($stid,':bind1',$first2,11);
                                        oci_bind_by_name($stid,':bind2',$first1,7);
                                        oci_bind_by_name($stid,':bind3',$cyk,1);
                                        oci_execute($stid);
                                        oci_free_statement($stid);



                                        $sql='begin p_insert_transakcje(:bind1,:bind2,:bind3,:bind4,:bind5); end;';

                                        $stid=oci_parse($conn,$sql);
                                        oci_bind_by_name($stid,':bind1',$cyk,1100000);
                                        oci_bind_by_name($stid,':bind2',$first3,70000);
                                        oci_bind_by_name($stid,':bind3',$test,10000);
                                        oci_bind_by_name($stid,':bind4',$first6,10000);
                                        oci_bind_by_name($stid,':bind5',$first7,100000);
                                        oci_execute($stid);
                                        oci_free_statement($stid);

                                        $sql = "SELECT id_transakcji as var1 from transakcje order  by id_transakcji desc fetch next 1 rows only";
                                        $stid = oci_parse($conn, $sql);
                                        oci_execute($stid);
                                        $row = oci_fetch_array($stid, OCI_ASSOC);
                                        $returned = $row['VAR1'];

                                        do {


                                            $sql = 'begin rejestracje_first(:bind1,:bind2,:bind3); end;';
                                            $stid = oci_parse($conn, $sql);
                                            oci_bind_by_name($stid, ':bind1', $returned, 100);
                                            oci_bind_by_name($stid, ':bind2', $check1, 100);
                                            oci_bind_by_name($stid, ':bind3', $check2, 100);
                                            oci_execute($stid);
                                            $sql = 'begin p_insert_rejestracje_check(:bind1,:bind2); end;';
                                            $stid = oci_parse($conn, $sql);
                                            oci_bind_by_name($stid, ':bind1', $check1, 100);
                                            oci_bind_by_name($stid, ':bind2', $varcheck, 100);
                                            oci_execute($stid);
                                            oci_free_statement($stid);
                                        }while ($varcheck!=0);

                                        $sql = 'begin p_insert_rejestracje(:bind1,:bind2); end;';
                                        $stid = oci_parse($conn, $sql);
                                        oci_bind_by_name($stid, ':bind1', $check2, 100);
                                        oci_bind_by_name($stid, ':bind2', $check1, 100);
                                        oci_execute($stid);
                                        oci_free_statement($stid);
                                        $sql = 'begin p_insert_historie_check(:bind1,:bind2,:bind3,:bind4); end;';
                                        $stid = oci_parse($conn, $sql);
                                        oci_bind_by_name($stid, ':bind1', $returned, 100);
                                        oci_bind_by_name($stid, ':bind2', $check1, 100);
                                        oci_bind_by_name($stid, ':bind3', $check4, 100);
                                        oci_bind_by_name($stid, ':bind4', $check5, 100);
                                        oci_execute($stid);
                                        oci_free_statement($stid);
                                        $sql = 'begin p_insert_historie(:bind1,:bind2); end;';
                                        $stid = oci_parse($conn, $sql);
                                        oci_bind_by_name($stid, ':bind1', $check5, 100);
                                        oci_bind_by_name($stid, ':bind2', $check4, 100);
                                        oci_execute($stid);
                                        oci_free_statement($stid);


                                      echo"  <div class=\"text-center\"><a href=\"../index.php\">
                                        <button  class=\"btn btn-primary btn-rounded\" >
                                            <i  aria-hidden=\"true\" ></i>Powrót do strony głównej</button></a>
                                        </div>";


                                        oci_close($conn);
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

