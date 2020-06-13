<?php include("inc/header.inc.php"); ?>
<?php require_once("inc/data.inc.php"); ?>

<!-- inner banner -->
<div class="inner-banner-w3ls py-5">
  <div class="container py-xl-5 py-lg-3">
    <!-- login  -->

    <?php
    //Partie sur le systeme de login
    require('config.php');
    $result = $pdo->query("SELECT * FROM utilisateur");
    $admin = $result->fetch(PDO::FETCH_ASSOC);
    if (!empty($_POST)) {
      if ($admin["email"] === $_POST["email"] && $admin["mdp"] === $_POST["mdp"]) {
        $_SESSION["email"] = $admin["email"];
        $_SESSION["connect"] = 1;
      }
    } ?>

    <div class="modal-body my-5 pt-4">
      <h3 class="title-w3 mb-5 text-center text-wh font-weight-bold">
        Login Now
      </h3>

      <form class="box" action="" method="post" name="login">
        <div class="form-group">
          <label class="col-form-label">Email</label>
          <input type="text" class="form-control" placeholder="loremipsum@email.com" name="email" />
        </div>
        <div class="form-group">
          <label class="col-form-label">Password</label>
          <input type="password" class="form-control" placeholder="*****" name="mdp" />
        </div>
        <button type="submit" class="btn button-style-w3">Connexion</button>
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
          <a href="register.php" class="font-weight-bold text-li">
            Register Now</a>
        </p>
        <?php if (!empty($message)) { ?>
          <p class="errorMessage"><?php echo $message; ?></p>
        <?php } ?>
      </form>

    </div>
    <!-- //login -->
  </div>
</div>
<!-- //inner banner -->

<?php include("inc/footer.inc.php"); ?>