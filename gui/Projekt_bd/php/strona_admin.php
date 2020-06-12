
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
            height: 20%;

        }

    </style>
</head>

<body class="salon-lp">

<!-- Navigation & Intro -->
<header>
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top bg-dark wow fadeIn" data-wow-delay="0.15s">
        <div class="container">
            <a class="navbar-brand font-weight-bold title" href="#">Tabele Admin</a>
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
                            <a class="dropdown-item" href="#">Amerykańskie</a>
                            <a class="dropdown-item" href="japon.html">Japońskie</a>
                            <a class="dropdown-item" href="euro.html">Europejskie</a>
                        </div>
                    </li>

                </ul>
                <ul class="navbar-nav dropdown smooth-scroll">
                    <li class="nav-item">
                        <a href="https://www.facebook.com/" target="_blank" class="nav-link"><i class="fab fa-facebook-f"></i></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../index.php" data-offset="90">Strona Główna</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../shop/sklep.php" data-offset="90">Sklep</a>
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

<!-- Main content -->
<main>
    <!-- Fourth Container -->
    <div class="container">
        <!-- Section: Portfolio -->
        <section id="salon" class="mb-3">
            <h3 class="text-center text-uppercase font-weight-bold mb-5 mt-5 pt-5 wow fadeIn" data-wow-delay="0.2s">Tabele </h3>

                <div class="row text-center fo">
                    <div class="col-1"><h4><a href="strona_admin.php?id_tabeli=1">Marki</a></h4></div>
                    <div class="col-1"><h4><a href="strona_admin.php?id_tabeli=2">Modele</a></h4></div>
                    <div class="col-1"><h4><a href="strona_admin.php?id_tabeli=3">Kolory</a></h4></div>
                    <div class="col-1"><h4><a href="strona_admin.php?id_tabeli=9">Historia</a></h4></div>

                    <div class="col-1"><h4><a href="strona_admin.php?id_tabeli=8">Silniki</a></h4></div>

                    <div class="col-1"><h4><a href="strona_admin.php?id_tabeli=5">Klient</a></h4></div>
                    <div class="col-1"><h4><a href="strona_admin.php?id_tabeli=4">Kontakt</a></h4></div>
                    <div class="col-1"><h4><a href="strona_admin.php?id_tabeli=6">Pojazdy</a></h4></div>


                    <div class="col-1"><h4><a href="strona_admin.php?id_tabeli=10">Serwis</a></h4></div>
                    <div class="col-2"><h4><a href="strona_admin.php?id_tabeli=11">Rejestracje</a></h4></div>
                    <div class="col-1"><h4><a href="strona_admin.php?id_tabeli=7">Transakcje</a></h4></div>
                </div>
            <!-- Section description -->
        </section>
        <!-- Section: Portfolio -->
    </div>

    <div class="container-fluid">

        <?php
        $var_check=@$_GET['id_tabeli'];

        require_once "../php/connect.php";

        $conn=oci_connect($username,$password,$name);
        if(!$conn){
            echo "nie";
        }else {

            switch ($var_check){
                //Marki
                case 1:
  echo<<<END
    <div class="card mb-3 mr-5 ml-5 text-center">

            <div class="card-body">

                <table class="table">
                    <thead>
                    <tr>
                        <th><strong>Marka</strong></th>
                        <th><strong>Dodaj Marke</strong></th>
                    </tr>
                    </thead>

                    <tbody>
END;
                    $sql = "SELECT id_marki as var1 from marki order  by id_marki desc fetch next 1 rows only";
                    $stid = oci_parse($conn, $sql);
                    oci_execute($stid);
                    $row = oci_fetch_array($stid, OCI_ASSOC);
                    $var2 = $row['VAR1'];
                    $var1=1;
                    oci_free_statement($stid);
                    do{
                        $sql ="SELECT nazwa as NAZWA1 from marki where id_marki=$var1";
                        $stid = oci_parse($conn, $sql);
                        oci_execute($stid);
                        $row = oci_fetch_array($stid, OCI_ASSOC);
                        @$checking = $row['NAZWA1'];
                        oci_free_statement($stid);
                        if($checking==""){
                            $var1++;

                        }else{

                            $sql = 'begin p_wysw_marki (:bind1,:bind2); end;';
                            $stid = oci_parse($conn, $sql);
                            oci_bind_by_name($stid, ':bind1', $var1, 2);
                            oci_bind_by_name($stid, ':bind2', $name1, 20);

                            oci_execute($stid);
                            echo "<tr>";
                            echo"<td>".$name1."</td>";
                            echo "<td><a href='../inserts/tabela_marki/insert_marki.php'>Dodaj</a></td>";
                            echo "</tr>";
                            oci_free_statement($stid);
                            $var1++;
                        }


                    }while($var1<=$var2);
                    oci_close($conn);

                    echo<<<END
        </tbody>

        </table>

    </div>

    </div>
END;
                    break;
                 //Modele
                case 2:
                    echo<<<END
    <div class="card mb-3 mr-5 ml-5 text-center">

            <div class="card-body">

                <table class="table">
                    <thead>
                    <tr>
                        <th><strong>Marka</strong></th>
                        <th><strong>Model</strong></th>

                        <th><strong>Dodaj Model</strong></th>
                    </tr>
                    </thead>

                    <tbody>
END;
                    $sql = "SELECT id_modelu as var1 from modele order  by id_modelu desc fetch next 1 rows only";
                    $stid = oci_parse($conn, $sql);
                    oci_execute($stid);
                    $row = oci_fetch_array($stid, OCI_ASSOC);
                    $var2 = $row['VAR1'];
                    $var1=1;
                    oci_free_statement($stid);
                    do{
                        $sql ="SELECT id_marki as NAZWA2,id_modelu as NAZWA1 from modele where id_modelu=$var1";
                        $stid = oci_parse($conn, $sql);
                        oci_execute($stid);
                        $row = oci_fetch_array($stid, OCI_ASSOC);
                        @$checking = $row['NAZWA1'];
                        @$checking2 = $row['NAZWA2'];
                        oci_free_statement($stid);
                        if(($checking=="")||($checking2=="")){
                            $var1++;

                        }else {
                            $sql = 'begin p_wysw_modele (:bind1,:bind2,:bind3); end;';
                            $stid = oci_parse($conn, $sql);
                            oci_bind_by_name($stid, ':bind1', $var1, 2);
                            oci_bind_by_name($stid, ':bind2', $name1, 100);
                            oci_bind_by_name($stid, ':bind3', $name2, 100);
                            @oci_execute($stid);
                            @oci_free_statement($stid);
                            echo "<tr>";
                            echo "<td>" . $name2 . "</td>";
                            echo "<td>" . $name1 . "</td>";

                            echo "<td><a href='../inserts/tabela_modele/insert_modele.php'>Dodaj</a></td>";
                            echo "</tr>";
                            $var1++;
                        }
                    }while($var1<=$var2);
                    oci_close($conn);

                    echo<<<END
        </tbody>

        </table>

    </div>

    </div>
END;

                    break;
                  //Kolory
                case 3:
                    echo<<<END
    <div class="card mb-3 mr-5 ml-5 text-center">

            <div class="card-body">

                <table class="table">
                    <thead>
                    <tr>
                        <th><strong>Kolor</strong></th>
                        <th><strong>Dodaj Kolor</strong></th>
                    </tr>
                    </thead>

                    <tbody>
END;



                    $sql = "SELECT id_koloru as var1 from kolory order  by id_koloru desc fetch next 1 rows only";
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
                        echo "<tr>";
                        echo"<td>".$name1."</td>";
                        echo "<td><a href='../inserts/tabela_kolory/insert_kolory.php'>Dodaj</a></td>";
                        echo "</tr>";
                        $var1++;
                    }while($var1<=$var2);
                    oci_close($conn);



                    echo<<<END
        </tbody>

        </table>

    </div>

    </div>
END;

                    break;
                    //Kontakt
                case 4:
                    echo<<<END
    <div class="card mb-3 mr-5 ml-5 text-center">

            <div class="card-body">

                <table class="table">
                    <thead>
                    <tr>
                        <th><strong>Imie Kontaktu </strong></th>
                        <th><strong>E-mail Kontaktu</strong></th>
                        <th><strong>Temat Kontaktu</strong></th>
                        <th><strong>Wiadomosc Kontaktu</strong></th>
                       
                    </tr>
                    </thead>

                    <tbody>
END;



                    $sql = "SELECT id_kontaktu as var1 from kontakty order  by id_kontaktu desc fetch next 1 rows only";
                    @$stid = oci_parse($conn, $sql);
                    @oci_execute($stid);
                    @$row = oci_fetch_array($stid, OCI_ASSOC);
                    @$var2 = $row['VAR1'];
                    $var1=1;
                    @oci_free_statement($stid);
                    do{

                            $sql = 'begin p_wysw_kontakt (:bind1,:bind2,:bind3,:bind4,:bind5); end;';
                            $stid = oci_parse($conn, $sql);
                            oci_bind_by_name($stid, ':bind1', $var1, 2);
                            oci_bind_by_name($stid, ':bind2', $name1, 100);
                            oci_bind_by_name($stid, ':bind3', $name2, 100);
                            oci_bind_by_name($stid, ':bind4', $name3, 100);
                            oci_bind_by_name($stid, ':bind5', $name4, 100);
                            @oci_execute($stid);
                            @oci_free_statement($stid);
                            echo "<tr>";
                            echo "<td>" . $name1 . "</td>";
                            echo "<td>" . $name2 . "</td>";
                            echo "<td>" . $name3 . "</td>";
                            echo "<td>" . $name4 . "</td>";
                            echo "</tr>";
                            $var1++;

                    }while($var1<=$var2);
                    oci_close($conn);




                    echo<<<END
        </tbody>

        </table>

    </div>

    </div>
END;

                    break;
                    //Klient
                case 5:

                    echo<<<END
    <div class="card mb-3 mr-5 ml-5 text-center">

            <div class="card-body">

                <table class="table">
                    <thead>
                    <tr>
                        <th><strong>Imie Klienta </strong></th>
                        <th><strong>Nazwisko Klienta</strong></th>
                        <th><strong>Pesel Klienta</strong></th>
                        <th><strong>Miasto Klienta</strong></th>
                        <th><strong>Telefon Klienta</strong></th>
                        <th><strong>Kod_dostepu Klienta</strong></th>
                        <th><strong>E-Mail Klienta</strong></th>
                  <th><strong>Dodaj Klienta</strong></th>
                    </tr>
                    </thead>

                    <tbody>
END;



                    $sql = "SELECT id_klienta as var1 from klient order  by id_klienta desc fetch next 1 rows only";
                    @$stid = oci_parse($conn, $sql);
                    @oci_execute($stid);
                    @$row = oci_fetch_array($stid, OCI_ASSOC);
                    @$var2 = $row['VAR1'];
                    $var1=1;
                    @oci_free_statement($stid);
                    do{
                        $sql = 'begin p_wysw_klient (:bind1,:bind2,:bind3,:bind4,:bind5,:bind6,:bind7,:bind8); end;';
                        $stid = oci_parse($conn, $sql);
                        oci_bind_by_name($stid, ':bind1', $var1, 2);
                        oci_bind_by_name($stid, ':bind2', $name1, 100);
                        oci_bind_by_name($stid, ':bind3', $name2, 100);
                        oci_bind_by_name($stid, ':bind4', $name3, 100);
                        oci_bind_by_name($stid, ':bind5', $name4, 100);
                        oci_bind_by_name($stid, ':bind6', $name5, 100);
                        oci_bind_by_name($stid, ':bind7', $name6, 100);
                        oci_bind_by_name($stid, ':bind8', $name7, 100);
                        oci_execute($stid);
                        oci_free_statement($stid);
                        echo "<tr>";
                        echo"<td>".$name1."</td>";
                        echo"<td>".$name2."</td>";
                        echo"<td>".$name3."</td>";
                        echo"<td>".$name4."</td>";
                        echo"<td>".$name5."</td>";
                        echo"<td>".$name6."</td>";
                        echo"<td>".$name7."</td>";

                        echo "<td><a href='../inserts/tabela_klient/insert_klient.php'>Dodaj</a></td>";
                        echo "</tr>";
                        $var1++;
                    }while($var1<=$var2);
                    oci_close($conn);


                    echo<<<END
        </tbody>

        </table>

    </div>

    </div>
END;
                    break;
                    //Pojazdy
                case 6:
                    echo<<<END
    <div class="card mb-3 mr-5 ml-5 text-center">

            <div class="card-body">

                <table class="table">
                    <thead>
                    <tr>
                        <th><strong>Pojazd </strong></th>
                        <th><strong>Silnik</strong></th>
                        <th><strong>Kolor</strong></th>
                        <th><strong>Rok produkcji</strong></th>
                        <th><strong>Cena</strong></th>
                        <th><strong>Przebieg</strong></th>
                        <th><strong>Stan</strong></th>
                        <th><strong>Opis</strong></th>
                        <th><strong>Stan w salonie</strong></th>


                        <th><strong>Dodaj Pojazd</strong></th>
                    </tr>
                    </thead>

                    <tbody>
END;



                    $sql = "SELECT id_pojazdu as var1 from pojazdy order  by id_pojazdu desc fetch next 1 rows only";
                    @$stid = oci_parse($conn, $sql);
                    @oci_execute($stid);
                    @$row = oci_fetch_array($stid, OCI_ASSOC);
                    @$var2 = $row['VAR1'];
                    $var1=1;
                    @oci_free_statement($stid);
                    do{
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
                       @oci_execute($stid);
                        oci_free_statement($stid);
                        echo "<tr>";
                        echo"<td>".$name1." ".$name2."</td>";
                        echo"<td>".$name3."</td>";
                        echo"<td>".$name4."</td>";
                        echo"<td>".$name5."</td>";
                        echo"<td>".$name6."</td>";
                        echo"<td>".$name7."</td>";
                        echo"<td>".$name8."</td>";
                        echo"<td>".$name9."</td>";
                        echo"<td>".$name10."</td>";

                        echo "<td><a href='../inserts/tabela_pojazdy/insert_pojazdy.php'>Dodaj</a></td>";
                        echo "</tr>";
                        $var1++;
                    }while($var1<=$var2);
                    oci_close($conn);
                    echo<<<END
        </tbody>

        </table>

    </div>

    </div>
END;

                    break;
                    //Transakcje
                case 7:
                    echo<<<END
    <div class="card mb-3 mr-5 ml-5 text-center">

            <div class="card-body">

                <table class="table">
                    <thead>
                    <tr>
                        <th><strong>Pojazd </strong></th>        
                        <th><strong>Cena </strong></th>
                        <th><strong>Kwota wpłacona</strong></th>
                        <th><strong>Data i status zakupu</strong></th>
                        <th><strong>Imie i nazwisko</strong></th>
                        <th><strong>email</strong></th>
                       
                    </tr>
                    </thead>

                    <tbody>
END;



                    $sql = "SELECT id_transakcji as var1 from transakcje order  by id_transakcji desc fetch next 1 rows only";
                    @$stid = oci_parse($conn, $sql);
                    @oci_execute($stid);
                    @$row = oci_fetch_array($stid, OCI_ASSOC);
                    @$var2 = $row['VAR1'];
                    $var1=1;
                    @oci_free_statement($stid);
                    do{
                        $sql = 'begin p_wysw_transakcje (:bind1,:bind2,:bind3,:bind4,:bind5,:bind6,:bind7,:bind8,:bind9,:bind10,:bind11,:bind12); end;';
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
                        oci_bind_by_name($stid, ':bind12', $name11, 100);


                        @oci_execute($stid);
                        @oci_free_statement($stid);
                        echo "<tr>";
                        echo"<td>".$name1." ".$name2." ".$name3." ".$name4."</td>";

                        echo"<td>".$name5." zł</td>";
                        echo"<td>".$name6." zł</td>";
                        echo"<td>".$name7." ".$name8."</td>";
                        echo"<td>".$name9." ".$name10."</td>";
                        echo"<td>".$name11."</td>";
                        echo "</tr>";
                        $var1++;
                    }while($var1<=$var2);
                    oci_close($conn);
                    echo<<<END
        </tbody>

        </table>

    </div>

    </div>
END;

                    break;
                    //silniki
                case 8:
                    echo<<<END
    <div class="card mb-3 mr-5 ml-5 text-center">

            <div class="card-body">

                <table class="table">
                    <thead>
                    <tr>
                        <th><strong>Nazwa Silnika </strong></th>
                        <th><strong>Typ Silnika</strong></th>
                        <th><strong>Moc Silnika</strong></th>
                        <th><strong>Pojemnosc Silnika</strong></th>

                        <th><strong>Dodaj Silnik</strong></th>
                    </tr>
                    </thead>

                    <tbody>
END;



                    $sql = "SELECT id_silnika as var1 from silniki order  by id_silnika desc fetch next 1 rows only";
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
                        echo "<tr>";
                        echo"<td>".$name1."</td>";
                        echo"<td>".$name2."</td>";
                        echo"<td>".$name3."</td>";
                        echo"<td>".$name4."</td>";

                        echo "<td><a href='../inserts/tabela_silniki/insert_silniki.php'>Dodaj</a></td>";
                        echo "</tr>";
                        $var1++;
                    }while($var1<=$var2);
                    oci_close($conn);

                    echo<<<END
        </tbody>

        </table>

    </div>

    </div>
END;

                    break;
                   //Historia
                case 9:
                    echo<<<END
    <div class="card mb-3 mr-5 ml-5 text-center">

            <div class="card-body">

                <table class="table">
                    <thead>
                    <tr>
                        <th><strong>Pojazd</strong></th>
                        <th><strong>Rejestracja</strong></th>
                        <th><strong>Data Rejestracji</strong></th>
                        <th><strong>Klient</strong></th>
               
                    </tr>
                    </thead>

                    <tbody>
END;



                    $sql = "SELECT id_historii as var1 from historia order  by id_historii desc fetch next 1 rows only";
                    $stid = oci_parse($conn, $sql);
                    oci_execute($stid);
                    $row = oci_fetch_array($stid, OCI_ASSOC);
                    $var2 = $row['VAR1'];
                    $var1=1;
                    oci_free_statement($stid);
                    do{
                        $sql = 'begin p_wysw_historie (:bind1,:bind2,:bind3,:bind4,:bind5,:bind6,:bind7,:bind8); end;';
                        $stid = oci_parse($conn, $sql);
                        oci_bind_by_name($stid, ':bind1', $var1, 2);
                        oci_bind_by_name($stid, ':bind2', $name1, 100);
                        oci_bind_by_name($stid, ':bind3', $name2, 100);
                        oci_bind_by_name($stid, ':bind4', $name3, 100);
                        oci_bind_by_name($stid, ':bind5', $name4, 100);
                        oci_bind_by_name($stid, ':bind6', $name5, 100);
                        oci_bind_by_name($stid, ':bind7', $name6, 100);
                        oci_bind_by_name($stid, ':bind8', $name7, 100);

                        @oci_execute($stid);
                        oci_free_statement($stid);
                        echo "<tr>";
                        echo"<td>".$name1." ".$name2."</td>";
                        echo"<td>".$name3."</td>";
                        echo"<td>".$name4."</td>";
                        echo"<td>".$name5."".$name6." ".$name7."</td>";
                        echo "</tr>";
                        $var1++;
                    }while($var1<=$var2);
                    oci_close($conn);

                    echo<<<END
        </tbody>

        </table>

    </div>

    </div>
END;
                    break;
                    //SERWIS
                case 10:
                    echo<<<END
    <div class="card mb-3 mr-5 ml-5 text-center">

            <div class="card-body">

                <table class="table">
                    <thead>
                    <tr>
                        <th><strong>Pojazd </strong></th>
                        <th><strong>Przebieg</strong></th>
                        <th><strong>opis</strong></th>
                        <th><strong>przyczyna</strong></th>
                        <th><strong>Decyzja</strong></th>
                        <th><strong>Dodaj Serwis</strong></th>
                    </tr>
                    </thead>

                    <tbody>
END;



                    $sql = "SELECT id as var1 from serwis order by id desc fetch next 1 rows only";
                    $stid = oci_parse($conn, $sql);
                    oci_execute($stid);
                    $row = oci_fetch_array($stid, OCI_ASSOC);
                    $var2 = $row['VAR1'];
                    $var1=1;
                    oci_free_statement($stid);
                    do{
                        $sql = 'begin p_wysw_serwis (:bind1,:bind2,:bind3,:bind4,:bind5,:bind6,:bind7,:bind8,:bind9); end;';
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
                        @oci_execute($stid);

                        oci_free_statement($stid);
                        echo "<tr>";
                        echo"<td>".$name1." ".$name2." ".$name3." ".$name4."</td>";
                        echo"<td>".$name5."</td>";
                        echo"<td>".$name6."</td>";
                        echo"<td>".$name7."</td>";
                        echo"<td>".$name8."</td>";


                        echo "<td><a href='../inserts/tabela_serwis/insert_serwis.php'>Dodaj</a></td>";
                        echo "</tr>";
                        $var1++;
                    }while($var1<=$var2);
                    oci_close($conn);

                    echo<<<END
        </tbody>

        </table>

    </div>

    </div>
END;
                    break;
                    //REJESTRACJE
                case 11:
                    echo<<<END
    <div class="card mb-3 mr-5 ml-5 text-center">

            <div class="card-body">

                <table class="table">
                    <thead>
                    <tr>
                        <th><strong>Pojazd </strong></th>
                      
                        <th><strong>Rejestracja</strong></th>

                        <th><strong>Dodaj Rejestracje</strong></th>
                    </tr>
                    </thead>

                    <tbody>
END;



                    $sql = "SELECT id_rejestracji as var1 from rejestracje order  by id_rejestracji desc fetch next 1 rows only";
                    $stid = oci_parse($conn, $sql);
                    oci_execute($stid);
                    $row = oci_fetch_array($stid, OCI_ASSOC);
                    $var2 = $row['VAR1'];
                    $var1=1;
                    oci_free_statement($stid);
                    do{
                        $sql = 'begin p_wysw_rejestracje (:bind1,:bind2,:bind3,:bind4,:bind5,:bind6); end;';
                        $stid = oci_parse($conn, $sql);
                        oci_bind_by_name($stid, ':bind1', $var1, 2);
                        oci_bind_by_name($stid, ':bind2', $name1, 100);
                        oci_bind_by_name($stid, ':bind3', $name2, 100);
                        oci_bind_by_name($stid, ':bind4', $name3, 100);
                        oci_bind_by_name($stid, ':bind5', $name4, 100);
                        oci_bind_by_name($stid, ':bind6', $name5, 100);

                        @oci_execute($stid);
                        oci_free_statement($stid);
                        echo "<tr>";
                        echo"<td>".$name1." " .$name2." ".$name3." ".$name4."</td>";
                        echo"<td>".$name5."</td>";


                        echo "<td><a href='../inserts/tabela_rejestracje/insert_rejestracje.php'>Dodaj</a></td>";
                        echo "</tr>";
                        $var1++;
                    }while($var1<=$var2);
                    oci_close($conn);

                    echo<<<END
        </tbody>

        </table>

    </div>

    </div>
END;
                    break;
                default:
                    oci_close($conn);
                    break;
            }

        }
        ?>



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

