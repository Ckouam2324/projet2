<?php
/*
Template Name: Acceuil
*/
?>



<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <title>Hello, world!</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="stylecss.css">

    <style>
      .footer {
        background-color: #f8f9fa;
        padding: 40px 0;
      }
      .footer .column {
        margin-bottom: 20px;
      }
      .footer img {
        max-width: 100%;
        height: auto;
      }
      .footer .social-icons a {
        margin-right: 10px;
        color: #6c757d;
        text-decoration: none;
      }
      .footer .social-icons a:hover {
        color: #000;
      }

      .form-inline {
        /* Custom styling here */
      }
    </style>
    
  </head>
  <body>

  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#"> <img src="http://localhost:8888/wordpress3/wp-content/uploads/2024/08/logo.png" width="100" height="30" alt=""></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <form class="form-inline">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav ml-md-auto">
        <li class="nav-item">
          <a class="nav-link" href="http://localhost:8888/wordpress3/inscription/">S'inscrire</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="http://localhost:8888/wordpress3/panier/">Panier</a>
        </li>
      </ul>
    </div>
  </nav>

  <ul class="nav justify-content-center">
    <li class="nav-item">
      <a class="nav-link" href="http://localhost:8888/wordpress3/accueil/">Accueil</a>
    </li>
    <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        Boutique
      </a>
      <div class="dropdown-menu" aria-labelledby="navbarDropdown">
        <a class="dropdown-item" href="http://localhost:8888/wordpress3/nutritions/">Nutritions</a>
        <a class="dropdown-item" href="http://localhost:8888/wordpress3/accessoires/">Accessoires</a>
      </div>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="http://localhost:8888/wordpress3/qsn/">Qui sommes-nous ?</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="http://localhost:8888/wordpress3/form/">Contact</a>
    </li>
  </ul>

  <div class="container-fluid mb-4">
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
      <ol class="carousel-indicators">
        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
      </ol>
      <div class="carousel-inner">
        <div class="carousel-item active">
          <img class="d-block w-100" src="http://localhost:8888/wordpress3/wp-content/uploads/2024/08/2.png" alt="First slide">
        </div>
        <div class="carousel-item">
          <img class="d-block w-100" src="http://localhost:8888/wordpress3/wp-content/uploads/2024/08/1-copie.png" alt="Second slide">
        </div>
        <div class="carousel-item">
          <img class="d-block w-100" src="http://localhost:8888/wordpress3/wp-content/uploads/2024/08/2.png" alt="Third slide">
        </div>
      </div>
      <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
    </div>
  </div>

  <div class="container mb-4">
    <div class="media">
      <img class="mr-3 ms-5" src="http://localhost:8888/wordpress3/wp-content/uploads/2024/08/AdobeStock_630749995_Preview.jpeg" alt="Generic placeholder image" style="width: 28rem; border-radius: 10px">
      <div class="media-body">
        <h5 class="mt-0">Qui sommes-nous ?</h5>
        Shake Eat est une marque de nutrition sportive destinée aux jeunes publics tel que vous, un site web pour les étudiants qui sont souvent contraints d’arrondir les fins de mois.
        Nous sommes de jeunes entrepreneurs, passionnés par le sport et par la nutrition protéinée. Nous avons remarqué que le marché de la nutrition sportive est devenu exorbitant, et qui ne correspond donc pas à un jeune public d’étudiants, nous sommes la solution pour tous ces jeunes dont la fin du mois est compliquée.
        <p>
        <a href="http://localhost:8888/wordpress3/qsn/" class="btn btn-primary" role="button">Voir plus</a>

        </p>
      </div>
    </div>
  </div>

  <div class="container mb-4">
    <div class="row">
      <div class="col-6">
        <div class="card" style="width: 28rem; border-radius: 10px">
          <img class="card-img-top" src="http://localhost:8888/wordpress3/wp-content/uploads/2024/08/AdobeStock_670165973_Preview-1.jpeg" alt="Card image cap">
          <div class="card-body">
            <h5 class="card-title">Accessoires</h5>
            <a href="http://localhost:8888/wordpress3/accessoires/" class="btn btn-primary">Visiter</a>
          </div>
        </div> 
      </div>

      <div class="col-6"> 
        <div class="card" style="width: 28rem; border-radius: 10px">
          <img class="card-img-top" src="http://localhost:8888/wordpress3/wp-content/uploads/2024/08/AdobeStock_315250167_Preview.jpeg" alt="Card image cap">
          <div class="card-body">
            <h5 class="card-title">Nutritions</h5>
            <a href="http://localhost:8888/wordpress3/nutritions/" class="btn btn-primary">Visiter</a>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="container mb-4">
    <div class="text-center">
      <h2>Partenaires</h2>
    </div>
    <div class="row row-centered">
      <div class="col-md-4 image-container">
        <img src="http://localhost:8888/wordpress3/wp-content/uploads/2024/08/logo-isfsc.png" class="rounded" alt="Image à gauche">
      </div>
      <div class="col-md-4 image-container">
        <img src="http://localhost:8888/wordpress3/wp-content/uploads/2024/08/logo-isfsc.png" class="rounded" alt="Image au centre">
      </div>
      <div class="col-md-4 image-container">
        <img src="http://localhost:8888/wordpress3/wp-content/uploads/2024/08/logo-isfsc.png" class="rounded" alt="Image à droite">
      </div>
    </div>
  </div>

  



    


    <footer class="footer">
    <div class="container">
      <div class="row">
        <!-- Colonne Produits -->
        <div class="col-md-4 column">
          <h5>PRODUITS</h5>
          <ul class="list-unstyled">
            <li><a href="http://localhost:8888/wordpress3/accessoires/">Accessoires</a></li>
            <li><a href="http://localhost:8888/wordpress3/nutritions/">Nutrition</a></li>
            <li><a href="#">Autres</a></li>
          </ul>
          <div class="mt-3">
            <p><h5>PAIEMENTS ACCEPTES</h5></p>
            <img src="http://localhost:8888/wordpress3/wp-content/uploads/2024/08/paiement.png" alt="Image en bas des Produits">
          </div>
        </div>
        
        <!-- Colonne À propos de nous -->
        <div class="col-md-4 column">
          <h5>À PROPOS DE NOUS</h5>
          <ul class="list-unstyled">
            <li><a href="http://localhost:8888/wordpress3/qsn/">Qui sommes-nous ?</a></li>
            <li><a href="#">Notre équipe</a></li>
            <li><a href="#">Carrières</a></li>
          </ul>
        </div>
        
        <!-- Colonne Besoin d'aide -->
        <div class="col-md-4 column">
          <h5>BESOIN D'AIDE ?</h5>
          <ul class="list-unstyled">
            <li><a href="http://localhost:8888/wordpress3/form/">Contactez-nous</a></li>
            <li><a href="#">FAQ</a></li>
            <li><a href="#">Support technique</a></li>
          </ul>
          <div class="mt-3">
            <p><h5>SUIVEZ-NOUS</h5></p>
            <img src="http://localhost:8888/wordpress3/wp-content/uploads/2024/08/Unknown-removebg-preview.png" alt="Image en bas de Besoin d'aide">
          </div>
        </div>
      </div>
    </div>
  </footer>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>