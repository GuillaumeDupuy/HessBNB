<?php
    include("inc/header.inc.php");
    require('config.php');
    $result = $pdo->query("SELECT * FROM annonce WHERE Id_annonce = '$_GET[annonce]'");
    $annonce = $result->fetch(PDO::FETCH_OBJ);
    if (!empty($_POST)){
        if ($_POST["nbr_personne"] >= $annonce->nbr_place){
            $message = "Il y a trop de personnes pour cette réservation";
        }
        else if ($_POST["date_deb"] > $_POST["date_fin"]){
            $message= "Vous devez choisi une date de fin valide";
        }
        else{
            $message="";
            $date_reserv = date("Y-m-d");
            $result_add = $pdo->exec("INSERT INTO reservation (nbr_personne, Id_annonce, date_deb, date_fin, date_reserv)
            VALUES ('$_POST[nbr_personne]', '$annonce->Id_annonce', '$_POST[date_deb]', '$_POST[date_fin]', '$date_reserv')");
            $result_id = $pdo->query("SELECT max(Id_reserv) FROM reservation");
            $id_reservation = $result_id->fetch(PDO::FETCH_OBJ);
            //var_dump($id_reservation);
            /*$result_modif = $pdo->exec("UPDATE utilisateur SET 
            Id_reserv = '$id_reservation'
            WHERE email = '$_SESSION[email]' ");*/
        }
    }
?>
<script>
var img = ["images/<?php echo $annonce->photos1 ?>", "images/<?php echo $annonce->photos2 ?>", "images/<?php echo $annonce->photos3 ?>"];
var num = 0;

function suivant() {
    var caroussel = document.getElementById("caroussel");
    num++;
    if(num >= img.length) {
        num = 0;
    }
    caroussel.src = img[num];
}

function precedent() {
    var caroussel = document.getElementById("caroussel");
    num--;
    if(num < 0) {
        num = img.length-1;
    }
    caroussel.src = img[num];
}
</script>
        <section class="contain">
            <div class="carousel slide">
                <img id=caroussel class="img_slide" src="images/<?php echo $annonce->photos1 ?>" alt="Carrousel slide" >
                <a class="carousel-control-prev" href="#" onclick="precedent()" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
              </a>
              <a class="carousel-control-next" href="#" onclick="suivant()" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
              </a>
            </div>
            <form class="" method="POST" action="">
                <div class="information">
                    <h1 class="titre"><?php echo $annonce->titre ?></h1>
                    <p class=" description"> <?php echo $annonce->description ?></p>
                    <div>
                        <label for="nbr_personne" >Nombre de personnes( <?php echo $annonce->nbr_place ?> max )</label>
                        <input type="text" name="nbr_personne"> 
                        <p>Prix par personne par nuit : <?php echo $annonce->prix, "€" ?>
                    </div>
                    <div class="lieux">
                        <h2 class="titre">Lieux</h3>
                        <p>Adresse : <?php echo $annonce->adresse ?></p>
                        <p>Ville : <?php echo $annonce->ville," ", $annonce->code_postal ?></p>
                        <p>Région : <?php echo $annonce->region ?></p>
                    </div>
                    <div class="date">
                        <label for="start">Choisissez vos dates: </label>
                        <input type="date" name="date_deb" min="<?php echo $annonce->date_deb ?>" max="<?php echo $annonce->date_fin ?>">
                        <input type="date" name="date_fin" min="<?php echo $annonce->date_deb ?>" max="<?php echo $annonce->date_fin ?>">
                    </div>
                </div>
                <?php 
                    if (!empty($message)){?>
                        <p style="color:red;"> <?php echo $message ?></p>

                    <?php } ?>
                <button type="submit" class="btn btn-primary btn-lg btn-block button_reserv">Réservation</button> 
            </form>
        </section>
    </body>
</html>