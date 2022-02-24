<?php
// afficher les erreurs
ini_set("display_errors","on");
include_once("includes/scripts/fonctions.php");
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
      integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    />
    <link
    rel="stylesheet"
    href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
    integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T"
    crossorigin="anonymous"
  />
    <link rel="stylesheet" href="style.css" />
    <title>Participants</title>
  </head>
 <body>

 <?php
 // Récupérer les données de la base de données
 $dbConn = getBDDConn();
 $SQLQuery = "SELECT  civilite.libelle_court, nom, prenom, email.adresse, date_naissance, adresse1
              FROM participant 
              INNER JOIN civilite ON civilite.id = participant.idcivilite
              LEFT OUTER JOIN  email ON email.idparticipant = participant.id ";
 $SQLResult = $dbConn->query($SQLQuery);
 $tab = ($SQLResult->FetchAll(PDO::FETCH_ASSOC));
 $SQLResult -> closeCursor();
?>
<?php
  print(getHeader("Les participants"));
  print(getNavbar());
?>
    
    <table class="table">
      <thead>
        <tr class="table-secondary">
          <th scope="col">Civilité</th>
          <th scope="col">Nom</th>
          <th scope="col">Prenom</th>
          <th scope="col">Email</th>
          <th scope="col">Date de naissance</th>
          <th scope="col">Adresse</th>
          <th colspan="2">Actions</th>
        </tr>
      </thead>
      <tbody>

<?php
// Remplir le tableau participant, avec les données de la bd
  $nb = count($tab);
  for ($i=0;$i<$nb;$i++) {
    $date = date_create_from_format('Y-m-d', $tab[$i]['date_naissance'])->format('d.m.Y');
    $ligne = ' <tr>
    <th scope="row">'.$tab[$i]['libelle_court'].'</th>
    <td >'.$tab[$i]['nom'].'</td>
    <td>'.$tab[$i]['prenom'].'</td>
    <td>'.$tab[$i]['adresse'].'</td>
    <td>'.$date.'</td>
    <td>'.$tab[$i]['adresse1'].'</td>
    <td><a href="frm_participant.php"><i class="fa-solid fa-pen-to-square"></i></a></td>
    <td><a href="#"><i class="fa-solid fa-eraser"></i></a></td>
  </tr>
  ';
  print($ligne);
}
?>

      </tbody>
    </table>
<?php
  print(getFooter());
?>
  </body>
</html>
