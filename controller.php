<?php
require_once "DAO.php";
require_once "UtilBD.php";
?>

<?php
if (isset($_POST['action']))
{
    $action=$_POST['action'];
    switch ($action)
    {
        case "authentifier":
            if (isset($_POST['nom'],$_POST['prenom'],$_POST['pass']))
            {
                $nom=$_POST['nom'];
                $prenom=$_POST['prenom'];
                $pass=$_POST['pass'];
                $resultat=intval(authentify($nom,$prenom,$pass));
                $liste=getVote($resultat);
                $vote=0;
                while ($data=ObjetSuivant($liste))
                {
                    $vote=intval( $data->vote);
                }


                if(($resultat) !=0 && $vote==0 )
                {
                    header("location:candidat.php?id=$resultat");
                }

                else
                    {
                        header("location:echecAuthentif.php?id=$resultat");
                    }
            }
            break;
    }
}
if(isset($_POST['candidats'])){

    $k=null;
    for($i=0;$i<sizeof($_POST['candidats']);$i++)
    {
        $k[$i]= intval($_POST['candidats'][$i]);

    }
    incrementerVoix($k);
}

if(isset($_GET['id']))
{
    changeEtatVote(intval($_GET['id']));
}
?>
