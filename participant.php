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
 $dbConn = new PDO("mysql:host=localhost;port=3306;dbname=evaluation;charset=utf8","root","");
 $SQLQuery = "SELECT * FROM participant";
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
          <th scope="col">Nom</th>
          <th scope="col">Prenom</th>
          <th scope="col">Date de naissance</th>
          <th scope="col">Adresse 1</th>
          <th scope="col">Adresse 2</th>
          <th colspan="2"></th>
        </tr>
      </thead>
      <tbody>

<?php
// Remplir le tableau participant, avec les données de la bd
  $nb = count($tab);
  $date = date_create_from_format('Y-m-d', '2021-05-12')->format('d/m/Y');
  print($date);
  for ($i=0;$i<$nb;$i++) {
    $ligne = ' <tr>
    <th scope="row">'.$tab[$i]['nom'].'</th>
    <td>'.$tab[$i]['prenom'].'</td>
    <td>'.$tab[$i]['date_naissance'].'</td>
    <td>'.$tab[$i]['adresse1'].'</td>
    <td>'.$tab[$i]['adresse2'].'</td>
    <td><a href="#"><i class="fa-solid fa-pen-to-square"></i></a></td>
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
