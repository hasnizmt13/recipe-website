<?php
require_once($_SERVER['DOCUMENT_ROOT'].'./WEB/User/Models/userModel.php');
require_once($_SERVER['DOCUMENT_ROOT'].'./WEB/User/Views/home.php');
require_once($_SERVER['DOCUMENT_ROOT'].'./WEB/User/Views/recetteCard.php');
require_once($_SERVER['DOCUMENT_ROOT'].'./WEB/User/Views/recettePage.php');
require_once($_SERVER['DOCUMENT_ROOT'].'./WEB/User/Views/login.php');
require_once($_SERVER['DOCUMENT_ROOT'].'./WEB/User/Views/signUp.php');
require_once($_SERVER['DOCUMENT_ROOT'].'./WEB/User/Views/newsPage.php');
require_once($_SERVER['DOCUMENT_ROOT'].'./WEB/User/Views/newsCard.php');
require_once($_SERVER['DOCUMENT_ROOT'].'./WEB/User/Views/nutrition.php');
require_once($_SERVER['DOCUMENT_ROOT'].'./WEB/User/Views/ajouterRecette.php');
require_once($_SERVER['DOCUMENT_ROOT'].'./WEB/User/Views/contact.php');
class userController{
    public function getNews(){
        $model=new userModel();
        $res=$model->getNews();
        return $res;
    }
    public function getNutrition(){
        $model=new userModel();
        $res=$model->getNutrition();
        return $res;
    }
    public function getNutritionIDRecette($Id_recette){
        $model=new userModel();
        $res=$model->getNutritionIDRecette($Id_recette);
        return $res;
    }
    public function getRecetteID($Id_recette){
        $model=new userModel();
        $res=$model->getRecetteID($Id_recette);
        return $res;
    }
    public function getFavoris($Id_user){
        $model=new userModel();
        $res=$model->getFavoris($Id_user);
        return $res;
    }
    public function getRecettenote($Id_recette){
        $model=new userModel();
        $res=$model->getRecettenote($Id_recette);
        return $res;
    }
    public function getRecetteFavoris($Id_user,$Id_recette){
        $model=new userModel();
        $res=$model->getRecetteFavoris($Id_user,$Id_recette);
        return $res;
    }
    public function getUserID($Id_user){
        $model=new userModel();
        $res=$model->getUserID($Id_user);
        return $res;
    }
    public function getNewsID($Id_news){
        $model=new userModel();
        $res=$model->getNewsID($Id_news);
        return $res;
    }

    public function getRecette(){
        $model=new userModel();
        $res=$model->getRecette();
        return $res;
    }
    public function getRecetteAffich(){
        $model=new userModel();
        $res=$model->getRecetteAffich();
        return $res;
    }
    public function getRecetteTP(){
        $model=new userModel();
        $res=$model->getRecetteTP();
        return $res;
    }
    public function getRecetteTT(){
        $model=new userModel();
        $res=$model->getRecetteTT();
        return $res;
    }
    public function getRecetteTC(){
        $model=new userModel();
        $res=$model->getRecetteTC();
        return $res;
    }
    public function getRecetteCalorie(){
        $model=new userModel();
        $res=$model->getRecetteCalorie();
        return $res;
    }    
    public function getRecettePlats(){
        $model=new userModel();
        $res=$model->getRecettePlats();
        return $res;
    }
    public function getRecetteBoissons(){
        $model=new userModel();
        $res=$model->getRecetteBoissons();
        return $res;
    }
    public function getRecetteDesserts(){
        $model=new userModel();
        $res=$model->getRecetteDesserts();
        return $res;
    }
    public function getRecetteEntrées(){
        $model=new userModel();
        $res=$model->getRecetteEntrées();
        return $res;
    }
    public function getHealthy(){
        $model=new userModel();
        $res=$model->getHealthy();
        return $res;
    }
    public function getHiver(){
        $model=new userModel();
        $res=$model->getHiver();
        return $res;
    }
    public function getEte(){
        $model=new userModel();
        $res=$model->getEte();
        return $res;
    }
    public function getPrintemps(){
        $model=new userModel();
        $res=$model->getPrintemps();
        return $res;
    }
    public function getAutomne(){
        $model=new userModel();
        $res=$model->getAutomne();
        return $res;
    }
    public function getMariage(){
        $model=new userModel();
        $res=$model->getMariage();
        return $res;
    }
    public function getAid(){
        $model=new userModel();
        $res=$model->getAid();
        return $res;
    }
    public function getAnniv(){
        $model=new userModel();
        $res=$model->getAnniv();
        return $res;
    }
    public function getAchoura(){
        $model=new userModel();
        $res=$model->getAchoura();
        return $res;
    }    
    public function getAutres(){
        $model=new userModel();
        $res=$model->getAutres();
        return $res;
    }
    public function getImage($id){
        $model=new userModel();
        $res=$model->getImage($id);
        return $res;
    }
    public function Login(){
        if(isset($_POST["login"])){
            $username= strip_tags(trim($_POST['username']));
            $password= strip_tags(trim($_POST['password']));
            $model=new userModel();
            $res=$model->Login($username,$password);
            session_start();
            unset($_POST);
            if($res>0){
                $_SESSION["username"]=$username;
                $_SESSION["id"] = $res["Id_User"];
                header("location:"."/web/User/");
            }
            return $res;    
        }
    }
    public function Logout(){
        if(isset($_POST['logout'])){
            session_start();
            unset($_SESSION['username']);
            session_destroy();
            unset($_POST);
            header("location:"."/web/User/");
        }
    }
    public function signUP()
    {
        if (isset($_POST['signUP'])) {
            $Username = strip_tags(trim($_POST['username']));
            $password = strip_tags(trim($_POST['password']));
            $adresse = strip_tags(trim($_POST['adresse']));
            $model = new userModel();
            $count = $model->Login($Username, $password);
            if ($count > 0) {
                echo 'This User Already Exists';
                unset($_POST);
            }else {
                $nom = strip_tags(trim($_POST['nom']));
                $prenom = strip_tags(trim($_POST['prenom']));
                $adresse = strip_tags(trim($_POST['adresse']));
                $sexe = strip_tags(trim($_POST['sexe']));
                $Date = strip_tags(trim($_POST['date']));
                $Numero = intval(strip_tags(trim($_POST['tel'])));
                $Username = strip_tags(trim($_POST['username']));
                $password = strip_tags(trim($_POST['password']));
                $Valide = '0';
                $model = new userModel();
                $res = $model->signUP($nom, $prenom, $adresse, $sexe, $Date, $Numero, $Username, $password, $Valide);
                unset($_POST);
                header("location:"."/web/User");
                return $res;
            }
        }
        return false;
    }
    public function addFavoris(){
        if(isset($_POST['add'])){
            $Id_user = strip_tags(trim($_POST['idU']));
            $Id_recette = strip_tags(trim($_POST['idR']));
            $model = new userModel();
            $res = $model->addFavoris($Id_user,$Id_recette);
            unset($_POST);
            header("Refresh:0");
            return $res;
        }
        return false;
    }
    public function deleteFavoris(){
        if(isset($_POST['delete'])){
            $Id_user = strip_tags(trim($_POST['idU']));
            $Id_recette = strip_tags(trim($_POST['idR']));
            $model=new userModel();
            $res = $model->deleteFavoris($Id_user, $Id_recette);
            unset($_POST);
            if($res > 0){
                header("Refresh:0"); 
             }
        }   
    }
    public function addNote(){
        if(isset($_POST['rate'])){
            $Id_user = strip_tags(trim($_POST['idU']));
            $Id_recette = strip_tags(trim($_POST['idR']));
            $note = strip_tags(trim($_POST['rating']));;
            $model = new userModel();
            $res = $model->addNote($Id_user,$Id_recette,$note);
            unset($_POST);
            header("Refresh:0");
            return $res;
        }
        return false;
    }
    public function insertRecette(){
        if(isset($_POST['inserR'])){
            $Id_Saison=strip_tags(trim($_POST['saison']));
            $Titre=strip_tags(trim($_POST['titre']));
            $Description=strip_tags(trim($_POST['Description']));
            $etapes=strip_tags(trim($_POST['etape']));

            $Healthy="";
            $Categorie=strip_tags(trim($_POST['Catégorie']));
            $Fete=strip_tags(trim($_POST['Fete']));
            $Difficulte=strip_tags(trim($_POST['Difficulté']));
            $Temps_prepa=strip_tags(trim($_POST['Tempsdepréparation']));
            $Temps_repos="00:00:00";
            $Temps_cuiss=strip_tags(trim($_POST['Tempsdecuisson']));
            $Calorie=strip_tags(trim($_POST['Calorie']));
            $Protine=strip_tags(trim($_POST['Protine']));
            $Graisse = strip_tags(trim($_POST['Graisse']));
            $Energie=strip_tags(trim($_POST['Energie']));
            $Valide = "0";
            if(!empty($_FILES["image"]["name"])) { 
                // Get file info 
                $fileName = basename($_FILES["image"]["name"]); 
                $fileType = pathinfo($fileName, PATHINFO_EXTENSION); 

                // Allow certain file formats 
                $allowTypes = array('jpg','png','jpeg','gif'); 
                if(in_array($fileType, $allowTypes)){ 
                    $image = $_FILES['image']['tmp_name']; 
                    $imgContent = addslashes(file_get_contents($image)); 
                }
            }
            $video=strip_tags(trim($_POST['video']));
            //*
            $recing = json_decode($_POST['recingreArray'],true);
            $model=new userModel();
            $res = $model->insertRecette($Id_Saison,$Titre,$Description,$etapes,$Healthy,$Categorie,$Fete,$Difficulte,$Temps_prepa,$Temps_repos,
                $Temps_cuiss,$Calorie,$Protine,$Graisse,$Energie,$Valide,$fileName,$video,$recing);
            unset($_POST); 
            header("location:"."/web/User/profil");
            return $res;
        }
        return false;
        
    }
    public function insertRecing($Id_recette){
        if(isset($_POST['recIng'])){
            $id_ingredients = strip_tags(trim($_POST['ingredient']));
            $quantité=strip_tags(trim($_POST['quantité']));
            $model=new userModel();
            $res = $model->insertRecing($Id_recette,$id_ingredients,$quantité);
            unset($_POST); 
            header("Refresh:0");
            return $res;
        }
        return false;
    }
    public function insertContact(){
        if(isset($_POST['contact'])){
            $Id_user = strip_tags(trim($_POST['username']));
            $message=strip_tags(trim($_POST['text']));
            $model=new userModel();
            $res = $model->insertContact($Id_user,$message);
            unset($_POST); 
            return $res;
        }
        return false;
    }
}
?>