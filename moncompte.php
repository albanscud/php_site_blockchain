<!-- connexion bade de donnees -->
<?php
        require_once ("include.php");
        //$db = new PDO('mysql:host=localhost;dbname=bddcryptosvrai', 'root', '');
        
        if (isset($_SESSION['id'])){
          $var = "Bonjour" .' '. $_SESSION['pseudo'] . ' '. "tu es bien connecté !";
          }else{
            $var = "bonjour a tous";
          } 
       ?>


<!DOCTYPE html>
<html>
    <head>
        <!-- les liens -->
        <?php include ("_head/link.php"); ?>
        <title>mon compte</title>
    </head>
    <body>
        
        

        
        <!-- L'en-tête -->
        <?php include("_header/header.php"); ?>
        <?= $var ?>
        <!-- Le pied de page -->
        <?php include("_footer/footer.php"); ?>
        <!-- les scripts tailwinds et bootstrap -->
        <?php include("_head/script.php") ;?>
    </body>
</html>        