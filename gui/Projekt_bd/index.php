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
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <!-- Material Design Bootstrap -->
  <link href="css/mdb.min.css" rel="stylesheet">
  <link href="css/style.css" rel="stylesheet">
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
    alert("Wiadomość została wysłana dziękujemy!");
    }
  </script>
</head>

<body class="salon-lp">

  <!-- Navigation & Intro -->
  <header>
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top scrolling-navbar wow fadeIn" data-wow-delay="0.15s">
      <div class="container">
        <a class="navbar-brand font-weight-bold title" href="#">Strona główna</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02"
                aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
          <ul class="list-unstyled navbar-nav mr-auto smooth-scroll">
            <li class="nav-item">
              <a class="nav-link" href="#uslugi" data-offset="90">Usługi</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#salon" data-offset="90">Salon</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#kontakt" data-offset="90">Kontakt</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#opis" data-offset="90">Informacje</a>
            </li>

            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Marki
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="html/amery.html">Amerykańskie</a>
                <a class="dropdown-item" href="html/japon.html">Japońskie</a>
                <a class="dropdown-item" href="html/euro.html">Europejskie</a>
              </div>
            </li>

          </ul>
          <ul class="navbar-nav dropdown smooth-scroll">
            <li class="nav-item">
              <a href="https://www.facebook.com/" target="_blank" class="nav-link"><i class="fab fa-facebook-f"></i></a>
            </li>
              <li class="nav-item">
                  <a class="nav-link" href="php/adminlog.php" data-offset="90">Admin</a>
              </li>
            <li class="nav-item">
              <a class="nav-link" href="shop/sklep.php" data-offset="90">Sklep</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="php/rejestracja.php" data-offset="90">Rejestracja</a>
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
                <h1 class="display-4 text-uppercase font-weight-bold mt-5 mt-xl-2">Aysta</h1>
                <hr class="hr-light my-4">
                <h2 class="subtext-header font-weight-bold amber-text mb-3">Salon samochodowy sprzedający nowe i używane samochody.
                  <p class="clearfix d-none d-md-block">Znajdziesz u nas samochody osobowe, sportowe, muscle.</p>
                  <p class="clearfix d-none d-md-block">Dbamy o każdego klienta w naszym salonie.</p>
                </h2>
              </div>

            </div>
          </div>
        </div>
      </div>
    </div>


  </header>
  <!-- Navigation & Intro -->

  <!-- Main content -->
  <main>

    <div class="container">

      <!-- Section: Features -->
      <section id="uslugi" class="mb-3 mt-5 pt-4 pb-3">

        <!-- Section heading -->
        <h3 class="text-center text-uppercase font-weight-bold mb-5 mt-4 wow fadeIn" data-wow-delay="0.2s">Usługi</h3>

        <!-- Section description -->
        <h4><p class="text-center black-text my-5 w-responsive mx-auto wow fadeIn" data-wow-delay="0.2s">W naszym salonie możesz, zakupić nowy samochód Twoich marzeń, samochody używane z pierwszej ręki,
          gotowa rejestracja dokonana przez nas, bądź nie szukać godnego serwisu dla Twojego samochodu. Serwis naszego salonu zajmię się wszystkim za Ciebie.</p></h4>

        <!-- Grid row -->
        <div class="row text-center">

          <!-- Grid column -->
          <div class="col-md-3 mb-1 mt-1 wow fadeIn" data-wow-delay="0.4s">
            <i class="fas fa-car orange-text-2 fa-4x mb-4"></i>
            <h4 class="font-weight-bold mb-4">Samochody Nowe</h4>
            <h5><p class="black-text">Samochody, które dopiero wyjechały z fabryki.</p></h5>
          </div>
          <!-- Grid column -->

          <!-- Grid column -->
          <div class="col-md-3 mb-1 mt-1 wow fadeIn" data-wow-delay="0.4s">
            <i class="fas fa-car orange-text-2 fa-4x mb-4"></i>
            <h4 class="font-weight-bold mb-4">Samochody Używane</h4>
            <h5> <p class="black-text">Samochody w dobrym stanie bez wielkich uszczerbków i w atrakcyjnej cenie</p></h5>
          </div>
          <!-- Grid column -->

          <!-- Grid column -->
          <div class="col-md-3 mb-1 mt-1 wow fadeIn" data-wow-delay="0.4s">
            <i class="fas fa-registered orange-text-2 fa-4x mb-4"></i>
            <h4 class="font-weight-bold mb-4">Rejestracja</h4>
            <h5><p class="black-text">Rejestracja Twojego samochodu za pomocą profesjonalnego programu.</p></h5>
          </div>
          <!-- Grid column -->
          <div class="col-md-3 mb-1 mt-1 wow fadeIn" data-wow-delay="0.4s">
            <i class="fas fa-phone orange-text-2 fa-4x mb-4"></i>
            <h4 class="font-weight-bold mb-4">Serwisowanie</h4>
            <h5> <p class="black-text">Brak potrzeby szukania idealnego serwisu dla konkretniej marki.Nasz serwis zrobi wszystko.</p></h5>
          </div>
          <!-- Grid column -->

        </div>
        <!-- Grid row -->

      </section>
      <!-- Section: Features -->




    </div>

    <!-- First Streak -->
    <div class="streak streak-photo streak-long-1"
         style="background-image:url('img/streak_fotos/streak_3.jpg')">
      <div class="mask flex-center rgba-black-strong">
        <div class="container">

          <h3 class="text-center text-white mb-5 text-uppercase font-weight-bold wow fadeIn" data-wow-delay="0.2s">Wiele osób już nam zaufało.</h3>

          <!--First row-->
          <div class="row text-white text-center wow fadeIn" data-wow-delay="0.2s">


          </div>
          <!--/First row-->
        </div>
      </div>
    </div>
    <!-- First Streak -->

    <!-- Fourth Container -->
    <div class="container">
       <!-- Section: Portfolio -->
      <section id="salon" class="mb-3">

        <!-- Section heading -->
        <h3 class="text-center text-uppercase font-weight-bold mb-5 mt-5 pt-5 wow fadeIn" data-wow-delay="0.2s">Nasz Salon</h3>

        <!-- Section description -->
        <h5><p class="text-center black-text my-5 w-responsive mx-auto wow fadeIn" data-wow-delay="0.2s">Wyśmnienita obsługa gotowa na Wasze pytania.
        <br /> W naszym salonie znajdzie zawsze coś dla siebie. Od Marek Amerykańskich, Europejskich po Japońskie.
		</p></h5>


      </section>
      <!-- Section: Portfolio -->

    </div>

    <div class="container-fluid">

      <div class="row mb-5 wow fadeIn" data-wow-delay="0.4s">

        <!-- Grid column -->
        <div class="col-md-12 mb-5">

          <div id="mdb-lightbox-ui"></div>

          <!-- Full width lightbox -->
          <div class="mdb-lightbox">

            <figure class="col-md-3">
              <a href="#" data-size="1600x1067">
                <img src="img/salon/salon1.jpg"
                  class="img-fluid z-depth-1">
              </a>
            </figure>

            <figure class="col-md-3">
              <a href="#" data-size="1600x1067">
                <img src="img/salon/salon2.jpg"
                     class="img-fluid z-depth-1">
              </a>
            </figure>

            <figure class="col-md-3">
              <a href="#" data-size="1600x1067">
                <img src="img/salon/salon3.jpg"
                     class="img-fluid z-depth-1">
              </a>
            </figure>
            <figure class="col-md-3">
              <a href="#" data-size="1600x1067">
                <img src="img/salon/salon4.jpg"
                     class="img-fluid z-depth-1">
              </a>
            </figure>

            <figure class="col-md-3">
              <a href="#" data-size="1600x1067">
                <img src="img/salon/salon5.jpg"
                     class="img-fluid z-depth-1">
              </a>
            </figure>

            <figure class="col-md-3">
              <a href="#" data-size="1600x1067">
                <img src="img/salon/salon6.jpg"
                     class="img-fluid z-depth-1">
              </a>
            </figure>

            <figure class="col-md-3">
              <a href="#" data-size="1600x1067">
                <img src="img/salon/salon7.jpg"
                     class="img-fluid z-depth-1">
              </a>
            </figure>

            <figure class="col-md-3">
              <a href="#" data-size="1600x1067">
                <img src="img/salon/salon8.jpg"
                     class="img-fluid z-depth-1">
              </a>
            </figure>
          </div>
          <!-- Full width lightbox -->

        </div>
        <!-- Grid column -->

      </div>

    </div>

    <!-- Fourth Container -->

    <!--  Second Streak -->

    <div class="streak streak-photo streak-long-1"
      style="background-image:url('img/streak_fotos/streak_2.png')">
      <div class="mask flex-center rgba-black-strong">
        <div class="container">

          <h3 class="text-center text-white mb-5 text-uppercase font-weight-bold wow fadeIn" data-wow-delay="0.2s">Wiele pozytywnie zakończonych transakcji.</h3>

          <!--First row-->
          <div class="row text-white text-center wow fadeIn" data-wow-delay="0.2s">


          </div>
          <!--/First row-->
        </div>
      </div>
    </div>
    <!--  Second Streak -->

    <!-- Fifth container -->
    <div class="container">

      <!-- Section: Contact v.2 -->
      <section id="kontakt" class="mb-5">

        <!-- Section heading -->
        <h3 class="text-center text-uppercase font-weight-bold mb-5 mt-4 pt-5 wow fadeIn" data-wow-delay="0.2s">Skontaktuj się</h3>

        <!-- Section description -->
        <h5><p class="text-center black-text my-5 w-responsive mx-auto wow fadeIn" data-wow-delay="0.2s">Odpowiemy na Twoje pytania.</p></h5>

        <!-- Grid row -->
        <div class="row wow fadeIn" data-wow-delay="0.4s">

          <!-- Grid column -->
          <div class="col-md-8 col-lg-9">
            <form action="php/kontakt.php" method="POST">

              <div class="row">
                <div class="col-md-6">
                  <div class="md-form">
                    <div class="md-form">
                      <input type="text" id="form41" class="form-control" name="imie">
                      <label for="form41" class="">Imię</label>
                    </div>
                  </div>
                </div>

                <!-- Grid column -->
                <div class="col-md-6">
                  <div class="md-form">
                    <div class="md-form">
                      <input type="text" id="form52" class="form-control" name="mail">
                      <label for="form52" class="text-black">E-mail</label>
                    </div>
                  </div>
                </div>
              </div>
              <!-- Grid row -->

              <!-- Second row -->
              <div class="row">
                <div class="col-md-12">
                  <div class="md-form">
                    <input type="text" id="form51" class="form-control" name="temat">
                    <label for="form51" class="">Temat</label>
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col-md-12">
                  <div class="md-form">
                    <textarea type="text" id="form76" class="md-textarea form-control" rows="3" name="wiadomosc"></textarea>
                    <label for="form76">Wiadomość</label>
                  </div>
                </div>
              </div>


            <div class="text-center text-md-left mb-5 mt-4">
              <button type="submit" class="btn btn-rounded btn-orange-2 white-text" onclick="pop()">Wyślij</button>
            </div>
            </form>
          </div>
          <!-- Grid column -->

          <!-- Grid column -->
          <div class="col-md-4 col-lg-3">
            <ul class="text-center list-unstyled float-md-right">
              <li><i class="fas fa-map-marker-alt fa-2x"></i>
                <p>Rzeszow, 25 Rejtana</p>
              </li>

              <li><i class="fas fa-phone fa-2x"></i>
                <p>+48 123 123 123 </p>
              </li>

              <li><i class="fas fa-envelope fa-2x"></i>
                <p>krzysztof453vip@gmail.com</p>
              </li>
            </ul>
          </div>
          <!-- Grid column -->

        </div>

      </section>


    </div>
    <!-- Fifth container -->


    <!-- Third Streak -->
    <div class="streak streak-photo streak-long-1"
         style="background-image:url('img/streak_fotos/streak_1.jpg')">
      <div class="mask flex-center rgba-black-strong">
        <div class="container">

          <h3 class="text-center text-white mb-5 text-uppercase font-weight-bold wow fadeIn" data-wow-delay="0.2s">Dołacz do naszych klientów już dziś.</h3>

          <!--First row-->
          <div class="row text-white text-center wow fadeIn" data-wow-delay="0.2s">


          </div>
          <!--/First row-->
        </div>
      </div>
    </div>
    <!-- Third Streak -->


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
