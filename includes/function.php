<?php
try
{
    $bdd = new PDO('mysql:host=localhost;dbname=forumofi', 'root', '');
}
catch (Exception $e)
{
    die('Erreur : ' . $e->getMessage());
}
?>

<?php

function move_avatar($avatar)

{

    $extension_upload = strtolower(substr(  strrchr($avatar['name'], '.')  ,1));

    $name = time();

    $nomavatar = str_replace(' ','',$name).".".$extension_upload;

    $name = "./img/avatars/".str_replace(' ','',$name).".".$extension_upload;

    move_uploaded_file($avatar['tmp_name'],$name);

    return $nomavatar;

}

?>