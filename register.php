<?php include("inc/header.inc.php"); ?>

<!-- inner banner -->
<div class="inner-banner-w3ls py-5" id="home">
  <div class="container py-xl-5 py-lg-3">
    <!-- register  -->
    <?php
    require('config.php');
    if (isset($_REQUEST['prenom'], $_REQUEST['nom'], $_REQUEST['email'], $_REQUEST['mpd'])) {
      // récupérer le nom d'utilisateur et supprimer les antislashes ajoutés par le formulaire
      $prenom = stripslashes($_REQUEST['prenom']);
      $prenom = mysqli_real_escape_string($conn, $prenom);
      $nom = stripslashes($_REQUEST['nom']);
      $nom = mysqli_real_escape_string($conn, $nom);
      // récupérer l'email et supprimer les antislashes ajoutés par le formulaire
      $email = stripslashes($_REQUEST['email']);
      $email = mysqli_real_escape_string($conn, $email);
      // récupérer le mot de passe et supprimer les antislashes ajoutés par le formulaire
      $mpd = stripslashes($_REQUEST['mpd']);
      $mpd = mysqli_real_escape_string($conn, $mpd);
      //requéte SQL + mot de passe crypté
      $query = "INSERT into `utilisateur` (prenom, nom, email, mpd)
              VALUES ('$prenom', '$nom', '$email', '" . hash('sha256', $mpd) . "')";
      // Exécuter la requête sur la base de données
      $res = mysqli_query($conn, $query);
      if ($res) {
        echo "<div class='sucess'>
             <h3>Vous êtes inscrit avec succès.</h3>
             <p>Cliquez ici pour vous <a href='login.php'>connecter</a></p>
       </div>";
      }
    } else {
    ?>
      <div class="modal-body mt-md-2 mt-5">
        <h3 class="title-w3 mb-5 text-center text-wh font-weight-bold">
          Register Now
        </h3>
        <form action="#" method="post">
          <div class="form-group">
            <label class="col-form-label">Prenom</label>
            <input type="text" class="form-control" placeholder="prenom" name="Name" required="" />
          </div>
          <div class="form-group">
            <label class="col-form-label">Nom</label>
            <input type="text" class="form-control" placeholder="nom" name="Name" required="" />
          </div>
          <div class="form-group">
            <label class="col-form-label">Email</label>
            <input type="email" class="form-control" placeholder="loremipsum@email.com" name="email" required="" />
          </div>
          <div class="form-group">
            <label class="col-form-label">Password</label>
            <input type="password" class="form-control" placeholder="*****" name="mpd" required="" />
          </div>
          <div class="form-group">
            <label class="col-form-label">Confirm Password</label>
            <input type="password" class="form-control" placeholder="*****" name="mpd" required="" />
          </div>
          <div class="sub-w3l my-3">
            <div class="sub-w3layouts_hub">
              <input type="checkbox" id="brand1" value="" />
              <label for="brand1" class="text-li text-style-w3ls">
                <span></span>I Accept to the Terms & Conditions</label>
            </div>
          </div>
          <button type="submit" class="btn button-style-w3">Register</button>
        </form>
      </div>
    <?php } ?>
    <!-- //register -->
  </div>
</div>
<!-- //inner banner -->

<?php include("inc/footer.inc.php"); ?>