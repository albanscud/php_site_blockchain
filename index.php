<!DOCTYPE html>
<html>
    <head>
        <!-- les liens -->
        <?php include ("_head/link.php"); ?>
        <title>Acceuil</title>
    </head>
    <body>
        
        <!-- connexion bade de donnees -->
        <?php
        require_once ("include.php");
        //$db = new PDO('mysql:host=localhost;dbname=bddcryptosvrai', 'root', '');
        ?>

        
        <!-- L'en-tête -->
        <?php include("_header/header.php"); ?>
        <!-- Le corps -->
        <?php include("main.php"); ?>
        <!-- Le pied de page -->
        <?php include("_footer/footer.php"); ?>
        <!-- les scripts tailwinds et bootstrap -->
        <?php include("_head/script.php") ;?>
    </body>
</html>        