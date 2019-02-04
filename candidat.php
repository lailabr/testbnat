<?php
require_once "DAO.php";
require_once "UtilBD.php";
?>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>Page d'authentification</title>
    <link type="text/css" rel="stylesheet" href="style.css" />
    <script type="text/javascript" src="JS/jequery.js"></script>
    <script language="javascript" type="text/javascript">
       /* $(document).ready(function () {
            $("#voter").click(function(){
               /* var selectedvoix = new Array();
                $('input[name="candidats"]:checked').each(function() {
                    selectedvoix.push(this.value);
                var selectedvoix="laila";

                $.ajax({
                    url: "C:\\wamp\\www\\DS_elections\\controller.php",
                    data: {name : selectedvoix},
                    type: "get",
                    success: function(results) {
                        console.log("success");
                    },
                    error: function(results){
                        console.log("error");
                    }
                });



               // $("#iddiv").empty();
               // $("#iddiv").html($('<h1></h1>').text(selectedvoix));
            });
        });
*/

      /* $("#voter").click(function () {
           $.ajax(function () {
               url:"test.php",
                   type:"post",
                   data:{nom:"laila"},
                   success:function (data) {
                   $("#iddiv").html(data);
               }
           });
       });*/
    </script>
</head>
<body>

<form method="post" action="controller.php?id=<?php echo $_GET['id'];?>" >
    <fieldset>
        <legend> Resultats : </legend>

        <?php
        $liste=getAllcandidats();
        while($data=ObjetSuivant($liste))
              {
                  ?>
                <input id="vot" class="messageCheckbox" type="checkbox" name="candidats[]" value="<?php echo $data->id?>"/><?php echo $data->nom; echo " ".$data->prenom ;?><br/>
            <?php
              }
              ?>


        <input type="submit" value="Voter" class="boutton" name="voter" id="voter">
        <button><a href="vote.php">Resultats</a></button>

    </fieldset>

</form>


</body>
</html>
