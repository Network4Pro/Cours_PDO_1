<?php

// PDO ;

try {
    $dsn = "mysql:host=localhost;dbname=test_1";
    $user = "root";
    $pasw = "Aa@123456";

    // 1- Se connecter à MySQL.
    $connexion = new PDO($dsn, $user, $pasw);

    // 2- Création d’une base de données.
    $db = "DB_1";
    $res = $connexion->exec("CREATE DATABASE IF NOT EXISTS " . $db);
    if ($res) {echo "Création de la base de données réussie!!!!<br><br>";}

    // 3- Création d’une table.
    $connexion->exec("use {$db}");
    $res = $connexion->exec("CREATE TABLE IF NOT EXISTS  post(
          Id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
          Nom VARCHAR(30),
          Prenom VARCHAR(30))");
    if ($res) {echo "Table créée avec succès!!!<br><br>";}

    // Protège une chaîne pour l'utiliser dans une requête SQL PDO:
    $chaine = 'Hamza';
    echo $connexion->quote("Chaine échape: $chaine <br>"); // chaine 'Hamza'

    // Insertion des données :
    # ====================== #
    // 4- ( Avec Exec ).
    $connexion->beginTransaction(); // Démarrer une transaction
    $nb_row = $connexion->exec("INSERT INTO post(Nom,Prenom) Values('Hamza','El khanchoufi'),('Ilyass','El khanchoufi')");
    if ($nb_row) {
        echo "Nb Ligne Ajoutées : " . $nb_row . "<br><br>";
        $connexion->commit(); // Valider la transaction
    } else {
        echo "Erreur lors de l'ajout.<br><br>";
        $connexion->rollBack(); // En cas d'erreur, annuler la transaction
    }

    // 5- Insérer ( Requête préparée + Paramètres nommés + execute(array) )
    $stm = $connexion->prepare("INSERT INTO post(Nom,Prenom) Values(:NOM,:Prenom)");
    $stm->execute(['NOM' => "Hamza", 'Prenom' => "El-khanchoufi"]);
    # Les clés d'un tableau associatif peuvent également être préfixées par des deux-points (":").
    $stm->execute([':NOM' => "Hamza", ':Prenom' => "El-khanchoufi"]);
    echo "Ajouter Ligne Bien Sucess!!!!<br><br>";

    // Insérer ( Requête préparée + execute(array) + marqueurs interrogatifs)
    $stm = $connexion->prepare("INSERT INTO post(Nom,Prenom) Values(?,?)");
    # l'ordre commence à partir de 0.
    $date = array(0 => "Hamza", 1 => "El-Khanchoufi");
    $stm->execute($date);
    echo "Ajouter Ligne Bien Sucess!!!!<br><br>";

    // Insérer  ( requêtes préparées) +  marqueurs nommés + bindParam
    $stm = $connexion->prepare("INSERT INTO post(Nom,Prenom) Values(:NOM,:Prenom)");
    $stm->bindParam(":NOM", $NOM, PDO::PARAM_STR);
    $stm->bindParam(":Prenom", $Prenom, PDO::PARAM_STR);
    $NOM = "Hamza";
    $Prenom = "Jadore";
    $stm->execute();
    echo "(Marqueurs Nommés) : Ajouter Ligne Bien Sucess!!!!<br><br>";

    // Insérer  ( requêtes préparées) +  marqueurs interrogatifs + bindParam
    $stm = $connexion->prepare("INSERT INTO post(Nom,Prenom) Values(?,?)");
    $stm->bindParam(1, $NOM, PDO::PARAM_STR);
    $stm->bindParam(2, $Prenom, PDO::PARAM_STR);
    $NOM = "Ilyas";
    $Prenom = "Ahmed";
    $stm->execute();
    echo "(Interrogatifs) : Ajouter Ligne Bien Sucess!!!!<br><br>";

    echo "La dernier ID ajouter est :" . $connexion->lastInsertId() . "<br><br>";

    // Mettre à jour des données dans une table.
    $stm = $connexion->prepare("UPDATE post set Nom=?,Prenom=? where ID>?");
    $stm->bindParam(1, $NOM, PDO::PARAM_STR);
    $stm->bindParam(2, $Prenom, PDO::PARAM_STR);
    $stm->bindParam(3, $Prenom, PDO::PARAM_INT);
    $NOM = "Ilyas";
    $Prenom = "Ahmed";
    $ID = 1;
    $stm->execute();
    $count = $stm->rowCount();
    print('Mise à jour de ' . $count . ' entrée(s) <br><br>');

    // Modifier la structure d’une table
    // --------------------------------------

    // Ajouter une colonne dans une table
    $stm = $connexion->exec("ALTER TABLE post ADD DateInscription TIMESTAMP");
    echo 'Colonne ajoutée<br><br>';

    // Supprimer une colonne dans une table.
    $stm = $connexion->exec("ALTER TABLE post  DROP COLUMN DateInscription");
    echo 'Colonne supprimée<br><br>';

    // Modifier une colonne dans une table.
    $stm = $connexion->exec("ALTER TABLE post MODIFY COLUMN Prenom VARCHAR(50)");
    echo 'Colonne Modifier<br><br>';

    // La sélection simple de données :
    // --------------------------------

    # Obtenez la valeur de l'attribut PDO::FETCH_DEFAULT
    // FETCH_BOTH
    echo $connexion->getAttribute(PDO::ATTR_DEFAULT_FETCH_MODE);
    // Configurez le mode de récupération par défaut pour toutes les requêtes
    $connexion->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

    #1- Récuperer les données avec la méthode query()
    $stm = $connexion->query("select * from post");
    echo "\n<pre>";
    print_r($stm->fetchAll(PDO::FETCH_OBJ));
    echo "<pre>";

    #2- Récuperer les données avec method prepare
    $stm = $connexion->prepare("select * from post");

    #2- 1) fetchAll
    $stm->execute();
    echo "\n FetchAll + mode Associative \n";
    $result = $stm->fetchAll(PDO::FETCH_ASSOC);

    $stm->execute();
    echo "\n FetchAll + mode column \n";
    $result = $stm->fetchAll(PDO::FETCH_COLUMN, 1);

    $stm->execute();
    class post
    {}
    echo "\n FetchAll + mode Class \n";
    $result = $stm->fetchAll(PDO::FETCH_CLASS, "post");

    #2- 2) Fetch
    $stm->execute();
    while ($row = $stm->fetch(PDO::FETCH_ASSOC)) {
        echo "ID: {$row['Id']} | Nom: {$row['Nom']} | Prenom: {$row['Prenom']} \n";
    }

    $stm->execute();
    while ($row = $stm->fetch(PDO::FETCH_NUM)) {
        echo "ID: {$row[0]} | Nom: {$row[1]} | Prenom: {$row[1]} \n";
    }

    $stm->execute();
    while ($row = $stm->fetch(PDO::FETCH_OBJ)) {
        echo "ID: {$row->Id} | Nom: {$row->Nom} | Prenom: {$row->Prenom} \n";
    }

    #2- 3) FetchColumn
    $stm->execute();
    while ($row = $stm->fetchColumn(1)) {
        echo "Name:" . $row . "\n";
    }
    #2- 4) fetchObject
    $stm->execute();

    while ($row = $stm->fetchObject("post")) {
        echo "ID: {$row->Id} | Nom: {$row->Nom} | Prenom: {$row->Prenom} \n";
    }

    echo "<br><br>xcvxcv";
    // Supprimer une ou plusieurs entrées choisies d’une table.
    # Pour supprimer des données d’une table, nous allons utiliser l’instruction SQL DELETE FROM.
    $stm = $connexion->prepare("DELETE FROM post where ID > ?");
    $stm->bindParam(1, $Prenom, PDO::PARAM_INT);
    $stm->execute();
    $count = $stm->rowCount();
    print('Effacement de ' . $count . ' entrées.<br><br>');

    // Supprimer complètement une table de la base de données
    $stm = $connexion->exec("DROP TABLE post");
    print('Table bien supprimée.<br><br>');
} catch (PDOException $ex) {
    echo "Errore : " . $ex->getMessage();
} finally {

}
