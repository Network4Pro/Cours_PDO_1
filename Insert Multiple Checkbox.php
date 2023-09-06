<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card mt-5">
                    <div class="card-header">
                        <h4>How To Insert Multiple Checkbox into Database in php</h4>
                    </div>
                    <div class="card-body">
                    <form action="" method="POST" >
                        <div class="form-group">
                            <span>Equipe</span><br>
                            <input type="checkbox" name="Equipe[]" value="Raja" >Raja<br>
                            <input type="checkbox" name="Equipe[]" value="Real" >Real<br>
                            <input type="checkbox" name="Equipe[]" value="Wac" >Wac<br>
                        </div>
                        <div class="form-group">
                            <label for="gender" >Gender</label>
                            <select name="gender" id="gender" class="form-control">
                                <option value="0" >--Select Gender</option>
                                <option value="Homme" >Homme</option>
                                <option value="Femme" >Femme</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="Branche" >Equipe</label>
                            <select name="Branche[]" id="Branche" multiple class="form-control">
                                <option value="0" >--Select Equipe</option>
                                <option value="TDI" >TDI</option>
                                <option value="TRI" >TRI</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <button type="submit" name="save_multiple_checkbox" class="btn btn-primary" >Save Multiple Checkbox!!</button>
                        </div>
                    </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
   
</body>
</html>

<?php 

    session_start();
    
    if(isset($_POST["save_multiple_checkbox"])){

        // Insert Checkbox. multiple choix
        if( isset($_POST["Equipe"])){
            $Equipe = $_POST["Equipe"];
            echo "Equipes : ";
            foreach($Equipe as $val){
                echo " - " . $val;
            }
        }

        echo "<br>";

        // Insert Select .
        if(isset($_POST["gender"]) && $_POST["gender"] != 0 ){
            echo "Selection est  : ". $_POST["gender"];
        }

        echo "<br>";

        // Insert Select . multiple choix 
        if( isset($_POST["Branche"]) && $_POST["Branche"] != 0){
            echo "Branche : ";
            foreach($_POST["Branche"] as $Equipe){
                echo " - ". $Equipe;
            }
        }
    }



?>