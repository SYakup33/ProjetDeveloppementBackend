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
    <title>Formulaire modules</title>
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
  print('Je viens pour modifier !');
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
        print('Je viens pour ajouter !');
        if(!empty($_POST)){ // est ce que j'ai rempli le formulaire, oui

          // Je récupère les données du POST
          $id=getNewId('module');
          print("Nouvel Id : $id");
          $code = addslashes(htmlentities($_POST['ttCode']));
          $libelle=addslashes(htmlentities($_POST['ttLibelle']));
          $description= addslashes(htmlentities($_POST['ttDescription']));

          // Je construit la requête INSERT
          $SQLQuery= "INSERT INTO module (id, code, libelle, description)
          VALUES ($id,'$code','$libelle','$description')";

          // J'exécute la requête et je retourne sur la liste
          if($dbConn->query($SQLQuery)){
            header("Location: modules.php");
          };
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
              <input value="<?php print($code); ?>" class="form-control" id="exampleInputCode" aria-describedby="emailHelp" placeholder="Saisir le code" name = "ttCode">
              <small id="emailHelp" class="form-text text-muted"></small>
            </div>
            <div class="form-group">
              <label for="libelle">Libelle :</label>
              <input value="<?php print($libelle); ?>" class="form-control" id="exampleInputLibelle" placeholder="Saisir le libellé" name = "ttLibelle">
            </div>
          </div>
            <div class="form-group">
                <label for="exampleFormDesc" class="description">Desciption :</label>
                <textarea class="form-control" id="exampleFormDesc" rows="3" placeholder="Saisir la description du module" name = "ttDescription"><?php print(stripslashes($description)); ?></textarea>
            </div>
            <div class="boutton">
              <button type="submit" class="btn btn-success" id="btValid">Valider</button>
              <button type="button" class="btn btn-danger" id="btreset">Annuler</button>
          </div>

          </form>
<?php
  print(getFooter());

?>
          <script type="application/javascript">
            /* ----------------------------------Quand j'appuie sur le bouton valider------------------------------- */
            // Si il y'a des gens vides des messages d'alertes pop

            let btValid = document.getElementById('btValid');

            btValid.addEventListener('click', function(evt){
            evt.preventDefault(); // Je viens casser l'action par défault

            // Je fait une référence à mon champ HTML, 3 méthodes différentes qui en le même but
            let champCode = document.getElementById('exampleInputCode');
            let champLibelle = document.querySelector('#exampleInputLibelle');
            let champDesc = document.querySelector('textarea');
            
            if(champCode.value === ''){
              alert('Please enter, code');
              champCode.focus(); // Mettre un focus sur le champ vide
              champCode.style.borderColor= 'red';
              return; // si champ vide, sortir de la fonction, le reste du code ne s'exécute pas
              }
            
            if(champLibelle.value === ''){
              alert('Please enter, libelle');
              champLibelle.focus();
              champCode.style.borderColor= 'red';
              return;
              }

            // if(champDesc.value === ''){
            //   alert('Please enter, decription');
            //   champDesc.focus();
            //   champCode.style.borderColor= 'red';
            //   return;
            //  }
             document.querySelector('form').submit();
              console.log(champCode);
            })
            
          </script>


    </body>

</html>
