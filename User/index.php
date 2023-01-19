<?php
require_once($_SERVER['DOCUMENT_ROOT'].'./WEB/User/Views/home.php');
require_once($_SERVER['DOCUMENT_ROOT'].'./WEB/User/Views/ideeRecette.php');
require_once($_SERVER['DOCUMENT_ROOT'].'./WEB/User/Views/recetteCard.php');
require_once($_SERVER['DOCUMENT_ROOT'].'./WEB/User/Views/recettePage.php');
require_once($_SERVER['DOCUMENT_ROOT'].'./WEB/User/Views/SignUp.php');
require_once($_SERVER['DOCUMENT_ROOT'].'./WEB/User/Views/login.php');
require_once($_SERVER['DOCUMENT_ROOT'].'./WEB/User/Views/newsCard.php');
require_once($_SERVER['DOCUMENT_ROOT'].'./WEB/User/Views/newsPage.php');
require_once($_SERVER['DOCUMENT_ROOT'].'./WEB/User/Views/profil.php');
require_once($_SERVER['DOCUMENT_ROOT'].'./WEB/User/Views/ajouterRecette.php');
require_once($_SERVER['DOCUMENT_ROOT'].'./WEB/User/Views/contact.php');
$request = $_SERVER['REQUEST_URI'];
if (strpos($request, "?")) {
    $request = substr($request, 0, - (strlen($request) - strpos($request, "?")));
}
session_start();
if (isset($_SESSION['username'])) {
    switch ($request) {
        case '/web/User/profil':
            $view = new profil();
            $view->display("0");
            break;
        case '/web/User/ajouterRecette':
            $view = new ajouterRecette();
            $view->display();
            break;
    }
}else{
    switch ($request) {
        case '/web/User/login':
            $view = new login();
            $view->display();
            break;
        case '/web/User/signup':
            $view = new signUp();
            $view->display();
            break;
    }
}
switch ($request) {
    case '/web/User/':
        $view = new home();
        $view->display();
        break;
    case '/web/User/recette':
        $view = new recette("0");
        $view->display("0");
        break;
    case '/web/User/recetteplats':
        $view = new recette("1");
        $view->display("1");
        break;
    case '/web/User/recetteboissons':
        $view = new recette("2");
        $view->display("2");
        break;
    case '/web/User/recettedesserts':
        $view = new recette("3");
        $view->display("3");
        break;
    case '/web/User/recetteentrees':
        $view = new recette("4");
        $view->display("4");
        break;
    case '/web/User/recettehealthy':
        $view = new recette("5");
        $view->display("5");
        break;
    case '/web/User/recetteAutomne':
        $view = new recette("6");
        $view->display("6");
        break;
    case '/web/User/recetteHiver':
        $view = new recette("7");
        $view->display("7");
        break;
    case '/web/User/recetteEte':
        $view = new recette("8");
        $view->display("8");
        break;
    case '/web/User/recettePrintemps':
        $view = new recette("9");
        $view->display("9");
        break;
    case '/web/User/recetteAnniversaire':
        $view = new recette("10");
        $view->display("10");
        break;
    case '/web/User/recetteMariage':
        $view = new recette("11");
        $view->display("11");
        break;
    case '/web/User/recetteAid':
        $view = new recette("12");
        $view->display("12");
        break;
    case '/web/User/recetteAchoura':
        $view = new recette("13");
        $view->display("13");
        break;    
    case '/web/User/recetteAutres':
        $view = new recette("14");
        $view->display("14");
        break;
    case '/web/User/recette5':
        $view = new recette("15");   
        $view->display("15");
        break;
    case '/web/User/recette6':
        $view = new recette("16");
        $view->display("16");
        break;
    case '/web/User/recette7':
        $view = new recette("17");
        $view->display("17");
        break;
    case '/web/User/recette8':
        $view = new recette("18");
        $view->display("18");
        break;    
    case '/web/User/recette9':
        $view = new recette("19");
        $view->display("19");
        break;
    case '/web/User/recettepage':
        $view = new recettePage();
        $view->display();
        break;
    case '/web/User/newspage':
        $view = new newspage();
        $view->display();
        break;
    case '/web/User/newscard':
        $view = new newscard();
        $view->display();
        break;
    case '/web/User/nutrition':
        $view = new nutrition();
        $view->display();
        break;
    case '/web/User/ideerecette':
        $view = new ideeRecette();
        $view->display();    
        break;
    case '/web/User/contact':
        $view = new contact();
        $view->display();    
        break;
}
?>