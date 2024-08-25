<?php get_header(); ?>

<main>
    <section class="presentation__section">
        <?php if( have_posts() ) : while( have_posts() ) : the_post(); ?>
            
            <h1><?php the_title(); ?></h1>

            <?php the_content(); ?>          
        <?php endwhile; endif; ?>

        <div class="skills__project">
            <?php
                $terms = get_the_terms( $post->ID, 'competences' );

                if ( ! empty( $terms ) && ! is_wp_error( $terms ) ) {
                    // Ordre personnalisé des slugs
                    $order = array( 'wordpress', 'integration', 'javascript', 'ui-design' );

                    usort( $terms, function( $a, $b ) use ( $order ) {
                        return array_search( $a->slug, $order ) - array_search( $b->slug, $order );
                    });

                    echo '<ul>';
                    foreach ( $terms as $term ) {
                        echo '<li class="' . esc_attr( $term->slug ) . '">' . esc_html( $term->name ) . '</li>';
                    }
                    echo '</ul>';
                }
            ?>
        </div>
        
        
    </section>

    <section class="gallery__section">
        <div class="gallery__grid">
            <div class="image__item-1">
                <?php
                    $image_id = get_field( 'image_1' );
                    if( $image_id ) {	
                        echo wp_get_attachment_image( $image_id, 'full' );
                    }
                ?>
            </div>
            <div class="image__item-2"><img src="" alt=""></div>
            <div class="image__item-3"><img src="" alt=""></div>
            <div class="image__item-4"><img src="" alt=""></div>
            <div class="links__item"></div>
        </div>
    </section>
</main>


<?php get_footer(); ?>