<?php
require_once($_SERVER['DOCUMENT_ROOT'] . './WEB/Admin/Controllers/adminController.php');
class gestionNutrition
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
            <li><a href="/web/Admin/news">Gestion des news</a></li>
            <li><a href="/web/Admin/user">Gestion des utilisateurs</a></li>
            <li><a href="#">Gestion de la nutrition</a></li>
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
    public function getNutrition(){
        ?>
        <table id="tableNutrition" class="Table2 table-striped">
            <thead>
                <tr>
                    <th>Supprimer</th>
                    <th>Nom</th><th>Healthy</th><th>Proportion</th><th>Saison</th>
                    <th>Calorie</th><th>Protine</th><th>Graisse</th>
                    <th>Energie</th><th>Image</th><th>Valide</th><th>Editer</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $rec = new adminController();
                $res = $rec->getNutrition();
                foreach ($res as $row){
                ?>
                <tr>
                    <td>
                        <form class="supprim1" method="post"  action="<?php $controller=new adminController();$controller->deleteNutrition();?>">
                        <input type="hidden" name="id" value="<?php echo $row['Id_Ingredient']?>">
                            <button class="valide" style="background-color:red;" type="submit" name="supprimerI">Supprimer</button>
                        </form>     
                    </td>
                    <td><?php echo $row['Nom']?></td>
                    <td><?php if ($row['Healthy'] == 1)
                      echo 'Healthy'; else echo 'Non Healthy'?></td>
                    <td><?php echo $row['proportion']?></td>
                    <td><?php if ($row['Id_saison'] == 1) echo 'Automne'; 
                            else if($row['Id_saison'] == 2) echo 'Hiver';
                            else if($row['Id_saison'] == 3) echo 'Ete';
                            else if($row['Id_saison'] == 4) echo 'Printemps';?>
                    </td>
                    <td><?php echo $row['Calorie']?></td><td><?php echo $row['Protine']?></td>
                    <td><?php echo $row['Graisse']?></td><td><?php echo $row['Energie']?></td>
                    <td><img src="/WEB/Outils/images/<?php  echo $row["image"]; ?>" alt=""></td>
                    <td style="width: auto;">
                        <?php if ($row['valide'] == 1)
                        echo 'Validé';
                        else{ echo 'Non Validé '?>
                        <form class="valid1" method="post" action="<?php $controller=new adminController();$controller->validerNutrition(); ?>">
                            <input type="hidden" name="id" value="<?php echo $row['Id_Ingredient']?>">
                            <button class="valide" type="submit" name="validerI">Valider</button>
                        </form> 
                        <?php
                        }?>       
                    </td> 
                    <td>
                        <form class="supprim1" method="post" action="#modiFormI">
                            <input type="hidden" name="id" value="<?php echo $row['Id_Ingredient']?>">
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
    public function ajouterIngredient(){
        ?>
        <div class="container" id="container">
            <div class="title"> AJOUTER UN INGREDIENT</div>
            <form id="ajouFormI" method="POST" action="<?php $controller=new adminController();$controller->insertIngredient(); ?>" enctype="multipart/form-data">
                <div class="groupe">
                    <div class="grp">
                        <div class="input-box">
                            <label for="titre">Nom</label>
                            <input type="text" id="titre" placeholder="Nom de l'ingredient" name="titre" required> 
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
                        <div class="input-box">
                            <label for="Calorie">Calorie</label>
                            <input type="number" step="0.01" id="Calorie" placeholder="Calorie" name="Calorie" required>
                        </div>
                        <div class="input-box"> 
                            <label for="Protine">Protine</label>
                            <input type="number" step="0.01" id="Protine" placeholder="Protine" name="Protine" required> 
                        </div>
                        <div class="input-box">
                            <br>
                            <label for="image">Image</label>
                            <input style="border: none;" type="file" id="image" placeholder="Insérer des images" name="image" required> 
                        </div>
                    </div>
                    <div class="grp">
                        <div class="input-box">
                            <label for="Graisse">Graisse</label>
                            <input type="number" step="0.01" id="Graisse" placeholder="Graisse" name="Graisse" required>
                        </div>
                        <div class="input-box"> 
                            <label for="Energie">Energie</label>
                            <input type="number" step="0.01" id="Energie" placeholder="Energie" name="Energie" required> 
                        </div>
                        <br>
                        <div>
                            <label for="healthy">Healthy</label> <br>
                            <input required type="radio" name="healthy" id="healthy" value="0"> <label>Non</label> <br>
                            <input required type="radio" name="healthy" id="healthy" value="1"> <label>Oui</label> <br>
                        </div> 
                        <div class="input-box">
                            <label for="proportion">Poportion</label>
                            <input type="number" step="0.01" id="proportion" placeholder="Proportion de healthy" name="porportion" required>
                        </div>
                    </div>
                </div>
                <input type="hidden" name="valide" value="0">
                <br>
                <button class="sauv" type="submit" name="sauvI">Sauvegarder</button>
            </form>
        </div>
        <?php
    }
    public function modifierIngredient(){
        if(isset($_POST['id'])){$idd = $_POST['id'];
        ?>
           <div class="container" id="container">
            <div class="title"> MODIFIER UN INGREDIENT</div>
            <form id="modiFormI" method="POST" action="<?php $controller=new adminController();$controller->editIngredient(); ?>">
            <?php
            $rec = new adminController();
            $res = $rec->getNutritionID($idd);
            foreach ($res as $row){
            ?>
                <div class="groupe">
                    <div class="grp">
                    <input type="hidden" name="id" value="<?php echo $row['Id_Ingredient']?>">
                        <div class="input-box">
                            <label for="titre">Nom</label>
                            <input type="text" value="<?php echo $row['Nom'] ?>" id="titre" placeholder="Nom de l'ingredient" name="titre" > 
                        </div>
                        <div class="select">
                            <label for="saison">Saison</label> <br>
                            <select name="saison" id="saison" >
                                <option value="<?php echo $row['Id_saison']?>">
                                    <?php
                                    if ($row['Id_saison'] == 1) echo 'Automne'; 
                                    else if($row['Id_saison'] == 2) echo 'Hiver';
                                    else if($row['Id_saison'] == 3) echo 'Ete';
                                    else if($row['Id_saison'] == 4) echo 'Printemps';
                                    ?>
                                </option>
                                <option value="1">Autonme</option>
                                <option value="2">Hiver</option>
                                <option value="3">Ete</option>
                                <option value="4">Printemps</option>
                            </select>
                        </div>  
                        <div class="input-box">
                            <label for="Calorie">Calorie</label>
                            <input type="number" value="<?php echo $row['Calorie']?>" step="0.01" id="Calorie" placeholder="Calorie" name="Calorie" >
                        </div>
                        <div>
                            <label for="valide">Valide</label> <br>
                            <input required type="radio" <?php if ($row['valide'] == 0) echo 'checked' ?> name="valide" id="valide" value="0"> <label>Non</label> <br>
                            <input required type="radio" <?php if ($row['valide'] == 1) echo 'checked' ?> name="valide" id="valide" value="1"> <label>Oui</label> <br>
                        </div> 
                        <div class="input-box">
                            <br>
                            <label for="image">Image</label>
                            <input style="border: none;" type="file" id="image" placeholder="Insérer des images" name="image" > 
                        </div>
                    </div>
                    <div class="grp">
                    <div class="input-box">
                            <label for="Graisse">Graisse</label>
                            <input type="number" value="<?php echo $row['Graisse']?>" step="0.01" id="Graisse" placeholder="Graisse" name="Graisse" >
                        </div>
                        <div class="input-box"> 
                            <label for="Energie">Energie</label>
                            <input type="number" value="<?php echo $row['Energie']?>" step="0.01" id="Energie" placeholder="Energie" name="Energie" > 
                        </div>
                        <div class="input-box"> 
                            <label for="Protine">Protine</label>
                            <input type="number" value="<?php echo $row['Protine']?>" step="0.01" id="Protine" placeholder="Protine" name="Protine" > 
                        </div>
                        
                        <br>
                        <div>
                            <label for="healthy">Healthy</label> <br>
                            <input  type="radio" name="healthy" id="healthy" value="0" <?php if ($row['Healthy'] == 0) echo 'checked' ?>> <label>Non</label> <br>
                            <input  type="radio" name="healthy" id="healthy" value="1" <?php if ($row['Healthy'] == 1) echo 'checked' ?>> <label>Oui</label> <br>
                        </div> 
                        <div class="input-box">
                            <label for="proportion">Poportion</label>
                            <input type="number"  value="<?php echo $row['proportion']?>" step="0.01" id="proportion" placeholder="Proportion de healthy" name="proportion" >
                        </div>
                    </div>
                </div>
                <br>
                <button class="sauv" type="submit" name="modifI">Modifier</button>
            </form>
            <?php } } ?>
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
        $this->getNutrition();
        $this->ajouterIngredient();
        $this->modifierIngredient();
        $this->footer();
    }
}
?>