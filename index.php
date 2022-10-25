<?php

?>

<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>To Do List</title>

    <link rel="stylesheet" href="style.css">
</head>
<body>
    
    <div class="header">
        <h1>To Do List</h1>
    </div>

    <div class="formAdd">

        <label for="title">Titre :</label>
        <input type="text" id="title" name="title">
        <label for="text">Texte :</label>
        <input type="text" id="text" name="text">

        <button type="submit" name="submit" id="addNewTask">Ajouter</button>

    </div>

    <div id="tasksList">
    </div>

    <script src="app.js"></script>
    
</body>
</html>

