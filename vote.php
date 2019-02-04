<?php
require_once "DAO.php";
require_once "UtilBD.php";
?>
<html>
<body>
<h1>Les Gangnants yuuuuupi</h1>
<table border="1">
    <tr>
        <th>Nom</th>
        <th>Prenom</th>
        <th>Voix</th>
    </tr>
    <?php
    $listeGangnants = AllGangnants();
    while ($data=ObjetSuivant($listeGangnants))
    {?>
        <tr>
            <td><?php echo $data->nom ?></td>
            <td><?php echo $data->prenom ?></td>
            <td><?php echo $data->voix ?></td>
        </tr>
        <?php
    }
    ?>
</table>

</body>
</html>



