 <!-- connexion bade de donnees -->
<?php
        require_once('include.php');
        //$db = new PDO('mysql:host=localhost;dbname=bddcryptosvrai', 'root', 'root');
        
        if(isset($_SESSION['id'])){
            header('Location: /moncompte.php');
            exit;
        }   

        if(!empty($_POST)){
            extract($_POST);

            $valid = true;

            
            if(isset($_POST['inscription'])){
                $pseudo = trim($pseudo);
                $mail = trim($mail);
                $confmail = trim($confmail);
                $password = trim($password);
                $confpassword = trim($confpassword);
                $datenaissance = trim($datenaissance);
                $adresse = trim($adresse);
                $cp = trim($cp);
                $ville = trim($ville);
                $pays = trim($pays);  
                
                if(empty($pseudo)){
                    $valid = false;
                    $err_pseudo = "Ce champ ne peut pas être vide"; 
                
                }elseif(grapheme_strlen($pseudo) < 4){
                    $valid = false;
                    $err_pseudo = "Ce pseudo doit faire plus de 3 caractères"; 
                }elseif(grapheme_strlen($pseudo) > 25){
                    $valid = false;
                    $err_pseudo = "Ce pseudo doit faire moins de 26 caractères(" . grapheme_strlen($pseudo) . "/25";
                }else{
                    $req = $DB->prepare("SELECT id 
                    FROM utilisateur 
                    WHERE pseudo = ?");
                
                    $req->execute(array($pseudo));

                    $req = $req->fetch();

                    if(isset($req['id'])){
                        $valid = false;
                        $err_pseudo = "Ce pseudo est déjà pris";
                    }
                
                }
                if(empty($mail)){
                    $valid = false;
                    $err_mail = "Ce champ ne peut pas être vide";
                
                }elseif($mail <> $confmail){
                    $valid= false;
                    $err_mail = "Le mail est different de la confirmation";

                }else{
                    $req = $DB->prepare("SELECT id 
                    FROM utilisateur 
                    WHERE mail = ?");
                
                    $req->execute(array($mail));

                    $req = $req->fetch();

                    if(isset($req['id'])){
                        $valid = false;
                        $err_mail = "Ce mail est déjà pris";
                    }
                }
                if(empty($password)){
                    $valid = false;
                    $err_password = "Ce champ ne peut pas être vide";

                }elseif($password<>$confpassword){
                    $valid = false;
                    $err_password = "Le mot de passe est different de la confirmation";
                }


                if($valid){

                    //$crypt_password = crypt($password, '$6$rounds=5000$}~u0+0%1{N2CFrGsB+_U2(rrCW)PTW/[PY7Dp-K0{@(SoKAef;~~`g%>NuB 0ly($');
                    $crypt_password = password_hash($password, PASSWORD_ARGON2ID);

                    /* if (password_verify($password, $crypt_password)){
                        echo 'Le mot de passe est valide';
                    }else{
                        echo "Le mot de passe n'est pas valide";
                    } */
                    
                    $date_creation = date('Y-m-d H:i:s');

                    $req = $DB->prepare("INSERT INTO utilisateur(pseudo, mail, mdp, date_creation, date_connexion) VALUES (?, ?, ?, ?, ?)");
                    $req->execute(array($pseudo, $mail, $crypt_password, $date_creation, $date_creation)); 

                    header('Location: /connexion.php');
                    exit;

                }  
            
            }
        }
?>

<!DOCTYPE html>
<html>
    <head>
        <!-- les liens -->
        <?php include ("_head/link.php"); ?>
        <title>Inscription</title>
    </head>
    <body>
        
       

        
        <!-- L'en-tête -->
        <?php include("_header/header.php"); ?>
        
        <p class="text-5xl text-center pt-10">Inscription</p>
        <!-- debut formulaire d'inscription -->
        
        <div class="container pt-10 pb-10">
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
                            <label class="form-label">Mail :</label>
                            <input class="form-control" type="email" name="mail" value ="<?php if(isset($mail)){ echo $mail; } ?>" placeholder="mail"/>
                            <div class="text-red-500"> <?php if(isset($err_mail)){ echo $err_mail;}?> </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Confirmation du mail :</label>
                            <input class="form-control" type="email" name="confmail" value ="" placeholder="confirmation mail"/>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Mot de passe:</label>
                            <input class="form-control" type="password" name="password" value ="<?php if(isset($password)){ echo $password; } ?>" placeholder="mot de passe"/>
                            <div class="text-red-500"> <?php if(isset($err_password)){ echo $err_password;}?> </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Confirmation du mot de passe:</label>
                            <input class="form-control"  type="password" name="confpassword" value ="" placeholder="confirmation mot de passe"/>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Date de naissance</label>
                            <input class="form-control" type="date" name="datenaissance" value ="<?php if(isset($datenaissance)){echo $datenaissance;} ?>" placeholder="date de naissance"/>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Adresse</label>
                            <input class="form-control" type="adress" name="adresse" value ="<?php if(isset($adresse)){echo $adresse;} ?>" placeholder="adresse"/>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Code postal</label>
                            <input class="form-control" type="text" name="codepostal" value ="<?php if(isset($cp)){echo $cp;} ?>" placeholder="code postal"/>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Ville</label>
                            <input class="form-control" type="text" name="ville" value ="<?php if(isset($ville)){echo $ville;} ?>" placeholder="ville"/>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Pays</label>
                            <input class="form-control" type="text" name="pays" value ="<?php if(isset($pays)){echo $pays;} ?>" placeholder="pays"/>
                        </div>
                        <div class="mb-3">
                            <button type="submit" name="inscription" class="btn btn-outline-primary">S'inscrire</button>
                        </div>
                    </form>    
                </div>
            </div>
        </div>       

        
       
        <!-- Le pied de page -->
        <?php  include("_footer/footer.php"); ?>
        <!-- les scripts tailwinds et bootstrap -->
        <?php include("_head/script.php") ;?>
    </body>
</html>       