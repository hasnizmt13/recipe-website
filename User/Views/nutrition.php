<?php
require_once($_SERVER['DOCUMENT_ROOT'] . './WEB/User/Controllers/userController.php');
class nutrition
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
            <li><a href="#">Nutrition</a></li>
            <li><a href="/web/User/ideerecette">Idée de recette</a></li>
            <li><a href="/web/User/newscard">News</a></li>
            <li><a href="/web/User/contact">Contact</a></li>
            <li><a href="#"><img src="./Outils/Plat.png" alt=""></a></li>
        </ul>
    </div>
        <?php
    }
    public function nutrition(){
        ?>
        <style>
            .card-body div {
                display: flex;
                justify-content: space-between;
                background-color: #CCD6A6;
            }
        </style>
        <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
        <div>
            <img src="./Outils/bannerb.jpg" style="height:autp;width:100%"alt="">
       </div>
       <h2 class="card-title" style="font-size: 50px;">Les ingrédients</h2>
        <div class="container">

            <?php
            $controller = new userController();
            $res = $controller->getNutrition();
            $i = 0;
            foreach($res as $row){
                ++$i;
                if($i % 3 ===1){
                    echo '<div class="row" style="padding-top: 30px;">';
                }
            ?>
                <div class="col-4" style="margin: auto;">
                    <div class="card" style="width: 100%;">
                        <img style="width: auto;" src="/WEB/Outils/images/<?php  echo $row["image"]; ?>" alt="">
                        <div class="card-body">
                            <h5 class="card-title" style="font-family: 'Poppins'; font-size: 24px;"><?php echo $row['Nom']?></h5>
                            <hr style="margin: 0 auto;">
                            <div>
                                <p style="text-align: left;">Calorie: <?php echo $row['Calorie']?></p>
                                <p style="text-align: left;">Protine: <?php echo $row['Protine']?> g</p>
                            </div>
                            <div>
                               <p style="text-align: left;">Graisse: <?php echo $row['Graisse']?> g</p>
                                <p style="text-align: left;">Energie: <?php echo $row['Energie']?> mg</p>  
                            </div>
                            <div>
                                <p style="text-align: left;">Saison: <?php if ($row['Id_saison'] == 1) echo 'Automne'; 
                                        else if($row['Id_saison'] == 2) echo 'Hiver';
                                        else if($row['Id_saison'] == 3) echo 'Ete';
                                        else if($row['Id_saison'] == 4) echo 'Printemps';?></p>
                                <p style="text-align: left;"><?php if ($row['Healthy'] == 1)
                                                            echo 'Healthy'; else echo 'Non Healthy'?>
                                <p style="text-align: left;">proportion: <?php echo $row['proportion']?>%</p>    
                            </div>
                            
                           
                          
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
        $this->nutrition();
        $this->footer();
    }
}
?>