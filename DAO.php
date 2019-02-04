<?php require_once "UtilBD.php";?>

<?php

function authentify($nom,$prenom,$pass)
{
    $id =0;

    $listeElecteurs =getAllelecteurs();
    while ($data=ObjetSuivant($listeElecteurs))
    {
        if(($data->nom)==$nom && ($data->prenom)==$prenom && ($data->pass)==$pass)
        {
            $id =$data->id;
            break;
        }

    }
    return $id;


}


function getAllelecteurs()
{
    $connexion =Connexion(NOM,PASSE,BASE,SERVEUR);
    $electeurs ="SELECT * FROM electeur";
    $result =ExecRequete($electeurs,$connexion);
    return $result;
}

function getAllcandidats()
{
    $connexion =Connexion(NOM,PASSE,BASE,SERVEUR);
    $candidats ="SELECT * FROM candidat";
    $result =ExecRequete($candidats,$connexion);
    return $result;
}

function getVote($id)
{
    $connexion =Connexion(NOM,PASSE,BASE,SERVEUR);
    $vote ="SELECT * FROM electeur where id='$id'";
    $result =ExecRequete($vote,$connexion);
    return $result;
}




/**
 * get the last dossard
 */
function getLastid()
{
    $connexion =Connexion(NOM,PASSE,BASE,SERVEUR);
    $stmt = ("SELECT * FROM  participant order by dossard desc limit 1");
    $result=(ExecRequete($stmt,$connexion));
    return $result;
}

function getAllParticipants($dossard)
{
    $connexion =Connexion(NOM,PASSE,BASE,SERVEUR);
    $stmt = ("SELECT * FROM  participant where dossard='$dossard'");
    $result=(ExecRequete($stmt,$connexion));
    return $result;
}

/**
 * @param array $t
 * il incremente les voix de candidat selectionné
 */
function incrementerVoix(array $t)
{
    $connexion =Connexion(NOM,PASSE,BASE,SERVEUR);

    for($i=0;$i<sizeof($t);$i++)
    {
        $stm ="update candidat set voix=voix+1 where id= '$t[$i]'";
        ExecRequete($stm,$connexion);
    }
}

/**
 * @param $id
 * update l'etat d'electeur if vote =0 il devient 1 else il devient 0
 */
function changeEtatVote($id)
{
    $connexion =Connexion(NOM,PASSE,BASE,SERVEUR);
    $stm ="update electeur set vote=vote+1 where id= '$id'";
    ExecRequete($stm,$connexion);
}

function AllGangnants()
{
    $connexion =Connexion(NOM,PASSE,BASE,SERVEUR);
    $stm="SELECT * from candidat order by voix desc limit 3";
    $result =ExecRequete($stm,$connexion);
    return $result;

}