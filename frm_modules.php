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

  print('<pre>');
  print_r($_GET);
  print('</pre>');
?>

        <form>
            <h1>Fiche module</h1>
            <div class="formule">
            <div class="form-group">
              <label for="code">Code</label>
              <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Saisir le code">
              <small id="emailHelp" class="form-text text-muted"></small>
            </div>
            <div class="form-group">
              <label for="libelle">Libelle</label>
              <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Saisir le libellé">
            </div>
          </div>
            <div class="form-group">
                <label for="exampleFormControlTextarea1" class="description">Desciption</label>
                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Saisir la description du module"></textarea>
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
