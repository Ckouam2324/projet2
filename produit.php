<?php
/**
 * Template Name: Produit
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
        .card {
  border: none;
  border-radius: 8px;
  box-shadow: 0 4px 8px rgba(0,0,0,0.1);
}

.card-img-top {
  border-radius: 8px 8px 0 0;
}

.card-body {
  padding: 15px;
}

.card-title {
  font-size: 1.25rem;
  margin-bottom: 10px;
}

.card-text {
  font-size: 1rem;
  color: #333;
}



.woocommerce ul.products {
    display: flex;
    flex-wrap: wrap;
    gap: 20px; /* Espacement entre les produits */
    padding: 0; /* Supprime le padding par défaut */
    margin: 0; /* Supprime la marge par défaut */
  }

  .woocommerce ul.products li.product {
    flex: 1 1 calc(33.333% - 20px); /* 3 produits par ligne avec une marge de 20px */
    box-sizing: border-box;
    list-style: none; /* Supprime les puces par défaut */
  }

  .navbar .btn {
  position: relative;
}

.navbar .btn .badge {
  position: absolute;
  top: -10px;
  right: -10px;
  padding: 0.25em 0.4em;
  font-size: 0.75rem;
  line-height: 1;
  border-radius: 10rem;
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









<div class="container mt-5">
  <!-- Titre et nombre total de produits -->
  <div class="row mb-4">
    <div class="col-12">
      <h1 class="text-center">Nos Produits</h1>
      <p class="text-center">
        Total de produits : 
        <?php 
        // Compter le nombre total de produits dans la catégorie "nutrition"
        $category_id = get_term_by('slug', 'NUTRITIONS', 'product_cat')->term_id;
        $total_products = new WP_Query(array(
          'post_type' => 'product',
          'posts_per_page' => -1, // Get all products
          'tax_query' => array(
            array(
              'taxonomy' => 'product_cat',
              'field' => 'term_id',
              'terms' => $category_id,
            ),
          ),
        ));
        echo $total_products->found_posts;
        ?>
      </p>
    </div>
  </div>

  <div class="row">
    <!-- Filtre à gauche -->
    <div class="col-md-3 mb-4">
      <div class="bg-light p-3 rounded">
        <h4>Filtres</h4>
        <?php if ( is_active_sidebar( 'product-filters' ) ) : ?>
          <?php dynamic_sidebar( 'product-filters' ); ?>
        <?php endif; ?>
        <?php
        // Remplacez [votre_shortcode_de_filtre] par le shortcode que vous avez reçu de l'extension de filtre
        echo do_shortcode('[tf_product_filter id="wpf_66cba7f0269fb"]');
        ?>
      </div>
    </div>

    <!-- Produits -->
    <div class="col-md-9">
      <div class="woocommerce">
        <div class="row">
          <?php
          // Query pour obtenir les produits de la catégorie Nutrition
          $args = array(
            'post_type' => 'product',
            'posts_per_page' => 9, // Nombre maximum de produits par page
            'tax_query' => array(
              array(
                'taxonomy' => 'product_cat',
                'field' => 'slug',
                'terms' => 'NUTRITIONS',
              ),
            ),
          );

          $loop = new WP_Query( $args );

          if ( $loop->have_posts() ) :
            while ( $loop->have_posts() ) : $loop->the_post(); global $product;
          ?>
            <div class="col-md-4 mb-4">
              <div class="card">
                <a href="<?php the_permalink(); ?>">
                  <?php if ( has_post_thumbnail() ) : ?>
                    <?php the_post_thumbnail( 'woocommerce_thumbnail', array( 'class' => 'card-img-top' ) ); ?>
                  <?php endif; ?>
                </a>
                <div class="card-body">
                  <h5 class="card-title"><?php the_title(); ?></h5>
                  <p class="card-text"><?php echo $product->get_price_html(); ?></p>
                  <div class="d-flex justify-content-between align-items-center">
                    <?php woocommerce_template_loop_rating(); ?>
                    <?php woocommerce_template_loop_add_to_cart(); ?>
                  </div>
                </div>
              </div>
            </div>
          <?php endwhile; ?>
          <?php else : ?>
            <p><?php esc_html_e( 'Aucun produit trouvé.' ); ?></p>
          <?php endif; ?>

          <?php wp_reset_postdata(); ?>
        </div>
      </div>
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