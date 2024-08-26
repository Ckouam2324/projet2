

<?php
/*
Template Name: panier
*/

get_header(); // Inclut l'en-tête du thème
?>

<div class="container mt-5">
    <h2 class="text-center mb-4">PANIER</h2>

    <div class="row mb-4">
        <div class="col-md-12 text-center">
            <p>Total produits : <?php echo WC()->cart->get_cart_contents_count(); ?></p>
        </div>
    </div>

    <div class="row">
        <?php
        // Vérifier si le panier est vide
        if (WC()->cart->is_empty()) {
            echo '<p class="text-center">Votre panier est vide.</p>';
        } else {
            foreach (WC()->cart->get_cart() as $cart_item_key => $cart_item) {
                $_product = $cart_item['data'];
                $product_id = $cart_item['product_id'];

                // Obtenez l'image du produit
                $product_image = wp_get_attachment_image_src(get_post_thumbnail_id($product_id), 'single-post-thumbnail')[0];

                // Affichez les détails du produit
                ?>
                <div class="col-md-4 mb-4">
                    <div class="card shadow-sm bg-light">
                        <img src="<?php echo $product_image; ?>" class="card-img-top" alt="<?php echo $_product->get_name(); ?>">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $_product->get_name(); ?></h5>
                            <p class="card-text">Prix : <?php echo wc_price($_product->get_price()); ?></p>
                            <div class="input-group mb-3">
                                <input type="number" class="form-control cart-quantity" data-cart-item-key="<?php echo esc_attr($cart_item_key); ?>" value="<?php echo $cart_item['quantity']; ?>" min="1">
                                <div class="input-group-append">
                                    <button class="btn btn-primary update-cart">Mettre à jour</button>
                                </div>
                            </div>
                            <p class="text-right">Sous-total : <span class="line-total"><?php echo wc_price($cart_item['line_total']); ?></span></p>
                        </div>
                    </div>
                </div>
                <?php
            }
        }
        ?>
    </div>

    <div class="row mt-5">
        <div class="col-md-12">
            <div class="card shadow-lg p-4">
                <h4 class="text-center mb-4">Résumé de la commande</h4>
                <p>Total des produits : <span id="cart-subtotal"><?php echo wc_price(WC()->cart->get_cart_subtotal()); ?></span></p>
                <p>Frais de livraison : <span id="shipping-total"><?php echo wc_price(WC()->cart->get_shipping_total()); ?></span></p>
                <p><strong>Total : <span id="cart-total"><?php echo wc_price(WC()->cart->get_total()); ?></span></strong></p>
                <a href="<?php echo wc_get_checkout_url(); ?>" class="btn btn-primary btn-block">Passer la commande</a>
            </div>
        </div>
    </div>
</div>

<script>
jQuery(document).ready(function($) {
    // Fonction pour mettre à jour le panier via AJAX
    function update_cart_quantity(cart_item_key, quantity) {
        $.ajax({
            type: 'POST',
            url: wc_cart_params.ajax_url,
            data: {
                'action': 'woocommerce_update_cart_quantity',
                'cart_item_key': cart_item_key,
                'quantity': quantity,
            },
            success: function(response) {
                // Mettre à jour les totaux affichés
                $('#cart-subtotal').text(response.cart_subtotal);
                $('#cart-total').text(response.cart_total);
                $('span.line-total[data-cart-item-key="' + cart_item_key + '"]').text(response.line_total);
            }
        });
    }

    // Événement lorsque la quantité est modifiée
    $('.cart-quantity').change(function() {
        var cart_item_key = $(this).data('cart-item-key');
        var quantity = $(this).val();
        update_cart_quantity(cart_item_key, quantity);
    });

    // Événement lorsque le bouton "Mettre à jour" est cliqué
    $('.update-cart').click(function() {
        var cart_item_key = $(this).siblings('.cart-quantity').data('cart-item-key');
        var quantity = $(this).siblings('.cart-quantity').val();
        update_cart_quantity(cart_item_key, quantity);
    });
});
</script>

<?php
get_footer(); // Inclut le pied de page du thème
?>































