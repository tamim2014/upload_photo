<?php
require_once("conn.php");
$req="SELECT * FROM etudiants";
$ps=$conn->prepare($req);
$ps->execute();
?>

<html>
<head>
    <title></title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="css/myStyle.css" />

</head>
<body>
<?php require_once ("entete.php"); ?>
   <div class="col-md-12  col-xs-12  decalerEnBas">

       <div class="panel  panel-info EspaceHaut">
           <span class="red"> panel-info</span>
           <div class="panel-heading"><span class="red">panel-heading</span></div>
           <div class="panel-body">

               <table class="table  table-striped">
                   <thead>
                   <tr>
                       <th>CODE</th><th>NOM</th><th>EMAIL</th><th>PHOTO</th>
                   </tr>
                   </thead>
                   <tbody>
                   <?php while($et=$ps->fetch()){ ?>
                       <tr>
                           <td><?php echo( $et['CODE']) ?></td>
                           <td><?php echo( $et['NOM'] ) ?></td>
                           <td><?php echo( $et['EMAIL']) ?></td>
                           <td><img src="images/<?php echo( $et['PHOTO']) ?>" width="40" height="30"/></td>
                           <td><a href="editEtudiant.php?code=<?php echo( $et['CODE']) ?>">Edit</a></td>
                           <td><a onclick="return confirm('Etes vous sûr...?')" href="supprimEtudiant.php?code=<?php echo( $et['CODE']) ?>">Supprimer</a></td>

                       </tr>
                   <?php } ?>
                   </tbody>
               </table>
	


           </div>


       </div>
   </div>
</body>
</html>

