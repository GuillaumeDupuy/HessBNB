<?php include("inc/header.inc.php"); ?>
<?php require_once("inc/data.inc.php"); ?>

<br><br><br><br>

<div class="container">
    <div class="row">
        <div class="col-md-3 ">
            <div class="list-group ">
                <a href="profil.php" class="list-group-item list-group-item-action active">Dashboard</a>
                <a href="card.php" class="list-group-item list-group-item-action">Card</a>
                <a href="reservation.php" class="list-group-item list-group-item-action">Mes réservations</a>
                <a href="annonce.php" class="list-group-item list-group-item-action">Mes annonces</a>
            </div>
        </div>
        <div class="col-md-9">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <h4>Your Profile</h4>
                            <hr>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <?php

                            $base_de_donnee = $pdo->query("SELECT * FROM utilisateur ORDER BY id_utilisateur");
                            while ($utilisateur = $base_de_donnee->fetch(PDO::FETCH_OBJ)) { ?>
                                <form>
                                    <div class="form-group row">
                                        <label for="name" class="col-4 col2-form-label">First Name</label>
                                        <div class="col-8">
                                            <input id="name" name="name" placeholder="<?php echo $utilisateur->prenom; ?>" class="form-control here" type="text">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="lastname" class="col-4 col2-form-label">Last Name</label>
                                        <div class="col-8">
                                            <input id="lastname" name="lastname" placeholder="<?php echo $utilisateur->nom; ?>" class="form-control here" type="text">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="email" class="col-4 col2-form-label">Email*</label>
                                        <div class="col-8">
                                            <input id="email" name="email" placeholder="<?php echo $utilisateur->email; ?>" class="form-control here" required="required" type="text">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="timing Zone" class="col-4 col2-form-label">Timing Zone</label>
                                        <div class="col-8">
                                            <select name="DropDownTimezone" id="DropDownTimezone" class="input-xlarge">
                                                <option value="-12.0">(GMT -12:00) Eniwetok, Kwajalein</option>
                                                <option value="-11.0">(GMT -11:00) Midway Island, Samoa</option>
                                                <option value="-10.0">(GMT -10:00) Hawaii</option>
                                                <option value="-9.0">(GMT -9:00) Alaska</option>
                                                <option value="-8.0">(GMT -8:00) Pacific Time (US & Canada)</option>
                                                <option value="-7.0">(GMT -7:00) Mountain Time (US & Canada)</option>
                                                <option value="-6.0">(GMT -6:00) Central Time (US & Canada), Mexico City</option>
                                                <option value="-5.0">(GMT -5:00) Eastern Time (US & Canada), Bogota, Lima</option>
                                                <option value="-4.0">(GMT -4:00) Atlantic Time (Canada), Caracas, La Paz</option>
                                                <option value="-3.5">(GMT -3:30) Newfoundland</option>
                                                <option value="-3.0">(GMT -3:00) Brazil, Buenos Aires, Georgetown</option>
                                                <option value="-2.0">(GMT -2:00) Mid-Atlantic</option>
                                                <option value="-1.0">(GMT -1:00 hour) Azores, Cape Verde Islands</option>
                                                <option selected="selected" value="0.0">(GMT) Western Europe Time, London, Lisbon, Casablanca</option>
                                                <option value="1.0">(GMT +1:00 hour) Brussels, Copenhagen, Madrid, Paris</option>
                                                <option value="2.0">(GMT +2:00) Kaliningrad, South Africa</option>
                                                <option value="3.0">(GMT +3:00) Baghdad, Riyadh, Moscow, St. Petersburg</option>
                                                <option value="3.5">(GMT +3:30) Tehran</option>
                                                <option value="4.0">(GMT +4:00) Abu Dhabi, Muscat, Baku, Tbilisi</option>
                                                <option value="4.5">(GMT +4:30) Kabul</option>
                                                <option value="5.0">(GMT +5:00) Ekaterinburg, Islamabad, Karachi, Tashkent</option>
                                                <option value="5.5">(GMT +5:30) Bombay, Calcutta, Madras, New Delhi</option>
                                                <option value="5.75">(GMT +5:45) Kathmandu</option>
                                                <option value="6.0">(GMT +6:00) Almaty, Dhaka, Colombo</option>
                                                <option value="7.0">(GMT +7:00) Bangkok, Hanoi, Jakarta</option>
                                                <option value="8.0">(GMT +8:00) Beijing, Perth, Singapore, Hong Kong</option>
                                                <option value="9.0">(GMT +9:00) Tokyo, Seoul, Osaka, Sapporo, Yakutsk</option>
                                                <option value="9.5">(GMT +9:30) Adelaide, Darwin</option>
                                                <option value="10.0">(GMT +10:00) Eastern Australia, Guam, Vladivostok</option>
                                                <option value="11.0">(GMT +11:00) Magadan, Solomon Islands, New Caledonia</option>
                                                <option value="12.0">(GMT +12:00) Auckland, Wellington, Fiji, Kamchatka</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="newpass" class="col-4 col2-form-label">New Password</label>
                                        <div class="col-8">
                                            <input id="newpass" name="newpass" placeholder="<?php echo $utilisateur->mdp; ?>" class="form-control here" type="text">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="offset-4 col-8">
                                            <button name="submit" type="submit" class="btn btn-primary">Update My Profile</button>
                                        </div>
                                    </div>
                                </form>
                            <?php } ?>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

<br>

<div class="sucess">
    <a class="logout2" href="logout.php">Déconnexion</a>
    <p class="logout">Voici votre tableau de bord pour voir vos informations.</p>
</div>

<br>

<?php include("inc/footer.inc.php"); ?>