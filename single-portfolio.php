<?php get_header(); ?>

<main>
    <section class="presentation__section">
        <?php if( have_posts() ) : while( have_posts() ) : the_post(); ?>
            
            <h1><?php the_title(); ?></h1>

            <?php the_content(); ?>          
        <?php endwhile; endif; ?>

        <?php
            $terms = get_the_terms( $post->ID, 'competences' );

            if ( ! empty( $terms ) && ! is_wp_error( $terms ) ) {
                echo '<ul>';
                foreach ( $terms as $term ) {
                    echo '<li class="' . esc_attr( $term->slug ) . '">' . esc_html( $term->name ) . '</li>';
                }
                echo '</ul>';
            }
        ?>
        
    </section>

    <section class="gallery__section">

    </section>
</main>


<?php get_footer(); ?>