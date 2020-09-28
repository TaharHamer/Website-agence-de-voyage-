<html>
<head>
        
    <title>DEPENSES</title>
    <link rel="stylesheet" href="css/depstyle.css">
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
        <form name="insert" action="depenses.php" method="POST" >
        <div class="booking-form-box">

            <div class="booking-form">
            
            
                <label>Nom Client :</label>
                <input type="text" name="nom" class="form-control" placeholder="Nom Client">

                <div class="input-grp">
                    <button type="submit" name="chercher" class="btn btn-primary flight">Rechercher</button>
                </div>
            </div>        
        </div>
    </form>
<table>
    <tr>
        <th>Nom Client</th>
        <th>ID Sejour</th>
        <th>Tarif</th>
        <th>Prix</th>
        <th>Dépenses totales :</th>
    </tr>

<?php

    $myPDO = new PDO("pgsql:host=localhost;dbname=agence","postgres","1234");
    
    if(isset($_POST['chercher'])){ 

        if(!empty($_POST['nom'])){

                $nom = isset($_POST['nom']) ? $_POST['nom'] : NULL;

                $sqll = "SELECT client.nom, sejour.id_sejour, station.tarif, proposition.prix, station.tarif + proposition.prix
                FROM sejour JOIN client ON sejour.id_cli_sej = client.id_client
                JOIN station ON sejour.id_sta_sej = station.id_station 
                JOIN proposition ON station.id_station = proposition.id_sta_pro WHERE nom='$nom'";
                $result=$myPDO->query($sqll);

                while($row=$result->fetch(PDO::FETCH_ASSOC)){
                    echo "<tr><td>". $row['nom']."</td><td>". $row['id_sejour'] ."</td><td>".$row['tarif']."</td><td>". $row['prix'] ."</td><td>".($row['tarif'] + $row['prix'])."</td></tr>";
                }
                
        }

        else{

                $sql = "SELECT client.nom, sejour.id_sejour, station.tarif, proposition.prix, station.tarif + proposition.prix
                FROM sejour JOIN client ON sejour.id_cli_sej = client.id_client
                JOIN station ON sejour.id_sta_sej = station.id_station 
                JOIN proposition ON station.id_station = proposition.id_sta_pro ORDER BY nom";
                $result=$myPDO->query($sql) ;
                
                while($row=$result->fetch(PDO::FETCH_ASSOC)){
                            echo "<tr><td>". $row['nom']."</td><td>". $row['id_sejour'] ."</td><td>".$row['tarif']."</td><td>". $row['prix'] ."</td><td>".($row['tarif'] + $row['prix'])."</td></tr>";
                }
                    
        }    
    }

?>
</table>
</section>
   

</body>
</html>
