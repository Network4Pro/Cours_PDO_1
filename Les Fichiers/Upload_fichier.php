<?php 
    if(isset($_POST["Submit"])){
      
        
    echo "<br><br>";  
    echo "<pre>"; print_r($_FILES); echo "</pre>";

      $name = $_FILES['upload']['name'];
      echo "Name Fichier : " . $name . "\n";

      $tmp_name = $_FILES['upload']['tmp_name'];
      echo "<br> Tmp Name : " . $tmp_name . "<br>";

      $chemin_dest = __dir__ . DIRECTORY_SEPARATOR . "Uploads/" . $name;
      
      $allowed_extensions = ['png' , 'jpg' , 'gif'];
      $ext = explode(".",$name);
      $ext = end($ext);

      if(in_array(strtolower($ext),$allowed_extensions)){
        move_uploaded_file($tmp_name,$chemin_dest);
      }

    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload</title>
</head>
<body>
    <form action="" method="POST" enctype="multipart/form-data" > 
        <div>
            <br>
            <label for="nom">Choissir Votre Fichier</label>
            <input type="file" id="nom" name="upload" >
        </div>
        <input type="submit" value="Valider" name="Submit" >
    </form>
</body>
</html>