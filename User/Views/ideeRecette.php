<?php
require_once($_SERVER['DOCUMENT_ROOT'] . './WEB/User/Controllers/userController.php');
class ideeRecette
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
            <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200&display=swap" rel="stylesheet">
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
            <link rel="preconnect" href="https://fonts.googleapis.com"><link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
            <link href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap" rel="stylesheet">
            <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">
            <link href="http://fonts.googleapis.com/css?family=Cookie" rel="stylesheet" type="text/css">
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
    public function recherche(){
        ?>
        <style>
            form{
                margin: 30px auto;
                align-items: center;
                display: flex;
                justify-content: center;
            }
        </style>
        <div>
            <img src="./Outils/banner.jpeg" style="height:autp;width:100%"alt="">
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
            <form action="" onsubmit="return false">
                <input type="text" id="recingre" name="recingreArray"> 
                <input style="margin:0;" type="search" id="search-input"  placeholder="Recherche par ingrédient">
                <img class="icon" style="cursor:pointer;  margin-left: 200px;" src="./Outils/search.png" alt="search">
                <button type="submit" style="width:250px;height: 70px;" onclick="pushData(); return false;" class="btn2">Ajouter une autre ingrédient</button>
                <button type="submit" onclick="myFunction();" class="btn2">Rechercher</button>
            </form>
       
        <script>
        var myArr=[]
        var Arrli=[]
            function pushData(){
            var inputText = document.querySelector('#search-input').value.toLowerCase();
            myArr.push(inputText);
            // display array data
            document.querySelector('#recingre').value = myArr;  
            return myArr;
            }
            function myFunction() {

                // Declare variables
                var input, filter, ul, li, a, i, txtValue,cpt;

                input = document.querySelector('#recingre').value.split(",");
                ul = document.getElementsByClassName("card");
                    
                for(j = 0; j < ul.length; j++){
                    li = ul[j].querySelectorAll('li');
                    for (i = 0; i < li.length; i++){
                        Arrli.push(li[i].innerText.toLowerCase());
                        liste = Arrli;
                    }
                    console.log(liste)
                    console.log(input)
                        let x = (arr, target) => target.every(v => arr.includes(v))
                        console.log(x(liste,input))
                        if ( x(liste,input) == true) {
                            ul[j].style.display = "";
                        }else{
                            ul[j].style.display = "none";
                        }
                    Arrli.splice(0, Arrli.length);
                    console.log(Arrli)
                }
            }
        </script>
        
        <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
        <div class="container">

            <?php
            $controller = new userController();
            $res = $controller->getRecette();
            $i = 0;
            foreach($res as $row){
                ++$i;
                if($i % 3 ===1){
                    echo '<div class="row" style="margin-top: 30px;">';
                }
            ?>
                <div class="col-4" style="margin: auto;">
                    <div class="card" style="width: 100%;">
                    <div style="display: none;"  class="ingredient">
                            <?php
                            $contr1 = new userController();
                            $recc1 = $contr1->getNutritionIDRecette($row["Id_Recette"]);
                            $i = 0;
                            foreach($recc1 as $r2){
                                ++$i;
                                if($i % 3 ===1){
                                    echo '<div class="pttinfo">';
                                }
                            ?>
                                <!-- <div id="ing">
                                    <h5><?php echo $r2["Quantité"] ?> </h5>
                                <h5 class="inge"><?php echo $r2["Nom"] ?></h5> -->
                                    
                                <!-- </div> -->
                                <!-- <ul class="myUL"> -->
                                    <li><?php echo $r2["Nom"] ?></li>
                                <!-- </ul> -->
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
                        <img style="width: auto;" src="/WEB/Outils/images/<?php  echo $row["image"]; ?>" alt="">
                        <div class="card-body">
                        <h5 class="card-title" style="text-align: left;"><?php echo $row['Titre']?></h5>
                        <p class="card-text" style="overflow-y: hidden;height: 50px;text-align: left;"><?php echo $row['Description']?></p>
                        <br>
                        <p style="text-align: left; display:flex; justify-content: space-between;">
                        <strong>Catégorie: <small><?php echo $row['Categorie']?></small> </strong>
                            <strong>Saison: <small><?php if ($row['Id_Saison'] == 1) echo 'Automne'; 
                            else if($row['Id_Saison'] == 2) echo 'Hiver';
                            else if($row['Id_Saison'] == 3) echo 'Ete';
                            else if($row['Id_Saison'] == 4) echo 'Printemps';?></small></strong>
                            <strong>Temps total: <small><?php echo add_heures($row['Temps_prepa'],$row['Temps_cuiss'])?></small></strong>
                            <strong>Calorie: <small><?php echo $row['Calorie']?></small></strong>
                        </p>
                        <p style="text-align: center;"><strong>Difficulté: <?php
                        for ($i=0; $i<$row['Difficulte']; $i++){
                            ?>
                            <i class="fa fa-circle"></i>
                            <?php
                        }
                        for($i=$row['Difficulte']; $i<5; $i++){
                            ?>
                            <i class="fa fa-circle-o"></i>
                            <?php
                        }
                        echo "   |   ";
                        $c=new userController();
                        $a=$c->getRecettenote($row['Id_Recette']);
                        $b = $a->fetch(PDO::FETCH_ASSOC);
                        ?></strong><strong>Note: <?php
                        for ($i=0; $i<intval($b['AVG(note)']); $i++){
                            ?>
                            ★
                            <?php
                        }
                        for($i=intval($b['AVG(note)']); $i<5; $i++){
                            ?>
                            ✰
                            <?php
                        }
                        ?></strong></p>
                        <a href="/web/User/recettepage?id=<?php echo $row['Id_Recette']?>" class="btn btn-primary">Afficher La suite</a>

                        </div>
                    </div>
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
        <?php

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
        $this->recherche();
        $this->recette();
        $this->footer();
    }
}
?>