<?php

//Connexion à la base de donnée
try {
    $db = new PDO('mysql:host=localhost;dbname=to_do_list;charset=utf8', 'root', 'root');
} catch (Exception $e) {
    die('Erreur de connexion à la base de donnée : ' . $e->getMessage());
}

//Vérification pour savoir si la tâche existe déjà
$checkRequest = $db->prepare("SELECT * FROM tasks");
$checkRequest->execute();
$checkResult = $checkRequest->fetchAll();

echo json_encode($checkResult);

?>
