
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
            <a class="navbar-brand font-weight-bold title" href="#">Rejestracje</a>
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
                            <form method="post" action="insert_rejestracje_do.php">
                                <div class="form-group">
                                    <h4><strong>Pojazd: </strong></h4>
                                    <select name="zmienna1">

                                            <?php
                                            require_once "../../php/connect.php";
                                            $conn=oci_connect($username,$password,$name);
                                            if(!$conn){
                                                echo "nie";
                                            }else {
                                                $sql = "SELECT count(*) as var1 from pojazdy";
                                                $stid = oci_parse($conn, $sql);
                                                oci_execute($stid);
                                                $row = oci_fetch_array($stid, OCI_ASSOC);
                                                $var2 = $row['VAR1'];
                                                $var1 = 1;
                                                oci_free_statement($stid);
                                                do {
                                                    $sql = 'begin p_wysw_pojazdy (:bind1,:bind2,:bind3,:bind4,:bind5,:bind6,:bind7,:bind8,:bind9,:bind10,:bind11); end;';
                                                    $stid = oci_parse($conn, $sql);
                                                    oci_bind_by_name($stid, ':bind1', $var1, 2);
                                                    oci_bind_by_name($stid, ':bind2', $name1, 100);
                                                    oci_bind_by_name($stid, ':bind3', $name2, 100);
                                                    oci_bind_by_name($stid, ':bind4', $name3, 100);
                                                    oci_bind_by_name($stid, ':bind5', $name4, 100);
                                                    oci_bind_by_name($stid, ':bind6', $name5, 100);
                                                    oci_bind_by_name($stid, ':bind7', $name6, 100);
                                                    oci_bind_by_name($stid, ':bind8', $name7, 100);
                                                    oci_bind_by_name($stid, ':bind9', $name8, 100);
                                                    oci_bind_by_name($stid, ':bind10', $name9, 100);
                                                    oci_bind_by_name($stid, ':bind11', $name10, 100);
                                                    oci_execute($stid);
                                                    oci_free_statement($stid);
                                                    echo "<option value=" . $var1 . ">" . $name2 ." ".$name1. " " . $name3 ." ".$name4. "</option>";
                                                    $var1++;
                                                } while ($var1 <= $var2);
                                                oci_close($conn);
                                            }



                                            ?>

                                    </select>

                                </div>

                                <button type="submit" class="btn btn-primary">Wprowadz</button>
                            </form>
                            <?php
                            if(isset($_SESSION['blad_rejestracje'])){
                                echo $_SESSION['blad_rejestracje'];
                                unset($_SESSION['blad_rejestracje']);
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
