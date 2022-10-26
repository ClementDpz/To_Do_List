<?php

$id = $_POST["id"];

//Connexion à la base de donnée
try {
    $db = new PDO('mysql:host=localhost;dbname=to_do_list;charset=utf8', 'root', 'root');
} catch (Exception $e) {
    die('Erreur de connexion à la base de donnée : ' . $e->getMessage());
}

//Vérification pour savoir si la tâche existe
$checkRequest = $db->prepare("SELECT * FROM tasks WHERE taskid = :taskid");
$checkRequest->execute([
    'taskid' => $id
]);
$checkResult = $checkRequest->fetchAll();

if (count($checkResult) != 1) {
    echo "La tâche n'existe pas";
} else {
    //Suppression dans la base de donnée
    $deleteTaskRequest = $db->prepare("DELETE FROM tasks WHERE taskid = :taskid");

    $deleteTaskRequest->execute([
        'taskid' => $id
    ]);
}

?>
