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
    <header class="header">
    <div class="header_logo"></div>
        <img src="images/logo.png" alt="le logo du site" class="logo"/>
    </div>
    <div class="titre">
        <h1>Les participants</h1>
    </div>
      
    </header>

    <nav class="navbar">
      <a href="index.php">Accueil</a>
      <a href="participant.php">Participants</a>
      <a href="modules.php">Modules</a>
      <a href="exports.php">Exports</a>
    </nav>
    
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
