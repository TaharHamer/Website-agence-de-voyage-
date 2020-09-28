<html>
<head>
        
    <title>SEJOURS</title>
    <link rel="stylesheet" href="css/sejstyle.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <meta name="viewport" content="width=device-widthn initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
</head>

<body>
    <section class ="header">
        <div class="container">
                <button type="button" class="login-btn">Login</button>
                <a class="logo" href="index.php"><img src="img/img_logo/3618303.png" alt="logo"></a>
                <nav>
                    <ul class="nav__links">
                        <li><a href="Vols.php">Clients</a></li>
                        <li><a href="station.php">Stations</a></li>
                        <li><a href="sejour.php">Séjours</a></li>                        
                        <li><a href="activite.php">Activités</a></li>
                        <li><a href="depenses.php">Dépenses</a></li>
                    </ul>
                </nav>         
        </div>
    </section>
    <form name="insert" action="sejour.php" method="POST" >
        <div class="booking-form-box">

            <div class="booking-form">
            
            
                <label>ID Séjour :</label>
                <input type="number" name="id_sejour" class="form-control" placeholder="ID Sejour">
                        
                <label>Départ le :</label>
                <input type="date" name="debut" class="form-control select-date">        
                
                <label>Nombre des places :</label>
                <input type="number" name="nbplaces" class="form-control" placeholder="Nombre des places">  

                <label>ID Client :</label>
                <input type="number" name="id_cli_sej" class="form-control" placeholder="ID Client">

                <label>ID Station :</label>
                <input type="number" name="id_sta_sej" class="form-control" placeholder="ID Station">    
                
                <div class="input-grp">
                    <button type="submit" name="chercher" class="btn btn-primary flight">Rechercher</button>
                </div>
            </div>        
        </div>
    </form>
<table>
    <tr>
        <th>Id Sejour</th>
        <th>Depart le</th>
        <th>Nb Places</th>
        <th>ID Client</th>
        <th>ID Station</th>
    </tr>

<?php

    $myPDO = new PDO("pgsql:host=localhost;dbname=agence","postgres","1234");

    if(isset($_POST['chercher'])){

        if(!empty($_POST['id_sta_sej']) ){

            $id_sejour = isset($_POST['id_sejour']) ? $_POST['id_sejour'] : NULL;
            $debut = isset($_POST['debut']) ? $_POST['debut'] : NULL;
            $nbplaces = isset($_POST['nbplaces']) ? $_POST['nbplaces'] : NULL;
            $id_cli_sej = isset($_POST['id_cli_sej']) ? $_POST['id_cli_sej'] : NULL;
            $id_sta_sej = isset($_POST['id_sta_sej']) ? $_POST['id_sta_sej'] : NULL;

            $query = "INSERT INTO sejour VALUES ('$id_sejour','$debut','$nbplaces','$id_cli_sej','$id_sta_sej')";
            $myPDO-> query($query); 

            $sqll = "SELECT * FROM sejour where id_sta_sej='$id_sta_sej' ORDER BY id_sejour";
            $result=$myPDO->query($sqll) ;

            while($row=$result->fetch(PDO::FETCH_ASSOC)){
                echo "<tr><td>". $row['id_sejour']."</td><td>". $row['debut']."</td><td>". $row['nbplaces']."</td><td>". $row['id_cli_sej']."</td><td>".$row['id_sta_sej']."</td></tr>";
            }
            
        }
        elseif(!empty($_POST['id_cli_sej'])){
            $id_sejour = isset($_POST['id_sejour']) ? $_POST['id_sejour'] : NULL;
            $debut = isset($_POST['debut']) ? $_POST['debut'] : NULL;
            $nbplaces = isset($_POST['nbplaces']) ? $_POST['nbplaces'] : NULL;
            $id_cli_sej = isset($_POST['id_cli_sej']) ? $_POST['id_cli_sej'] : NULL;
            $id_sta_sej = isset($_POST['id_sta_sej']) ? $_POST['id_sta_sej'] : NULL;

            $query = "INSERT INTO sejour VALUES ('$id_sejour','$debut','$nbplaces','$id_cli_sej','$id_sta_sej')";
            $myPDO-> query($query); 

            $sqll1 = "SELECT * FROM sejour where id_cli_sej='$id_cli_sej' ORDER BY id_sejour";
            $result=$myPDO->query($sqll1) ;

            while($row=$result->fetch(PDO::FETCH_ASSOC)){
                echo "<tr><td>". $row['id_sejour']."</td><td>". $row['debut']."</td><td>". $row['nbplaces']."</td><td>". $row['id_cli_sej']."</td><td>".$row['id_sta_sej']."</td></tr>";
            }
        }
        elseif(!empty($_POST['id_sejour'])){
                $id_sejour = isset($_POST['id_sejour']) ? $_POST['id_sejour'] : NULL;
                $debut = isset($_POST['debut']) ? $_POST['debut'] : NULL;
                $nbplaces = isset($_POST['nbplaces']) ? $_POST['nbplaces'] : NULL;
                $id_cli_sej = isset($_POST['id_cli_sej']) ? $_POST['id_cli_sej'] : NULL;
                $id_sta_sej = isset($_POST['id_sta_sej']) ? $_POST['id_sta_sej'] : NULL;
    
                $query = "INSERT INTO sejour VALUES ('$id_sejour','$debut','$nbplaces','$id_cli_sej','$id_sta_sej')";
                $myPDO-> query($query); 
    
                $sqll2 = "SELECT * FROM sejour where id_sejour='$id_sejour' ORDER BY id_sejour";
                $result=$myPDO->query($sqll2) ;
    
                while($row=$result->fetch(PDO::FETCH_ASSOC)){
                    echo "<tr><td>". $row['id_sejour']."</td><td>". $row['debut']."</td><td>". $row['nbplaces']."</td><td>". $row['id_cli_sej']."</td><td>".$row['id_sta_sej']."</td></tr>";
                }
        }
        else{

        $sql = "SELECT * FROM sejour ORDER BY id_sejour";
        $result=$myPDO->query($sql) ;

            while($row=$result->fetch(PDO::FETCH_ASSOC)){
                echo "<tr><td>". $row['id_sejour']."</td><td>". $row['debut']."</td><td>". $row['nbplaces']."</td><td>". $row['id_cli_sej']."</td><td>".$row['id_sta_sej']."</td></tr>";
            }
      
        }

    }
 ?>
</table>
</body>
</html>