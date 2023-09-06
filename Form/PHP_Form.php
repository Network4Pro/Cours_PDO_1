<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
       .champ{
        margin-bottom: 10px;
        }
    </style>
</head>
<body>
        <div class="champ">
            <form action="PHP_Form.php" method="" >
                <!-- Text : attribut( Required et Autofocus ) -->
                <label for="name" >Nom</label> <input type="text" id="name" required autofocus ><br>
                <!-- Password -->
                <label for="pass" >Password</label> <input type="password" id="pass" ><br>
                <!-- Radio -->
                <input type="radio" name="genre" value="Femme">Femme
                <input type="radio" name="genre" value="Homme" checked >Homme<br>
                <!-- checkbox -->
                <input type="checkbox" id="vehicle1" name="vehicle1" value="Bike">Bike
                <input type="checkbox" id="vehicle2" name="vehicle2" checked value="Car">Car<br>
                <!-- Button -->
                <input type="button" onclick="alert('Test Button Helo!')" value="Click Me!"><br>
                <!-- Color -->
                <label for="col" >Select Color :</label><input type="color" id="col" name="color"><br>
                <!-- Date -->
                <label for="Date_N" >Date_Naissance</label><input type="date" name="Date_N"><br>
                <!-- Email -->
                <label for="Email_N">Email : </label><input type="email" name="Email_N" ><br>
                <!-- Image -->
                <label for="Image_N">Image : </label><input type="image" src="../AA_100.jpg" width="80px" height="80px"  name="Image_N"><br>
                <!-- File -->
                <label for="File_N" >File : </label><input type="file" name="File_N"><br>
                <!-- Range -->
                Range : <input type="Range" name="vol" min="0" max="50"><br>
                <!-- Month -->
                <label for="Month">Month : </label><input type="month" name="Month" ><br>
                <!-- Number -->
                <label for="Nb_N" >Number : </label><input type="number" name="Nb_N" min="5" max="20" step="2" ><br>
                <!-- time -->
                Time : <input type="time" name="time_N" ><br>
                <!-- url -->
                url : <input type="url" name="url_N" ><br>
                <!-- week -->
                week : <input type="week" name="week_N" ><br>
                <!--attribut list datalist -->
                browsers : <input list="browsers">
                <datalist id="browsers">
                    <option value="Internet Explorer">
                    <option value="Firefox">
                    <option value="Chrome">
                </datalist><br>

                <!-- Element Select -->
                <label for="Equipe">Equipe : </label>
                <select id="Equipe" name="Equipe">
                    <optgroup label="Espagne">
                        <option value="Real">Real</option>
                        <option value="Barca" >Barca</option>
                    </optgroup>
                    <optgroup label="Maroc">
                        <option value="Raja" >Raja</option>
                    </optgroup>
                </select><br>

                <a href="TP.php">Vers TP.PHP </a><br>

                <!-- Element textarea  -->
                <label for="Avis">Avis : </label>
                <textarea id="Avis" name="Avis" rows="7" cols="10" ></textarea><br>

                <!-- Submit -->
                <input type="submit" value="Envoi" accesskey="s"><bt>
                <!-- Reset -->
                <input type="reset" >
            </form>
        </div>
</body>
</html>




<?php

/*
Form:
-----

    * Un formulaire HTML est utilisé pour collecter les entrées des utilisateurs.
    * Les entrées de l'utilisateur sont le plus souvent envoyées à un serveur pour traitement.

    - L'élément Html <form> :
    -------------------------
    * Utilisé pour créer un formulaire HTML pour la saisie de l'utilisateur .
    * Un conteneur pour différents types d'éléments de saisie.

    * HTML Form Attributes *
    ------------------------
    - 1) L' action  : attribut définit l'action à effectuer lors de la soumission du formulaire, lorsque l'utilisateur clique sur le bouton Soumettre.
    Astuce : Si l' actionattribut est omis, l'action est définie sur la page actuelle.

    - 2)  L' target  : attribut spécifie où afficher la réponse reçue après la soumission du formulaire.
    [
    _blank   : Réponse est affichée dans une nouvelle fenêtre ou un nouvel onglet
    _self (Valeur par dafult)   : Réponse est affichée dans la fenêtre actuelle.
    _parent  : Réponse est affichée dans le cadre parent
    ]

    - 3)  L' method  : Les valeurs get et post vont déterminer la méthode HTTP de transit des données du formulaire.
    * La méthode GET  : Données du formulaire annexées à l'URL action avec un séparateur ?.
    * La méthode POST : Données du formulaire envoyées comme corps de la requête.

    - 4) Element <label> :
    ======================
    * balise définit une étiquette pour de nombreux éléments du formulaire.
    * L'for attribut de la <label> balise doit être égal à l' id attribut de l'<input> élément pour les lier ensemble.

    - 5) Element Select : 
    =====================
    * L' <select>  : élément définit une liste déroulante.
    * Attribut size     : pour spécifier le nombre de valeurs visibles.
    * Attribut multiple : Attribut pour permettre à l'utilisateur de sélectionner plusieurs valeurs.
    * Par défaut, le premier élément de la liste déroulante est sélectionné.
    * Pour utiliser Multiple : name[]; pour envoi tableau 

    - Element option : 
    ==================
    * La <option> balise définit une option dans une liste de sélection.
    * <option> les éléments vont à l’intérieur d’un élément <select> , <optgroup> ou <datalist> .
    * Si aucune valeur n'est fournie, la valeur par défaut sera le texte contenu dans l'élément.
    * Pour définir une option présélectionnée, ajoutez l' selected attribut à l'option.

    
    - 6) Element optgroup :
    ========================
    * L'élément HTML <optgroup> : est utilisée pour regrouper les options associées dans un élément <select> (liste déroulante).
    * attribut label    : Le nom du groupe d'options qui peut être affiché par le navigateur.
    * attribut disabled : Spécifie qu'un groupe d'options doit être désactivé.


    - ELement textarea : 
    ====================
    * Elément définit un champ de saisie multiligne (une zone de texte).
    * Rows  : Attribut spécifie le nombre de lignes visibles dans une zone de texte.
    * Cols  : Attribut spécifie la largeur visible d'une zone de texte.


    - 7) L'élément <input> : élément peut être affiché de plusieurs manières, selon l' type attribut.
    ================================================================================================
    
    HTML Input Types
    -----------------
    * Text     : Définit un champ de saisie sur une seule ligne pour la saisie de texte.
    * password : Définit un champ mot de passe. Les caractères d'un champ sont masqués
    * submit   : Définit un bouton pour l'envoi des données du formulaire vers le serveur.
    * reset    : Définit un bouton de réinitialisation qui réinitialisera toutes les valeurs du formulaire à leurs valeurs par défaut.
    * button   : Définit un bouton.
    * color    : les champs de saisie qui doivent contenir une couleur.
    * Date     : les champs de saisie qui doivent contenir une date.
    * Datetime-local : Spécifie un champ de saisie de date et d'heure, sans fuseau horaire.
    * Email    : les champs de saisie qui doivent contenir une adresse e-mail. l'adresse e-mail peut être automatiquement validée.
    * Image    : Définit un champ de sélection de fichier et un bouton "Parcourir" pour les téléchargements de fichiers.
    * Hidden   : Définit un champ de saisie masqué (non visible pour un utilisateur).
    * Number   : Définit un champ de saisie numérique.
    * Month    : Permet à l'utilisateur de sélectionner un mois et une année.
    * range    : Un contrôle pour saisir un nombre dont la valeur exacte.
    * week     : permet à l'utilisateur de sélectionner une semaine et une année.
    * url      : est utilisé pour les champs de saisie qui doivent contenir une adresse URL.
    * time     : permet à l'utilisateur de sélectionner une heure (pas de fuseau horaire).
    * Checkbox : Définit une case à cocher. Sélectionner ZÉRO ou PLUS d'options. donner un nom différent à chaque case à cocher,
    * Radio    : Définit un bouton radio.  Sélectionner UNIQUEMENT UN choix.  Les options d'un même groupe possèdent le même nom


    HTML Input Attributes :
    -----------------------
    * Value       : Spécifie une valeur initiale pour un champ de saisie.
    * Readonly    : Spécifie qu'un champ de saisie est en lecture seule. La valeur sera envoyée lors de la soumission du formulaire !
    * Disabled    : Spécifie qu'un champ de saisie doit être désactivé. La valeur ne sera pas envoyée lors de la soumission du formulaire !
    * Size        : Spécifie la largeur visible, en caractères, d'un champ de saisie. 20 = par default. (text, search, tel, URL, email et password)
    * Maxlength   : spécifie le nombre maximum de caractères autorisés dans un champ de saisie.
    * Min - max   : Spécifient les valeurs minimales et maximales d'un champ de saisie. [  number, range, date, datetime-local, month, time , week ]
    * Multiple    : Spécifie  est autorisé à saisir plusieurs valeurs. input = [ Email - file ] et Element ( select ). 
    * placeholder : spécifie une courte indication qui décrit la valeur attendue d'un champ de saisie. [ text, date, search, url, tel, email, password ]
    * Required    : Spécifie qu'un champ de saisie doit être rempli avant de soumettre le formulaire.
    * Step        : Spécifie les intervalles de numéros légaux. [ number, range, date, datetime-local, month, time , week ]
    * Autofocus   : Spécifie qu'un champ de saisie doit automatiquement obtenir le focus lors du chargement de la page.
    * height - width : Spécifient la hauteur et la largeur d'un <input type="image">élément.
    * list        : Référence à un <datalist>élément qui contient des options prédéfinies pour un élément <input>.
    * checked     : il précise qu'un <input Radio ou checkbox > élément doit être présélectionné (coché) au chargement de la page. 

    Laissez le visiteur choisir une option : 
    ----------------------------------------
    * input checkbox  : Définit une case à cocher. Sélectionner ZÉRO ou PLUS d'options.
    * input Radio     : Définit un bouton radio.  Sélectionner UNIQUEMENT UN choix.
    * Element Select  : Elément est utilisé pour créer une liste déroulante..
    * pour select et checkbox attribut multiple utilise name[] envoi sous forme array.

        Traitement Formulaire PHP : 
        ---------------------------
        1 : L'attribut action de la balise <form> est renseigné par l'url du fichier PHP qui va recevoir les informations. 
        2 : Si l'on a affaire à un formulaire d'upload de fichiers, la balise <form> doit comporter l'attribut enctype et la valeur multipart/form-data. 
        3 : ( Attribut name ) : Tous les éléments d'un formulaire doivent posséder un attribut name rempli par une valeur. 
            Le nom du champ sera ensuite considéré par le script PHP comme une variable contenant la valeur saisie.
        
        * Method Get : 
        --------------- 
        Example : TP.php?Nom="Hamza"&Prenom="El-Khanchoufi"

        * Method Post :
        ----------------
        
        Content-Length : la taille du corps.
        Content-Type   : type de ressources envoyées au serveur. ( application/x-www-form-urlencoded ) 
        - Envoi les données sous forme de chaîne formatée comme de paires "clé=valeur" séparées par des (&) dans le corps de la requête.
        - Form iteam  =>   Key= "Name" , value = "Valeur"

        - La récupération des variables d’un formulaire : 
        -------------------------------------------------
        * Les données en provenance des formulaires sont stockées dans des variables spéciales de php qu’on appelle des arrays "super globaux".
        * Selon la méthode choisie pour la transmission du formulaire (POST ou GET), on utilise la variable $_POST ou $_GET.
        * Les valeurs sont indéxés dans ces arrays par le nom donné à l’input avec l’attribut NAME.
            

 
        */

?>