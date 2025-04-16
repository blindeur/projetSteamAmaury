<!-- /*
Fonction createUser
-------------------------
BUT : ajouter les données encodées par l'utilisateur dans la table des utilisateurs
IN : $pdo reprenant toutes les information de connexion
*/ -->
<?php
function createUser($pdo)
{

    try{
        //définition de la requête d'insertion en utilisant la notion de paramètre 
        $query = 'insert into utilisateur(utilisateurNom, utilisateurPrenom, utilisateurDate,utilisateurLogin, utilisateurMotDePasse, utilisateurEmail,utilisateurStatut) 
        values (:utilisateurNom, :utilisateurPrenom, :utilisateurDate, :utilisateurLogin, :utilisateurMotDePasse, :utilisateurEmail, :utilisateurStatut)';
        //préparation de la requête
        $ajouterUser = $pdo->prepare($query);
        //exécution en attribuant les valeurs récupérées dans le formulaire aux paramètres
        $ajouterUser->execute([
            'utilisateurNom' => $_POST["nom"],
            'utilisateurPrenom' => $_POST["prenom"],
            'utilisateurDate' => $_POST["date_de_naissance"],
            'utilisateurEmail' => $_POST["email"],
            'utilisateurLogin' => $_POST["Nom_utilisateur"],
            'utilisateurMotDePasse' => $_POST["mot_de_passe"],
            'utilisateurStatut' => 'user' 
        ]);
    }catch (PDOEXCEPTION $e) {
        $message = $e->getMessage();
        die($message);      }

}

/* 
Fonction connectUser
-----------------------
BUT : rechercher les données de l'utilisateur dans la base de données pour les mémoriser dans la variable session
IN : $pdo reprenant toutes les information de connexion
*/
function connectUser($pdo)
{
    try {
        //définition de la rquête select en utilisant la notion de paramètre 
        $query = 'select * from utilisateur where utilisateurLogin = :utilisateurLogin and utilisateurMotDePasse = :utilisateurMotDePasse';
        //préparation de la requête 
        $connectUser = $pdo->prepare($query);
        //exécution en attribuant les valeurs récupérées dans le formulaire aux paramètres
        $connectUser->execute([
            'utilisateurLogin' => $_POST["Nom_utilisateur"],
            'utilisateurMotDePasse' => $_POST["mot_de_passe"]
        ]);
        //stokage des données trouvées dans la variavle $user
        $user = $connectUser->fetch();
        var_dump($user);
        if (!$user){
            return false;
        }
        else{
            //ajout de celle-ci à la variable session
            $_SESSION["user"] = $user;
            return true;
        }
    }catch (PDOException $e) {
        $message = $e->getMessage();
        die($message);
    }
}

/*
Fonction updateUser
--------------------
BUT : modifie les données encodées par l'utilisateur dans la table des utilisateurs
IN : $pdo reprenant toutes les information de connexion
*/
function updateUser($pdo)
{
    try {
        //définitino de la rêquete de mise à jour en utilisant la notion de paramètre 
        //sans oublier le critère ! pour ne pas modifier toutes les lignes de la table utilisateur !
        $query = 'update utilisateur set utilisateurNom = : utilisateurNom, utilisateurPrenom = :utilisateurPrenom,utilisateurMotDePasse = :utilisateurMotDePasse, utilisateurEmail = :utilisateurEmail where id = id';
        //préparation de la rêquete
        $ajouteUser = $pdo->prepare($query);
        //exécution en attribuant les valeurs récupérées dans le formulaire aux paramètres
        $ajouteUser->execute([
            'utilisateurNom' => $_POST["nom"],
            'utilisateurPrenom' => $_POST["prenom"],
            'utilisateurMotDePasse' => $_POST["mot_de_passe"],
            'utilisateurEmail' => $_POST["email"],
            'id' => $_SESSION["user"]->id // récupération de l'id de l'utilisateur en session actuellement connecté
        ]);
    } catch (PDOException $e) {
        $message = $e->getMessage();
        die($message);
    }
}

/*
Fonction updateUser
-----------------------
BUT : recharge les données actualisées de l'utilsateur dans la table des utilisateurs
IN : $pdo reprenant toutes les informations de connexion
*/
function updateSession($pdo)
{
    try {
        $query ='select * from utilisateur where utilisateurID = :utilisateurID';
        $selectUser = $pdo->prepare($query);
        $selectUser->execute([
            'utilisateurID' => $_SESSION["user"]->utilisateurID  //récupération de l'id de l'utilisateur en session actuellement connecté
        ]);
        $user = $selectUser->fetch(); // pas fetchall car on ne veut pas qu'une ligne ! 
        $_SESSION["user"] = $user;
    } catch (PDOException $e) {
        $message = $e->getMessage();
        die($message);
    }
}

/*
Fonction DeleteUser
----------------------
BUT : suprimer l'utilisateur connecté de la table des utilisateurs
IN : $pdo reprenant toutes les informations de connexion
*/
function DeleteUser($pdo)
{
    try {
        $query = 'delete from utilisateur where id = :id';
        $delUser = $pdo->prepare($query);
        $delUser->execute([
            'id' => $_SESSION["user"]->i
        ]);
    } catch (PDOException $e) {
        $message = $e->getMessage();
        die($message);      
    }
}