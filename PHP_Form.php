<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="" >
        <!-- Text -->    
        <label for="name" >Nom</label> <input type="text" id="name" ><br>
        <!-- Password -->
        <label for="pass" >Password</label> <input type="password" id="pass" ><br>
        <!-- Radio -->
        <input type="radio" name="genre" value="Femme">Femme
        <input type="radio" name="genre" value="Homme">Homme<br>
        <!-- checkbox -->
        <input type="checkbox" id="vehicle1" name="vehicle1" value="Bike">Bike
        <input type="checkbox" id="vehicle2" name="vehicle2" value="Car">Car<br>
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
        <!-- Submit -->
        <input type="submit" value="Envoi"><bt>
        <!-- Reset -->
        <input type="reset" >
    </form>
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
        
    - La <label> :
    --------------
        * balise définit une étiquette pour de nombreux éléments du formulaire.
        * L'for attribut de la <label> balise doit être égal à l' id attribut de l'<input> élément pour les lier ensemble.

        
    - L'élément <input> : élément peut être affiché de plusieurs manières, selon l' type attribut.
        HTML Input Types
        -----------------
        * Text     : Définit un champ de saisie sur une seule ligne pour la saisie de texte.
        * password : Définit un champ mot de passe. Les caractères d'un champ sont masqués
        * submit   : Définit un bouton pour soumettre les données du formulaire à un gestionnaire de formulaire (Comme php).
        * reset    : Définit un bouton de réinitialisation qui réinitialisera toutes les valeurs du formulaire à leurs valeurs par défaut.
        * Radio    : Définit un bouton radio.  Sélectionner UNIQUEMENT UN choix.
        * checkbox : Définit une case à cocher. Sélectionner ZÉRO ou PLUS d'options.
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
        





*/

?>