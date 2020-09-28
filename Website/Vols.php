<html>
<head>
        
    <title>CLIENTS</title>
    <link rel="stylesheet" href="css/volstyle.css">
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
    <form name="insert" action="vols.php" method="POST" >
        <div class="booking-form-box">
            <div class="booking-form">
                <label>Votre ID :</label>
                <input type="number" name="id_client" class="form-control" placeholder="ID Client">
                <label>Votre Region :</label>
                <input type="text" name="region" class="form-control" placeholder="Région">
                <label>Votre nom :</label>
                <input type="text" name="nom" class="form-control" placeholder="Nom">
                <div class="input-grp">
                    <button type="submit" name="chercher" class="btn btn-primary flight">Envoyer vos informations</button>
                </div>
        
            </div>
            
        </div>
    </form>


<table>
    <tr>
        <th>Id</th>
        <th>Region</th>
        <th>Nom</th>
    </tr>

<?php

    $myPDO = new PDO("pgsql:host=localhost;dbname=agence","postgres","1234");

    if(isset($_POST['chercher'])){ 

            if(!empty($_POST['id_client'])){

                $id_client = isset($_POST['id_client']) ? $_POST['id_client'] : NULL;
                $region = $_POST['region'] ? $_POST['region'] : NULL;
                $nom = isset($_POST['nom']) ? $_POST['nom'] : NULL;
                $query = "INSERT INTO client VALUES ('$id_client','$region','$nom')";
                $myPDO-> query($query); 

                $sqll = "SELECT * FROM client where id_client='$id_client' ORDER BY id_client";
                $result=$myPDO->query($sqll);

                while($row=$result->fetch(PDO::FETCH_ASSOC)){
                    echo "<tr><td>". $row['id_client']."</td><td>". $row['region'] ."</td><td>".$row['nom']."</td></tr>";
                }
                
            }
            elseif(!empty($_POST['region'])){

                $id_client = isset($_POST['id_client']) ? $_POST['id_client'] : NULL;
                $region = $_POST['region'] ? $_POST['region'] : NULL;
                $nom = isset($_POST['nom']) ? $_POST['nom'] : NULL;
                $query = "INSERT INTO client VALUES ('$id_client','$region','$nom')";
                $myPDO-> query($query); 

                $sqll1 = "SELECT * FROM client where  region='$region' ORDER BY id_client";
                $result=$myPDO->query($sqll1);

                while($row=$result->fetch(PDO::FETCH_ASSOC)){
                    echo "<tr><td>". $row['id_client']."</td><td>". $row['region'] ."</td><td>".$row['nom']."</td></tr>";
                }
                
            }
            elseif(!empty($_POST['nom']) ){

                $id_client = isset($_POST['id_client']) ? $_POST['id_client'] : NULL;
                $region = $_POST['region'] ? $_POST['region'] : NULL;
                $nom = isset($_POST['nom']) ? $_POST['nom'] : NULL;
                $query = "INSERT INTO client VALUES ('$id_client','$region','$nom')";
                $myPDO-> query($query); 

                $sqll1 = "SELECT * FROM client where nom='$nom'  ORDER BY id_client";
                $result=$myPDO->query($sqll1);

                while($row=$result->fetch(PDO::FETCH_ASSOC)){
                    echo "<tr><td>". $row['id_client']."</td><td>". $row['region'] ."</td><td>".$row['nom']."</td></tr>";
                }
                
            }
            else{

                        $sql = "SELECT * FROM client ORDER BY id_client";
                        $result=$myPDO->query($sql) ;

                            while($row=$result->fetch(PDO::FETCH_ASSOC)){
                                echo "<tr><td>". $row['id_client']."</td><td>". $row['region'] ."</td><td>".$row['nom']."</td></tr>";   
                            }
                   
            }
        
    }

 ?>
</table>
</body>
</html>
