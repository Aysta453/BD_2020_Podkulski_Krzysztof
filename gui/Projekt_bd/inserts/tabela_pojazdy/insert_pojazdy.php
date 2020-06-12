
<?php
session_start();
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
    <link href="../../css/bootstrap.min.css" rel="stylesheet">
    <!-- Material Design Bootstrap -->
    <link href="../../css/mdb.min.css" rel="stylesheet">
    <link href="../../css/style.css" rel="stylesheet">
    <style> html,
        body,
        header{
            height: 20%;

        }

    </style>
</head>

<body class="salon-lp tlo">

<!-- Navigation & Intro -->


<!-- Navigation & Intro -->
<header>
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top bg-dark wow fadeIn" data-wow-delay="0.15s">
        <div class="container">
            <a class="navbar-brand font-weight-bold title" href="#">Model</a>
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
                            <a class="dropdown-item" href="../../html/amery.html">Amerykańskie</a>
                            <a class="dropdown-item" href="../../html/japon.html">Japońskie</a>
                            <a class="dropdown-item" href="../../html/euro.html">Europejskie</a>
                        </div>
                    </li>

                </ul>
                <ul class="navbar-nav dropdown smooth-scroll">
                    <li class="nav-item">
                        <a href="https://www.facebook.com/" target="_blank" class="nav-link"><i class="fab fa-facebook-f"></i></a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="../../shop/sklep.php" data-offset="90">Sklep</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../../index.php" data-offset="90">Strona Główna</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>


</header>
<!-- Navigation & Intro -->

<!-- Main content -->
<main>

    <!-- Fourth Container -->
    <div class="container ">
        <div class=" mt-5 h-100 d-flex justify-content-center align-items-center">
            <div class="row smooth-scroll ">
                <div class="col-12 text-center mt-2">
                    <div class="text-black wow fadeInDown">
                        <div class="log pl-5 pb-4 pr-5 pt-2" style="background-color: rgba(255,255,255,0.5);">
                            <form method="post" action="insert_pojazdy_do.php">
                                <div class="form-group">
                                    <h4><strong>Samochod: </strong></h4>
                                    <select name="zmienna1">
                                        <?php
                                        require_once "../../php/connect.php";
                                        $conn=oci_connect($username,$password,$name);
                                        if(!$conn){
                                            echo "nie";
                                        }else {
                                            $sql = "SELECT count(*) as var1 from modele";
                                            $stid = oci_parse($conn, $sql);
                                            oci_execute($stid);
                                            $row = oci_fetch_array($stid, OCI_ASSOC);
                                            $var2 = $row['VAR1'];
                                            $var1 = 1;
                                            oci_free_statement($stid);
                                            do {
                                                $sql = 'begin p_wysw_modele (:bind1,:bind2,:bind3); end;';
                                                $stid = oci_parse($conn, $sql);
                                                oci_bind_by_name($stid, ':bind1', $var1, 2);
                                                oci_bind_by_name($stid, ':bind2', $name1, 100);
                                                oci_bind_by_name($stid, ':bind3', $name2, 100);
                                                oci_execute($stid);
                                                oci_free_statement($stid);
                                                echo "<option value=" . $var1 . ">" . $name2 ." ".$name1. "</option>";
                                                $var1++;
                                            } while ($var1 <= $var2);
                                            oci_close($conn);
                                        }
                                        ?>
                                    </select>

                                </div>
                                <div class="form-group">
                                    <h4><strong>Silnik: </strong></h4>
                                    <select name="zmienna2">
                                        <?php
                                        require_once "../../php/connect.php";
                                        $conn=oci_connect($username,$password,$name);
                                        if(!$conn){
                                            echo "nie";
                                        }else {
                                            $sql = "SELECT count(*) as var1 from silniki";
                                            $stid = oci_parse($conn, $sql);
                                            oci_execute($stid);
                                            $row = oci_fetch_array($stid, OCI_ASSOC);
                                            $var2 = $row['VAR1'];
                                            $var1=1;
                                            oci_free_statement($stid);
                                            do{
                                                $sql = 'begin p_wysw_silniki (:bind1,:bind2,:bind3,:bind4,:bind5); end;';
                                                $stid = oci_parse($conn, $sql);
                                                oci_bind_by_name($stid, ':bind1', $var1, 2);
                                                oci_bind_by_name($stid, ':bind2', $name1, 100);
                                                oci_bind_by_name($stid, ':bind3', $name2, 100);
                                                oci_bind_by_name($stid, ':bind4', $name3, 100);
                                                oci_bind_by_name($stid, ':bind5', $name4, 100);
                                                oci_execute($stid);
                                                oci_free_statement($stid);
                                                echo "<option value=" . $var1 . ">Nazwa " . $name1 ." Typ ".$name2. " Moc ". $name3 ." KM Pojemnosc ".$name4. " cm^3</option>";
                                                $var1++;
                                            }while($var1<=$var2);
                                            oci_close($conn);
                                        }
                                        ?>
                                    </select>

                                </div>
                                <div class="form-group">
                                    <h4><strong>Kolor: </strong></h4>
                                    <select name="zmienna3">
                                        <?php
                                        require_once "../../php/connect.php";
                                        $conn=oci_connect($username,$password,$name);
                                        if(!$conn){
                                            echo "nie";
                                        }else {
                                            $sql = "SELECT count(*) as var1 from kolory";
                                            $stid = oci_parse($conn, $sql);
                                            oci_execute($stid);
                                            $row = oci_fetch_array($stid, OCI_ASSOC);
                                            $var2 = $row['VAR1'];
                                            $var1=1;
                                            oci_free_statement($stid);
                                            do{
                                                $sql = 'begin p_wysw_kolory (:bind1,:bind2); end;';
                                                $stid = oci_parse($conn, $sql);
                                                oci_bind_by_name($stid, ':bind1', $var1, 2);
                                                oci_bind_by_name($stid, ':bind2', $name1, 100);
                                                oci_execute($stid);
                                                oci_free_statement($stid);
                                                echo "<option value=" . $var1 . ">" . $name1 ."</option>";

                                                $var1++;
                                            }while($var1<=$var2);
                                            oci_close($conn);
                                        }
                                        ?>
                                    </select>

                                </div>
                                <div class="form-group">
                                    <h4><strong>Rok: </strong></h4>
                                    <input type="text" name="zmienna4" class="form-control" id="imie">
                                </div>
                                <div class="form-group">
                                    <h4><strong>Cena: </strong></h4>
                                    <input type="text" name="zmienna5" class="form-control" id="imie">
                                </div>
                                <div class="form-group">
                                    <h4><strong>Przebieg: </strong></h4>
                                    <input type="text" name="zmienna6" class="form-control" id="imie">
                                </div>
                                <div class="form-group">
                                    <h4><strong>Stan: </strong></h4>
                                    <input type="text" name="zmienna7" class="form-control" id="imie">
                                </div>
                                <div class="form-group">
                                    <h4><strong>Opis: </strong></h4>
                                    <input type="text" name="zmienna8" class="form-control" id="imie">
                                </div>
                                <div class="form-group">
                                    <h4><strong>Samochod zostal juz sprzedany?</strong></h4>
                                    <select name="zmienna9">
                                        <option value="1">Nie</option>
                                        <option value="0">Tak</option>
                                    </select>

                                </div>

                                <button type="submit" class="btn btn-primary">Wprowadz</button>
                            </form>
                            <?php
                            if(isset($_SESSION['blad_pojazd'])){
                                echo $_SESSION['blad_pojazd'];
                                unset($_SESSION['blad_pojazd']);
                            }
                            ?>
                        </div>
                    </div>

                </div>
            </div>

        </div>
        <div class="row">
            <div class="col-12">
                <div  class="text-center">

                    <a href="../../php/strona_admin.php"><button class="btn btn-primary btn-rounded ">
                            <i class="" aria-hidden="true"></i>Powrót do Tabel</button>
                    </a>
                </div>
            </div>
        </div>

    </div>
    </div>



    </div>




</main>
<!-- Main content -->

<!-- Footer -->
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
