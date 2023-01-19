<?php
require_once($_SERVER['DOCUMENT_ROOT'] . './WEB/User/Controllers/userController.php');
class ajouterRecette
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
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/css/bootstrap.min.css">
            <link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/dataTables.bootstrap5.min.css">
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.14.0-beta2/css/bootstrap-select.min.css">
            <title>RecipePress</title>
            <script src="./index.js"></script>
            <script src="./jquery-3.6.0.min.js"></script>
            <link rel="stylesheet" href="./style2.css">
            <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.14.0-beta2/js/bootstrap-select.min.js"></script>
        </head>
        <div class="menu1">
            <nav>
                <center>
                <a href="#"><img src="./Outils/logo.png" alt="logo"></a>
                </center>
            </nav>
        </div>
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
    public function ajouterRecette(){
        ?>
        <div class="container" id="container">
            <div class="title"> AJOUTER UNE RECETTE</div>
            <form id="ajouFormR" method="POST" action="<?php $controlleur = new userController();$controlleur->insertRecette(); ?>" enctype="multipart/form-data">
                <div class="groupe">
                    <div class="grp">
                        <div class="input-box">
                            <label for="titre">Titre</label>
                            <input type="text" id="titre" placeholder="Titre de la recette" name="titre" required> 
                        </div>
                        <div class="select">
                            <label for="saison">Saison</label> <br>
                            <select name="saison" id="saison" required>
                                <option value="1">Autonme</option>
                                <option value="2">Hiver</option>
                                <option value="3">Ete</option>
                                <option value="4">Printemps</option>
                            </select>
                        </div>  
                        <div class="select">
                            <label for="Catégorie">Catégorie</label> <br>
                            <select name="Catégorie" id="Catégorie" required>
                                <option value="Entrées">Entrées</option>
                                <option value="Plats">Plats</option>
                                <option value="Desserts">Desserts</option>
                                <option value="Boissons">Boissons</option>
                            </select>
                        </div>
                        <div class="select">
                            <label for="Fete">Type de Fête</label> <br>
                            <select name="Fete" id="Fete" required>
                                <option value="Mariage">Mariage</option>
                                <option value="Anniversaire">Anniversaire</option>
                                <option value="Aid">Aid</option>
                                <option value="Achoura">Achoura</option>
                                <option value="Autres">Autres</option>
                            </select>
                        </div>     
                    </div>
                    <div class="grp">
                        <div class="input-box">
                            <label for="Description">Description</label> <br>
                            <textarea style="border: 2px solid;" name="Description" id="Description" cols="71.9" rows="5" required></textarea>
                        </div> 
                        <div class="input-box">
                            <label for="etape">Etapes</label> <br>
                            <textarea style="border: 2px solid;" name="etape" id="etape" cols="71.9" rows="5" required></textarea>
                        </div>                                  
                    </div>
                </div>
                <div class="groupe">
                    <div class="grp">       
                        <div class="input-box">
                            <label for="Calorie">Calorie</label>
                            <input type="number" step="0.01" id="Calorie" placeholder="" name="Calorie" required>
                        </div>
                        <div class="input-box"> 
                            <label for="Protine">Protine</label>
                            <input type="number" step="0.01" id="Protine" placeholder="" name="Protine" required> 
                        </div>
                        <div class="input-box">
                            <label for="Temps de préparation">Temps de préparation</label> <br>
                            <input type="time" id="Temps de préparation" placeholder="Temps de préparation 00:00:00" name="Tempsdepréparation" required> 
                        </div>
                        <div class="input-box">
                            <label for="Temps de cuisson">Temps de cuisson</label><br>
                            <input type="time" id="Temps de cuisson" placeholder="Temps de cuisson 00:00:00" name="Tempsdecuisson"required> 
                        </div>
                        <div class="input-box">
                            <label for="image">Image</label>
                            <input style="border: none;" type="file" id="image" placeholder="Insérer une image" name="image" required> 
                        </div>
                        <div class="input-box">
                            <label for="video">Vidéo (Facultatif)</label>
                            <input type="text" id="video" placeholder="Insérer une video" name="video"> 
                        </div>                     
                    </div>      
                    <div class="grp">
                        <div class="input-box">
                            <label for="Graisse">Graisse</label>
                            <input type="number" step="0.01" id="Graisse" placeholder="" name="Graisse" required>
                        </div>
                        <div class="input-box"> 
                            <label for="Energie">Energie</label>
                            <input type="number" step="0.01" id="Energie" placeholder="" name="Energie" required> 
                        </div>
                        <div class="input-box">
                            <label for="Difficulté">Difficulté</label>
                            <input type="number" id="titre" placeholder="Difficulté /5" name="Difficulté" min=0 max=5 required> 
                        </div>
                        <br>
                        <br><br>
                    </div>
                </div>
                <div id="ingredient">   
                    <input type="text" id="recingre" name="recingreArray">  
                    <div class="select">
                        <label for="ingredient">ingrédients</label> <br>
                        <select name="ingredient" id="ingredient" required>
                        <?php
                        $cont = new userController();
                        $ing = $cont->getNutrition();
                        foreach($ing as $ing1){
                        ?>
                            <option value="<?php echo $ing1["Id_Ingredient"] ?>" id="ingredients"><?php echo $ing1["Nom"] ?></option>
                            <?php
                        }
                        ?>
                      </select>
                    </div>
                    <div class="input-box">
                            <label for="quantité">Quantité</label> <br>
                            <input style="height: 45px;width: 500px;border: 3px solid black;" type="text" name="quantité" id="quantité">                            
                    </div>   
                </div>
                <br>
                <div style="display: flex; justify-content: space-between; margin: auto 30px;">
                    <button class="sauv" style="width: 200px;" onclick="pushData(); return false;">Ajouter une autre ingrédient</button> 
                     <button class="sauv" type="submit" name="inserR">Ajouter</button>                  
                </div>
                
            </form>
 
            <br>
        </div>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.14.0-beta2/js/bootstrap-select.min.js"></script>
<script>
            var myArr=[]
            function pushData(){
            var inputText = document.querySelector('select#ingredient').value;
            var inputText2 = document.querySelector('#quantité').value;
            var ing = {
                id: inputText,
                quant: inputText2
            }
            myArr.push(ing);
            // display array data
            document.querySelector('#recingre').value = JSON.stringify(myArr);                
        }
</script>
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
        $this->menu();
        $this->menu1();
        $this->ajouterRecette();
        $this->footer();
    }
}
?>