<?php
$code=$_GET['code'];
require_once ("conn.php");
$ps=$conn->prepare("SELECT * FROM etudiants WHERE CODE=?");
$params=array($code);
$ps->execute($params);
//stockage(des caracteristiques d'un etudiant) dans une variable intermediaire
$ligne=$ps->fetch();// fetch prend 1 ligne

?>



<!DOCTYPE html>
<html>
<head>

    <meta charset="utf-8"/>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="css/myStyle.css" />

</head>
<body>
    <div class="decalerEnBas">
          <?php require_once("entete.php"); ?>
          <div class="container decalerEnBas col-md-6 col-x-12 col-md-offset-3 ">
                 <div class="panel panel-default  " >
                     <div class="panel-heading  ">Saisie des Etudiants</div>
                     <div class="panel-body">
                         <form method="post" action="modifierEtudiant.php" enctype="multipart/form-data">
                             <div  class="form-group">
                                 <label class="control-label">Code: <?php echo($ligne['CODE']) ?></label> <!-- SECURITE: afficher le code sous forme text afin que l utilisateur ne puissa pas le modifier -->
                                 <input type="hidden" name="code"    value="<?php echo($ligne['CODE'])?>"  class="form-control"/>
                             </div>
                             <div  class="form-group">
                                <label class="control-label">Nom:</label>
                                <input type="text" name="nom"    value="<?php echo($ligne['NOM'])?>"     class="form-control"/>
                             </div>
                             <div  class="form-group">
                                 <label class="control-label">Email:</label>
                                 <input type="text" name="email"  value="<?php echo($ligne['EMAIL'])?>"  class="form-control"/>
                             </div>

                             <div  class="form-group">
                                 <label class="control-label">Photo:</label>
                                 <input type="file" name="photo" class="form-control"/>
                                 <img src="images/<?php echo($ligne['PHOTO'])?>"  height="40" width="50" />
                             </div>
                             <div>
                                 <button type="submit" >Save</button>
                             </div>
                         </form>
                     </div>
                 </div>
          </div>
    </div>
</body>

</html>