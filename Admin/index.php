<?php
require_once($_SERVER['DOCUMENT_ROOT'].'./WEB/Admin/Views/gestionNews.php');
require_once($_SERVER['DOCUMENT_ROOT'].'./WEB/Admin/Views/gestionNutrition.php');
require_once($_SERVER['DOCUMENT_ROOT'].'./WEB/Admin/Views/gestionRecette.php');
require_once($_SERVER['DOCUMENT_ROOT'].'./WEB/Admin/Views/gestionUser.php');
require_once($_SERVER['DOCUMENT_ROOT'].'./WEB/Admin/Views/parametres.php');
require_once($_SERVER['DOCUMENT_ROOT'].'./WEB/Admin/Views/gestionContact.php');
require_once($_SERVER['DOCUMENT_ROOT'].'./WEB/Admin/Views/login.php');
$request = $_SERVER['REQUEST_URI'];
session_start();
if(isset($_SESSION['username'])){
    switch ($request) {
        case '/web/Admin/recette':
            $view = new gestionRecette();
            $view->display();
            break;
        case '/web/Admin/nutrition':
            $view = new gestionNutrition();
            $view->display();
            break;
        case '/web/Admin/user':
            $view = new gestionUser();
            $view->display();
            break;
        case '/web/Admin/news':
            $view = new gestionNews();
            $view->display();
            break;
        case '/web/Admin/parametres':
            $view = new parametres();
            $view->display();
            break;
        case '/web/Admin/contact':
            $view = new contact();
            $view->display();
            break;
    }    
}
else{
    switch ($request) {
        case '/web/Admin/':
            $view = new login();
            $view->display();
            break;
        case '/web/Admin/login':
            $view = new login();
            $view->display();
            break;
    }
}

?>