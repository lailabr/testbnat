<?php

var_dump($_POST['candidats']);


for($i=0;$i<sizeof($_POST['candidats']);$i++)
{
    $k= intval($_POST['candidats'][$i]);
    echo $k+1+" / ";
}



?>