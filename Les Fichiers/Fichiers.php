<?php 
   echo "<pre>";


    /* 
        ? Lire un fichier entièrement
        ? ---------------------------
    */


    # 1) Lire Fichier => tableau.
    echo "\n--------------------- fonction File() --------------------- \n";
    $fich2 = file("File.txt",);
    foreach($fich2 as $ligne ){
        echo $ligne;
    }


    # 2) Lire Fichier => Chaine de caractere.
    echo "\n----------------- fonction file_get_contents() ---------------\n";
    $fich3 = file_get_contents("File.txt");
    echo nl2br($fich3);

    var_dump($fich3);

    # 3) Lire Fichier => Envoi directement le contenu au Client. 
    echo "\n--------------------- fonction Readfile() ---------------------\n";
    // $Nb_Octet = readfile("File.txt");
    // echo "Nombre Octet est : " . $Nb_Octet . "\n"; 


    #4) Écrit des données dans un fichier
    file_put_contents("File.txt","Raja".PHP_EOL);
    file_put_contents("File.txt","Hamza".PHP_EOL,FILE_APPEND);



    /* 
        ? Ouvrir Fichier et 3.	Lire un fichier partie par partie
        ? -------------------------------------------------------
    */
    

    # Pour Ouvrir un fichier utiliser le fonction fopen ()
    # Abréviation de « file open » ou « ouverture de fichier » en français.
    $fich = fopen("File.txt","r+");


    #1) Fgetc : Lire caratcter par caractere avec Boucle While
    echo "\n---------------------- Fgetc ----------------------\n";
    if(!$fich){ die("Ouverture du Fichier Impossible !!!"); }
    while(!feof($fich)){
        echo fgetc($fich);
    }
    rewind($fich); # Remet le pointeur au début du fichier


    #2) Fgets : Lire ligne par ligne avec Boucle while 
    echo "\n---------------------- Fgets ----------------------\n";
    if(!$fich){ die("Ouverture du Fichier Impossible !!!"); }
    // Lire caratcter par caractere
    while(!feof($fich)){
        var_dump(fgets($fich));
    }
    rewind($fich); // Remet le pointeur au début du fichier


    # 3) Fread : Lire un fichier jusqu’à un certain point
    echo "\n---------------------- Fread ----------------------\n";
    $Contents = fread($fich,filesize("File.txt")) ;
    var_dump($Contents);

    # Fermer Fichier 
    fclose($fich);


    # Ecriture avec Fwrite  #
    # --------------------- # 
    
    #1) Ouvrir Fichier par fopen pour Lecture et Ecriture
    $fich = fopen("File.txt","ab+");

    echo "\n=========== Fwrite =============\n";
    if(is_writable("File.txt") ){
        $Nb_Octet = fwrite($fich,"Ajouter Chaine la fin fichier".PHP_EOL); // 31
        echo "Nb Octet Ajouter Est : ". $Nb_Octet . "\n";
    }
    
    fclose($fich);

   /* 
        ? La place du curseur interne ou pointeur de fichier
        ? -------------------------------------------------------
    */


    $fich2 = fopen("File.txt","r");
    echo "Position du curseur  : " . ftell($fich2) ; # 0
    echo fgetc($fich2);
    echo "Position du curseur  : " . ftell($fich2) ; # 1
    echo fgets($fich2); 
    echo "Position du curseur  : " . ftell($fich2) ; # 12
    fclose($fich2);


   /* 
        ? Déplacer le curseur manuellement
        ? --------------------------------
    */

    # Ouvrir Fichier :
    $stream = fopen("./File.txt","r"); 

    # Taille du fichier = 57
    echo "\n------------------ fielsize ----------------- \n";
    echo "Taille est : " . filesize("./File.txt") . "\n";

    echo "\n------------------- ftel ------------------ \n";
    echo "Position current du Curseur  : " . ftell($stream) . "\n"; # 0

    echo "\n ------------------- fseek -------------------- \n";
    # SEEK_SET : Offset => Position : 13
    fseek($stream,6);
    echo "Position du Curseur est : " . ftell($stream) . "\n"; # 6
    var_dump(fgets($stream)); # Hamza
    
    # SEEK_CUR : Current + Offset => Position : 13 + 10 = 23
    fseek($stream,10,SEEK_CUR);
    echo "Position du Curseur est : " . ftell($stream) . "\n"; # 23
    var_dump(fgets($stream));

    # SEEK_END : Eof + Offset [Negative] => Fielsize("Fich") + (-6) = 44 + (-6) = 38
    fseek($stream,-6,SEEK_END);
    echo "Position du Curseur est : " . ftell($stream) . "\n"; 
    var_dump(fgets($stream));


    /* 
        ? Manipulation des dossier et des fichiers de dossiers
        ? -----------------------------------------------------
    */

    echo "\n----------------------- Rename() --------------------\n";
    # Renomer ou deplacer :  un fichier ou un dossier
    echo rename("./Image.png","./16.png") ? "\nModifier Avec Sucess !!! \n" : "\n Pas Modifier L'emplacement Image\n";

    echo "\n-------------------- Copy() ---------------------------\n";
    # Copier un fichier
    echo copy("./16.png","./../Basic/Image.png") ? "\nCopier Fichier Avec Sucess!!": "\n Pas Copier Fichier !!!" ;

    echo "\n ---------------- unlink() ---------------- \n";
    # Supprimer un fichier
    if(file_exists("test.txt")) { unlink("test.txt"); echo "Fichier Supprimer Avec Sucess!!!"; }

    # Pour Dossier
    # -------------
    
    echo "\n ---------------- mkdir ----------------\n";
    # Creer un dossier
    echo (file_exists("./Test/")) ?  "Dossier déja Exists" : ( mkdir("./Test/test1",0777,true) ?  "Dossier creer Avec Sucess !!!" : "N'est pas Creer");

    echo "\n ---------------- mdir ----------------n";
    # Supprimer un Dossier
    if( rmdir("./Test/test1/") ) { echo "Dossier Supprimer Avec Sucess!!!\n"; }
    if( rmdir("./Test/") ) { echo "Dossier Supprimer Avec Sucess!!!\n"; }

    echo "\n------------------ rename Dossier ----------------------\n";
    rename("./Test","./Test_10");


    /* 
        ? Les fonxtions de verification de fichiers et de dossiers 
        ? --------------------------------------------------------
    */

    echo "\n============= Extraire les informations sur le fichier ================= \n";
   
    #  Extraire les informations sur le fichier  #
    # ------------------------------------------ #

    echo "\n ---------------- dirname et __file__ et __dir__ ----------------\n";
    echo "__FILE__ : ". __FILE__."\n";
    echo "Level 1 : " . dirname(__FILE__)."\n";
    echo "Level 2 : " . dirname(__FILE__,2)."\n";
    echo "Level 2 : " . dirname(__FILE__,3)."\n";
    echo "__dir__ : " . __DIR__  . "\n"; 


    echo "\n ---------------- pathinfo et basename ----------------n";
    print_r(pathinfo(__FILE__));
    echo "\n Basename : ". basename(__FILE__);
    

    echo "\n---------------- fstat ----------------n";
    print_r(fstat($fich));

    
    echo "\n---------------- filesize ----------------n";
    print_r(filesize("File.txt"));


    echo "\n---------------- file_exists ----------------n";
    # Verifier si un fichier ou un dossier exists 
    $filename = './File.txt';
    if (file_exists($filename)) {
        echo "Le fichier $filename existe.";
    } else {
        echo "Le fichier $filename n'existe pas.";
    }

    echo "\n---------------- IS_dir() ----------------n";
    # Verifier si le fichier est un dossier
    var_dump(is_dir("File.txt"));
    echo "\n";
    var_dump(is_dir("../Les Fichiers/"));


    echo "\n---------------- IS_File() ----------------n";
    # Verifier Si un fichier 
    var_dump(is_file("File.txt"));
    echo "\n";
    var_dump(is_file("../Les Fichiers/"));


    # Fermer Fichier 
    fclose($fich);

    echo "</pre>";




/*

! Ouvrir Fichier ------------------- 
! -----------------------------------

? Fopen() :
----------- 
* Ouvre un fichier ou une URL
* fopen( string $filename, string $mode ): resource|false
* crée une ressource nommée, spécifiée par le paramètre filename, sous la forme d'un flux.


? Le Mode => Type d'opération qu'il sera possible d'effectuer sur le fichier après ouverture.
---------------------------------------------------------------------------------------------
* r ( read )   :  Ouverture en lecture seule, le pointeur sera au début
* w ( write )  :  Ouverture en écriture seule, crée le fichier ou le vide avant écriture, pointeur au début
* a ( append ) :  Ouverture en écriture seule, crée le fichier si n'existe pas, pointeur à la fin si existe
* r+ : Ouverture en lecture et écriture, le pointeur sera au début
* w+ : Ouverture en rw, crée le fichier ou le vide avant écriture, pointeur au début
* a+ : Ouverture en lecture et écriture, crée le fichier si n'existe pas, pointeur à la fin (écrit à la suite du fichier)
* x  : 
* x+ : 
* NB : le fait de faire suivre le mode par la lettre b entre crochets indique que le fichier est traité de façon binaire.

? Resumer :
-----------
* r => lecture  => Pointeur au (Début). Si le fichier n'existe pas, génère une erreur.
* w => écriture => ( n'existe pas ) => Créer Fichier => ( existe ) => Vide =>  Pointeur au (Début)
* a => écriture => ( n'existe pas ) => Créer Fichier =>  (Fin)
* x => écriture => Créer Fichier => Pointeur au (Début). Si le fichier existe, génère une erreur.

* r+ => lecture + écriture => Pointeur au (Début). Si le fichier n'existe pas, génère une erreur.
* w+ => lecture + écriture =>  ( n'existe pas ) Créer Fichier => ( existe ) => Vide =>  Pointeur au (Début)
* a+ => lecture + écriture =>  ( n'existe pas ) => Créer Fichier  =>  Pointeur au (Fin)
* x+ => lecture + écriture => Créer Fichier => Pointeur au (Début). Si le fichier existe, génère une erreur.

! Lir le Fichier ------------------- 
! -----------------------------------

? feof() :
----------
* Retourne true si le pointeur handle est à la fin du fichier ou si une erreur survient, sinon, retourne false.


? fgetc() :
-----------
* Lit un caractère dans un fichier.
* Retourne une chaîne contenant un seul caractère, lu depuis le fichier pointé par stream. Retourne false à la fin du fichier.


? fgets() :
-----------
* Récupère la ligne courante à partir de l'emplacement du pointeur sur fichier
* Lenght : lit les données à partir du pointeur de fichier (stream) jusqu'à length - 1 octets.
* Si length et la fin du fichier est atteinte avant d'atteindre la taille spécifiée, s'arrête et renvoie les données lues jusqu'à ce point.
* Si length et la fin de la ligne est atteinte avant d'atteindre la taille spécifiée, arrête et renvoie les données lues jusqu'à la fin de la ligne.
* Si aucune longueur n'est spécifiée, la fonction lira le flux (stream) jusqu'à la fin de la ligne.
* false est retourné s'il n'y a plus de données à lire. Si une erreur survient, la fonction retourne false.

? fread - en mode binaire:
-------------------------
* lit jusqu'à length octets dans le fichier référencé par stream
* Fread(resource $stream, int $length): string|false
* La lecture s'arrête : length octets ont été lus - la fin du fichier est atteinte 
* Retourne la chaîne lue, ou false si une erreur survient.


? File() :
----------
* Lit le fichier et renvoie le résultat dans un tableau.
* Chaque élément du tableau correspond à une ligne du fichier.
* les retours-chariot sont placés en fin de ligne. 
* Si une erreur survient, file() retournera false.

? file_get_contents : 
---------------------
* file_get_contents(  string $filename, false, null, int $offset = 0, ?int $length = null ): string|false
* Lit tout un fichier dans une chaîne,à partir de la position offset, et jusqu'à length octets. 
* False : En cas d'erreur


? readfile : 
------------
* lire un fichier et envoyer son contenu directement vers la sortie [ le navigateur ] sans nécessiter beaucoup de mémoire.
* Retourne le nombre d'octets lus depuis le fichier en cas de succès, ou false si une erreur survient


! Fermer le Fichier ------------------- 
! -----------------------------------
? fclose() :
------------
* Ferme le fichier représenté par le pointeur stream.
* Retourne true en cas de succès ou false si une erreur survient.



! Ecrire dans le Fichier ------------------- 
! -----------------------------------


? File_put_contents : 
---------------------
* file_put_contents( string $filename, mixed $data, int $flags = 0 ): int | false
* Flags : FILE_APPEND (8); par default 0 
* Écrit des données dans un fichier
* Si le fichier filename n'existe pas, il sera créé. Sinon, le fichier existant sera écrasé, si l'option FILE_APPEND n'est pas définie.
* Fopen + Fwrite + Fclose
* Retourne le nombre d'octets qui ont été écrits au fichier, ou false si une erreur survient.

? fwrite - en mode biniare : 
----------------------------
* écrit le contenu de la chaîne data dans le fichier pointé par stream. en mode binaire
* retourne le nombre d'octets écrits ou false si une erreur survient.
* fwrite(resource $stream, string $data, ?int $length = null): int|false
* Si la longueur length est fournie, l'écriture s'arrêtera après length octets, ou à la fin de la chaîne (le premier des deux).

! Manipulation des fichiers et de dossier ------------------- 
! ----------------------------------------------------------

? mkdir : 
---------
* mkdir( string $directory, int $permissions = 0777,  bool $recursive = false ): bool
* retourne true en cas de succès ou false si une erreur survient.
* Crée un dossier
* Les permissions par défaut est 0777, permissions est ignoré sous Windows.

? unlink : 
----------
* Supprime un fichier
* Cette fonction retourne true en cas de succès ou false si une erreur survient.


? rmdir : 
---------
* rmdir(string $directory): bool
* Efface un dossier
* Retourne true en cas de succès ou false si une erreur survient

? Rename = deplacer : 
---------------------
* rename — Renomme un fichier ou un dossier
* Si vous renommez un fichier et que to existe, il sera écrasé. 
* Si vous renommez un répertoire et que to existe, cette fonction émet un avertissement.
* Cette fonction retourne true en cas de succès ou false si une erreur survient.

? copy : 
--------
* Fait une copie du fichier from vers le fichier to.
* Si vous souhaitez déplacer un fichier, utilisez la fonction rename().
* Cette fonction retourne true en cas de succès ou false si une erreur survient.

?  move_uploaded_file : 
-----------------------
* S'assure que le fichier from est un fichier téléchargé par HTTP POST. Si le fichier est valide, il est déplacé jusqu'à to.
* Si le fichier de destination existe déjà, il sera écrasé.
* Retourne true en cas de succès.
* False : Si from n'est pas valide, rien ne se passe.


! Verification dans le Fichier ------------------- 
! -----------------------------------

? file_exists : 
---------------
* Vérifie si un fichier ou un dossier existe. 
* file_exists(string $filename): bool
* Retourne true si le fichier ou le dossier ; false sinon.
* La vérification est effectuée en utilisant l'UID/GID réel au lieu de l'effectif.


? fielsize :
------------
* Lit la taille du fichier donné.
* filesize(string $filename): int|false
* Renvoie la taille du fichier filename en octets, ou false (et génère une erreur de niveau E_WARNING) en cas d'erreur.


? fstat = stat :
---------------
* fstat(resource $stream): array|false , Lit les informations sur un fichier à partir d'un pointeur de fichier
* stat(string $filename): array|false  , Renvoie les informations à propos d'un fichier
* Si une erreur survient, une alerte de type E_WARNING est émise.


? is_dir :
----------
* Indique si le fichier est un dossier. 
* Retourne true si le nom de fichier existe et que c'est un dossier, false sinon.
* Pour vérifier si un dossier existe 


? is_File : 
-----------
* Indique si le fichier est un véritable fichier
* Retourne true si le nom de fichier existe et que c'est un fichier régulier, false sinon.


? is_readable : 
---------------
* Indique si un fichier existe et est accessible en lecture
* Retourne true si le fichier ou le dossier spécifié par filename existe et est accessible en lecture, false sinon.

? __FILE__ : 
------------
* constante magique retourne le chemin complet et le nom du fichier du script en cours d'exécution.
* realpath() : Fonction équivalente à __FILE__ .

? __dir__  : 
------------
* Constante magique retourne le répertoire du fichier du script en cours d'exécution.


? dirname : 
-----------
* Renvoie le chemin du dossier parent
* dirname(string $path, int $levels = 1): string
* levels  :  Le nombre de dossiers parents plus haut. Doit être un entier supérieur à 0.


? Basename : 
------------
* Retourne le nom de la composante finale d'un chemin
* basename(string $path, string $suffix = ""): string
* Si suffix est fourni, le suffixe sera aussi supprimé.


? pathinfo : 
------------
* Retourne des informations sur un chemin système
* pathinfo(string $path, int $flags = PATHINFO_ALL): array|string


? realpath :
------------
* Retourne le chemin canonique absolu résolvant tous les liens symboliques 
* Remplaçant les références /./, /../, et / dans le chemin spécifié.
* Retourne false si une erreur survient.

! Déplacer le curseur manuellement ------------------- 
! ----------------------------------------------------

? fseek : 
---------
* Modifie la position du pointeur de fichier
* fseek(resource $stream, int $offset, int $whence = SEEK_SET): int
* Retourne 0 en cas de succès, et sinon -1.
* SEEK_SET : offset octets.
* SEEK_CUR : courante, ajoutée à offset octets.
* SEEK_END : courante par rapport à la fin du fichier, ajoutée de offset octets.
*  passer une valeur négative à offset et définir le paramètre whence à la valeur SEEK_END.

? ftell :  
---------
* Renvoie la position courante du pointeur de fichier
* Ftell(resource $stream): int|false
* Si une erreur survient, la fonction retournera false.

? rewind :
----------
* Replace le pointeur de fichier stream au début du flux.
* Rewind(resource $stream): bool
* Retourne true en cas de succès ou false si une erreur survient. 

? is_uploaded_file : 
--------------------
* Indique si le fichier a été téléchargé par HTTP POST.
* is_uploaded_file(string $filename): bool
*  Cette fonction retourne true en cas de succès ou false si une erreur survient.
* is_uploaded_file($_FILES['userfile']['tmp_name']


*/