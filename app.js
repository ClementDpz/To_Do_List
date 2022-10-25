let submitButton = document.querySelector("#addNewTask");
let titleTask = document.querySelector("#title");
let textTask = document.querySelector("#text");
let tasksList = document.querySelector("#tasksList");

//Ouverture de la page : Chargement des tâches dans la bdd
//Ajax pour récupérer les données
var req = new XMLHttpRequest();

req.onreadystatechange = function () {
    if (req.readyState == 4) {
        if (req.status == 200) {
            let databaseResult = JSON.parse(req.responseText);

            databaseResult.forEach(elt => {
                let tmpDiv = document.createElement("div");
                tmpDiv.classList.add("task")

                let checkBoxElement = document.createElement("input");
                checkBoxElement.setAttribute("type", "checkbox")

                let titleElement = document.createElement("h2");
                titleElement.innerHTML = elt.taskname;

                let textElement = document.createElement("p");
                textElement.innerHTML = elt.tasktext;

                tmpDiv.appendChild(checkBoxElement);
                tmpDiv.appendChild(titleElement);
                tmpDiv.appendChild(textElement);

                tasksList.appendChild(tmpDiv);
            });
        }
    }
}

req.open("POST", "get_tasks.php", true);
req.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
req.send();

//Evenement de clique sur le bouton Ajouter
submitButton.addEventListener("click", function() {
    if (titleTask.value != "" && textTask.value != "") {
        let data = "title=" + titleTask.value +  "&text=" + textTask.value;

        //Ajax pour envoyer la requete au PHP
        var ajaxReq = new XMLHttpRequest();

        ajaxReq.onreadystatechange = function () {
            if (ajaxReq.readyState == 4) {
                if (ajaxReq.status == 200) {
                    console.log("Message : " + ajaxReq.responseText);
                } else {
                    console.error("Erreur : " + ajaxReq.responseText)
                }
            }
        }

        ajaxReq.open("POST", "add_new_task.php", true);
        ajaxReq.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        ajaxReq.send(data);
    } else {
        //Erreur
        console.error("Il faut saisir le titre et le texte de la tâche à ajouter");
    }
});
