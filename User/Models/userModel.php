<?php
class userModel
{
    private $dbname = "TDW";
    private $host = "localhost";
    private $user = "root";
    private $password = "";
    private function connectDB($dbname, $host, $user, $password)
    {
        try {
            $db = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $user, $password);
        } catch (PDOException $th) {
            printf("erreur de connexion à la base de donnée", $th->getMessage());
            exit();
        }
        return $db;
    }
    private function disconnect(&$db)
    {
        $db = null;
    }
    private function request($db, $r)
    {
        return $db->query($r);
    }
    public function getNutrition(){
        $db=$this->connectDB($this->dbname,$this->host,$this->user,$this->password);
        $query="SELECT * FROM ingredient";
        $res=$this->request($db,$query);
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
    public function getNutritionIDRecette($Id_recette){
        $db=$this->connectDB($this->dbname,$this->host,$this->user,$this->password);
        $query="SELECT *
        FROM ingredient N
          LEFT JOIN recingre r ON N.Id_Ingredient = r.Id_ingredient 
        WHERE r.Id_recette  = ?";
        $res=$db->prepare($query);
        $res->execute(array($Id_recette));
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
    public function getRecetteTP(){
        $db=$this->connectDB($this->dbname,$this->host,$this->user,$this->password);
        $query="SELECT * FROM recette WHERE valide = 1 ORDER BY Temps_prepa";
        $res=$this->request($db,$query);
        $this->disconnect($db);
        return $res;
    }
    public function getRecetteTC(){
        $db=$this->connectDB($this->dbname,$this->host,$this->user,$this->password);
        $query="SELECT * FROM recette WHERE valide = 1 ORDER BY Temps_cuiss";
        $res=$this->request($db,$query);
        $this->disconnect($db);
        return $res;
    }
    public function getRecetteTT(){
        $db=$this->connectDB($this->dbname,$this->host,$this->user,$this->password);
        $query="SELECT * FROM recette WHERE valide = 1 ORDER BY Temps_prepa + Temps_cuiss";
        $res=$this->request($db,$query);
        $this->disconnect($db);
        return $res;
    }
    public function getRecetteCalorie(){
        $db=$this->connectDB($this->dbname,$this->host,$this->user,$this->password);
        $query="SELECT * FROM recette WHERE valide = 1 ORDER BY Calorie desc";
        $res=$this->request($db,$query);
        $this->disconnect($db);
        return $res;
    }
    public function getRecette(){
        $db=$this->connectDB($this->dbname,$this->host,$this->user,$this->password);
        $query="SELECT * FROM recette WHERE valide = 1";
        $res=$this->request($db,$query);
        $this->disconnect($db);
        return $res;
    }
    public function getRecetteBoissons(){
        $db=$this->connectDB($this->dbname,$this->host,$this->user,$this->password);
        $query="SELECT * FROM recette WHERE Categorie = 'Boissons' AND valide = 1";
        $res=$this->request($db,$query);
        $this->disconnect($db);
        return $res;
    }
    public function getRecettePlats(){
        $db=$this->connectDB($this->dbname,$this->host,$this->user,$this->password);
        $query="SELECT * FROM recette WHERE Categorie = 'Plats' AND valide = 1";
        $res=$this->request($db,$query);
        $this->disconnect($db);
        return $res;
    }
    public function getRecetteDesserts(){
        $db=$this->connectDB($this->dbname,$this->host,$this->user,$this->password);
        $query="SELECT * FROM recette WHERE Categorie = 'Desserts' AND valide = 1";
        $res=$this->request($db,$query);
        $this->disconnect($db);
        return $res;
    }
    public function getRecetteEntrées(){
        $db=$this->connectDB($this->dbname,$this->host,$this->user,$this->password);
        $query="SELECT * FROM recette WHERE Categorie = 'Entrées' AND valide = 1";
        $res=$this->request($db,$query);
        $this->disconnect($db);
        return $res;
    }
    public function getHealthy(){
        $db=$this->connectDB($this->dbname,$this->host,$this->user,$this->password);
        $query="SELECT * FROM recette WHERE Healthy = 1 AND valide = 1";
        $res=$this->request($db,$query);
        $this->disconnect($db);
        return $res;
    }
    public function getHiver(){
        $db=$this->connectDB($this->dbname,$this->host,$this->user,$this->password);
        $query="SELECT * FROM recette WHERE Id_Saison = 2 AND valide = 1";
        $res=$this->request($db,$query);
        $this->disconnect($db);
        return $res;
    }
    public function getEte(){
        $db=$this->connectDB($this->dbname,$this->host,$this->user,$this->password);
        $query="SELECT * FROM recette WHERE Id_Saison = 3 AND valide = 1";
        $res=$this->request($db,$query);
        $this->disconnect($db);
        return $res;
    }
    public function getPrintemps(){
        $db=$this->connectDB($this->dbname,$this->host,$this->user,$this->password);
        $query="SELECT * FROM recette WHERE Id_Saison = 4 AND valide = 1";
        $res=$this->request($db,$query);
        $this->disconnect($db);
        return $res;
    }
    public function getAutomne(){
        $db=$this->connectDB($this->dbname,$this->host,$this->user,$this->password);
        $query="SELECT * FROM recette WHERE Id_Saison = 1 AND valide = 1";
        $res=$this->request($db,$query);
        $this->disconnect($db);
        return $res;
    }
    public function getMariage(){
        $db=$this->connectDB($this->dbname,$this->host,$this->user,$this->password);
        $query="SELECT * FROM recette WHERE Fete = 'Mariage' AND valide = 1";
        $res=$this->request($db,$query);
        $this->disconnect($db);
        return $res;
    }
    public function getAnniv(){
        $db=$this->connectDB($this->dbname,$this->host,$this->user,$this->password);
        $query="SELECT * FROM recette WHERE Fete = 'Anniversaire' AND valide = 1";
        $res=$this->request($db,$query);
        $this->disconnect($db);
        return $res;
    }
    public function getAid(){
        $db=$this->connectDB($this->dbname,$this->host,$this->user,$this->password);
        $query="SELECT * FROM recette WHERE Fete = 'Aid' AND valide = 1";
        $res=$this->request($db,$query);
        $this->disconnect($db);
        return $res;
    }
    public function getAchoura(){
        $db=$this->connectDB($this->dbname,$this->host,$this->user,$this->password);
        $query="SELECT * FROM recette WHERE Fete = 'Achoura' AND valide = 1";
        $res=$this->request($db,$query);
        $this->disconnect($db);
        return $res;
    }
    public function getAutres(){
        $db=$this->connectDB($this->dbname,$this->host,$this->user,$this->password);
        $query="SELECT * FROM recette WHERE Fete = 'Autres' AND valide = 1";
        $res=$this->request($db,$query);
        $this->disconnect($db);
        return $res;
    }
    public function getImage($id){
        $db=$this->connectDB($this->dbname,$this->host,$this->user,$this->password);
        $query="SELECT bin FROM image WHERE id_recette = $id limit 1";
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

    public function Login($username, $password)
    {
        $db = $this->connectDB($this->dbname, $this->host, $this->user, $this->password);
        $query = "SELECT * FROM user WHERE ( Username=? OR Adresse = ? ) AND Password=? AND valide =1";
        $res = $db->prepare($query);
        $res->execute(array($username,$username, $password));
        $count = $res->fetch(PDO::FETCH_ASSOC);
        $this->disconnect($db);
        return $count;
    }
    public function signUP($nom,$prenom,$adresse,$sexe,$Date,$Numero,$Username,$password,$Valide){
        $db=$this->connectDB($this->dbname,$this->host,$this->user,$this->password);
        $query="INSERT INTO `user`(`Nom`, `Prenom`, `Adresse`, `Sexe`, `Date_naissance`, `Numero_Tel`, `Username`, `Password`, `valide`) 
        VALUES (?,?,?,?,?,?,?,?,?)";
        $res=$db->prepare($query);
        $res->execute(array($nom,$prenom,$adresse,$sexe,$Date,$Numero,$Username,$password,$Valide));
        $this->disconnect($db);
        return $res;
    }
    public function addFavoris($Id_user,$Id_recette){
        $db=$this->connectDB($this->dbname,$this->host,$this->user,$this->password);
        $query="INSERT INTO `favoris`(`Id_user`, `Id_recette`) 
        VALUES (?,?)";
        $res=$db->prepare($query);
        $res->execute(array($Id_user,$Id_recette));
        $this->disconnect($db);
        return $res;
    }
    public function deleteFavoris($Id_user,$Id_recette){
        $db=$this->connectDB($this->dbname,$this->host,$this->user,$this->password);
        $query="DELETE FROM `favoris` WHERE Id_user = ? AND Id_recette = ?";
        $res=$db->prepare($query);
        $res->execute(array($Id_user,$Id_recette));
        $this->disconnect($db);
        return $res;
    }
    public function getFavoris($Id_user){
        $db=$this->connectDB($this->dbname,$this->host,$this->user,$this->password);
        $query="SELECT *
        FROM recette R
          LEFT JOIN favoris f ON R.Id_Recette = f.Id_recette 
        WHERE f.Id_user = ?";
        $res=$db->prepare($query);
        $res->execute(array($Id_user));
        $this->disconnect($db);
        return $res;
    }
    public function getRecetteFavoris($Id_user,$Id_recette){
        $db=$this->connectDB($this->dbname,$this->host,$this->user,$this->password);
        $query="SELECT * FROM favoris WHERE Id_user = ? AND Id_recette = ? ";
        $res=$db->prepare($query);
        $res->execute(array($Id_user,$Id_recette));
        $this->disconnect($db);
        return $res;
    }
    public function addNote($Id_user,$Id_recette,$note){
        $db=$this->connectDB($this->dbname,$this->host,$this->user,$this->password);
        $query="INSERT INTO `favoris`(`Id_user`,`Id_recette`,note) 
        VALUES (?,?,?)";
        $res=$db->prepare($query);
        $res->execute(array($Id_user,$Id_recette,$note));
        $this->disconnect($db);
        return $res;
    }
    public function getRecettenote($Id_recette){
        $db=$this->connectDB($this->dbname,$this->host,$this->user,$this->password);
        $query="SELECT AVG(note) FROM favoris WHERE Id_recette = ? ";
        $res=$db->prepare($query);
        $res->execute(array($Id_recette));
        $this->disconnect($db);
        return $res;
    }
    public function insertRecette($Id_Saison,$Titre,$Description,$etapes,$Healthy,$Categorie,$Fete, 
    $Difficulte,$Temps_prepa,$Temps_repos,$Temps_cuiss,$Calorie,$Protine,$Graisse,$Energie,$Valide,$imgContent,$video,$recing){
        $db=$this->connectDB($this->dbname,$this->host,$this->user,$this->password);
        $query="INSERT INTO `recette`(`Id_Saison`, `Id_User`, `Titre`, `Description`, `etapes` ,`Healthy`, `Categorie`, `Fete`, 
        `Difficulte`, `Temps_prepa`, `Temps_repos`, `Temps_cuiss`, `Calorie`, `Protine`, `Graisse`, `Energie`, `Valide` ,`image`,`video`) 
        VALUES(?,1,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
        $res=$db->prepare($query);
        $res->execute(array($Id_Saison,$Titre,$Description,$etapes,$Healthy,$Categorie,$Fete,$Difficulte,$Temps_prepa,
        $Temps_repos,$Temps_cuiss,$Calorie,$Protine,$Graisse,$Energie,$Valide,$imgContent,$video));
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
    public function insertRecing($Id_recette,$id_ingredients,$quantité){
        $db=$this->connectDB($this->dbname,$this->host,$this->user,$this->password);
        $query="INSERT INTO `recingre`(Id_Recette, Id_Ingredient,Quantité)
        VALUES (?,?,?)";
        $res=$db->prepare($query);
        $res->execute(array($Id_recette,$id_ingredients,$quantité));
        $this->disconnect($db);
        return $res;
    }
    public function insertContact($Id_user,$message){
        $db=$this->connectDB($this->dbname,$this->host,$this->user,$this->password);
        $query="INSERT INTO `contact`(username, message)
        VALUES (?,?)";
        $res=$db->prepare($query);
        $res->execute(array($Id_user,$message));
        $this->disconnect($db);
        return $res;
    }
    public function getRecetteAffich(){
        $db=$this->connectDB($this->dbname,$this->host,$this->user,$this->password);
        $query="SELECT * FROM recette WHERE display = 1 AND valide = 1";
        $res=$this->request($db,$query);
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