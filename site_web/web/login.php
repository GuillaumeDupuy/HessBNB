<?php include("inc/header.inc.php"); ?>

<!-- inner banner -->
<div class="inner-banner-w3ls py-5" id="home">
  <div class="container py-xl-5 py-lg-3">
    <!-- login  -->

    <?php
    require('config.php');
    session_start();
    if (isset($_POST['email'])) {
      $username = stripslashes($_REQUEST['email']);
      $username = mysqli_real_escape_string($conn, $email);
      $password = stripslashes($_REQUEST['mpd']);
      $password = mysqli_real_escape_string($conn, $mpd);
      $query = "SELECT * FROM `utilisateur` WHERE email='$email' and mpd='" . hash('sha256', $mpd) . "'";
      $result = mysqli_query($conn, $query) or die();
      $rows = mysqli_num_rows($result);
      if ($rows == 1) {
        $_SESSION['email'] = $email;
        header("Location: admin.php ");
      } else {
        $message = "Le nom d'utilisateur ou le mot de passe est incorrect.";
      }
    }
    ?>

    <div class="modal-body my-5 pt-4">
      <h3 class="title-w3 mb-5 text-center text-wh font-weight-bold">
        Login Now
      </h3>
      <form action="" method="post" name="login">
        <div class="form-group">
          <label class="col-form-label">Email</label>
          <input type="text" class="form-control" placeholder="email" name="email" />
        </div>
        <div class="form-group">
          <label class="col-form-label">Password</label>
          <input type="password" class="form-control" placeholder="Mot de passe" name="mpd" />
        </div>
        <button type="submit" class="btn button-style-w3">Login</button>
        <div class="row sub-w3l mt-3 mb-5">
          <div class="col-sm-6 sub-w3layouts_hub">
            <input type="checkbox" id="brand1" value="" />
            <label for="brand1" class="text-li text-style-w3ls">
              <span></span>Remember me?</label>
          </div>
          <div class="col-sm-6 forgot-w3l text-sm-right">
            <a href="#" class="text-li text-style-w3ls">Forgot Password?</a>
          </div>
        </div>
        <p class="text-center dont-do text-style-w3ls text-li">
          Don't have an account?
          <a href="register.html" class="font-weight-bold text-li">
            Register Now</a>
        </p>
      </form>
    </div>
    <!-- //login -->
  </div>
</div>
<!-- //inner banner -->

<?php include("inc/footer.inc.php"); ?>