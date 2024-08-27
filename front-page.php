<?php get_header(); ?>

<main id="swup" class="transition-main">
    <section id="accueil" class="home__section">

        <?php if( have_posts() ) : while( have_posts() ) : the_post(); ?>    
            
            <h1><?php the_title(); ?></h1> 
            <?php the_content(); ?>

        <?php endwhile; endif; ?>

        <div class="skills__list">
            <?php 
                $competences = get_terms( array(
                    'taxonomy' => 'competences',
                    'orderby' => 'id', 
                    'order' => 'ASC',
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

    <section id="parcours" class="experiences__section">
        <h2>Parcours</h2>
        <div class="experiences__list">
            <div class="experiences__item">
                <?php echo wp_kses_post( get_field('experience_1') ); ?>
            </div>
            <div class="experiences__item">
                <?php echo wp_kses_post( get_field('experience_2') ); ?>
            </div>
            <div class="experiences__item">
                <?php echo wp_kses_post( get_field('experience_3') ); ?>
            </div>
            <div class="experiences__item">
                <?php echo wp_kses_post( get_field('experience_4') ); ?>
            </div>
        </div>
        <a href="<?php echo wp_kses_post( get_field('curriculum-vitae') ); ?>" class="text__link">
            Voir mon CV
        </a>
    </section>

    <section id="contact" class="contact__section">
        <h2>Contact</h2>
        <div class="contact__form">
            <?php
            echo do_shortcode('[contact-form-7 id="bd32bf8" title="Formulaire de contact 1"]');
            ?>
        </div>
    </section>
</main>


<?php get_footer(); ?>