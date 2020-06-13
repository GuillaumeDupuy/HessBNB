<?php 
include("inc/header.inc.php"); 
require('config.php');

//$result = $pdo->query("SELECT * FROM reservation INNER JOIN annonce on annonce.Id_annonce = reservation.Id_annonce");
$reserv = $result->fetch(PDO::FETCH_ASSOC);?>
<div class="container"> 
    <?php
        foreach ($card as $reserv){?>
        <div class="card" style="width: 18rem;">
            <img src=<?php $card->titre ?> class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title"><?php echo $card->titre ?></h5>
                <p class="card-text"><?php echo $card->description ?></p>
                <a href="?annonce=<?php echo $card->Id_annonce?>" class="btn btn-primary">Voir l'annonce</a>
            </div>
        </div>
        <hr class="hr_ann">
        <?php } ?>
    </div>





