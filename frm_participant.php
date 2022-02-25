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
    <title>Formulaire participant</title>
  </head>
  <body>
  <?php
  print(getHeader("Le formulaire participant"));
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



?>



    <!-- --------------------------Récupérer les données du participant Début   ------------------------->
<?php

    $nom="";
    $prenom="";
    $dateNaissance="";
    $adresse="";
    $complement="";
    
    
    $dbConn = getBDDConn();

    if (isset($_GET['id'])) {
      print('Je viens pour modifier !');
      $id = $_GET['id'];

      if (!empty($_POST)) {
        $nom = $_POST['ttNom'];
        $prenom = $_POST['ttPrenom'];
        $dateNaissance = $_POST['ttDate'];
        $adresse = $_POST['ttAdresse'];
        $complement = $_POST['ttAdresse2'];
        $SQLQuery="UPDATE participant
          SET nom = '$nom', 
          prenom = '$prenom',
          date_naissance = '$dateNaissance',
          adresse1 = '$adresse',
          adresse2 = '$complement'
          WHERE id = $id";
      if($dbConn->query($SQLQuery)){
        header("Location: participant.php");
      };
  }else{
    $SQLQuery = "SELECT * FROM participant WHERE id = $id";
    
    $SQLResult = $dbConn->query($SQLQuery);
  
    $infosModule = $SQLResult->fetch(PDO::FETCH_ASSOC);
    $nom = $infosModule['nom'];
    $prenom = $infosModule['prenom'];
    $dateNaissance = $infosModule['date_naissance'];
    $adresse = $infosModule['adresse1'];
    $complement = $infosModule['adresse2'];
    $idcpville = $infosModule['idcpville'];
    $idcivilite = $infosModule['idcivilite'];
    $idpermis = $infosModule['idpermis'];


$SQLResult -> closeCursor();
    
    }
  }else{
    /* ---------------------------------------------Ajouter un nouveau module---------------------------------*/
     print('Je viens pour ajouter !');
     if(!empty($_POST)){ // est ce que j'ai rempli le formulaire, oui
       // Je récupère les données du POST
       $id=getNewId('participant');
       print("Nouvel Id : $id");
       $nom = addslashes(htmlentities($_POST['ttNom']));
       $prenom=addslashes(htmlentities($_POST['ttPrenom']));
       $dateNaissance= addslashes(htmlentities($_POST['ttDate']));
       $adresse= addslashes(htmlentities($_POST['ttAdresse']));
       $complement= addslashes(htmlentities($_POST['ttAdresse2']));

       // Je construit la requête INSERT
       $SQLQuery= "INSERT INTO participant (id, nom, prenom, date_naissance, adresse1, adresse2)
       VALUES ($id,$nom,$prenom,$dateNaissance,$adresse,$complement )";

       // J'exécute la requête et je retourne sur la liste
       if($dbConn->query($SQLQuery)){
         header("Location: participant.php");
       };
  }
}
/* -------------------------------------------------------Fin Traitement du formulaire ------------------------------------------------*/
    ?>

    <!------------------------------------------------------- Affichage du formulaire------------------------------------------------------ -->
    <form action="" method="post">
            <h1>Fiche participant</h1>
            <div class="formule">
<!-- --------------------------Récupérer la civilité Début  ------------------------->
<div class="form-group civilite">
            <label for="cbPermis" >Civilité : </label>
            <select id="disabledSelect" class="form-select" name="cbPermis">
              <option value="0">Choisir</option>
              <?php
                  $dbConn = getBDDConn();
                  $SQLQuery= 'SELECT id, libelle_court FROM civilite ORDER BY libelle_court';
                  
                  $SQLResult = $dbConn->query($SQLQuery);
                  $tabCivilite = ($SQLResult->fetchAll(PDO::FETCH_ASSOC));
                  foreach ($tabCivilite as $civilite){
                    if($idcivilite == $civilite['id']){
                    print('<option selected value="'.$civilite['id'].'">'.$civilite['libelle_court'].'</option>');
                  }else {
                    print('<option value="'.$civilite['id'].'">'.$civilite['libelle_court'].'</option>');
                  }
                }
                  $SQLResult -> closeCursor();
              ?>      
            </select>
            </div>
  <!-- --------------------------Récupérer la civilité FIN   ------------------------->
    <div class="form-group" >
      <label for="code">Nom :</label>
      <input type="text" id="exampleInputNom" class="form-control" placeholder="Votre nom" value="<?php print($nom); ?>" name = "ttNom">
    </div>
    <div class="form-group">
      <label for="code">Prenom :</label>
      <input type="text" id="exampleInputPrenom" class="form-control" placeholder="Votre prénom" value="<?php print($prenom); ?>"name = "ttPrenom">
    </div>
    <div class="form-group">
      <label for="code">Date de naissance :</label>
      <input type="date" id="exampleInputDate" class="form-control" placeholder="Votre prénom" value="<?php print($dateNaissance); ?>"name = "ttDate">
    </div>
    <div class="form-group">
      <label for="code">Adresse :</label>
      <input type="text" id="exampleInputAdresse" class="form-control" placeholder="Votre adresse" value="<?php print($adresse); ?>"name = "ttAdresse">
    </div>
    <div class="form-group">
      <label for="code">Complément :</label>
      <input type="text" id="exampleInputComplement" class="form-control" placeholder="Votre adresse" value="<?php print($complement); ?>"name = "ttAdresse2">
    </div>
    </div>

          
<!-- --------------------------Récupérer le code postal Début  ------------------------->
<div class="form-group">
            <label for="cbPermis">Code postal : </label>
            <select id="disabledSelect" class="form-select" name="cbPermis">
              <option value="0">Choisir</option>
              <?php
                  $dbConn = getBDDConn();
                  $SQLQuery= 'SELECT id, CONCAT(codepostal, " --- " ,ville) AS maVille  FROM cp_ville ORDER BY ville';
               
                  $SQLResult = $dbConn->query($SQLQuery);
                  $tabCPville = ($SQLResult->FetchAll(PDO::FETCH_ASSOC));
                  foreach ($tabCPville as $CPville){
                    if($idcpville == $CPville['id']){
                    print('<option selected value="'.$CPville['id'].'">'.$CPville['maVille'].'</option>');
                  }else {
                    print('<option value="'.$CPville['id'].'">'.$CPville['maVille'].'</option>');
                  }}
                  $SQLResult -> closeCursor();
              ?>      
            </select>
            </div>
<!-- --------------------------Récupérer le code postal FIN   ------------------------->
<!-- --------------------------Récupérer le permis Début  ------------------------->
            <div class="form-group">
            <label for="cbPermis">Permis : </label>
            <select id="disabledSelect" class="form-select" name="cbPermis">
              <option value="0">Choisir</option>
              <?php
                  $dbConn = getBDDConn();
                  $SQLQuery= 'SELECT id, libelle FROM permis ORDER BY libelle';
                  
                  $SQLResult = $dbConn->query($SQLQuery);
                  $tabPermis = ($SQLResult->fetchAll(PDO::FETCH_ASSOC));
                  foreach ($tabPermis as $permis){
                    if($idpermis == $permis['id']){
                    print('<option selected value="'.$permis['id'].'">'.$permis['libelle'].'</option>');
                  }else {
                    print('<option value="'.$permis['id'].'">'.$permis['libelle'].'</option>');
                  }
                }
                  $SQLResult -> closeCursor();
              ?>      
            </select>
            </div>
<!-- --------------------------Récupérer le permis FIN  ------------------------->



            
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
            let champNom = document.getElementById('exampleInputLibelle');
            let champPrenom = document.querySelector('exampleInputPrenom');
            let champDate = document.querySelector('exampleInputDate');
            let champAdresse = document.querySelector('exampleInputAdresse');
            let champComplement = document.querySelector('exampleInputComplement');
            
            if(champNom.value === ''){
              alert('Please enter, nom');
              champNom.focus(); // Mettre un focus sur le champ vide
              champNom.style.borderColor= 'red';
              return; // si champ vide, sortir de la fonction, le reste du code ne s'exécute pas
              }
            
            if(champPrenom.value === ''){
              alert('Please enter, prénom');
              champPrenom.focus();
              champPrenom.style.borderColor= 'red';
              return;
              }

            if(champDate.value === ''){
              alert('Please enter, date de naissance');
              champDate.focus();
              champDate.style.borderColor= 'red';
              return;
             }

             if(champAdresse.value === ''){
              alert('Please enter, adresse');
              champAdresse.focus();
              champAdresse.style.borderColor= 'red';
              return;
             }
             if(champComplement.value === ''){
              alert('Please enter, complement adresse');
              champComplement.focus();
              champComplement.style.borderColor= 'red';
              return;
             }

             document.querySelector('form').submit();
              console.log(champCode);
            })
            
          </script>
    </body>
</html>
