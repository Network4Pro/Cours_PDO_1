<?php 

    echo "<pre>";

    $cars = array(
        "Youssef" => "Volvo",
        "Ahmed" => "BM",
        "Ilyass" => "Toyota",
        "Omar" => "Ahmed",
        "Nouhaile" => "Mouad" );
    
    print_r($cars);

    echo "<br>";
    # La fonction array_chunk() divise un tableau en morceaux de nouveaux tableaux.
    print_r(array_chunk($cars,2,true));

    echo "<br>";
    # Change toutes les clés d'un tableau en minuscules ou en majuscules.
    print_r(array_change_key_case($cars, CASE_UPPER));

    echo "<br>";
    #  crée un tableau en utilisant les éléments d'un tableau "clés" et d'un tableau "valeurs".
    $fname = ["Youssef","Jadore","Ilyass"];
    $age  = [18,39,20];
    $Tab = array_combine($fname,$age);
    print_r($Tab);
    
    echo "<br>";
    # La fonction array_count_values() compte toutes les valeurs d'un tableau.
    $tab = ["A","Cat","Dog","A","Dog"];
    print_r( array_count_values( $tab) );

    echo "<br>";
    $tab = ["Ahmed","Jadore","Ilyas"];
    # Inverse l'ordre des éléments d'un tableau
    print_r(array_reverse($tab));
    # les clés numériques seront préservées
    print_r(array_reverse($tab,true));

    echo "<br>";
    # Remplace les clés par les valeurs, et les valeurs par les clés
    $a1 = array( "a"=>"red" , "b"=>"green" , "c"=>"blue" , "d"=>"yellow" );
    $result = array_flip($a1);
    print_r($result);
    

    echo "<br>";
    # Renvoie le nombre d'éléments dans un tableau.
    # Mode 1 : count les elements du Multidimensional.
    $a1 = ["a","b",["A","C"]];
    echo "Count du Array est : " . count($a1,true) . "<br>";



    echo "<br>";
    #  Indique si une valeur appartient à un tableau
    $a1 = array( "a"=>"red" , "b"=>"24" , "c"=>"blue" , "d"=>"yellow" );
    echo in_array(24,$a1) ? "Exist" : "Pas Exist";
    echo "<br>";
    # vérifiera aussi que le type du paramètre needle correspond au type de la valeur.
    echo in_array(24,$a1,true) ? "Exist" : "Pas Exist";


    echo "<br>";
    # Vérifie si une clé existe dans un tableau
    $a1 = array( "87"=>"red" , "b"=>"24" , "c"=>"blue" , "d"=>"yellow" );
    echo array_key_exists("87",$a1) ? "Exist" : "Pas Exist";

    echo "<br>";


    echo "<br>";
    # La fonction renvoie un tableau contenant les clés.
    $a1 = array( "Ilyass"=>"98" , "b"=>"24" , "jadore" => 98 , "d"=>"blue" );
    #  Renovi un tableau contenant toutes les clés du tableau associatif passé en paramètre.
    print_r(array_keys($a1));
    #  Renvoi un tableau contenant les clés du tableau associatif où la valeur correspond
    print_r(array_keys($a1,"98"));
    # La comparaison stricte, les types de données doivent être identiques.
    print_r( array_keys($a1,"98",true));


    echo "<br>";
    $a1 = array( "87"=>"red" , "b"=>"24" , 87=>"blue" , "d"=>"yellow" );
    print_r(array_values($a1));


    echo "<br>";
    # Complète un tableau avec une valeur jusqu'à la longueur spécifiée
    $tab = ["Hamza","Jadore","Ilyas"];
    print_r(array_pad($tab,6,"@"));
    # Si length est positif, alors le tableau est complété à droite, s'il est négatif, il est complété à gauche
    print_r(array_pad($tab,-5,"@"));
    # Si la valeur absolue de length est plus petite que la taille du tableau array, alors le tableau n'est pas complété.
    print_r(array_pad($tab,3,"@"));





    echo "<br>";
    # La fonction calcule et renvoie le produit d'un tableau.
    # (int)chaine = 0
    $tab = [7,3,"Youssef",76];
    print_r( array_product($tab));


    echo "<br>";
    var_dump((float)"Youssef");



    echo "<br>";
    # 
    $tab = [9,13,"Youssef",76];
    print_r( array_sum($tab));




    # current - next - prev - end - pos - reset
    # ==========================================
    echo "<br>";
    $tab = ["Hamza","Jadore","Ilyas"];
    # Chaque tableau entretient un pointeur interne, qui est initialisé lorsque le premier élément est inséré dans le tableau.
    #  Retourne l'élément courant du tableau
    # Si le pointeur est au-delà du dernier élément de la liste, current() retourne false.
    echo current($tab) . "<br>";

    # Retourne la prochaine valeur du tableau suivant le pointeur interne, ou false s'il n'y a plus d'élément.
    echo next($tab) . "<br>";

    # Retourne la valeur précédente du tableau suivant le pointeur interne du tableau, ou false s'il n'y a plus d'élément.
    echo prev($tab) . "<br>";

    # Déplacer le pointeur interne du tableau array jusqu'au dernier élément et retourne sa valeur.
    echo end($tab) . "<br>";

    # alias de current()
    echo pos($tab) . "<br>";

    # reset() replace le pointeur de tableau array au premier élément et retourne la valeur du premier élément.
    echo reset($tab) . "<br>";




    echo "<br>";
    # Ajouter des éléments value1, ..., passés en argument au début du tableau array. 
    # Toutes les clés numériques seront modifiées afin de commencer à partir de zéro, tandis que les clés littérales ne seront pas touchées.
    # les éléments sont ajoutés comme un tout, et qu'ils restent dans le même ordre. 
    # Réinitialise le pointeur interne du tableau au premier élément.
    # Retourne le nouveau nombre d'éléments du tableau array.
    $tab = array("Hamza","Ilyass");
    array_unshift($tab,"Love","Hamza");
    print_r($tab);




    echo "<br>";
    # La fonction fusionne un ou plusieurs tableaux en un seul tableau.
    # Si deux éléments du tableau ou plus ont la même clé, le dernier remplace les autres.
    # si les tableaux contiennent des clés numériques, la valeur finale n'écrasera pas la valeur originale, mais sera ajoutée.
    $a1 = array("red","grenn");
    $a2 = array("blue","yellow");
    print_r(array_merge($a1,$a2));

    # Les clés numériques des tableaux d'entrées seront renumérotées en clés incrémentées partant de zéro dans le tableau fusionné.
    $a1 = array( 10 => "red", 20 => "Jadore");
    $a2 = array( 20 => "Blanc" );
    print_r( array_merge($a1,$a2));


    echo "<br>";
    # Si une clé du premier tableau existe dans l'un des tableaux suivants, sa valeur sera remplacée.
    # Si la clé n'existe pas dans le premier tableau, elle sera créée.
    # Si la clé n'existe que dans le premier tableau, elle sera laissée intacte.
    # Si plusieurs tableaux sont passés comme arguments de remplacement, ils seront traités dans l'ordre.
    $array = ["g1" => "Youssef", "g2" => "Ilyass" , "g3" => "Jadore"];
    $remplace = ["g1" => "Anwar" , "g4" => "Anwar"];
    print_r( array_replace($array,$remplace) );


    echo "<br>";
    $array = array( 10 => "red"   , 20 => "Jadore");
    $remplace = array( 30 => "Bleu"  , 20 => "Blanc" );
    print_r( array_replace($array,$remplace));
    

    echo "<br>";
    # Sélectionne une ou plusieurs valeurs au hasard dans un tableau et retourne la ou les clés de ces valeurs.
    # array_rand(array $array, int $num = 1): int|string|array
    # Spécifie le nombre d'entrées que vous voulez récupérer.
    $array = ["red","grenn","blue","yellow","brown"];
    $random_key = array_rand($array,3);
    print_r( $random_key );
    // echo $a[$random_key[0]]."<br>";
    // echo $a[$random_key[1]]."<br>";
    // echo $a[$random_key[2]]."<br>";

    $array_test = [ "Ahmed" => "A" , "Jadore" => "B" , "Ilyass" => "C"  ];
    print_r(array_rand($array_test,3));



    echo "<br>======== Array_shift   ============  <br>";

    # Extrait la première valeur du tableau array et la retourne, en raccourcissant array d'un élément, et en déplaçant tous les éléments vers le bas. 
    # Toutes les clés numériques seront modifiées pour commencer à zéro pendant que les clés litérales ne seront pas affectées.
    # Retourne la valeur dépilée, ou null si le tableau est vide ou si la valeur d'entrée n'est pas un tableau.
    # Cette fonction remet le pointeur au début du tableau d'entrée (équivalent de reset()).
    $array = ["Ahmed","Anwar","Jadore","Ilyass"];
    print_r($array);
    echo "Current : ". current($array) . "<br>";
    echo "End : " . end($array) . "<br>";
    echo "Current : " . current($array) . "<br>";
    $ar1 = array_shift($array);
    echo "Cuurent : " . current($array) . "<br>";
    print_r($array);

    echo "<br>";
    echo "<br>========  Array_Pop  ============  <br>";
    echo "<br>";
    # Dépile un élément de la fin d'un tableau
    # Retourne la valeur du dernier élément du tableau array : mixed
    $tab = ["Hamza","Jadore","Ilyas"];
    print_r( array_pop($tab) );


    echo "<br>";
    # 
    # 
    # 
    $array = ["Anwar","Youssef","Hamza"];
    print_r($array);


    echo "</pre>";