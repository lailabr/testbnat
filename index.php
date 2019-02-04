<?php require_once "UtilBD.php";?>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>Page d'authentification</title>
    <link type="text/css" rel="stylesheet" href="style.css" />
</head>
<body>
<fieldset>
    <legend>Authentification : </legend>
    <form action="controller.php" method="post">
        Nom: <input type="text" name="nom"><br>
        Prénom:<input type="text" name="prenom"><br>
        Mot De Passe:<input type="password" name="pass"><br>
        <input name="id" type="hidden" value="id">
        <input name="action" value="authentifier" type="submit">
    </form>
</fieldset>
</body>
</html>
