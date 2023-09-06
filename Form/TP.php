<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="POST" >

       <!-- Traitement Text --> 
        <label for="Nom" >Nom : </label><input type="text" value="ANWAR" name="Nom" required > <br>
        <label for="Prenom" >Prenom : </label><input type="text" value="JADOR" name="Prenom" required > <br>
       
        <!-- Traitement Radio -->
        Genre : <input type="radio" name="Genre"  value="Homme">H
        <input type="radio" name="Genre" value="Femme" >F <br>
        
        <!-- Traitement Checkbox -->
        BAC+2<input type="checkbox" name="Niveau" value="BAC+2">
        BAC+3<input type="checkbox" name="Niveau" value="BAC+3"><br>
        
        <!-- Traitement Select -->
        <label for="EQUIPE" >EQUIPE : </label>
        <select id="EQUIPE"  name="EQUIPE" >
            <optgroup label="Equipe">
                <option value="RAJA">RAJA</option>
                <option value="BARCA">BARCA</option>
                <option value="OCS" >OCS</option>
            </optgroup>
        </select><br>

        <!-- Button Envoi -->
        <input type="submit" name="Envoi" value="Envoi" >

    </form>
</body>
</html>

<br><br>

<?php 

    try{
        
        $connexion = new PDO("mysql:host=localhost","root","Aa@123456");
        $connexion->exec("CREATE DATABASE IF NOT EXISTS PERSONNES");

        $connexion->exec("USE PERSONNES");

        $connexion->exec("CREATE TABLE IF NOT EXISTS Personne(
            ID INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            Nom VARCHAR(30), 
            Prenom VARCHAR(30), 
            Genre VARCHAR(30), 
            Niveau VARCHAR(30), 
            EQUIPE VARCHAR(30))");

        if( $_SERVER["REQUEST_METHOD"] == "POST" && $_POST["Envoi"] ){

            if( isset($_POST["Nom"]) && isset($_POST["Prenom"]) && isset($_POST["Genre"]) ) {
                $Nom = $_POST["Nom"];
                $Prenom = $_POST["Prenom"];
                $Genre = $_POST["Genre"];
                $Niveau = $_POST["Niveau"];
                $Equipe = $_POST["EQUIPE"];

                $stm = $connexion->prepare("INSERT INTO personne(NOM,Prenom,Genre,Niveau,EQUIPE) 
                values(:Nom,:Prenom,:Genre,:Niveau,:EQUIPE)");

                $stm->bindParam(":Nom",$Nom);
                $stm->bindParam(":Prenom",$Prenom);
                $stm->bindParam(":Genre",$Genre);
                $stm->bindParam(":Niveau",$Niveau);
                $stm->bindParam(":EQUIPE",$Equipe);

                if($stm->execute()) { echo "Ajouter Bien Sucess"; }

            }
        }


    }
    catch(PDOException $ex){
        echo "Errore : ". $ex->getMessage();
    }
    finally{
        $connexion = null;
    }



?>

