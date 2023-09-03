<?php 
    error_reporting(0);
    mysqli_report(MYSQLI_REPORT_OFF);
    $connexion = mysqli_connect("localhost","root","Aa@123456","test_1");
    if(mysqli_connect_errno()){
        $errorMessage = mysqli_connect_error();
        echo "<script>alert('". addslashes($errorMessage) ."');</script>";
        exit();
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</head>
<body>
        <?php 

        if(isset($_REQUEST['submit'])){
            if(($_REQUEST['ID'] == "") || ($_REQUEST['Nom'] == "") || ($_REQUEST['Prenom'] == "") ){
                echo "<script>alert('Fill all fields...');</script>";
        }
        else{
            $result = mysqli_prepare($connexion,"Insert into post(ID,Nom,Prenom) values(?,?,?)");
            if($result){
               mysqli_stmt_bind_param($result,"iss",$ID,$Nom,$Prenom);
                $ID     = $_REQUEST['ID'];
                $Nom    = $_REQUEST['Nom'];
                $Prenom = $_REQUEST['Prenom'];
                mysqli_stmt_execute($result);
                echo mysqli_stmt_affected_rows($result)."Rows Ajouter";
                mysqli_stmt_close($result);
            }
            else{
                echo "Not Inserted";
            }
        }

       }

         $result = mysqli_query($connexion,"select * from post");
         if(mysqli_errno($connexion)){  
            $errorMessage = mysqli_error($connexion);
            echo "<script>alert('". addslashes($errorMessage) ."');</script>"; 
            exit();
        }
         $results = mysqli_fetch_all($result,1);
        ?>

        <div class="container">
            <div class="row">
                <div class="col-sm-4">
                        <form action="Demo.php" method="POST">
                            <div class="mb-3">
                                <label for="ID" class="form-label">ID</label>
                                <input type="text" class="form-control"name="ID">
                            </div>
                            <div class="mb-3">
                                <label for="Nom" class="form-label">Nom</label>
                                <input type="text" class="form-control" name="Nom">
                            </div>
                            <div class="mb-3">
                                <label for="Prenom" class="form-label">Prenom</label>
                                <input type="text" class="form-control" name="Prenom">
                            </div>
                            <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
                <div class="col-sm-6 offset-sm-2">
                <table class="table">
                    <thead class="table-dark">
                        <tr>
                            <th>ID</th>
                            <th>Nom</th>
                            <th>Prenom</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($results as $row): ?>
                        <tr>
                            <td><?php echo $row['ID']; ?></td>
                            <td><?php echo $row['Nom']; ?></td>
                            <td><?php echo $row['Prenom']; ?></td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
                </div>
            </div>
        </div>
</body>
</html>