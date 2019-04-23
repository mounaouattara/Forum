<?php require "includes/header.php";
                if(isset($_POST['submit'])){
                    $mdp = $_POST['mdp'];
                    $repeatmdp = sha1($_POST['repeatmdp']);
                    $login = (htmlentities(trim($_POST['login'])));
                    $email = (htmlentities(trim($_POST['email'])));
                    $tel = (int)(htmlentities(trim($_POST['tel'])));
                    $age = (int)(htmlentities(trim($_POST['age'])));
                    $pays = (htmlentities(trim($_POST['pays'])));
                    $autre = (htmlentities(trim($_POST['autre'])));

                    if ($mdp == $repeatmdp){

                        $bdd = new PDO('mysql:host=localhost;dbname=forumofi', 'root', '');

                    }
                    $query = $bdd->query("INSERT INTO users (mdp,login,email,tel,age,pays,autre) 
                        VALUES (
                            '$mdp',
                            '$login',
                            '$email',
                            '$tel',
                            '$age',
                            '$pays',
                            '$autre')
                        ");

                    if($query){
                        echo "Inscription terminée, <a href='../login.php'>connectez-vous</a>";
                    }

                    else echo "Les deux mots de passe ne sont pas identiques";
                }


?>

<div class="corpsforum">
<div align="center" style="margin-top: 100px;">

        <fieldset style="height: 350px; width: 800px;">
                  <legend style="color: white;"><strong>Inscription</strong></legend>
                    <form method="post" action="#" enctype="multipart/form-data" style="margin-top: 50px; margin-left: 0; margin-right: 0;">
                    <p>

                        <label for="login">Votre pseudo :</label>

                        <input type="text" name="login" id="login" placeholder="Ex : toto" size="30" maxlength="20" required /><br />

                      <label for="mdp">Votre mot de passe :</label>

                        <input type="password" name="mdp" id="mdp" placeholder="Ex : 14sqidn&" size="30" maxlength="20"  value="<?php if (isset($_POST['valider'])){echo $_POST['mdp'];} ?>" required/><br/>

                        <label for="repeatmdp">Répétez votre mot de passe :</label>

                        <input type="repeatmdp" name="repeatmdp" id="repeatmdp" placeholder="Ex : 14sqidn&" size="30" maxlength="20" value="<?php if (isset($_POST['valider'])){echo $_POST['repeatmdp'];} ?>" required/><br/>

                        <label for="email">Email :</label>

                        <input type="email" name="email" id="email" placeholder="Ex : pdn@gamil.com" required/><br/>

                        <label for="tel">Téléphone :</label>

                        <input type="tel" name="tel" id="tel" placeholder="Ex : 0605386236" required/><br />

                        <label for="age">Votre âge :</label>

                        <input type="range" min="18" max="120" name="age" id="age" required/><br/>

                        <label for="pays">Pays :</label>

                         <select name="pays" id="pays"required>
                        <optgroup label="">
                            <option value=""></option>
                        </optgroup>
                        <optgroup label="EUROPE">
                            <option value="France">France</option>
                            <option value="Royaume-Unie">Royaume-Unie</option>
                            <option value="Allemagne">Allemagne</option>
                            <option value="Belgique">Belgique</option>
                            <option value="Espagne">Espagne</option>
                            <option value="Italie">Italie</option>
                            <option value="Suède">Suède</option>
                            <option value="Finlande">Finlande</option>
                            <option value="Pologne">Pologne</option>
                            <option value="Russie">Russie</option>
                            <option value="Turquie">Turquie</option>
                        </optgroup>
                        <optgroup label="AFRIQUE">
                            <option value="Maroc">Maroc</option>
                            <option value="Algérie">Algérie</option>
                            <option value="Tunisie">Tunisie</option>
                            <option value="Lybie">Lybie</option>
                            <option value="Egypte">Egypte</option>
                            <option value="Mali">Mali</option>
                            <option value="Somalie">Somalie</option>
                            <option value="Afrique du Sud">Afrique du Sud</option>
                            <option value="République démocratique du Congo">République démocratique du Congo</option>
                            <option value="Ethiopie">Ethiopie</option>
                            <option value="Ouganda">Ouganda</option>
                            <option value="Nigéria">Nigéria</option>
                            <option value="Kénya">Kénya</option>
                            <option value="Cameroun">Cameroun</option>
                        </optgroup>
                        <optgroup label="Asie">
                            <option value="Chine">Chine</option>
                            <option value="Inde">Inde</option>
                            <option value="Japon">Japon</option>
                            <option value="Taïwan">Taïwan</option>
                            <option value="Philipines">Philipines</option>
                            <option value="Sri Lanka">Sri Lanka</option>
                            <option value="Malaisie">Malaisie</option>
                            <option value="Laos">Laos</option>
                            <option value="Thaïlande">Thaïlande</option>
                            <option value="Cambodge">Cambodge</option>
                            <option value="Singapour">Singapour</option>
                            <option value="Vietnam">Vietnam</option>
                        </optgroup>
                        <optgroup label="Moyen-Orient">
                            <option value="Arabie Saoudite">Arabie Saoudite</option>
                            <option value="Yémen">Yémen</option>
                            <option value="Oman">Oman</option>
                            <option value="Qatar">Qatar</option>
                            <option value="Emirates Arabe Unie">Emirates Arabe Unie</option>
                            <option value="Koweit">Koweit</option>
                            <option value="Syrie">Syrie</option>
                            <option value="Palestine">Palestine</option>
                            <option value="Iran">Iran</option>
                        </optgroup>
                        <optgroup label="Amérique">
                            <option value="Canada">Canada</option>
                            <option value="Etats-Unis">Etats-Unis</option>
                            <option value="Méxique">Méxique</option>
                            <option value="Cuba">Cuba</option>
                            <option value="Venezuela">Venezuela</option>
                            <option value="Colombie">Colombie</option>
                            <option value="Chilie">Chilie</option>
                            <option value="Pérou">Pérou</option>
                            <option value="Bolivie">Bolivie</option>
                            <option value="Suriname">Suriname</option>
                            <option value="Brésil">Brésil</option>
                            <option value="Paraguay">Paraguay</option>
                            <option value="Uruguay">Uruguay</option>
                        </optgroup>
                        <label for="autre">Autre :</label>
                       <input type="autre" name="autre" id="autre" placeholder="Autre"/>
                       </select><br/>

                        <input type="submit" name="submit" value="Envoyer"/>

                       </p>
                </form>
        </fieldset>

</div>
</div>

<?php
require("includes/footer.php");
?>
