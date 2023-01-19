<?php
require_once($_SERVER['DOCUMENT_ROOT'] . './WEB/User/Controllers/userController.php');
class signup
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
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
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
                <div class="icn">
                    <a href="http://www.facebook.com" target="_blank"><img class="icon" src="./Outils/facebook.png" alt="facebook" ></a>
                    <a href="http://www.instagram.com" target="_blank"><img class="icon" src="./Outils/instagram.png" alt="instagram"></a>
                    <a href="mailto:jh_zoumata@esi.dz"><img class="icon" src="./Outils/mail.png" alt="mail"></a>
                </div>
            </nav>
        </div>
        <?php
    }
    public function signup(){
        ?>
        <style>
            .login form .form-group{
                margin-bottom: 0;
            }
            form input{
                width: auto;
            }
            .login h1 {
                margin-bottom: 0;
            }
            .form-label{
                margin-bottom: 0;
            }
        </style>
        <div class="log" style="height:100%">
            <div class="login">
                <h1 class="text-center">S'inscrire</h1>
                <form class="needs-validation"  method="post" action="<?php $controller=new userController();$controller->signUP(); ?>">
                    <div class="form-group was-validated">
                        <label class="form-label" for="nom">Nom</label>
                        <input class="form-control" type="text" id="nom" name="nom"required>
                    </div>
                    <div class="form-group was-validated">
                        <label class="form-label" for="prenom">Prénom</label>
                        <input class="form-control" type="text" id="prenom" name="prenom"required>
                    </div>
                    <div class="form-group was-validated" style="padding-left: 0;">
                        <label  class="form-label" for="sexe">Sexe :</label> <br>
                            <input style="height: auto;" required type="radio" name="sexe" id="sexe" value="homme"> <label>Homme</label> 
                            <input style="height: auto;" required type="radio" name="sexe" id="sexe" value="femme"> <label>Femme</label>
                            <input style="height: auto;" required type="radio" name="sexe" id="sexe" value="autre"> <label>Autre</label>
                    </div>
                    <div class="form-group was-validated">
                        <label class="form-label" for="date">Date de naissance</label>
                        <input class="form-control" type="date" id="date" name="date" required>
                    </div>
                    <div class="form-group was-validated">
                        <label class="form-label" for="adresse">Adresse E-mail</label>
                        <input class="form-control" type="email" id="adresse" name="adresse" required>
                    </div>
                    <div class="form-group was-validated">
                        <label class="form-label" for="tel">Numéro de téléphone</label>
                        <input class="form-control" type="number" id="tel" name="tel" required>
                    </div>
                    <div class="form-group was-validated">
                        <label class="form-label" for="username">Username</label>
                        <input class="form-control" type="text" id="username" name="username" required>
                    </div>
                    <div class="form-group was-validated">
                        <label class="form-label" for="password">Mot de passe</label>
                        <input class="form-control" minlength="8" placeholder="Minimum 8 caractéres" type="password" id="password" name="password" required>
                    </div>
                    <input class="btn btn-success w-100" name="signUP" type="submit" value="SIGN UP">
                    <div class="form-group was-validated">
                        <br>
                        <label class="form-label" >Vous disposez d'un compte ?</label>
                        <a href="/web/User/login" style="padding-left:160px;">Login</a>
                    </div>
                </form>
            </div>
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
        $this->signup();
        $this->footer();
    }
}
?>