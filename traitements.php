<?php
require_once "phpFunctions.php";

// niveau 1 verifications :
if (isset($_POST['Niveau1send'])) {

    // recuperer mes variables et les mettre en lowercase:
    $userAnswerLevel1 = strtolower($_POST['niveau1']);
    $level1Answer = strtolower("ABCDEF");


    if ($userAnswerLevel1 == $level1Answer) {
        // si la reponse est la meme, on affiche une alerte "Bravo, vous avez reussi le niveau 1" et ne pas afficher local host sais:
        echo "<script>alert('Bravo, ABCDEF est la bonne reponse! Vous avez reussi le niveau 1')</script>";
        // on redirige vers le niveau 2
        echo "<script>window.location.href='formulaireNiveau2.php'</script>";
    } else {
        //si la reponse n'est pas bonne on alerte "mauvaise reponse, ressayer" puis on recharge la page du niveau
        decreaseRemainingLives();
        if (getRemainingLives() <= 0) {
            gameOver("échec");
            echo "<script>alert('Il ne vous reste plus de vie! vous avez perdu, commencez une nouvelle partie!')</script>";
            echo "<script>window.location.href='formulaireAccueil.php'</script>";
        } else {
            echo "<script>alert('Mauvaise reponse, la bonne reponse est : ABCDEF ,ressayez')</script>";
            echo "<script>window.location.href='formulaireNiveau1.php'</script>";
        }
    }
}

// niveau 2 verifications :
if (isset($_POST['Niveau2send'])) {

    // recuperer mes variables et les mettre en lowercase:
    $userAnswerLevel2 = strtolower($_POST['niveau2']);
    $level2Answer = strtolower("ZYXWVU");

    if ($userAnswerLevel2 == $level2Answer) {
        // si la reponse est la meme, on affiche une alerte "Bravo, vous avez reussi le niveau 2" et ne pas afficher local host sais:
        echo "<script>alert('Bravo, ZYXWVU  est la bonne reponse! Vous avez reussi le niveau 2')</script>";
        // on redirige vers le niveau 3
        echo "<script>window.location.href='formulaireNiveau3.php'</script>";
    } else {
        //si la reponse n'est pas bonne on alerte "mauvaise reponse, ressayer" puis on recharge la page du niveau
        decreaseRemainingLives();
        if (getRemainingLives() <= 0) {
            gameOver("échec");
            echo "<script>alert('Il ne vous reste plus de vie! vous avez perdu, commencez une nouvelle partie!')</script>";
            echo "<script>window.location.href='formulaireAccueil.php'</script>";
        } else {
            echo "<script>alert('Mauvaise reponse, la bonne reponse est : ZYXWVU ,ressayez')</script>";
            echo "<script>window.location.href='formulaireNiveau2.php'</script>";
        }
    }
}

// niveau 3 verifications :
if (isset($_POST['Niveau3send'])) {

    // recuperer mes variables et les mettre en lowercase:
    $userAnswerLevel3 = ($_POST['niveau3']);
    $level3Answer = ("2 12 23 45 54 78");

    if ($userAnswerLevel3 == $level3Answer) {
        // si la reponse est la meme, on affiche une alerte "Bravo, vous avez reussi le niveau 3" et ne pas afficher local host sais:
        echo "<script>alert('Bravo, 2 12 23 45 54 78  est la bonne reponse! Vous avez reussi le niveau 3')</script>";
        // on redirige vers le niveau 4
        echo "<script>window.location.href='formulaireNiveau4.php'</script>";
    } else {
        //si la reponse n'est pas bonne on alerte "mauvaise reponse, ressayer" puis on recharge la page du niveau
        decreaseRemainingLives();
        if (getRemainingLives() <= 0) {
            gameOver("échec");
            echo "<script>alert('Il ne vous reste plus de vie! vous avez perdu, commencez une nouvelle partie!')</script>";
            echo "<script>window.location.href='formulaireAccueil.php'</script>";
        } else {
            echo "<script>alert('Mauvaise reponse, la bonne reponse est : 2 12 23 45 54 78 ,ressayez')</script>";
            echo "<script>window.location.href='formulaireNiveau3.php'</script>";
        }
    }
}

// niveau 4 verifications :
if (isset($_POST['Niveau4send'])) {

    // recuperer mes variables et les mettre en lowercase:
    $userAnswerLevel4 = ($_POST['niveau4']);
    $level4Answer = ("100 96 78 45 43 12");

    if ($userAnswerLevel4 == $level4Answer) {
        // si la reponse est la meme, on affiche une alerte "Bravo, vous avez reussi le niveau 4" et ne pas afficher local host sais:
        echo "<script>alert('Bravo, 100 96 78 45 43 12 est la bonne reponse! Vous avez reussi le niveau 4')</script>";
        // on redirige vers le niveau 5
        echo "<script>window.location.href='formulaireNiveau5.php'</script>";
    } else {
        //si la reponse n'est pas bonne on alerte "mauvaise reponse, ressayer" puis on recharge la page du niveau
        decreaseRemainingLives();
        if (getRemainingLives() <= 0) {
            gameOver("échec");
            echo "<script>alert('Il ne vous reste plus de vie! vous avez perdu, commencez une nouvelle partie!')</script>";
            echo "<script>window.location.href='formulaireAccueil.php'</script>";
        } else {
            echo "<script>alert('Mauvaise reponse, la bonne reponse est : 100 96 78 45 43 12 ,ressayez')</script>";
            echo "<script>window.location.href='formulaireNiveau4.php'</script>";
        }
    }
}

// niveau 5 verifications :
if (isset($_POST['Niveau5send'])) {

    // recuperer mes variables et les mettre en lowercase:
    $userAnswerLevel5 = strtolower($_POST['niveau5']);
    $level5Answer = strtolower("AZ");

    if ($userAnswerLevel5 == $level5Answer) {
        // si la reponse est la meme, on affiche une alerte "Bravo, vous avez reussi le niveau 5" et ne pas afficher local host sais:
        echo "<script>alert('Bravo, AZ est la bonne reponse! Vous avez reussi le niveau 5')</script>";
        // on redirige vers le niveau 6
        echo "<script>window.location.href='formulaireNiveau6.php'</script>";
    } else {
        //si la reponse n'est pas bonne on alerte "mauvaise reponse, ressayer" puis on recharge la page du niveau
        decreaseRemainingLives();
        if (getRemainingLives() <= 0) {
            gameOver("échec");
            echo "<script>alert('Il ne vous reste plus de vie! vous avez perdu, commencez une nouvelle partie!')</script>";
            echo "<script>window.location.href='formulaireAccueil.php'</script>";
        } else {
            echo "<script>alert('Mauvaise reponse, la bonne reponse est AZ ,ressayez')</script>";
            echo "<script>window.location.href='formulaireNiveau5.php'</script>";
        }
    }
}

// niveau 6 verifications :
if (isset($_POST['Niveau6send'])) {

    // recuperer mes variables et les mettre en lowercase:
    $userAnswerLevel6 = strtolower($_POST['niveau6']);
    $level6Answer = ("1888 100000001");

    if ($userAnswerLevel6 == $level6Answer) {
        // si la reponse est la meme, on affiche une alerte "Bravo, vous avez reussi le niveau 6" et ne pas afficher local host sais:
        gameOver("réussite");
        echo "<script>alert('Bravo, vous avez reussi le dernier niveau!!!! le reponse etait bien 1888 100000001,Vous serez redirige a la page d\\'accueil!')</script>";
        // on redirige vers le niveau 7
        echo "<script>window.location.href='formulaireAccueil.php'</script>";
    } else {
        //si la reponse n'est pas bonne on alerte "mauvaise reponse, ressayer" puis on recharge la page du niveau
        decreaseRemainingLives();
        if (getRemainingLives() <= 0) {
            gameOver("échec");
            echo "<script>alert('Il ne vous reste plus de vie! vous avez perdu, commencez une nouvelle partie!')</script>";
            echo "<script>window.location.href='formulaireAccueil.php'</script>";
        } else {

            echo "<script>alert('Mauvaise reponse, la bonne reponse est : 1888 100000001 ,ressayez')</script>";
            echo "<script>window.location.href='formulaireNiveau6.php'</script>";
        }
    }
}

// traitements pour mettre fin au jeux avec le bouton quitter la partie.
if (isset($_POST['arreterJeux'])) {
    gameOver("incomplet");
    echo "<script>alert('Vous avez interompu le jeux. Fin de la partie.')</script>";
    echo "<script>window.location.href='formulaireAccueil.php'</script>";
}

// deconnection 
if (isset($_POST['deconnection'])) {
    session_destroy();
    echo "<script>window.location.href='connectionLogIn.php'</script>";
}

// voir les scores
if (isset($_POST['scores'])) {
    echo "<script>window.location.href='highscores.php'</script>";
}
