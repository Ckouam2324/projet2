

 <?php
/* Template Name: Connexion */
get_header();
?>

<div class="container d-flex justify-content-center align-items-center mb-4" style="min-height: 100vh; background-color: #f8f9fa;">
    <div class="card shadow-lg p-4" style="max-width: 400px; width: 100%;">
        <h3 class="text-center mb-4">Connexion</h3>
        <form method="post" class="woocommerce-form woocommerce-form-login login">

            <div class="form-group">
                <label for="username">Adresse e-mail</label>
                <input type="text" class="form-control" name="username" id="username" autocomplete="username" placeholder="Entrez votre e-mail" required>
            </div>

            <div class="form-group">
                <label for="password">Mot de passe</label>
                <input class="form-control" type="password" name="password" id="password" autocomplete="current-password" placeholder="Entrez votre mot de passe" required>
            </div>

            <div class="form-group">
                <?php wp_nonce_field('woocommerce-login', 'woocommerce-login-nonce'); ?>
                <button type="submit" class="btn btn-primary btn-block" name="login" value="<?php esc_attr_e('Log in', 'woocommerce'); ?>">Connexion</button>
            </div>

            <div class="text-center mt-3">
                <a href="<?php echo esc_url(wp_lostpassword_url()); ?>">Mot de passe oublié ?</a>
            </div>

        </form>

        <div class="text-center mt-4">
            <p>Pas encore de compte ? <a href="<?php echo esc_url(wc_get_page_permalink('myaccount')); ?>">S'inscrire</a></p>
        </div>
    </div>
</div>

<?php
get_footer();
?>
