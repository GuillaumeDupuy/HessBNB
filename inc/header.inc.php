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

  <!-- Style-CSS -->
  <link href="css/font-awesome.min.css" rel="stylesheet" />
  <link href="css/responsive.css" rel="stylesheet" type="text/css" />
  <!-- Font-Awesome-Icons-CSS -->
  <!-- JS -->
  <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
  <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <!-- Web-Fonts -->
  <link href="//fonts.googleapis.com/css?family=Roboto+Condensed:300,300i,400,400i,700,700i&amp;subset=cyrillic,cyrillic-ext,greek,greek-ext,latin-ext,vietnamese" rel="stylesheet" />
  <link href="//fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i&amp;subset=cyrillic,cyrillic-ext,greek,greek-ext,latin-ext,vietnamese" rel="stylesheet" />
  <!-- //Web-Fonts -->
  <link href="css/style.css" rel="stylesheet" type="text/css" />
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
              <!-- First Tier Drop Down -->
              <li><a href="index.php#contact">Contactez-nous</a></li>
              <?php
              session_start();
              $_SESSION["connect"] = 0;
              //var_dump($_SESSION);
              if (empty($_SESSION["email"])) { ?>
                <li><a href="login.php">Connexion</a></li>
                <li><a href="register.php">Inscription</a></li>
              <?php } else { ?>
                <li><a href="profil.php">Profil</a></li>
                <li><a href="logout.php">Déconnexion</a></li>
              <?php } ?>
            </ul>
          </nav>
        </div>
        <!-- //nav -->
      </div>
    </div>
  </header>
  <!-- //header -->