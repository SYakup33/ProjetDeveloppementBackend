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
    <header class="header">
        <div class="header_logo"></div>
            <img src="images/logo.png" alt="le logo du site" class="logo"/>
        </div>
        <div class="titre">
            <h1>Formulaire module</h1>
        </div>
        </header>

        <nav class="navbar">
          <a href="index.php">Accueil</a>
          <a href="participant.php">Participants</a>
          <a href="modules.php">Modules</a>
          <a href="exports.php">Exports</a>
        </nav>

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
