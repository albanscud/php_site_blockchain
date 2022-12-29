<!DOCTYPE html>
<html>
    <head>
        <!-- les liens -->
        <?php include ("_head/link.php")?>
        <title>Blockchain</title>
    </head>
    <body>
        <!-- connexion bade de donnees -->
        <?php
        include_once ("_db/connexionDB.php");
        //$db = new PDO('mysql:host=localhost;dbname=bddcryptosvrai', 'root', '');
        

        ?>
        <!-- L'en-tête -->
        <?php include("_header/header.php"); ?>
        <!-- Le corps -->
        <?php include("main.php"); ?>
        <!-- Le pied de page -->
        <?php include("_footer/footer.php"); ?>
        
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/tw-elements/dist/js/index.min.js"></script>    
    </body>
</html>        