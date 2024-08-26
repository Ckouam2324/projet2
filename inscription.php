<?php
/* Template Name: Inscription */
get_header();

// Traitement du formulaire
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['register'])) {
    // Vérifier le nonce pour la sécurité
    if (!isset($_POST['woocommerce-register-nonce']) || !wp_verify_nonce($_POST['woocommerce-register-nonce'], 'woocommerce-register')) {
        echo '<p>Nonce de sécurité invalide.</p>';
    } else {
        // Récupérer les valeurs du formulaire
        $email = sanitize_email($_POST['email']);
        $password = $_POST['password'];
        $password2 = $_POST['password2'];
        $address = sanitize_text_field($_POST['billing_address_1']);
        $phone = sanitize_text_field($_POST['billing_phone']);

        // Validation basique
        if ($password !== $password2) {
            echo '<p>Les mots de passe ne correspondent pas.</p>';
        } elseif (!is_email($email)) {
            echo '<p>Adresse e-mail invalide.</p>';
        } else {
            // Inscription de l'utilisateur
            $user_id = wc_create_new_customer($email, $password, $email);

            if (is_wp_error($user_id)) {
                echo '<p>' . $user_id->get_error_message() . '</p>';
            } else {
                // Sauvegarder les métadonnées utilisateur
                update_user_meta($user_id, 'billing_address_1', $address);
                update_user_meta($user_id, 'billing_phone', $phone);

                // Connexion automatique
                wp_set_auth_cookie($user_id);
                wp_redirect(wc_get_account_endpoint_url('dashboard'));
                exit;
            }
        }
    }
}
?>

<div class="container d-flex justify-content-center align-items-center mb-4" style="min-height: 100vh; background-color: #f8f9fa;">
    <div class="card shadow-lg p-4" style="max-width: 500px; width: 100%;">
        <h3 class="text-center mb-4">Inscription</h3>
        <form method="post" class="woocommerce-form woocommerce-form-register register">
            <div class="form-group">
                <label for="reg_email">Adresse e-mail</label>
                <input type="email" class="form-control" name="email" id="reg_email" autocomplete="email" placeholder="Entrez votre e-mail" required>
            </div>
            <div class="form-group">
                <label for="reg_password">Mot de passe</label>
                <input type="password" class="form-control" name="password" id="reg_password" autocomplete="new-password" placeholder="Entrez votre mot de passe" required>
            </div>
            <div class="form-group">
                <label for="reg_password2">Confirmer le mot de passe</label>
                <input type="password" class="form-control" name="password2" id="reg_password2" autocomplete="new-password" placeholder="Confirmez votre mot de passe" required>
            </div>
            <div class="form-group">
                <label for="billing_address_1">Adresse</label>
                <input type="text" class="form-control" name="billing_address_1" id="billing_address_1" placeholder="Entrez votre adresse" required>
            </div>
            <div class="form-group">
                <label for="billing_phone">Numéro de téléphone</label>
                <input type="text" class="form-control" name="billing_phone" id="billing_phone" placeholder="Entrez votre numéro de téléphone" required>
            </div>
            <div class="form-group">
                <?php wp_nonce_field('woocommerce-register', 'woocommerce-register-nonce'); ?>
                <button type="submit" class="btn btn-primary btn-block" name="register" value="1">S'inscrire</button>
            </div>
            <div class="text-center mt-3">
                <a href="<?php echo esc_url(wp_login_url()); ?>">Déjà un compte ? Connectez-vous</a>
            </div>
        </form>
    </div>
</div>

<?php
get_footer();
?>
