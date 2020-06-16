
<?php 
    include("inc/header.inc.php");
    require('config.php');
    function write($filename) { //essaie de stockage d'une image
        /**
         * Charger le fichier
         */
        if (!file_exists($filename)) {
            throw new Exception("File $filename not found !!!");
        }
        $fp      = fopen($filename, 'r');
        $data = fread($fp, filesize($filename));
        $buf = addslashes($data);
        fclose($fp);

        return $buf;
    }
    
    // if (isset($_POST['img1']) )
    // {
    //     $_POST['img1'] = write($_POST["img1"]);
    // }
    if (!empty($_POST)) {
        //Pour remettre l'image en première si il y en avait pas
        if ($_POST["img2"] != "" and $_POST["img1"] == ""){
            $img_change = "img1";
            $img_del = "img2";
        }
        if ($_POST["img3"] != "" and $_POST["img1"] == ""){
            $img_change = "img1";
            $img_del = "img3";
        }
        else if ($_POST["img3"] != "" and $_POST["img2"] == ""){
            $img_change = "img2";
            $img_del = "img3";
        }
        if (isset($img_change) and isset($img_del)){
            $_POST[$img_change] = $_POST[$img_del];
            $_POST[$img_del] = "";
        }
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
        $_POST["img1"] = htmlentities($_POST["img1"], ENT_QUOTES);
        $_POST["img2"] = htmlentities($_POST["img2"], ENT_QUOTES);
        $_POST["img3"] = htmlentities($_POST["img3"], ENT_QUOTES);
        $result_add = $pdo->exec("INSERT INTO annonce (titre, description, adresse, ville, code_postal, departement, region, date_deb, date_fin, prix, nbr_place, photos1, photos2, photos3)
        VALUES ('$_POST[titre]', '$_POST[description]', '$_POST[adresse]', '$_POST[ville]', '$_POST[code_postal]', '$_POST[departement]', '$_POST[region]', '$_POST[date_deb]', '$_POST[date_fin]', '$_POST[prix]', '$_POST[nbr_place]', '$_POST[img1]', '$_POST[img2]', '$_POST[img3]')");
        
}
    ?>
    <br><br><br><br>
    <div class="container"> 
        <div class="container_ann">
            <?php
            //$result = $pdo->query("SELECT * FROM annonce INNER JOIN utilisateur on utilisateur.Id_annonce = annonce.Id_annonce");
            $result = $pdo->query("SELECT * FROM annonce");
            while ($annonce = $result->fetch(PDO::FETCH_OBJ)) {?>
                <div class="card" style="width: 18rem;">
                    <img src="images/<?php echo $annonce->photos1 ?>" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $annonce->titre ?></h5>
                        <p class="card-text"><?php echo $annonce->description ?></p>
                        <a href="les_annonces.php?annonce=<?php echo $annonce->Id_annonce?>" class="btn btn-primary">Voir l'annonce</a>
                    </div>
                </div>
                <hr class="hr_ann">
            <?php } ?>
        </div>
    </div>
    <div class="container"> 
            <h1>Ajouter une annonce</h1> 
            <form class="form_ann"method="POST" action="">
                <div class="form-group" enctype="multipart/form-data">
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
                <input type="file" name="img1" size=50 />
                <input type="file" name="img2" size=50 />
                <input type="file" name="img3" size=50 />
                <div class="form-group">
                    <button type="submit" class="btn btn-primary form-control">Enregistrer</button>
                </div>
            </form>
        </div>
    </body>
    <?php include("inc/footer.inc.php"); ?>
</html>
