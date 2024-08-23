<?php get_header(); ?>

<main>
    <section id="accueil" class="home__section">

        <?php if( have_posts() ) : while( have_posts() ) : the_post(); ?>    
            
            <h1><?php the_title(); ?></h1> 
            <?php the_content(); ?>

        <?php endwhile; endif; ?>

        <div class="skills__list">
            <?php 
                $competences = get_terms( array(
                    'taxonomy' => 'competences',
                    'orderby' => 'id', // ou 'name', 'id', etc.
                    'order' => 'ASC', // 'DESC' pour un ordre décroissant
                    'hide_empty' => false // pour afficher même les termes sans contenu associé
                ));

                if ( ! empty( $competences ) && ! is_wp_error( $competences ) ) {
                    echo '<ul>';
                    foreach ( $competences as $competence ) {
                        echo '<li>' . esc_html( $competence->name ) . '</li>';
                    }
                    echo '</ul>';
                }
            ?>
        </div>

    </section>

    <section id="projets" class="projects__section">
        <h2>Projets</h2>
        <div class="projects__list">
            <?php 
                $args = array(
                    'post_type' => 'portfolio',
                    'posts_per_page' => -1,
                    'post_status' => 'publish',
                    'order' => 'date',
                    'order_by' => 'desc'
                );

                $homepage_query = new WP_Query( $args );

                if( $homepage_query->have_posts() ) : while( $homepage_query->have_posts() ) : $homepage_query->the_post();
                    
                    get_template_part( 'parts/project_card' ); 

                    endwhile;
                    endif;

                wp_reset_postdata();
            ?>
        </div>
    </section>

    <section id="parcours" class="experiences__sections">
        <h2>Parcours</h2>
        <div>
            <?php the_field( 'experience_1' ); ?>
            <?php the_field( 'experience_2' ); ?>
            <?php the_field( 'experience_3' ); ?>
            <?php the_field( 'experience_4' ); ?>
        </div>
    </section>

    <section id="contact" class="contact__section">
        <h2>Contact</h2>
        <?php
        echo do_shortcode('[contact-form-7 id="bd32bf8" title="Formulaire de contact 1"]');
        ?>
    </section>
</main>


<?php get_footer(); ?>