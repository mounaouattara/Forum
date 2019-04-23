<?php
$link=new PDO_connect('localhost','root','');

if(!$link) {
	die('non connecté: '.new PDO_error());
}
$bdd_selected = new PDO_select_bdd('inscription forum','$link');

if (!$bdd_selected) {
	die('base inaccessible: '.new PDO_error());
}
?>