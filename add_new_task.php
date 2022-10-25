<?php

$title = $_POST["title"];
$text = $_POST["text"];

//Connexion à la base de donnée
try {
    $db = new PDO('mysql:host=localhost;dbname=to_do_list;charset=utf8', 'root', 'root');
} catch (Exception $e) {
    die('Erreur de connexion à la base de donnée : ' . $e->getMessage());
}

//Vérification pour savoir si la tâche existe déjà
$checkRequest = $db->prepare("SELECT * FROM tasks WHERE taskname = :taskname");
$checkRequest->execute([
    'taskname' => $title
]);
$checkResult = $checkRequest->fetchAll();

if (count($checkResult) > 0) {
    echo "Il y a déjà une tâche avec ce titre dans la base de donnée";
} else {
    //Insertion dans la base de donnée
    $insertRecipe = $db->prepare("INSERT INTO tasks(taskname, tasktext) VALUES (:title, :text)");

    $insertRecipe->execute([
        'title' => $title,
        'text' => $text
    ]);
}

?>
