<?php
                if(isset($_POST['mdp'])){
                $password = (htmlentities(trim($_POST['mdp'])));
                $repeatpassword = (htmlentities(trim($_POST['repeatmdp'])));
                $login = (htmlentities(trim($_POST['login'])));
                $email = (htmlentities(trim($_POST['email'])));
                $tel = (int)(htmlentities(trim($_POST['tel'])));
                $age = (int)(htmlentities(trim($_POST['age'])));
                $pays = (htmlentities(trim($_POST['pays'])));
                $autre = (htmlentities(trim($_POST['autre'])));

                if ($password == $repeatpassword){

                        $bdd = new PDO('mysql:host=localhost;dbname=forumofi', 'root', '');

                }
                        $query = $bdd->query("INSERT INTO register ('pseudo', 'mdp', 'email', 'tel', 'age', 'pays', 'autre') 
                        VALUES (
                            '$password',
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

                    }
                else echo "Les deux mots de passe ne sont pas identiques";

?>