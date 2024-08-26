<?php
/*
Template Name: Finalisation
*/

get_header(); // Inclut l'en-tête du thème
?>

<style>
/* Styles pour la page de finalisation */
.container {
    max-width: 100%; /* S'assure que le conteneur occupe toute la largeur disponible */
    padding-left: 15px; /* Assure un padding intérieur */
    padding-right: 15px; /* Assure un padding intérieur */
}

.card {
    border-radius: 8px;
    overflow: hidden; /* Assure que les éléments internes respectent les bordures */
}

/* Assurez-vous que les champs de formulaire s'étendent correctement */
.woocommerce .form-row input.input-text,
.woocommerce .form-row select,
.woocommerce .form-row textarea {
    width: 100%; /* Assure que les champs de formulaire s'étendent sur toute la largeur */
    padding: 12px;
    font-size: 1rem;
    border-radius: 4px;
    border: 1px solid #ced4da;
}

/* Styles pour les boutons */
.woocommerce .form-row.place-order button.button {
    width: 100%;
    padding: 15px;
    font-size: 1.2rem;
    background-color: #007bff;
    color: white;
    border-radius: 4px;
    border: none;
}

.woocommerce .form-row.place-order button.button:hover {
    background-color: #0056b3;
}

/* Ajustements pour les sections de détails */
.woocommerce-checkout-form,
.woocommerce-checkout-review-order {
    background-color: #f8f9fa;
    border: 1px solid #e9ecef;
    padding: 1.5rem;
    border-radius: 8px;
    margin-bottom: 1.5rem;
}

/* Ajuster la mise en page pour les petits écrans */
@media (max-width: 768px) {
    .woocommerce .form-row {
        padding: 1rem;
    }

    .woocommerce .form-row input.input-text,
    .woocommerce .form-row select,
    .woocommerce .form-row textarea {
        font-size: 0.9rem;
        padding: 10px;
    }

    .woocommerce .form-row.place-order button.button {
        font-size: 1rem;
        padding: 12px;
    }
}
</style>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-12 col-lg-10">
            <div class="card shadow-sm">
                <div class="card-header bg-primary text-white text-center">
                    <h3>Finalisation de la Commande</h3>
                </div>
                <div class="card-body">
                    <?php
                    if ( WC()->cart->get_cart_contents_count() > 0 ) {
                        echo '<h4 class="mb-4">Détails de la Commande</h4>';

                        // Section des détails de facturation
                        echo '<div class="woocommerce-checkout-form">';
                        echo do_shortcode('[woocommerce_checkout]'); // Inclut tous les champs WooCommerce de la commande
                        echo '</div>';

                        // Section de la révision de commande
                        echo '<div class="woocommerce-checkout-review-order mt-4">';
                        echo do_shortcode('[woocommerce_order_review]'); // Ajoutez cette ligne pour la révision de la commande
                        echo '</div>';

                    } else {
                        echo '<p class="text-center">Merci.</p>';
                    }
                    ?>
                </div>
                <div class="card-footer text-center">
                    <p>Pour tout renseignement complémentaire, veuillez nous contacter :</p>
                    <p><strong>Email :</strong> contact@votre-site.com</p>
                    <p><strong>Téléphone :</strong> +33 1 23 45 67 89</p>
                    <p><strong>Adresse pour virement :</strong></p>
                    <p>Banque XYZ<br>
                       IBAN : FR76 1234 5678 9012 3456 7890 123<br>
                       BIC : XYZBFRPPXXX</p>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
get_footer(); // Inclut le pied de page du thème
?>
