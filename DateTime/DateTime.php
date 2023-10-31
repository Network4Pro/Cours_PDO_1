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


    echo "<br><br>------------- Part 3 date et Time fonction ----------<br><br>";

    echo "<br><br>------------ Date_Add ------------<br><br>";
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
    echo "<br><br>=========================================================<br><br>";
    echo "Nombre years    : " . $i->y . "<br>"; # years
    echo "Nombre month    : " . $i->m . "<br>"; # month
    echo "Nombre days     : " . $i->d . "<br>"; # days
    echo "Nombre heurs    : " . $i->h . "<br>"; # heurs
    echo "Nombre minutes  : " . $i->i . "<br>"; # minutes
    echo "Nombre secondes : " . $i->s . "<br>"; # secondes

    echo "<br><br>-------------  Get date / Date_Parse---------------<br><br>";

    date_default_timezone_set("Africa/Casablanca");

    echo time() . "<br>";


    echo "<pre>";
    print_r (getdate());
    echo "</pre>";

    echo "<pre>";
    print_r ( date_parse("1995-02-31 5:25:20 UTTC"));
    echo "</pre>";
    
    
    /* 
        ? DateInterval : Représente un intervalle de dates
        ? ------------------------------------------------
        * propriétés : $y - $
    
        Les Methods : 
        -------------
        ? Date_interval_create_from_date_string : 
        ? ---------------------------------------
        * Configure un objet DateInterval à partir des parties d'une chaîne
        * date_interval_create_from_date_string(string $datetime): DateInterval|false
        * years - months - day - hours - munites - seconds 
    
    */

        echo "<br><br>------------ Date_Sub ------------<br><br>";
        date_default_timezone_set("Africa/Casablanca");
        $date = date_create();
        echo date_format($date,"Y/m/d H-i-s a") . "<br>";
        date_sub($date,date_interval_create_from_date_string("1 year 2 months 5 days"));
        echo date_format($date,"Y/m/d H-i-s a") . "<br>";

   
    /* 

        ? Date_create :
        ? -------------
        * Création d'un objet DateTime
        * Date_create(string $datetime = "now", ?DateTimeZone $timezone = null): DateTime|false
        * Renvoie une nouvelle instance DateTime.

        ? DateTime::sub :
        ? ---------------
        * Soustrait une durée à un objet DateTime. 
        * Date_sub(DateTime $Object , DateInterval $Interval) : DateTime 
        * Modifier l'objet DateTime spécifié, en soustrayant l'objet DateInterval spécifié.
        * 

        ? DateTime::Add :
        ? --------------
        * Modifie un objet un objet DateTime. 
        * Date_add(DateTime $object, DateInterval $interval): DateTime.
        * Ajoute la durée de l'objet DateInterval à l'objet DateTime.
        * Retourne l'objet modifié DateTime pour chainer les méthodes. 
    
        ? DateTime::modify :
        ? ------------------
        * Modifie un objet un objet DateTime. 
        * Date_modify(DateTime $object, string $modifier): DateTime|false.
        * Ajoute la durée de l'objet DateInterval à l'objet DateTime.
        * Retourne l'objet modifié DateTime pour chainer les méthodes ou false si une erreur survient.


        ? time() :
        ? ------- 
        * Retourne l'horodatage UNIX actuel
        * Retourne l'heure courante, mesurée en secondes depuis le début de l'époque UNIX 1970.
        

        ? getdate() :
        ? -------------
        * getdate(?int $timestamp = null): array
        * Retourne un array associatif contenant les informations de date et d'heure du timestamp
        * la date/heure courante locale si timestamp est omis ou null.


        ? date_parse() :
        ? --------------
        * analyse la chaîne datetime donnée selon les mêmes règles strtotime() et DateTimeImmutable::__construct().
        * Retourne un tableau associatif avec des informations détaillées sur une date/moment donnée
        * date_parse(string $datetime): array





        */



    echo "<br><br>------------ Date_Modify ------------<br><br>";
    date_modify($date,"+1 year");
    echo date_format($date,"Y/m/d H-i-s a") . "<br>";


    echo "<br><br>------------ Date Diff ------------<br><br>";
    $reg1 = date_create("2022-01-09");
    $reg2 = date_create("now");

    $diff = date_diff($reg1,$reg2);
    
    echo "<pre>";
    print_r($diff);
    echo "</pre>";

    echo "Jour est :" . $diff->days . "\n";


    echo "<br><br>------------ Date strtotime ------------<br><br>";
    echo date("Y-m-d H:i:s", strtotime("next friday")) . "<br>";
    echo date("Y-m-d H:i:s", strtotime("+1 year")) . "<br>";
    echo date("Y-m-d H:i:s", strtotime("tomorrow")) . "<br>";

?>

