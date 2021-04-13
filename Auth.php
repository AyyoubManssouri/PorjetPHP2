<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Styles/auth.css">
    <title>Authentication</title>
</head>
<body>
    <form action="" method="post">
        <h1>ESTL</h1>
        <table>
            <tr>
                <td><label for="login">Login: </label></td>
                <td><input type="text" name="login" id="login"></td>
            </tr>
            <tr>
                <td><label for="pass">Password: </label></td>
                <td><input type="password" name="pass" id="pass"></td>
            </tr>
            <tr>
                <td><button name="valider">Valider</button></td>
                <td><button type="reset">Reset</button></td>
            </tr>
        </table>
    </form>
    <?PHP
        session_start();
        include("MesFonctions.php");
        $host="localhost";
        $user="root";
        $pass="";
        $bdd="gesnote";
        $table="user";
        $cn = connexion($host,$user,$bdd);
        // Test de l'envoi du formulaire
        if(isset($_POST['valider']))
        {
            $log = recuperervarpost("login");
            $pass = recuperervarpost("pass");
            $statut = select($table,$log,$pass,$cn);
            $erreur = erreur($log,$pass,$statut);
            if($erreur == ""){
                redirection($statut);
                ajout_entree($statut ,"myFile.txt");
            } else {
                echo $erreur;
            }
        }	
    ?>
</body>
</html>