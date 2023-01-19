<?php
require_once($_SERVER['DOCUMENT_ROOT'] . './WEB/Admin/Controllers/adminController.php');
class gestionNews
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
            <title>RecipePress</title>
            <link rel="stylesheet" href="./Style.css">
            <script src="./index.js"></script>
            <script src="./jquery-3.6.0.min.js"></script>
        </head>
        <?php
    }
    public function menu(){
        ?>
    <div class="menug">
        <ul class="menu">
            <li><a href="#"><img src="./Outils/Chef.png" alt=""></a></li>
            <li><a href="/web/Admin/recette">Gestion de recette</a></li>
            <li><a href="#">Gestion des news</a></li>
            <li><a href="/web/Admin/user">Gestion des utilisateurs</a></li>
            <li><a href="/web/Admin/nutrition">Gestion de la nutrition</a></li>
            <li><a href="/web/Admin/parametres">Paramètres</a></li>
            <li><a href="/web/Admin/contact">Gestion des contacts</a></li>
            <li><a href="#"><img src="./Outils/Plat.png" alt=""></a></li>
        </ul>
    </div>
    <div class="menu1">
            <nav>
                <center>
                <a href="#"><img src="./Outils/logo.png" alt="logo"></a>
                </center>
            </nav>
        </div>
        <?php
    }
    public function getNews(){
        ?>
        <table id="tableNews" class="Table2 table-striped">
            <thead>
                <tr>
                    <th>Supprimer</th>
                    <th>Titre</th><th>Description</th>
                    <th>Date</th><th>Image</th><th>Editer</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $rec = new adminController();
                $res = $rec->getNews();
                foreach ($res as $row){
                ?>
                <tr>
                    <td>
                        <form class="supprim1" method="post" action="<?php $controller=new adminController();$controller->deleteNews(); ?>">
                            <input type="hidden" name="id" value="<?php echo $row['Id_News']?>">
                            <button class="valide" style="background-color:red;" type="submit" name="supprimerN">Supprimer</button>
                        </form>     
                    </td>
                    <td><?php echo $row['Titre']?></td>
                    <td><?php echo substr($row['Description'], 0, 200)?>...<br>
                    <a href="/web/User/newspage?id=<?php echo $row['Id_News']?>" class="btn btn-primary">Afficher La suite</a></td>
                    <td><?php echo $row['Date']?></td>
                    <td><img src="/WEB/Outils/images/<?php  echo $row["image"]; ?>" alt=""></td>
                    <td>
                        <form class="supprim1" method="post" action="#modiFormN">
                            <input type="hidden" name="id" value="<?php echo $row['Id_News']?>">
                            <button class="valide" style="background-color:orange;" type="submit" name="suppr">Editer</button>
                        </form>     
                    </td>
                </tr>
                <?php
                }
                ?>
            </tbody>
            <tfoot></tfoot>
        </table>
        <script src="https://code.jquery.com/jquery-3.5.1.js"></script> 
        <script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js "></script> 
        <script src="https://cdn.datatables.net/1.13.1/js/dataTables.bootstrap5.min.js"></script> 
        <script src="./index.js"></script>
        <?php
    }
    public function ajouterNews(){
        ?>
        <div class="container" id="container">
            <div class="title"> AJOUTER UN NEWS</div>
            <form id="ajouFormN"  method="POST"  action="<?php $controller=new adminController();$controller->insertNews(); ?>" enctype="multipart/form-data">
                <div class="groupe">
                    <div class="grp">
                        <div class="input-box">
                            <label for="titre">Titre</label>
                            <input type="text" id="titre" placeholder="Titre de la recette" name="titre" required> 
                        </div> 
                        <div class="input-box">
                            <label for="date">Date</label>
                            <input type="date" id="date" placeholder="" name="date" required>
                        </div>
                        <br>
                        <div class="input-box"> 
                            <label for="image">Image</label>
                            <input style="border: none;" type="file" id="image" placeholder="" name="image" required> 
                        </div>
                    </div>
                    <div class="grp">
                        <div class="input-box">
                            <label for="Description">Description</label> <br>
                            <textarea style="border: 2px solid;" name="Description" id="Description" cols="71.9" rows="8" required></textarea>
                        </div>   
                    </div>
                </div>
                <input type="hidden" name="user" value="0">
                <br> <br>
                <button class="sauv" type="submit" name="sauvN">Sauvegarder</button>
            </form>
        </div>
        <?php
    }
    public function modifierNews(){
        ?>
        <div class="container" id="container">
            <div class="title"> MODIFIER UN NEWS</div>
            <form id="modiFormN" method="POST" action="<?php $controller=new adminController();$controller->editNews(); ?>">
            <?php
            $idd = 1;
            if(isset($_POST['id'])){$idd = $_POST['id'];}
            
            $rec = new adminController();
            $res = $rec->getNewsID($idd);
                foreach ($res as $row){
            ?>
                <div class="groupe">
                    <div class="grp">
                        <input type="hidden" name="identifiant" value="<?php echo $row['Id_News']?>">
                        <div class="input-box">
                            <label for="titre">Titre</label>
                            <input type="text" id="titre"value="<?php echo $row['Titre'] ?>" name="titre" required> 
                        </div>
                        <div class="input-box">
                            <label for="date">Date</label>
                            <input type="date" id="date" value="<?php echo $row['Date']?>" name="date" required>
                        </div>
                        <br>
                        <div class="input-box"> 
                            <label for="image">Image</label>
                            <input style="border: none;" type="file" id="image"  name="image" required> 
                        </div>

                    </div>
                    <div class="grp">
                        <div class="input-box">
                            <label for="Description">Description</label> <br>
                            <textarea style="border: 2px solid;" name="Description"  value="<?php echo $row['Description']?>" id="Description" cols="71.9" rows="8" required><?php echo $row['Description']?></textarea>
                        </div>   
                    </div>
                </div>
                <br> <br>
                <button class="sauv" type="submit" name="modifN">Modifier</button>
            </form>
            <?php } ?>
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
        $this->menu();
        $this->getNews();
        $this->ajouterNews();
        $this->modifierNews();
        $this->footer();
    }
}
?>