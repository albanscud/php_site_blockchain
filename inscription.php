<!DOCTYPE html>
<html>
    <head>
        <!-- les liens -->
        <?php include ("_head/link.php"); ?>
        <title>Inscription</title>
    </head>
    <body>
        
        <!-- connexion bade de donnees -->
        <?php
        require_once ("include.php");
        //$db = new PDO('mysql:host=localhost;dbname=bddcryptosvrai', 'root', '');
        ?>

        
        <!-- L'en-tête -->
        <?php include("_header/header.php"); ?>
       
        <p class="text-5xl text-center">Inscription</p>
        <!-- debut formulaire d'inscription -->
        
        <div class="container">
        
            <form method ="post">
                
                <div class="mb-3">
                    <label class="form-label">Mail :</label>
                    <input class="form-control" type="email" name="mail" value ="" placeholder="mail"/>
                </div>
                <div class="mb-3">
                    <label class="form-label">Confirmation du mail :</label>
                    <input class="form-control" type="email" name="confmail" value ="" placeholder="confirmation mail"/>
                </div>
                <div class="mb-3">
                    <label class="form-label">Pseudo :</label>
                    <input class="form-control" type="text" name="pseudo" value ="" placeholder="pseudo"/>
                </div>
                <div class="mb-3">
                    <label class="form-label">Mot de passe:</label>
                    <input class="form-control" type="password" name="password" value ="" placeholder="Mot de passe"/>
                </div>
                <div class="mb-3">
                    <label class="form-label">Confirmation du mot de passe:</label>
                    <input class="form-control"  type="password" name="confpassword" value ="" placeholder="confirmation mot de passe"/>
                </div>
                <div class="mb-3">
                    <label class="form-label">Date de naissance</label>
                    <input class="form-control" type="date" name="datenaissance" value ="" placeholder="date de naissance"/>
                </div>
                <div class="mb-3">
                    <label class="form-label">Adresse</label>
                    <input class="form-control" type="adress" name="adresse" value ="" placeholder="adresse"/>
                </div>
                <div class="mb-3">
                    <label class="form-label">Code postal</label>
                    <input class="form-control" type="text" name="codepostal" value ="" placeholder="codepostal"/>
                </div>
                <div class="mb-3">
                    <label class="form-label">Ville</label>
                    <input class="form-control" type="text" name="ville" value ="" placeholder="ville"/>
                </div>
                <div class="mb-3">
                    <label class="form-label">Pays</label>
                    <input class="form-control" type="text" name="pays" value ="" placeholder="pays"/>
                </div>
                <div class="mb-3">
                    <button type="submit" class="btn btn-outline-primary">S'inscrire</button>
                </div>
                
            </form>
        </div>       

        
       
        <!-- Le pied de page -->
        <?php include("_footer/footer.php"); ?>
        <!-- les scripts tailwinds et bootstrap -->
        <?php include("_head/script.php") ;?>
    </body>
</html>        