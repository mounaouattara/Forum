<?php
    session_start();

        try{
            $bdd = new PDO(
                "mysql:host=localhost; dbname=forumofi", "root", ""
            );
            $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
        catch(Exception $e)
        {
            die("erreur de connection");
        }
?>

<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Forum</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
</head>

        <div class="son">
            <h1>
                <font face="Blackadder ITC" size="10">
                    <object data="audiooo/Dua%20Lipa%20-%20New%20Rules%20(Official%20Music%20Video).mp3">
                          <param name="autoplay" value="true">
                    </object>
                    <em>
                        <u>
                            <span>Mettez le son !</span>
                        </u>
                    </em>
                </font>
            </h1>
            </div>

            <div>
                <center>
                        <div class="banniere">
                            <a href="index.php"><img src="img/presentation1.jpeg" width="900px;"/>
                            </a> </div>

                                    <nav>
                                        <center>
                                            <ul>
                                                    <a href="index.php">Accueil</a>
                                                    <?php
                                                    if(isset($_SESSION['connecte']))
                                                    {}
                                                    else
                                                    {
                                                    ?>
                                                    <a href="register.php">Inscription</a>
                                                        <?php
                                                    }
                                                    ?>
                                                    <a href="calendrier.php">Calendrier</a>
                                                    <a href="faq.php">FAQ</a>
                                                    <a href="membres.php">Membres</a>
                                                    <a href="groupe.php">Groupes</a>
                                                    <?php
                                                    if(isset($_SESSION['connecte']))
                                                    {
                                                    ?>
                                                    <a href="profil.php">Profil</a>
                                                    <a href="messagerie.php">Messagerie</a>
                                                    <a href="logout.php">Logout</a>
                                                    <?php
                                                    }
                                                    else
                                                    {
                                                     ?>
                                                     <a href="login.php">Login</a>
                                                     <?php
                                                    }
                                                    ?>
                                                </ul>
                                        </center>
                                    </nav>
                </center>

            </div>



        
       

        

     
        