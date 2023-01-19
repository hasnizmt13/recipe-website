<?php
require_once($_SERVER['DOCUMENT_ROOT'] . './WEB/Admin/Controllers/adminController.php');
class login
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
            <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200&display=swap" rel="stylesheet">
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
            <link rel="preconnect" href="https://fonts.googleapis.com"><link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
            <link href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap" rel="stylesheet">
            <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">
            <link href="http://fonts.googleapis.com/css?family=Cookie" rel="stylesheet" type="text/css">
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
            <title>RecipePress</title>
            <link rel="stylesheet" href="./Style.css">
            <script src="./jquery-3.6.0.min.js"></script>
            <script src="./index.js"></script>
        </head>
        <?php
    }

    public function login(){
        ?>
        <div class="log">
            <div class="login">
                <h1 class="text-center">Se connecter</h1>
                <form class="needs-validation"  method="post" action="<?php $controller=new adminController();$controller->Login(); ?>">
                    <div class="form-group was-validated">
                        <label class="form-label" for="email">Email address</label>
                        <input class="form-control" type="text" id="email" name="username"required>
                        <div class="invalid-feedback">
                            Please enter your email address
                        </div>
                    </div>
                    <div class="form-group was-validated">
                        <label class="form-label" for="password">Password</label>
                        <input class="form-control" type="password" id="password" name="password" required>
                        <div class="invalid-feedback">
                            Please enter your password
                        </div>
                    </div>
                    <div class="form-group form-check">
                        <input class="form-check-input" type="checkbox" id="check">
                        <label class="form-check-label" for="check">Remember me</label>
                    </div>
                    <input class="btn btn-success w-100" name="login" type="submit" value="SIGN IN">
                </form>
            </div>
        </div>
        <?php
    }
    
    public function display()
    {
        $this->header();
        $this->login();
    }
}
?>