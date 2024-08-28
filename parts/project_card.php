<div class="project__card">
    <a href="<?php echo get_the_permalink(); ?>" class="project__image">
        <?php 
            $thumbnail_id = get_post_thumbnail_id();
            $thumbnail_url = wp_get_attachment_image_src($thumbnail_id, 'full')[0];
            echo '<img src="' . esc_url($thumbnail_url) . '" data-src="' . esc_url($thumbnail_url) . '" alt="' . get_the_title() . '">';
        ?>
    </a>
    <div class="project__tags">
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
</div>