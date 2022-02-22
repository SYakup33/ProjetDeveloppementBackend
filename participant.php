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
  print(getHeader("Les participants"));
  print(getNavbar());
?>
    
    <table class="table">
      <thead>
        <tr>
          <th scope="col">Nom</th>
          <th scope="col">Prenom</th>
          <th scope="col">Email</th>
          <th colspan="2"></th>

        </tr>
      </thead>
      <tbody>
        <tr>
          <th scope="row">Clavette</th>
          <td>Marie</td>
          <td>marie@clavette.com</td>
          <td><a href="#"><i class="fa-solid fa-pen-to-square"></i></a></td>
          <td><a href="#"><i class="fa-solid fa-eraser"></i></a></td>
        </tr>
        <tr>
          <th scope="row">Huppe</th>
          <td>Ganelon</td>
          <td>ganelon@hupper.com</td>
          <td><a href="#"><i class="fa-solid fa-pen-to-square"></i></a></td>
          <td><a href="#"><i class="fa-solid fa-eraser"></i></a></td>
        </tr>
        <tr>
          <th scope="row">Petrie</th>
          <td>Gaetane</td>
          <td>gaetane@tetrie.com</td>
          <td><a href="#"><i class="fa-solid fa-pen-to-square"></i></a></td>
          <td><a href="#"><i class="fa-solid fa-eraser"></i></a></td>
        </tr>
      </tbody>
    </table>
<?php
  print(getFooter());
?>
  </body>
</html>
