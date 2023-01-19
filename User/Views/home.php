<?php
require_once($_SERVER['DOCUMENT_ROOT'] . './WEB/User/Controllers/userController.php');
class home
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
    public function slider(){
        ?>
        <div class="wrapper">
            <figure class="slider">
                    <?php 
                    $controller = new userController();
                    $res = $controller->getRecetteAffich();
                    $i = 0;
                    foreach($res as $row){ 
                        if($i < 4){              
                        $i = $i + 1;
                    ?>
                <figure>
                    <a href="/web/User/recettepage?id=<?php echo $row['Id_Recette']?>">
                        <div>
                            <h2><?php echo $row['Titre']?></h2>
                            <p><?php echo $row['Description']?></p>
                            <button type="submit">En savoir plus</button>
                        </div>
                        <div>
                            <img src="/WEB/Outils/images/<?php  echo $row["image"]; ?>" alt="">
                        </div>
                    </a>
                </figure>
                <?php
                }  
                }
                ?>
            </figure>    
        </div>
        <?php
    }
    public function menu(){
        ?>
    <div class="menug">
        <ul class="menu">
            <li><a href="#"><img src="./Outils/Chef.png" alt=""></a></li>
            <li><a href="#">Accueil</a></li>
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
    public function Card1()
    {
        ?>
       <!-- <img style="width:100%; height: 30%;" src="./Outils/bannerd.jpg" alt="">-->
        <h2 class="card-title">Entrées</h2>
        <center>
        <div class="sep">
            <img class="line" src="./Outils/line.png" alt="">
            <img style="width:20px; height: 20px;" src="./Outils/Plat.png" alt="">
            <img class="line"src="./Outils/line.png" alt="">
        </div>
        </center>
        
        <div id="carouselExampleControls1" class="carousel carousel-dark slide" data-bs-ride="carousel">
            <div class="carousel-inner">
            <?php
            $controller = new userController();
            $res = $controller->getRecetteEntrées();
            $i = 0;
            foreach($res as $row){
                ++$i;
                if($i % 4 ===1){
                    echo '<div class="carousel-item">
                    <div class="cards-wrapper">
                    ';
                }
            ?>
                        <div class="card">
                            <img class="card-img-top" src="/WEB/Outils/images/<?php  echo $row["image"]; ?>" alt="">
                            <div class="card-body">
                                <h5 class="card-title"><?php echo $row['Titre']?></h5>
                                <p class="card-text" style="overflow-y: hidden;height: 70px;"><?php echo $row['Description']?></p>
                                <a href="/web/User/recettepage?id=<?php echo $row['Id_Recette']?>" class="btn btn-primary">Afficher La suite</a>
                            </div>
                        </div>
                <?php
            if ($i % 4 === 0) {
              echo '</div>
              </div>';
            }
                }
                    ?>
                    <?php
            if ($i % 4 !== 0) {
              echo '</div>
              </div>';
            }
                    ?>
        </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls1" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls1" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
            <center>
                <a href="/web/User/recetteentrees"><button type="submit" class="btn2">Voir Plus</button></a>
                
            </center>
        </div>
        


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
        <?php
    }
    public function Card2()
    {
        ?>
       <!-- <img style="width:100%; height: 30%;" src="./Outils/bannerd.jpg" alt="">-->
        <h2 class="card-title">Plats</h2>
        <center>
        <div class="sep">
            <img class="line" src="./Outils/line.png" alt="">
            <img style="width:20px; height: 20px;" src="./Outils/Plat.png" alt="">
            <img class="line"src="./Outils/line.png" alt="">
        </div>
        </center>
        
        <div id="carouselExampleControls2" class="carousel carousel-dark slide" data-bs-ride="carousel">
            <div class="carousel-inner">
            <?php
            $controller = new userController();
            $res = $controller->getRecettePlats();
            $i = 0;
            foreach($res as $row){
                ++$i;
                if($i % 4 ===1){
                    echo '<div class="carousel-item">
                    <div class="cards-wrapper">
                    ';
                }
            ?>
                        <div class="card">
                        <   <img class="card-img-top" src="/WEB/Outils/images/<?php  echo $row["image"]; ?>" alt="">
                            <div class="card-body">
                                <h5 class="card-title"><?php echo $row['Titre']?></h5>
                                <p class="card-text" style="overflow-y: hidden;height: 70px;"><?php echo $row['Description']?></p>
                                <a href="/web/User/recettepage?id=<?php echo $row['Id_Recette']?>" class="btn btn-primary">Afficher La suite</a>
                            </div>
                        </div>
                <?php
            if ($i % 4 === 0) {
              echo '</div>
              </div>';
            }
                }
                    ?>
                    <?php
            if ($i % 4 !== 0) {
              echo '</div>
              </div>';
            }
                    ?>
        </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls2" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls2" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
            <center>
                <a href="/web/User/recetteplats"><button type="submit" class="btn2">Voir Plus</button></a>

            </center>
        </div>
        


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
        <?php
    }
    public function Card3()
    {
        ?>
       <!-- <img style="width:100%; height: 30%;" src="./Outils/bannerd.jpg" alt="">-->
        <h2 class="card-title">Desserts</h2>
        <center>
        <div class="sep">
            <img class="line" src="./Outils/line.png" alt="">
            <img style="width:20px; height: 20px;" src="./Outils/Plat.png" alt="">
            <img class="line"src="./Outils/line.png" alt="">
        </div>
        </center>
        
        <div id="carouselExampleControls3" class="carousel carousel-dark slide" data-bs-ride="carousel">
            <div class="carousel-inner">
            <?php
            $controller = new userController();
            $res = $controller->getRecetteDesserts();
            $i = 0;
            foreach($res as $row){
                ++$i;
                if($i % 4 ===1){
                    echo '<div class="carousel-item">
                    <div class="cards-wrapper">
                    ';
                }
            ?>
                        <div class="card">
                            <img class="card-img-top" src="/WEB/Outils/images/<?php  echo $row["image"]; ?>" alt="">
                            <div class="card-body">
                                <h5 class="card-title"><?php echo $row['Titre']?></h5>
                                <p class="card-text" style="overflow-y: hidden;height: 70px;"><?php echo $row['Description']?></p>
                                <a href="/web/User/recettepage?id=<?php echo $row['Id_Recette']?>" class="btn btn-primary">Afficher La suite</a>
                            </div>
                        </div>
                <?php
            if ($i % 4 === 0) {
              echo '</div>
              </div>';
            }
                }
                    ?>
                    <?php
            if ($i % 4 !== 0) {
              echo '</div>
              </div>';
            }
                    ?>
        </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls3" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls3" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
            <center>
                <a href="/recettedesserts"><button type="submit" class="btn2">Voir Plus</button></a>
            </center>
        </div>
        


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
        <?php
    }
    public function Card4()
    {
        ?>
       <!-- <img style="width:100%; height: 30%;" src="./Outils/bannerd.jpg" alt="">-->
        <h2 class="card-title">Boissons</h2>
        <center>
        <div class="sep">
            <img class="line" src="./Outils/line.png" alt="">
            <img style="width:20px; height: 20px;" src="./Outils/Plat.png" alt="">
            <img class="line"src="./Outils/line.png" alt="">
        </div>
        </center>
        
        <div id="carouselExampleControls4" class="carousel carousel-dark slide" data-bs-ride="carousel">
            <div class="carousel-inner">
            <?php
            $controller = new userController();
            $res = $controller->getRecetteBoissons();
            $i = 0;
            foreach($res as $row){
                ++$i;
                if($i % 4 ===1){
                    echo '<div class="carousel-item">
                    <div class="cards-wrapper">
                    ';
                }
            ?>
                        <div class="card">
                        <img class="card-img-top" src="/WEB/Outils/images/<?php  echo $row["image"]; ?>" alt="">
                            <div class="card-body">
                                <h5 class="card-title"><?php echo $row['Titre']?></h5>
                                <p class="card-text"style="overflow-y: hidden;height: 70px;"><?php echo $row['Description']?></p>
                                <a href="/web/User/recettepage?id=<?php echo $row['Id_Recette']?>" class="btn btn-primary">Afficher La suite</a>
                            </div>
                        </div>
                <?php
            if ($i % 4 === 0) {
              echo '</div>
              </div>';
            }
                }
                    ?>
                    <?php
            if ($i % 4 !== 0) {
              echo '</div>
              </div>';
            }
                    ?>
        </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls4" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls4" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
            <center>
                <a href="/web/User/recetteboissons"><button type="submit" class="btn2">Voir Plus</button></a>
            </center>
        </div>
        


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
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
        $this->slider();
        $this->menu();
        $this->card1();
        $this->Card2();
        $this->Card3();
        $this->Card4();
        $this->footer();
    }
}
/*data:image/jpeg;base64,".".base64_encode($im[bin]).
                    $image = new userController();
                    $id = $row['id_recette'];
                    $im = $image->getImage($id);
                    echo $im;
 */

?>
<script>
  window.onload = () => {
    document.querySelector("#carouselExampleControls1").querySelector(".carousel-item").classList.add("active") 
    document.querySelector("#carouselExampleControls2").querySelector(".carousel-item").classList.add("active") 
    document.querySelector("#carouselExampleControls3").querySelector(".carousel-item").classList.add("active") 
    document.querySelector("#carouselExampleControls4").querySelector(".carousel-item").classList.add("active") 

  }  
</script>

