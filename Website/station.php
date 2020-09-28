<html>
    <head>
            
        <title>STATIONS</title>
        <link rel="stylesheet" href="css/StatStyle.css">
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
    <form name="insert" action="station.php" method="POST" >
        <div class="booking-form-box">
            
            <div class="booking-form">

                <label>ID Station :</label>
                <input type="number" name="id_station" class="form-control" placeholder="ID Station">

                <label>Nom Station</label>
                <input type="text" name="nom_station" class="form-control" placeholder="Ex: StationA, StationB, StationC ...">

                <label>Region :</label>
                <input type="text" name="region" class="form-control" placeholder="Ex: RegionA, RegionB, RegionC ...">

                <label>Capacite de la station</label>
                <input type="number" name="capacite" class="form-control" placeholder="Capacité">

                <label>Tarif</label>
                <input type="number" name="tarif" class="form-control" placeholder="Tarif">

                <div class="input-grp">
                    <button type="submit" name="chercher" class="btn btn-primary flight">Rechercher</button>
                </div>
            </div>
            
        </div>
    </form>
<table>
    <tr>
        <th>Id Station</th>
        <th>Nom Station</th>
        <th>Region</th>
        <th>Capacité</th>
        <th>Tarif</th>
    </tr>

<?php

    $myPDO = new PDO("pgsql:host=localhost;dbname=agence","postgres","1234");
    
    if(isset($_POST['chercher'])){ 
    
        if(!empty($_POST['region']) || !empty($_POST['nom_station'])){

            $id_station = isset($_POST['id_station']) ? $_POST['id_station'] : NULL;
            $nom_station = isset($_POST['nom_station']) ? $_POST['nom_station'] : NULL;
            $region = isset($_POST['region']) ? $_POST['region'] : NULL;
            $capacite = isset($_POST['capacite']) ? $_POST['capacite'] : NULL;
            $tarif = isset($_POST['tarif']) ? $_POST['tarif'] : NULL;

            $query = "INSERT INTO station VALUES ('$id_station','$nom_station','$region','$capacite','$tarif')";
            $myPDO-> query($query); 

            $sqll = "SELECT * FROM station where region='$region' or '$nom_station'=nom_station  ORDER BY id_station";
            $result=$myPDO->query($sqll) ;

            while($row=$result->fetch(PDO::FETCH_ASSOC)){
                echo "<tr><td>". $row['id_station']."</td><td>". $row['nom_station']."</td><td>". $row['region']."</td><td>". $row['capacite']."</td><td>". $row['tarif']."</td></tr>";
            }
            
        }
        elseif(!empty($_POST['id_station'])){

            $id_station = isset($_POST['id_station']) ? $_POST['id_station'] : NULL;
            $nom_station = isset($_POST['nom_station']) ? $_POST['nom_station'] : NULL;
            $region = isset($_POST['region']) ? $_POST['region'] : NULL;
            $capacite = isset($_POST['capacite']) ? $_POST['capacite'] : NULL;
            $tarif = isset($_POST['tarif']) ? $_POST['tarif'] : NULL;

            $query = "INSERT INTO station VALUES ('$id_station','$nom_station','$region','$capacite','$tarif')";
            $myPDO-> query($query); 

            $sqll1 = "SELECT * FROM station where id_station='$id_station' ORDER BY id_station";
            $result=$myPDO->query($sqll1) ;

            while($row=$result->fetch(PDO::FETCH_ASSOC)){
                echo "<tr><td>". $row['id_station']."</td><td>". $row['nom_station']."</td><td>". $row['region']."</td><td>". $row['capacite']."</td><td>". $row['tarif']."</td></tr>";
            }
        }
        else{

            $sql = "SELECT * FROM station ORDER BY id_station";
            $result=$myPDO->query($sql) ;
                while($row=$result->fetch(PDO::FETCH_ASSOC)){
                    echo "<tr><td>". $row['id_station']."</td><td>". $row['nom_station']."</td><td>". $row['region']."</td><td>". $row['capacite']."</td><td>". $row['tarif']."</td></tr>";
                }

        }


    }
 ?>
</table>
</body>
</html>