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
  print(getHeader("Le formulaire module"));
  print(getNavbar());
/* -------------------------------------------------------Traitement du formulaire ------------------------------------------------*/
  // print('<pre>');
  // print_r($_GET);
  // print('</pre>');
  $code = '';
  $libelle = '';
  $description = ''; 
  $dbConn = getBDDConn();
  // Ajout nouveau module via le formulaire
  // Il y'a 2 possibilités, ajouter un nouveau module ou modifier un module
  // Il faut donc connaitre si on accede au formulaire pour ajouter ou modifier
  // Pour cela on s'aide de l'url, quand on modifie un module, dans l'url il y'a l'id qui apparait
  // Mais pas quand on ajoute un nouveau module
  // On utilise donc une boucle if et isset (une méthode de php, qui permet de déterminer si un champ est rempli)

/* ---------------------------------------------Modifier un module---------------------------------*/
if (isset($_GET['id'])) {
  // print('Je viens pour modifier !');
  $id = $_GET['id'];
  

  // Si on appuie sur valider -> quand on envoie les données
  if (!empty($_POST)) {
    $code = $_POST['ttCode'];
    $libelle=$_POST['ttLibelle'];
    $description= addslashes($_POST['ttDescription']);
    $SQLQuery="UPDATE module
      SET code = '$code', 
        libelle = '$libelle',
        description ='$description'
      WHERE id = $id";
     if($dbConn->query($SQLQuery)){
       header("Location: modules.php");
     };
  }else{ // Je récupère les données depuis la base de données

  $SQLQuery = "SELECT * FROM module WHERE id = $id";
  // C'est la même chose
  // $SQLQuery = 'SELECT * FROM module WHERE id = '.$id;
  
  $SQLResult = $dbConn->query($SQLQuery);

  $infosModule = $SQLResult->fetch(PDO::FETCH_ASSOC);

  $code = $infosModule['code'];
  $libelle = $infosModule['libelle'];
  $description = $infosModule['description'];

  $SQLResult -> closeCursor();
  }
  /* -----------------------------------------------------------------------------------------------------------------*/
     }else{
       /* ---------------------------------------------Ajouter un nouveau module---------------------------------*/
        //print('Je viens pour ajouter !');
        if(!empty($_POST)){
          // Je récupère les données du POST
          $id="SELECT max(id)+1 FROM module";
          $code = $_POST['ttCode'];
          $libelle=$_POST['ttLibelle'];
          print_r($id);
          $description= addslashes($_POST['ttDescription']);

          // Je construit la requête INSERT
          $SQLQuery= "INSERT INTO module
          VALUES (id='$id',code = '$code',libelle = '$libelle',description = '$description')
          ";
          // J'exécute la requête
          // Je retourne sur la liste

        }
      }
      /* -----------------------------------------------------------------------------------------------------------------*/

/* -------------------------------------------------------Fin Traitement du formulaire ------------------------------------------------*/

?>
<!------------------------------------------------------- Affichage du formulaire------------------------------------------------------ -->
        <form action="" method="post">
            <h1>Fiche module</h1>
            <div class="formule">
            <div class="form-group">
              <label for="code">Code :</label>
              <input value="<?php print($code); ?>" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Saisir le code" name = "ttCode">
              <small id="emailHelp" class="form-text text-muted"></small>
            </div>
            <div class="form-group">
              <label for="libelle">Libelle :</label>
              <input value="<?php print($libelle); ?>" class="form-control" id="exampleInputPassword1" placeholder="Saisir le libellé" name = "ttLibelle">
            </div>
          </div>
            <div class="form-group">
                <label for="exampleFormControlTextarea1" class="description">Desciption :</label>
                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Saisir la description du module" name = "ttDescription"><?php print(stripslashes($description)); ?></textarea>
            </div>
            <div class="boutton">
              <button type="submit" class="btn btn-success">Valider</button>
              <button type="submit" class="btn btn-danger">Annuler</button>
          </div>

          </form>
<?php
  print(getFooter());
?>
    </body>

</html>
