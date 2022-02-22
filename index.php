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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link
    rel="stylesheet"
    href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
    integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T"
    crossorigin="anonymous"
  />
    <link rel="stylesheet" href="style.css" />
    <title>Accueil</title>
  </head>
  <body>
<?php
  print(getHeader());
  print(getNavbar());
?>

    <main>
        <div class="logo-participants">
            <img src="includes/images/participant.jpg" alt="logo-participants" class="img-participant">
        </div>
        
      <article>
        <h3>Description du site</h3>
        <p>
          Sur ce site, on peut trouver une liste de participant (base de
          données) . <br />
          La page <strong>Acceuil</strong>, la description du site. La page
          Participants, un tableau, regroupant tout les paeticipants. <br />
          La page <strong>Modules</strong>, avec les différents modules,
          épreuves, par exemple HTML CSS. </br> 
          La page <strong>Exports</strong>, permet d'exporter la liste des participant au format PDF.
        </p>
        <br>
        <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Voluptates quo sit et, harum perferendis, reprehenderit tenetur nam similique quis ut rem a quibusdam qui quod, facere omnis est dolore labore cupiditate minima officia enim? Officiis voluptates tempora vitae eligendi corrupti ea architecto? Consectetur ex explicabo inventore, nisi porro voluptate, nobis corrupti vero enim dolores pariatur a, libero corporis et. Eligendi assumenda fugiat aut, delectus nam voluptas recusandae rerum aliquid, consectetur a, eos doloremque quas quasi! Eligendi aliquam, nisi ipsa aliquid exercitationem debitis, iste impedit at minus magnam eaque veritatis omnis. Minus quam provident totam quod facilis cum quaerat molestiae aperiam.</p>
      </article>
    </main>

<?php
  print(getFooter());
?>
</body>
</html>
