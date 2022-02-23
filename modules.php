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
    <title>Modules</title>
  </head>
  <body>
<?php
// 1 Connexion au serveur + sélection de la BDD
$dbConn = getBDDConn();

// 2 Execution de la requête
$SQLQuery = "SELECT * FROM module";
$SQLResult = $dbConn->query($SQLQuery);

// 3 Exploitation des résultats

// print_r($SQLResult->FetchAll());

  // Tableau associatif, avec les noms des champs dans la base de données
  // print_r($SQLResult->Fetch(PDO::FETCH_ASSOC));

  // Tbaleau numérique, avec des nombres 1 2 3 ...
  // print_r($SQLResult->fetch(PDO::FETCH_NUM));

  // Belle affichage
  // print('<pre>');
  // print_r($SQLResult->FetchAll(PDO::FETCH_ASSOC));
  $tab = ($SQLResult->FetchAll(PDO::FETCH_ASSOC));
  // print('</pre>');
$SQLResult -> closeCursor();

  print(getHeader("Les modules"));
  print(getNavbar());
?>
<a href="frm_modules.php" class="newModule btn btn-success" >Nouveau module</a>

    <table class="table">
        <thead>
          <tr class="table-secondary">
            <th scope="col" >id</th>
            <th scope="col">Code</th>
            <th scope="col">Libelle</th>
            <th scope="col">Desciption</th>
            <th colspan="4">Actions</th>
          </tr>
        </thead>
        <tbody>

<?php
  // Déclaration d'un tableau PHP contenant des informations à afficher ensuite
  // $tab = array( 
  //   array('SQL01', 'Apprendre le DML'),
  //   array('SQL02', 'Apprendre le DLL'),
  //   array('SQL03', 'Apprendre le SQL')

  // );
  // C'est la même chose
  // $tab[0] = array('SQL01', 'Apprendre le DML');
  // $tab[1] = array('SQL02', 'Apprendre le DLL');
  // $tab[2] = array('SQL03', 'Apprendre le SQL');


 
  $nb = count($tab);
  for ($i=0;$i<$nb;$i++){
    $ligne = '<tr>
    <th scope="row">'.$tab[$i]['id'].'</th>
    <td>'.$tab[$i]['code'].'</td>
    <td>'.$tab[$i]['libelle'].'</td>
    <td>'.$tab[$i]['description'].'</td>
    <td><a href="frm_modules.php?id='.$tab[$i]['id'].'"><i class="fa-solid fa-pen-to-square"></i></a></td>
    <td><a href="#"><i class="fa-solid fa-eraser"></i></a></td>
    </tr>';
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
