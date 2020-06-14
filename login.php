<?php include("inc/header.inc.php"); ?>
<?php require_once("inc/data.inc.php"); ?>

<!-- inner banner -->
<div class="inner-banner-w3ls py-5">
  <div class="container py-xl-5 py-lg-3">
    <!-- login  -->

    <?php
    //Partie sur le systeme de login
    require('config.php');
    if (!empty($_POST)) {
      $result = $pdo->query("SELECT * FROM utilisateur");
      while($admin = $result->fetch(PDO::FETCH_ASSOC)){
        if ($admin["email"] === $_POST["email"] && $admin["mdp"] === $_POST["mdp"]) {
          $_SESSION["email"] = $admin["email"];
          $_SESSION["connect"] = 1;
          header("location:index.php");
        }
      }
      if (!isset($_SESSION["email"])){
        $_SESSION["connect"] = 2;
      }
      } ?>

    <div class="modal-body my-5 pt-4">
      <h3 class="title-w3 mb-5 text-center text-wh font-weight-bold">
        Se connecter
      </h3>

      <form class="box" action="" method="post" name="login">
        <div class="form-group">
          <label class="col-form-label">Email</label>
          <input type="text" class="form-control" placeholder="loremipsum@email.com" name="email" />
        </div>
        <div class="form-group">
          <label class="col-form-label">Mot de passe</label>
          <input type="password" class="form-control" placeholder="*****" name="mdp" />
        </div>
        <?php
          if (isset($_SESSION["connect"]) and $_SESSION["connect"] == 2){ ?>
            <div class="errorlog">email ou mot de passe incorrect !</div>
          <?php } ?>
        <button type="submit" class="btn button-style-w3">Connexion</button>
        <div class="row sub-w3l mt-3 mb-5">
            <a href="#" class="text-li text-style-w3ls">Mot de passe oublié ?</a>
        </div>
        <p class="text-center dont-do text-style-w3ls text-li">
          Vous n'avez pas de compte ?
          <a href="register.php" class="font-weight-bold text-li">
            S'enregistrer</a>
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