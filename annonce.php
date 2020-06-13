
<?php 
    include("inc/header.inc.php");
    require('config.php');
    if (!empty($_POST)) {
        $_POST["titre"] = htmlentities($_POST["titre"], ENT_QUOTES);
        $_POST["description"] = htmlentities($_POST["description"], ENT_QUOTES);
        $_POST["adresse"] = htmlentities($_POST["adresse"], ENT_QUOTES);
        $_POST["ville"] = htmlentities($_POST["ville"], ENT_QUOTES);
        $_POST["code_postal"] = htmlentities($_POST["code_postal"], ENT_QUOTES);
        $_POST["departement"] = htmlentities($_POST["departement"], ENT_QUOTES);
        $_POST["region"] = htmlentities($_POST["region"], ENT_QUOTES);
        $_POST["date_deb"] = htmlentities($_POST["date_deb"], ENT_QUOTES);
        $_POST["date_fin"] = htmlentities($_POST["date_fin"], ENT_QUOTES);
        $_POST["prix"] = htmlentities($_POST["prix"], ENT_QUOTES);
        $_POST["nbr_place"] = htmlentities($_POST["nbr_place"], ENT_QUOTES);
        $_POST["photos"] = htmlentities($_POST["photos"], ENT_QUOTES);
        $result_add = $pdo->exec("INSERT INTO annonce (titre, description, adresse, ville, code_postal, departement, region, date_deb, date_fin, prix, nbr_place, photos)
        VALUES ('$_POST[titre]', '$_POST[description]', '$_POST[adresse]', '$_POST[ville]', '$_POST[code_postal]', '$_POST[departement]', '$_POST[region]', '$_POST[date_deb]', '$_POST[date_fin]', '$_POST[prix]', '$_POST[nbr_place]', '$_POST[photos]')");
    }
    ?>
    <div class="container container_ann"> 
        <?php
            //$result = $pdo->query("SELECT * FROM annonce INNER JOIN utilisateur on utilisateur.Id_annonce = annonce.Id_annonce");
            $result = $pdo->query("SELECT * FROM annonce");
            while ($annonce = $result->fetch(PDO::FETCH_OBJ)) {?>
                <div class="card" style="width: 18rem;">
                    <img src=<?php $annonce->titre ?> class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $annonce->titre ?></h5>
                        <p class="card-text"><?php echo $annonce->description ?></p>
                        <a href="?annonce=<?php echo $annonce->Id_annonce?>" class="btn btn-primary">Voir l'annonce</a>
                    </div>
                </div>
                <hr class="hr_ann">
            <?php } ?>
        </div>
    <div>
    <div class="container"> 
            <h1>Ajouter une annonce</h1> 
            <form class="form_ann"method="POST" action="">
               <!-- <select class="form-control" onchange =changerCatego(this.value)>
                    <option <?php // if($_GET['catego'] == 'experiences') { ?> selected <?php// } ?>value="experiences">Expériences</option>
                    <option <?php // if($_GET['catego'] == 'formations') { ?> selected <?php// } ?> value="formations">Formations</option>
                    <option <?php // if($_GET['catego'] == 'competences') { ?> selected <?php// } ?> value="competences">Compétences</option>
                    <option <?php // if($_GET['catego'] == 'portfolios') { ?> selected <?php// } ?> value="portfolios">Portfolio</option>
                </select> -->
                <div class="form-group">
                    <label for="titre">Titre :</label>
                    <input type="texte" class="form-control" id="titre" name="titre">
                </div>
                <div class="form-group">
                    <label for="description">Description :</label>
                    <textarea rows="2" class="form-control" id="description" name="description"></textarea>
                </div>
                <div class="form-group">
                    <label for="adresse">Adresse :</label>
                    <input type="texte" class="form-control" id="adresse" name="adresse">
                </div>
                <div class="form-group">
                    <label for="ville">Ville :</label>
                    <input type="texte" class="form-control" id="ville" name="ville">
                </div>
                <div class="form-group">
                    <label for="code_postal">Code postal :</label>
                    <input type="texte" class="form-control" id="code_postal" name="code_postal">
                </div>
                <div class="form-group">
                    <label for="departement">Département :</label>
                    <input type="texte" class="form-control" id="departement" name="departement">
                </div>
                <div class="form-group">
                    <label for="region">Région :</label>
                    <input type="texte" class="form-control" id="region" name="region">
                </div>
                <div class="form-group">
                    <label for="date_deb">Date de début de disponiblité</label>
                    <input type="date" class="form-control" id="date_deb" name="date_deb">
                </div>
                <div class="form-group">
                    <label for="date_fin">Date de fin de disponibilité</label>
                    <input type="date" class="form-control" id="date_fin" name="date_fin">
                </div>
                <div class="form-group">
                    <label for="prix">Prix par nuit :</label>
                    <input type="texte" class="form-control" id="prix" name="prix">
                </div>
                <div class="form-group">
                    <label for="nbr_place">Nombre de places disponible :</label>
                    <input type="texte" class="form-control" id="nbr_place" name="nbr_place">
                </div>
                <div class="form-group">
                    <label for="photos">Photos : </label>
                    <!--<input type="file" class="form-control-file" id="photos" name="photos[]"> -->
                    <input type="text" class="form-control" id="photos" name="photos">
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary form-control">Enregistrer</button>
                </div>
            </form>
        </div>
    </body>
    <?php include("inc/footer.inc.php"); ?>
</html>
