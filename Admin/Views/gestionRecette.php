<?php
require_once($_SERVER['DOCUMENT_ROOT'] . './WEB/Admin/Controllers/adminController.php');
class gestionRecette
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
            <link rel="stylesheet" href="./Style.css">
            <script src="./index.js"></script>
            <script src="./jquery-3.6.0.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.14.0-beta2/js/bootstrap-select.min.js"></script>
        </head>
        <?php
    }
    public function menu(){
        ?>
    <div class="menug">
        <ul class="menu">
            <li><a href="#"><img src="./Outils/Chef.png" alt=""></a></li>
            <li><a href="#">Gestion de recette</a></li>
            <li><a href="/web/Admin/news">Gestion des news</a></li>
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
    public function getRecette(){
        ?>
        <div id="table-wrapper">
         <div id="table-scroll">
            <table id="table1" class="Table2 table-striped">
                <thead>
                    <tr>
                        <th>supprimer</th>
                        <th>Titre</th><th>Description</th><th>Catégorie</th><th>Saison</th><th>Image</th><th>utilisateur</th><th>Féte</th><th>Healthy</th>
                        <th>Difficuté /5</th><th>Temps de préparation</th><th>Temps de Cuisson</th>
                        <th>Calorie</th><th>Protine</th><th>Graisse</th><th>Energie</th><th>Validé</th><th>Editer</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $rec = new adminController();
                    $res = $rec->getRecette();
                    foreach ($res as $row){
                    ?>
                    <tr>
                        <td>
                            <form class="supprim1" method="post" action="<?php $controller=new adminController();$controller->deleteRecette(); ?>">
                                <input type="hidden" name="id" value="<?php echo $row['Id_Recette']?>">
                                <button class="valide" style="background-color:red;" type="submit" name="supprimer">Supprimer</button>
                            </form>   
                        </td>
                        <td><?php echo $row['Titre']?></td><td style="overflow: hidden;"><?php echo substr($row['Description'], 0, 100) ?> <br>
                        <a href="/web/User/recettepage?id=<?php echo $row['Id_Recette']?>" class="btn btn-primary">Afficher La suite</a></td>
                        <td><?php echo $row['Categorie']?></td>
                        <td><?php if ($row['Id_Saison'] == 1) echo 'Automne'; 
                                else if($row['Id_Saison'] == 2) echo 'Hiver';
                                else if($row['Id_Saison'] == 3) echo 'Ete';
                                else if($row['Id_Saison'] == 4) echo 'Printemps';?>
                        </td>
                        <td><img  style="width:250px; height:200px;" src="/WEB/Outils/images/<?php  echo $row["image"]; ?>" alt=""></td>
                        <td><?php echo $row['Id_User']?></td>
                    <td><?php echo $row['Fete']?></td>
                    <td><?php if ($row['Healthy'] == 1)
                      echo 'Healthy'; else echo 'Non Healthy'?></td>
                    <td><?php echo $row['Difficulte']?></td><td><?php echo $row['Temps_prepa']?></td><td><?php echo $row['Temps_cuiss']?></td>
                    <td><?php echo $row['Calorie']?></td><td><?php echo $row['Protine']?></td>
                    <td><?php echo $row['Graisse']?></td><td><?php echo $row['Energie']?></td>
                        <td style="width: auto;">
                            <?php if ($row['Valide'] == 1)
                            echo 'Validé';
                            else{ echo 'Non Validé '?>
                            <form class="valid1" method="post" action="<?php $controller=new adminController();$controller->validerRecette(); ?>">
                                <input type="hidden" name="id" value="<?php echo $row['Id_Recette']?>">
                                <button class="valide" type="submit" name="valider">Valider</button>
                            </form> 
                            <?php
                            }?>       
                        </td> 
                    <td>
                        <form class="supprim1" method="post" action="#modiFormR">
                            <input type="hidden" name="id" value="<?php echo $row['Id_Recette']?>">
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
        </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.5.1.js"></script> 
        <script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js "></script> 
        <script src="https://cdn.datatables.net/1.13.1/js/dataTables.bootstrap5.min.js"></script> 
        <script src="./index.js"></script>
        <?php
    }
    public function ajouterRecette(){
        ?>
        <div class="container" id="container">
            <div class="title"> AJOUTER UNE RECETTE</div>
            <form id="ajouFormR" method="POST" action="<?php $controller=new adminController();$controller->insertRecette(); ?>" enctype="multipart/form-data">
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
                            <label for="video">Vidéo Link (Facultatif)</label>
                            <input type="text" id="video" placeholder="Mien vers la vidéo" name="video"> 
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
                        <div>
                            <label for="healthy">Healthy</label> <br>
                            <input required type="radio" name="healthy" id="healthy" value="0"> <label>Non</label> <br>
                            <input required type="radio" name="healthy" id="healthy" value="1"> <label>Oui</label> <br>
                        </div>
                        <br><br>
                    </div>
                </div>
                <div id="ingredient">   
                    <input type="text" id="recingre" name="recingreArray">  
                    <div class="select">
                        <label for="ingredient">ingrédients</label> <br>
                        <select name="ingredient" id="ingredient" required>
                        <?php
                        $cont = new adminController();
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
                    <button class="sauv" type="submit" name="sauvR">Sauvegarder</button>                
                </div>
            </form>
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
    public function modifierRecette(){
        ?>
        <div class="container" id="container">
            <div class="title"> MODIFIER UNE RECETTE</div>
            <form id="modiFormR" method="POST" action="<?php $controller=new adminController();$controller->editRecette() ?>">
            <?php
            $idd = 1;
            if(isset($_POST['id'])){$idd = $_POST['id'];}
            
            $rec = new adminController();
            $res = $rec->getRecetteID($idd);
                foreach ($res as $row){
            ?>
                <div class="groupe">
                <input type="hidden" name="identifiant" value="<?php echo $row['Id_Recette']?>">
                    <div class="grp">
                        <div class="input-box">
                            <label for="titre">Titre</label>
                            <input type="text" value="<?php echo $row['Titre']?>" id="titre" placeholder="Titre de la recette" name="titre" required> 
                        </div>
                        <div class="select">
                            <label for="Catégorie">Catégorie</label> <br>
                            <select name="Catégorie" id="Catégorie" required>
                                <option value="<?php echo $row['Categorie']?>"><?php echo $row['Categorie']?></option>
                                <option value="Entrées">Entrées</option>
                                <option value="Plats">Plats</option>
                                <option value="Desserts">Desserts</option>
                                <option value="Boissons">Boissons</option>
                            </select>
                        </div>
                        <div class="select">
                            <label for="Fete">Type de Fête</label> <br>
                            <select name="Fete" id="Fete" required>
                            <option value="<?php echo $row['Fete']?>"><?php echo $row['Fete']?></option>
                                <option value="Mariage">Mariage</option>
                                <option value="Anniversaire">Anniversaire</option>
                                <option value="Aid">Aid</option>
                                <option value="Achoura">Achoura</option>
                                <option value="Autres">Autres</option>
                            </select>
                        </div>
                        <div class="select">
                            <label for="saison">Saison</label> <br>
                            <select name="saison" id="saison" required>
                                <option value="<?php echo $row['Id_Saison']?>">
                                    <?php
                                    if ($row['Id_Saison'] == 1) echo 'Automne'; 
                                    else if($row['Id_Saison'] == 2) echo 'Hiver';
                                    else if($row['Id_Saison'] == 3) echo 'Ete';
                                    else if($row['Id_Saison'] == 4) echo 'Printemps';
                                    ?>
                                </option>
                                <option value="1">Autonme</option>
                                <option value="2">Hiver</option>
                                <option value="3">Ete</option>
                                <option value="4">Printemps</option>
                            </select>
                        </div>  
                        
                    </div>
                    <div class="grp">
                        <div class="input-box">
                            <label for="Description">Description</label> <br>
                            <textarea style="border: 2px solid;" name="Description" id="Description" cols="71.9" rows="5" required><?php echo $row['Description']?></textarea>
                        </div>   
                        <div class="input-box">
                            <label for="etape">Etapes</label> <br>
                            <textarea style="border: 2px solid;" name="etape" id="etape" cols="71.9" rows="5" required><?php echo $row['etapes']?></textarea>
                        </div>   
                    </div>
                </div>
                <div class="groupe">
                    <div class="grp">
                        <div class="input-box">
                            <label for="Calorie">Calorie</label>
                            <input type="number" value="<?php echo $row['Calorie']?>" step="0.01" id="Calorie" placeholder="" name="Calorie" required>
                        </div>
                        <div class="input-box"> 
                            <label for="Protine">Protine</label>
                            <input type="number" value="<?php echo $row['Protine']?>" step="0.01" id="Protine" placeholder="" name="Protine" required> 
                        </div>
                        <div class="input-box">
                            <label for="Temps de préparation">Temps de préparation</label> <br>
                            <input type="time" value="<?php echo $row['Temps_prepa']?>" id="Temps de préparation" placeholder="Temps de préparation 00:00:00" name="Temps_de_préparation" required> 
                        </div>
                        <div class="input-box">
                            <label for="Temps de cuisson">Temps de cuisson</label><br>
                            <input type="time" value="<?php echo $row['Temps_cuiss']?>" id="Temps de cuisson" placeholder="Temps de cuisson 00:00:00" name="Temps_de_cuisson"required> 
                        </div>
                        <div class="input-box">
                            <label for="video">Vidéo</label>
                            <input value="<?php echo $row['video']?>" type="text" id="video" placeholder="Insérer un lien vers video" name="video"> 
                        </div>
                        
                    </div>       
                    <div class="grp">
                        <div class="input-box">
                            <label for="id_user">Id Utilisateur</label>
                            <input type="number" value="<?php echo $row['Id_User']?>" id="id_user" placeholder="" name="id_user" required>
                        </div>
                        <div class="input-box">
                            <label for="Graisse">Graisse</label>
                            <input type="number" value="<?php echo $row['Graisse']?>" step="0.01" id="Graisse" placeholder="" name="Graisse" required>
                        </div>
                        <div class="input-box"> 
                            <label for="Energie">Energie</label>
                            <input type="number" value="<?php echo $row['Energie']?>" step="0.01" id="Energie" placeholder="" name="Energie" required> 
                        </div>
                        <div class="input-box">
                            <label for="Difficulté">Difficulté</label>
                            <input type="number" value="<?php echo $row['Difficulte']?>" id="titre" placeholder="Difficulté /5" name="Difficulté" min=0 max=5 required> 
                        </div>
                        <br>
                        <div>
                            <label for="healthy">Healthy</label> <br>
                            <input required type="radio" name="healthy" id="healthy" value="0" <?php if ($row['Healthy'] == 0) echo 'checked' ?>> <label>Non</label> <br>
                            <input required type="radio" name="healthy" id="healthy" value="1" <?php if ($row['Healthy'] == 1) echo 'checked' ?>> <label>Oui</label> <br>
                        </div>
                        <br><br>
                    </div>
                </div>
                <button class="sauv" type="submit" name="modifR">Modifier</button>
            </form>
            <?php
                } ?>
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
        $this->getRecette();
        $this->ajouterRecette();
        $this->modifierRecette();
        $this->footer();
    }
}
?>