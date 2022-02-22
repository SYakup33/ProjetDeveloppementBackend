<!-- Ce fichier regroupe les parties communes de chaque fichier(pages web) -->
<?php
function getHeader ($titre = 'Bienvenue sur mon site') {
    return ('<header class="header">
    <div class="header_logo"></div>
        <a href = "index.php"><img src="includes/images/logo.png" alt="le logo du site" class="logo"/></a>
    </div>
    <div class="titre">
        <h1>'.$titre.'</h1>
    </div>
      
    </header>');
}

function getNavbar () {
    return ('
    <nav class="navbar">
    <a href="index.php">Accueil</a>
    <a href="participant.php">Participants</a>
    <a href="modules.php">Modules</a>
    <a href="exports.php">Exports</a>
  </nav>
    ');
}

function getFooter () {
    return ('
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
    ');
}

    ?>
