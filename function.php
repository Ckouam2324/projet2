<?php
/*
Template Name: Panier
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
        if (WC()->cart->is_empty()) {
            echo '<p class="text-center">Votre panier est vide.</p>';
        } else {
            foreach (WC()->cart->get_cart() as $cart_item_key => $cart_item) {
                $_product = $cart_item['data'];
                $product_id = $cart_item['product_id'];

                $product_image = wp_get_attachment_image_src(get_post_thumbnail_id($product_id), 'single-post-thumbnail')[0];
                ?>
                <div class="col-md-4 mb-4">
                    <div class="card shadow-sm bg-light">
                        <img src="<?php echo $product_image; ?>" class="card-img-top" alt="<?php echo $_product->get_name(); ?>">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $_product->get_name(); ?></h5>
                            <p class="card-text">Prix : <?php echo wc_price($_product->get_price()); ?></p>
                            <div class="input-group mb-3">
                                <input type="number" class="form-control cart-quantity" data-cart-item-key="<?php echo esc_attr($cart_item_key); ?>" value="<?php echo $cart_item['quantity']; ?>" min="1">
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
                <p>Total des produits : <span id="cart-subtotal"><?php echo WC()->cart->get_cart_subtotal(); ?></span></p>
                <p>Frais de livraison : <span id="shipping-total"><?php echo wc_price(WC()->cart->get_shipping_total()); ?></span></p>
                <p><strong>Total : <span id="cart-total"><?php echo WC()->cart->get_total(); ?></span></strong></p>
                <a href="<?php echo wc_get_checkout_url(); ?>" class="btn btn-primary btn-block">Passer la commande</a>
            </div>
        </div>
    </div>
</div>
<?php
function update_cart_quantity_ajax() {
    $cart_item_key = sanitize_text_field($_POST['cart_item_key']);
    $quantity = (int)$_POST['quantity'];
    
    if (isset(WC()->cart->cart_contents[$cart_item_key])) {
        WC()->cart->set_quantity($cart_item_key, $quantity, true);
        WC()->cart->calculate_totals();
    }

    wp_send_json(array(
        'cart_subtotal' => WC()->cart->get_cart_subtotal(),
        'cart_total' => WC()->cart->get_total(),
        'line_total' => wc_price(WC()->cart->cart_contents[$cart_item_key]['line_total']),
    ));
}
add_action('wp_ajax_woocommerce_update_cart_quantity', 'update_cart_quantity_ajax');
add_action('wp_ajax_nopriv_woocommerce_update_cart_quantity', 'update_cart_quantity_ajax');

?>
<?php
get_footer(); // Inclut le pied de page du thème
?>
