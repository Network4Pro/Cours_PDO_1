<?php

try {


    echo "</pre>";

    // 1- Se connecter à MySQL.
    $connexion = new mysqli("localhost", "root", "Aa@123456");
    if(!$connexion->connect_errno){ echo "Connexion Avec Success!!<br><br>"; }
    
    // 2- Sélectionne une base de données par défaut pour les requêtes
    $connexion->select_db("test_1");

    // 3- Création d’une table.
    $res = $connexion->query("CREATE TABLE IF NOT EXISTS  post(
        Id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        Nom VARCHAR(30),
        Prenom VARCHAR(30))");
    if ($res) {echo "Table créée avec succès!!!<br><br>";}

    // Insertion des données :
    # ====================== #
    # 1 ) Ajouter donnée Avec Method Query.
    $sql = "INSERT INTO post(Nom,Prenom) values('Hamza','El-Khanchoufi')";
    if($connexion->query($sql)) { echo "Ajouter Bien Sucess !!!<br><br>"; }

    #-- Les requêtes MySQL préparées --# 
    #----------------------------------#

    # 1) Ajouter donnée Avec Method execute_query.
    
    $sql = "INSERT INTO post(Nom,Prenom) values('Youssef','El-Khanchoufi')";
    if($connexion->execute_query($sql)) { echo "Ajouter Bien sucess !!!<br><br>"; }

    # 2) Ajouter donnée Avec Method execute_query avec Array.

    $sql = "INSERT INTO post(Nom,Prenom) values(?,?)";
    if($connexion->execute_query($sql,['Hamza','El-khanchoufi'])) { echo "Ajouter Bien sucess !!!<br><br>"; }
    
    # 3) Avec method mysqli_stm::executer(array).
        # Exécuter une instruction préparée avec un tableau de valeurs.

    $sql = "INSERT INTO post(NOM,Prenom) values(?,?)";
    $stm = $connexion->prepare($sql);
    if($stm->execute(["Anwar","jadour"])) { echo "Ajouter Bien Sucess!!!!<br><br>"; }

    # 4) Avec Method mysqli::stm_execute en utilisant bind_param(). 
        # Exécuter une instruction préparée avec des variables liées.

    $sql = "INSERT INTO post(NOM,Prenom) values(?,?)";
    $stm = $connexion->prepare($sql);
    $Nom = "A/C Sabir"; $prenom = "El-Khanchoufi";
    $stm->bind_param("ss",$Nom,$prenom);
    if($stm->execute()) { echo "Ajouter Bien Sucess!!!!<br><br>"; }


    #  La sélection simple de données  #
    # ---------------------------------#
    echo "<pre>";
    
    #1- Récuperer les données avec la méthode query()
    $sql = "select * from post";
    $resul = $connexion->query($sql);
    print_r( $resul->fetch_all(MYSQLI_ASSOC));
    

    #2- Récuperer les données avec la méthode executer_query()
    $sql = "select * from post where NOM=?";
    $result = $connexion->execute_query($sql,["Hamza"]); 
    
    #Fetch_All(Mode)
    print_r( $result->fetch_all(MYSQLI_ASSOC));

    
    $sql = "select * from post";
    #fetch_assoc (associatif)
    $result = $connexion->query($sql); 
    echo "\n----------- Fetch_assoc ---------\n";
    while($row = $result->fetch_assoc()){
        echo "Id : {$row['Id']} - Nom : {$row['Nom']} - Prenom :  {$row['Prenom']} \n ";
    }

    # fetch_array (BOTH = Associative + numérique)
    $result =$connexion->query($sql); 
    echo "\n----------- Fetch_array ---------\n";
    print_r($result->fetch_array());
    while($row = $result->fetch_array(MYSQLI_ASSOC) ){
        print_r($row);
        echo "ID : {$row['Id']} - Nom : {$row['Nom']} - Prenom : {$row['Prenom']} \n";
    }


    #Fetch_row : Index (Num)
    $result = $connexion->query($sql);
    echo "\n----------- Fetch_row ---------\n";
    while($row = $result->fetch_row()){
        echo "ID : {$row[0]} - Nom : {$row[1]} - Prenom : {$row[2]} \n";
    }

    #fetch_column 
    $result = $connexion->query($sql);
    echo "\n-----------Fetch_column ---------\n";
    while($row = $result->fetch_column(1)){
        echo "Nom : $row \n";
    }

    # Fetch_object
    class post{ }
    $result = $connexion->query($sql);
    echo "\n-----------Fetch Object---------\n";
    print_r($result->fetch_object("post"));
    while($row = $result->fetch_object("post") ){
        echo "ID : ". $row->Id ." - Nom : ".$row->Nom. " - Prenom : ".$row->Prenom. "\n";
    }



    # Les Autres Fonctions :
    $res = $connexion->query($sql);
    echo " Nombre de champs  dans jeu de resultat est : ". $res->field_count."\n";
    echo " Nombre de Lignes dans jeu de resultat est : ". $res->num_rows."\n";
    $row = $res->fetch_assoc();
    foreach( $res->lengths as $i => $val ){
        printf("Le champ n°%2d a une longueur de %2d\n", $i+1, $val);
    }

    # fetch_fields
    $res = $connexion->query($sql);
    $array = $res->fetch_fields();
    foreach($array as $field ){
        echo "Name : ". $field->name . " - type :  " . $field->type . " - Length : " . $field->length . "\n"; 
    }

    # fetch_field
    echo "\n\n--- Fetch field ---\n\n";
    while($colone = $res->fetch_field()){
        echo "Colone N° : ". $res->current_field."\n";
        print_r($colone);
    }


    # fetch_field_firect
    echo "\n\n ------- Fetch field direct ------- \n\n";
    print_r($res->fetch_field_direct(1)); echo "\n";
    echo "Position current : ". $res->current_field . "\n";


    # Deplacer poiture vers colone 2.
    echo "\n\n---------- Fetch seek -----------\n\n";
    $res->field_seek(2);
    echo "Colone N° : ". $res->current_field."\n";
    print_r( $res->fetch_field() );
    echo "Colone N° : ". $res->current_field."\n";
    var_dump( $res->fetch_field() );

    echo "</pre>";






} catch (mysqli_sql_exception $ex) {
    echo "Errore : " . $ex->getMessage();
}




try {
    echo "<br><br>";
    $connexion = mysqli_connect("localhost", "root", "Aa@123456");
    $connexion->select_db("test_1");


} catch (mysqli_sql_exception $ex) {
    echo "Errore : " . $ex->getMessage();
}

/**
 * Mysqli::select_db('DB')   : Sélectionne une base de données par défaut pour les requêtes. : bool (True / false).
 * Mysqli::query("Requet")   : Exécute une requête sur la base de données. [Select : un objet mysqli_result / les autres types de requêtes=true]
 * mysqli::execute_query("Array")     : Prepares, binds parameters, and executes SQL statement.
 * 
 * 
 * 
 * 
 * 
 * Mysqli_select_db(Mysqli,'DB')  : Sélectionne une base de données par défaut pour les requêtes. : bool (True / false).
 * Mysqli_query(Mysqli,"Requet") : Exécute une requête sur la base de données.  [Select : un objet mysqli_result / les autres types de requêtes=true]
 * mysqli_execute_query('mysqli','Requet') : Prepares, binds parameters, and executes SQL statement.
 * 
 * 
 * 
 * 
 * 
 * 
 

 La classe mysqli_stmt en PHP est utilisée pour représenter une requête préparée dans MySQL.
 ------------------------------------------------------------------------------------------

 1) mysqli_stmt::bind_param ("Type" , Var ) - mysqli_stmt_bind_param : 

   * Elle permet de spécifier les valeurs qui remplaceront les marqueurs de substitution (?) dans la requête préparée.
   * La méthode prend deux arguments : 
        - Type   : ( i = int ) - ( d = float ) - ( s = string)
        - Les arguments suivants sont les variables que vous souhaitez lier à la requête préparée. 

    NB : Le nombre d'arguments dépend du nombre de marqueurs de substitution dans la requête préparée. 
    Vous devez spécifier les variables dans le même ordre que les marqueurs de substitution apparaissent dans la requête.

   * Return : retourne true en cas de succès ou false si une erreur survient.

    Prepare les Requets SQL: 
    -------------------------
    * mysqli::prepare(query) ou mysqli_prepare(mysqli , query) :  Prépare une requête SQL pour l'exécution. mysqli|stm ou false.
    * La requête doit être composée d'une seule requête SQL.
    * Elle peut contenir des paramètres de marques (signe '?') à remplacer par des valeurs lors de l'exécution.

    Exécuter la requete Préparer SQL:
    ---------------------------------
    * mysqli_stmt::execute(Array) ou mysqli_stmt_execute(mysqli_sqtm , Array) :  exécuter une requête préparée avec MySQLi en PHP.
    * Cette fonction retourne true en cas de succès ou false si une erreur survient.
    

    Exécuter des requêtes SQL :
    ---------------------------

     PDO::query :
     ------------
     *  Exécute une requête sur la base de données.
     *  mysqli::query(string $query) - mysqli_query(mysqli $mysql, string $query) :  ($result_mode = MYSQLI_STORE_RESULT).
     *  Elle retourne false en cas d'échec de la requête.
     *  Pour des requêtes réussies [ SELECT, SHOW, DESCRIBE ou EXPLAIN, mysqli_query() ] retournera un objet mysqli_result.
     *  Pour les autres types de requêtes réussies (comme INSERT, UPDATE, DELETE), mysqli_query() retournera true.

    mysqli_result : Représente le jeu de résultats obtenu depuis une requête.
    -------------------------------------------------------------------------

    Les methods de Récuperer des données d'un jeu de résultats :
    ------------------------------------------------------------

    Fetch_All(Mode) : Récupère un tableau deux dimensionnel de toutes les lignes de résultats dans un tableau associatif, numérique, ou les deux
    
    Fetch_array(Mode) 
    ----------------- 
    * Récupère la ligne suivante d'un ensemble de résultats sous forme de tableau associatif, numérique ou les deux
    * Chaque appel ultérieur à cette fonction renverra la ligne suivante, ou null s'il n'y a plus de lignes.
    * Si plusieurs colonnes ont le même nom, la dernière colonne écrasera les données précédentes.
    * Retourne null s'il n'y a plus de lignes - Retourne false en cas d'erreur.
    * Mode : ( MYSQLI_ASSOC :  associatif )  ( MYSQLI_NUM :  numérique ) ( MYSQLI_BOTH : à la fois associatif et numérique ).

    Fetch_assoc :
    -------------
    * Récupère la ligne suivante d'un ensemble de résultats sous forme de tableau associatif
    * Chaque appel ultérieur à cette fonction renverra la ligne suivante, ou null s'il n'y a plus de lignes.
    * Chaque clé du tableau représente le nom d'une des colonnes du jeu de résultats.
    * Renvoie null s'il n'y a plus de lignes dans le jeu de résultats.
    * Renvoie false en cas d'erreur.

    fetch_column :
    --------------
    *  récupérer une colonne unique de la prochaine ligne d'un jeu de résultats (result set) provenant d'une requête MySQL.
    *  mysqli_result::fetch_column(int $column = 0) : null|int|float|string|false
    *  Les appels ultérieurs renvoient les valeurs de la colonne suivante dans le jeu de résultats, ou false s'il n'y a plus de lignes.
    *  La fonction définit les champs NULL à la valeur PHP null lors de la récupération de données.
    
    fetch_row :
    -----------
    * Récupère une ligne de résultat sous forme de tableau indexé
    * Chaque nouvel appel retournera la prochaine ligne dans le jeu de résultats, ou null s'il n'y a plus de lignes.
    * Cette fonction définit les champs NULL à la valeur PHP null.
    * false si une erreur survient.

    fetch_Object : 

    Les autres Fonctions :
    ----------------------
    * mysqli_result::$num_rows -- mysqli_num_rows : Retourne le nombre de lignes dans le jeu de résultats
    

    # Les methods de Récuperer les informations sur les conoles d'un jeu de résultats :

    1) mysqli_result::$field_count - mysqli_num_fields : Récupère le nombre de champs dans l'ensemble de résultats


    2) mysqli_result::$lengths : 
    ----------------------------
    * Retourne la longueur des colonnes de la ligne courante du jeu de résultats.
    * Un tableau d'entiers représentant la longueur de chaque colonne (sans inclure les caractères null de fin).
    * Retourne False en cas d'erreur. 
    * Retourne False : Appelée avant les fonctions mysqli_fetch_row(), mysqli_fetch_array(), mysqli_fetch_object().
    * Retourne False : Appellée après avoir récupéré toutes les lignes du résultat.

    3) fetch_fields  :
    ------------------
    * Récupère les informations sur toutes les colonnes du jeu de résultats.
    * Retourne un tableau d'objets mysqli_field représentant chaque colonne.
    * Propriétés de l'objet : name - table - lenght - type

    4) fetch_field  :
    -----------------
    * Récupère les informations sur la colonne suivante du jeu de résultats.
    * Retourne un objet mysqli_field représentant la colonne.
    * obtenir des informations sur chaque colonne du jeu de résultats dans une boucle.
    * false si aucune information n'est disponible pour ce champs.
    
    5)  fetch_field_direct :
    ------------------------
    * mysqli_result::fetch_field_direct(int $index) : object | false
    * Retourne un objet qui contient les métadonnées d'un champ dans le jeu de résultats spécifié.
    * Le numéro du champ. Cette valeur doit être dans l'intervalle 0 à nombre de champs - 1.

    6) current_field :
    ------------------
    * Récupère la position courante d'un champ dans un pointeur de résultat
    * int $mysqli_result->current_field;
    * Retourne la position du curseur de champ utilisé par le dernier appel à la fonction mysqli_fetch_field().
    * Cette valeur peut être utilisée comme argument de la fonction mysqli_field_seek().
    * 



 **/

