<!DOCTYPE html>
<html lang="zxx">

<head>
  <title>
    Airhess
  </title>
  <!-- Meta tag Keywords -->
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <meta charset="UTF-8" />
  <meta name="keywords" content="AirHess" />
  <script>
    addEventListener(
      "load",
      function() {
        setTimeout(hideURLbar, 0);
      },
      false
    );

    function hideURLbar() {
      window.scrollTo(0, 1);
    }
  </script>
  <!-- //Meta tag Keywords -->

  <!-- Custom-Files -->
  <link href="css/bootstrap.css" rel="stylesheet" type="text/css" />
  <!-- Bootstrap-Core-CSS -->
  <link href="css/style.css" rel="stylesheet" type="text/css" />
  <!-- Style-CSS -->
  <link href="css/font-awesome.min.css" rel="stylesheet" />
  <!-- Font-Awesome-Icons-CSS -->
  <!-- JS -->
  <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
  <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <!-- Web-Fonts -->
  <link href="//fonts.googleapis.com/css?family=Roboto+Condensed:300,300i,400,400i,700,700i&amp;subset=cyrillic,cyrillic-ext,greek,greek-ext,latin-ext,vietnamese" rel="stylesheet" />
  <link href="//fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i&amp;subset=cyrillic,cyrillic-ext,greek,greek-ext,latin-ext,vietnamese" rel="stylesheet" />
  <!-- //Web-Fonts -->
</head>

<body>
  <!-- header -->
  <header>
    <div class="container">
      <div class="header d-lg-flex justify-content-between align-items-center py-2 px-sm-2 px-1">
        <!-- logo -->
        <div id="logo">
          <h1>
            <a href="index.php"><span class="text-bl">Air</span>Hess</a>
          </h1>
        </div>
        <!-- //logo -->
        <!-- nav -->
        <div class="nav_w3ls ml-lg-5">
          <nav>
            <label for="drop" class="toggle">Menu</label>
            <input type="checkbox" id="drop" />
            <ul class="menu">
              <li><a href="index.php">Accueil</a></li>
              <li><a href="annonce.php">Annonces</a></li>
              <li>
                <!-- First Tier Drop Down -->
                <label for="drop-2" class="toggle toogle-2">Pages
                  <span class="fa fa-angle-down" aria-hidden="true"></span>
                </label>
                <a href="index.php">Pages
                  <span class="fa fa-angle-down" aria-hidden="true"></span></a>
                <input type="checkbox" id="drop-2" />
                <ul>
                  <li><a href="#about" class="drop-text">About Us</a></li>
                  <li><a href="#services" class="drop-text">Services</a></li>
                </ul>
              </li>

              <li><a href="index.php#contact">Contact Us</a></li>
              <li><a href="login.php">Login</a></li>
              <li><a href="register.php">Register</a></li>


              <li><a href="profil.php">Profil</a></li>

              <!-- <li> 
                <ul>
                  <li>
                    <?php /*
                    if (!empty($_SESSION)) {
                      if ($_SESSION['connect'] == 1) { ?>
                  <li><a href="profil.php">Profil</a></li>
              <?php  }
                    } */ ?>
              </li> -->

            </ul>
          </nav>
        </div>
        <!-- //nav -->
      </div>
    </div>
  </header>
  <!-- //header -->