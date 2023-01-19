<?php
require_once($_SERVER['DOCUMENT_ROOT'] . './WEB/User/Controllers/userController.php');

class recettePage
{
    public function header()
    {
        ?>
        <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link rel="preconnect" href="https://fonts.googleapis.com">
            <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
            <link href="https://fonts.googleapis.com/css2?family=Lexend:wght@200&display=swap" rel="stylesheet">
            <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
            <link rel="preconnect" href="https://fonts.googleapis.com"><link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
            <link href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap" rel="stylesheet">
            <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">
            <link href="http://fonts.googleapis.com/css?family=Cookie" rel="stylesheet" type="text/css">
            <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
            <title>RecipePress</title>
            <link rel="stylesheet" href="./Style.css">
            <script src="./jquery-3.6.0.min.js"></script>
            <script src="./index.js"></script>
        </head>
        <?php
    }
    public function menu1()
    {
        ?>
        <div class="menu1">
            <nav>
                <a href="#"><img src="./Outils/logo.png" alt="logo"></a>
                <form action="">
                    <input type="search" placeholder="Recherche">
                    <img class="icon" src="./Outils/search.png" alt="mail">
                </form>
                <?php
                if (isset($_SESSION['username'])) {
                    ?>
                    <div class="btn1">
                    <a href="/web/User/profil"><button type="submit" >Profil</button></a>
                    <form action="<?php $contro = new userController(); $contro->logout();?>" method="post">
                        <button type="submit" name="logout">Logout</button>
                    </form>
                </div>
                    <?php
                }
                else{
                    ?>
                <div class="btn1">
                    <a href="/web/User/login"><button type="submit" >Login</button></a>
                    <a href="/web/User/signup"><button type="submit"  >SignUp</button></a>
                </div>
                    <?php
                }
                ?>
                <div class="icn">
                    <a href="http://www.facebook.com" target="_blank"><img class="icon" src="./Outils/facebook.png" alt="facebook" ></a>
                    <a href="http://www.instagram.com" target="_blank"><img class="icon" src="./Outils/instagram.png" alt="instagram"></a>
                    <a href="mailto:jh_zoumata@esi.dz"><img class="icon" src="./Outils/mail.png" alt="mail"></a>
                </div>
            </nav>
        </div>
        <?php
    }
    public function menu(){
        ?>
    <div class="menug">
        <ul class="menu">
            <li><a href="./home.php"><img src="./Outils/Chef.png" alt=""></a></li>
            <li><a href="/web/User/">Accueil</a></li>
            <li><a href="/web/User/recettehealthy">Healthy</a></li>
            <li><a href="/web/User/recette">Saison</a>
                <ul class="submenu"> 
                    <li><a href="/web/User/recetteHiver">Hiver</a></li>
                    <li><a href="/web/User/recettePrintemps">Printemps</a></li>
                    <li><a href="/web/User/recetteEte">Eté</a></li>
                    <li><a href="/web/User/recetteAutomne">Autonme</a></li>
                </ul>
            </li>
            <li><a href="/web/User/recette">Féte</a>
                <ul class="submenu"> 
                    <li><a href="/web/User/recetteMariage">Mariage</a></li>
                    <li><a href="/web/User/recetteAnniversaire">Anniversaire</a></li>
                    <li><a href="/web/User/recetteAid">Aid</a></li>
                    <li><a href="/web/User/recetteAchoura">Achoura</a></li>
                    <li><a href="/web/User/recetteAutres">Autres</a></li>
                </ul>
            </li>
            <li><a href="/web/User/recette">Catégorie</a>
                <ul class="submenu"> 
                    <li><a href="/web/User/recetteplats">Plats</a></li>
                    <li><a href="/web/User/recettedesserts">Desserts</a></li>
                    <li><a href="/web/User/recetteboissons">Boisson</a></li>
                    <li><a href="/web/User/recetteentrees">Entrées</a></li>
                </ul>
            </li>
            <li><a href="/web/User/nutrition">Nutrition</a></li>
            <li><a href="/web/User/ideerecette">Idée de recette</a></li>
            <li><a href="/web/User/newscard">News</a></li>
            <li><a href="/web/User/contact">Contact</a></li>
            <li><a href="#"><img src="./Outils/Plat.png" alt=""></a></li>
        </ul>
    </div>
        <?php
    }
    public function recette(){
        function add_heures($heure1,$heure2){
            $secondes1=heure_to_secondes($heure1);
            $secondes2=heure_to_secondes($heure2);
            $somme=$secondes1+$secondes2;
            //transfo en h:i:s
            $s=$somme % 60; //reste de la division en minutes => secondes
            $m1=($somme-$s) / 60; //minutes totales
            $m=$m1 % 60;//reste de la division en heures => minutes
            $h=($m1-$m) / 60; //heures
            $resultat=$h."H ".$m."mn ".$s."s";
            return $resultat;
        }
        function heure_to_secondes($heure){
            $array_heure=explode(":",$heure);
            $secondes=3600*$array_heure[0]+60*$array_heure[1]+$array_heure[2];
            return $secondes;
        }
       ?>
       <style>

        .bi-heart{
            color: #ffffff;
            background-color: #EFA3C8;
            padding-left: 10px;
        }
        .bi-heart-fill{
            background-color: #EFA3C8;
            color: red;
            padding-left: 10px;
        }
        .btn-primary{
            background-color: #EFA3C8;
            margin: auto 42%;
            width: 16%;
        }
        .btn-primary:hover{
            background-color: #EFA3C8;
        }
        .btn-primary button{
            border: none;
            background-color: #EFA3C8;
        }
       </style>
       <div>
        <img style="width:100%" src="./Outils/banner.jpg" alt="">
       </div>
       <?php 
        $controller = new userController();
        $res = $controller->getRecetteID($_GET['id']);
         foreach ($res as $row) {
             ?>
            <div class="carte">
                <div>
                    <img src="/WEB/Outils/images/<?php  echo $row["image"]; ?>" alt="">
                </div>
                <div class="info">
                    <div class="tmp">
                        <h4><?php echo $row['Temps_prepa'] ?></h4>
                        <h5>Temps de preparation</h5>
                    </div>
                    <div class="tmp">
                        <h4><?php echo $row['Temps_repos'] ?></h4>
                        <h5>Temps de repos</h5>
                    </div>
                    <div class="tmp">
                        <h4><?php echo $row['Temps_cuiss'] ?></h4>
                        <h5>Temps de cuisson</h5>
                    </div>
                    <div class="tmp">
                        <h4><?php echo add_heures($row['Temps_cuiss'], $row['Temps_prepa']) ?></h4>
                        <h5>Temps totale</h5>
                    </div>
                </div>
            </div>
            <h2 style="font-family:'Poppins', sans-serif;" class="card-title"><?php echo $row['Titre'] ?></h2>
            <br>
            <?php
            if (isset($_SESSION['id'])) {
                $id = $_SESSION['id'];
                $contr = new userController();
                $recc = $contr->getRecetteFavoris($id, $row["Id_Recette"]);
                $r = $recc->fetch(PDO::FETCH_ASSOC);
                if ($r != 0) {
                    ?>
                        <form class="btn btn-primary" action="<?php $controller = new userController();
                        $controller->deleteFavoris(); ?>" method="post">                            
                            <input type="hidden" name="idU" value="<?php echo $id ?>">
                            <input type="hidden" name="idR" value="<?php echo $row['Id_Recette'] ?>">
                            <button type="submit"  name="delete">Delete from favoris<i class="bi bi-heart-fill"></i></button>
                        </form>
                    <?php
                } else {
                    ?> 
                        <form class="btn btn-primary" action="<?php $controller = new userController();
                        $controller->addFavoris(); ?>" method="post">                          
                            <input type="hidden" name="idU" value="<?php echo $id ?>">
                            <input type="hidden" name="idR" value="<?php echo $row['Id_Recette'] ?>">
                            <button  type="submit" name="add">Add to favoris<i class="bi bi-heart"></i></button>
                        </form>
                    <?php
                }
            }
            ?>  
            <br> <br>

           <div class="descript">
            <hr>
                <h3>Description</h3>
                <p><?php echo $row['Description'] ?>
                </p>
            </div> 
            <div class="Content">
                <hr>
                    <div class="pttinfo">
                        <div class="">
                            <h5>Fete: <?php echo $row['Fete'] ?></h5>
                        </div>
                        <div class="">
                            <h5>Saison:<?php if ($row['Id_Saison'] == 1)
                                echo 'Automne';
                            else if ($row['Id_Saison'] == 2)
                                echo 'Hiver';
                            else if ($row['Id_Saison'] == 3)
                                echo 'Ete';
                            else if ($row['Id_Saison'] == 4)
                                echo 'Printemps'; ?></h5>
                        </div>
                        <div class="">
                            <h5>Difficultés: <?php
                            for ($i = 0; $i < $row['Difficulte']; $i++) {
                                ?>
                            ★
                            <?php
                            }
                            for ($i = $row['Difficulte']; $i < 5; $i++) {
                                ?>
                            ✰
                            <?php
                            }
                            ?></h5>
                        </div>
                    </div>
                    <div class="pttinfo">
                        <div class="">
                            <h5><?php if ($row['Healthy'] == 1) {
                                echo 'Healthy';
                            } else {
                                echo 'Non Healthy';
                            }
                            ?></h5>
                        </div>
                        <div><?php 
                         $c=new userController();
                         $a=$c->getRecettenote($row['Id_Recette']);
                         $b = $a->fetch(PDO::FETCH_ASSOC);
                        ?>
                            <h5>Note: <?php
                            for ($i = 0; $i <intval($b['AVG(note)']); $i++) {
                                ?>
                            ★
                            <?php
                            }
                            for ($i =intval($b['AVG(note)']); $i < 5; $i++) {
                                ?>
                            ✰
                            <?php
                            }
                            ?></h5>
                        </div>
                        <div class="">
                            <h5>Categorie: <?php echo $row['Categorie'] ?></h5>
                        </div>
                    </div>
                    <div class="pttinfo">
                        <div class="">
                            <h5>Calorie: <?php echo $row['Calorie'] ?></h5>
                        </div>
                        <div class="">
                            <h5>Graisse: <?php echo $row['Graisse'] ?>g</h5>
                        </div>
                        <div class="">
                            <h5>Protine: <?php echo $row['Protine'] ?>g</h5>
                        </div>
                        <div class="">
                            <h5>Energie: <?php echo $row['Energie'] ?>mg</h5>
                        </div>
                        
                    </div>
     
                    <hr>
            </div>
            <div class="ingredient">
                <h3>Les ingrédients</h3>
                <?php
                $contr1 = new userController();
                $recc1 = $contr1->getNutritionIDRecette($row["Id_Recette"]);
                $i = 0;
                foreach ($recc1 as $r2) {
                    ++$i;
                    if ($i % 3 === 1) {
                        echo '<div class="pttinfo">';
                    }
                    ?>
                    <div class="ing">
                        <h5><?php echo $r2["Quantité"] ?> <?php echo $r2["Nom"] ?></h5>
                    </div>
                    <?php
                    if ($i % 3 === 0) {
                        echo '</div>';
                    }
                }
                if ($i % 3 !== 0) {
                    echo '</div>';
                }
                ?>
            </div>
            <div class="descript">
            <hr>
                <h3>Les Etapes</h3>
                <p><?php echo $row['etapes'] ?>
                </p>
            </div>
            <hr>
            <?php
            if (isset($_SESSION['id'])) {
                $id = $_SESSION['id'];
                ?>
            <div class="rating-system">
                <div><h5 style="text-align: center;">C'est terminé  <br> Avez-vous aimé cette recette ?</h5></div>
                <form class="star-icon" method="POST" action="<?php $controll = new userController();
                $controll->addNote(); ?>">

                    <input type="radio"  value="5" name="rating" id="rating0">
                    <label for="rating0"  class="fa fa-star"></label>

                    <input type="radio"   value="4" name="rating" id="rating2">
                    <label for="rating2" class="fa fa-star"></label>

                    <input type="radio"  value="3" name="rating" id="rating3">
                    <label for="rating3" class="fa fa-star"></label>

                    <input type="radio"  value="2" name="rating" id="rating4">
                    <label for="rating4" class="fa fa-star"></label>

                    <input type="radio"  value="1" name="rating" id="rating5">
                    <label for="rating5" class="fa fa-star"></label>
                    <br>
                    <div>
                        <input type="hidden" name="idR" value="<?php echo $row['Id_Recette'] ?>">
                        <input type="hidden" name="idU" value="<?php echo $id ?>">
                        <center>
                            <button type="submit" name="rate" class="btn2">Confirmer</button>
                        </center>                        
                    </div>
                </form>

    <?php
            }
                            $c = new userController();
                            $a = $c->getRecettenote($row['Id_Recette']);
                            $b = $a->fetch(PDO::FETCH_ASSOC);
                            ?>
                <div><h5 style="text-align: center;">Note générale :<?php echo intval($b['AVG(note)']) ?>/5 </h5></div>
                <center> <br>
                <iframe width="420" height="315"
                    src="<?php echo $row['video'] ?>">
                </iframe>

                </center>
           </div>            
           
        <?php 
         }
    }
    public function footer(){
        ?>
         <footer class="footer-distributed">

            <div class="footer-left">
                <h3>Recip<span>Press</span></h3>

                <p class="footer-links">
                    <a href="#">Accueil</a> |
                    <a href="#">Healthy</a> |
                    <a href="#">Saison</a> |
                    <a href="#">Fete</a> |
                    <a href="#">Nutrition</a> |
                    <a href="#">Idée de recette</a> 
                    <a href="#">Nutrition</a> |
                    <a href="#">Contact</a>
                </p>

                <p class="footer-company-name">Copyright © 2023 <strong style="background-color: #2d2a30;">ZOUMATA Hasni</strong> All rights reserved</p>
            </div>

            <div class="footer-center">
                <div style="background-color: #2d2a30;">
                    <i class="fa fa-map-marker"></i>
                    <p><span>ZOUMATA</span>
                        Hasni</p>
                </div>

                <div style="background-color: #2d2a30;">
                    <i class="fa fa-phone"></i>
                    <p>+213 552****50</p>
                </div>
                <div style="background-color: #2d2a30;">
                    <i class="fa fa-envelope"></i>
                    <p><a href="mailto:jh_zoumata@esi.dz">jh_zoumata@esi.dz</a></p>
                </div>
            </div>
            <div class="footer-right">
                <p class="footer-company-about">
                    <span  style="background-color: #2d2a30;">A propos de nous</span>
                    <strong  style="background-color: #2d2a30;">Recipe press</strong> is a Youtube channel where you can find more creative CSS Animations
                    and
                    Effects along with
                    HTML, JavaScript and Projects using C/C++.
                </p>
                <div class="footer-icons" >
                    <a href="#"style="background-color: #2d2a30;"><i style="background-color: #2d2a30;" class="fa fa-facebook"></i></a>
                    <a href="#"style="background-color: #2d2a30;"><i style="background-color: #2d2a30;" class="fa fa-instagram"></i></a>
                    <a href="#"style="background-color: #2d2a30;"><i style="background-color: #2d2a30;" class="fa fa-linkedin"></i></a>
                    <a href="#"style="background-color: #2d2a30;"><i style="background-color: #2d2a30;" class="fa fa-twitter"></i></a>
                    <a href="#"style="background-color: #2d2a30;"><i style="background-color: #2d2a30;" class="fa fa-youtube"></i></a>
                </div>
            </div>
            </footer>
        <?php
    }
    public function display()
    {
        $this->header();
        $this->menu1();
        $this->menu();
        $this->recette();
        $this->footer();
    }
}

?>
