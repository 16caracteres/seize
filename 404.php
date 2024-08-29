<?php get_header(); ?>

<main>
    <section class="page__section">
        <h1>Ceci est une page 404</h1> 
        <h2>Autrement dit, elle ne mène nulle part.</h2>
        <a href="<?php echo home_url( '/' ); ?>" class="text__link">Retrouver mon chemin</a>
    </section>
    
</main>

<?php get_footer(); ?>