<!-- connexion bade de donnees -->
<?php
        require_once ('include.php');
        //$db = new PDO('mysql:host=localhost;dbname=bddcryptosvrai', 'root', '');

        if(!isset($_SESSION)){
            header('Location: /');
            exit;
        }

        $req = $DB->prepare("SELECT * 
        FROM utilisateur 
        WHERE id = ?"); 

        $req->execute([$_SESSION['id']]);

        $req_user = $req->fetch();

        $date = date_create($req_user['date_creation']);
        $date_inscription = date_format($date, 'd/m/Y');

        $date = date_create ($req_user['date_connexion']);
        $date_connexion = date_format($date, 'd/m/Y à H:i');

        switch ($req_user['role']){
            case 0:
                $role = 'Utilisateur';
            break;
            case 1:
                $role = "Super-Admin";
            break;
            case 2:
                $role = "Admin";
            break;
            case 3:
                $role = 'Moderateur';
            break; 
        } 
        
        ?>
<!DOCTYPE html>
<html>
    <head>
        <!-- les liens -->
        <?php include ("_head/link.php"); ?>
        <title>Profil de <?php $req_user ['pseudo']    ?></title>
    </head>
    <body>
       
        <!-- L'en-tête -->
    <?php include("_header/header.php"); ?>
    <div class="container pb-96">
        <div class="row">
            <div class="col-12">
                <h1 class="text-3xl py-5">bonjour <?php $req_user['pseudo'] ?></h1>
                <div class="py-5">
                    Date d'inscription : Le <?php $date_inscription ?>
                </div>
                <div class="py-5">
                    Date de connexion : Le <?php $date_connexion ?>
                </div>
                <div class="py-5">
                    Mon rôle : Le <?php $role ?>
                </div>
            </div>
        </div>
    </div>
        
        <!-- Le pied de page -->
        <?php include("_footer/footer.php"); ?>
        <!-- les scripts tailwinds et bootstrap -->
        <?php include("_head/script.php") ;?>
    </body>
</html>        