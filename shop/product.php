<?php
$zmienna_pobrana=$_GET['id_produktu'];
global $zmienna_wyboru;
$zmienna_wyboru=$zmienna_pobrana;
global $test1;
$test1=0;

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Aysta</title>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">
    <!-- Bootstrap core CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <!-- Material Design Bootstrap -->
    <link href="../css/mdb.min.css" rel="stylesheet">
    <link href="../css/style.css" rel="stylesheet">
    <style>
        body{
            min-width: 550px;
        }
        html,
        body,
        header{
            min-height: 30%;
            height: 55%;

        }

    </style>
</head>

<body class="salon-lp">

<!-- Navigation & Intro -->
<header>
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top bg-dark wow fadeIn" data-wow-delay="0.15s">
        <div class="container">
            <a class="navbar-brand font-weight-bold title" href="#">Produkt</a>
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

        <!-- Section: product details -->
        <section id="productDetails" class="pb-5">

            <!-- News card -->
            <div class="card mt-3 hoverable">

                <div class="row mt-3">

                    <div class="col-lg-6 mt-5">

                        <div class="row mx-2 mt-5 pt=2">

                            <!-- Carousel Wrapper -->
                            <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                                <div class="carousel-inner">
                                    <div class="carousel-item active">
                                        <img src="../img/american/shop/product<?php echo $zmienna_pobrana ?>_1.jpg" class="d-block w-100" alt="...">
                                    </div>
                                    <div class="carousel-item">
                                        <img src="../img/american/shop/product<?php echo $zmienna_pobrana ?>_2.jpg" class="d-block w-100" alt="...">
                                    </div>
                                    <div class="carousel-item">
                                        <img src="../img/american/shop/product<?php echo $zmienna_pobrana ?>_3.jpg" class="d-block w-100" alt="...">
                                    </div>
                                </div>
                                <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Previous</span>
                                </a>
                                <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Next</span>
                                </a>
                            </div>
                            <!-- Carousel Wrapper -->

                        </div>



                    </div>

                    <div class="col-lg-5 ml-5 mr-3  ">

                        <h2
                                class="h2-responsive text-center text-md-left product-name font-weight-bold dark-grey-text mb-1 ml-xl-0 ml-4">

                            <?php
                            require_once "../php/connect.php";

                            $polaczenie = @new mysqli($servername, $username, $password, $dbname);

                            if($polaczenie->connect_errno!=0){
                                echo "Error".$polaczenie->connect_errno." Opis: ".$polaczenie->connect_error;

                            }else {
                                $sql="SELECT marki.nazwa as marka,modele.nazwa as model,przebieg,rok_produkcji,cena,przebieg,stan,opis FrOM pojazdy INNER JOIN modele on pojazdy.id_modelu=modele.id INNER JOIN marki on modele.id_marki=marki.id  WHERE  pojazdy.id=$zmienna_pobrana";
                                $wynik=$polaczenie->query($sql) ;
                                while ($r=$wynik->fetch_assoc()){
                                  echo "<strong>".$r['marka'] . " " . $r['model']."</strong>";
                                echo<<<END
                        </h2>
                         <h3 class="h3-responsive text-center text-md-left mb-5 ml-xl-0 ml-4">
                                <span class="red-text font-weight-bold">
                                    <strong>
END;
                                    echo $r['cena'] . " zł ";
echo<<<END
                                    </strong>
                                </span>
                         </h3>
                         <p class="ml-xl-0 ml-4">
END;
                                    echo $r['opis'] . "";

echo<<<END
                        </p>
                        <p class="ml-xl-0 ml-4">
                            <strong>Rok:</strong>
END;
                                     echo $r['rok_produkcji'];
echo<<<END
                        </p>
                         <p class="ml-xl-0 ml-4">
                            <strong>Przebieg: </strong>
END;
                                    echo $r['przebieg'] . " km ";
       echo<<<END
                        </p>
                        <p class="ml-xl-0 ml-4">
                            <strong>Stan: </strong>
END;
                                    echo $r['stan'] . " ";
echo" </p>";
                                }
                                $polaczenie->close();
                            }
                            ?>
                            <?php echo"<form action=\"podsumowanie.php?id_produktu=".$zmienna_pobrana."\" method=\"post\">"?>
                        <p class="ml-xl-0 ml-4">
                            <strong>Kolor:</strong>
                            <select name="colors"><?php
                                require_once "../php/connect.php";
                                $polaczenie = @new mysqli($servername, $username, $password, $dbname);
                                if($polaczenie->connect_errno!=0){
                                    echo "Error".$polaczenie->connect_errno." Opis: ".$polaczenie->connect_error;
                                }else{
                                    $sql="SELECT nazwa as nazwa1 FROM kolory";
                                    if($wynik= @$polaczenie->query($sql)){
                                        $sprawdz=$wynik->num_rows;
                                 if($sprawdz > 0)
                                 {
                                     $ink=1;
                                     while($r = $wynik->fetch_assoc()) {
                                 echo"<option value=\"".$ink."\">".$r['nazwa1']."</option>";
                                 $ink++;
                                     }
                                 }else{
                                     echo "It Works";
                                 }
                                    }
                                    $polaczenie->close();
                                }

?>

                            </select> </p>
                            <p class="ml-xl-0 ml-4">
                                <strong>Silnik:</strong>
                                <select name="engines">
                                    <?php
                                require_once "../php/connect.php";
                                $polaczenie = @new mysqli($servername, $username, $password, $dbname);
                                if($polaczenie->connect_errno!=0){
                                    echo "Error".$polaczenie->connect_errno." Opis: ".$polaczenie->connect_error;
                                }else{
                                    $sql="SELECT nazwa as nazwa1 FROM silniki";
                                    if($wynik= @$polaczenie->query($sql)){
                                        $sprawdz=$wynik->num_rows;
                                 if($sprawdz > 0)
                                 {
                                     $ink=1;
                                     while($r = $wynik->fetch_assoc()) {
                                 echo"<option value=\"".$ink."\">".$r['nazwa1']."</option>";
                                 $ink++;
                                     }
                                 }else{
                                     echo "It Works";
                                 }
                                    }
                                    $polaczenie->close();
                                }
                                ?></select> </p>


                                <div class="row mt-3 mb-4 text-center">


                                    <form action="podsumowanie.php" method="post"  class="col-md-12 text-center text-md-left text-md-right">

                                        <div class="form-group ml-3">
                                            <strong>Pesel: <input type="text"   name="pesel" class="form-control" id="pesel" size="40"></strong>

                                        </div>
                                            <div class="form-group ml-3">
                                                <strong>Kod dostępu:</strong>
                                            <input type="text"  name="kod_indeks" class="form-control" id="kod_indeks" size="40">
                                            </div>
                                        <div class="col-10">
                                            <?php
                                            require_once "../php/connect.php";
                                            $polaczenie = @new mysqli($servername, $username, $password, $dbname);
                                            if($polaczenie->connect_errno!=0){
                                                echo "Error".$polaczenie->connect_errno." Opis: ".$polaczenie->connect_error;
                                            }else {
                                                $sql = "SELECT czy_sprzedano FROM pojazdy where id=$zmienna_pobrana";
                                                if ($wynik = @$polaczenie->query($sql)) {
                                                    while ($r = $wynik->fetch_assoc()) {
                                                        $test=$r['czy_sprzedano'];
                                                        if ($test==0) {
                                                            echo"<strong>Samochod został sprzedany.</strong>";
                                                        } else {
                                                            echo " <div class=\"text-center\">
                                        <button  class=\"btn btn-primary btn-rounded form-group\" type=\"submit\">
                                            <i class=\"\" aria-hidden=\"true\" ></i>Kup</button>
                                        </div>";
                                                        }

                                                    }

                                                }
                                                $polaczenie->close();
                                            }
                                            ?>



                                          </div>

                                    </form>





                                    </div>

                                </div>


                        <!-- Add to Cart -->

                    </div>

                </div>

            </div>
            <!-- News card -->


        </section>

        <div class="row">
            <div class="col-12">
                <div  class="text-center">

                    <a href="sklep.php"><button class="btn btn-primary btn-rounded ">
                            <i class="" aria-hidden="true"></i>Powrót do sklepu</button>
                    </a>
                </div>
            </div>
        </div>




        <!-- Section: product details -->
        <h4 class="h4-responsive dark-grey-text font-weight-bold mb-5 text-center">

            <strong>kompatybilne Silniki</strong>

        </h4>

        <!-- Table -->
        <div class="card mb-3 mr-5 ml-5 text-center">

            <div class="card-body">

                <table class="table ">
                    <thead>
                    <tr>
                        <th><strong>Warianty</strong></th>

                        <th><strong>nazwa silnika</strong></th>

                        <th><strong>typ silnika</strong></th>

                        <th><strong>moc silnika</strong></th>

                        <th><strong>pojemność silnika</strong></th>

                    </tr>
                    </thead>

                    <tbody>


                         <?php


require_once "../php/connect.php";

    $polaczenie = @new mysqli($servername, $username, $password, $dbname);

    if($polaczenie->connect_errno!=0){
    echo "Error".$polaczenie->connect_errno." Opis: ".$polaczenie->connect_error;

    }else{
        $sql1="SELECT * From silniki";
        $wynik1=@$polaczenie->query($sql1);
        $ilosc=$wynik1->num_rows;
        $zmienna=1;

       while($zmienna<=$ilosc){
            $sql2="SELECT * From silniki where id=$zmienna";
        if($wynik= @$polaczenie->query($sql2)){


                $wiersz=$wynik->fetch_assoc();


                    echo "<tr>";
                    echo "<td scope=\"row\">".$wiersz['id']."</td>";
                    echo "<td >".$wiersz['nazwa']." </td>";
                    echo "<td >".$wiersz['typ_silnika']." </td>";
                    echo "<td >".$wiersz['moc_silnika']." km</td>";
                    echo "<td >".$wiersz['pojemnosc_silnika']." cm^3</td>";



                    echo "</tr>";


                    $zmienna++;

        }else{

        }

       }

    }

    $polaczenie->close();


    ?>




                    </tbody>

                </table>

            </div>

        </div>



    </div>



    <!-- Fourth Container -->


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
