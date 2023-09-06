<?php


/*

    Style orienté objet : 
    ---------------------

    1) Ouvre une connexion à un serveur MySQL.
    ------------------------------------------


   
    mysqli::$insert_id      : Retourne la valeur généré pour une colonne AUTO_INCREMENT par la dernière requête.
    mysqli::$affected_rows  : Retourne le nombre de lignes affectées par la dernière opération MySQL.
    

    
    Style procédural :
    ------------------

    1) Ouvre une connexion à un serveur MySQL.


    * mysqli_insert_id         : Retourne la valeur généré pour une colonne AUTO_INCREMENT par la dernière requête.
    [ Dans le cas des requêtes multilignes INSERT, ceci retourne la première valeur automatiquement généré qui a été inséré avec succès.]
    * Mysqli_affected_rows — Retourne le nombre de lignes affectées par la dernière opération MySQL
    

    Style orienté objet : 
    ---------------------

    * mysqli::prepare             : Prépare une requête SQL pour l'exécution
    * mysqli_stmt::bind_param     : Lie des variables à une requête MySQL
    * mysqli_stmt::bind_result    : Lie des variables à un jeu de résultats


    Style procédural :
    -----------------
    
    * mysqli_field_tell    : Retourne la position du curseur de champ utilisé par le dernier appel à la fonction mysqli_fetch_field(). 

    * mysqli_prepare           :  Prépare une requête SQL pour l'exécution. return object(Mysqli_stm)  




    Les requêtes préparées : 
    ------------------------
    * classe mysqli_stmt :
    ----------------------
    
    * La classe mysqli_stmt est utilisée pour préparer et exécuter des requêtes SQL de manière sécurisée et efficace. 
    
    * mysqli_stmt_execute      :  Exécute une requête préparée.
    * mysqli_stmt_bind_param   :  Lie des variables à une requête MySQL. true ou false
    * mysqli_stmt_bind_result  :  Lie des variables à un jeu de résultats.
    [Type de paramettres : string : s   et  int: i  et float: d  et BLOB: b ]
    * mysqli_stmt_fetch        :  Lit des résultats depuis une requête MySQL préparée dans des variables liées
    [ le protocole MySQL place les données dans les variables spécifiées var/vars ]
    * mysqli_stmt_store_result : Stocke un ensemble de résultats dans un tampon interne.
    * mysqli_stmt_get_result   : Récupère un jeu de résultats depuis une requête préparée en tant qu'objet mysqli_result
    * mysqli_stmt_free_result  : Libère le résultat MySQL de la mémoire.
    * mysqli_stmt_error        : Retourne une description à la dernière opération sur la requête préparée spécifiée par l'objet mysqli_stmt.
    * mysqli_stmt_errno        : Retourne un code erreur à la dernière opération sur la requête préparée spécifiée par l'objet mysqli_stmt.
    * mysqli_stmt_close        : Termine une requête préparée.
    
    
    Marqueursde Paramètres :
    ---------------------------------
    Les marqueurs interrogatifs sont des symboles de point d'interrogation (?) qui représentent les paramètres 
    dans l'ordre où ils apparaissent dans la requête. 
    Par exemple, le premier marqueur sera remplacé par le premier paramètre, le deuxième marqueur par le deuxième paramètre,

    
    Style orienté objet : 
    ---------------------
    
    * mysqli_stmt::execute       : Exécute une requête préparée.
    * mysqli_stmt::bind_result   : Lie des variables à un jeu de résultats.
    * mysqli_stmt::fetch         : Lit des résultats depuis une requête MySQL préparée dans des variables liées
    * mysqli_stmt::store_result  : Stocke un ensemble de résultats dans un tampon interne.
    * mysqli_stmt::get_result    : Récupère un jeu de résultats depuis une requête préparée en tant qu'objet mysqli_result.
    * mysqli_stmt::free_result   : mysqli_stmt_free_result — Libère le résultat MySQL de la mémoire.
    * mysqli_stmt::$errno        : Retourne un code erreur à la dernière opération sur la requête préparée spécifiée par l'objet mysqli_stmt.
    * mysqli_stmt::$error        : Retourne une description de la dernière erreur de traitement
    * mysqli_stmt::close         : Termine une requête préparée.

    NB :
    ---- 
    ** Toutes les colonnes doivent être liées après l'exécution de la fonction mysqli_stmt_execute() 
    et avant l'appel à la fonction mysqli_stmt_fetch().
    ** Une colonne peut être associée ou réassociée à tout moment, même après une lecture partielle du résultat.
     La nouvelle association prend effet au prochain appel de mysqli_stmt_fetch().
    ** mysqli_stmt_get_result ne peut pas être utilisée conjointement avec la mysqli_stmt_store_result(). 
    

*/


$host = "localhost";
$db = "test_1";
$user = "root";
$pasw = "Aa@123456";

// 

    echo "<pre>";
    //error_reporting(0);
    //mysqli_report(MYSQLI_REPORT_OFF);


    //$cnx = mysqli_connect($host,$user,$pasw,$db) or die(mysqli_connect_error() . "  " . mysqli_connect_errno() );
    
    //$cnx2 = new mysqli($host,$user,$pasw);


    try{

        $connexion = new mysqli($host,$user,$pasw,$db);
        $result = $connexion->query("select * from post");
        while($row = $result->fetch_assoc()){
            echo "ID: ".$row["ID"] . "|";
            echo "ID: ".$row["Nom"] . "|";
            echo "ID: ".$row["Prenom"] . "<br>";
            
             foreach ($result->lengths as $length) {
                    echo $length . " ";
            }

            echo "<br><br>";
        }

        echo "Les infomations sur les Resultas<br>";
        echo "* Nb lignes    : ". $result->num_rows."\n";
        echo "* Nb de clones : ". $result->field_count."\n";

        // Ajouter ligne : 
        $stm = $connexion->prepare("INSERT INTO post(ID,Nom,Prenom) VALUES (?,?,?)"); // return mysqli_stm
        $stm->bind_param("iss",$ID,$Nom,$prenom);
        $ID = 240; $Nom = "ILYASS"; $prenom = "EL-Khanchoufi";
        if($stm->execute()){ echo "Ajouter Bien Success!!!\n"; }


       // Update Ligne : 
       $stm = $connexion->prepare("UPDATE post set Nom=? , Prenom = ? where ID = ? ");
       $stm->bind_param("ssi",$Nom,$Prenom,$ID);
       $ID = 100; $Nom = "ILYASS"; $Prenom = "EL-Khanchoufi";  
       if($stm->execute()){ echo "Update Bien Sucess\n"; };
       
       // Delete Ligne : 
       $stm = $connexion->prepare("DELETE FROM post where ID>?");
       $stm->bind_param("i",$ID);
       $ID = 200;
       if($stm->execute()){ echo "DELETE Bien Sucess\n"; };


        $result->close();

    }catch(PDOException $ex){
        echo("Errore : ".$ex->getMessage());
    }
    finally{ $connexion->close();  }








echo "</pre>"





?>