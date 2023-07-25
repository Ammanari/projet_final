*************************************IMPORTANT*****************************************
*										      *
*                                                                                     *
*             LA PAGE D'ACCUEIL DU JEU EST LE FICHIER: index.php                      *
*                                                                                     *
*                                                                                     *
*                                                                                     *
***************************************************************************************



1. NOM DES DEVELOPPEURS ET LA CONTRIBUTION DE CHACUN:

Martin Aubry

-Création de comptes utilisateur ou inscription (Sign-Up). 
-Validation en temps réel des informations saisies par 
 l’utilisateur dans le formulaire de création de comptes 
 utilisateur avec AJAX.
-Connexion à un compte utilisateur existant (Sign-In).
-Déconnexion à un compte utilisateur connecté (Sign-Out et Time-Out)."
-Création de la structure pour créer et échanger des données avec la base de données


Philippe Aivaliotis

-Création de comptes utilisateur ou inscription (Sign-Up). 
-Validation en temps réel des informations saisies par 
l’utilisateur dans le formulaire de création de comptes 
utilisateur avec AJAX.
-Connexion à un compte utilisateur existant (Sign-In).
-Déconnexion à un compte utilisateur connecté (Sign-Out et Time-Out)."
-Création de la structure pour créer et échanger des données avec la base de données


Alex Gelfand

-Création de la structure pour créer et échanger des données 
 avec la base de données
-Création et mise en place du compte GitHub
-Création de la structure des dossiers et fichiers
- Gestion de plusieurs niveaux d’un jeu de question/réponse qui s’enchainent.
-Coordination de l'intégration des différentes fonctionnalités
-Affichage personnalisé des fonctionnalités et ajout de fonctionnalités 
 d’interactivité et d’attraction additionnelles."


Alexandre Dawood

-Connexion à un compte utilisateur existant (Sign-In).
-Déconnexion à un compte utilisateur connecté (Sign-Out et Time-Out)."
-Création de la structure pour créer et échanger des données avec la base de données
-Modification du mot de passe d’un compte utilisateur existant. 
-Affichage personnalisé des fonctionnalités et ajout de fonctionnalités 
 d’interactivité et d’attraction additionnelles."


***************************************************************************************

2. DATE DE PLUBLICATION DU JEU : 19 JUILLET 2023

***************************************************************************************

3. ÉNUMÉRATION ET LA DESCRIPTION DE TOUTES LES FONCTIONALITÉS DU SITE WEB:

Inscription et Connexion d'Utilisateur : Le site permet aux utilisateurs de 
créer un compte et de s'authentifier. Les informations des utilisateurs sont 
stockées de manière sécurisée dans une base de données MySQL.

Gestion de l'Historique : Les utilisateurs peuvent voir leur historique de 
incluant les scores et les statistiques de chaque partie.

Fonctionnalité d'Annulation : Les utilisateurs ont la possibilité d'annuler 
une partie de jeu en cours.

Déconnexion d'Utilisateur : Les utilisateurs peuvent se déconnecter de 
leur compte utilisateur de manière sécurisée.

Fonctionnalité de Jeu : Les utilisateurs peuvent jouer à un jeu avec 
différents niveaux. Le site utilise PHP pour contrôler le jeu et pour 
gérer les scores et les niveaux.

Affichage Personnalisé et Interactivité : Le site utilise des 
feuilles de style comme CSS  et du JavaScript pour améliorer 
l'apparence et l'interactivité du site. Des contenus multimédias sont également intégrés pour augmenter l'attrait du site.


Fonctionnalités Optionnelles :
 
En plus des fonctionnalités principales décrites précédemment, 
notre site Web et notre jeu intègrent plusieurs caractéristiques 
optionnelles qui enrichissent l'expérience utilisateur.

Changement de musique selon le niveau de jeu : 
Pour rendre l'expérience de jeu plus immersive et dynamique, 
nous avons ajouté différentes musiques de fond qui changent à chaque 
niveau du jeu. Ces morceaux ont été soigneusement sélectionnés pour 
correspondre à l'atmosphère de chaque niveau, apportant ainsi une dimension 
supplémentaire d'engagement et de plaisir.

Styles avancés avec CSS : 
En vue d'améliorer l'esthétisme du site et du jeu, nous avons 
ajouté des feuilles de style en cascade (CSS). Cela nous a permis 
de personnaliser l'apparence du site et du jeu, en leur donnant un 
aspect attrayant et moderne. Le CSS nous a permis de manipuler les couleurs, 
les tailles, les polices, les espacements et de nombreux autres aspects visuels 
du site et du jeu.

Animations en JavaScript : Afin d'augmenter l'interactivité et l'attrait visuel, 
nous avons utilisé JavaScript pour ajouter des animations au site et au jeu. 
L'une de ces animations est la présence de petites bulles qui montent à l'écran, 
donnant une sensation de légèreté et de dynamisme. Ces animations permettent de 
capter l'attention des utilisateurs et d'ajouter un niveau supplémentaire de 
professionnalisme et de finition à notre site Web.

En combinant ces fonctionnalités optionnelles avec les fonctionnalités 
principales du site et du jeu, nous avons créé une expérience utilisateur 
complète et engageante. Ces fonctionnalités ont été conçues pour améliorer 
non seulement l'aspect fonctionnel du site et du jeu, mais aussi leur aspect 
esthétique et leur interactivité, offrant ainsi aux utilisateurs une expérience 
en ligne enrichissante et mémorable.

Navigation : Toutes les pages du site sont connectées entre elles 
par des liens de navigation, et le menu de navigation change en fonction 
de l'état de connexion de l'utilisateur.

Documentation : Un fichier README (celui-ci) est inclus dans le 
répertoire principal du site, fournissant des informations détaillées 
sur le site web et son fonctionnement.

Formatage du Code et Structure des Répertoires : Le code est formaté 
de manière cohérente, commenté de manière significative, et les fichiers 
sont organisés en répertoires clairement nommés.


***************************************************************************************


4. LE FONCTIONNEMENT DU JEU


Le jeu offert sur notre site Web est un jeu de question-réponse 
qui se compose de six niveaux, chaque niveau demandant à l'utilisateur d'accomplir une tâche spécifique.

Au début de chaque partie, le joueur commence toujours par 
le niveau 1 et pour progresser à chaque niveau supérieur, 
il doit réussir le niveau précédent. Voici une brève description 
de chaque niveau :

Niveau 1 : Arrangez 6 lettres générées aléatoirement dans l'ordre croissant.
Niveau 2 : Arrangez 6 lettres générées aléatoirement dans l'ordre décroissant.
Niveau 3 : Arrangez 6 nombres générés aléatoirement (de 0 à 100) dans l'ordre croissant.
Niveau 4 : Arrangez 6 nombres générés aléatoirement (de 0 à 100) dans l'ordre décroissant.
Niveau 5 : Identifiez la première lettre et la dernière lettre d'un ensemble de 6 lettres générées aléatoirement.
Niveau 6 : Identifiez le plus petit nombre et le plus grand nombre d'un ensemble de 6 nombres générés aléatoirement (de 0 à 100).


Chaque joueur se voit attribuer six vies au début de chaque partie. 
Le résultat d'une partie est déterminé et enregistré dans 
la base de données lorsque ladite partie s'achève, qui peut se 
terminer dans l'une des trois circonstances suivantes :

Game Over (partie échouée) : Lorsque le nombre de vies allouées 
a été épuisé sans que le joueur ait gagné le dernier niveau du jeu, 
le résultat est un échec.

Partie incomplète : Lorsque le joueur décide d'abandonner une 
partie en cours, est automatiquement déconnecté après un certain 
temps d'inactivité, ou choisit volontairement de se déconnecter 
pendant une partie en cours, le résultat est incomplet.

Partie réussie : Lorsque le joueur parvient à terminer tous les 
niveaux sans épuiser toutes ses vies, le résultat est une réussite.

***************************************************************************************
