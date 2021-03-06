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
    <header class="header">
    <div class="header_logo"></div>
        <img src="images/logo.png" alt="le logo du site" class="logo"/>
    </div>
    <div class="titre">
        <h1>Bienvenue sur mon site</h1>
    </div>
      
    </header>
<?php
print("toto")
?>
    <nav class="navbar">
      <a href="index.php">Accueil</a>
      <a href="participant.php">Participants</a>
      <a href="modules.php">Modules</a>
      <a href="exports.php">Exports</a>
    </nav>

    <main>
        <div class="logo-participants">
            <img src="images/participant.jpg" alt="logo-participants" class="img-participant">
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

    <footer>
        <div class="footer-copyright">
            <h5>Nos réseaux sociaux</h5>
            <a href="#"><i class="fa-brands fa-twitter"></i></a>
            <a href="#"><i class="fa-brands fa-facebook-f"></i></a>
            <a href="#"><i class="fa-brands fa-instagram"></i></a>
            <a href="#"><i class="fa-brands fa-linkedin"></i></img></a>
            <a href="#"><i class="fa-brands fa-github"></i></a>
        </div>
        <div class="footer-services">
            <h5>Nos Services</h5>
            <ul>
                <li><a href="#">Web design</a></li>
                <li><a href="#">Developpement</a></li>
                <li><a href="#">Hébergement</a></li>
            </ul>
        </div>
        <div class="footer-about">
            <h5>À propos</h5>
            <ul>
                <li><a href="#">Entreprise</a></li>
                <li><a href="#">Équipe</a></li>
                <li><a href="#">Legacy</a></li>
            </ul>
        </div>
        <div class="footer-contact">
            <h5>Contacts</h5>
            <p>8 Rue Pierre Georges Latécoère, 33700 Mérignac</p>
        </div>
        
    </footer>
    <p>Copyright @2022 | Designed With by ME</p>
    
</body>
</html>
