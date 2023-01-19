<?php
require_once($_SERVER['DOCUMENT_ROOT'].'./WEB/Admin/Models/adminModel.php');
require_once($_SERVER['DOCUMENT_ROOT'].'./WEB/Admin/Views/gestionRecette.php');
require_once($_SERVER['DOCUMENT_ROOT'].'./WEB/Admin/Views/gestionNews.php');
require_once($_SERVER['DOCUMENT_ROOT'].'./WEB/Admin/Views/gestionUser.php');
require_once($_SERVER['DOCUMENT_ROOT'].'./WEB/Admin/Views/gestionNutrition.php');
require_once($_SERVER['DOCUMENT_ROOT'].'./WEB/Admin/Views/gestionContact.php');
require_once($_SERVER['DOCUMENT_ROOT'].'./WEB/Admin/Views/login.php');
require_once($_SERVER['DOCUMENT_ROOT'].'./WEB/Admin/Views/parametres.php');
class adminController
{
    public function Login()
    {
        if (isset($_POST["login"])) {
            $username = strip_tags(trim($_POST['username']));
            $password = strip_tags(trim($_POST['password']));
            $model = new adminModel();
            $res = $model->Login($username, $password);
            session_start();
            unset($_POST);
            if ($res > 0) {
                $_SESSION["username"] = $username;
                header("location:" . "/web/Admin/recette");
            }
            return $res;
        }
    }

    public function getRecette()
    {
        $model = new adminModel();
        $res = $model->getRecette();
        return $res;
    }
    public function getNews()
    {
        $model = new adminModel();
        $res = $model->getNews();
        return $res;
    }
    public function getUser()
    {
        $model = new adminModel();
        $res = $model->getUser();
        return $res;
    }
    public function getNutrition()
    {
        $model = new adminModel();
        $res = $model->getNutrition();
        return $res;
    }
    public function getContact()
    {
        $model = new adminModel();
        $res = $model->getContact();
        return $res;
    }
    public function insertRecette()
    {
        if (isset($_POST['sauvR'])) {
            $Id_Saison = strip_tags(trim($_POST['saison']));
            $Titre = strip_tags(trim($_POST['titre']));
            $Description = strip_tags(trim($_POST['Description']));
            $etape = strip_tags(trim($_POST['etape']));
            $Healthy = strip_tags(trim($_POST['healthy']));
            $Categorie = strip_tags(trim($_POST['Catégorie']));
            $Fete = strip_tags(trim($_POST['Fete']));
            $Difficulte = strip_tags(trim($_POST['Difficulté']));
            $Temps_prepa = strip_tags(trim($_POST['Tempsdepréparation']));
            $Temps_repos = "00:00:00";
            $Temps_cuiss = strip_tags(trim($_POST['Tempsdecuisson']));
            $Calorie = strip_tags(trim($_POST['Calorie']));
            $Protine = strip_tags(trim($_POST['Protine']));
            $Graisse = strip_tags(trim($_POST['Graisse']));
            $Energie = strip_tags(trim($_POST['Energie']));
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
            $video = strip_tags(trim($_POST["video"]));
            ;
            //
            $recing = json_decode($_POST['recingreArray'], true);
            $model = new adminModel();
            $res = $model->insertRecette(
                $Id_Saison,
                $Titre,
                $Description,
                $etape,
                $Healthy,
                $Categorie,
                $Fete,
                $Difficulte,
                $Temps_prepa,
                $Temps_repos,
                $Temps_cuiss,
                $Calorie,
                $Protine,
                $Graisse,
                $Energie,
                $Valide,
                $fileName,
                $video,
                $recing
            );
            unset($_POST);
            header("Refresh:0");
            return $res;
        }
        return false;

    }
    public function insertUser()
    {
        if (isset($_POST['sauvU'])) {
            $nom = strip_tags(trim($_POST['nom']));
            $prenom = strip_tags(trim($_POST['prenom']));
            $adresse = strip_tags(trim($_POST['adresse']));
            $sexe = strip_tags(trim($_POST['sexe']));
            $Date = strip_tags(trim($_POST['date']));
            $Numero = intval(strip_tags(trim($_POST['tel'])));
            $Username = strip_tags(trim($_POST['username']));
            $password = strip_tags(trim($_POST['password']));
            $Valide = strip_tags(trim($_POST['valide']));
            $model = new adminModel();
            $res = $model->insertUser($nom, $prenom, $adresse, $sexe, $Date, $Numero, $Username, $password, $Valide);
            unset($_POST);
            header("Refresh:0");
            return $res;
        }
        return false;
    }
    public function insertNews()
    {
        if (isset($_POST['sauvN'])) {
            $Titre = strip_tags(trim($_POST['titre']));
            $Description = strip_tags(trim($_POST['Description']));
            $Date = strip_tags(trim($_POST['date']));
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
            $model = new adminModel();
            $res = $model->insertNews($Titre, $Description, $Date, $fileName);
            unset($_POST);
            header("Refresh:0");
            return $res;
        }
        return false;
    }
    public function insertIngredient()
    {
        if (isset($_POST['sauvI'])) {
            $nom = strip_tags(trim($_POST['titre']));
            $Calorie = strip_tags(trim($_POST['Calorie']));
            $Protine = strip_tags(trim($_POST['Protine']));
            $Graisse = strip_tags(trim($_POST['Graisse']));
            $Energie = strip_tags(trim($_POST['Energie']));
            $Healthy = strip_tags(trim($_POST['healthy']));
            $Id_saison = strip_tags(trim($_POST['saison']));
            $proportion = intval(strip_tags(trim($_POST['porportion'])));
            $valide = strip_tags(trim($_POST['valide']));
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
            $model = new adminModel();
            $res = $model->insertIngredient($nom, $Calorie, $Protine, $Graisse, $Energie, $Healthy, $Id_saison, $proportion, $valide, $fileName);
            unset($_POST);
            header("Refresh:0");
            return $res;
        }
        return false;
    }
    public function validerRecette()
    {
        if (isset($_POST['valider'])) {
            $id = $_POST['id'];
            $model = new adminModel();
            $model->validerRecette($id);
            unset($_POST);
            header("Refresh:0");
        }
    }
    public function validerUser()
    {
        if (isset($_POST['validerU'])) {
            $id = $_POST['id'];
            $model = new adminModel();
            $res = $model->validerUser($id);
            unset($_POST);
            header("Refresh:0");
            return $res;
        }
    }
    public function devaliderUser()
    {
        if (isset($_POST['devaliderU'])) {
            $id = $_POST['id'];
            $model = new adminModel();
            $res = $model->devaliderUser($id);
            unset($_POST);
            header("Refresh:0");
            return $res;
        }
    }
    public function validerNutrition()
    {
        if (isset($_POST['validerI'])) {
            $id = $_POST['id'];
            $model = new adminModel();
            $model->validerNutrition($id);
            unset($_POST);
            header("Refresh:0");
        }
    }
    public function deleteRecette()
    {
        if (isset($_POST['supprimer'])) {
            $id = $_POST['id'];
            $model = new adminModel();
            $model->deleteRecette($id);
            unset($_POST);
            header("location:" . "/web/Admin/recette");
        }
    }
    public function deleteNews()
    {
        if (isset($_POST['supprimerN'])) {
            $id = $_POST['id'];
            $model = new adminModel();
            $model->deleteNews($id);
            unset($_POST);
            header("Refresh: 0;url=/web/Admin/news");
            exit();
        }

    }
    public function deleteUser()
    {
        if (isset($_POST['supprimerU'])) {
            $id = $_POST['id'];
            $model = new adminModel();
            $model->deleteUser($id);
            unset($_POST);
            header("location:" . "/web/Admin/user");
            exit();
        }

    }
    public function deleteNutrition()
    {
        if (isset($_POST['supprimerI'])) {
            $id = $_POST['id'];
            $model = new adminModel();
            $model->deleteNutrition($id);
            unset($_POST);
            header("location:" . "/web/Admin/nutrition");
        }

    }
    public function editNews()
    {
        if (isset($_POST['modifN'])) {
            $Id_News = strip_tags(trim($_POST['identifiant']));
            $Titre = strip_tags(trim($_POST['titre']));
            $Description = strip_tags(trim($_POST['Description']));
            $Date = strip_tags(trim($_POST['date']));
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
            $model = new adminModel();
            $model->editNews($Id_News, $Titre, $Description, $Date);
            unset($_POST);
            header("Refresh:0");
        }

    }
    public function editIngredient()
    {
        if (isset($_POST['modifI'])) {
            $id = strip_tags(trim($_POST['id']));
            $nom = strip_tags(trim($_POST['titre']));
            $Calorie = strip_tags(trim($_POST['Calorie']));
            $Protine = strip_tags(trim($_POST['Protine']));
            $Graisse = strip_tags(trim($_POST['Graisse']));
            $Energie = strip_tags(trim($_POST['Energie']));
            $Healthy = strip_tags(trim($_POST['healthy']));
            $Id_saison = strip_tags(trim($_POST['saison']));
            $proportion = intval(strip_tags(trim($_POST['proportion'])));
            $valide = strip_tags(trim($_POST['valide']));
            $model = new adminModel();
            $model->editIngredient($id, $nom, $Calorie, $Protine, $Graisse, $Energie, $Healthy, $Id_saison, $proportion, $valide);
            unset($_POST);
        }
    }
    public function editRecette()
    {
        if (isset($_POST['modifR'])) {
            $Id_recette = strip_tags(trim($_POST['identifiant']));
            ;
            $Id_Saison = strip_tags(trim($_POST['saison']));
            $Titre = strip_tags(trim($_POST['titre']));
            $Description = strip_tags(trim($_POST['Description']));
            $Healthy = strip_tags(trim($_POST['healthy']));
            $Categorie = strip_tags(trim($_POST['Catégorie']));
            $Fete = strip_tags(trim($_POST['Fete']));
            $Difficulte = strip_tags(trim($_POST['Difficulté']));
            $Temps_prepa = strip_tags(trim($_POST['Temps_de_préparation']));
            $Temps_repos = "00:00:00";
            $Temps_cuiss = strip_tags(trim($_POST['Temps_de_cuisson']));
            $Calorie = strip_tags(trim($_POST['Calorie']));
            $Protine = strip_tags(trim($_POST['Protine']));
            $Graisse = strip_tags(trim($_POST['Graisse']));
            $Energie = strip_tags(trim($_POST['Energie']));
            $Id_user = strip_tags(trim($_POST['id_user']));
            $video = strip_tags(trim($_POST["video"]));
            $model = new adminModel();
            $model->editRecette(
                $Id_recette,
                $Id_Saison,
                $Id_user,
                $Titre,
                $Description,
                $Healthy,
                $Categorie,
                $Fete,
                $Difficulte,
                $Temps_prepa,
                $Temps_repos,
                $Temps_cuiss,
                $Calorie,
                $Protine,
                $Graisse,
                $Energie,
                $video,
            );
            unset($_POST);
            return header("location:" . "/web/Admin/recette");
        }

    }
    public function insertAffich0()
    {
        if (isset($_POST['supprim'])) {
            $Id_recette = strip_tags(trim($_POST['id']));
            $model = new adminModel();
            $model->insertAffich0($Id_recette);
            unset($_POST);
            return header("Refresh:0");
        }
    }
    public function insertAffich1()
    {
        if (isset($_POST['affi'])) {
            $Id_recette = strip_tags(trim($_POST['id']));
            $model = new adminModel();
            $model->insertAffich1($Id_recette);
            unset($_POST);
            return header("Refresh:0");
        }
    }

    public function getNewsID($Id_news)
    {
        $model = new adminModel();
        $res = $model->getNewsID($Id_news);
        return $res;
    }
    public function getRecetteID($Id_recette)
    {
        $model = new adminModel();
        $res = $model->getRecetteID($Id_recette);
        return $res;
    }
    public function getUserID($Id_user)
    {
        $model = new adminModel();
        $res = $model->getUserID($Id_user);
        return $res;
    }
    public function getNutritionID($Id_Ingredient)
    {
        $model = new adminModel();
        $res = $model->getNutritionID($Id_Ingredient);
        return $res;
    }
}
?>