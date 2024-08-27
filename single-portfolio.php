<?php get_header(); ?>

<main id="swup" class="transition-main">
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
            <div class="image__item item-1">
                <?php
                    $image_id = get_field( 'image_1' );
                    if( $image_id ) {	
                        echo wp_get_attachment_image( $image_id, 'full' );
                    }
                ?>
            </div>
            <div class="image__item item-2">
                <?php
                    $image_id = get_field( 'image_2' );
                    if( $image_id ) {	
                        echo wp_get_attachment_image( $image_id, 'full' );
                    }
                ?>
            </div>
            <div class="image__item item-3">
                    <?php
                        $image_id = get_field( 'image_3' );
                        if( $image_id ) {	
                            echo wp_get_attachment_image( $image_id, 'full' );
                        }
                    ?>
                </div>
            <div class="image__item item-4">
                <?php
                    $image_id = get_field( 'image_4' );
                    if( $image_id ) {	
                        echo wp_get_attachment_image( $image_id, 'full' );
                    }
                ?>
            </div>
            <div class="links__item">
                <?php
                    $github = get_field( 'lien_github' );
                    if( $github ) {	
                        echo '<a href="' . $github . '" class="text__link"> Github</a>';
                    }
                    $site = get_field( 'lien_site' );
                    if( $site ) {	
                        echo '<a href="' . $site . '" class="text__link"> Site</a>';
                    }
                ?>
            </div>
        </div>
    </section>
</main>


<?php get_footer(); ?>