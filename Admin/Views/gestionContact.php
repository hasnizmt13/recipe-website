<?php
require_once($_SERVER['DOCUMENT_ROOT'] . './WEB/Admin/Controllers/adminController.php');
class contact
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
            <li><a href="web/Admin/news">Gestion des news</a></li>
            <li><a href="/web/Admin/user">Gestion des utilisateurs</a></li>
            <li><a href="/web/Admin/nutrition">Gestion de la nutrition</a></li>
            <li><a href="/web/Admin/parametres">Paramètres</a></li>
            <li><a href="#">Gestion des contacts</a></li>
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
    public function getContact(){
        ?>
        <table id="tableNews" class="Table2 table-striped">
            <thead>
                <tr>
                    <th>Username</th>
                    <th>message</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $rec = new adminController();
                $res = $rec->getContact();
                foreach ($res as $row){
                ?>
                <tr>
                    <td><?php echo $row['username']?></td>
                    <td><?php echo $row['message']?>
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
        $this->getContact();
        $this->footer();
    }
}
?>