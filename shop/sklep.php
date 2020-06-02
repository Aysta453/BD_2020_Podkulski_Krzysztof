<?php
global $firstliczba;
global $wybor;
$firstliczba=1;
$wybor=0;

function dokonanie($var){
    global $wybor;
    $wybor=$wybor+$var;

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
        header{
            min-height: 30%;
            height: 40%;

        }
        button {
            background: none;
            color: inherit;
            border: none;
            padding: 0;
            font: inherit;
            cursor: pointer;
            outline: inherit;
        }

    </style>
</head>

<body class="salon-lp">

<!-- Navigation & Intro -->
<!-- Navigation & Intro -->
<header>
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top bg-dark wow fadeIn" data-wow-delay="0.15s">
        <div class="container">
            <a class="navbar-brand font-weight-bold title" href="#">Sklep</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02"
                    aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
                <ul class="list-unstyled navbar-nav mr-auto smooth-scroll">

                    <li class="nav-item">
                        <a class="nav-link" href="#opis" data-offset="90">Informacje</a>
                    </li>

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
                        <a class="nav-link" href="../index.html" data-offset="90">Główna Strona</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../php/rejestracja.php" data-offset="90">Rejestracja</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>


</header>
<!-- Navigation & Intro -->
<!-- Navigation & Intro -->

<!-- Main content -->
<main>





    <!-- Fourth Container -->
    <div class="container">

        <h4 class="font-weight-bold mt-4 title-1 text-center">
            <strong>Nasze oferty</strong>
        </h4>
        <hr class="blue mb-5">

        <?php

        while($firstliczba<=6)
        {
            if($firstliczba%2!=0){



                echo<<<END
  <div class="row mb-3">
  
            <div class="col-lg-6 col-md-6 mb-4">
            
                 <div class="card card-ecommerce">
                    <div class="view overlay">
END;
                echo "<img src=\"../img/american/shop/product".$firstliczba."_3.jpg\" class=\"img-fluid\" alt=\"\">";
                $house_id=$firstliczba;
                echo "<a href=\"product.php?id_produktu=".$house_id."\">";

                echo <<<END
                            <div class="mask rgba-white-slight"></div>
                        </a>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title mb-1"><strong>
END;



                require_once "../php/connect.php";

                $polaczenie = @new mysqli($servername, $username, $password, $dbname);

                if($polaczenie->connect_errno!=0){
                    echo "Error".$polaczenie->connect_errno." Opis: ".$polaczenie->connect_error;

                }else {
                    $sql="SELECT marki.nazwa as nazwa1, modele.nazwa as nazwa2 FROM pojazdy INNER JOIN modele on pojazdy.id_modelu=modele.id INNER JOIN marki on modele.id_marki=marki.id  WHERE  pojazdy.id=$firstliczba";
                    $wynik=$polaczenie->query($sql) ;
                    while ($r=$wynik->fetch_assoc()){
                        echo $r['nazwa1'] . " " . $r['nazwa2'];
                    }

                    $polaczenie->close();
                }



                echo <<<END2
                  </strong>
        </h5>
        <div class="card-footer pb-0">
            <div class="row mb-0">
                                <span class="float-left">
                                    <strong>
END2;

                                     require_once "../php/connect.php";

                $polaczenie = @new mysqli($servername, $username, $password, $dbname);

                if($polaczenie->connect_errno!=0){
                    echo "Error".$polaczenie->connect_errno." Opis: ".$polaczenie->connect_error;

                }else {
                    $sql="SELECT cena from pojazdy where id=$firstliczba";
                    $wynik=$polaczenie->query($sql) ;
                    while ($r=$wynik->fetch_assoc()){
                        echo $r['cena'] . " zł";
                    }

                    $polaczenie->close();
                }
echo<<<END2

                                   </strong>
                                </span>
            </div>
        </div>
    </div>
    </div>
    </div>
END2;

                $firstliczba++;

            }  else{

                echo <<<END3
                <div class="col-lg-6 col-md-6 mb-4">
               <div class="card card-ecommerce">
                    <div class="view overlay">
END3;
                echo "<img src=\"../img/american/shop/product".$firstliczba."_2.jpg\" class=\"img-fluid\" alt=\"\">";
                $house_id=$firstliczba;
                echo "<a href=\"product.php?id_produktu=".$house_id."\">";
                echo<<<END3

                            <div class="mask rgba-white-slight"></div>
                        </a>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title mb-1">
                            <strong>
END3;



                require_once "../php/connect.php";

                $polaczenie = @new mysqli($servername, $username, $password, $dbname);

                if($polaczenie->connect_errno!=0){
                    echo "Error".$polaczenie->connect_errno." Opis: ".$polaczenie->connect_error;

                }else {
                    $sql="SELECT marki.nazwa as nazwa1, modele.nazwa as nazwa2 FROM pojazdy INNER JOIN modele on pojazdy.id_modelu=modele.id INNER JOIN marki on modele.id_marki=marki.id  WHERE  pojazdy.id=$firstliczba";
                    $wynik=$polaczenie->query($sql) ;
                    while ($r=$wynik->fetch_assoc()){
                        echo $r['nazwa1'] . " " . $r['nazwa2'];
                    }

                    $polaczenie->close();
                }
                echo <<<END4
                                    
        </strong>
        </h5>
        <div class="card-footer pb-0">
            <div class="row mb-0">
                                <span class="float-left">
                                    <strong>
END4;

                                     require_once "../php/connect.php";

                $polaczenie = @new mysqli($servername, $username, $password, $dbname);

                if($polaczenie->connect_errno!=0){
                    echo "Error".$polaczenie->connect_errno." Opis: ".$polaczenie->connect_error;

                }else {
                    $sql="SELECT cena from pojazdy where id=$firstliczba";
                    $wynik=$polaczenie->query($sql) ;
                    while ($r=$wynik->fetch_assoc()){
                        echo $r['cena'] . " zł";
                    }

                    $polaczenie->close();
                }
echo<<<END4
                                    
                                    
</strong>
                                </span>
            </div>
        </div>
    </div>
    </div>
    </div>
    </div>
END4;


                $firstliczba++;
            }
        }


        ?>



</main>
<!-- Main content -->

<!-- Footer -->
<footer id="opis" class="page-footer footer-tiles text-center text-md-left pt-3">

    <!-- Footer Links -->
    <div class="container mt-1 mb-1">

        <!-- Grid row -->
        <div class="row">

            <!-- Grid column -->
            <div class="col-xl-3 col-lg-4 mt-2 mb-1 wow fadeIn" data-wow-delay="0.3s">
                <!-- About -->
                <h5 class="text-uppercase mb-4"><strong>O Firmie</strong></h5>

                <p>Firma założona od podstaw, przez młodego człowieka.</p>

                <p class="">Otwarta na nowe możliwości, sprowadzanie samochód i nie tylko.</p>


                <div class="footer-socials">

                    <a type="button" href="https://www.facebook.com/" target="_blank" class="btn-floating red"><i class="fab fa-facebook-f"></i></a>
                </div>
            </div>
            <!-- Grid column -->

            <hr class="w-100 clearfix d-md-none">

            <!-- Grid column -->
            <div class="col-xl-3 ml-auto col-lg-4 mt-2 mb-1 col-md-7 wow fadeIn" data-wow-delay="0.3s">

                <!-- Info -->
                <h5 class="text-uppercase mb-4 text-center"><strong>Informacje</strong></h5>
                <p><i class="fas fa-home mr-3 text-center"></i> Rzeszow, ul.Rejtana 1, PL</p>
                <p><i class="fas fa-envelope mr-3 text-center" ></i> info@gmail.com</p>
                <p><i class="fas fa-phone mr-3 text-center"></i> +48 123 123 123</p>


            </div>
            <!-- Grid column -->

            <hr class="w-100 clearfix d-md-none">

            <!-- Grid column -->
            <div class="col-xl-3 ml-auto col-lg-4 mt-2 mb-1 col-md-6 wow fadeIn" data-wow-delay="0.3s">

                <!-- Title -->
                <h5 class="text-uppercase mb-4 text-right"><strong>Godziny Otwarcia</strong></h5>

                <!-- Opening hours table -->
                <table class="table footer-table text-center text-white">
                    <tbody>
                    <tr>
                        <td>Pn - Pt:</td>
                        <td>8:00 - 22:00</td>
                    </tr>
                    <tr>
                        <td>Sobota:</td>
                        <td>10:00 - 17:00</td>
                    </tr>
                    <tr>
                        <td>Niedziela:</td>
                        <td>Nieczynne</td>
                    </tr>
                    </tbody>
                </table>

            </div>
            <!-- Grid column -->

        </div>
        <!-- Grid row -->

    </div>
    <!-- Footer Links -->

    <!-- Copyright -->
    <div class="footer-copyright py-3 text-center wow fadeIn" data-wow-delay="0.3s">
        <div class="container-fluid">
            © 2020 Copyright: Krzysztof Podkulski
        </div>
    </div>
    <!-- Copyright -->

</footer>
<!-- Footer -->
<!--  SCRIPTS  -->
<!--  JQuery  -->
<script type="text/javascript" src="../js/jquery-3.4.1.min.js"></script>
<!--  Bootstrap tooltips  -->
<script type="text/javascript" src="../js/popper.min.js"></script>
<!--  Bootstrap core JavaScript  -->
<script type="text/javascript" src="../js/bootstrap.min.js"></script>
<!--  MDB core JavaScript  -->
<script type="text/javascript" src="../js/mdb.min.js"></script>

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
