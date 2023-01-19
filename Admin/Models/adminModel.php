<?php
class adminModel{
    private $dbname="TDW";
    private $host="localhost";
    private $user="root";
    private $password="";
    private function connectDB($dbname,$host,$user,$password){
        try {
            $db= new PDO("mysql:host=$host;dbname=$dbname;charset=utf8",$user,$password);
        } catch (PDOException $th) {
            printf("erreur de connexion à la base de donnée",$th->getMessage());
            exit();
        }
        return $db;
    }
    private function disconnect(&$db){
        $db=null;
    }
    private function request($db,$r){
        return $db->query($r);
    }
    public function Login($username,$password){
        $db=$this->connectDB($this->dbname,$this->host,$this->user,$this->password);
        $query="SELECT * FROM admin WHERE Username=? AND Password=?";
        $res=$db->prepare($query);
        $res->execute(array($username,$password));
        $count=$res->fetch(PDO::FETCH_OBJ);
        $this->disconnect($db);
        return $count;
    }
    public function getRecette(){
        $db=$this->connectDB($this->dbname,$this->host,$this->user,$this->password);
        $query="SELECT * FROM recette";
        $res=$this->request($db,$query);
        $this->disconnect($db);
        return $res;
    }
    public function getNews(){
        $db=$this->connectDB($this->dbname,$this->host,$this->user,$this->password);
        $query="SELECT * FROM news";
        $res=$this->request($db,$query);
        $this->disconnect($db);
        return $res;
    }
    public function getUser(){
        $db=$this->connectDB($this->dbname,$this->host,$this->user,$this->password);
        $query="SELECT * FROM user";
        $res=$this->request($db,$query);
        $this->disconnect($db);
        return $res;
    }
    public function getNutrition(){
        $db=$this->connectDB($this->dbname,$this->host,$this->user,$this->password);
        $query="SELECT * FROM ingredient";
        $res=$this->request($db,$query);
        $this->disconnect($db);
        return $res;
    }

    public function getContact(){
        $db=$this->connectDB($this->dbname,$this->host,$this->user,$this->password);
        $query="SELECT * FROM contact";
        $res=$this->request($db,$query);
        $this->disconnect($db);
        return $res;
    }
    public function validerRecette($id){
        $db=$this->connectDB($this->dbname,$this->host,$this->user,$this->password);
        $query="UPDATE recette SET Valide=1 WHERE Id_Recette=?";
        $res=$db->prepare($query);
        $res->execute(array($id));
        $this->disconnect($db);
        return $res;
    }
    public function validerUser($id){
        $db=$this->connectDB($this->dbname,$this->host,$this->user,$this->password);
        $query="UPDATE user SET valide=1 WHERE Id_User=?";
        $res=$db->prepare($query);
        $res->execute(array($id));
        $this->disconnect($db);
        return $res;
    }
    public function devaliderUser($id){
        $db=$this->connectDB($this->dbname,$this->host,$this->user,$this->password);
        $query="UPDATE user SET valide=0 WHERE Id_User=?";
        $res=$db->prepare($query);
        $res->execute(array($id));
        $this->disconnect($db);
        return $res;
    }
    public function validerNutrition($id){
        $db=$this->connectDB($this->dbname,$this->host,$this->user,$this->password);
        $query="UPDATE ingredient SET valide=1 WHERE Id_Ingredient=?";
        $res=$db->prepare($query);
        $res->execute(array($id));
        $this->disconnect($db);
        return $res;
    }
    public function insertRecette($Id_Saison,$Titre,$Description,$etape,$Healthy,$Categorie,$Fete, 
    $Difficulte,$Temps_prepa,$Temps_repos,$Temps_cuiss,$Calorie,$Protine,$Graisse,$Energie,$Valide,$imgContent,$video,$recing){
        $db=$this->connectDB($this->dbname,$this->host,$this->user,$this->password);
        $query="INSERT INTO `recette`(`Id_Saison`, `Id_User`, `Titre`, `Description`,`etapes`, `Healthy`, `Categorie`, `Fete`, 
        `Difficulte`, `Temps_prepa`, `Temps_repos`, `Temps_cuiss`, `Calorie`, `Protine`, `Graisse`, `Energie`, `Valide` ,`image` ,`video`) 
        VALUES(?,0,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
        $res=$db->prepare($query);
        $res->execute(array($Id_Saison,$Titre,$Description,$etape,$Healthy,$Categorie,$Fete,$Difficulte,$Temps_prepa,$Temps_repos,
        $Temps_cuiss,$Calorie,$Protine,$Graisse,$Energie,$Valide,$imgContent,$video));
        $Id_recette = $db->lastInsertId();
        foreach($recing as $rec){
            $query2="INSERT INTO `recingre`(Id_Recette, Id_Ingredient,Quantité) VALUES (?,?,?)";
            $res=$db->prepare($query2);
            $res->execute(array($Id_recette,$rec["id"],$rec["quant"]));
        }
        $this->uploadImage('image','/Outils/images/');
        $this->disconnect($db);
        return $res;
    }
    public function insertUser($nom,$prenom,$adresse,$sexe,$Date,$Numero,$Username,$password,$Valide){
        $db=$this->connectDB($this->dbname,$this->host,$this->user,$this->password);
        $query="INSERT INTO `user`(`Nom`, `Prenom`, `Adresse`, `Sexe`, `Date_naissance`, `Numero_Tel`, `Username`, `Password`, `valide`) 
        VALUES (?,?,?,?,?,?,?,?,?)";
        $res=$db->prepare($query);
        $res->execute(array($nom,$prenom,$adresse,$sexe,$Date,$Numero,$Username,$password,$Valide));
        $this->disconnect($db);
        return $res;
    }
    public function insertIngredient($nom,$Calorie,$Protine,$Graisse,$Energie,$Healthy,$Id_saison,$proportion,$valide,$imgContent){
        $db=$this->connectDB($this->dbname,$this->host,$this->user,$this->password);
        $query="INSERT INTO `ingredient`(`Nom`, `Calorie`, `Protine`, `Graisse`, `Energie`, `Healthy`, `Id_saison`, `proportion`, `valide`, `image`)
        VALUES (?,?,?,?,?,?,?,?,?,?)";
        $res=$db->prepare($query);
        $res->execute(array($nom,$Calorie,$Protine,$Graisse,$Energie,$Healthy,$Id_saison,$proportion,$valide,$imgContent));
        $this->uploadImage('image','/Outils/images/');
        $this->disconnect($db);
        return $res;
    }
    public function insertNews($Titre,$Description,$Date,$imgContent){
        $db=$this->connectDB($this->dbname,$this->host,$this->user,$this->password);
        $query="INSERT INTO news (Titre, Description, Date , image)
        VALUES (?,?,?,?)";
        $res=$db->prepare($query);
        $res->execute(array($Titre,$Description,$Date,$imgContent));
        $this->uploadImage('image','/Outils/images/');
        $this->disconnect($db);
        return $res;
    }

    public function deleteRecette($id){
        $db=$this->connectDB($this->dbname,$this->host,$this->user,$this->password);
        $query="DELETE FROM recette WHERE Id_recette=?";
        $res=$db->prepare($query);
        $res->execute(array($id));
        $this->disconnect($db);
        return $res;
    }
    public function deleteUser($id){
        $db=$this->connectDB($this->dbname,$this->host,$this->user,$this->password);
        $query="DELETE FROM user WHERE Id_user=?";
        $res=$db->prepare($query);
        $res->execute(array($id));
        $this->disconnect($db);
        return $res;
    }
    public function deleteNews($id){
        $db=$this->connectDB($this->dbname,$this->host,$this->user,$this->password);
        $query="DELETE FROM news WHERE Id_News=?";
        $res=$db->prepare($query);
        $res->execute(array($id));
        $this->disconnect($db);
        return $res;
    }
    public function deleteNutrition($id){
        $db=$this->connectDB($this->dbname,$this->host,$this->user,$this->password);
        $query="DELETE FROM ingredient WHERE Id_Ingredient=?";
        $res=$db->prepare($query);
        $res->execute(array($id));
        $this->disconnect($db);
        return $res;
    }



    public function editRecette($Id_recette,$Id_Saison,$Id_user,$Titre,$Description,$Healthy,$Categorie,$Fete, 
    $Difficulte,$Temps_prepa,$Temps_repos,$Temps_cuiss,$Calorie,$Protine,$Graisse,$Energie,$video){
        $db=$this->connectDB($this->dbname,$this->host,$this->user,$this->password);
        $query="UPDATE `recette` SET `Id_Saison`= ?,`Id_User`=?,
        `Titre`=?,`Description`= ?,`Healthy`=?,`Categorie`=?,`Fete`=?,
        `Difficulte`= ?,`Temps_prepa`=?,`Temps_repos`=?,`Temps_cuiss`=?,`Calorie`=?,
        `Protine`=?,`Graisse`=?,`Energie`=?, `video`=? WHERE  Id_Recette=?";
        $res=$db->prepare($query);
        $res->execute(array($Id_Saison,$Id_user,$Titre,$Description,$Healthy,$Categorie,$Fete, 
        $Difficulte,$Temps_prepa,$Temps_repos,$Temps_cuiss,$Calorie,$Protine,$Graisse,$Energie,$video,$Id_recette));
        $this->disconnect($db);
        return $res;
    }
    public function editNews($Id_News,$Titre,$Description,$Date){
        $db=$this->connectDB($this->dbname,$this->host,$this->user,$this->password);
        $query="UPDATE news SET Titre =?, Description=? , Date=? WHERE Id_News=?";
        $res=$db->prepare($query);
        $res->execute(array($Titre,$Description,$Date,$Id_News));
        $this->disconnect($db);
        return $res;
    }
    public function editIngredient($id,$nom,$Calorie,$Protine,$Graisse,$Energie,$Healthy,$Id_saison,$proportion,$valide){
        $db=$this->connectDB($this->dbname,$this->host,$this->user,$this->password);
        $query="UPDATE `ingredient` SET Nom=?,Calorie=?,Protine=?,Graisse=?,Energie=?,Healthy=?,Id_saison=?,proportion=?,valide=?
        WHERE Id_Ingredient=?";
        $res=$db->prepare($query);
        $res->execute(array($nom,$Calorie,$Protine,$Graisse,$Energie,$Healthy,$Id_saison,$proportion,$valide,$id));
        $this->disconnect($db);
        return $res;
    }

    public function getNewsID($Id_news){
        $db=$this->connectDB($this->dbname,$this->host,$this->user,$this->password);
        $query="SELECT * FROM news WHERE Id_news = ?";
        $res=$db->prepare($query);
        $res->execute(array($Id_news));
        $this->disconnect($db);
        return $res;
    }
    public function getUserID($Id_user){
        $db=$this->connectDB($this->dbname,$this->host,$this->user,$this->password);
        $query="SELECT * FROM user WHERE Id_User = ?";
        $res=$db->prepare($query);
        $res->execute(array($Id_user));
        $this->disconnect($db);
        return $res;
    }
    public function getRecetteID($Id_recette){
        $db=$this->connectDB($this->dbname,$this->host,$this->user,$this->password);
        $query="SELECT * FROM recette WHERE Id_Recette = ?";
        $res=$db->prepare($query);
        $res->execute(array($Id_recette));
        $this->disconnect($db);
        return $res;
    }
    public function getNutritionID($Id_Ingredient){
        $db=$this->connectDB($this->dbname,$this->host,$this->user,$this->password);
        $query="SELECT * FROM ingredient WHERE Id_Ingredient = ?";
        $res=$db->prepare($query);
        $res->execute(array($Id_Ingredient));
        $this->disconnect($db);
        return $res;
    }
    public function insertAffich1($Id_recette){
        $db=$this->connectDB($this->dbname,$this->host,$this->user,$this->password);
        $query="UPDATE `recette` SET `display`=1 WHERE  Id_Recette=?";
        $res=$db->prepare($query);
        $res->execute(array($Id_recette));
        $this->disconnect($db);
        return $res;
    }
    public function insertAffich0($Id_recette){
        $db=$this->connectDB($this->dbname,$this->host,$this->user,$this->password);
        $query="UPDATE `recette` SET `display`=0 WHERE  Id_Recette=?";
        $res=$db->prepare($query);
        $res->execute(array($Id_recette));
        $this->disconnect($db);
        return $res;
    }

    public function uploadImage($image, $dir)
    {
        $target_dir =  $_SERVER['DOCUMENT_ROOT'].'/WEB'.$dir;
        $target_file = $target_dir . basename($_FILES[$image]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
        if (isset($_POST["submit"])) {
            $check = getimagesize($_FILES[$image]["tmp_name"]);
            if ($check !== false) {
                echo "File is an image - " . $check["mime"] . ".";
                $uploadOk = 1;
            } else {
                echo "File is not an image.";
                $uploadOk = 0;
            }
        }
        if (file_exists($target_file)) {
            echo "Sorry, file already exists.";
            $uploadOk = 0;
        }
        if (
            $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
            && $imageFileType != "gif"
        ) {
            echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            $uploadOk = 0;
        }
        if ($uploadOk == 0) {
            echo "Sorry, your file was not uploaded.";
        } else {
            if (move_uploaded_file($_FILES[$image]["tmp_name"], $target_file)) {
                echo "The file " . htmlspecialchars(basename($_FILES[$image]["name"])) . " has been uploaded.";
            } else {
                echo "Sorry, there was an error uploading your file.";
            }
        }
    }
    
}

?>