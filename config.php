<?php 
    /*

    PDO : 
    ------


       PDO : extension PHP ("PHP Data Objects").

       1) PDO::__construct :
       ---------------------
       * Crée une instance PDO qui représente une connexion à la base.
       * Example           : $conx = new PDO($dsn , $username , $password).
       * NB : Lève toujours une exception PDOException si la connexion échoue.
       
       DSN :
       -----
       * Chaîne de connexion spécifiant le type de base de données, l'hôte, le nom de la base de données et d'autres paramètres.
       * Syntaxe : [ $dsn =  "driver:host=hostname;dbname=database" ] 

       * driver            : Le nom du pilote de BD => (ex: "mysql" = MySQL, "pgsql" = PostgreSQL, "sqlite" = SQLite).
       * host = hostname   : L'adresse de l'hôte où se trouve la base de données.
       * dbname = database : Le nom de la base de données à laquelle vous voulez vous connecter.


       $connexion = new pdo($dsn,$user,$pass);    =>     return object (PDO)


       2) Gestion des erreurs avec PDO :
       ---------------------------------
        - Trois modes: Chaque mode détermine comment PDO réagit aux erreurs.
        * PDO::ERRMODE_SILENT : Définit le code d'erreur, utilisation de PDO::errorCode() et PDO::errorInfo() pour inspection.
        * PDO::ERRMODE_WARNING : Émet un avertissement (E_WARNING) en plus du code d'erreur.
        * PDO::ERRMODE_EXCEPTION : Envoie une exception PDOException avec le code d'erreur et des informations supplémentaires.


        * Insertion - PDO::lastInsertId — Retourne l'identifiant de la dernière ligne insérée ou la valeur d'une séquence

        3) Exécuter des requêtes SQL :
        ------------------------------
        * PDO::query * 
        --------------
        - utilisée pour exécuter des requêtes SELECT qui récupèrent des données de la base de données. 
        - Renvoie un objet PDOStatement qui peut être utilisé pour parcourir les résultats de la requête.
        - Elle ne renvoie pas le nombre de lignes affectées. pour update et delete et insert.
        - False si Errore.
        

        4) Les fonctions du classe PDOStatement.
        ----------------------------------------
        * PDOStatement::setFetchMode  :  Définit le mode de récupération par défaut pour cette requête.
        * PDOStatement::closeCursor   :  Ferme le curseur, permettant à la requête d'être de nouveau exécutée
        * PDOStatement::rowCount      : Retourne le nombre de lignes affectées par le dernier appel à la fonction PDOStatement::execute()


        Fetch Mode :
        ------------
        * Récupérer une ligne à partir d'un jeu de résultats associé à un objet PDOStatement.
        * Déplace le pointeur interne vers la ligne suivante dans le jeu de résultats.
        * Le mode de récupération des résultats des requêtes.
        * Valeur de retour : False est renvoyé en cas d'échec ou s'il n'y a plus de lignes.


        1) Fetch : 
        ----------
        * FETCH_BOTH  :  Renvoie un tableau indexé à la fois par le nom de colonne et le numéro de colonne indexé 0.
        * FETCH_NUM   : retourne un tableau indexé par le numéro de la colonne, commençant à 0
        * FETCH_CLASS : retourne une nouvelle instance de la classe demandée, liant les colonnes du jeu de résultats aux noms des propriétés de la classe.
        * FETCH_OBJ   : retourne un objet (StdClass) avec les noms de propriétés qui correspondent aux noms des colonnes.
        * FETCH_ASSOC : Renvoie un tableau indexé par nom de colonne


        2) Fetch_All() : 
        ----------------
        * Récupérer toutes les lignes de résultats en une seule fois à partir d'un objet PDOStatement.
        * FETCH_COLUMN : Pour retourner un tableau contenant toutes les valeurs d'une seule colonne.


        Preparer : 
        ----------
        * Prépare une requête à l'exécution et retourne un objet
        * paramètres nommées           :    :nom_parametre
        * marqueurs interrogatifs (?)  :    ?


        
        
        Exécuter des requêtes SQL :
        ---------------------------
        * PDO::query : 
        --------------
        - utilisée pour exécuter des requêtes SELECT qui récupèrent des données de la base de données. 
        - Renvoie un objet PDOStatement qui peut être utilisé pour parcourir les résultats de la requête.
        - Elle ne renvoie pas le nombre de lignes affectées. pour update et delete et insert.
        - False si Errore.

        * PDO::exec :
        ------------- 
        - Exécuter des requêtes SQL qui modifient les données de la base de données, ( Requêtes INSERT, UPDATE ou DELETE ).
        - Elle renvoie le nombre de lignes affectées par la requête.
        - Elle ne renvoie pas un objet PDOStatement pour parcourir les résultats.
        
        * PDOStatement::Excuter :
        -------------------------
        - exécuter une requête préparée. Une requête préparée est une requête SQL avec des paramètres qui sont liés à des valeurs.
        - objet PDOStatement (généralement retourné par prepare) 
        - Elle peut être utilisée pour tous les types de requêtes SQL, y compris SELECT, INSERT, UPDATE, et DELETE

        BindParmatre : 
        --------------
        * Lie une variable PHP à un marqueur nommé ou interrogatif correspondant dans une requête SQL
        * la variable est liée en tant que référence et ne sera évaluée qu'au moment de l'appel à la fonction PDOStatement::execute().
        * Pour marqueurs nommés             : ce sera le nom du paramètre sous la forme :name. 
        * Pour les marqueurs interrogatifs  : ce sera la position indexée +1 du paramètre.
        * Cette fonction retourne true en cas de succès ou false si une erreur survient.


        BindValue : 
        -----------
        * Associe une valeur à un paramètre
        * Pour marqueurs nommés             : ce sera le nom du paramètre sous la forme :name. 
        * Pour les marqueurs interrogatifs  : ce sera la position indexée +1 du paramètre.
        * Cette fonction retourne true en cas de succès ou false si une erreur survient.     




    */

    
    $host = "localhost";
    $db  = "test_1";
    $user = "root";
    $pass = "Aa@123456";

    // DSN : 
    $dsn = "mysql:host=".$host.";dbname=".$db;

    // create PDO 
    try{
        $connexion = new pdo($dsn,$user,$pass);
        $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $connexion->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE , PDO::FETCH_ASSOC);

        /* Autres Method de déclaration : 
        $connexion = new PDO($dsn, $user, $pass, [ PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC ]); */

    }
    catch(PDOException $e){
        die('Errore  : ' . $e->getMessage());
    }

    // Query PDO
    // Query => Return objcet [PDOStatement]
    $stm = $connexion->query("select * from post");

    // FETCH_ASSOC : Renvoie un tableau indexé par nom de colonne.
    var_dump($row = $stm->fetch(PDO::FETCH_ASSOC));
    echo $row["Nom"];
    echo "<br>";

    // FETCH_BOTH :  Renvoie un tableau indexé à la fois par le nom de colonne et le numéro de colonne indexé 0.
    var_dump($row = $stm->fetch(PDO::FETCH_BOTH)); // Par default
    echo $row[1];
    echo $row["Nom"];
    echo "<br>";

    // FETCH_NUM : retourne un tableau indexé par le numéro de la colonne, commençant à 0
    var_dump($row = $stm->fetch(PDO::FETCH_NUM));
    echo $row[1]; 
    echo "<br>";
    
    // FETCH_OBJ : retourne un objet (StdClass) avec les noms de propriétés qui correspondent aux noms des colonnes.
    var_dump($row = $stm->fetch(PDO::FETCH_OBJ));
    echo $row->Nom;
    echo "<br>";

    // FETCH_CLASS : retourne une nouvelle instance de la classe demandée, liant les colonnes du jeu de résultats aux noms des propriétés de la classe.
    class post {}
    $stm->setFetchMode(PDO::FETCH_CLASS,"post");
    var_dump($stm->fetch());
    echo "<br>";

    $stm = $connexion->query("select * from post");
    // fetchAll : 
    // FETCH_COLUMN : Pour retourner un tableau contenant toutes les valeurs d'une seule colonne
    var_dump($row = $stm->fetchAll(PDO::FETCH_COLUMN,1));
    echo "<br>";

    $ID = 1;
    $NOM = "Youssef";
    $Prenom = "El-Khanchoufi";

    // Prepare : Insert Avec marqueurs interrogatifs (?) 
    $stm = $connexion->prepare("Insert Into post (ID,Nom,Prenom) VALUES (?,?,?)");
    $stm->execute([19,"Hamza","El-Khanchoufi"]);

    // Prepare : Update Avec   des paramètres nommées
    $stm = $connexion->prepare("Update post set Nom = :NOM , Prenom = :Prenom WHERE ID= :ID");
    $stm->execute(["ID"=>12,"NOM"=>"Jadore","Prenom"=>"El-Khanchoufi"]);

    // Prepare : Delete Avec des paramètres nommées et bindValue
    $ID = 5;
    $stm = $connexion->prepare("Delete FROM post where ID = :ID"); // Avec des paramètres nommées
    $stm->bindValue("ID",$ID,PDO::PARAM_INT); // Spécifier Position de paramettre dans query

    $stm = $connexion->prepare("Delete FROM post where ID = ?"); // Avec marqueurs interrogatifs (?) 
    $stm->bindValue(1,$ID,PDO::PARAM_INT); // Spécifier Position de paramettre dans query
    $stm->execute();


    // --------------------------MYSQLI --------------------------------//
    
    












    


?>