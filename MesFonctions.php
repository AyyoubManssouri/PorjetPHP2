<?php
function connexion($host,$user,$bdd)
{	
    return mysqli_connect($host,$user,'',$bdd);
}
function deconnexion()
{
    session_destroy();
}
function recuperervarpost($champ)
{
    return $_POST[$champ];
}
function select($table,$log,$pass,$con)
{
    $query = "select * from ".$table." where login = '".$log."' AND pass = '".$pass."';";
    $data = mysqli_query($con,$query);
    if (mysqli_num_rows($data) > 0){
        while($row = mysqli_fetch_assoc($data)) {
            $_SESSION['login'] = $row['login'];
            $_SESSION['status'] = $row['Statut'];
            return $row['Statut'];
        }
    }
}
function erreur($log,$pass,$statut)
{
    if($log==''){
        return '<script>alert(\'veuillez saisir votre login \')</script>';
    }
        elseif($pass==''){
            return '<script>alert(\'veuilles saisir votre mot de passe \')</script>';
        }
        elseif($statut==''){
            return '<script>alert(\'votre statut n’est pas autorisé  \')</script>';
        }
    else {
        return '';
    }
}
function redirection($statut)
{
    switch ($statut) {
        case 'professeur':
            header("location:Professeur/Professeur.php");
            break;
        case 'administrateur':
            header("location:Administration/Administration.php");
            break;
        case 'scolarite':
            header("location:Scolarite/Scolarité.php");
            break;
        case 'etudiant':
            header("location:Etudiant/Etudiant.php");
            break;
        default:
            break;
    }
}
function ajout_entree($statut ,$fich_historique_acces)
{
    $Fp = fopen($fich_historique_acces, "a");
    fputs($Fp,"Status: ".$statut.". Date: ".date("l jS \of F Y h:i:s A").PHP_EOL);
    fclose($Fp);
}
?>
