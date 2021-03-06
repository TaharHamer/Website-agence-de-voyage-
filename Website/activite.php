<html>
    <head>
            
        <title>ACTIVITES</title>
        <link rel="stylesheet" href="css/activstyle.css">
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
        
        <h1>Aimez où vous allez</h1>
        <p>Vivez des expériences dont vous parlerez longtemps</p>

        <form name="insert" action="activite.php" method="POST" >
            <div class="booking-form-box">
                <div class="booking-form">
                    <label>ID Station:</label>
                    <input type="number" name="id_sta_pro" class="form-control" placeholder="ID Station">
                    <div class="input-grp">
                        <button type="submit" name="chercher" class="btn btn-primary flight">Chercher</button>
                    </div>            
                </div>                
            </div>
        </form>
         <table>
                <tr>
                    <th>ID Station</th>
                    <th>Activite</th>
                    <th>Prix</th>

                </tr>

        <?php

            $myPDO = new PDO("pgsql:host=localhost;dbname=agence","postgres","1234");

            if(isset($_POST['chercher'])){ 

                    if(!empty($_POST['id_sta_pro'])){

                            $id_sta_pro = isset($_POST['id_sta_pro']) ? $_POST['id_sta_pro'] : NULL;

                            $sqll = "SELECT * FROM proposition where id_sta_pro='$id_sta_pro' ORDER BY id_sta_pro";
                            $result=$myPDO->query($sqll);

                            while($row=$result->fetch(PDO::FETCH_ASSOC)){
                                echo "<tr><td>". $row['id_sta_pro']."</td><td>". $row['lib_act_pro'] ."</td><td>".$row['prix']."</td></tr>";
                            }
                            
                    }

                    else{

                                $sql = "SELECT * FROM proposition ORDER BY id_sta_pro";
                                $result=$myPDO->query($sql) ;

                                while($row=$result->fetch(PDO::FETCH_ASSOC)){
                                        echo "<tr><td>". $row['id_sta_pro']."</td><td>". $row['lib_act_pro'] ."</td><td>".$row['prix']."</td></tr>";  
                                }
                            
                    }
                
            
            }

        ?>
        </table>
    </section>
    <section class ="features">
            <h1>Destinations incontournables</h1>
            <p class="p">Vivez des expériences uniques dans des endroits extraordinaires</p>
            <div class="container">
                <div class="row">
                    <div class="col-md-4">
                        <div class="feature-box">
                            <div class="feature-img">
                                <img src="img/img_activity/e5.jpg">
                            <div class="price">
                                <p>1949,08 MAD</p>
                            </div>
                            <div class="rating">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star-half-o"></i>         
                                <i class="fa fa-star-o"></i>           
                            </div>                
                            </div>
                            <div class="feature-details">
                                <h4>Vol en montgolfière</h4>
                                <p>Regardez le soleil se lever sur la poussière rouge, les palmeraies et les paysages ouverts majestueux à partir d'une montgolfière. Voler avec un petit groupe de voyageurs et commentaires en direct de votre pilote expérimenté, imprégnez-vous des sites en glissant dans les airs, puis faites le plein avec un authentique petit-déjeuner berbère dans une tente marocaine. Pour plus de facilité, votre visite comprend des transferts aller-retour de porte à porte.</p>
                                <div>
                                    <span><i class="fa fa-map-marker"></i>Marrakech</span>
                                    <span><i class="fa fa-sun-o"></i>4 à 5 heures</span>                      
                                </div>    
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="feature-box">
                            <div class="feature-img">
                                <img src="img/img_activity/a6.jpg">
                            <div class="price">
                                <p>474,74 MAD</p>
                            </div>
                            <div class="rating">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star-half-o"></i>                
                            </div>                
                            </div>
                            <div class="feature-details">
                                <h4>Excursion en bateau</h4>
                                <p>Échappez à la foule terrestre et profitez des meilleures vues d'Agadir depuis l'eau au cours d'une excursion en bateau. Un excellent moyen de s'orienter pour la première fois, ce circuit comprend du temps pour nager et pêcher, ainsi qu'un déjeuner barbecue avec des fruits de mer grillés. De plus, les transferts depuis et vers les hôtels sans tracas permettent une expérience sans faille.</p>
                                <div>
                                    <span><i class="fa fa-map-marker"></i>Agadir</span>
                                    <span><i class="fa fa-sun-o"></i>6 heures</span>                          
                                </div>    
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="feature-box">
                            <div class="feature-img">
                                <img src="img/img_activity/9a.jpg">
                            <div class="price">
                                <p>170,28 MAD</p>
                            </div>
                            <div class="rating">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>                             
                            </div>                
                            </div>
                            <div class="feature-details">
                                <h4>Parc Croco</h4>
                                <p>Jardin botanique et parc de crocodiles avec plus de 300 crocodiles du Nil, iguanes, tortues géantes, des centaines de plantes exotiques, une visite riche en émotions ...' nous viendrons vous chercher à la réception de votre hôtel et nous vous donnerons une fois arrivés vous avez tout le temps dont vous avez besoin pour rester là-bas lorsque vous terminez la visite du parc, nous vous ramènerons confortablement à l'hôtel</p>
                                <div>
                                    <span><i class="fa fa-map-marker"></i>Tantan</span>
                                    <span><i class="fa fa-sun-o"></i>2 à 3 heures</span>
                                </div>    
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="feature-box">
                            <div class="feature-img">
                                <img src="img/img_activity/63.jpg">
                            <div class="price">
                                <p>368,61 MAD</p>
                            </div>
                            <div class="rating">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star-half-o"></i>         
                                <i class="fa fa-star-o"></i>           
                            </div>                
                            </div>
                            <div class="feature-details">
                                <h4>Dune Buggy's</h4>
                                <p>le safari en buggy: vous explorez les zones rurales environnantes d’une manière amusante et passionnante à l’aide d’une machine ludique qui vous permet de découvrir le plaisir de conduire un buggy dans les zones rurales berbères et le terrain pré-saharien et complétez cette expérience avec un délicieux petit déjeuner à la berbère</p>
                                <div>
                                    <span><i class="fa fa-map-marker"></i>Casablanca</span>
                                    <span><i class="fa fa-sun-o"></i>3 heures et 30 minutes</span>                   
                                </div>    
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="feature-box">
                            <div class="feature-img">
                                <img src="img/img_activity/eb.jpg">
                            <div class="price">
                                <p>266,34 MAD</p>
                            </div>
                            <div class="rating">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star-half-o"></i>                
                            </div>                
                            </div>
                            <div class="feature-details">
                                <h4>dos de chameau</h4>
                                <p>Profitez d'une balade inoubliable à dos de chameau marocain lors de cette excursion au coucher du soleil depuis un ranch d'Agadir. Échappez au tumulte de la ville et rejoignez des endroits pittoresques à la campagne, d'une forêt d'eucalyptus à un village pittoresque. Vous pouvez également observer des oiseaux migrateurs, y compris des flamants roses. Les visites se terminent par une savoureuse pause thé à la menthe avec des gâteaux marocains.</p>
                                <div>
                                    <span><i class="fa fa-map-marker"></i>Settat</span>
                                    <span><i class="fa fa-sun-o"></i>2 heures</span>                     
                                </div>    
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="feature-box">
                            <div class="feature-img">
                                <img src="img/img_activity/13.jpg">
                            <div class="price">
                                <p>591,15 MAD</p>
                            </div>
                            <div class="rating">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>                             
                            </div>                
                            </div>
                            <div class="feature-details">
                                <h4>Circuit en quad</h4>
                                <p>Dites adieu à l'asphalte et saluez le vrai Maroc dans une aventure hors route en véhicule tout-terrain (VTT). Que vous choisissiez les options du matin ou de l’après-midi, votre visite commence par un exposé sur la sécurité et une introduction aux commandes simples de votre VTT. Suivez ensuite votre guide à travers les palmeraies, le désert et les villages berbères avant de rejoindre une famille locale pour prendre un thé et des collations.</p>
                                <div>
                                    <span><i class="fa fa-map-marker"></i>Ouarzazate</span>
                                    <span><i class="fa fa-sun-o"></i>4 heures</span>
                                </div>    
                            </div>
                        </div>
                    </div>
                </div>
            </div>

    </section>

</body>
</html>

