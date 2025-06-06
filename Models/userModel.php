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
        $query = 'insert into utilisateur(utilisateurNom, utilisateurPrenom, utilisateurDate, utilisateurMotDePasse, utilisateurEmail,utilisateurStatut) 
        values (:utilisateurNom, :utilisateurPrenom, :utilisateurDate, :utilisateurMotDePasse, :utilisateurEmail, :utilisateurStatut)';
        //préparation de la requête
        $ajouterUser = $pdo->prepare($query);
        //exécution en attribuant les valeurs récupérées dans le formulaire aux paramètres
        $ajouterUser->execute([
            'utilisateurNom' => $_POST["Nom_utilisateur"],
            'utilisateurPrenom' => $_POST["prenom"],
            'utilisateurDate' => $_POST["date_de_naissance"],
            'utilisateurEmail' => $_POST["email"],
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
        $query = 'select * from utilisateur where utilisateurNom = :utilisateurNom and utilisateurMotDePasse = :utilisateurMotDePasse';
        //préparation de la requête 
        $connectUser = $pdo->prepare($query);
        //exécution en attribuant les valeurs récupérées dans le formulaire aux paramètres
        $connectUser->execute([
            'utilisateurNom' => $_POST["Nom_utilisateur"],
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
        $query = 'update utilisateur set utilisateurNom = :utilisateurNom, utilisateurPrenom = :utilisateurPrenom, utilisateurMotDePasse = :utilisateurMotDePasse, utilisateurDate = :utilisateurDate,  utilisateurEmail = :utilisateurEmail, utilisateurStatut = :utilisateurStatut where utilisateurID = :utilisateurID';
        //préparation de la rêquete
        $ajouteUser = $pdo->prepare($query);
        //exécution en attribuant les valeurs récupérées dans le formulaire aux paramètres
        $ajouteUser->execute([
            'utilisateurNom' => $_POST["Nom_utilisateur"],
            'utilisateurPrenom' => $_POST["prenom"],
            'utilisateurMotDePasse' => $_POST["mot_de_passe"],
            'utilisateurEmail' => $_POST["email"],
            'utilisateurStatut' => 'user',
            'utilisateurDate' => $_POST["date_de_naissance"],
            'utilisateurID' =>   $_SESSION["user"] -> utilisateurID
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
        $query = 'delete from utilisateur where utilisateurID = :utilisateurID';
        $delUser = $pdo->prepare($query);
        $delUser->execute([
            'utilisateurID' => $_SESSION["user"]->utilisateurID
        ]);
    } catch (PDOException $e) {
        $message = $e->getMessage();
        die($message);      
    }
}