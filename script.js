function changeBackgroundColor() {
    var colors = ["#7ac0e1", "#e694e6", "#a285df"]; // Liste des couleurs de fond
    var index = 0;
    var body = document.getElementsByTagName("body")[0];

    setInterval(function() {
        body.style.backgroundColor = colors[index];
        index = (index + 1) % colors.length;
    }, 3000); // Changer la couleur toutes les 3 secondes (3000 millisecondes)
}

function createConfetti() {
    var confetti = document.createElement("div");
    confetti.classList.add("confetti");
    confetti.style.left = Math.random() * 100 + "vw";
    confetti.style.animationDelay = Math.random() * 1 + "s"; // Décalage aléatoire de l'animation
    confetti.style.backgroundColor = getRandomColor(); // Obtenir une couleur aléatoire pour chaque confetti
    document.body.appendChild(confetti);

    setTimeout(function() {
        confetti.remove();
    }, 2000);
}

function getRandomColor() {
    var letters = "0123456789ABCDEF";
    var color = "#";
    for (var i = 0; i < 6; i++) {
        color += letters[Math.floor(Math.random() * 16)];
    }
    return color;
}

function startConfettiAnimation() {
    setInterval(createConfetti, 100);
}

function resetSessionTimeout() {
    clearTimeout(sessionTimeoutTimer);
    sessionTimeoutTimer = setTimeout(function() {
        window.location.href = timeoutRedirectURL;
    }, sessionTimeout);
}

function getTimeElapsed() {
    fetch('phpFunctions.php')
        .then(response => response.text())
        .then(timeElapsed => {
            const timerElement = document.getElementById('timerElement');
            timerElement.textContent = timeElapsed;
        })
        .catch(error => {
            console.error('Error fetching time elapsed:', error);
        });
}

function checkUser(str) {
    if (str.length == 0) {
        document.getElementById("username").innerHTML = "";
            return;
    } else {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("username").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("POST", "formulaireInscription.php?rqst=" + str, true);
        xmlhttp.send();
    }
}