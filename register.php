<?php include("inc/header.inc.php"); ?>

<!-- inner banner -->
<div class="inner-banner-w3ls py-5" id="home">
  <div class="container py-xl-5 py-lg-3">
    <!-- register  -->
    <?php
    require('config.php');
    if (isset($_REQUEST['prenom'], $_REQUEST['nom'], $_REQUEST['email'], $_REQUEST['mdp'])) {
      //requéte SQL
      $query = "INSERT into utilisateur (prenom, nom, email, mdp)
              VALUES ('$_POST[prenom]', '$_POST[nom]', '$_POST[email]', '$_POST[mdp]')";
      // Exécuter la requête sur la base de données
      $res = mysqli_query($conn, $query);
      if ($res) {
        echo "<div class='sucess'>
             <h3 id=\"textewhite\">Vous êtes inscrit avec succès.</h3>
             <p>Cliquez ici pour vous <a href='login.php'>connecter</a></p>
       </div>";
      }
    } else {
    ?>
      <div class="modal-body mt-md-2 mt-5">
        <h3 class="title-w3 mb-5 text-center text-wh font-weight-bold">
          Register Now
        </h3>
        <form action="" method="post">
          <div class="form-group">
            <label class="col-form-label">Prenom</label>
            <input type="text" class="form-control" placeholder="prenom" name="prenom" required="" />
          </div>
          <div class="form-group">
            <label class="col-form-label">Nom</label>
            <input type="text" class="form-control" placeholder="nom" name="nom" required="" />
          </div>
          <div class="form-group">
            <label class="col-form-label">Email</label>
            <input type="email" class="form-control" placeholder="loremipsum@email.com" name="email" required="" />
          </div>
          <div class="form-group">
            <label class="col-form-label">Password</label>
            <input type="password" class="form-control" placeholder="*****" name="mdp" required="" />
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