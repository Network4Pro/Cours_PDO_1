<?php 

    echo "<pre>";

    echo "Default Time zone : " . date_default_timezone_get() . "\n";

    echo "Date : " . date("d/m/Y h:i:s") . "\n";

    date_default_timezone_set("Africa/Casablanca");

    echo "Date : " . date("d/m/Y h:i:s") . "\n";

    echo "Default Time zone : " . date_default_timezone_get() . "\n";

    $d = date_create("",timezone_open("Europe/Moscow"));

    echo "Timezone : " . date_timezone_get($d)->getName()  . "  |  Date : ". date_format($d,"d/m/y h:i:s") . "\n";

    $d = date_create("10/10/2023 03:01:40");

    echo "Timezone : " . date_timezone_get($d)->getName()  . "  |  Date : ". date_format($d,"d/m/y h:i:s") . "\n";

    if( checkdate(03,29,2023) ) {  echo "date correct !! ";  } else { echo "Date pas Validé !!!"; }

    echo "</pre>";




    echo "<br> ------------- part 2 date format ---------- <br>";
    
    date_default_timezone_set("Africa/Casablanca");
    
    $d = date_create();

    # date_format : Retourne la date formatée, sous forme de chaîne de caractères, en cas de succès.


    # year
    echo date_format($d,"Y") . "<br>"; # 2023
    echo date_format($d,"y") . "<br>"; # 23

    echo "<br>";
    # Month
    echo date_format($d,"Y-m") . "<br>"; # 10
    echo date_format($d,"Y-M") . "<br>"; # Oct
    echo date_format($d,"Y-F") . "<br>"; # October
    echo date_format($d,"t") . "<br>"; # 31

    echo "<br>";
    # day
    echo date_format($d,"Y-m-d") . "<br>"; # (01-31) 10 (Avec 0)
    echo date_format($d,"Y-m-j") . "<br>"; # (01-31) 10 (sans 0)
    echo date_format($d,"Y-m-D") . "<br>"; # Tue
    echo date_format($d,"Y-m-l") . "<br>"; # Tuesday
    echo date_format($d,"Y-m-l z") . "<br>"; # 282 day of year
    echo date_format($d,"Y-m-S") . "<br>"; # th day of week

    echo "<br>";
    # Time
    echo date_format($d,"Y-m-d g a") . "<br>"; # g [1-12]  a => am\pm
    echo date_format($d,"Y-m-d h a") . "<br>"; # h [01-12] a => am\pm
    echo date_format($d,"Y-m-d G A") . "<br>"; # G [0-23]  A => Am\Pm
    echo date_format($d,"Y-m-d H A") . "<br>"; # H [00-23] A => Am\Pm
    # minut second micro
    echo date_format($d,"Y-m-d H:i:s u e") . "<br>"; # (i => Minutes [00-59] ) (s => Secondes [00-59] ) (u => micro second) 
    # L'identifiant du fuseau horaire
    echo date_format($d,"Y-m-d H:i:s u e P Z") . "<br>"; # e => fuseau horaire  ,  P => Différence avec l'heure Greenwich (GMT) 


    echo "<br> ------------- Part 3 date et Time fonction ---------- <br>";

    date_default_timezone_set("Africa/Casablanca");
    $d = date_create();
    date_add($d,date_interval_create_from_date_string("2 months"));
    date_add($d,date_interval_create_from_date_string("1 year"));
    date_add($d,date_interval_create_from_date_string("5 days"));
    date_add($d,date_interval_create_from_date_string("1 year 2 months 3 days"));
    echo date_format($d,"d-m-Y H:i:s e");

    echo "<br><br>-------------------------------------<br><br>";

    $i  = date_interval_create_from_date_string("3 years 2 months 1 day 6 hours 30 minutes 45 seconds");
    echo "Date Format : 3 years 2 months 1 day 1 hour 30 minutes 45 seconds";
    echo "<br>=========================================================<br>";
    echo "Nombre years    : " . $i->y . "<br>"; # years
    echo "Nombre month    : " . $i->m . "<br>"; # month
    echo "Nombre days     : " . $i->d . "<br>"; # days
    echo "Nombre heurs    : " . $i->h . "<br>"; # heurs
    echo "Nombre minutes  : " . $i->i . "<br>"; # minutes
    echo "Nombre secondes : " . $i->s . "<br>"; # secondes

  

    /* 
    ? DateInterval : Représente un intervalle de dates.
    * propriétés :


    */
    
?>

