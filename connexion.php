<!-- connexion bade de donnees -->
<?php
    require_once ('include.php');
    //$db = new PDO('mysql:host=localhost;dbname=bddcryptosvrai', 'root', '');
    if(isset($_SESSION['id'])){
      header('Location: /');
      exit;
    } 

    if(!empty($_POST)){
        extract($_POST);

      $valid = (boolean) true;

      
      if(isset($_POST['connexion'])){
        $pseudo = ucfirst(trim($pseudo));
        $password = trim($password);
        
        if(empty($pseudo)){
            $valid = false;
            $err_pseudo = "Ce champ ne peut pas être vide"; 
        }
        
        if(empty($password)){
          $valid = false;
          $err_password = "Ce champ ne peut pas être vide";
        }

        if($valid){
            $req = $DB->prepare("SELECT mdp 
            FROM utilisateur 
            WHERE pseudo = ?");
        
            $req->execute(array($pseudo));

            $req = $req->fetch();

          if(isset($req['mdp'])){
            if(!password_verify($password, $req['mdp'])) {
                $valid = false;
                $err_pseudo = "La combinaison du pseudo / mot de passe est incorrecte";
              }

            }else{
                $valid = false;
                $err_pseudo = "La combinaison du pseudo / mot de passe est incorrecte";
            }
        }

        
        if($valid){

          $req = $DB->prepare("SELECT * 
          FROM utilisateur 
          WHERE pseudo = ?"); 
      
          $req->execute(array($pseudo));

          $req_user = $req->fetch(); 

          if(isset($req_user['id'])){
            $date_connexion = date('Y-m-d H:i:s'); 

            $req = $DB->prepare("UPDATE utilisateur SET date_connexion = ? WHERE id = ?");
            $req->execute(array($date_connexion, $req_user['id']));

            $_SESSION['id'] = $req_user['id'];
            $_SESSION['pseudo'] = $req_user['pseudo'];
            $_SESSION['mail'] = $req_user['mail'];
            $_SESSION['role'] = $req_user['role'];

            header('Location: /');
            exit;
          }else{
            $valid = false;
            $err_pseudo = "La combinaison du pseudo / mot de passe est incorrecte";
          }
        }
      }
    }
     
       
?>
<!DOCTYPE html>
<html>
    <head>
        <!-- les liens -->
        <?php include ("_head/link.php"); ?>
        <title>Connexion</title>
    </head>
    <body>
         <!-- L'en-tête -->
        <?php include("_header/header.php"); ?>
        
        <!-- Formulaire de connexion -->
        <p class="text-5xl text-center pt-10">Connexion</p>
        <div class="container  pt-10 pb-96">
            <div class="row">
                <div class="col-3"></div>
                <div class="col-6">
                    <form method ="post">

                        <div class="mb-3">
                            <label class="form-label">Pseudo :</label>
                            <input class="form-control" type="text" name="pseudo" value ="<?php if(isset($pseudo)){ echo $pseudo; } ?>" placeholder="pseudo"/>
                            <div class="text-red-500"> <?php if(isset($err_pseudo)){ echo $err_pseudo;}?> </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Mot de passe:</label>
                            <input class="form-control" type="password" name="password" value ="<?php if(isset($password)){ echo $password; } ?>" placeholder="Mot de passe"/>
                            <div class="text-red-500"> <?php if(isset($err_password)){ echo $err_password;}?> </div>
                        </div>
                        <div class="mb-3">
                            <button type="submit" name="connexion " class="btn btn-outline-primary">Se connecter</button>
                        </div>
                    </form>    
                </div>
            </div>
        </div>       
 
         <!-- Le pied de page -->
        <?php include("_footer/footer.php"); ?>
        <!-- les scripts tailwinds et bootstrap -->
        <?php include("_head/script.php") ;?>
    </body>
</html>        





